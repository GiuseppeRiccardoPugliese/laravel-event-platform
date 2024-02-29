@extends('layouts.app')
@section('content')
    <h1>Events: [{{ count($events) }}]</h1>
    {{-- CREATE --}}
    <a href="{{ route('event.create') }}">CREATE</a>

    <ul>
        @foreach ($events as $event)
            <li>

                {{-- SHOW --}}
                <a href="{{ route('event.show', $event->id) }}">
                    <h2>{{ $event->title }}</h2>
                </a>
                <h2>{{ $event->name }}</h2>
                <h2>{{ $event->description }}</h2>
                <form  action="{{ route('event.delete', $event->id) }}" method="POST">

                    @csrf
                    @method("DELETE")

                    <input type="submit" value="DELETE" id="delete"  name="delete">
                </form>
            </li>
            <a href="{{ route('event.edit', $event->id) }}"><button>EDIT</button></a>
        @endforeach
    </ul>
@endsection


