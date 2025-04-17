<?php
namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EcomNotification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = EcomNotification::where('customer_id', auth()->id())
            ->orderByDesc('created_at')
            ->get(['title', 'body',]); // include created_at
        return view('webapp.notification', compact('notifications'));
    }

}