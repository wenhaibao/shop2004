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
// Route::get('/test', function () {
//     echo 111;
//     echo date('Y-m-d h:i:s');
//     return view('welcome');
// });
// Route::get('/hello', 'TestController@hello');
// Route::get('/create', 'TestController@create');
// Route::post('/save', 'TestController@save');
// Route::get('/index', 'TestController@index');

// Route::any('/create1', 'ClassController@create1');
// Route::any('/inserts', 'ClassController@inserts');
// Route::any('/list', 'ClassController@list');
// Route::any('/deletes', 'ClassController@deletes');
// Route::any('/updates', 'ClassController@updates');
// Route::any('/updatedo', 'ClassController@updatedo');

// Route::any('/brcreate','BrandtestController@brcreate');
// Route::any('/createdo','BrandtestController@createdo');
// Route::any('/brandtestlist','BrandtestController@brandtestlist');
// Route::any('/brandtestupdate','BrandtestController@brandtestupdate');
// Route::any('/brandtestupdatedo','BrandtestController@brandtestupdatedo');


// 107
// Route::any('/uscreate','UsersController@uscreate');
// Route::any('/uscreatedo','UsersController@uscreatedo');
// Route::any('/uslist','UsersController@uslist');
// Route::any('/usupdate','UsersController@usupdate');
// Route::any('/usupdatedo','UsersController@usupdatedo');
// Route::any('/usdelete','UsersController@usdelete');
// Route::any('/uslogin','UsersController@uslogin');
// Route::any('/uslogindo','UsersController@uslogindo');
// Route::any('/usloginlist','UsersController@usloginlist');


// 108
// Route::any('/usersscreate','UserssController@usersscreate');
// Route::any('/usersscreatedo','UserssController@usersscreatedo');
// Route::any('/uslist','UserssController@uslist');
// Route::any('/usupdate','UserssController@usupdate');
// Route::any('/userssupdatedo','UserssController@userssupdatedo');
// Route::any('/usdelete','UserssController@usdelete');


Route::get('/regist','UsersController@regist');
Route::post('/registdo','UsersController@registdo');
Route::get('/login','UsersController@login');
Route::post('/logindo','UsersController@logindo');
Route::get('/index','UsersController@index')->middleware('checkuser');
Route::get('/quit','UsersController@quit');