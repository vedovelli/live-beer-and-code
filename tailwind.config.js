module.exports = {
  purge: ["./resources/views/**/*.blade.php", "./resources/js/**/*.vue"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [require("@tailwindcss/forms")],
};
