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
        'food1': "url('/public/images/food.jpg')",
        'food2': "url('/public/images/food.png')",
        'akg1': "url('/public/images/akg1.jpg')",
        'akg2': "url('/public/images/akg2.jpg')",
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif']
      },
    },
  },
  plugins: [],
}