var elixir = require('laravel-elixir');


elixir(function (mix) {
    mix.styles([
        'app.min.css',
        'notie.css',
        'vue-animate.css',
        'dataTables.bootstrap4.min.css',
        'admin.css'
    ]);
});

elixir(function (mix) {
    mix.scripts([
        'app.min.js',
        'notie.js',
        'jquery.dataTables.js',
        'dataTables.bootstrap4.min.js',
        'chart.min.js',
        'vue.js',
        'vue-resource.js',
        'app.js',
    ]).scripts(['user-profile.js'],
        'public/js/user-profile.js').browserSync();
});
