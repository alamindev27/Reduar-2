<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Award::latest()->get();
        return view('admin.award.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.award.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255',
            'award_type' => 'required | string | max:255',
            'award_year' => 'required',
            'png_download_link' => 'required | url',
            'psd_download_link' => 'required | url',
            'logo' => 'required | image | mimes:jpg,png,jpeg,webp',
            'title' => 'required | string | max:255 | unique:awards,title',
            'short_description' => 'required | string',
            'description' => 'required | string',
            'image' => 'required | image | mimes:jpg,png,jpeg,webp',
        ]);
        $path = 'uploads/';

        $file1 = $request->file('image');
        $image = time().'-award-image.'.$file1->getClientOriginalExtension();
        $request->image->move($path, $image);

        $file2 = $request->file('logo');
        $logo = time().'-award-logo.'.$file2->getClientOriginalExtension();
        $request->logo->move($path, $logo);

        Award::insert([
            'name' => $request->name,
            'type' => $request->award_type,
            'award_year' => $request->award_year,
            'png_download_link' => $request->png_download_link,
            'psd_download_link' => $request->psd_download_link,
            'logo' => $path.$logo,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $path.$image,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('award.index')->with('success', 'Created Successfully.');
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
        $data = Award::where('id', $id)->first();
        return view('admin.award.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Award::where('id', $id)->first();
        $request->validate([
            'name' => 'required | string | max:255',
            'award_type' => 'required | string | max:255',
            'award_year' => 'required',
            'png_download_link' => 'required | url',
            'psd_download_link' => 'required | url',
            'logo' => 'image | mimes:jpg,png,jpeg,webp',
            'title' => 'required | string | max:255 | unique:awards,title,'.$data->id.',id',
            'short_description' => 'required | string',
            'description' => 'required | string',
            'image' => 'image | mimes:jpg,png,jpeg,webp',
        ]);
        if ($request->hasFile('image')) {
            unlink(base_path($data->image));

            $path = 'uploads/';
            $file1 = $request->file('image');
            $image = time().'-award-image.'.$file1->getClientOriginalExtension();
            $request->image->move($path, $image);
            $data->update([
                'image' => $path.$image
            ]);
        }

        if ($request->hasFile('logo')) {
            unlink($data->logo);

            $path = 'uploads/';
            $file2 = $request->file('logo');
            $logo = time().'-award-logo.'.$file2->getClientOriginalExtension();
            $request->logo->move($path, $logo);
            $data->update([
                'logo' => $path.$logo
            ]);
        }

        $data->update([
            'name' => $request->name,
            'type' => $request->award_type,
            'award_year' => $request->award_year,
            'png_download_link' => $request->png_download_link,
            'psd_download_link' => $request->psd_download_link,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description
        ]);

        return redirect()->route('award.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
