<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store(EventRequest $request)
    {
        return Event::create($request->validated());
    }

    public function show(Event $event)
    {
        return $event;
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return $event;
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json();
    }
}
