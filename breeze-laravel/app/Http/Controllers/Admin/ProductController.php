<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('admin');
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('admin');

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

    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('products.index', compact('products', 'category'));
    }

    public function edit(Product $product)
    {
        $this->authorize('admin');
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('admin');

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

    public function destroy(Product $product)
    {
        $this->authorize('admin');

        $this->deleteOldImage($product->image);
        $product->delete();

        return $this->redirectToIndex('deleted');
    }

    private function redirectToIndex($action)
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with([
                'success' => "Your product has been {$action} successfully!",
            ]);
        }

        return redirect()->route('products.index')->with([
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

    public function filterByCategory($category)
    {
        $category = Category::where('slug', $category)->first();

        if (!$category) {
            return redirect()->route('products.index')->with('error', 'Category not found');
        }

        $products = Product::where('category_id', $category->id)->paginate(10);

        return view('products.index', compact('products'));
    }
}