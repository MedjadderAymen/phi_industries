<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;

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

Auth::routes(['register' => false, 'login'=>true, 'reset' => false]);
//********public*********************
Route::get('/', function () {
    return view('welcome');
});

//************admin**********************

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/set', 'HomeController@set');

//*********medications****************************
Route::get('/medications', 'MedicationController@index')->name('medications');
Route::get('/medication/delete/{id}', 'MedicationController@delete')->name('delete');
Route::get('/medication/edit/{id}', 'MedicationController@edit')->name('edit');
Route::post('/medication/update/{id}', 'MedicationController@update')->name('update');
Route::get('/medication/create', 'MedicationController@create')->name('create');
Route::post('/medication/store', 'MedicationController@store')->name('store');
Route::get('/medication/get', 'MedicationController@get')->name('medication.get');

//**************clients*****************************************
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/client/show/{id}', 'ClientController@show')->name('client.show');
Route::get('/client/delete/{id}', 'ClientController@delete')->name('client.delete');
Route::get('/client/edit/{id}', 'ClientController@edit')->name('client.edit');
Route::post('/client/update/{id}', 'ClientController@update')->name('client.update');
Route::get('/client/create', 'ClientController@create')->name('client.create');
Route::post('/client/store', 'ClientController@store')->name('client.store');


//*********************************Invoices*****************************************
Route::get('/invoices', 'InvoiceController@index')->name('invoices');
Route::get('/invoice/show/{id}', 'InvoiceController@show')->name('invoice.show');
Route::get('/invoice/print/{id}', 'InvoiceController@InvoicePrint')->name('invoice.print');
Route::get('/invoice/create', 'InvoiceController@create')->name('invoice.create');
Route::post('/invoice/store', 'InvoiceController@store')->name('invoice.store');