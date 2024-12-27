<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestForexBrokerCategory;
use App\Models\BestForexBrokerSubCategory;
use App\Models\BrokerPost;
use App\Models\Category;
use App\Models\SponserdBroker;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBrokerPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = BrokerPost::with('category')->latest()->get();
        return view('admin.broker-review.index', compact('datas'));
    }

    public function sponserdBroker() {
        $data = SponserdBroker::latest()->first();
        return view('admin.broker-review.sponserd-broker', compact('data'));
    }

    public function sponserdBrokerEdit($id) {
        $data = SponserdBroker::where('id', $id)->first();
        return view('admin.broker-review.sponserd-broker-edit', compact('data'));
    }
    public function sponserdBrokerUpdate(Request $request, $id) {
        $request->validate([
            'trading_desk' => 'required | string | max:255',
            'min_deposit' => 'required | string | max:255',
            'leverage' => 'required | string | max:255',
            'platform' => 'required | string | max:255',
            'website_link' => 'required | string | max:255',
            'review_link' => 'required | string | max:255',
            'logo' => 'image | mimes:jpg,png,jpeg,webp,gif',
        ]);
        $data = SponserdBroker::where('id', $id)->first();
        if ($request->hasFile('logo')) {
            $arr = explode('/', $data->logo);
            $oldLogo = end($arr);
            if ($oldLogo != 'sopn.webp') {
                unlink($data->logo);
            }

            $file = $request->file('logo');
            $logo = time().'-sponserd-broker-logo.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->logo->move($path, $logo);
            $data->update([
                'logo' => $path.$logo
            ]);
        }

        $data->update([
            'trading_desk' => $request->trading_desk,
            'min_deposit' => $request->min_deposit,
            'leverage' => $request->leverage,
            'platform' => $request->platform,
            'website_link' => $request->website_link,
            'review_link' => $request->review_link,
        ]);
        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $bestForexes = BestForexBrokerCategory::all();
        return view('admin.broker-review.create', compact('categories', 'bestForexes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required | string | max:255 | unique:broker_posts,title',
            'category' => 'required',
            // 'subcategory' => 'required',
            'short_description' => 'required | string',

            'brokers_name' => 'required | string | max:255',
            'trading_desk' => 'required | string | max:255',
            'year_founded' => 'required | string | max:255',
            'headquarters' => 'required | string | max:255',
            'regulation' => 'required | string | max:255',
            'us_clients' => 'required | string | max:255',
            'support_email' => 'required | string | max:255',
            'telephone' => 'required | string | max:255',
            'address' => 'required | string | max:255',
            'languages' => 'required | string | max:255',

            'commission' => 'required | string | max:255',
            'accounts' => 'required | string | max:255',
            'min_deposit' => 'required | string | max:255',
            'currencies' => 'required | string | max:255',
            'execution' => 'required | string | max:255',
            'leverage' => 'required | string | max:255',
            'spreads' => 'required | string | max:255',
            'trade_size' => 'required | string | max:255',
            'instruments' => 'required | string | max:255',


            'platform' => 'required | string | max:255',


            'deposit' => 'required | string',
            'withdrawal' => 'required | string',
            'description' => 'required | string',



            'website_link' => 'required | url',
            'review' => 'required | numeric | min:0.1 | max:5',
            'total_ratings' => 'required | numeric | min:1',
            'logo' => 'required | image | mimes:jpg,png,jpeg,webp',
        ]);

        $file = $request->file('logo');
        $logo = time().'-broker-review-broker-logo.'.$file->getClientOriginalExtension();
        $path = 'uploads/';
        $request->logo->move($path, $logo);

        BrokerPost::insert([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'bestForexes_id' => $request->bestForexes,
            'bestForexesSubCat_id' => $request->bestForexesSubCat_id,
            // 'subcategory_id' => $request->subcategory,
            'short_description' => $request->short_description,

            'brokers_name' => $request->brokers_name,
            'trading_desk' => $request->trading_desk,
            'year_founded' => $request->year_founded,
            'headquarters' => $request->headquarters,
            'regulation' => $request->regulation,
            'us_clients' => $request->us_clients,
            'support_email' => $request->support_email,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'languages' => $request->languages,
            'support_247' => $request->support_247 ?? 'no',

            'commission' => $request->commission,
            'accounts' => $request->accounts,
            'min_deposit' => $request->min_deposit,
            'currencies' => $request->currencies,
            'execution' => $request->execution,
            'leverage' => $request->leverage,
            'spreads' => $request->spreads,
            'trade_size' => $request->trade_size,
            'instruments' => $request->instruments,

            'demo_trading' => $request->demo_trading ?? 'no',
            'swap_free' => $request->swap_free ?? 'no',
            'copy_trading' => $request->copy_trading ?? 'no',
            'crypto_trading' => $request->crypto_trading ?? 'no',
            'platform' => $request->platform,
            'mobile_trading' => $request->mobile_trading ?? 'no',
            'web_trading' => $request->web_trading ?? 'no',
            'affiliate' => $request->affiliate ?? 'no',

            'deposit' => $request->deposit,
            'withdrawal' => $request->withdrawal,
            'description' => $request->description,

            'bcategory_1' => $request->bcategory_1 ?? 'no',
            'bcategory_2' => $request->bcategory_2 ?? 'no',
            'bcategory_3' => $request->bcategory_3 ?? 'no',
            'bcategory_4' => $request->bcategory_4 ?? 'no',

            'website_link' => $request->website_link,
            'review' => $request->review,
            'total_ratings' => $request->total_ratings,
            'logo' => $path.$logo,
            'created_at' => Carbon::now()


        ]);
        return redirect()->route('broker-review.index')->with('success', 'Created Successfully.');

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
        $data = BrokerPost::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::where('category_id', $data->category_id)->get();
        $bestForexes = BestForexBrokerCategory::all();
        $positionSubCat = BestForexBrokerSubCategory::where('id', $data->bestForexesSubCat_id)->first();
        return view('admin.broker-review.edit', compact('data', 'categories', 'subcategories', 'bestForexes', 'positionSubCat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BrokerPost::find($id);
        $request->validate([
            'title' => 'required | string | max:255 | unique:broker_posts,title,'.$data->id.',id',
            'category' => 'required',
            // 'subcategory' => 'required',
            'short_description' => 'required | string',

            'brokers_name' => 'required | string | max:255',
            'trading_desk' => 'required | string | max:255',
            'year_founded' => 'required | string | max:255',
            'headquarters' => 'required | string | max:255',
            'regulation' => 'required | string | max:255',
            'us_clients' => 'required | string | max:255',
            'support_email' => 'required | string | max:255',
            'telephone' => 'required | string | max:255',
            'address' => 'required | string | max:255',
            'languages' => 'required | string | max:255',

            'commission' => 'required | string | max:255',
            'accounts' => 'required | string | max:255',
            'min_deposit' => 'required | string | max:255',
            'currencies' => 'required | string | max:255',
            'execution' => 'required | string | max:255',
            'leverage' => 'required | string | max:255',
            'spreads' => 'required | string | max:255',
            'trade_size' => 'required | string | max:255',
            'instruments' => 'required | string | max:255',

            'platform' => 'required | string | max:255',

            'deposit' => 'required | string',
            'withdrawal' => 'required | string',
            'description' => 'required | string',

            'website_link' => 'required | url',
            'review' => 'required | numeric | min:0.1 | max:5',
            'total_ratings' => 'required | numeric | min:1',
            'logo' => 'image | mimes:jpg,png,jpeg,webp',
        ]);

        if ($request->hasFile('logo')) {
            unlink($data->logo);

            $file = $request->file('logo');
            $logo = time().'-broker-review-broker-logo.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->logo->move($path, $logo);
            $data->update([
                'logo' => $path.$logo
            ]);
        }

        $data->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'bestForexes_id' => $request->bestForexes,
            'bestForexesSubCat_id' => $request->bestForexesSubCat_id,
            // 'subcategory_id' => $request->subcategory,
            'short_description' => $request->short_description,

            'brokers_name' => $request->brokers_name,
            'trading_desk' => $request->trading_desk,
            'year_founded' => $request->year_founded,
            'headquarters' => $request->headquarters,
            'regulation' => $request->regulation,
            'us_clients' => $request->us_clients,
            'support_email' => $request->support_email,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'languages' => $request->languages,
            'support_247' => $request->support_247 ?? 'no',

            'commission' => $request->commission,
            'accounts' => $request->accounts,
            'min_deposit' => $request->min_deposit,
            'currencies' => $request->currencies,
            'execution' => $request->execution,
            'leverage' => $request->leverage,
            'spreads' => $request->spreads,
            'trade_size' => $request->trade_size,
            'instruments' => $request->instruments,

            'demo_trading' => $request->demo_trading ?? 'no',
            'swap_free' => $request->swap_free ?? 'no',
            'copy_trading' => $request->copy_trading ?? 'no',
            'crypto_trading' => $request->crypto_trading ?? 'no',
            'platform' => $request->platform,
            'mobile_trading' => $request->mobile_trading ?? 'no',
            'web_trading' => $request->web_trading ?? 'no',
            'affiliate' => $request->affiliate ?? 'no',

            'deposit' => $request->deposit,
            'withdrawal' => $request->withdrawal,
            'description' => $request->description,

            'bcategory_1' => $request->bcategory_1 ?? 'no',
            'bcategory_2' => $request->bcategory_2 ?? 'no',
            'bcategory_3' => $request->bcategory_3 ?? 'no',
            'bcategory_4' => $request->bcategory_4 ?? 'no',

            'website_link' => $request->website_link,
            'review' => $request->review,
            'total_ratings' => $request->total_ratings,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('broker-review.index')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BrokerPost::find($id);
        unlink($data->logo);
        $data->delete();
        return redirect()->route('broker-review.index')->with('success', 'Deleted Successfully.');
    }

    public function getPositionSubCategory(Request $request) {
        $request->validate([
            'catId' => 'required'
        ]);
        $subcategories = BestForexBrokerSubCategory::where('bestForexBrokerCatId', $request->catId)->get();
        return view('admin.layouts.partials.bestForexBrokersubcategory', compact('subcategories'));
    }
}
