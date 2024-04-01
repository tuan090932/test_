<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'App\Http\Controllers\HomeController@gethome')->name('home');


Route::post('/process_vote', 'App\Http\Controllers\HomeController@process_vote')->name('process_vote');
