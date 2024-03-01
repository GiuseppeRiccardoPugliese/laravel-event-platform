@extends('layouts.app')
@section('content')
@auth
    <h1>Events: [{{ count($events) }}]</h1>
    {{-- CREATE --}}
    <a href="{{ route('event.create') }}">CREATE</a>

    <ul>
        @foreach ($events as $event)
            @if ($user==$event->user->id)
                <li>
                    {{-- SHOW --}}
                    <a href="{{ route('event.show', $event->id) }}">
                        <h2>{{ $event->title }}</h2>
                    </a>
                    <form action="{{ route('event.delete', $event->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <input type="submit" value="DELETE" id="delete" name="delete">
                    </form>
                </li>
                <a href="{{ route('event.edit', $event->id) }}"><button>EDIT</button></a>
            @endif
        @endforeach

    </ul>
@endauth

@endsection
