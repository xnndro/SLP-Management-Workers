<?php

namespace App\Http\Controllers;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get user id and if 1 so redirect to dashboard
        if (auth()->user()->roles_id == 1) {
            return view('supervisor.pages.dashboard');
        } else {
            return view('workers.pages.dashboard');
        }
    }
}
