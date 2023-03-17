<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WeightsController;
use App\Http\Controllers\postsController;

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
// Route::prefix('sendPasswordResetNotification')->name('password_reset.email.form');
Route::get('/mypage', [UsersController::class, 'mypage']);
Route::get('/profile_edit', [UsersController::class, 'profile_edit'])->name('profile.edit');
Route::POST('/profile_edit', [UsersController::class, 'ProfileEdit']);
Route::get('/account_delete', [UsersController::class, 'account_delete']);
Route::get('/account_delete_confirmation',[UsersController::class, 'account_logical_delete'])->name('Logical.Delete.Account');
Route::get('/weight', [UsersController::class,'weight']);
Route::POST('/weight', [WeightsController::class, 'weight_register'])->name('weight.register');
Route::get('/new_post', [UsersController::class, 'new_post']);
Route::POST('/new_post', [postsController::class, 'post_register'])->name('post.register');
Route::get('/post_edit/{id}', [UsersController::class, 'post_edit'])->name('post.edit');
Route::POST('/post_edit/{id}', [postsController::class, 'PostEdit']);
Route::get('/post_detail/{id}', [postsController::class, 'post_detail'])->name('post.detail');
Route::POST('/post_detail/{id}', [postsController::class, 'post_delete'])->name('post.delete');

Route::get('/others_detail/{id}', [postsController::class, 'others_detail'])->name('others.detail');
// いいね機能
//Route::get('/mypage', 'PostsController@index')->name('posts.index');
// ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('/ajaxlike', 'PostsController@ajaxlike');
});
// いいね機能ここまで