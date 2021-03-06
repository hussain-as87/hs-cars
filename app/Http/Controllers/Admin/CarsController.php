<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Car;
use App\Http\ImageUpload;
use App\Models\CarPricing;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CarsController extends Controller
{
    public $path_image = 'cars';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:car-list|car-create|car-edit|car-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:car-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:car-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:car-delete', ['only' => ['destroy']]);
        $this->middleware('permission:car-trash', ['only' => ['trash', 'restore', 'forceDelete']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.cars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Car $car)
    {
        $categories = Category::all();
        $car_pricing = DB::table('car_pricing')->where('car_id', $car->id)->first();
        $car_features = DB::table('car_features')->where('car_id', $car->id)->first();
        return view('Admin.cars.create', compact('car', 'categories', 'car_pricing', 'car_features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->getValidation($request);
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $image = ImageUpload::upload_image($request->image, $this->path_image);
                $data['image'] = $image;
            }
            $data['user_id'] = $request->user()->id;
            $data['mileage'] = $request->mileage;
            $data['transmission_type'] = $request->transmission_type;
            $data['seats'] = $request->seats;
            $data['luggage'] = $request->luggage;
            $data['fuel'] = $request->fuel;
            $data['category_id'] = $request->category_id;
            $car = Car::create($data);

            //price data
            $price_data['car_id'] = $car->id;
            $price_data['in_houre'] = $request->in_houre;
            $price_data['in_day'] = $request->in_day;
            $price_data['in_month'] = $request->in_month;
            $car->pricing()->create($price_data);

            //feather data
            $details_data['car_id'] = $car->id;
            $details_data['air_conditions'] = $request->air_conditions;
            $details_data['child_seat'] = $request->child_seat;
            $details_data['gps'] = $request->gps;
            $details_data['luggage'] = $request->luggage;
            $details_data['music'] = $request->music;
            $details_data['seat_beit'] = $request->seat_beit;
            $details_data['sleeping_bed'] = $request->sleeping_bed;
            $details_data['water'] = $request->water;
            $details_data['bluetooth'] = $request->bluetooth;
            $details_data['onboard_computer'] = $request->onboard_computer;
            $details_data['audio_input'] = $request->audio_input;
            $details_data['long_term_trips'] = $request->long_term_trips;
            $details_data['car_kit'] = $request->car_kit;
            $details_data['remote_central_locking'] = $request->remote_central_locking;
            $details_data['climate_control'] = $request->climate_control;

            $car->feature()->create($details_data);


            if ($car) {
                DB::commit();
                return redirect()->route('cars.index')->with('success', 'Successfully Saved !!');
            } else {
                return redirect()->route('cars.index')->with('error', 'Have Error !!');
            }
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $car = Car::find($id);

        $car_pricing = DB::table('car_pricing')->where('car_id', $id)->first();
        $car_features = DB::table('car_features')->where('car_id', $id)->first();
        if (!$car) {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
        return view('Admin.cars.edit', compact('car', 'categories', 'car_pricing', 'car_features'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $car_pricing = DB::table('car_pricing')->where('car_id', $id)->first();
        $car_features = DB::table('car_features')->where('car_id', $id)->first();

        // $car_pricing = DB::select('select * from car_pricing where car_id = :car_id', ['car_id' => $id]);
        //$car_features = DB::select('select * from car_features where car_id = :car_id', ['car_id' => $id]);
        // dd($car_features);
        if (!$car) {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
        return view('Admin.cars.show', compact('car', 'car_pricing', 'car_features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->getValidation($request);

        $car = Car::findOrFail($id);

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        if ($request->hasFile('image')) {
            $image = ImageUpload::upload_image($request->image, $this->path_image);
            $data['image'] = $image;
        }
        $data['mileage'] = $request->mileage;
        $data['user_id'] = auth()->id();
        $data['category_id'] = $request->category_id;
        $data['transmission_type'] = $request->transmission_type;
        $data['seats'] = $request->seats;
        $data['luggage'] = $request->luggage;
        $data['fuel'] = $request->fuel;

        //price data
        $price_data['car_id'] = $car->id;
        $price_data['in_houre'] = $request->in_houre;
        $price_data['in_day'] = $request->in_day;
        $price_data['in_month'] = $request->in_month;
        $car->pricing()->update($price_data);
        //feather data
        $details_data['car_id'] = $car->id;
        $details_data['air_conditions'] = $request->air_conditions;
        $details_data['child_seat'] = $request->child_seat;
        $details_data['gps'] = $request->gps;
        $details_data['luggage'] = $request->luggage;
        $details_data['music'] = $request->music;
        $details_data['seat_beit'] = $request->seat_beit;
        $details_data['sleeping_bed'] = $request->sleeping_bed;
        $details_data['water'] = $request->water;
        $details_data['bluetooth'] = $request->bluetooth;
        $details_data['onboard_computer'] = $request->onboard_computer;
        $details_data['audio_input'] = $request->audio_input;
        $details_data['long_term_trips'] = $request->long_term_trips;
        $details_data['car_kit'] = $request->car_kit;
        $details_data['remote_central_locking'] = $request->remote_central_locking;
        $details_data['climate_control'] = $request->climate_control;
        $car->feature()->update($details_data);

        if ($car) {
            $car->update($data);
            return redirect()->route('cars.index')->with('warning', 'Successfully Updated !!');
        } else {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        if ($car) {
            $car->delete();
            return redirect()->route('cars.index')->with('delete', 'Successfully Deleted !!');
        } else {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function trash()
    {
        return view('Admin.cars.trashed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $car = Car::withTrashed()->findOrFail($id);
        if (!$car) {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        } else {
            $car->restore();
            return redirect()->route('cars.index')
                ->with('primary', 'Successfully Restore !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        $car = Car::withTrashed()->find($id);
        if (!$car) {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        } else {
            $car->forceDelete();
            return redirect()->route('cars.trash')
                ->with('delete', 'Successfully Final Deleted !!');
        }
    }

    protected function getValidation($request)
    {
        return $request->validate([
            'name.*' => 'required',
            'description.*' => 'required|max:500',
            'image' => 'required_if:image,null|file|image|mimes:png,jpg,jepg',
            'mileage' => 'required',
            'category_id' => 'required',
            'transmission_type' => 'required',
            'seats' => 'required',
            'luggage' => 'required',
            'fuel' => 'required',
            'in_houre' => 'required|integer',
            'in_day' => 'required|integer',
            'in_month' => 'required|integer',
            'air_conditions' => 'required|integer|max:1',
            'child_seat' => 'required|integer|max:1',
            'gps' => 'required|integer|max:1',
            'music' => 'required|integer|max:1',
            'seat_beit' => 'required|integer|max:1',
            'sleeping_bed' => 'required|integer|max:1',
            'water' => 'required|integer|max:1',
            'bluetooth' => 'required|integer|max:1',
            'onboard_computer' => 'required|integer|max:1',
            'audio_input' => 'required|integer|max:1',
            'long_term_trips' => 'required|integer|max:1',
            'car_kit' => 'required|integer|max:1',
            'remote_central_locking' => 'required|integer|max:1',
            'climate_control' => 'required|integer|max:1',
        ]);
    }
}
