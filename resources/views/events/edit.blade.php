@extends('layouts.app')
@section('content')
    <h1>EDIT YOUR EVENT</h1>
    <form action="{{ route('event.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$event->title}}">

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{$event->description}}">

        <div>
            <h1>TAGS: </h1>
            @foreach ($tags as $tag)
                <div>
                    <input type="checkbox" name="tag_id[]" id="{{"tag_" . $tag->id}}"
                    value="{{$tag->id}}"

                    @foreach ($event->tags as $eTag)
                        @checked($eTag->id === $tag->id)
                    @endforeach
                    >

                    <label for="{{"tag_" . $tag->id}}">
                        {{$tag->name}}
                    </label>
                </div>


            @endforeach
        </div>

        <input type="submit" value="EDIT">
    </form>
@endsection
