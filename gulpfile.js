var elixir = require('laravel-elixir');

elixir(function(mix) {
    var paths = {
        'js'  : 'public/js/bundle.js',
        'css' : 'public/css/bundle.css'
    }

    mix
        .sass('app.scss', paths.css)
        .browserify('app.js', paths.js)
        .version([paths.js, paths.css]);
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
