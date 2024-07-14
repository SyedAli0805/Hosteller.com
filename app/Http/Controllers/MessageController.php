<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    //Save Message
    public function saveMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string'
        ]);
        $message = new Message($validated);
        $message->save();
        return redirect()->route('home');
    }
}
