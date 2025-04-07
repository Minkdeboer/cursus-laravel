<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        // Alle Benutzer abrufen außer dem aktuell angemeldeten User
        $users = User::where('id', '!=', Auth::id())->get(); 
        
        // Die Daten an die View 'dashboard' weitergeben
        return view('dashboard', compact('users'));
    }

    function fetchMessages(Request $request) {
        $contact = User::findOrFail($request->contact_id);

        return response()->json([
            'contact' => $contact,

        ]);
    }

    function sendMessage(Request $request) {
        dd($request->all());
    }
}
