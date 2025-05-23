<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Models\Message;
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
        $messages = Message::where('form_id', Auth::user()->id)->where('to_id', $request->contact_id)
          ->orWhere('form_id', $request->contact_id)->where('to_id', Auth::user()->id)
          ->get();
           
        return response()->json([
            'contact' => $contact,
            'messages' => $messages

        ]);
    }

    function sendMessage(Request $request) {
        $request->validate([
            'contact_id' => 'required',
             'message' => ['required', 'string'],       
        ]);

        $message = new Message();
        $message->form_id = Auth::id();
        $message->to_id = $request->contact_id;
        $message->message = $request->message;
        $message->save();

        event(new SendMessageEvent($message->message, Auth::user()->id, $request->contact_id));

        return response($message);
    }
}
