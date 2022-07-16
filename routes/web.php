<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
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
use App\Models\Admin;
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
    return view('index');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/causes', [CausesController::class, 'index']);
Route::get('/event', [EventController::class, 'index']);
Route::get('/donate', [DonateController::class, 'index'])->middleware('alreadyLoggedIn');
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/register', [RegistrationDonorsController::class, 'index']);
Route::get('/loginHospitals', [LoginHospitalsController::class, 'index']);
Route::get('/hospitalRegister', [RegisterHospitalsController::class, 'index']);

Route::POST('/Createreg', [RegistrationDonorsController::class, 'create']);
Route::POST('/login', [DonateController::class, 'login']);
Route::get('profile', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLoggedIn');
Route::get('/donateform', [DonateController::class, 'index2']);
Route::POST('/donateregistration', [DonateController::class, 'store']);
Route::get('/showSubmitted', [DonateController::class, 'show']);
Route::get('/show', [DonateController::class, 'show']);
Route::get('/editFormDonor{id}', [DonateController::class, 'update']);
Route::post('/formupdate{id}', [DonateController::class, 'edit']);
Route::get('/deleteApplication{id}', [DonateController::class, 'destroy']);

Route::get('/AdminLogin', [AdminController::class, 'index']);
Route::post('/logAdmin', [AdminController::class, 'login']);
Route::get('/adminsdata', [AdminController::class, 'viewAdminsData']);
Route::get('/AdminAddForm', [AdminController::class, 'addAdmins']);
Route::post('/addNewAdmin', [AdminController::class, 'store']);
Route::get('/deleteAdmin{id}', [AdminController::class, 'destroy']);
Route::get('/donorsApplications', [AdminController::class, 'donorsdata']);
Route::get('/deleteDonorApplication{id}', [AdminController::class, 'deleteApplication']);
Route::get('/usersData', [AdminController::class, 'usersdata']);

Route::get('/AdminDashboard', [AdminController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('logout', function () {
    session()->flush();
    return redirect('home');
});
