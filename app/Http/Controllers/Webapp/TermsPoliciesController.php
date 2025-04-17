<?php

namespace App\Http\Controllers\Webapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsPoliciesController extends Controller
{
    public function index()
    {
        return view('webapp.terms-policies');
    }
}
