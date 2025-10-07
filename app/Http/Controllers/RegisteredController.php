<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    //
    public function createEmployer()
    {
        return view('auth.registerEmployer');
    }

    public function createApplicant()
    {
        return view('auth.registerApplicant');
    }
}
