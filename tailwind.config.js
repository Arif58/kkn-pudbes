/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        "putih": "#FFF4F4",
        "kuning": "#F7E6C4",
        "oren": "#F1C376",
        "hijau": "#606C5D"
      },
      backgroundImage: {
        'bgfood': "url('../public/images/food.jpg')",
      },
    },
  },
  plugins: [],
}