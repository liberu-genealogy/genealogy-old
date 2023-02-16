<?php

use App\Http\Controllers\Trees\Gift;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Private\ChatsController;

Route::get('/trees/gift/create', [Gift::class, 'createOrder'])->name('gift.create.order');
Route::get('/trees/gift/order/{orderId}', [Gift::class, 'getOrder'])->name('gift.get.order');
Route::get('/trees/gift/order/{orderId}/shipping', [Gift::class, 'getShippingAddress'])->name('gift.get.shipping');
// Route::get('gedcom-progress', function(){
//     broadcast(new \App\Events\GedComProgressSent);
// });

// Route::get('/getUserLogin', function(){
//     return auth()->user();
// })->middleware('auth');

// Route::get('/messages', function(){
//     return App\Models\Conversation::with('message')
//     ->where('user_one', auth()->user()->id)
//     ->orWhere('user_two', auth()->user()->id)
//     ->get();
//     // ->latest()
//     // ->paginate(20);
// })->middleware('auth');
// Route::post('/messages', function(){
//     $user = auth()->user();
//     $conversation = App\Models\Conversation::find(request()->get('conversation_id', null))->get();
//     if($conversation->status){
//         $message = new App\Models\Message();
//         $message->message = request()->get('message', '');
//         $message->user_id = $user->id;
//         $message->conversation_id = request()->get('conversation_id', null);
//         $message->save();
//         broadcast(new App\Events\MessagePosted($message, $user, $conversation))->toOthers();
//         return ['message' => $message->load('user')];
//     }
// })->middleware('auth');
Route::get('/socketTest', function () {
    if (broadcast(new App\Events\ServerCreated('hello'))) {
        return 'ok';
    }
});

/**
Route::middleware('auth')
    ->group(function () {
        Route::get('connects', 'ChatsController@fetchConnects');
        Route::get('messages/{id}', 'ChatsController@fetchMessages');
        Route::post('messages/{id}', 'ChatsController@sendMessage');
    });
**/
Route::view('/{any}', 'index')->where('any', '.*');
