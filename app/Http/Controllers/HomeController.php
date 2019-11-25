<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CaseDate;


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
        // $today = '2019-11-25';
        $today = date("Y-m-d");

        $caseDates = CaseDate::where('next_date','>', $today)->orderBy('next_date','asc')->get();
        return view('home', compact('caseDates'));
    }

    public function listusers()
    {
        $users = User::get();
        return view('users.list', compact('users'));
    }

    
}
