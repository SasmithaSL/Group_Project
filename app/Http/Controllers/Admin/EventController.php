<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
{
    $events = Event::latest()->get();
    return view('admin.announcements', compact('events'));
}
    public function store(Request $request)
    {
        $data = $request->validate([
            'topic' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return back()->with('success', 'Event added successfully!');
    }

    public function destroy($id)
{
    $event = Event::findOrFail($id);

    // Delete image if exists
    if ($event->image && \Storage::disk('public')->exists($event->image)) {
        \Storage::disk('public')->delete($event->image);
    }

    $event->delete();

    return back()->with('success', 'Event deleted successfully.');
}
public function update(Request $request, $id)
{
    $data = $request->validate([
        'topic' => 'required',
        'description' => 'required',
        'event_date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
        'venue' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $event = Event::findOrFail($id);

    if ($request->hasFile('image')) {
        // Delete old image
        if ($event->image && \Storage::disk('public')->exists($event->image)) {
            \Storage::disk('public')->delete($event->image);
        }

        $data['image'] = $request->file('image')->store('events', 'public');
    }

    $event->update($data);

    return back()->with('success', 'Event updated successfully!');
}


}