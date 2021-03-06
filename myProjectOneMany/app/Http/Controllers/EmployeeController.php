<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Task;
use App\Typology;

class EmployeeController extends Controller
{
  public function employeeIndex() {

    $employees = Employee::all();
    return view('pages.employee-index', compact('employees'));
  }

  public function employeeShow($id) {

    $employee = Employee::findOrFail($id);
    return view('pages.employee-show', compact('employee'));
  }

}
