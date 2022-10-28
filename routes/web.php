<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChatController;
use App\Models\ChatRoom;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/chat', function () {
        return Inertia::render('Chat/container');
    })->name('chat');
});

Route::middleware('auth:sanctum',)->get('/chat/rooms', [ChatController::class, 'rooms']);
Route::middleware('auth:sanctum',)->get('/chat/room/{roomId}/messages', [ChatController::class, 'messages']);
Route::middleware('auth:sanctum',)->post('/chat/room/{roomId}/message', [ChatController::class, 'newMessage']);
