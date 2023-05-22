import { defineConfig } from 'vite';
import postcss from 'rollup-plugin-postcss';

export default defineConfig({
    build: {
        outDir: 'resources/dist',
        assetsDir: 'assets',
        cssCodeSplit: false,
        watch: true,
        cssMinify: false,
        minify: false,
        lib: {
            entry: 'resources/css/arktik-admin.app.css',
            name: 'arktik-admin'
        }
    },
    plugins: [
        postcss({
            extract: 'arktik-admin.app.css',
            plugins: [
                require('tailwindcss')
            ]
        }),
    ],
});
