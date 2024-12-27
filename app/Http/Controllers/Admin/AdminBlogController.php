<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Blog::with('category')->latest()->get();
        return view('admin.blog.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
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
            'description' => 'required | string',
            'image' => 'required | image | mimes:jpg,png,jpeg,webp',
        ]);

        $file = $request->file('image');
        $logo = time().'-blog-image.'.$file->getClientOriginalExtension();
        $path = 'uploads/';
        $request->image->move($path, $logo);


        Blog::insert([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $path.$logo,
        ]);
        return redirect()->route('blog.index')->with('success', 'Created Successfully.');
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
        $data = Blog::find($id);
        $categories = Category::all();
        return view('admin.blog.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Blog::find($id);
        $request->validate([
            'title' => 'required | string | max:255 | unique:blogs,title,'.$data->id.',id',
            'category' => 'required',
            'short_description' => 'required | string',
            'description' => 'required | string',
            'image' => 'image | mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('image')) {
            unlink($data->image);

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
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('blog.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Blog::find($id);
        unlink(base_path($data->image));
        $data->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
