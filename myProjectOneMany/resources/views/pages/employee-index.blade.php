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
          @foreach ($employee -> tasks as $task)
            <li>
              {{ $task -> title}}
            </li>
          @endforeach
        </ul>
      </li>

    @endforeach
  </ul>

@endsection
