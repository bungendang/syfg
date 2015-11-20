var elixir = require('laravel-elixir');
require('laravel-elixir-sass-compass');
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

elixir.config.production = true;

elixir(function(mix) {
    mix.compass('main.scss','public/assets/css', {
	    require: ['susy'],
	    sass: "resources/assets/sass",
	    font: "public/assets/fonts",
	    image: "public/assets/images",
	    javascript: "public/assets/js",
	    sourcemap: true,
	    comments: true,
	    relative: true,
	    http_path: false,
	    generated_images_path: false
	});
	mix.scripts([
        'main.js'
    ],'public/assets/js/main.js');
    mix.copy('node_modules/jquery/dist/jquery.js', 'public/assets/js/jquery.js');
});

