/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      backgroundImage: {
        netural:
          'url("https://w0.peakpx.com/wallpaper/1002/456/HD-wallpaper-anime-forest-scenery-forest-anime-mountain-nature.jpg")',
      },
      minHeight: {
        "1/2": "50px",
      },
      fontFamily: {
        kanit: ["kanit", "sans-serif"],
      },
      maxWidth: {
        30: "30%",
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
