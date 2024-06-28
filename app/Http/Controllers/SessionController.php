<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Session;

class SessionController extends Controller
{
    public function index()
    {
        return Session::all();
    }

    public function store(SessionRequest $request)
    {
        return Session::create($request->validated());
    }

    public function show(Session $session)
    {
        return $session;
    }

    public function update(SessionRequest $request, Session $session)
    {
        $session->update($request->validated());

        return $session;
    }

    public function destroy(Session $session)
    {
        $session->delete();

        return response()->json();
    }
}
