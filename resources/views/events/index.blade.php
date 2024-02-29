@extends('layouts.app')
@section('content')
    <h1>Events: [{{ count($events) }}]</h1>
    {{-- CREATE --}}
    <a href="{{ route('event.create') }}">CREATE</a>

    <ul>
        @foreach ($events as $event)
            <li>
                
                <a href="{{route('event.show', $event->id)}}"><h2>{{ $event->title }}</h2></a>
            </li>
        @endforeach
    </ul>
@endsection
