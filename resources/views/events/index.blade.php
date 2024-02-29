@extends('layouts.app')
@section('content')
    <ul>
        @foreach ($events as $event)
            <li>
                <h2>{{ $event->name }}</h2>
                <h2>{{ $event->description }}</h2>
            </li>
            <a href="{{ route('event.edit', $event->id) }}"><button>EDIT</button></a>
        @endforeach
    </ul>
@endsection
