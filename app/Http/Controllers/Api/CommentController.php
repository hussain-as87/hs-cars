<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\Comment;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $comments = Comment::with('user', 'post')->orderBy('created_at', 'Desc')->paginate(5);
        if (!$comments) {
            return new JsonResponse([
                'message' => 'you have no comments!!!'
            ], 500);
        } else {
            return new JsonResponse([
                'data' => $comments
            ], 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate([
            'description' => 'required|max:500',
            'post_id' => 'required|integer',
        ]);
        $data['description'] = $request->description;
        $data['post_id'] = $request->post_id;
        $data['user_id'] = auth()->id();

        $comment = Comment::create($data);
        if (!$comment) {
            return new JsonResponse([
                'message' => 'error creating comment !!!'
            ], 200);
        } else {
            return new JsonResponse([
                'data' => $comment
            ], 201);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate([
            'description' => 'required|max:500',
            'post_id' => 'required|integer',
            'id' => 'required|integer',
        ]);
        $data['description'] = $request->description;
        $data['post_id'] = $request->post_id;

        $comment = Comment::where('id', $request->id)->first();

        if (!$comment) {
            return new JsonResponse([
                'message' => 'the post was not found!!!'
            ], 200);
        } else {
            $comment->update($data);
            return new JsonResponse([
                'data' => $comment
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate(['id' => 'required|integer']);

        $comment = Comment::where('id', $request->id)->first();
        if (!$comment) {
            return new JsonResponse([
                'message' => 'the comment was not found!!!'
            ], 200);
        } else {
            $comment->delete();
            return new JsonResponse([
                'message' => 'the comment ' . $comment->id . ' is deleted !!!'
            ], 201);
        }
    }
}
