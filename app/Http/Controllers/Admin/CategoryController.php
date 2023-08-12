<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:categories,slug',
            'imageFile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = \Str::slug($request->input('slug'));

        if ($request->hasFile('imageFile')) {
            $imageFile = $request->file('imageFile');
            $storagePath = 'categories';
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $saveImage = uploadFile($imageFile, $imageName, $storagePath);

            $category->image = $saveImage->getPathname();
        }

        $category->save();

        Session::flash('message', 'Category created successfully!');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete the category's image if it exists
        if ($category->image) {
            File::delete($category->image);
        }

        $category->delete();

        Session::flash('message', 'Category deleted successfully!');

        return redirect()->route('categories.index');
    }
}
