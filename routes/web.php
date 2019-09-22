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

/*

'magazine / create'        => 'magazine/MagazineController/create',     // get    | create  (1)
'magazine / store'         => 'magazine/MagazineController/store',      // post   | store   (2)

'magazine / {id}/edit'     => 'magazine/MagazineController/edit',       // post   | edit    (3)
'magazine / update'        => 'magazine/MagazineController/update',     // post   | update  (4)

'magazine / destroy'       => 'magazine/MagazineController/destroy',    // delete | destroy (5)

'magazine / list'          => 'magazine/MagazineController/list',       // get    | list    (6)
'magazine / list/page/{n}' => 'magazine/MagazineController/list',       // get    | pager   (7)

'magazine / {id}'          => 'magazine/MagazineController/show',       // get    | show    (8)


// Such route has to be last cause token parameter  takes away any other URI segments

                       ------- REST API -------
 | GET 	       /photos 	              index      photos. index      | 1
 | GET 	       /photos/create 	      create 	 photos. create     | 2
 | POST        /photos 	              store      photos. store      | 3
 | GET 	       /photos/{photo} 	      show       photos. show       | 4
 | GET 	       /photos/{photo}/edit   edit       photos. edit       | 5
 | PUT/PATCH   /photos/{photo} 	      update 	 photos. update     | 6
 | DELETE      /photos/{photo} 	      destroy 	 photos. destroy    | 7


Route::get('/ad/create', 'AdAddController@create')->name('adCreate');
Route::post('/ad', 'AdAddController@store')->name('adStore');
Route::get('/ad/{id}/edit', 'AdController@edit')->name('adEdit');
Route::post('/ad/{ad}', 'AdController@update')->name('adUpdate');
Route::delete('/ad/{ad}', 'AdController@destroy')->name('adDelete');

*/

























Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
