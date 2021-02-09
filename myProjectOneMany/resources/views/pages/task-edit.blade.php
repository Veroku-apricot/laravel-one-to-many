@extends('layouts.mainLayout')

@section('content')

  <h1>Edit Task</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form class="" action="{{ route('task-update', $task -> id) }}" method="post">

    @csrf
    @method('post')

    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $task -> title }}">
    <br>

    <label for="description">Description:</label>
    <input type="text" name="description" value="{{ $task -> description }}">
    <br>

    <label for="priority">Priority:</label>
    <input type="text" name="priority" value="{{ $task -> priority }}">
    <br>

    <label for="employee_id">Employee:</label>
    <select class="" name="employee_id">
      @foreach ($employees as $employee)
        <option value="{{ $employee -> id}}"

          @if ($task -> employee -> id == $employee -> id)
            selected
          @endif
        >

          {{ $employee -> name }}
          {{ $employee -> lastname }}
        </option>
      @endforeach
    </select>
    <br>

    <label for="typologies[]">Typologies:</label>
    <br>
    @foreach ($typologies as $typology)
      <input type="checkbox" name="typologies[]" value="{{ $typology -> id }}"

        @foreach ($task -> typologies as $t_typology)
          @if ($t_typology -> id == $typology -> id)
            checked
          @endif
        @endforeach
      >
      {{ $typology -> name }}
      <br>
    @endforeach
    <br>

    <input type="submit" value="Submit">

  </form>

@endsection
