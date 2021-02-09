<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Task;
use App\Typology;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
  // Index
  public function taskIndex() {

    $tasks = Task::all();
    return view('pages.task-index', compact('tasks'));
  }

  // Show
  public function taskShow($id) {

    $task = Task::findOrFail($id);
    return view('pages.task-show', compact('task'));
  }

  // Create
  public function taskCreate() {

    $employees = Employee::all();
    $typologies = Typology::all();
    return view('pages.task-create', compact('employees', 'typologies'));
  }
  // Store
  public function taskStore(Request $request) {

    $data = $request -> all();

    Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'required|min:5|max:20',
            'priority' => 'required|integer|between:1,5',
        ]) -> validate();

    $task = Task::make($request -> all());
    $employee = Employee::findOrFail($data['employee_id']);
    $task -> employee() -> associate($employee);
    $task -> save();

    // $typologies = Typology::findOrFail($data['typologies']);
    // $task -> typologies() -> attach($typologies);
    if (array_key_exists('typologies', $data)) {

      $typologies = Typology::findOrFail($data['typologies']);
      $task -> typologies() -> attach($typologies);

    }else {

      $task -> typologies() -> attach([]);

    }

    return redirect() -> route('task-index');
  }

  // Edit
  public function taskEdit($id) {

    $task = Task::findOrFail($id);
    $employees = Employee::all();
    $typologies = Typology::all();

    return view('pages.task-edit', compact('employees', 'typologies', 'task'));
  }
  // Update
  public function taskUpdate(Request $request, $id) {

    $data = $request -> all();

    Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'required|min:5|max:20',
            'priority' => 'required|integer|between:1,5',
        ]) -> validate();

    $employee = Employee::findOrFail($data['employee_id']);
    $task = Task::findOrFail($id);
    $task -> update($data);
    $task -> employee() -> associate($employee);
    $task -> save();

    if (array_key_exists('typologies', $data)) {

      $typologies = Typology::findOrFail($data['typologies']);
      $task -> typologies() -> sync($typologies);

    }else {

      $task -> typologies() -> sync([]);

    }

    return redirect() -> route('task-index');
  }
}
