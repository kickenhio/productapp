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
    mix.copy('resources/components/angular/angular.min.js', 'public/js/angular.js')
		.copy('resources/components/angular-route/angular-route.min.js', 'public/js/angular-route.js')
		.copy('resources/components/angular-animate/angular-animate.min.js', 'public/js/angular-animate.js')
		.copy('resources/components/angular-animate/angular-resource.min.js', 'public/js/angular-resource.js')
		.copy('resources/components/vex/js/vex.combined.min.js', 'public/js/vex.js')
		.copy('resources/components/vex/css/vex-theme-os.css', 'public/css/vex-theme-os.css')
		.copy('resources/components/vex/css/vex.css', 'public/css/vex.css');
});
