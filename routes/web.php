<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'CurrenciesController@index');
Route::resource('currencies','CurrenciesController');
