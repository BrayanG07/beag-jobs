<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Este código obtiene las notificaciones no leídas del usuario autenticado
        $notifications = auth()->user()->unreadNotifications;  
        
        // Este código marca todas las notificaciones no leídas del usuario autenticado como leídas
        auth()->user()->unreadNotifications->markAsRead();  

        return view('notifications.index', [
            'notifications' => $notifications,
        ]);
    }
}
