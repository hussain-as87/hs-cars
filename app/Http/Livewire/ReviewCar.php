<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ReviewCar extends Component
{
    public $car;
    public $limit = 3;
    public $rating = '';
    public $comment = '';
    public $deleteId = '';
    public $updateId = '';
    protected $rules = [
        'comment' => 'required|max:500'
    ];

    public function mount(Car $car)
    {
        $this->car = $car;
    }
    public function loadMore()
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        $this->limit = $this->limit + 5;
    }
    public function loadLess()
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        if ($this->limit != 3) {
            $this->limit = $this->limit - 5;
        }
    }

    public function render()
    {
        $reviews = Review::with('user.profile')->where('car_id', $this->car->id)->orderByDesc('created_at')->paginate($this->limit);
        $reviews_count = Review::where('car_id', $this->car->id)->get()->count();
        return view('livewire.review-car', compact('reviews', 'reviews_count'));
    }
    public function store()
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        $this->validate();
        $data['car_id'] = $this->car->id;
        $data['user_id'] = auth()->id();
        $data['review'] = $this->comment;
        $data['rating'] = $this->rating ? $this->rating : "0";

        $rev = Review::create($data);

        if ($rev) {
            $this->reset_input();
            toastr()->success('Successfully Save !!');
            return redirect()->back();
        }
    }
    public function updateId($id)
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        $this->updateId = $id;
    }

    public function update()
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        $this->validate();
        $data['car_id'] = $this->car->id;
        $data['user_id'] = auth()->id();
        $data['review'] = $this->comment;
        $data['rating'] = $this->rating;
        dd($data);
        $rev = Review::find($this->updateId)->update($data);

        if ($rev) {
            $this->reset_input();
            toastr()->success('Successfully Updated !!');
            return redirect()->back();
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroyId($id)
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        $this->deleteId = $id;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy()
    {
        if (Auth::user() == null) {
            return redirect()->to('/login');
        }
        $rev = Review::find($this->deleteId)->delete();

        if ($rev) {
            toastr()->error('Successfully Deleted !!');
            return redirect()->back();
        }
    }
    public function reset_input()
    {
        $this->comment = '';
        $this->rating = '';
    }
}
