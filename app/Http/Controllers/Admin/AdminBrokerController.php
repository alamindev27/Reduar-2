<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brokers = Broker::all();
        return view('admin.brokers.index', compact('brokers'));
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
        $data = Broker::find($id);
        return view('admin.brokers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Broker::find($id);
        $request->validate([
            'heading_1' => 'required | string | max:30',
            'heading_2' => 'required | string | max:30',
            'heading_3' => 'required | string | max:30',
            'register_link' => 'required | url',
            'review_link' => 'required | url',
            'logo' => 'image | mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('logo')) {
            $arr = explode('/',setting()->author_image);
            $logo = end($arr);
            if ($logo != '1731077912-logo.webp' || $logo != 'assetsfx_logo.webp' || $logo != 'cpt-markets-logo.webp' || $logo != 'blackbull-logo.webp' || $logo != 'doo_prime_logo.webp') {
                unlink($data->logo);
            }

            $file = $request->file('logo');
            $logo = time().'-broker-logo.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->logo->move($path, $logo);
            $data->update([
                'logo' => $path.$logo
            ]);
        }
        $data->update([
            'heading_1' => $request->heading_1,
            'heading_2' => $request->heading_2,
            'heading_3' => $request->heading_3,
            'register_link' => $request->register_link,
            'review_link' => $request->review_link,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('broker.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
