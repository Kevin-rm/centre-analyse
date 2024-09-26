<?php

use App\Http\Controllers\CentreController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\UniteOeuvreController;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "/charge")->name("home.redirect");

Route::prefix("charge")->controller(ChargeController::class)->group(function () {
    Route::get("/", "show")->name("charge.show");
    Route::get("/formulaire", "create")->name("charge.create");
});

Route::prefix("centre")->controller(CentreController::class)->group(function () {
    Route::get("/", "show")->name("centre.show");
    Route::get("/formulaire", "create")->name("centre.create");
});

Route::prefix("unite-oeuvre")->controller(UniteOeuvreController::class)->group(function () {
    Route::get("/", "show")->name("unite_oeuvre.show");
    Route::get("/formulaire", "create")->name("unite_oeuvre.create");
});
