<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIProfile extends Controller
{
    public function profile(Request $request)
    {
        return $request->user();
    }
}
