<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->controller(AuthController::class)->group(function () {

    Route::get("/login", "login")->name("LoginView");
    Route::get("/dashboard", "dashboard")->name("DashboardView");
});
