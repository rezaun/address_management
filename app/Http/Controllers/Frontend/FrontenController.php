<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontenController extends Controller
{
    public function index(){
        return view('auth.login');
    }

}
