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

    Route::apiResource('servers', ServerController::class)->only([
        'index', 'show'
    ]);

    Route::get('locations', [LocationController::class, 'index']);

});

