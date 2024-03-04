<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Importo i model
use App\Models\Event;
use App\Models\User;
use App\Models\Tag;


class ApiController extends Controller
{

    public function getAllEvents()
    {
        // Prendo gli eventi dal database insieme ai tag associati a ciascun evento
        $events = Event::with('tags')->get();

        return response()->json([

            'events' => $events,

        ]);
    }
    public function show($id)
    {
        $event = Event::find($id);

        return response()->json([

            'events' => $event,

        ]);
    }

    public function getAllUsers()
    {
        $users = User::all();

        return response()->json([

            'users' => $users,

        ]);
    }

    public function getAllTags()
    {
        $tags = Tag::all();

        return response()->json([

            'tags' => $tags,

        ]);
    }
}
