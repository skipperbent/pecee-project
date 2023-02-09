let mix = require('laravel-mix');

mix.options({
    fileLoaderDirs: {
        fonts: 'fonts',
        images: 'img'
    }
});

// Put your scripts here - compile with "yarn run dev"
mix.setPublicPath('public');

mix
    .js('assets/js/app.js', 'js/app.js')
    .sass('assets/sass/app.scss', 'css/app.css');