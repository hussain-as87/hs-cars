<?php

namespace App\Http\Livewire;

use App\Models\Admin\Like;
use App\Models\Admin\Post;
use Livewire\Component;

class LikePost extends Component
{
    public $post;


    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $like = Like::where('post_id', $this->post->id)->where('user_id', auth()->id())->first();

        return view('livewire.like-post', compact('like'));
    }

    public function store()
    {
            $li = Like::where('post_id', $this->post->id)->where('user_id', auth()->id())->first();

            if ($li === null) {
                Like::create([
                    'post_id' => $this->post->id,
                    'user_id' => auth()->id()
                ]);
            } else {
                $li->delete();
            }

    }
}
