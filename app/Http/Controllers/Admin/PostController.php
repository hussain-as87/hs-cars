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
            $image = ImageUpload::upload_image($request->photo, 'post/photos');
            $data['photo'] = $image;
        }
        if ($request->hasFile('video')) {
            $video = ImageUpload::uploade_video($request->video, 'post/videos');
            $data['video'] = $video;
        }
        $post = Post::create($data);
        if ($post) {
            return redirect()->back()->with('success', __('Successfully Saved !!'));
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
            $image = ImageUpload::upload_image($request->photo, 'post/photos');
            $data['photo'] = $image;
        }
        if ($request->hasFile('video')) {
            $video = ImageUpload::uploade_video($request->video, 'post/videos');
            $data['video'] = $video;
        }
        if (!$post) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            $excec = $post->update($data);
            if ($excec) {
                return redirect()->back()->with('success', __('Successfully Updated !!'));
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
                return redirect()->back()->with('delete', __('Successfully Deleted !!'));
            }
        }
    }
    protected function getValidationFactory()
    {
        return request()->validate([
            'description' => 'required|max:500',
            'photo' => 'sometimes|file|image|mimes:jpg,jepg,png,gif',
            'video' => 'sometimes|mimetypes:video/avi,video/mpeg,video/quicktime|max:102400'
        ]);
    }

}
