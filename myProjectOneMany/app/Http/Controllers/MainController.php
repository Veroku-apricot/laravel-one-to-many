<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Task;
use App\Typology;

class MainController extends Controller
{
  // Employee
  public function employeeIndex() {

    $employees = Employee::all();
    return view('pages.employee-index', compact('employees'));
  }

  public function employeeShow($id) {

    $employee = Employee::findOrFail($id);
    return view('pages.employee-show', compact('employee'));
  }

  // Task
  public function taskIndex() {

    $tasks = Task::all();
    return view('pages.task-index', compact('tasks'));
  }

  public function taskShow($id) {

    $task = Task::findOrFail($id);
    return view('pages.task-show', compact('task'));
  }

  public function taskCreate() {

    $employees = Employee::all();
    $typologies = Typology::all();
    return view('pages.task-create', compact('employees', 'typologies'));
  }
  public function taskStore(Request $request) {

    $data = $request -> all();
    $employee = Employee::findOrFail($data['employee_id']);
    $task = Task::make($request -> all());
    $task -> employee() -> associate($employee);
    $task -> save();

    $typologies = Typology::findOrFail($data['typologies']);
    $task -> typologies() -> attach($typologies);

    return redirect() -> route('task-index');
  }

  public function taskEdit($id) {

    $task = Task::findOrFail($id);
    $employees = Employee::all();
    $typologies = Typology::all();

    return view('pages.task-edit', compact('employees', 'typologies', 'task'));
  }
  public function taskUpdate(Request $request, $id) {

    $data = $request -> all();

    $employee = Employee::findOrFail($data['employee_id']);
    $task = Task::findOrFail($id);
    $task -> update($data);
    $task -> employee() -> associate($employee);
    $task -> save();

    $typologies = Typology::findOrFail($data['typologies']);
    $task -> typologies() -> sync($typologies);
    
    return redirect() -> route('task-index');
  }

  // Typology
  public function typologyIndex() {

    $typologies = Typology::all();
    return view('pages.typology-index', compact('typologies'));
  }

  public function typologyShow($id) {

    $typology = Typology::findOrFail($id);
    return view('pages.typology-show', compact('typology'));
  }

  public function typologyCreate() {

    $employees = Employee::all();
    return view('pages.task-create', compact('employees'));
  }

  public function typologyStore(Request $request) {

    $data = $request -> all();
  }

}
