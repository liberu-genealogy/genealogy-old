<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    /**
     * Fetch all of Connects.
     *
     * @return Connects
     */
    public function fetchConnects()
    {
        $user = Auth::user();

        return Conversation::where(function ($query) use ($user) {
            $query->where('user_one', $user->id)
                ->orWhere('user_two', $user->id);
        })
            ->with(['userOne', 'userTwo', 'message'])
            ->get();
    }

    /**
     * Fetch all of messages.
     *
     * @param id
     * @return Message
     */
    public function fetchMessages($id)
    {
        return Conversation::with('message', 'users')
            ->find($id)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Check if a chat already exists between the logged-in user and the receiver
        $conversation = Conversation::where(function ($query) use ($user, $request) {
            $query->where('user_one', $user->id)
                ->where('user_two', $request->user_two);
        })->orWhere(function ($query) use ($user, $request) {
            $query->where('user_one', $request->user_two)
                ->where('user_two', $user->id);
        })->first();

        if (!$conversation) {
            $conversation = new Conversation($request->input());
            $conversation->user_one = $user->id;
            $conversation->save();
            return $conversation;
        }
        return [];
    }

    /**
     * Persist message to database.
     *
     * @param  Request  $request,  $id
     * @return Response
     */
    public function sendMessage(Request $request, $id)
    {
        $user = Auth::user();
        $conversation = Conversation::find($id);
        if ($conversation->status) {
            // $message = $user->messages()->create([
            //     'message' => $request->input('message'),
            //     'conversation_id' => $id
            // ]);
            $message = new Message();
            $message->message = $request->input('message');
            $message->user_id = $user->id;
            $message->conversation_id = $id;
            $message->save();
            // broadcast(new \App\Events\MessageSent($message, $user, $id))->toOthers();

            return $message;
        }
    }
}
