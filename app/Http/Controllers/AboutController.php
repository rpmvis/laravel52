<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function thiswebsite()
    {
        return view('app.thiswebsite');
    }
}
