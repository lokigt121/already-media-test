import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    root: './assets',
    base: '/wp-content/themes/already-media-test/assets/dist/',
    build: {
        outDir: '../dist',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'assets/scss/main.scss'),
            }
        }
    },
    server: {
        cors: false,
        origin: 'localhost'
    }
});