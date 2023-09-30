<?php

namespace App\Http\Controllers;

use App\Models\Shortner;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

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
    // public function welcome()
    // {
    //     return view('welcome');
    // }
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
         $links = Shortner::where('user_id', Auth::user()->id)->paginate(10);
        return view('dashboard', [
            'links' => $links,
        ]);
    }
}
