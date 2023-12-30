/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.{html,js,php}'//se lo va asignar a todos
  ],
  // ...
  plugins: [require("daisyui")],
  daisyui: {
    themes: ["cupcake", "light", "lofi"],
  }
}