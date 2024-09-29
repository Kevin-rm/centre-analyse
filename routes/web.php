<?php

use App\Http\Controllers\CentreController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\UniteOeuvreController;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "/charge")->name("home.redirect");

Route::prefix("charge")->controller(ChargeController::class)->group(function () {
    Route::get("/", "show")->name("charge.show");
    Route::get("/formulaire", "create")->name("charge.create");
    Route::post("/store","store")->name("charge.store");
});

Route::prefix("centre")->controller(CentreController::class)->group(function () {
    Route::get("/", "show")->name("centre.show");
    Route::get("/formulaire", "create")->name("centre.create");
    Route::post("/store","store")->name("centre.store");
    Route::get("/edit/{id}","edit")->name("centre.edit");
    Route::put("/update/{id}","update")->name("centre.update");
    Route::get("/delete/{id}","destroy")->name("centre.destroy");
});

Route::prefix("unite-oeuvre")->controller(UniteOeuvreController::class)->group(function () {
    Route::get("/", "show")->name("unite_oeuvre.show");
    Route::get("/formulaire", "create")->name("unite_oeuvre.create");
    Route::post("/store", "store")->name("unite_oeuvre.store");
    Route::get("/edit/{id}","edit")->name("unite_oeuvre.edit");
    Route::put("/update/{id}","update")->name("unite_oeuvre.update");
    Route::get("/delete/{id}","destroy")->name("unite_oeuvre.destroy");
});
