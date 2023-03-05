<?php



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
Route::get('/mypage', function () {
    $id = Auth::id();
    $user = DB::table('users')->find($id);
    return view('mypage', ['my_user' => $user]);
});
