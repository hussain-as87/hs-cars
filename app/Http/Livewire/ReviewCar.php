<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\DisableReview;
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
        'rating' => 'required_if:comment,null|max:500',
        'comment' => 'required_if:rating,null|max:500'
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
        $reviews = Review::whereNotIn('id', function ($query) {
            $query->select('review_id')->from('disable_reviews');
        })->with('user.profile')->where('car_id', $this->car->id)
            ->orderByDesc('created_at')->paginate($this->limit);
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

        $u = Review::where(['user_id' => \auth()->id(), 'car_id' => $this->car->id])->first();

        if ($u == null) {
            $rev = Review::create($data);
            $this->reset_input();
            toastr()->success('Successfully Save !!');
            return redirect()->back();
        } else {
            $u->update($data);
            $this->reset_input();
            toastr()->warning('Successfully Updated !!');
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
        $rev = Review::find($this->deleteId);
        if ($rev->user_id === \auth()->id()) {
            $rev->delete();
            toastr()->error('Successfully Deleted !!');
            return redirect()->back();
        } else {
            DisableReview::create(['user_id' => \auth()->id(), 'review_id' => $this->deleteId]);
            toastr()->error('Successfully Disabled !!');
            return redirect()->back();
        }

    }

    public function reset_input()
    {
        $this->comment = '';
        $this->rating = '';
    }
}
