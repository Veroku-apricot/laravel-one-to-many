@extends('layouts.mainLayout')

@section('content')

  <h1>Task: {{ $task -> title }} </h1>
  <h2>Description: {{ $task -> description }}</h2>
  <h2>
    Typologies:
    @foreach ($task -> typologies as $typology)
      <li>
          {{ $typology -> name }}
      </li>
    @endforeach
  </h2>

@endsection
