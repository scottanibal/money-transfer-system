<?php

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
Route::get('/', 'HomeController@index')->name('index');

Route::get('home', 'HomeController@home')->name('home');

Route::get('lang/{lang}', 'HomeController@language')->name('lang');

Route::get('/help', 'HelperController@helper')->name('help');

Route::get('/contactus', 'ContactUsController@getForm')->name('contactus');

Route::post('/contactus', 'ContactUsController@postForm')->name('post.contactus');

Route::resource('trans', 'TransactionController');

Route::post('trans/pull', 'VisaPullController@postTrans')->name('pull');

Route::post('trans/pull/vis', 'VisaPullController@postForm')->name('visapull');

Route::post('calculate', 'VisaPullController@calculateFees')->name('calculate');

Route::get('confirm', 'PaypalConfirmController@confirm')->name('confirm');

Route::resource('admin/transact', 'AdminTransactionController');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware('auth')->group(function(){
    Route::resource('admin/user', 'UserController');

    Route::resource('admin/office', 'OfficeController');

    Route::resource('admin/country', 'CountryController');

    Route::resource('admin/exchange', 'ExchangeRateController');

    Route::get('change-password', 'ChangePasswordController@index')->name('change.password');

    Route::post('change-password', 'ChangePasswordController@store')->name('post.change.password');

    Route::post('admin/convert', 'ConvertCurrencyController@postForm')->name('convert');

    Route::post('visa/fundstransfer', 'FundsTransferApiController@postpullfundsWithHttpInfo')->name('fundstransfer');

    Route::get('stats', 'StatisticTransactionController@getStats')->name('stats');

    Route::get('admin/settings/fees', 'AdminController@getFeesForm')->name('setfees');

    Route::get('admin/settings/visa', 'AdminController@getVisaForm')->name('setvisa');

    Route::get('admin/settings/paypal', 'AdminController@getPaypalForm')->name('setpaypal');

    Route::post('admin/settings/fees', 'AdminController@postFeesForm')->name('post.setfees');

    Route::post('admin/settings/visa', 'AdminController@postVisaForm')->name('post.setvisa');

    Route::post('admin/settings/paypal', 'AdminController@postPaypalInfo')->name('post.setpaypal');

});

