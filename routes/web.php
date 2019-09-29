<?php

/* Web routes are loaded by the RouteServiceProvider within
 a group which contains the "web" middleware group */

Route::get('/', function () { return view('welcome'); });

/**
 * Data-table of Employees
 */
Route::get('staff/hint_test', 'Admin\StaffController@hint_test');
Route::post('staff/hint', 'Admin\StaffController@hint');
Route::resource('staff', 'Admin\StaffController');

Route::group(['prefix' => '/admin'], function () {

              // Staff List (AdminLTE-Bootstrap Data-Table-Ajax-jq)
    Route::get('/', 'Admin\AdminController@index');
              // AdminLTE elements demo page
    Route::get('/demo', 'Admin\AdminController@demo');
              // Admin Login Dialog
    Route::get('/login', 'Admin\AdminController@login');

              // Hand-Made REST-full routes for employee controller
    Route::get('/employee/index', 'Admin\EmployeeController@index')->name('data-tables');

    Route::get('/employee/create', 'Admin\EmployeeController@create')->name('createEmployee');
    Route::post('/employee/store', 'Admin\EmployeeController@store')->name('storeEmployee');

    Route::get('/employee/{id}/edit', 'Admin\EmployeeController@edit')->name('editEmployee');
    Route::post('/employee/update', 'Admin\EmployeeController@update')->name('updateEmployee');

    Route::delete('/employee/{employee}', 'Admin\EmployeeController@destroy')->name('destroyEmployee');

    Route::get('/employee/list', 'Admin\EmployeeController@list')->name('listEmployee');
    Route::get('/employee/{id}', 'Admin\EmployeeController@show')->name('showEmployee');
});

/**
 * Examples Ajax Data-Tables
 */
Route::resource('table', 'Admin\TableController');
Route::resource('positions', 'Test\PositionController');

/**
 * Authentication
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
