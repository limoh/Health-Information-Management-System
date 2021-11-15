<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HealthinfoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::namespace('Auth')->group(function () 
{
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/admin/profile', [AdminController::class, 'index'])->name('users.edit');
Route::patch('/admin/profile', [AdminController::class, 'update'])->name('users.update');

Route::get('/facility-profile', [FacilityController::class, 'index'])->name('users.edit');
Route::patch('/facility-profile', [FacilityController::class, 'update'])->name('users.update');

}
);


Route::get('health-info', [HealthinfoController::class, 'index']);
Route::post('add-update-health', [HealthinfoController::class, 'store']);
Route::post('edit-health', [HealthinfoController::class, 'edit']);
Route::post('delete-health', [HealthinfoController::class, 'destroy']);

Route::get('all-facilities', [FacilityController::class, 'facility']);
Route::post('add-update-facility', [FacilityController::class, 'store']);
Route::post('edit-facility', [FacilityController::class, 'edit']);
Route::post('delete-facility', [FacilityController::class, 'destroy']);

/*
Facility CRUD routes
*/
Route::get('admin/facility-list', [AdminController::class, 'facility']);
Route::post('add-update-facility', [AdminController::class, 'store']);
Route::post('edit-facility', [AdminController::class, 'edit']);
Route::post('delete-facility', [AdminController::class, 'destroy']);

Route::get('admin/health-list', [AdminController::class, 'health']);
Route::post('add-update-health', [AdminController::class, 'healthstore']);
Route::post('edit-health', [AdminController::class, 'healthedit']);
Route::post('delete-health', [AdminController::class, 'healthdestroy']);





