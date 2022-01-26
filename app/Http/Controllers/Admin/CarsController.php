<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\ImageUpload;
use App\Models\Car;
use Illuminate\Http\Request;

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
      /*   $this->middleware('permission:car-list|car-create|car-edit|car-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:car-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:car-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:car-delete', ['only' => ['destroy']]); */
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
        return view('Admin.cars.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $car = Car::create($data);

        if ($car) {
            return redirect()->route('cars.index')->with('success', 'Car has been created !!!');
        } else {
            return redirect()->route('cars.index')->with('error', 'Car has not created !!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
        return view('Admin.cars.edit', compact('car'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
        return view('Admin.cars.show', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->getValidation($request);

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        if ($request->hasFile('image')) {
            $image = ImageUpload::upload_image($request->image, $this->path_image);
            $data['image'] = $image;
        }
        $data['mileage'] = $request->mileage;
        $data['transmission_type'] = $request->transmission_type;
        $data['seats'] = $request->seats;
        $data['luggage'] = $request->luggage;
        $data['fuel'] = $request->fuel;

        $car = Car::findOrFail($id);

        if ($car) {
            $car->update($data);
            return redirect()->route('cars.index')->with('success', 'Car Has Been Updated !!!');
        } else {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car) {
            $car->delete();
            return redirect()->route('cars.index')->with('delete', 'Car Has Been Deleted !!!');
        } else {
            return redirect()->route('error-404')->with('direction', 'cars.index');
        }
    }
    protected function getValidation($request)
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'image' => 'required_if:image,null|file|image|mimes:png,jpg,jepg',
            'mileage' => 'required',
            'transmission_type' => 'required',
            'seats' => 'required',
            'luggage' => 'required',
            'fuel' => 'required',
        ]);
    }
}
