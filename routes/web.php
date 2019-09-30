<?php

/*
  Web routes are loaded by the RouteServiceProvider within
  a group which contains the "web" middleware group
 */

Route::get('/', function () { return view('welcome'); });

/**
 * Data-table of Employees
 */
Route::post('staff/hint', 'Admin\StaffController@hint');
Route::resource('staff', 'Admin\StaffController');

Route::group(['prefix' => '/admin'], function () {
              // Staff List (AdminLTE-Bootstrap Data-Table-Ajax-jq)
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    // Admin Login Dialog
    Route::get('/login', 'Admin\AdminController@login');
              // AdminLTE elements demo page
    Route::get('/demo', 'Admin\AdminController@demo');
});

/**
 * Examples Ajax Data-Tables
 */
Route::resource('table', 'Admin\TableController');
Route::resource('positions', 'Test\PositionController');

/**
 * Authentication Routes
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
