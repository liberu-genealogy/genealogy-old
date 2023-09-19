<?php

// use App\Broadcasting\Notification;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('user.{user}', Notification::class);
Broadcast::channel('chat', fn(): string => 'user');
