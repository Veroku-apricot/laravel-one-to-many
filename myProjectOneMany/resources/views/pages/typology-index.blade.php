@extends('layouts.mainLayout')

@section('content')

  <h1>Typologies</h1>
  <a href="{{ route('typology-create') }}">CREATE NEW TYPOLOGY</a>

  <ul>
    @foreach ($typologies as $typology)
      <li>
        <a href="{{ route('typology-show', $typology -> id) }}">
          {{ $typology -> name }}
        </a>
        <a href="{{ route('typology-edit', $typology -> id) }}">
          EDIT
        </a>
      </li>
    @endforeach
  </ul>

@endsection
