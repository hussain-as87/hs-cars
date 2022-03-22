<?php

namespace App\Http\Controllers\Admin;

use App\Http\ImageUpload;
use App\Models\Admin\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{
    public $path_photo = 'about';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:advert-list', ['only' => ['index']]);
        $this->middleware('permission:advert-edit', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $advert = Advert::first();
        return view('Admin.advert.index', compact('advert'));
    }

    public function edit()
    {
        $advert = Advert::first();
        return view('Admin.advert.edit', compact('advert'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title.*' => 'required|max:200',
            'description.*' => 'required|max:500',
            'photo' => 'required_if:photo,null|file|image|mimes:png,jpg,jepg',
            'video' => 'required|active_url',
        ]);
        $advert = Advert::first();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['user_id'] = auth()->id();
        $data['video'] = $request->video;
        if ($request->hasFile('image')) {
            $image = ImageUpload::upload_image($request->image, $this->path_photo);
            $data['image'] = $image;
        }
        $advert->update($data);
        return redirect()->route('advert.index')->with('warning', 'Successfully Updated !!');
    }
}
