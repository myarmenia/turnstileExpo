<?php

use App\Http\Controllers\Admin\Profile\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\PressReleases\PressReleaseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrentEarthquakes\CurrentEarthquakesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);


// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {

            Route::resource('/roles', RoleController::class);
            Route::resource('/users', UserController::class);
            // Route::resource('/permissions', PermissionController::class);
            route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        });

    });

    Route::resource('press-release', PressReleaseController::class);

    Route::resource('news', NewsController::class);


    Route::resource('current-earthquakes', CurrentEarthquakesController::class);


});


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('get-file', [FileUploadService::class, 'get_file'])->name('get-file');
