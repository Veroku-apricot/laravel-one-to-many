<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Typology;

class TypologyController extends Controller
{
  public function typologyIndex() {

    $typologies = Typology::all();
    return view('pages.typology-index', compact('typologies'));
  }

  public function typologyShow($id) {

    $typology = Typology::findOrFail($id);
    return view('pages.typology-show', compact('typology'));
  }

  public function typologyCreate() {

    $tasks = Task::all();
    return view('pages.typology-create', compact('tasks'));
  }
  public function typologyStore(Request $request) {

    $data = $request -> all();
    $newTypology = Typology::create($data);
    $tasks = Task::findOrFail($data['tasks']);
    $newTypology -> tasks() -> attach($tasks);

    return redirect() -> route('typology-index');
  }

  public function typologyEdit($id) {

    $typology = Typology::findOrFail($id);
    $tasks = Task::all();

    return view('pages.typology-edit', compact('typology', 'tasks'));
  }
  public function typologyUpdate(Request $request, $id) {

    $data = $request -> all();

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
