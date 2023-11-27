<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies');
// Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');


// returns the home page with all companies
Route::get('/', CompanyController::class .'@index')->name('company.index');
Route::get('/companies', CompanyController::class .'@index')->name('companies');

// returns the form for adding a company
Route::get('/company/create', CompanyController::class . '@create')->name('company.create');
// adds a company to the database
Route::post('/companies', CompanyController::class .'@store')->name('company.store');
// returns a page that shows a full company
Route::get('/company/{company}', CompanyController::class .'@show')->name('company.show');
// returns the form for editing a company
Route::get('/company/{company}/edit', CompanyController::class .'@edit')->name('company.edit');
// updates a company
Route::put('/company/{company}', CompanyController::class .'@update')->name('company.update');
// deletes a company
Route::delete('/company/{company}', CompanyController::class .'@destroy')->name('company.destroy');



// returns the home page with all employees
Route::get('/employees', EmployeeController::class .'@index')->name('employees');


// returns the form for adding a employee
Route::get('/employee/create', EmployeeController::class . '@create')->name('employee.create');
// adds a company to the database
Route::post('/employees', EmployeeController::class .'@store')->name('employee.store');
// returns a page that shows a full employee
Route::get('/employee/{employee}', EmployeeController::class .'@show')->name('employee.show');
// returns the form for editing a employee
Route::get('/employee/{employee}/edit', EmployeeController::class .'@edit')->name('employee.edit');
// updates a employee
Route::put('/employee/{employee}', EmployeeController::class .'@update')->name('employee.update');
// deletes a employee
Route::delete('/employee/{employee}', EmployeeController::class .'@destroy')->name('employee.destroy');

