<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdminAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Advertisement::all();
        return view('admin.ad.index', compact('datas'));
    }
    function adUpdate(Request $request) {
        $request->validate([
            'status' => 'required'
        ]);
        setting()->update([
            'add_configure' => $request->status
        ]);
        return response()->json($request->status);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return abort(404);
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
        $data = Advertisement::findOrFail($id);
        return view('admin.ad.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Advertisement::find($id);
        $request->validate([
            'starting_time' => 'required | date',
            'ending_time' => 'required | date',
            'price' => 'required | numeric | min:1',
            'status' => 'required | string | max:20',
            'link' => 'required | string | max:255',
            'image' => 'image | mimes:jpg,png,jpeg,gif,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            $arr = explode('/', $data->image);
            $img = end($arr);
            if ($img != '1.png' && $img != '2.png' && $img != '3.png' && $img != '4.png' && $img != '5.png' && $img != '6.png' && $img != '7.png' && $img != '8.png' && $img != '9.png' && $img != '10.png' && $img != '11.png') {
                unlink($data->image);
            }

            $file = $request->file('image');
            $fileName = time().'-banner-ad.'.$file->getClientOriginalExtension();
            $path = 'uploads/ad/';
            $request->image->move($path, $fileName);

            $data->update([
                'image' => $path.$fileName,
            ]);
        }

        $data->update([
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'price' => $request->price,
            'status' => $request->status,
            'link' => $request->link,
        ]);

        return redirect()->route('advertisement.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }


}
