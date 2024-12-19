/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './views/*.php',
    './views/*.html',
    './views/*.js',
  ],
  theme: {
    extend: {
    },
  },
  darkMode: 'class',
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes: ["bumblebee", "night"],
  }
}

