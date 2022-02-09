<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:service-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::orderBy('id', 'DESC')->paginate(4);
        return view('Admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        return view('Admin.services.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->getValidation($request);

        $data['name'] = $request->name;
        $data['user_id'] = auth()->id();
        $data['description'] = $request->description;
        $data['logo'] = $request->logo;
        $service = Service::create($data);

        return redirect()->route('services.index')
            ->with('success', __('Successfully Saved !!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('error-404')->with('direction', 'services.index');
        } else {
            return view('Admin.services.edit', compact('service'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->getValidation($request);

        $data['name'] = $request->name;
        $data['user_id'] = auth()->id();
        $data['description'] = $request->description;
        $data['logo'] = $request->logo;

        $service = Service::find($id);

        if (!$service) {
            return redirect()->route('error-404')->with('direction', 'services.index');
        } else {
            $service->update($data);
            return redirect()->route('services.index')
                ->with('success', __('Successfully Updated !!'));
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('error-404')->with('direction', 'services.index');
        } else {
            $service->delete();
            return redirect()->route('services.index')
                ->with('delete', __('Successfully Deleted !!'));
        }
    }
    protected function getValidation($request)
    {
        $request->validate([
            'name.*' => 'required|unique:services,name',
            'description.*' => 'required|unique:services,description',
            'logo' => 'required',
        ]);
    }
}
