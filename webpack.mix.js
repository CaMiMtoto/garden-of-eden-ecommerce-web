let mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/custom.scss', 'public/css');


mix.js('resources/js/master.js', 'public/js')
    .sass('resources/sass/master.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
} else {
    mix.browserSync('http://127.0.0.1:8000');
}



