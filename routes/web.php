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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
	'register' => false,
]);

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
	Route::resource('/category', 'CategoryController');
	Route::resource('/user', 'AppUserController');
	Route::resource('/shop', 'ShopController');
	Route::resource('/feature', 'FeatureController');
	Route::resource('/benefit', 'BenefitController');
	Route::resource('/offer', 'OfferController');
	Route::resource('/promo', 'PromoController');
	Route::resource('/picture', 'PictureController');
	Route::resource('/message', 'MessageController');
	Route::resource('/setting', 'SettingController');
	Route::resource('/used-promo', 'UsedPromoController');

	Route::get('/detail', 'ShopController@details')->name('detail');

	Route::post('/status', 'CategoryController@status')->name('status');

});
