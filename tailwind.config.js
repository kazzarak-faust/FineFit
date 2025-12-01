import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            
            // Tambahkan palet warna kustom di sini
            colors: {
                // Warna Cokelat Utama FineFit (Digunakan untuk Tombol dan Navigasi Aktif)
                'brown': {
                    50: '#fcf8f5',
                    100: '#f5f0ec',
                    200: '#e5dcd6',
                    600: '#8b5a45',
                    700: '#6f4a38', // Warna dominan untuk tombol/sidebar aktif
                    800: '#523727',
                    900: '#35241b',
                },
                // Warna Cream/Krem (Digunakan untuk Latar Belakang Sidebar atau Elemen Lembut)
                'cream': {
                    100: '#f9f6f3',
                    200: '#f3ece3',
                },
                // Warna Lainnya (Opsional: Teal dan Orange untuk Badge Fitur)
                'teal': {
                    100: '#c2f8f6',
                    800: '#008080',
                },
                'orange': {
                    100: '#fff3e0',
                    800: '#ff8f00',
                },
            },
        },
    },

    plugins: [forms],
};