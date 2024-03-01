@extends('layouts.app')
@section('content')
    <h1>Events: [{{ count($events) }}]</h1>
    <ul>
        @foreach ($events as $event)
            <li>

                {{-- SHOW --}}
                <a>
                    <h2>{{ $event->title }}</h2>
                </a>

            </li>
        @endforeach
    </ul>
@endsection
