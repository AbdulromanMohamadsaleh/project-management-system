import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import Sortable from 'sortablejs';
// import 'jquery-sortablejs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
