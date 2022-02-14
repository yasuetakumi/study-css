<?php

use Illuminate\Http\Request;

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

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {

    // /* COMPANY */
    // Route::get('companies', 'API\ApiCompanyController@all');
    // Route::get('company/{id}', 'API\ApiCompanyController@single');

    // /* PLACE */
    // Route::get('places', 'API\ApiPlaceController@all');
    // Route::get('place/{id}', 'API\ApiPlaceController@single');

    // /* USER */
    // Route::get('users', 'API\ApiUserController@all');
    // Route::get('user/{id}', 'API\ApiUserController@single');
    // Route::get('company_users/{id}', 'API\ApiUserController@companyUsers');

    /*POSTCODE*/
    Route::get('postcode/{postcode}', 'API\ApiPostcodeController@address');

    // Get Grand total Estimation
    Route::get('/plans/getGrandTotalEstimation/{plan}/{tsubo}/{design}/{kitchen}/{designCat?}','API\ApiEstimateController@getGrandTotalEstimation');

    //Get Property
    Route::post('property/getProperties', 'API\ApiPropertyController@getPropertyByFilter')->name('api.property.count');
    Route::post('property/getPropertiesCount', 'API\ApiPropertyController@getPropertyByFilter');
    Route::post('property/getPropertyCountByCity', 'API\ApiPropertyController@getPropertyCountByCity');
    Route::post('property/getPropertyByStation', 'API\ApiPropertyController@getPropertyByStation');
    //Design Styles
    Route::get('/design-styles/getDesignByCategory/{category_id}', 'API\ApiDesignStyleController@getDesignByCategory');

    //Plan
    Route::get('/plans/getPlansByCategory/{category_id}', 'API\ApiPlanController@getPlanByCategory');
    Route::get('/plans/getPlanByAreaGroup/{category_id}/{area_id}', 'API\ApiPlanController@getPlanByAreaGroup');
    Route::get('/plans/getPlanBySurfaceAndCategory/{surface}/{area_id}', 'API\ApiPlanController@getPlanBySurfaceAndCategory');

    //Station
    Route::get('/station/getStationByStationLine/{station_line}', 'API\ApiStationController@getStationByStationLine');

    //History
    Route::post('history/getPropertyHistoryOrFavorite', 'API\ApiPropertyHistoryController@getPropertyHistoryOrFavorite');
});
