/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        hex: {
          border: "#E6683C",
        },
      },
      fontFamily: {
        title: ["Chakra Petch", "sans-serif"],
      },
      keyframes: {
        fade_up: {
          "0% ": { transform: " translateY(100px)" },
          "100%": { transform: "translateY(0px)" },
          "0%": { opacity: "0" },
          "100%": { opcaity: "1" },
        },
        fade_up1: {
          "0% ": { transform: " translateX(100px)" },
          "100%": { transform: "translateX(0px)" },
          "0%": { opacity: "0" },
          "100%": { opcaity: "1" },
        },
        fade_in: {
          "0%": { opacity: "0" },
          "100%": { opcaity: "1" },
        },
        cursor: {
          "50%": { color: "transparent" },
        },
        typing: {
          from: { width: "0" },
        },
      },
      animation: {
        fade_up: "fade_up 3s ease-in ",
        fade_in: "fade_in 1.5s ease-in ",
        fade_up1: "fade_up1 1s ease-in ",
        cursor: "cursor .4s step-end infinite alternate",
        typing: "typing 5s ",
      },
    },
  },
  plugins: [],
};
