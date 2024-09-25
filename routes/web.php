<?php

use Illuminate\Support\Facades\Route;

//
Route::get('/', function () {
    return view('charge/formulaire');
});

Route::get('/unite_form', function () {
    return view('unite/formulaire');
});

Route::get('/charge_form', function () {
    return view('charge/formulaire');
});

Route::get('/centre_form', function () {
    return view('centre/formulaire');
});

