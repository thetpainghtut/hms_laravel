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
//     return view('template.backendtemplate');
// });

Route::resource('login','LoginController');

Route::post('logout','LoginController@logout')->name('logout');

Route::get('/','BackendController@dashboard')->name('dashboard');

Route::get('detail/{id}','BackendController@checkinsDetail')->name('dashboard.checkinsDetail');

Route::post('addExtraDays','BackendController@addExtraDays')->name('dashboard.addExtraDays');

Route::post('checkout','BackendController@checkout')->name('dashboard.checkout');

Route::post('addInformations','BackendController@addInformations')->name('dashboard.addInformations');

// Settings CRUD
Route::resource('roomservices','ServiceController');

Route::resource('roomtypes','TypeController');

Route::resource('discounts','DiscountController');

Route::resource('damages','DamageController');

Route::resource('floors','FloorController');

Route::resource('rooms','RoomController');

Route::post('getroomno','RoomController@getRoomNo')->name('getroomno');

// Custom CRUD

Route::resource('guests','GuestController');

Route::resource('checkins','CheckinController');

Route::get('gettransactionid','CheckinController@getTransactionId')->name('gettransactionid');

Route::resource('reservations','ReservationController');

Route::resource('promotions','PromotionController');

// Laravel Excel
Route::get('importExportView', 'MyController@importExportView');
Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');