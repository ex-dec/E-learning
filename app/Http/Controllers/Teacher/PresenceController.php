<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::orderBy('created_at', 'desc')->get();
        return view('teacher.presence.index', compact('presences'));
    }
}
