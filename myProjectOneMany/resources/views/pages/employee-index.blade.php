@extends('layouts.mainLayout')

@section('content')

  <h1>Employees</h1>

  <ul>
    @foreach ($employees as $employee)
      <li>
        {{ $employee -> name }}
        {{ $employee -> lastname }}
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
