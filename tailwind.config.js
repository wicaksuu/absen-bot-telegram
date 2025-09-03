import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import daisyui from 'daisyui'; // Plugin DaisyUI untuk komponen siap pakai (AI)

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    // Konfigurasi DaisyUI untuk tema terang dan gelap (AI)
    daisyui: {
        themes: ['light', 'dark'],
    },

    // Menambahkan DaisyUI untuk gaya antarmuka modern (komentar AI)
    plugins: [forms, typography, daisyui],
};
