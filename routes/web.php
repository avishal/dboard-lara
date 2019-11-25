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

Auth::routes();

Route::get('/home', ['uses' => 'HomeController@index', 'roles' => ['admin'] ] )->name('home');
Route::get('/users/all', ['uses' => 'HomeController@listusers',  'roles' => ['admin'] ] )->name('all-users');

Route::get('/matters', ['uses' => 'MatterController@index',  'roles' => ['admin'] ] )->name('all-matters');
Route::get('/matter', ['uses' => 'MatterController@showNewMatterForm',  'roles' => ['admin'] ] )->name('new-matter');
Route::post('/matter', ['uses' => 'MatterController@store', 'middleware'=>'checkRole', 'roles' => ['admin'] ] )->name('save-matter');
Route::get('/matter/{id}', ['uses' => 'MatterController@edit',  'roles' => ['admin'] ] )->name('edit-matter');
Route::post('/matter/{id}', ['uses' => 'MatterController@update',  'roles' => ['admin'] ] )->name('update-matter');
Route::post('/matter/{id}/delete', ['uses' => 'MatterController@delete',  'roles' => ['admin'] ] )->name('delete-matter');
Route::get('/matter/client/assign', ['uses' => 'MatterController@showAssignmentForm'] )->name('assign-client');

Route::post('/matter/client/assign', ['uses' => 'MatterController@assignMatterUser', 'roles' => ['admin'] ] )->name('assign-matter-client');
Route::post('/matter/client/deassign', ['uses' => 'MatterController@deassignMatterUser', 'roles' => ['admin'] ] )->name('deassign-matter-client');
Route::get('/matter/clients/{matter_id}', ['uses' => 'MatterController@matterUserAssignments', 'roles' => ['admin'] ] )->name('matter-clients');
Route::get('/matter-add-date', ['uses' => 'MatterController@actShowAddDateForm', 'roles' => ['admin'] ] )->name('matter-add-date');
Route::post('/matter-save-date', ['uses' => 'MatterController@saveAddDateForm', 'roles' => ['admin'] ] )->name('matter-save-date');

Route::get('/matter-edit-date/{id}', ['uses' => 'MatterController@actShowEditDateForm', 'roles' => ['admin'] ] )->name('matter-edit-date');
Route::post('/matter-update-date', ['uses' => 'MatterController@saveUpdateDateForm', 'roles' => ['admin'] ] )->name('matter-update-date');
Route::post('/matter-delete-date', ['uses' => 'MatterController@deleteDate', 'roles' => ['admin'] ] )->name('matter-delete-date');

Route::get('/clients', ['uses' => 'ClientController@index',  'roles' => ['admin'] ] )->name('all-clients');
Route::get('/client', ['uses' => 'ClientController@showNewClientForm',  'roles' => ['admin'] ] )->name('new-client');
Route::post('/client', ['uses' => 'ClientController@store',  'roles' => ['admin'] ] )->name('save-client');
Route::get('/client/{id}', ['uses' => 'ClientController@edit',  'roles' => ['admin'] ] )->name('edit-client');
Route::post('/client/{id}', ['uses' => 'ClientController@update',  'roles' => ['admin'] ] )->name('update-client');
Route::post('/client/{id}/delete', ['uses' => 'ClientController@delete',  'roles' => ['admin'] ] )->name('delete-client');
