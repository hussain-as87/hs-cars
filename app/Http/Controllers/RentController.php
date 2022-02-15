<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Car;
use App\Models\Rent;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RentCar;

class RentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:rents', ['only' => 'index']);
        $this->middleware('permission:rents-delete', ['only' => 'destroy']);
        $this->middleware('auth');
    }
    public function rent_home($id)
    {
        $car = Car::find($id);
        return view('home.rent', compact('car'));
    }
    public function index()
    {
        $rents = RentCar::with('car', 'rent.user')->orderByDesc('created_at')->paginate(10);
        return view('Admin.rents.index', compact('rents'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'car_id' => 'required',
            'drop_off_location' => 'required',
            'pik_up_date' => 'required|date',
            'drop_off_date' => 'required|date|after:pik_up_date',
            'pik_up_time' => 'required'
        ]);
        $data['location'] = $request->location;
        $data['user_id'] = $request->user()->id;
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

        $rent = Rent::create($data);

        RentCar::create([
            'rent_id' => $rent->id,
            'car_id' => $request->car_id,
            'amount' => $amount,
        ]);
        toastr()->success(__('Successfully Saved !!'));
        return  redirect()->back();
    }

    public function destroy($id)
    {
        $rent = Rent::find($id);
        if (!$rent) {
            return redirect()->route('error-404')->with('direction', 'rent.index');
        } else {
            RentCar::where('rent_id', $id)->delete();
            $rent->delete();
            return redirect()->route('rent.index')->with('delete', 'Successfully deleted !!');
        }
    }
}
