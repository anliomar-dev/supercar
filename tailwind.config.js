/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './views/*.php',
    './views/*.html',
    './views/*.js',
    './components/*.php',
    './components/*.html',
  ],
  theme: {
    extend: {
      fontFamily: {
        default: ['Roboto', 'system-ui', '-apple-system', 'Segoe UI', 'Helvetica Neue', 'Arial', 'Noto Sans', 'Liberation Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
        comic: ['"Comic Sans MS"', 'sans-serif'],
        nav: ['Inter', 'sans-serif'],
      },
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

