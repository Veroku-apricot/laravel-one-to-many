<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@employeeIndex') -> name('employee-index');
Route::get('/employee/{id}', 'MainController@employeeShow') -> name('employee-show');

Route::get('/task', 'MainController@taskIndex') -> name('task-index');
Route::get('/task/{id}', 'MainController@taskShow') -> name('task-show');

Route::get('/typology', 'MainController@typologyIndex') -> name('typology-index');
Route::get('/typology/{id}', 'MainController@typologyShow') -> name('typology-show');
