let mix = require('laravel-mix');

// Put your scripts here - compile with "yarn run dev"
mix.setPublicPath('public');

mix
    .js('assets/js/app.js', 'js/app.js')
    .sass('assets/sass/app.scss', 'css/app.css');