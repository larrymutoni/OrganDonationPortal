<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CausesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\EssaieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginHospitalsController;
use App\Http\Controllers\RegisterHospitalsController;
use App\Http\Controllers\RegistrationDonorsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/causes', [CausesController::class, 'index']);
Route::get('/event', [EventController::class, 'index']);
Route::get('/donate', [DonateController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/register', [RegistrationDonorsController::class, 'index']);
Route::get('/loginHospitals', [LoginHospitalsController::class, 'index']);
Route::get('/hospitalRegister', [RegisterHospitalsController::class, 'index']);

Route::POST('/Createreg', [RegistrationDonorsController::class, 'create']);
Route::POST('/login', [DonateController::class, 'login']);
Route::get('profile', [EssaieController::class, 'profile']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/donateform', [DonateController::class, 'index2']);

// Routes for pratice
// Route::view('/essaielogin', [EssaieController::class, 'essaie']);
// Route::post('user', [EssaieController::class, 'login']);
// Route::view('profile', 'profile');
// Route::get('/essaielogin', function () {
//     if (session()->has('user')) {
//         return redirect('profile');
//     }
//     return view('essaie');
// });
// Route::get('/logout', function () {
//     if (session()->has('user')) {
//         session()->pull('user');
//     }
//     return view('essaie');
// });
