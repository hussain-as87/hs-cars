<?php

namespace App\Http\Controllers;

use App\Models\Admin\Setting;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function change_them_dark(Request $request)
    {
        $them = "2";
        if (Auth::user() != null) {
            Auth::user()->profile()->update(['them' => $them]);
        }
        return redirect()->back()->with(Session::put('them', $them));
    }

    public function change_them_light(Request $request)
    {
        $them = "1";
        if (Auth::user() != null) {
            Auth::user()->profile()->update(['them' => $them]);
        }
        return redirect()->back()->with(Session::put('them', $them));
    }
}
