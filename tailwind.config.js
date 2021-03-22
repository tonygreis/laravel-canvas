const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: "class",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            // Build your palette here
            transparent: "transparent",
            current: "currentColor",
            gray: colors.trueGray,
            blueGray: colors.blueGray,
            red: colors.red,
            orange: colors.orange,
            blue: colors.lightBlue,
            yellow: colors.amber,
            green: colors.green,
            teal: colors.teal,
            cyan: colors.cyan,
            indigo: colors.indigo,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
        },

    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require('@tailwindcss/aspect-ratio'),
    ],
};
