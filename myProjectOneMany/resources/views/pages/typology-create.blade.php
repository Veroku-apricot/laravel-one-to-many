@extends('layouts.mainLayout')

@section('content')

  <h1>New Typology</h1>

  <form class="" action="{{ route('typology-store') }}" method="post">

    @csrf
    @method('post')

    <label for="name">Name:</label>
    <input type="text" name="name" value="">
    <br>

    <label for="description">Description:</label>
    <input type="text" name="description" value="">
    <br>

    <label for="tasks[]">Tasks:</label>
    <br>
    @foreach ($tasks as $task)
      <input type="checkbox" name="tasks[]" value="{{ $task -> id }}">
      {{ $task -> title }}
      <br>
    @endforeach
    <br>

    <input type="submit" value="Submit">

  </form>

@endsection
