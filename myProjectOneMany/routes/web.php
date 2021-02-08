<?php

use Illuminate\Support\Facades\Route;
// Employee
Route::get('/', 'MainController@employeeIndex') -> name('employee-index');
Route::get('/employee/{id}', 'MainController@employeeShow') -> name('employee-show');

// Task
Route::get('/task', 'MainController@taskIndex') -> name('task-index');
Route::get('/task/create', 'MainController@taskCreate') -> name('task-create');
Route::post('/task/store', 'MainController@taskStore') -> name('task-store');
Route::get('/task/{id}', 'MainController@taskShow') -> name('task-show');
Route::get('/task/edit/{id}', 'MainController@taskEdit') -> name('task-edit');
Route::post('/task/update/{id}', 'MainController@taskUpdate') -> name('task-update');

// Typology
Route::get('/typology', 'MainController@typologyIndex') -> name('typology-index');
Route::get('/typology/create', 'MainController@typologyCreate') -> name('typology-create');
Route::post('/typology/store', 'MainController@typologyStore') -> name('typology-store');
Route::get('/typology/{id}', 'MainController@typologyShow') -> name('typology-show');
