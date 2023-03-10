<?php
use App\Http\Controllers\UsersController;


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

Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::get('/mypage', [UsersController::class, 'mypage']);
Route::get('/profile_edit', [UsersController::class, 'profile_edit'])->name('profile.edit');
Route::POST('/profile_edit', [UsersController::class, 'ProfileEdit']);
Route::get('/account_delete', [UsersController::class, 'account_delete']);
Route::get('/account_delete_confirmation',[UsersController::class, 'account_logical_delete'])->name('Logical.Delete.Account');
Route::get('/weight', [UsersController::class,'weight']);