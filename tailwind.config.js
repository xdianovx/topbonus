/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            container: {
                center: true,
            },
            colors: {
                black: "#1f1f1f",
                blackLight: "#262626",
                gray: "#71717a",
                grayLight: "#cbd5e1",
                accent: "#BC2642",
                orange: "#f97316",
                green: "#16a34b",
                yellow: "#FFC91D",
            },
        },
    },
    plugins: [],
};
