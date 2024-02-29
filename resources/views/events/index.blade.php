@extends('layouts.app')
@section('content')
    <h1>Events: [{{ count($events) }}]</h1>
    {{-- CREATE --}}
    <a href="{{ route('event.create') }}">CREATE</a>

    <ul>
        @foreach ($events as $event)
            <li>
                <h2>{{ $event->name }}</h2>
                <h2>{{ $event->description }}</h2>
            </li>
        @endforeach
    </ul>
@endsection
