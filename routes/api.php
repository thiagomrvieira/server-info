<?php

use App\Http\Controllers\API\V1\LocationController;
use App\Http\Controllers\API\V1\ServerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {
    Route::get('servers',   [ServerController::class,   'index'])->name('servers.index');
    Route::get('locations', [LocationController::class, 'index'])->name('locations.index');
});

