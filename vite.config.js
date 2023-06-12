import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                // true,
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
        react(),
    ],
});
