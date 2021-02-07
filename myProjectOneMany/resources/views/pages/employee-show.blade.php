@extends('layouts.mainLayout')

@section('content')

  <h1>Employee: {{ $employee -> name }} {{ $employee -> lastname }}</h1>
  <h2>Date of birth: {{ $employee -> date_of_birth }}</h2>
  <h2>
    Tasks:
    @foreach ($employee -> tasks as $task)
      <li>
        <a href="{{ route('task-show', $task -> id) }}">
          {{ $task -> title }}
        </a>
      </li>
    @endforeach
  </h2>

@endsection
