<?php

namespace App\Http\Controllers\Admin;

use App\Http\ImageUpload;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Comment;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $photo_path = "public/post/photos";
    protected $video_path = "public/post/videos";
    public $photo_name;
    public $video_name;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->getValidationFactory();
        $data['description'] = $request->description;
        $data['user_id'] = auth()->id();

        if ($request->hasFile('photo')) {
            $this->photo_name = md5($request->photo . microtime()) . '.' . $request->photo->extension();
            $request->photo->storeAs('posts\\photos', $this->photo_name, 'public');
            $data['photo'] = $this->photo_name;
        }
        if ($request->hasFile('video')) {
            $this->video_name = md5($request->video . microtime()) . '.' . $request->video->extension();
            $request->video->storeAs('posts\\videos', $this->video_name, 'public');
            $data['video'] = $this->video_name;
        }
        $post = Post::create($data);
        if ($post) {
            return redirect()->back()->with('success', __('Successfully Save !'));
        } else {
            return redirect()->back()->with('error', __('Failed To Save!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            return view('Admin.posts.edit', compact('post'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->getValidationFactory();
        $data['description'] = $request->description;
        $data['user_id'] = auth()->id();

        if ($request->hasFile('photo')) {
            $this->photo_name = md5($request->photo . microtime()) . '.' . $request->photo->extension();
            $request->photo->storeAs('posts\\photos', $this->photo_name, 'public');
            $data['photo'] = $this->photo_name;
        }
        if ($request->hasFile('video')) {
            $this->video_name = md5($request->video . microtime()) . '.' . $request->video->extension();
            $request->video->storeAs('posts\\videos', $this->video_name, 'public');
            $data['video'] = $this->video_name;
        }
        if (!$post) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            $excec = $post->update($data);
            if ($excec) {
                return redirect()->back()->with('success', __('Successfully Save !'));
            } else {
                return redirect()->back()->with('error', __('Failed To Save!'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!$post) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            $excec = $post->delete();
            if ($excec) {
                return redirect()->back()->with('delte', __('Successfully Delete !'));
            } else {
                return redirect()->back()->with('error', __('Failed To Delete!'));
            }
        }
    }
    protected function getValidationFactory()
    {
        return request()->validate([
            'description' => 'required|max:500',
            'photo' => 'sometimes|image|mimes:jpg,jepg,png,gif|max:200000',
            'video' => 'sometimes|mimes:mp4,mov,ogg,mkv|max:2000000'
        ]);
    }
    public function commnetUpdate(Comment $comment, Request $request)
    {
        $request->validate(['description', 'required|max:300|string']);
        if (!$comment) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            $excec = $comment->update(['description' =>$request->description]);
            if ($excec) {
                return redirect()->back()->with('alert-success', __('Successfully Save !'));
            } else {
                return redirect()->back()->with('alert-error', __('Failed To Save!'));
            }
        }
    }
    public function commnetDestroy(Comment $comment)
    {
        if (!$comment) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            $excec = $comment->delete();
            if ($excec) {
                return redirect()->back()->with('alert-success', __('Successfully Delete !'));
            } else {
                return redirect()->back()->with('alert-error', __('Failed To Delete!'));
            }
        }
    }
}
