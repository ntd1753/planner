<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name("auth.register");
Route::post('/register/store',[RegisterController::class,'storeUserAccount'])->name("auth.register.store");
Route::post('/login/store',[LoginController::class,'Login'])->name("auth.login.store");
Route::get('/login', [LoginController::class, 'showLoginForm'])->name("auth.login"); // Cho người dùng
Route::get('/login/oauth/{provider}', [LoginController::class, 'redirectToProvider'])->name("auth.login.provider");
Route::get('/login/oauth/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('auth.login.provider.callback');


Route::get('admin/register',[RegisterController::class,'showAdminRegistrationForm'])->name("admin.auth.register");
Route::post('admin/register/store',[RegisterController::class,'storeAdminAccount'])->name("admin.auth.register.store");
Route::get('admin/login',[LoginController::class,'showAdminLoginForm'])->name("admin.auth.login");
Route::post('admin/login',[LoginController::class,'adminLogin'])->name("admin.auth.login.store");

Route::post('/logout', [LoginController::class,"logout"])->name("logout");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
