/** @type {import('tailwindcss').Config} */

function rem(px) {
  return ( px / 16 ).toFixed(2) + "rem";
}

module.exports = {
  content: [ 
    "views/**/*.twig",
    "views/*.twig" 
  ],
  theme: {
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
    },
    colors: {
      "cc-mid-grey": "#888c8c",
      "cc-dark-grey": "#464d53",
      "cc-light-grey": "#d9d9d9",
      "cc-grey": "#d9d9d9",
      "cc-white": "#fff",
    },
    fontSize: {
      "3xl": [ rem(105), rem(105) ],
      "2xl": [ rem(52), rem(62.4) ],
      "xl": [ rem(42), rem(50) ],
      "lg": rem(36),
      "2md": [ rem(32), rem(38.4) ],
      "md": [ rem(30), rem(36) ],
      "sm": [ rem(24), rem(28.8) ],
      "xs": rem(18),
    },
    container: {
      "center": true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem'
      },
    },
    extend: {
      spacing: {
        'container': '70rem'
      }
    }
  },
  plugins: [],
}

