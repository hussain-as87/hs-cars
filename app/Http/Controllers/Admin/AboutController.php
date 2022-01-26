<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\ImageUpload;

class AboutController extends Controller
{
    public $path_photo = 'about';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:about-list', ['only' => ['index']]);
        $this->middleware('permission:about-edit', ['only' => ['edit', 'update']]);
    }
    public function index()
    {
        $about = About::first();
        return view('Admin.about.index', compact('about'));
    }
    public function edit()
    {
        $about = About::first();
        return view('Admin.about.edit', compact('about'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'photo' => 'required_if:photo,null|file|image|mimes:png,jpg,jepg'
        ]);
        $about = About::first();
        $data['description'] = $request->description;
        if ($request->hasFile('photo')) {
            $image = ImageUpload::upload_image($request->photo, $this->path_photo);
            $data['photo'] = $image;
        }
        $about->update($data);
        return redirect()->route('about.index')->with('success', 'About is updated successfully');
    }
}
