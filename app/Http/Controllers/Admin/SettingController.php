<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Factory;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:settings', ['only' => ['edit', 'update','index']]);
    }
    public function index()
    {
        $settings = Setting::all();
        return view('Admin\setting\index', compact('settings'));
    }


    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('Admin\setting\edit', compact('setting'));
    }

    public function update(Request $request, Factory $cache, $id)
    {
        $setting = Setting::find($id);

        if ($request->isMethod('put')) {
            $request->validate(['value' => 'required']);

            $setting->value = $request->value;
            $setting->update();
            // When the settings have been updated, clear the cache for the key 'settings'
            $cache->forget('settings');
            return redirect()->route('settings.index')->with('success', 'Item has been updated successfully.');
        }
    }
}
