<?php
namespace App\Http\Controllers\Webapp;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function history()
    {
        return view('webapp.order-history');
    }
}