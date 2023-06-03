<?php

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\FastExcel\FastExcel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $servers = (new FastExcel)->import('LeaseWeb_servers_filters_assignment.xlsx', function ($line) {
        return Server::make([
            'model' => $line['Model'],
            'ram' => $line['RAM'],
            'hdd' => $line['HDD'],
            'location' => $line['Location'],
            'price' => $line['Price']
        ]);
    });

    return $servers->all();
});
