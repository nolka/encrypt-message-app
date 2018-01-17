var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir(function (mix) {
    mix
        .browserify('app.js')
        .scripts(['app.js']);
});
//kek


elixir(function(mix){
    mix
        .sass('app.scss')
})