<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crypto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCryptoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Crypto::orderBy('id', 'DESC')->get();
        return view('admin.crypto.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crypto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coin_name' => 'required | string | max:255 | unique:cryptos,coin_name',
            'coin_icon' => 'required | image | mimes:jpg,png,jpeg,svg,webp',
            'status' => 'required | string | max:3',
            'origin' => 'required | string | max:255',
            'symbol' => 'required | string | max:255',
            'released_year' => 'required | string | max:255',
            'max_supply' => 'required | string | max:255',
            'showMainMenu' => 'required | string | max:255',
            'description' => 'required | string',
        ]);

        $path = 'uploads/';
        $file2 = $request->file('coin_icon');
        $logo = time().'-coin-logo.'.$file2->getClientOriginalExtension();
        $request->coin_icon->move($path, $logo);

        Crypto::insert([
            'coin_name' => $request->coin_name,
            'slug' => Str::slug($request->coin_name),
            'icon' => $path.$logo,
            'status' => $request->status,
            'origin' => $request->origin,
            'symbol' => $request->symbol,
            'released_year' => $request->released_year,
            'max_supply' => $request->max_supply,
            'showMainMenu' => $request->showMainMenu,
            'description' => $request->description,
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
        $data = Crypto::find($id);
        return view('admin.crypto.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Crypto::find($id);
        $request->validate([
            'coin_name' => 'required | string | max:255 | unique:cryptos,coin_name,'.$data->id.',id',
            'coin_icon' => 'image | mimes:jpg,png,jpeg,svg,webp',
            'status' => 'required | string | max:3',
            'origin' => 'required | string | max:255',
            'symbol' => 'required | string | max:255',
            'released_year' => 'required | string | max:255',
            'max_supply' => 'required | string | max:255',
            'showMainMenu' => 'required | string | max:255',
            'description' => 'required | string',
        ]);
        if ($request->hasFile('coin_icon')) {
            unlink($data->icon);
            $path = 'uploads/';
            $file2 = $request->file('coin_icon');
            $logo = time().'-coin-logo.'.$file2->getClientOriginalExtension();
            $request->coin_icon->move($path, $logo);
            $data->update([
                'icon' => $path.$logo,
            ]);
        }


        $data->update([
            'coin_name' => $request->coin_name,
            'slug' => Str::slug($request->coin_name),
            'status' => $request->status,
            'origin' => $request->origin,
            'symbol' => $request->symbol,
            'released_year' => $request->released_year,
            'max_supply' => $request->max_supply,
            'showMainMenu' => $request->showMainMenu,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Crypto::find($id);
        unlink($data->icon);
        $data->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
