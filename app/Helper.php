<?php

use App\Models\Advertisement;
use App\Models\BestForexBrokerCategory;
use App\Models\BestForexBrokerSubCategory;
use App\Models\Blog;
use App\Models\BrokerCategory;
use App\Models\BrokerPost;
use App\Models\Category;
use App\Models\Crypto;
use App\Models\ForexBonus;
use App\Models\ForexBonusCategory;
use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;


if (!function_exists('setting')) {
    function setting()
    {
        $setting = Setting::where('id',1)->first();
        if( $setting ){
            return $setting;
        }else{
        return false;
        }
    }
}
if (!function_exists('getCategories')) {
    function getCategories()
    {
        $categories = Category::where('useMainMenu', 'yes')->get();
        if( $categories ){
            return $categories;
        }else{
        return false;
        }
    }
}
if (!function_exists('getCategoriesForMenu')) {
    function getCategoriesForMenu()
    {
        $categories = ForexBonusCategory::all();
        if( $categories ){
            return $categories;
        }else{
        return false;
        }
    }
}
if (!function_exists('getBestForexBrokerCategory')) {
    function getBestForexBrokerCategory($id)
    {
        $getBestForexBrokerCategory = BestForexBrokerCategory::where('id', $id)->first();
        if( $getBestForexBrokerCategory ){
            return $getBestForexBrokerCategory;
        }else{
        return false;
        }
    }
}

if (!function_exists('getBestFrexBrokerSubCategory')) {
    function getBestFrexBrokerSubCategory($catId)
    {
        $getBestFrexBrokerSubCategory = BestForexBrokerSubCategory::where('bestForexBrokerCatId', $catId)->get();
        if( $getBestFrexBrokerSubCategory ){
            return $getBestFrexBrokerSubCategory;
        }else{
        return false;
        }
    }
}

if (!function_exists('section')) {
    function section($id)
    {
        $section = Section::where('id', $id)->first();
        if( $section ){
            return $section;
        }else{
        return false;
        }
    }
}
if (!function_exists('bonusCategory')) {
    function bonusCategory($id)
    {
        $category = ForexBonusCategory::where('id', $id)->first();
        if( $category ){
            return $category;
        }else{
        return false;
        }
    }
}
if (!function_exists('getBrokerCategory')) {
    function getBrokerCategory($id)
    {
        $getBrokerCategory = BrokerCategory::where('id', $id)->first();
        if( $getBrokerCategory ){
            return $getBrokerCategory;
        }else{
        return false;
        }
    }
}
if (!function_exists('resentBrokerBonus')) {
    function resentBrokerBonus()
    {
        $bonus = ForexBonus::orderBy('id', 'DESC')->take(18)->get();
        if( $bonus ){
            return $bonus;
        }else{
        return false;
        }
    }
}
if (!function_exists('getBrokerReviewByCategory')) {
    function getBrokerReviewByCategory($categoryId)
    {
        $reviews = BrokerPost::where('category_id', $categoryId)->latest()->take(10)->get();
        if( $reviews ){
            return $reviews;
        }else{
        return false;
        }
    }
}

if (!function_exists('shorter')) {
    function shorter($text, $chars_limit)
    {
        // Check if length is larger than the character limit
        if (strlen($text) > $chars_limit) {
            // If so, cut the string at the character limit
            $new_text = substr($text, 0, $chars_limit);
            // Trim off white space
            $new_text = trim($new_text);
            // Add at end of text ...
            return $new_text . "...";
        }
        // If not just return the text as is
        else {
            return $text;
        }
    }
}



if (!function_exists('posts')) {
    function bonuses($categoryId, $limit)
    {
        $bonuses = ForexBonus::where('category_id', $categoryId)->latest()->take($limit)->get();
        if( $bonuses ){
            return $bonuses;
        }else{
        return false;
        }
    }
}


if (!function_exists('posts')) {
    function posts($limit)
    {
        $posts = Blog::latest()->take($limit)->get();
        if( $posts ){
            return $posts;
        }else{
        return false;
        }
    }
}
if (!function_exists('advertisement')) {
    function advertisement($adId)
    {
        $adds = Advertisement::where('id', $adId)->first();
        if( $adds ){
            return $adds;
        }else{
        return false;
        }
    }
}

if (!function_exists('getCryptos')) {
    function getCryptos()
    {
        $cryptos = Crypto::where('showMainMenu', 'yes')->select('coin_name', 'slug')->get();
        if( $cryptos ){
            return $cryptos;
        }else{
        return false;
        }
    }
}
