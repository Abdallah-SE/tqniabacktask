<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\shows\ShowController;
use App\Http\Controllers\API\V1\venues\VenueController;
use App\Http\Controllers\API\V1\artists\ArtistController;

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


Route::prefix('v1')->group(function () { // prfixed /v1 for routes within the group -> artists, venues and shows
    Route::apiResource('artists', ArtistController::class);
    Route::apiResource('venues', VenueController::class);
    Route::apiResource('shows', ShowController::class);
});
