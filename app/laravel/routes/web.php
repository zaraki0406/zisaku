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

Route::get('/mypage', [UsersController::class, 'mypage']);
Route::get('/password_reset', [UsersController::class, 'password_reset']);
Route::get('/profile_edit', [UsersController::class, 'profile_edit'])->name('profile.edit');
Route::POST('/profile_edit', [UsersController::class, 'ProfileEdit']);
Route::get('/account_delete', [UsersController::class, 'account_delete']);
Route::get('/account_delete_confirmation',[UsersController::class, 'account_logical_delete'])->name('Logical.Delete.Account');
Route::get('/weight', [UsersController::class,'weight']);
Route::POST('/weight', [WeightsController::class, 'weight_register'])->name('weight.register');
Route::get('/weight_edit', [WeightsController::class,'weight_edit']);
Route::get('/weight_delete/{id}', [WeightsController::class, 'weight_delete'])->name('weight.delete');
Route::get('/new_post', [UsersController::class, 'new_post']);
Route::POST('/new_post', [postsController::class, 'post_register'])->name('post.register');
Route::get('/post_edit/{id}', [UsersController::class, 'post_edit'])->name('post.edit');
Route::POST('/post_edit/{id}', [postsController::class, 'PostEdit']);
Route::get('/post_detail/{id}', [postsController::class, 'post_detail'])->name('post.detail');
Route::POST('/post_detail/{id}', [postsController::class, 'post_delete'])->name('post.delete');
Route::get('/post_search', [postsController::class, 'post_search'])->name('post.search');
Route::get('/good_post', [postsController::class, 'good_post']);
Route::get('/administrator_usersearch', [UsersController::class, 'administrator_usersearch'])->name('administrator.usersearch');
Route::get('/account_admin_delete/{id}', [UsersController::class, 'account_admin_delete'])->name('account.admin.delete');
Route::get('/administrator_postsearch', [postsController::class, 'administrator_postsearch'])->name('administrator.postsearch');
Route::get('/post_admin_delete/{id}', [postsController::class, 'post_admin_delete'])->name('post.admin.delete');
Route::get('/others_detail/{id}', [postsController::class, 'others_detail'])->name('others.detail');
Route::POST('/others_detail/{id}', [postsController::class, 'others_comment'])->name('others.comment');
// いいね機能
//Route::get('/mypage', 'PostsController@index')->name('posts.index');
// ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('/ajaxlike', 'PostsController@ajaxlike');
});
// いいね機能ここまで