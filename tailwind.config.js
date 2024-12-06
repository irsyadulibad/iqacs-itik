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
                inter: ['Inter', "sans-serif"],
            },
            fontSize: {
                'h1': '48px',
                'h2': '40px',
                'h3': '33px',
                'h4': '28px',
                'h5': '23px',
                'title1': '19px',
                'title2': '16px',
                'title3': '8px',
                'body': '13px',
                'caption': '11px',
            },
            screens: {
                '2xl': '1440px'
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
};
