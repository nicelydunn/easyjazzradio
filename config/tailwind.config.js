module.exports = {
  mode: 'jit',
  content: ["../**/*.php", "../**/*.js", "*.html"], 
  safelist: [
    'object-top'
  ],
  // purge: ['../wp-content/themes/maryboro/*.php', '../wp-content/themes/maryboro/template-parts/*.php'],
  // purge: {
  //     enabled: true,
      
  //     safelist: [
  //       'rounded-md',
  //       'pt-2',
  //     ]
  // },
  // darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      container: {
        padding: {
          DEFAULT: '1rem',
          sm: '2rem',
          lg: '4rem',
          xl: '5rem',
          '2xl' : '6rem',
        },
      },
      fontFamily: {
        'lora': ['Lora', 'serif'],
      },
      spacing: {
        '16/9': '56.25%',
        '2/3': '66.66667%',
        '4/3': '75%',
        '3/2': '150%',
        '4/5': '125%',
        '190/15': '8%'
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography'),
  ],
}
