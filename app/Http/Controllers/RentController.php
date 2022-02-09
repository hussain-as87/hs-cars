<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:rents', ['only' => ['index', 'destroy']]);
        $this->middleware('auth');
    }
    public function rent_home($id)
    {
        $car = Car::find($id);
        return view('home.rent', compact('car'));
    }
    public function index()
    {
        return view('Admin.rents.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'car_id' => 'required',
            'drop_off_location' => 'required',
            'pik_up_date' => 'required|date',
            'drop_off_date' => 'required|date',
            'pik_up_time' => 'required'
        ]);
        $data['location'] = $request->location;
        $data['user_id'] = $request->user()->id;
        $data['car_id'] = $request->car_id;
        $data['drop_off_location'] = $request->drop_off_location;
        $data['pik_up_date'] = $request->pik_up_date;
        $data['drop_off_date'] = $request->drop_off_date;
        $data['pik_up_time'] = $request->pik_up_time;

        $datetime1 = date_create($request->pik_up_date);
        $datetime2 = date_create($request->drop_off_date);
        $interval = date_diff($datetime1, $datetime2);
        $total_amount = $interval->format('%a');
        $car = Car::find($request->car_id);
        $amount = $car->pricing->in_day * $total_amount;
        $data['total_amount'] = $amount;
 
        $rent = Rent::create($data);
        if (!$rent) {
            return redirect()->back()->with('error', 'You Have An Error !!');
        } else {
            return redirect()->back()->with('success', __('Successfully Saved !!'));
        }
    }
    public function destroy($id)
    {
        $rent = Rent::find($id);
        if (!$rent) {
            return redirect()->route('error-404')->with('direction', 'home.rent');
        } else {
            $rent->delete();
            return redirect()->route('contacts.index')->with('delete', 'Successfully deleted !!');
        }
    }
}
