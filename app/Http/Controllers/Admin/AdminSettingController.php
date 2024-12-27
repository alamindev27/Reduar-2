<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function generalSetting () {
        return view('admin.setting.generalSetting ');
    }
    public function generalSettingUpdate (Request $request) {
        $request->validate([
            'site_name' => 'required | string | max:255',
            'author_name' => 'required | string | max:255',
            'footer_about' => 'required | string | max:255',
            'author_image' => 'image | mimes:jpg,png,jpeg',
            'wa_link' => 'required | string | url | max:255',
            'tel_link' => 'required | string | url | max:255',
            'email' => 'required | email',
            'sk_link' => 'required | string | url | max:255',
            'site_logo' => 'image | mimes:jpg,png,jpeg,webp',
            'site_favicon' => 'image | mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('author_image')) {
            $arr1 = explode('/',setting()->author_image);
            $logo1 = end($arr1);
            if ($logo1 != 'avatar.png') {
                unlink(setting()->author_image);
            }
            $file1 = $request->file('author_image');
            $author_image = time().'-author-iamge.'.$file1->getClientOriginalExtension();
            $path1 = 'uploads/';
            $request->author_image->move($path1, $author_image);
            setting()->update([
                'author_image' => $path1.$author_image
            ]);
        }

        if ($request->hasFile('site_logo')) {
            $arr1 = explode('/',setting()->site_logo);
            $logo1 = end($arr1);
            if ($logo1 != 'default-logo.png') {
                unlink(setting()->site_logo);
            }
            $file1 = $request->file('site_logo');
            $fileName1 = time().'-logo.'.$file1->getClientOriginalExtension();
            $path1 = 'uploads/';
            $request->site_logo->move($path1, $fileName1);
            setting()->update([
                'site_logo' => $path1.$fileName1
            ]);
        }
        if ($request->hasFile('site_favicon')) {
            $arr3 = explode('/',setting()->site_favicon);
            $logo3 = end($arr3);
            if ($logo3 != 'default-favicon.png') {
                unlink(setting()->site_favicon);
            }
            $file3 = $request->file('site_favicon');
            $fileName3 = time().'-favicon.'.$file3->getClientOriginalExtension();
            $path3 = 'uploads/';
            $request->site_favicon->move($path3, $fileName3);
            setting()->update([
                'site_favicon' => $path3.$fileName3
            ]);
        }
        setting()->update([
            'site_name' => $request->site_name,
            'author_name' => $request->author_name,
            'footer_about' => $request->footer_about,
            'wa_link' => $request->wa_link,
            'tel_link' => $request->tel_link,
            'email' => $request->email,
            'sk_link' => $request->sk_link,
            'site_name' => $request->site_name,
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    public function metaSetting() {
        return view('admin.setting.metaSetting');
    }

    public function metaSettingUpdate(Request $request) {
        $request->validate([
            'site_title' => 'required | string | max:60',
            'meta_title' => 'required | string | max:60',
            'meta_description' => 'required | string | max:160',
            'meta_keyword' => 'required | string | max:255',
            'focus_keyword' => 'required | string | max:255',
        ]);

        setting()->update([
            'site_title' => $request->site_title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'focus_keyword' => $request->focus_keyword,
        ]);
        return back()->with('success', 'Updated Successfully');
    }
}
