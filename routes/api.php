<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sign-up', [ApiController::class,"api_register"]);
Route::post('/sign-in', [ApiController::class,"api_login"]);
Route::post('/client-details', [ApiController::class,"client_details"]);

Route::post('/server-registration', [ApiController::class,"server_registration"]);
Route::post('/server-login', [ApiController::class,"server_login"]);

Route::post('/active-request', [ApiController::class,"active_status"]);
Route::post('/create-request', [ApiController::class,"create_request"]);
Route::post('/update-request', [ApiController::class,"pause_request"]);

Route::post('/place-order', [ApiController::class,"place_order"]);

Route::post('/request-details', [ApiController::class,"request_details"]);
Route::post('/offers', [ApiController::class,"get_offer"]);

