<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use App\Http\Controllers\Controller;
use App\Http\ImageUpload;

class ProfileController extends Controller
{
    public $avatar_name;

    public $background_image_name;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user.profile')->where('user_id', auth()->id())->orderBy('created_at', 'Desc')->get();
        $user = User::with('profile')->where('id', auth()->id())->first();
        return view('Admin.profile.index', compact('posts', 'user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::with('profile')->where('id', auth()->id())->first();
        return view('Admin.profile.edit', compact('user'));
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
            $image =  ImageUpload::upload_image($request->avatar, 'users/avatar');
            $prof_data['avatar'] = $image;
        }
        if ($request->hasFile('background_image')) {
            $image =  ImageUpload::upload_image($request->background_image, 'users/background_image');
            $prof_data['background_image'] = $image;
        }
        $prof_data['f_name'] = $request->f_name;
        $prof_data['l_name'] = $request->l_name;
        $prof_data['address'] = $request->address;
        $prof_data['city'] = $request->city;
        $prof_data['country'] = $request->country;
        $prof_data['postal_code'] = $request->postal_code;
        $prof_data['date_of_birth'] = $request->date_of_birth;
        $prof_data['about_me'] = $request->about_me;

        $user = User::findOrFail(\auth()->id());

        $pro = Profile::where('user_id', \auth()->id())->first();

        $user->update($user_data);
        $pro->update($prof_data);
        if (!$pro || !$user) {
            return redirect()->route('error-500')->with('direction', 'profile.edit');
        }
        return redirect()->route('profile.index')->with('warning', 'Successfully Updated !!');
    }
    protected function getValidation($request)
    {
        return $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'f_name' => 'sometimes',
            'l_name' => 'sometimes',
            'address' => 'sometimes|max:2000',
            'city' => 'sometimes',
            'country' => 'sometimes',
            'postal_code' => 'sometimes|max:20',
            'date_of_birth' => 'sometimes',
            'about_me' => 'sometimes|max:200000',
            'avatar' => 'sometimes|file|mimes:jpg,png,jepg',
            'background_image' => 'sometimes|file|mimes:jpg,png,jepg',
        ]);
    }
}
