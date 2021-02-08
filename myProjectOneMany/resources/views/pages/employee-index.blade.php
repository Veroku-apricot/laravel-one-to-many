@extends('layouts.mainLayout')

@section('content')

  <h1>Employees</h1>

  <ul>
    @foreach ($employees as $employee)
      <li>
        <a href="{{ route('employee-show', $employee -> id) }}">
          {{ $employee -> name }}
          {{ $employee -> lastname }}
        </a>

        <ul>
          <li>Tasks:</li>
          @foreach ($employee -> tasks as $task)
            <li>
              <a href="{{ route('task-show', $task -> id) }}">
                {{ $task -> title }}
              </a>
            </li>
          @endforeach
        </ul>
      </li>

    @endforeach
  </ul>
  
@endsection
