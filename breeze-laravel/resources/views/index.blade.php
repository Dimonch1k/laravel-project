@extends('templates.main')

@section('content')
    <h1>{{ $title }}</h1>
    <h2>{{ $subtitle }}</h2>

    @foreach ($array as $item)
        <p>{{ $item }}</p>
    @endforeach
@endsection

@section('title')
