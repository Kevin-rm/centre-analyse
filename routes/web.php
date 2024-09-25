<?php

use App\Http\Controllers\ChargeController;
use Illuminate\Support\Facades\Route;

Route::prefix("charge")->controller(ChargeController::class)->group(function () {
    Route::get("/", "show")->name("charge.show");
    Route::get("/formulaire", "create")->name("charge.create");
});
