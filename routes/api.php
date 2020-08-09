<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/company','GeneralControllers\CompanyController');
Route::apiResource('/cover','GeneralControllers\CoverController');
Route::apiResource('/insuranceCover','GeneralControllers\InsuranceCoverController');
Route::apiResource('/coverAmounts','HealthCoverControllers\CoverAmountController');
Route::apiResource('/waitingPeriod','HealthCoverControllers\WaitingPeriodController');
Route::apiResource('/notCovered','HealthCoverControllers\NotCoveredController');
