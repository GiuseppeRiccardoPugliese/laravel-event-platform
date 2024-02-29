@extends('layouts.app')
@section('content')
    <form action="{{ route('event.store') }}" method="POST">
        @csrf
        @method('POST')
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="tag_id">Select a tag</label>
        <select name="tag_id" id="tag_id">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>

        <input type="submit" value="CREATE">
    </form>
@endsection
