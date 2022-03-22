<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->currentAccessToken()->tokenable->id;
        $profile = User::with('profile')->where('id', auth()->id())->first();

        if (!$profile) {
            return new JsonResponse([
                'message' => 'the user is not logged'
            ], 500);
        } else {
            return new JsonResponse([
                'date' => $profile
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
        $this->getValidation($request);
        $user_data['email'] = $request->email;
        $user_data['username'] = $request->username;
        if ($request->hasFile('avatar')) {
            $this->avatar_name = md5($request->avatar . microtime()) . '.' . $request->avatar->extension();
            $request->avatar->storeAs('user\\avatar', $this->avatar_name, 'public');
            $prof_data['avatar'] = $this->avatar_name;
        }
        if ($request->hasFile('background_image')) {
            $this->background_image_name = md5($request->background_image . microtime()) . '.' . $request->background_image->extension();
            $request->background_image->storeAs('user\\background_image', $this->background_image_name, 'public');
            $prof_data['background_image'] = $this->background_image_name;
        }
        $prof_data['f_name'] = $request->f_name;
        $prof_data['l_name'] = $request->l_name;
        $prof_data['address'] = $request->address;
        $prof_data['city'] = $request->city;
        $prof_data['country'] = $request->country;
        $prof_data['postal_code'] = $request->postal_code;
        $prof_data['date_of_birth'] = $request->date_of_birth;
        $prof_data['about_me'] = $request->about_me;

        $pro = Profile::where('user_id', \auth()->id())->first();
        $user = User::findOrFail(\auth()->id());

        if (!$pro || !$user) {
            return new JsonResponse([
                'message' => 'the user is not found!!!'
            ], 404);
        } else {
            $pro->update($prof_data);
            $user->update($user_data);
            if (!$pro || !$user) {
                return new JsonResponse([
                    'message' => 'the mission is failed !!!'
                ], 404);
            }
            return new JsonResponse([
                'user' => $user,
                'profile' => $pro,
            ], 201);
        }
    }

    protected function getValidation($request)
    {
        return $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'f_name' => 'sometimes|string',
            'l_name' => 'sometimes|string',
            'address' => 'sometimes|max:2000',
            'city' => 'sometimes|string',
            'country' => 'sometimes|string',
            'postal_code' => 'sometimes|max:20',
            'date_of_birth' => 'sometimes|date',
            'about_me' => 'sometimes|max:200000',
            'avatar' => 'sometimes|file|mimes::jpg,png,jepg|max:200000',
            'background_image' => 'sometimes|file|mimes:jpg,png,jepg|max:200000',
        ]);
    }

    public function fetchUsers()
    {
        return UsersResource::collection(User::all());
    }
}
