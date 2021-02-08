@extends('layouts.mainLayout')

@section('content')

<h1>Typology: {{ $typology -> name }}</h1>
<h2>Description: {{ $typology -> description }}</h2>
<h2>
  Tasks:
  @foreach ($typology -> tasks as $task)
    <li>
        {{ $task -> title }}
    </li>
  @endforeach
</h2>
@endsection
