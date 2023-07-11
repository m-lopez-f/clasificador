let mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js','.vue'],
        alias: {
            '@': __dirname + '/resources'
        }
    }
});

mix.js('resources/assets/js/app.js', 'dist/')
    .sass('resources/assets/sass/app.scss', 'dist/')
    .version();