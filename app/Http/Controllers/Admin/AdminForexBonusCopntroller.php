<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForexBonus;
use App\Models\Category;
use App\Models\ForexBonusCategory;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminForexBonusCopntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = ForexBonus::with('category')->latest()->get();
    return view('admin.bonus.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ForexBonusCategory::all();
        return view('admin.bonus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string | max:255 | unique:blogs,title',
            'category' => 'required',
            'short_description' => 'required | string',
            'link' => 'required | url',
            'link_text' => 'required | string | max:255',
            'step' => 'required | string',
            'bonus' => 'required | string | max:255',
            'promo_url' => 'required | url',
            'promo_text' => 'required | string | max:255',
            'bonus_2' => 'required | string | max:255',
            'platform' => 'required | string | max:255',
            'leverage' => 'required | string | max:255',
            'regulation' => 'required | string | max:255',
            'kyc' => 'required | string | max:255',
            'contacts' => 'required | string | max:255',
            'review' => 'required | string | max:255',
            'description' => 'required | string',
            'image' => 'required | image | mimes:jpg,png,jpeg,webp',
        ]);

        $file = $request->file('image');
        $logo = time().'-blog-image.'.$file->getClientOriginalExtension();
        $path = 'uploads/';
        $request->image->move($path, $logo);


        ForexBonus::insert([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'short_description' => $request->short_description,
            'link' => $request->link,
            'link_text' => $request->link_text,
            'step' => $request->step,
            'bonus' => $request->bonus,
            'promo_url' => $request->promo_url,
            'promo_text' => $request->promo_text,
            'bonus_2' => $request->bonus_2,
            'platform' => $request->platform,
            'leverage' => $request->leverage,
            'regulation' => $request->regulation,
            'kyc' => $request->kyc,
            'contacts' => $request->contacts,
            'review' => $request->review,
            'description' => $request->description,
            'image' => $path.$logo,
        ]);
        return redirect()->route('forex-bonus.index')->with('success', 'Created Successfully.');
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
        $data = ForexBonus::find($id);
        $categories = ForexBonusCategory::all();
        return view('admin.bonus.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ForexBonus::find($id);
        $request->validate([
            'title' => 'required | string | max:255 | unique:blogs,title,'.$data->id.',id',
            'category' => 'required',
            'short_description' => 'required | string',
            'link' => 'required | url',
            'link_text' => 'required | string | max:255',
            'step' => 'required | string',
            'bonus' => 'required | string | max:255',
            'promo_url' => 'required | url',
            'promo_text' => 'required | string | max:255',
            'bonus_2' => 'required | string | max:255',
            'platform' => 'required | string | max:255',
            'leverage' => 'required | string | max:255',
            'regulation' => 'required | string | max:255',
            'kyc' => 'required | string | max:255',
            'contacts' => 'required | string | max:255',
            'review' => 'required | string | max:255',
            'description' => 'required | string',
            'image' => 'image | mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('image')) {
            unlink(public_path($data->image));

            $file = $request->file('image');
            $logo = time().'-blog-image.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->image->move($path, $logo);
            $data->update([
                'image' => $path.$logo
            ]);
        }


        $data->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'short_description' => $request->short_description,
            'link' => $request->link,
            'link_text' => $request->link_text,
            'step' => $request->step,
            'bonus' => $request->bonus,
            'promo_url' => $request->promo_url,
            'promo_text' => $request->promo_text,
            'bonus_2' => $request->bonus_2,
            'platform' => $request->platform,
            'leverage' => $request->leverage,
            'regulation' => $request->regulation,
            'kyc' => $request->kyc,
            'contacts' => $request->contacts,
            'review' => $request->review,
            'description' => $request->description,
        ]);
        return redirect()->route('forex-bonus.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ForexBonus::find($id);
        unlink(public_path($data->image));
        $data->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
