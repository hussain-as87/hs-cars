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
        $cars = Car::with('feature', 'pricing')->orderBy('created_at', 'desc')->paginate(4);
        $cars_count = Car::all()->count();
        $users_count = User::all()->count();
        $advert = Advert::first();
        $about = About::first();
        $services = Service::orderBy('id', 'DESC')->paginate(4);
        return view('home\index', compact('cars', 'advert', 'about', 'services', 'cars_count', 'users_count'));
    }
    public function about()
    {
        $cars_count = Car::all()->count();
        $users_count = User::all()->count();
        $about = About::first();
        return view('home.about', compact('cars_count', 'users_count', 'about'));
    }
    public function service()
    {
        $services = Service::orderByDesc('created_at')->paginate(4);
        return view('home.services', compact('services'));
    }
    public function pricing()
    {
        $cars = Car::with('pricing')->orderByDesc('created_at')->paginate(6);
        return view('home.pricing', compact('cars'));
    }
    public function cars()
    {
        $cars = Car::with('pricing', 'category')->orderByDesc('created_at')->paginate(10);
        return view('home.car', compact('cars'));
    }
    public function single_car($id)
    {
        $car = Car::with('pricing', 'category', 'feature')->where('id', $id)->first();
        $cars = Car::with('pricing', 'category')->where('id','!=', $car->id)->where('category_id', $car->category_id)->orderByDesc('created_at')->paginate(10);
        return view('home.car-single', compact('car', 'cars'));
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
