<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use App\Models\Car;
use App\Models\Admin\Advert;
use App\Models\Admin\Service;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('feature','pricing')->orderBy('created_at','desc')->paginate(4);
        $cars_count = Car::all()->count();
        $users_count = User::all()->count();
        $advert = Advert::first();
        $about = About::first();
        $services = Service::orderBy('id', 'DESC')->paginate(4);
        return view('home\index', compact('cars','advert','about','services','cars_count','users_count'));
    }
    public function about()
    {
        $cars = Car::all();
        return view('home.about', compact('cars'));
    }
    public function service()
    {
        $cars = Car::all();
        return view('home.services', compact('cars'));
    }
    public function pricing()
    {
        $cars = Car::all();
        return view('home.pricing', compact('cars'));
    }
    public function cars()
    {
        $cars = Car::all();
        return view('home.car', compact('cars'));
    }
    public function blog()
    {
        $cars = Car::all();
        return view('home.blog', compact('cars'));
    }
    public function contact()
    {
        $cars = Car::all();
        return view('home.contact', compact('cars'));
    }
}
