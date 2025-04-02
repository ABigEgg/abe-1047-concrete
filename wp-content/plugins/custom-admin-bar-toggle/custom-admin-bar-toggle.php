<?php

/**
 * Plugin Name: Custom Admin Bar Toggle
 * Plugin URI: #
 * Description: Controls the WordPress admin bar visibility using user meta. Shows admin bar by default. Add ?admin_bar=0 to hide it.
 * Version: 1.0.0
 * Author: David Hewitson
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: custom-admin-bar-toggle
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

class Custom_Admin_Bar_Toggle
{
    // User meta key
    private $user_meta_key = 'hide_admin_bar';

    /**
     * Initialize the plugin
     */
    public function __construct()
    {
        // Check URL parameter and set user meta if needed
        add_action('init', array($this, 'check_url_param'));

        // Filter the admin bar display
        add_filter('show_admin_bar', array($this, 'toggle_admin_bar'));

        // Add the toggle link to the admin bar
        add_action('admin_bar_menu', array($this, 'add_toggle_link'), 999);

        // Add a toggle button to the front-end when admin bar is hidden
        add_action('wp_footer', array($this, 'add_frontend_toggle_button'));
    }

    /**
     * Check for admin_bar URL parameter and set user meta
     */
    public function check_url_param()
    {
        // Only proceed for logged-in users
        if (!is_user_logged_in()) {
            return;
        }

        if (isset($_GET['admin_bar'])) {
            $user_id = get_current_user_id();

            if ($_GET['admin_bar'] == '0') {
                // Hide admin bar
                update_user_meta($user_id, $this->user_meta_key, true);
            } elseif ($_GET['admin_bar'] == '1') {
                // Show admin bar (delete meta value)
                delete_user_meta($user_id, $this->user_meta_key);
            }

            // Redirect to same page without parameter to avoid bookmarking with parameter
            $redirect_url = remove_query_arg('admin_bar');
            wp_redirect($redirect_url);
            exit;
        }
    }

    /**
     * Check user meta and toggle admin bar visibility
     * 
     * @param bool $show Whether to show the admin bar or not
     * @return bool Modified value
     */
    public function toggle_admin_bar($show)
    {
        // If we're in the admin, always show the admin bar
        if (is_admin()) {
            return true;
        }

        // Only modify for logged-in users
        if (!is_user_logged_in()) {
            return $show;
        }

        $user_id = get_current_user_id();
        $hide_admin_bar = get_user_meta($user_id, $this->user_meta_key, true);

        // If meta exists and is true, hide the admin bar
        if ($hide_admin_bar) {
            return false;
        }

        // By default, show the admin bar (return true)
        return true;
    }

    /**
     * Get the current URL
     * 
     * @return string The current URL
     */
    private function get_current_url()
    {
        $protocol = is_ssl() ? 'https' : 'http';
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

        return $protocol . '://' . $host . $uri;
    }

    /**
     * Add a toggle link to the admin bar
     * 
     * @param WP_Admin_Bar $wp_admin_bar The admin bar object
     */
    public function add_toggle_link($wp_admin_bar)
    {
        // Only proceed for logged-in users
        if (!is_user_logged_in()) {
            return;
        }

        $user_id = get_current_user_id();
        $hide_admin_bar = get_user_meta($user_id, $this->user_meta_key, true);
        $current_url = $this->get_current_url();

        if ($hide_admin_bar) {
            // Admin bar is hidden, show "Show Admin Bar" link
            $wp_admin_bar->add_node(array(
                'id'    => 'admin-bar-toggle',
                'title' => __('Show Admin Bar', 'custom-admin-bar-toggle'),
                'href'  => add_query_arg('admin_bar', '1', $current_url),
                'meta'  => array(
                    'title' => __('Show Admin Bar', 'custom-admin-bar-toggle'),
                ),
            ));
        } else {
            // Admin bar is visible, show "Hide Admin Bar" link
            $wp_admin_bar->add_node(array(
                'id'    => 'admin-bar-toggle',
                'title' => __('Hide Admin Bar', 'custom-admin-bar-toggle'),
                'href'  => add_query_arg('admin_bar', '0', $current_url),
                'meta'  => array(
                    'title' => __('Hide Admin Bar', 'custom-admin-bar-toggle'),
                ),
            ));
        }
    }

    /**
     * Add a toggle button to the front-end when admin bar is hidden
     */
    public function add_frontend_toggle_button()
    {
        // Only add the button on the front-end, for logged-in users, and when the admin bar is hidden
        if (is_admin() || !is_user_logged_in() || is_admin_bar_showing()) {
            return;
        }

        // Create the button HTML with styles - positioned at bottom left like Laravel debug bar
        $current_url = $this->get_current_url();
        $toggle_url = add_query_arg('admin_bar', '1', $current_url);
?>
        <div id="show-admin-bar-button" style="position: fixed; bottom: 10px; left: 10px; z-index: 99999;">
            <a href="<?php echo esc_url($toggle_url); ?>" style="display: inline-block; background-color: #2271b1; color: #fff; text-decoration: none; padding: 5px 10px; border-radius: 3px; font-size: 12px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif; box-shadow: 0 2px 4px rgba(0,0,0,.3);">
                <?php esc_html_e('Show Admin Bar', 'custom-admin-bar-toggle'); ?>
            </a>
        </div>
<?php
    }
}

// Initialize the plugin
$custom_admin_bar_toggle = new Custom_Admin_Bar_Toggle();
