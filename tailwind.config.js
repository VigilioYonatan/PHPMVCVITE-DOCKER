/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.php", "./resources/ts/**/*.vue"],
    theme: {
        extend: {
            colors: {
                primary: "#FB6017",
                paper: "#F1F1F1",
                secondary: "#222222",
                terciary: "#666666",
            },
            textColor: {
                secondary: "#868686",
            },
        },
        plugins: [],
    },
};
