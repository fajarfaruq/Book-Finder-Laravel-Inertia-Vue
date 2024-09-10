import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// Add the import below
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        // Add this vue plugin configuration here
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        })
    ],
    resolve: {
        alias: {
          '@': path.resolve(__dirname, 'resources/js'),
        },
    },
});