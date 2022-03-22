<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Like;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{

    public function store(Request $request)
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $request->validate([
            'post_id' => 'required|integer',
        ]);
        $data['post_id'] = $request->post_id;
        $data['user_id'] = $request->user()->id;

        $like = Like::where('post_id', $request->post_id)->where('user_id', $request->user()->id)->first();

        if ($like == null) {
            $exist = Like::create($data);
            return new JsonResponse([
                'message' => $exist
            ], 200);
        } else {
            return new JsonResponse([
                'message' => 'you are already like this !!!'
            ], 500);
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

        $like = Like::where('post_id', $request->post_id)->where('user_id', $request->user()->id)->first();

        if ($like != null) {
            $like->delete();
            return new JsonResponse([
                'message' => 'successfully is deleted !!!',
            ], 200);
        } else {
            return new JsonResponse([
                'message' => 'not found !!!'
            ], 404);
        }
    }
}
