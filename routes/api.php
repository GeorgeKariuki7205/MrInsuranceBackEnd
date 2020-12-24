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

// ! General Models.
Route::apiResource('/company','GeneralControllers\CompanyController');
Route::apiResource('/cover','GeneralControllers\CoverController');
Route::apiResource('/insuranceCover','GeneralControllers\InsuranceCoverController');
Route::apiResource('/subCategory','CoverSubCategory');


// ! Health Models.
Route::apiResource('/coverAmounts','HealthCoverControllers\CoverAmountController');
Route::apiResource('/waitingPeriod','HealthCoverControllers\WaitingPeriodController');
Route::apiResource('/notCovered','HealthCoverControllers\NotCoveredController');
Route::apiResource('/healthBenefit','HealthCoverControllers\HealthBenefitController');
Route::apiResource('/healthPremia','HealthCoverControllers\HealthPremiumController');

// ! Health Additional 
Route::apiResource('/healthAdditional','HealthCoverControllers\Additional\HealthAdditionalController');
Route::apiResource('/healthAdditionalBenefit','HealthCoverControllers\Additional\HealthAdditionalBenefitController');
Route::apiResource('/healthAdditionalNotCovered','HealthCoverControllers\Additional\HealthAdditionalNotCoveredController');
Route::apiResource('/healthAdditionalWaitingPeriod','HealthCoverControllers\Additional\HealthAdditionalWaitingPeriodController');
Route::apiResource('/healthAdditionalPremium','HealthCoverControllers\Additional\HealthAdditionalPremiumController');

// ! controller to get the navigation items. 

Route::apiResource('/navigationContent','NavigationController\NavigationController');

Route::apiResource('/insuranceCovers','GettingInsuranceCovers\GettingInsuranceCovers');


// ! Motor Related Models. 
Route::apiResource('/motorPrivateComprehensive','MotorInsuranceControllers\PrivateVehicle\PrivateComprehensiveCoverController');
Route::apiResource('/commercialVehiclesClasses','MotorInsuranceControllers\CommercialVehicle\CommercialClassController');
Route::apiResource('/commercialComprehensiveCost','MotorInsuranceControllers\CommercialVehicle\CommercialComprehensiveCostController');
Route::apiResource('/commercialThirdPartyTypeOfCost','MotorInsuranceControllers\CommercialVehicle\CommercialTypeOfThirdPartyCostController');
Route::apiResource('/commercialThirdPartyCost','MotorInsuranceControllers\CommercialVehicle\CommercialThirdPartyCostController');
Route::apiResource('/motorAdditionalCovers','MotorInsuranceControllers\AdditionalCoverController');



// ! Payments APIs.

// ? old
Route::post('/stkPush', 'Payments\CustomerToOrganisationController@customerMpesaSTKPush');
Route::post('/stkPushCallBack', 'Payments\CustomerToOrganisationController@callBackForTheSTKPush');

// ? new
Route::post('/accessToken','Payments\LipaNaMpesaController@generateAccessTokens');
Route::post('/validationURL','Payments\LipaNaMpesaController@validationMethod');
Route::post('/confirmationURL','Mpesa\LipaNaMpesaController@confirmationMethod');
Route::post('/registerURLS','Payments\LipaNaMpesaController@registerURLS');
Route::post('/simulateTransaction','Payments\LipaNaMpesaController@simulateTransaction');
Route::post('/stkPush', 'Payments\LipaNaMpesaController@customerMpesaSTKPush');
Route::post('/stkPushCallBack', 'Payments\LipaNaMpesaController@callBackForTheSTKPush');
Route::post('/intentionToPay','Payments\IntentionToPayController@store');


// ! creating roles for users. 
Route::get('/addRoles','creationOfRoles@createRolesForUsers');







