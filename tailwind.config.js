import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'jabal-green': '#255F38',
                'jabal-light': '#1F7D53',
                'jabal-putih': '#FFFFFF'
            },
            fontFamily: {
                sans: ['Poppins', 'sans-serif'],
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.25rem'
            }
        },
    },

    plugins: [forms],
};
