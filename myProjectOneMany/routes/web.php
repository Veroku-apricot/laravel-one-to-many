<?php

use Illuminate\Support\Facades\Route;
// Employee
Route::get('/', 'EmployeeController@employeeIndex') -> name('employee-index');
Route::get('/employee/{id}', 'EmployeeController@employeeShow') -> name('employee-show');

// Task
Route::get('/task', 'TaskController@taskIndex') -> name('task-index');
Route::get('/task/create', 'TaskController@taskCreate') -> name('task-create');
Route::post('/task/store', 'TaskController@taskStore') -> name('task-store');
Route::get('/task/{id}', 'TaskController@taskShow') -> name('task-show');
Route::get('/task/edit/{id}', 'TaskController@taskEdit') -> name('task-edit');
Route::post('/task/update/{id}', 'TaskController@taskUpdate') -> name('task-update');

// Typology
Route::get('/typology', 'TypologyController@typologyIndex') -> name('typology-index');
Route::get('/typology/create', 'TypologyController@typologyCreate') -> name('typology-create');
Route::post('/typology/store', 'TypologyController@typologyStore') -> name('typology-store');
Route::get('/typology/{id}', 'TypologyController@typologyShow') -> name('typology-show');
Route::get('/typology/edit/{id}', 'TypologyController@typologyEdit') -> name('typology-edit');
Route::post('/typology/update/{id}', 'TypologyController@typologyUpdate') -> name('typology-update');
