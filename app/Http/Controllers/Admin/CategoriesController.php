<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Http\ImageUpload;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        /* $this->authorizeResource(Product::class, 'product'); */
        /*  $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-trash', ['only' => ['trash', 'restore', 'forceDelete']]); */
    }

    public function index(Category $category)
    {

        return view('Admin.category.index', compact('category'));
    }

    public function show(Category $category)
    {
        $cars = Car::where('category_id', $category->id)->orderByDesc('id')->paginate(5);
        return view('Admin.category.show', compact('category', 'cars'));
    }

    public function create(Category $category)
    {
        return view('Admin.category.create', compact('category'));
    }

    public function store(Request $request)
    {

        $this->getValidate($request);

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['user_id'] =auth()->id();

        if ($request->hasFile('logo')) {
            $logo = ImageUpload::upload_image($request->logo, 'categories');
            $data['logo'] = $logo;
        }
        $category = Category::create($data);

        if ($category) {
            return redirect()->route('categories.index')->with('success', 'Category Saved !!!');
        } else {
            return redirect()->route('error-404')->with('direction', 'categories.index');
        }
    }

    public function edit(Category $category)
    {
        return view('Admin.category.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {

        $this->getValidate($request);

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['user_id'] =auth()->id();

        if ($request->hasFile('logo')) {
            $logo = ImageUpload::upload_image($request->logo, 'categories');
            $data['logo'] = $logo;
        }
        $cate = $category->update($data);

        if ($cate) {
            return redirect()->route('categories.index')->with('success', 'Category Has Been Updated !!!');
        } else {
            return redirect()->route('error-404')->with('direction', 'categories.index');
        }
    }

    public function destroy(Category $category)
    {
        if (!$category) {
            return redirect()->route('error-404')->with('direction', 'categories.index');
        } else {
            $category->delete();
            return redirect()->route('categories.index')->with('delete', 'Category Has Been Deleted !!!');
        }
    }

    protected function getValidate(Request $request)
    {
        return  $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|file|image|mimes:png,jpg,jepg'
        ]);
    }
}
