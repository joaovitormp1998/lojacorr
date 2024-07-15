<?php


// app/Http/Controllers/DashboardController.php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalProperties' => Property::count(),
            'totalCategories' => Category::count(),
            'totalSubcategories' => Subcategory::count(),
            'totalUsers' => User::count(),
            'properties' => Property::with(['category', 'subcategory', 'user'])->get(),
        ];

        return view('dashboard', $data);
    }
}
