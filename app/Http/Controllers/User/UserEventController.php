<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;

class UserEventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('user.news-events', compact('events'));
    }
}
