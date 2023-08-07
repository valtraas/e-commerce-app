/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: ["./resources/**/*.blade.php",
    "./resources/**/*.js",
    ".resources/**/*.vue"],
  theme: {
    extend: {
      colors: {
        'active': '#2ACC02',
        'footer': '#2D6006'
      },
      fontFamily: {
        'Poppins': 'Poppins'
      }
    },
  },
  plugins: [],
}

