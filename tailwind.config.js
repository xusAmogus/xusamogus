const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        ['./src/**/*.{html,js}', './node_modules/tw-elements/dist/js/**/*.js']
    ],

    theme: {
        extend: {
            fontFamily: {
                fatface: ["Abril Fatface", "cursive"],
                pinstripe: ["Alumni Sans Pinstripe", "sans-serif"]

            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tw-elements/dist/plugin')
    ],

};
