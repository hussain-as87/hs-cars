<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use App\Models\Contact;
use App\Models\RentCar;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_count = User::all()->count();
        $car_count = Car::all()->count();
        $contact_count = Contact::whereDate('created_at', Carbon::today())->count();
        $rent_count = Rent::whereDate('created_at', Carbon::today())->count();
        $category_count = Category::all()->count();

        return view('Admin.home', compact('user_count', 'car_count',
         'contact_count', 'rent_count', 'category_count'));
    }
}
