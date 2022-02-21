<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Post;
use Livewire\WithPagination;
use App\Models\Admin\Comment;

class CommentPost extends Component
{
    use WithPagination;

    public $post;
    public $limitPerPage = 5;
    public $description = '';
    public $description_up = '';

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }
    public function loadLess()
    {
        if ($this->limitPerPage != 5) {
            $this->limitPerPage = $this->limitPerPage - 5;
        }
    }
    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function render()
    {
        $comment = Comment::where('user_id', auth()->id())->where('post_id', $this->post->id)->first();
        $comments = Comment::where('post_id', $this->post->id)->orderBy('created_at', 'desc')->paginate($this->limitPerPage);
        $this->emit('userStore');

        return view('livewire.comment-post', compact('comment', 'comments'));
    }
    public function store()
    {
        $this->validate(['description' => 'required|max:500']);
        $com = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'description' => $this->description
        ]);
        $this->description = '';
    }
    public function update($id)
    {
        $this->validate(['description_up' => 'required|max:500']);
        $comment = Comment::find($id);
        $comment->description = $this->description_up;
        //dd($this->description_up);
        if ($comment == null) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        }
        $comment->update();
        $this->description_up = '';
    }
    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->first();
        if ($comment == null) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        }
        $comment->delete();
        return redirect()->back();
      //  return  redirect(url()->previous() . '#post-' . $this->post->id);
    }
}
