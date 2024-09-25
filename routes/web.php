<?php

use App\Http\Controllers\CentreController;
use App\Http\Controllers\ChargeController;
use Illuminate\Support\Facades\Route;

Route::prefix("charge")->controller(ChargeController::class)->group(function () {
    Route::get("/", "show")->name("charge.show");
    Route::get("/formulaire", "create")->name("charge.create");
});

Route::prefix("centre")->controller(CentreController::class)->group(function () {
    Route::get("/", "show")->name("centre.show");
    Route::get("/formulaire", "create")->name("centre.create");
});
