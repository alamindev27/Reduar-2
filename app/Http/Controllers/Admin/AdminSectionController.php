<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
{
    public function index() {
        $datas = Section::all();
        return view('admin.section.index', compact('datas'));
    }

    public function edit($id) {
        $data = Section::findOrFail($id);
        return view('admin.section.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = Section::findOrFail($id);
        $request->validate([
            'name' => 'required | string | unique:sections,name,'.$data->id.',id',
        ]);

        $data->update([
            'name' => $request->name
        ]);
        return back()->with('success', 'Updated Successfully');
    }

}
