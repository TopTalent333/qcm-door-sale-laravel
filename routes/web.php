<?php

use Illuminate\Support\Facades\Route;
session_start();
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


/////////////////////////////////////////////// Dashboard ///////////////////////////////////////////////
Route::get('/',                         'DashboardController@toHome')                       ->name('toHome');
Route::get('/design',                   'DashboardController@toDesign')                     ->name('toDesign');
Route::get('/design/{type}',            'DashboardController@toDesignDetail')               ->name('toDesignDetail');
Route::get('/contact',                  'DashboardController@toContact')                    ->name('toContact');
Route::get('/projects',                 'DashboardController@toProjects')                   ->name('toProjects');
Route::get('/login',                    'DashboardController@toLogin')                      ->name('toLogin');
Route::get('/signup',                   'DashboardController@toSignup')                     ->name('toSignup');
Route::get('/order',                    'DashboardController@toOrder')                      ->name('toOrder');

Route::post('/onLogin',                 'SignController@onLogin')                           ->name('onLogin');
Route::post('/onLogout',                'SignController@onLogout')                          ->name('onLogout');
Route::post('/onSignup',                'SignController@onSignup')                          ->name('onSignup');
Route::post('/onOrderForm',             'DashboardController@onOrderForm')                  ->name('onOrderForm');

/////////////////////////////////////////////// Admin ///////////////////////////////////////////////
Route::get('/admin',                    'AdminController@index')                            ->name("Admin.Signin");
Route::get('/admin/admin',              'AdminController@toAdminList')                      ->name('toAdminList');
Route::get('/admin/user',               'AdminController@toUserList')                       ->name('toUserList');
Route::get('/admin/upload',             'AdminController@toUploadImage')                    ->name('toUploadImage');


Route::post('/admin_signin',            'AdminController@onAdminSignin')                    ->name('onAdminSignin');
Route::post('/admin_signup',            'AdminController@onAdminSignup')                    ->name('onAdminSignup');
Route::post('/onGetAdminList',          'AdminController@onGetAdminList')                   ->name('onGetAdminList');
Route::post('/onGetUserList',           'AdminController@onGetUserList')                    ->name('onGetUserList');


