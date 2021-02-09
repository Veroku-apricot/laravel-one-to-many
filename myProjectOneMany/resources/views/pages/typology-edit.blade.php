@extends('layouts.mainLayout')

@section('content')

  <h1>Edit Task</h1>

  <form class="" action="{{ route('typology-update', $typology -> id) }}" method="post">

    @csrf
    @method('post')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $typology -> name }}">
    <br>

    <label for="description">Description:</label>
    <input type="text" name="description" value="{{ $typology -> description }}">
    <br>

    <label for="tasks[]">Tasks:</label>
    <br>
    @foreach ($tasks as $task)
      <input type="checkbox" name="tasks[]" value="{{ $task -> id }}"
        @if ($typology -> tasks -> contains($task -> id))
          checked
        @endif

        {{-- @foreach ($typology -> tasks as $t_task)
          @if ($t_task -> id == $task -> id)
            checked
          @endif
        @endforeach --}}
      >
      {{ $task -> title }}
      <br>
    @endforeach
    <br>

    <input type="submit" value="Submit">

  </form>

@endsection
