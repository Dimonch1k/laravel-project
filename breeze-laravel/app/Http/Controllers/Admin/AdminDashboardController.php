<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard with stats.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $products = Product::latest()->paginate(10);

        return view('admin.dashboard.index', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalUsers' => $totalUsers,
            'products' => $products
        ]);
    }
}