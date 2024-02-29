@extends('layouts.app')
@section('content')
    <ul>
        @foreach ($events as $event)
            <li>
                <h2>{{ $event->name }}</h2>
                <h2>{{ $event->description }}</h2>
                <form  action="{{ route('event.destroy', $event->id) }}" method="">

                    @csrf
                    @method("DELETE")

                    <input type="submit" value="DELETE" id="destroy"  name="destroy">
                </form>
            </li>
        @endforeach
    </ul>
@endsection


