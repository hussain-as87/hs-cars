<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Admin\Advert;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at','desc')->paginate(4);
        $advert = Advert::first();
        return view('home\index', compact('cars','advert'));
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
