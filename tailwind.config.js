import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                dprimary: "#EF9C66",
                lprimary: "#f3b58c",
                orange: "#FD7E0B",
                tblack: "#1F2937",
                caption: "#9CA3AF",
                lwhite: "#F5F5F5",
                tgrey: "#9CA3AF",
                dgrey: "#E7E9E9",
                cardsidebar: "#D9D9D9",
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
};
