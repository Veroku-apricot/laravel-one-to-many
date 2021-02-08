<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Task;
use App\Typology;

class MainController extends Controller
{
  public function employeeIndex() {

    $employees = Employee::all();
    return view('pages.employee-index', compact('employees'));

  }

  public function employeeShow($id) {

    $employee = Employee::findOrFail($id);
    return view('pages.employee-show', compact('employee'));

  }

  public function taskIndex() {

    $tasks = Task::all();
    return view('pages.task-index', compact('tasks'));

  }

  public function taskShow($id) {

    $task = Task::findOrFail($id);
    return view('pages.task-show', compact('task'));

  }

  public function typologyIndex() {

    $typologies = Typology::all();
    return view('pages.typology-index', compact('typologies'));

  }

  public function typologyShow($id) {

    $typology = Typology::findOrFail($id);
    return view('pages.typology-show', compact('typology'));

  }

}
