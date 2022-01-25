<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\ImageUpload;

class PostController extends Controller
{/*
    public $user;

    public function __construct()
    {
        $user =  auth()->user()->currentAccessToken()->tokenable->id;
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  auth()->user()->currentAccessToken()->tokenable->id;
        $posts = Post::with('user', 'comments', 'likes')->orderBy('created_at', 'Desc')->paginate(5);
        if (!$posts) {
            return new JsonResponse([
                'message' => 'you have no posts!!!'
            ], 500);
        } else {
            return new JsonResponse([
                'data' => $posts
            ], 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate([
            'description' => 'required|max:500',
            'photo' => 'sometimes|image|mimes:jpg,jepg,png,gif|max:200000',
            'video' => 'sometimes|mimes:mp4,mov,ogg,mkv|max:2000000'
        ]);
        $data['description'] = $request->description;
        $data['user_id'] = auth()->id();
        if ($request->hasFile('photo')) {
            ImageUpload::upload_image($request->photo, 'public/posts/photos');
            $data['photo'] = $request->photo;
        }
        if ($request->hasFile('video')) {
            ImageUpload::uploade_video($request->photo, 'public/posts/videos');
            $data['video'] = $request->video;
        }
        $post = Post::create($data);
        if (!$post) {
            return new JsonResponse([
                'message' => 'error creating post!!!'
            ], 200);
        } else {
            return new JsonResponse([
                'data' => $post
            ], 201);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user =  auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate([
            'id' => 'required|integer',
            'description' => 'required|max:500',
            'photo' => 'sometimes|image|mimes:jpg,jepg,png,gif|max:200000',
            'video' => 'sometimes|mimes:mp4,mov,ogg,mkv|max:2000000'
        ]);
        $data['description'] = $request->description;
        $data['user_id'] = auth()->id();
        if ($request->hasFile('photo')) {
            ImageUpload::upload_image($request->photo, 'public/posts/photos');
            $data['photo'] = $request->photo;
        }
        if ($request->hasFile('video')) {
            ImageUpload::uploade_video($request->photo, 'public/posts/videos');
            $data['video'] = $request->video;
        }
        $post = Post::where('id', $request->id)->first();

        if (!$post) {
            return new JsonResponse([
                'message' => 'the post was not found!!!'
            ], 200);
        } else {
            $post->update($data);
            return new JsonResponse([
                'data' => $post
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate(['id' => 'integer|required']);

        $post = Post::where('id', $request->id)->first();
        if (!$post) {
            return new JsonResponse([
                'message' => 'the post was not found!!!'
            ], 200);
        } else {
            $post->delete();
            return new JsonResponse([
                'message' => $post->id . 'is deleted !!!'
            ], 201);
        }
    }
}
