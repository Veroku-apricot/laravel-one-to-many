<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@employeeIndex') -> name('employee-index');

Route::get('/employee/{id}', 'MainController@employeeShow') -> name('employee-show');
