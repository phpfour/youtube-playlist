<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpeakerRequest;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    public function index()
    {
        return Speaker::all();
    }

    public function store(SpeakerRequest $request)
    {
        return Speaker::create($request->validated());
    }

    public function show(Speaker $speaker)
    {
        return $speaker;
    }

    public function update(SpeakerRequest $request, Speaker $speaker)
    {
        $speaker->update($request->validated());

        return $speaker;
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();

        return response()->json();
    }
}
