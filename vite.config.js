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
                'resources/css/admin/adminlte.css',
                'resources/css/admin/adminlte.min.css',
                'resources/js/admin/adminlte.js',
                'resources/js/admin/adminlte.min.js',
            ],
            refresh: true,
        }),
        
        tailwindcss(),
    ],
  
    server: {
        host: true, // hoặc '0.0.0.0'
        hmr: {
          host: 'localhost', // hoặc VS Live Share hostname nếu cần
        }
    }
});
