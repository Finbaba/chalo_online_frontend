<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;

class QrcodeController extends Controller
{
    public function index()
    {
        return view('webapp.Qrcode'); 
}
