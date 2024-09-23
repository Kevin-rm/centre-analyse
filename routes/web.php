<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/centre', function () {
    return view('centre_form');
});

Route::get('/centre_charge', function () {
    return view('centre_charge_form');
});

Route::get('/charge', function () {
    return view('charge_form');
});

Route::get('/unit', function () {
    return view('unit_oeuvre_form');
});