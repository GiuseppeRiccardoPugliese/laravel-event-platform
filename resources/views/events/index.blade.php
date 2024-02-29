@extends('layouts.app')
@section('content')
    <ul>
        @foreach ($events as $event)
            <li>
                
                <a href="{{route('event.show', $event->id)}}"><h2>{{ $event->title }}</h2></a>
            </li>
        @endforeach
    </ul>
@endsection
