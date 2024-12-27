<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index() {
        $datas = Page::all();
        return view('admin.page.index', compact('datas'));
    }


    public function edit($id) {
        $data = Page::findOrFail($id);
        return view('admin.page.edit', compact('data'));
    }


    public function update(Request $request, $id) {
        $data = Page::findOrFail($id);
        $request->validate([
            'content' => 'required | string'
        ]);
        $data->update([
            'content' => $request->content
        ]);
        return back()->with('success', 'Updated Successfully');
    }
}
