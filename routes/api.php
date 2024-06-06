<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


    Route::get('top-employees', [ApiController::class, 'getTopEmployees']);
    Route::get('applications/{period}', [ApiController::class, 'getApplicationsData']);
    Route::get('calculated-analytics-data', [ApiController::class, 'getCalculatedAnalyticsData']);
    Route::get('get-user-stat/{id}', [ApiController::class, 'getUserStat']);

