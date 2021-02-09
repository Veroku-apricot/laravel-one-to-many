<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Typology;
use Illuminate\Support\Facades\Validator;

class TypologyController extends Controller
{
  // Index
  public function typologyIndex() {

    $typologies = Typology::all();
    return view('pages.typology-index', compact('typologies'));
  }

  // Show
  public function typologyShow($id) {

    $typology = Typology::findOrFail($id);
    return view('pages.typology-show', compact('typology'));
  }

  // Create
  public function typologyCreate() {

    $tasks = Task::all();
    return view('pages.typology-create', compact('tasks'));
  }
  // Store
  public function typologyStore(Request $request) {

    $data = $request -> all();

    Validator::make($data, [
            'name' => 'required|min:3',
            'description' => 'required|min:5|max:20'
        ]) -> validate();

    $typology = Typology::create($data);

    // $tasks = Task::findOrFail($data['tasks']);
    // $typology -> tasks() -> attach($tasks);
    if (array_key_exists('tasks', $data)) {

      $tasks = Task::findOrFail($data['tasks']);
      $typology -> tasks() -> attach($tasks);

    }else {

      $typology -> tasks() -> attach([]);

    }

    return redirect() -> route('typology-index');
  }

  // Edit
  public function typologyEdit($id) {

    $typology = Typology::findOrFail($id);
    $tasks = Task::all();

    return view('pages.typology-edit', compact('typology', 'tasks'));
  }
  // Update
  public function typologyUpdate(Request $request, $id) {

    $data = $request -> all();

    Validator::make($data, [
            'name' => 'required|min:3',
            'description' => 'required|min:5|max:60'
        ]) -> validate();

    $typology = Typology::findOrFail($id);
    $typology -> update($data);

    if (array_key_exists('tasks', $data)) {

      $tasks = Task::findOrFail($data['tasks']);
      $typology -> tasks() -> sync($tasks);

    }else {

      $typology -> tasks() -> sync([]);

    }

    return redirect() -> route('typology-index');
  }
}
