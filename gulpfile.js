var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss').version('css/app.css');
});

/*
 * Watch for changes to any JS or SCSS files in the assets
 * folders, then trigger the default laravel mix task.
 *
 */
elixir.extend('watch-all', function(message) {
    this.watch('./resources/assets/sass/*.scss');
    this.watch('./resources/assets/js/*.js');
});
