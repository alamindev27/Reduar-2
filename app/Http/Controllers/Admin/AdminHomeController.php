<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        $totalSection = Section::count();
        $categories = Category::count();
        $subCategories = SubCategory::count();
        return view('admin.index', compact('categories', 'subCategories', 'totalSection'));
    }
}
