<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\AwardComment;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Broker;
use App\Models\BrokerPost;
use App\Models\Crypto;
use App\Models\ForexBonus;
use App\Models\ForexBonusCategory;
use App\Models\Page;
use App\Models\Post;
use App\Models\SponserdBroker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontendHomeController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function index() {

        $brokers = Broker::latest()->limit(5)->get();
        $awards = Award::latest()->get();
        $sponserd = SponserdBroker::latest()->first();
        $brokerReviews = BrokerPost::orderBy('id', 'DESC')->take(9)->get();
        return view('index', compact('brokers', 'awards', 'sponserd', 'brokerReviews'));
    }


    public function crypto($slug) {
        $data = Crypto::where('slug', $slug)->first();
        if (!$data) {
            return abort(404);
        }
        return view('crypto', compact('data'));
    }


    public function advertisement() {
        return view('advertisement');
    }

    public function bonusCategory($slug) {
        $brokers = Broker::latest()->limit(5)->get();
        $category = ForexBonusCategory::where('slug', $slug)->first();
        if (!$category) {
            return abort(404);
        }
        $datas = ForexBonus::where('category_id', $category->id)->latest()->paginate(10);
        return view('bonus-category', compact('brokers', 'datas', 'category'));
    }


    public function mediaKit() {
        $sponserd = SponserdBroker::latest()->first();
        $brokers = Broker::latest()->limit(5)->get();
        $awards = Award::latest()->get();
        $brokerReviews = BrokerPost::orderBy('id', 'DESC')->take(9)->get();
        return view('mediaKit', compact('brokers', 'awards', 'sponserd', 'brokerReviews'));
    }

    public function brokerDetails($slug) {
        $data = BrokerPost::with('category')->where('slug', $slug)->first();
        if (!$data) {
            return abort(404);
        }
        $brokers = BrokerPost::latest()->take(5)->select('logo', 'slug', 'title')->get();
        return view('broker-details', compact('data', 'brokers'));
    }

    public function bonusDetails($slug) {
        $data = ForexBonus::whereSlug($slug)->first();
        $brokers = Broker::latest()->limit(5)->get();
        return view('bonus-details', compact('data', 'brokers'));
    }

    public function BlogComment(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required | string | max:255',
            'email' => 'required | email',
            'comment' => 'required | string'
        ]);

        $data = Blog::find(Crypt::decrypt($request->id));
        BlogComment::insert([
            'blog_id' => $data->id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('frontend.post.details', $data->slug.'#comment-form')->with('success', 'Comment Submited.');
    }

    public function privacyPolicy() {
        $data = Page::where('id', 1)->first();
        return view('page', compact('data'));
    }

    public function termsOfService() {
        $data = Page::where('id', 2)->first();
        return view('page', compact('data'));
    }

    public function copywrightPolicy() {
        $data = Page::where('id', 3)->first();
        return view('page', compact('data'));
    }

    public function contant() {
        return view('contant');
    }


    public function award() {
        $award = Award::where('type', 'forex_broker')->latest()->first();
        $datas = Award::where('type', 'forex_broker')->orderBy('award_year', 'DESC')->take(12)->get();
        $year = Award::where('type', 'forex_broker')->orderBy('award_year', 'ASC')->first();
        return view('award', compact('award', 'datas', 'year'));
    }


    public function gbaward() {
        $award = Award::where('type', 'global_bank')->latest()->first();
        $datas = Award::where('type', 'global_bank')->orderBy('award_year', 'DESC')->take(12)->get();
        $year = Award::where('type', 'global_bank')->orderBy('award_year', 'ASC')->first();
        return view('global_bank', compact('award', 'datas', 'year'));
    }


    public function goaward() {
        $award = Award::where('type', 'global_online')->latest()->first();
        $datas = Award::where('type', 'global_online')->orderBy('award_year', 'DESC')->take(12)->get();
        $year = Award::where('type', 'global_online')->orderBy('award_year', 'ASC')->first();
        return view('global_online', compact('award', 'datas', 'year'));
    }


    public function ptfaward() {
        $award = Award::where('type', 'pop_trading')->latest()->first();
        $datas = Award::where('type', 'pop_trading')->orderBy('award_year', 'DESC')->take(12)->get();
        $year = Award::where('type', 'pop_trading')->orderBy('award_year', 'ASC')->first();
        return view('pop_trading', compact('award', 'datas', 'year'));
    }


    public function awardDetails($slug) {
        $data = Award::where('slug', $slug)->first();
        $brokers = Broker::latest()->limit(5)->get();
        $datas = Award::latest()->take(6)->get();
        return view('award-details', compact('data', 'brokers', 'datas'));
    }

    public function search(Request $request) {
        $datas = Award::where('award_year', $request->year)->get();
        return view('award-content', compact('datas'));
    }

    public function storeComment(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required | string | max:255',
            'email' => 'required | email',
            'comment' => 'required | string'
        ]);

        $data = Award::find(Crypt::decrypt($request->id));
        AwardComment::insert([
            'award_id' => $data->id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('frontend.award.details', $data->slug.'#comment-form')->with('success', 'Comment Submited.');
    }

    public function compare() {
        $reviews = BrokerPost::all();
            if (!empty($_GET['oneID']) && !empty($_GET['twoID']) && !empty($_GET['threeId'])) {
                $oneBroker = BrokerPost::where('id', $_GET['oneID'])->first();
                $twoBroker = BrokerPost::where('id', $_GET['twoID'])->first();
                $threeBroker = BrokerPost::where('id', $_GET['threeId'])->first();
                return view('compare-broker', compact('oneBroker', 'twoBroker', 'threeBroker', 'reviews'));
            }else{
                return view('compare', compact('reviews'));
            }




    }



}
