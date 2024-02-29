@extends('layouts.app')
@section('content')
    <ul>
        @foreach ($tags as $tag)
            <li>
                {{ $tag->name }}
            </li>
        @endforeach
    </ul>
@endsection
