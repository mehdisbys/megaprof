var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.styles([
        'bootstrap.css',
        'normalize.css',
        'dashboard.css',
        'fonts.css',
        'footer.css',
        'header.css',
        'main.css',

        'custom.css',
        'font-icons.css',
        'toastr.min.css',
        'checkbox-button.css',
        'magnific-popup.css'
    ]);


});
