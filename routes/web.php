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

    Route::get('/employee/create', 'Admin\EmployeeController@create')->name('createEmployee');
    Route::post('/employee/store', 'Admin\EmployeeController@store')->name('storeEmployee');

    Route::get('/employee/{id}/edit', 'Admin\EmployeeController@edit')->name('editEmployee');
    Route::post('/employee/update', 'Admin\EmployeeController@update')->name('updateEmployee');

    Route::delete('/employee/{employee}', 'Admin\EmployeeController@destroy')->name('destroyEmployee');

    Route::get('/employee/list', 'Admin\EmployeeController@list')->name('listEmployee');
    Route::get('/employee/{id}', 'Admin\EmployeeController@show')->name('showEmployee');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faker', function () {

//    require_once '../vendor/autoload.php';

    $faker = Faker\Factory::create();

    // image, name, phone, email, position, salary, head, hire_date

    for ($i = 0; $i < 20; $i++) {
        echo $faker->name . ' _|_ '
            . $faker->tollFreePhoneNumber . ' _|_ '
            . $faker->email . ' _|_ '
            . random_int ( 1 , 10 ) . ' _|_ '  // position
            . random_int ( 20000 , 500000 ) . ' _|_ '  // salary
            . random_int ( 1 , 1000 ) . ' _|_ '  // head
            . $faker->date('Y-m-d', 'now') . ' _|_ '  // hire_date YYYY-MM-DD
            . ' <br/>';
    }

});
