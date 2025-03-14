import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';



export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/wel.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        proxy: {
            '/': {
                target: 'http://127.0.0.1:8000', // Laravel server
                changeOrigin: true,
                secure: false,
            },
        },
    },
});




