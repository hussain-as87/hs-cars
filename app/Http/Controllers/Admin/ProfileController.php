<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use App\Http\Controllers\Controller;

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
        return view('Admin.profile.index',compact('posts','user'));
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

        $pro = Profile::where('user_id',\auth()->id())->first();
        $user = User::findOrFail(\auth()->id());

        if (!$pro || !$user) {
            return redirect()->route('error-404')->with('direction', 'profile.index');
        } else {
            $pro->update($prof_data);
            $user->update($user_data);
            if (!$pro || !$user) {
                return redirect()->route('error-500')->with('direction', 'profile.edit');
            }
            return redirect()->route('profile.index');
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
            'city' => 'sometimes',
            'country' => 'sometimes',
            'postal_code' => 'sometimes|max:20',
            'date_of_birth' => 'sometimes',
            'about_me' => 'sometimes|max:200000',
            'avatar' => 'sometimes|file|mimes::jpg,png,jepg|max:200000',
            'background_image' => 'sometimes|file|mimes:jpg,png,jepg|max:200000',
        ]);
    }
}
