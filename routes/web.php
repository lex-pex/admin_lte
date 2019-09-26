<?php

/*
| Web routes are loaded by the RouteServiceProvider within
| a group which contains the "web" middleware group
*/

Route::get('/', function () { return view('welcome'); });

Route::group(['prefix' => '/admin'], function () {
    Route::get('/demo', 'Admin\AdminController@demo');
    Route::get('/login', 'Admin\AdminController@login');
    Route::get('/', 'Admin\AdminController@index');
//  ____________________________________________________________

    Route::get('/employee/index', 'Admin\EmployeeController@index')->name('data-tables');

    Route::get('/employee/create', 'Admin\EmployeeController@create')->name('createEmployee');
    Route::post('/employee/store', 'Admin\EmployeeController@store')->name('storeEmployee');

    Route::get('/employee/{id}/edit', 'Admin\EmployeeController@edit')->name('editEmployee');
    Route::post('/employee/update', 'Admin\EmployeeController@update')->name('updateEmployee');

    Route::delete('/employee/{employee}', 'Admin\EmployeeController@destroy')->name('destroyEmployee');

    Route::get('/employee/list', 'Admin\EmployeeController@list')->name('listEmployee');
    Route::get('/employee/{id}', 'Admin\EmployeeController@show')->name('showEmployee');

});

// Route::get('data_tables', function () { return view('admin.examples.table'); });

Route::resource('table', 'Admin\TableController');

Route::resource('positions', 'Test\PositionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
