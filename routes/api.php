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
    Route::get('getPostCode', 'API\ApiPostcodeController@getPostcode')->name('select2.postcode');
    // Prefecture
    Route::get('select2Prefecture', 'API\ApiPrefectureController@seletc2Prefecture')->name('select2.prefecture');
    // City
    Route::get('select2city', 'API\ApiCityController@select2City')->name('select2.city');
    Route::get('/city/getCityByPrefecture/{prefecture_id}', 'API\ApiCityController@getCityByPrefecture')->name('api.city.by.prefecture');
    // User Company
    Route::get('select2usercompany/{companyId?}', 'API\ApiUserCompanyController@select2UserCompany')->name('select2.usercompany');
    // Get Grand total Estimation
    Route::get('/plans/getGrandTotalEstimation/{plan}/{tsubo}/{design}/{kitchen}/{designCat?}','API\ApiEstimateController@getGrandTotalEstimation');
    Route::post('/plans/getEstimationByPlanAndCategory', 'API\ApiEstimateController@getEstimationByPlanAndCategory');

    //Get Property
    Route::post('property/getProperties', 'API\ApiPropertyController@getPropertyByFilter')->name('api.property.count');
    Route::post('property/getPropertiesCount', 'API\ApiPropertyController@getPropertyByFilter');
    //Design Styles
    Route::get('/design-styles/getDesignByCategory/{category_id}', 'API\ApiDesignStyleController@getDesignByCategory');
    Route::get('/design-styles/getDesignByCategoryFrontentProperty/{category_id}/{property_id}', 'API\ApiDesignStyleController@getDesignByCategoryFrontentProperty');

    //Plan
    Route::get('/plans/getPlansByCategory/{category_id}', 'API\ApiPlanController@getPlanByCategory');
    Route::get('/plans/getPlanByAreaGroup/{category_id}/{area_id}', 'API\ApiPlanController@getPlanByAreaGroup');
    Route::get('/plans/getPlanBySurfaceAndCategory/{surface}/{area_id}', 'API\ApiPlanController@getPlanBySurfaceAndCategory');

    //Station
    Route::get('/station/getStationByStationLine/{station_line}/{prefecture_id}', 'API\ApiStationController@getStationByStationLine');
    Route::get('/station/getStationByPrefecture/{prefecture_id}', 'API\ApiStationController@getStationByPrefecture')->name('api.station.by.prefecture');
    Route::get('/station/getStationLineByPrefecture/{prefecture_id}', 'API\ApiStationController@getStationLineByPrefecture')->name('api.station.line.by.prefecture');
    Route::get('/select2stationline/{prefecture_id}', 'API\ApiStationController@select2StationLineByPrefecture')->name('select2.stationline');
    // Route::get('/select2station/{station_line_id}', 'API\ApiStationController@select2StationByStationLine')->name('select2.station');

    //History
    Route::post('history/getPropertyHistoryOrFavorite', 'API\ApiPropertyHistoryController@getPropertyHistoryOrFavorite');
});
