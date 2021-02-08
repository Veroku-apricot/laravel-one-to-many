<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
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

    $employees = Employee::all();
    return view('pages.task-create', compact('employees'));
  }
  public function typologyStore(Request $request) {

    $data = $request -> all();
  }
}
