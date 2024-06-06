import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/chartjs.js', 'resources/js/export-to-excel.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        target: 'esnext',
        manifest: true,
        rollupOptions: {
            input: {
                main: 'resources/js/app.js',
                chartjs: 'resources/js/chartjs.js',
                exportToExcel: 'resources/js/export-to-excel.js',
                style: 'resources/css/app.css'
            }
        }
    }
});
