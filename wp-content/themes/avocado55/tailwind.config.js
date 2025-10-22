/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.php', './partials/*.php', './blocks/*.php', './templates/*.php'],
  theme: {
    extend: {
      colors: {
        'red': '#FF1F2E'
      },
      lineHeight: {
        'leading-4.5': '1.15'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
