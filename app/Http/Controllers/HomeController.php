<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
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

    public function index()
    {
        $cars = Car::all();
        return view('home\index', compact('cars'));
    }

    public function change_them_dark(Request $request)
    {
        $them = "2";
        return  redirect()->back()->with(Session::put('them',$them));
    }

    public function change_them_light(Request $request)
    {
        $them = "1";
        return redirect()->back()->with(Session::put('them',$them));
    }
}
