<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HealthinfoController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\WorkerLoginController;
use App\Http\Controllers\Auth\WorkerRegisterController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('worker/home', [HomeController::class, 'workerHome'])->name('worker.home');

Route::namespace('Auth')->group(function () 
{
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/admin/profile', [AdminController::class, 'index'])->name('users.edit');
Route::patch('/admin/profile', [AdminController::class, 'update'])->name('users.update');
Route::get('/adminshow-health/{id}', [AdminController::class, 'show'])->name('adminshow-health');
Route::get('/show-health/{id}', [AdminController::class, 'healthshow'])->name('show-health');

Route::get('/facility-profile', [FacilityController::class, 'index'])->name('users.edit');
Route::patch('/facility-profile', [FacilityController::class, 'update'])->name('users.update');

/*
|worker routes
*/
Route::get('/worker/worker-profile', [DashboardController::class, 'index'])->name('users.edit');
Route::patch('/worker/worker-profile', [DashboardController::class, 'update'])->name('users.update');
Route::get('/workershow-health/{id}', [DashboardController::class, 'show'])->name('workershow-health');
Route::get('/show-healths/{id}', [DashboardController::class, 'healthshow'])->name('show-healths');

}
);
Route::group(['middleware' => ['auth']], function() {


   

});
/*
*Email verification
*Worker Routes

Route::prefix('worker')->group(function() {
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('/worker-login',[WorkerLoginController::class, 'showLoginForm'])->name('worker.login');
    Route::post('/worker-login', [WorkerLoginController::class, 'login'])->name('worker.login.submit');
    Route::get('logout/', [WorkerLoginController::class, 'logout'])->name('worker.logout');
    Route::get('/worker-register',[WorkerRegisterController::class, 'showRegisterForm'])->name('worker.register');
    Route::post('/worker-register', [WorkerRegisterController::class, 'workerregister'])->name('worker.register.submit');



     Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             
            Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    });

   }) ;
*/


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

Route::get('admin/worker-list', [AdminController::class, 'worker']);
Route::post('add-update-worker', [AdminController::class, 'storeworker']);
Route::post('edit-worker', [AdminController::class, 'editworker']);
Route::post('delete-worker', [AdminController::class, 'destroyworker']);

/*
|Worker
*/
Route::get('worker/worker-health', [DashboardController::class, 'health']);
Route::post('add-update-healths', [DashboardController::class, 'healthstore']);
Route::post('edit-healths', [DashboardController::class, 'healthedit']);
Route::post('delete-healths', [DashboardController::class, 'healthdestroy']);






