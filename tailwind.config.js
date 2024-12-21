/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './views/*.php',
    './views/*.html',
    './views/*.js',
    './layout/*.php',
    './layout/*.html',
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

