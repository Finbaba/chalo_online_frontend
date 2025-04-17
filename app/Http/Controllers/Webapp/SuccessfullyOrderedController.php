<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessfullyOrderedController extends Controller
{
    public function index()
    {
        session()->forget('cart');
        return view('webapp.successfullyordered');
    }
}
