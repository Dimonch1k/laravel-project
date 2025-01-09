<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048'
        ]);

        $data = $request->only(['name', 'price', 'category_id', 'image']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->manageImageUpload($request->file('image'));
        } else {
            $data['image'] = 'images/no-image.png';
        }

        Product::create($data);

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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048'
        ]);

        $data = $request->only(['name', 'price', 'category_id', 'image']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->manageImageUpload($request->file('image'), $product->image);
        }

        $product->update($data);

        return $this->redirectToIndex('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->deleteOldImage($product->image);
        $product->delete();

        return $this->redirectToIndex('deleted');
    }

    private function redirectToIndex($action)
    {
        return redirect()->route('admin.products.index')->with([
            'success' => "Your product has been {$action} successfully!",
        ]);
    }

    private function manageImageUpload($file, $oldImage = null)
    {
        $filename = time() . '-' . $file->getClientOriginalName();
        $path = 'storage/products';

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