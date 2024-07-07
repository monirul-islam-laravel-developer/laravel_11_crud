<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\InfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function ()
{
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubCategoryController::class);
    Route::resource('logos',LogoController::class);
    Route::resource('privacyPolicy',PrivacyPolicyController::class);
    Route::resource('slider',SliderController::class);
    Route::resource('aboutus',AboutUsController::class);
    Route::resource('info',InfoController::class);

});
