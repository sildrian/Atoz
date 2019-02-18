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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['uses'=>'Auth\RegisterController@first']);

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');
Route::resource('user', 'UserController');

Auth::routes();

Route::group(['middleware' => 'web'], function(){
   Route::get('/prepaid-balance', 'Dashboard\DashboardController@index')->name('prepaid');
   Route::post('/savePrepaid', 'Dashboard\DashboardController@savePrepaid')->name('saveprepaid');
   Route::get('/product', 'Dashboard\DashboardController@product')->name('product');
   Route::post('/saveProduct', 'Dashboard\DashboardController@saveProduct')->name('saveproduct');
	Route::get('/success/{id}', 'Dashboard\DashboardController@successBook')->name('success');
	Route::post('/payment', 'Dashboard\DashboardController@payOrder')->name('payment');
	Route::post('/checkPay', 'Dashboard\DashboardController@checkPay')->name('checkpay');
	Route::get('/order', 'Dashboard\DashboardController@orderHistoryAll')->name('order');
	Route::post('/search', 'Dashboard\DashboardController@checkSearch')->name('checksearch');

	Route::get('/home', 'HomeController@index')->name('home');

});

