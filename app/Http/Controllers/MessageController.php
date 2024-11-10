<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use App\Models\ClientMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    function message()
    {
        $messages = ClientMessage::latest()->paginate(20);
        return view('pages.dashboard.messages', compact('messages'));
    }

    function create_message(Request $request)
    {
        ClientMessage::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'desp' => $request->input('desp'),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Your message has been sent!',
        ]);
    }

    function delete_message(Request $request)
    {
        ClientMessage::find($request->message_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    function reply_message(Request $request)
    {
        $message = ClientMessage::find($request->id);
        return view('pages.dashboard.message_view', compact('message'));
    }

    function update_message(Request $request)
    {
        $data = $request->reply;
        // Mail::to($request->input('email'))->send(new MessageMail($data));
        ClientMessage::find($request->message_id)->update([
            'reply' => $data,
            'sts' => 1,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Message Has been Replied',
        ]);
    }
}
