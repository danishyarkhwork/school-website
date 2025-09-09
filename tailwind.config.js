import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "#14133D", // Dark navy blue
                accent: "#FFBC00", // Bright yellow
                secondary: "#6B46C1", // Purple
                success: "#10B981", // Green
                warning: "#F59E0B", // Orange
                danger: "#EF4444", // Red
                info: "#3B82F6", // Blue
                light: "#F8FAFC", // Light gray
                dark: "#1E293B", // Dark gray
            },
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                glow: "0 0 0 6px rgba(255,188,0,0.25)",
                "glow-lg": "0 0 0 10px rgba(255,188,0,0.15)",
            },
            animation: {
                float: "float 6s ease-in-out infinite",
                "float-delayed": "float 8s ease-in-out infinite 2s",
            },
            keyframes: {
                float: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-20px)" },
                },
            },
        },
    },

    plugins: [forms],
};
