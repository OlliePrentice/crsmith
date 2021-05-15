// const plugin = require('tailwindcss/plugin');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './*.php',
      './template-parts/**/*.php',
      './classes/**/*.php',
      './inc/**/*.php',
      './assets/**/*.scss',
      './assets/**/*.js',
    ],
    options: {
      safelist: ['bg-primary', 'bg-secondary', 'bg-tertiary', 'bg-quaternary', 'bg-gray-50', 'text-primary', 'text-secondary', 'text-tertiary', 'text-quarternary']
    }
  },
  darkMode: false,
  theme: {
    extend: {
      colors: {
        gray: {
          50:  '#fafafa',
          200: '#E3E3E3',
          300: '#E0E0E0',
          400: '#9F9F9F',
          600: '#434343',
          700: '#333333',
          800: '#2F2F31',
        },
        'primary': '#041244',
        'secondary': '#F39200',
        'tertiary': '#C9338A',
        'quaternary': '#EBF2FC'
      },
      fontSize: {
        'zero': ['0', '0'],
        'xxs':  ['0.625rem', '1rem'],
        'xs':   ['0.75rem', '0.938rem'],
        'sm':   ['0.875rem', '1.375rem'],
        'base': ['1rem', '1.25rem'],
        'lg':   ['1.125rem', '1.625rem'],
        '2xl':  ['1.375rem', '1.75rem'],
        '3xl':  ['1.75rem', '2.125rem'],
        '4xl':  ['2.375rem', '2.675rem'],
        '5xl':  ['3rem', '3.375rem'],
        '6xl':  ['3.750rem', '4.125rem']
      },
      fontFamily: {
        'display': ['proxima-nova', 'ui-serif', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
        'body': ['proxima-nova', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"',],
      },
      maxWidth: {
        '2xl': '42.813rem',
        '3xl': '48.750rem',
        '6xl': '73.75rem',
        '7xl': '85rem',
        '8xl': '95.750rem',
        '9xl': '106.25rem',
        '10xl': '120rem'
      },
      spacing: {
        '88': '22.5rem'
      },
      lineHeight: {
        'extra-tight': '1.1'
      },
      boxShadow: {
        'even':     '0 0 10px 0 rgba(0,0,0,0.1)',
        'even-lg':  '0 0 20px 0 rgba(0,0,0,.1)'
      },
      screens: {
        '3xl': '1701px',
      },
      container: {
        padding: {
          DEFAULT: '1rem',
        },
        screens: {
          ...defaultTheme.screens
        }
      },
    },
  },
  // variants: {
  //   extend: {
  //     display: ['important'],
  //     inset: ['important'],
  //     width: ['important'],
  //     height: ['important'],
  //     margin: ['last'],
  //     borderColor: ['important', 'last'],
  //     textColor: ['important'],
  //     overflow: ['important']
  //   },
  // },
  // plugins: [
  //   plugin(function({ addVariant }) {
  //     addVariant('important', ({ container }) => {
  //       container.walkRules(rule => {
  //         rule.selector = `.\\!${rule.selector.slice(1)}`;
  //         rule.walkDecls(decl => {
  //           decl.important = true;
  //         });
  //       });
  //     });
  //   })
  // ],
};
