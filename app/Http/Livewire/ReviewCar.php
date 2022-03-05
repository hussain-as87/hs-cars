<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Review;
use Livewire\Component;

class ReviewCar extends Component
{
    public $car;
    public $pages = 3;
    public $rating = '0';
    public $comment = '';
    public $deleteId = '';
    public $updateId = '';

    public function mount(Car $car)
    {
        $this->car = $car;
    }
    public function loadMore()
    {
        $this->pages = $this->pages + 5;
    }
    public function loadLess()
    {
        if ($this->pages != 3) {
            $this->pages = $this->pages - 5;
        }
    }

    public function render()
    {
        $reviews = Review::with('user.profile')->where('car_id', $this->car->id)->orderByDesc('created_at')->paginate($this->pages);
        $reviews_count = Review::where('car_id', $this->car->id)->get()->count();
        return view('livewire.review-car', compact('reviews', 'reviews_count'));
    }
    public function store()
    {
        $this->validate([
            'comment' => 'required|max:500',
            'rating' => 'sometimes|integer'
        ]);
        if (auth()->id() != null) {
            $data['car_id'] = $this->car->id;
            $data['user_id'] = auth()->id();
            $data['review'] = $this->comment;
            $data['rating'] = $this->rating;
            $rev = Review::create($data);

            if ($rev) {
                toastr()->success('Successfully Save !!');
                $this->comment = '';
                $this->rating = '';
                return redirect()->back();
            }
        } else {
            return redirect()->to(route('login'));
        }
    }
    public function updateId($id)
    {
        $this->updateId = $id;
    }

    public function update()
    {
        $this->validate([
            'comment' => 'required|max:500',
            'rating' => 'sometimes|integer'
        ]);
        if (auth()->id() != null) {
            $data['car_id'] = $this->car->id;
            $data['user_id'] = auth()->id();
            $data['review'] = $this->comment;
            $data['rating'] = $this->rating;
            dd($data);
            $rev = Review::find($this->updateId)->update($data);

            if ($rev) {
                toastr()->success('Successfully Updated !!');
                return redirect()->back();
            }
        } else {
            return redirect()->to(route('login'));
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroyId($id)
    {
        $this->deleteId = $id;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy()
    {
        if (auth()->id() != null) {
            $rev = Review::find($this->deleteId)->delete();

            if ($rev) {
                toastr()->error('Successfully Deleted !!');
                return redirect()->back();
            }
        } else {
            return redirect()->to(route('login'));
        }
    }
}
