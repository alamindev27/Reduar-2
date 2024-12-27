<?php

namespace App\Http\Controllers;

use App\Models\BestForexBrokerCategory;
use App\Models\BestForexBrokerSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BestForexBrokerSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BestForexBrokerSubCategory::all();
        return view('admin.bestForexBroker.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BestForexBrokerCategory::all();
        return view('admin.bestForexBroker.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required | string | max:255 | unique:best_forex_broker_sub_categories',
            'description' => 'required',
            'use_menu' => 'required | string | max:255',
        ]);
        BestForexBrokerSubCategory::insert([
            'bestForexBrokerCatId' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'use_menu' => $request->use_menu,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = BestForexBrokerCategory::all();
        $data = BestForexBrokerSubCategory::find($id);
        return view('admin.bestForexBroker.edit', compact('categories', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BestForexBrokerSubCategory::find($id);
        $request->validate([
            'category' => 'required',
            'name' => 'required | string | max:255 | unique:best_forex_broker_sub_categories,name,'.$data->id.',id',
            'description' => 'required',
            'use_menu' => 'required | string | max:255',
        ]);

        $data->update([
            'bestForexBrokerCatId' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'use_menu' => $request->use_menu,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BestForexBrokerSubCategory::find($id);
        $data->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
