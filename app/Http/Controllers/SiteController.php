<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SiteController extends Controller
{
    public function display()
    {
        $events = Event::all();
        $isNew = true;

        return view('admin/admin', compact('events', 'isNew'));
    }

    public function displayEdit($id)
    {
        $event = Event::where('id', $id)->first();
        $events = Event::all();
        $isNew = false;

        return view('admin/admin', compact('isNew', 'event', 'events'));
    }

    public function saveEvent(Request $request)
    {
        $event = new Event;

        $event->image_id = $request->input('image_id');
        $event->dateTime = $request->input('dateTime');
        $event->place = $request->input('place');
        $event->address = $request->input('address');
        $event->link = $request->input('link');
        $event->entry = $request->input('entry');

        $event->save();

        return redirect()->route('event', [$event->id]);
    }

    public function event($id)
    {
        $event = Event::where('id', $id)->first();

        return view('admin/event', compact('event'));
    }

    public function editEvent(Request $request, $id)
    {
        $event = Event::where('id', $id)->first();

        $event->image_id = $request->input('image_id');
        $event->dateTime = $request->input('dateTime');
        $event->place = $request->input('place');
        $event->address = $request->input('address');
        $event->link = $request->input('link');
        $event->entry = $request->input('entry');

        $event-> save();

        return redirect()->route('event', [$event->id]);
    }

    public function deleteEvent($id)
    {
        $event = Event::where('id', $id)->first();
        $event->delete();
        $isNew = true;

        return redirect()->route('admin', compact('isNew'));
    }
}
