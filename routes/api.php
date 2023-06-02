<?php

use App\Http\Controllers\API\ContactInfo\ContactInfoController;
use App\Http\Controllers\API\CurrentEarthquake\CurrentEarthquakeController;
use App\Http\Controllers\API\CurrentEarthquake\FilterController;
use App\Http\Controllers\API\Feedback\CreateController;
use App\Http\Controllers\API\Feedback\FedbackController;
use App\Http\Controllers\API\GlobalMonitoring\GlobalMonitoringController;
use App\Http\Controllers\API\Home\HomeController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\MapRegion\MapRegionController;
use App\Http\Controllers\API\News\NewsController;
use App\Http\Controllers\API\PressReleases\FilterController as PressReleasesFilterController;
use App\Http\Controllers\API\PressReleases\PressReleaseController;
use App\Http\Controllers\API\RegionalMonitoring\RegionalMonitoringController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:api'], function () {

// });

Route::apiResources([

    'press-releases' => PressReleaseController::class,
    'current-earthquake' => CurrentEarthquakeController::class,
    'news' => NewsController::class,
    'regions'=>GlobalMonitoringController::class,
    'regional-monitoring' => RegionalMonitoringController::class
]);

Route::get('languages', [LanguageController::class, 'index']);  /**updated*/
Route::get('home', [HomeController::class, 'index']);  /**updated*/

Route::post('feedback/create', [CreateController::class, 'index']);

Route::get('contact-info', [ContactInfoController::class, 'index']);

Route::get('current-earthquakes-filter', [FilterController::class, 'filter']);

Route::get('press-releases-filter', [PressReleasesFilterController::class, 'filter']);


Route::get('map-region-info/{id}',[MapRegionController::class,'mapRegionInfo']);
Route::get('region-info/{id}',[MapRegionController::class,'regionInfo']);



