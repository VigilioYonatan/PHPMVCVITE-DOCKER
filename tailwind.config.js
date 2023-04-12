/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.php", "./resources/ts/**/*.tsx"],
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
                hrColor: "#3F3F3F",
                gray: "#3F3F3F",
                gray2: "#848684",
                tansparent: "rgba(0, 0, 0, 0)",
                error: "#ef4444",
                success: "#10B981",
                orange: "#F97316",
                blue: "#0284C7",
                pink: "#EC4899",
            },
            textColor: {
                light: "#fff",
                dark: "#000",
            },
        },
    },
    plugins: [],
};
