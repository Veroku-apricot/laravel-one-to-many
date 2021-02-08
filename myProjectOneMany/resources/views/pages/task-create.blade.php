@extends('layouts.mainLayout')

@section('content')

  <h1>New Task</h1>

  <form class="" action="{{ route('task-store') }}" method="post">

    @csrf
    @method('post')

    <label for="title">Title:</label>
    <input type="text" name="title" value="">
    <br>

    <label for="description">Description:</label>
    <input type="text" name="description" value="">
    <br>

    <label for="priority">Priority:</label>
    <input type="text" name="priority" value="">
    <br>

    <label for="employee_id">Employee:</label>
    <select class="" name="employee_id">
      @foreach ($employees as $employee)
        <option value="{{ $employee -> id}}">
          {{ $employee -> name }}
          {{ $employee -> lastname }}
        </option>
      @endforeach
    </select>
    <br>

    <label for="typologies[]">Typologies:</label>
    <br>
    @foreach ($typologies as $typology)
      <input type="checkbox" name="typologies[]" value="{{ $typology -> id }}">
      {{ $typology -> name }}
      <br>
    @endforeach
    <br>

    <input type="submit" value="Submit">

  </form>

@endsection
