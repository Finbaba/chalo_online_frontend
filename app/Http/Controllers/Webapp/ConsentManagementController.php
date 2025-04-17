<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsentManagementController extends Controller
{
    public function index()
    {
        return view('webapp.consent_management');
    }
}
