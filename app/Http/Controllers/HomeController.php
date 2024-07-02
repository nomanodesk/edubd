<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

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
        $findinstitue = Institution::where('user_id', Auth::user()->id)->get();
        dd($findinstitue);
        if ($findinstitue) {
            return view('home');
        } else {
            return view('addinstitue');
        }
    }
}
