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

elixir(function (mix) {

    mix.styles([
      //  'style.css',
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
        'magnific-popup.css',
        'dark.css',
        'responsive.css'
    ]);

    mix.styles([
        'bootstrap.css',
        'style.css',
        'dashboard.css',
        'dark.css',
        'font-icons.css',
        'animate.css',
        'magnific-popup.css',
        'checkbox-button.css',
        'custom.css',
        'responsive.css' ,
        'toastr.min.css'
    ], 'public/css/__master-all.css');

    mix.scripts(['step1.js'], 'public/js/step1.js');
    mix.scripts(['step2.js'], 'public/js/step2.js');
    mix.scripts(['step3.js'], 'public/js/step3.js');
    mix.scripts(['step4.js'], 'public/js/step4.js');
    mix.scripts(['step5.js'], 'public/js/step5.js');
});
