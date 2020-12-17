<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\HomeController;
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

Route::get('email',function (){
    return new \App\Mail\LoginCredentials(App\Models\User::first(), '1234qwer');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function(){
         Route::resource('cars',
             CarController::class);

         Route::put('/users/{user}/roles',[UsersRolesController::class,'update'])->name('users.roles.update');
         Route::put('/users/{user}/permissions',[UsersPermissionsController::class,'update'])->name('users.permissions.update');

         Route::resource('users',
             UserController::class);
      // Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
});


