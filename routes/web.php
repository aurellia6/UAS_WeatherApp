<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/weather');
});

Route::get('/weather', 'App\Http\Controllers\WeatherController@index');
