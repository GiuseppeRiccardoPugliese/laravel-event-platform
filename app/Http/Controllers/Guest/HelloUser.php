<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class HelloUser extends Controller
{
    public function index(){

        $events = Event::all();
        return view('hello', compact('events'));
    }
}
