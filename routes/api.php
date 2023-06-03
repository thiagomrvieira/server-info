<?php

use App\Http\Controllers\API\V1\ServerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/
Route::prefix('v1')->group(function () {

    Route::resource('servers', ServerController::class)->only([
        'index', 'show'
    ]);

});

