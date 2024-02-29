@extends('layouts.app')
@section('content')
    <h1>TITLE: {{$event->title}}</h1>
    <p>DESCRIPTION: {{$event->description}}</p>

    @foreach ($event->tags as $tag)
        <h2>TAG: {{$tag->name}}</h2>
    @endforeach

@endsection
