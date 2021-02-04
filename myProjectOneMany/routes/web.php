<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@employeeIndex') -> name('employee-index');
