import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.{blade.php, vue, js}",
    "./node_modules/flowbite/**/*.js",
  ],

  theme: {
    fontSize: {
      "nav-landing": "27px",
    },
    backgroundImage: {
    //   gradient: "url('../../public/assets/SVGs/gradientBG.svg')",
      gradientblob: "url('../../public/assets/SVGs/gradientblob.svg')",
    },
    spacing: {
      laptop: "160px",
      defaultx: "60px",
      defaulty: "45px",
      logo: "60px",
    },
    colors: {
      darkblue: "#190482",
      lightpurple: "#E1E0FF",
      highlight: "#C4E67B",
      tailwindDark: "#0f172a",
      navpurple: "#F6F6FF",
      profile: "#141339",
      photo: "#282060",
      active: "#656DC5",
      "indicator-light": "#DDD8E8",
      "indicator-dark": "#656DC5",
      "book-card": "#EEEEFE",
      "list-peringkas": "#DEDEFE",
      "read-btn": "#514F91",
    },
    extend: {
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
        albert: ["Albert Sans", "sans-serif"],
        merriweather: ["Merriweather Sans", "sans-serif"],
      },
      animation: {
        zoom: "zoom 0.3s",
      },
      keyframes: {
        zoom: {
          "0%": { transform: "scale(0)" },
          "100%": { transform: "scale(1)" },
        },
      },
    },
  },

  plugins: [forms, require("flowbite/plugin")],
};
