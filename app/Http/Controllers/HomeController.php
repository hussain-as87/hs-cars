<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function change_them_dark(Request $request)
    {
        $them = "2";
        Auth::user()->profile()->update(['them'=>$them]);
        return  redirect()->back()->with(Session::put('them',$them));
    }

    public function change_them_light(Request $request)
    {
        $them = "1";
        Auth::user()->profile()->update(['them'=>$them]);
        return redirect()->back()->with(Session::put('them',$them));
    }
}
