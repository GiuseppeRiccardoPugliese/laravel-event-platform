<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user=Auth::id();
        $events = Event::all();

        return view('events.index', compact('events','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ottengo l'ID dell'utente autenticato
        $user_id = Auth::id();
        $tags = Tag::all();

        return view('events.create', compact('tags', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $event = new Event();
        $event->title = $data['title'];
        $event->description = $data['description'];

        // utilizzo l'ID dell'utente autenticato
        $event->user_id = Auth::id();

        $event->save();

        $event->tags()->attach($data['tag_id']);

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event= Event::find($id);
        $tags=Tag::all();

        return view('events.edit', compact('event','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $event = Event::find($id);

        $event->title = $data['title'];
        $event->description = $data['description'];

        $event->save();

        $event->tags()->sync($data['tag_id']);

        return redirect()->route('event.index', $event ->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $event = Event :: find($id);
        $event -> tags() -> sync([]);
        $event -> delete();

        return redirect() -> route('event.index');
    }
}


