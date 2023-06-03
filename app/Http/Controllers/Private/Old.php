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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return Conversation::with('users')
            ->where('user_one', $user->id)
            ->orWhere('user_two', $user->id)
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
        $conversation = Conversation::find($request->get('conversation_id'))->get();
        if ($conversation->status) {
            $message = $user->messages()->create([
                'message' => $request->input('message'),
                'conversation_id' => $request->input('conversation_id'),
            ]);
            // $message = new Message();
            // $message->message = $request->get('message');
            // $message->user_id = $user->id;
            // $message->conversation_id = $request->get('conversation_id');
            // $message->save();
            broadcast(new \App\Events\MessageSent($message, $user, $conversation))->toOthers();

            return ['message' => 'Message Sent!'];
        }
    }

    /**
     * Fetch all messages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Conversation::with('message', 'users')
            ->find($id)
            ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $conversation = Conversation::find($request->get('conversation_id'))->get();
        if ($conversation->status) {
            $message = Message::find($id);
            $message->udpate($request->all());
            broadcast(new \App\Events\MessageSent($message, $user, $conversation))->toOthers();

            return ['message' => $message->load('user')];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $message = Message::destroy($id);
        // $user = auth()->user();
        // broadcast(new \App\Events\MessageSent($message, $user, $conversation))->toOthers();
        // return ['message' => $message];
    }

    public function ping(Request $request)
    {
    }
}
