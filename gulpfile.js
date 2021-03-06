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
	    style:"compressed",
	    relative: true,
	    http_path: false,
	    generated_images_path: false
	});
    mix.compass('app.scss','public/css', {
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
    mix.compass('pdf.scss','public/css', {
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
    mix.scripts([
        'backbone-min.js','underscore-min.js'
    ],'public/js/dictionary.js');
    mix.scripts([
        'fe-script.js'
    ],'public/js/fe-script.js');
    mix.scripts([
        'jquery.form-validator.min.js','list.min.js','clipboard.min.js'
    ],'public/js/scripts.js');
    mix.browserify('app.js');
    mix.copy('node_modules/jquery/dist/jquery.js', 'public/assets/js/jquery.js');
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');
    mix.copy('node_modules/bootstrap/dist/fonts/', 'public/fonts');
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');
    mix.copy('bower_components/list.js/dist/list.min.js', 'resources/assets/js/list.min.js');
    mix.copy('bower_components/jquery-form-validator/form-validator/jquery.form-validator.min.js', 'resources/assets/js/jquery.form-validator.min.js');
    mix.copy('bower_components/clipboard/dist/clipboard.min.js', 'public/js/clipboard.min.js');
    mix.copy('bower_components/backbone/backbone-min.js', 'resources/assets/js/backbone-min.js');
    mix.copy('bower_components/underscore/underscore-min.js', 'resources/assets/js/underscore-min.js');
});

