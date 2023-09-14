/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.php", "./resources/ts/**/*.vue"],
    theme: {
        extend: {
            colors: {
                primary: "#10DFD3",
                primaryLight: "#C4FFF9",
                background: {
                    dark: "#0F0F0F",
                    light: "#F1F1F1",
                },
                paper: {
                    dark: "#282828",
                    light: "#FFFFFF",
                },
                error: "#ef4444",
                success: "#10B981",
                danger: "",
            },
        },
    },
    plugins: [],
};
