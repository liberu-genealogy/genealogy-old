<?php
// use App\Broadcasting\Notification;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('user.{user}', Notification::class);
Broadcast::channel('App.Models.User.{id}', function($user, $id){
    return (int) $user->id === (int) $id;
});