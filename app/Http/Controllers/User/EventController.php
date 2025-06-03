<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
public function index(Request $request)
{
    $query = Event::query();

    if ($request->has('keywords') && !empty($request->keywords)) {
        $keywords = $request->keywords;

        $query->where(function ($q) use ($keywords) {
            $q->where('topic', 'LIKE', "%{$keywords}%")
              ->orWhere('description', 'LIKE', "%{$keywords}%")
              ->orWhere('venue', 'LIKE', "%{$keywords}%");
        });
    }

    $events = $query->latest()->paginate(9)->appends($request->query());
    $events = $query->latest()->paginate(3)->appends($request->query());

    return view('user.news-events', compact('events'));
}


}