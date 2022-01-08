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

Route::get('/', 'App\Http\Controllers\UserController@index');

Route::post('users/add', 'App\Http\Controllers\UserController@store')->name('addUser');

Route::get('users/edit/{id}', 'App\Http\Controllers\UserController@update')->name('editUser');

Route::get('users/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('deleteUser');

Route::get('/companies', 'App\Http\Controllers\CompanyController@index');

Route::post('companies/add', 'App\Http\Controllers\CompanyController@store')->name('addCompany');

Route::get('companies/edit/{id}', 'App\Http\Controllers\CompanyController@update')->name('editCompany');

Route::get('companies/delete/{id}', 'App\Http\Controllers\CompanyController@delete')->name('deleteCompany');



