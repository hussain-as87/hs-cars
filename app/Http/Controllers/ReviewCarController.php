<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Events\ReviewEvent;
use Illuminate\Http\Request;

class ReviewCarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($car)
    {
        $reviews = Review::with('user')->where('car_id', $car)->orderByDesc('created_at')->paginate(3);
        return response()->json($reviews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $car)
    {
        $request->validate([
            'review' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:1'
        ]);
        $data['car_id'] = $car;
        $data['user_id'] = auth()->id();
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;

        $rev = Review::create($data);
        if ($rev) {
            event(new ReviewEvent($rev));
            toastr()->success(__('Successfully Saved !!'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $car)
    {
        $request->validate([
            'review' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:1'
        ]);
        $data['review'] = $request->review;
        $data['rating'] = $request->rating;

        $rev = Review::where(['car_id'=>$car,'user_id'=>auth()->id()])
        ->update($data);

        if ($rev) {
            toastr()->success(__('Successfully Updated !!'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($car)
    {
        $rev = Review::where(['car_id'=>$car,'user_id'=>auth()->id()])
        ->delete();

        if ($rev) {
            toastr()->error(__('Successfully Deleted !!'));
            return redirect()->back();
        }
    }
}
