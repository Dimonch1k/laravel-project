<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048'
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->manageImageUpload($request->file('image'));
        } else {
            $data['image'] = 'images/no-image.png';
        }

        Category::create($data);

        return $this->redirectToIndex('created');
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
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048'
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->manageImageUpload($request->file('image'), $category->image);
        }

        $category->update($data);

        return $this->redirectToIndex('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->deleteOldImage($category->image);
        $category->delete();

        return $this->redirectToIndex('deleted');
    }

    private function redirectToIndex($action)
    {
        return redirect()->route('categories.index')->with([
            'success' => "The category has been {$action} successfully!",
        ]);
    }

    private function manageImageUpload($file, $oldImage = null)
    {
        $filename = time() . '-' . $file->getClientOriginalName();
        $path = 'storage/categories';

        $file->move(public_path($path), $filename);

        if ($oldImage && $oldImage !== 'images/no-image.png') {
            $this->deleteOldImage($oldImage);
        }

        return $path . '/' . $filename;
    }

    private function deleteOldImage($imagePath)
    {
        if ($imagePath && $imagePath !== 'images/no-image.png' && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }
}