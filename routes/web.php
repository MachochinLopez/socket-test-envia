<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', [ShipmentController::class, 'home']);
Route::post('/shipment', [ShipmentController::class, 'storeExampleShipment'])->name('create_shipment');
