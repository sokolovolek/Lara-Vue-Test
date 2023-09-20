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
Route::get('/',function(){
    return redirect('/employee-list');
});


//Employee Actions
Route::namespace('Employee')->name('employee.')->group(function(){
    Route::get('/employee-list',['as' => 'employee.list', 'uses' => 'EmployeeController@listEmployee']);
    Route::get('/employee-create',['as' => 'employee.create', 'uses' => 'EmployeeController@createEmployee']);
    Route::post('/employee-store',['as' => 'employee.store', 'uses' => 'EmployeeController@storeEmployee']);
    Route::get('/employee-edit/{employeeid}',['as' => 'employee.edit', 'uses' => 'EmployeeController@editEmployee']);
    Route::post('/employee-update',['as' => 'employee.update', 'uses' => 'EmployeeController@updateEmployee']);
    Route::get('/employee-delete/{employeeid}', ['as' => 'employee.delete', 'uses' => 'EmployeeController@deleteEmployee']);
});