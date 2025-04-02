=== Custom Admin Bar Toggle ===
Contributors: David Hewitson
Tags: admin bar, toolbar, toggle, hide, show
Requires at least: 4.7
Tested up to: 6.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Control the WordPress admin bar visibility for logged-in users with easy toggle functionality.

== Description ==

This plugin allows logged-in users to easily toggle the WordPress admin bar on or off, with their preference saved to their user profile. By default, the admin bar is shown.

Key features:

* Shows the admin bar by default for logged-in users
* Stores preference in user meta data (persists across devices and browsers)
* Add `?admin_bar=0` to any URL to hide the admin bar 
* Add `?admin_bar=1` to any URL to show the admin bar
* Adds a toggle link in the admin bar to hide or show it
* Adds a small button at the bottom left of the screen to show the admin bar when it's hidden
* Always shows the admin bar in the WordPress admin area regardless of preference

== Installation ==

1. Upload the `custom-admin-bar-toggle` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The admin bar will show by default for logged-in users
4. To hide it, click the "Hide Admin Bar" link in the admin bar or add `?admin_bar=0` to any URL
5. When hidden, a small "Show Admin Bar" button appears at the bottom left of the screen

== Frequently Asked Questions ==

= Will this affect all users or just me? =

The setting is stored in each user's profile data, so each user can have their own preference.

= How do I get the admin bar back after hiding it? =

You can either:
* Click the "Show Admin Bar" button at the bottom left of the screen
* Add `?admin_bar=1` to any URL when logged in

= Does this work for guests (non-logged-in users)? =

No, this plugin only affects logged-in users since it stores preferences in user meta. The standard WordPress behavior applies to non-logged-in users.

= Will my preference be remembered across different browsers and devices? =

Yes, since the preference is stored in your user profile in the database, it will be consistent across all of your devices and browsers when you're logged in.

== Changelog ==

= 1.0.0 =
* Initial release 