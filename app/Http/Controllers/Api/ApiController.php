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
        $events = Event::all();

        return response()->json([

            'events' => $events,

        ]);
    }
}