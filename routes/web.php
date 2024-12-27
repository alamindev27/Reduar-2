<?php

use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminAwardController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBrokerCategoryController;
use App\Http\Controllers\Admin\AdminBrokerController;
use App\Http\Controllers\Admin\AdminBrokerPostController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCryptoController;
use App\Http\Controllers\Admin\AdminForexBonusCategoryController;
use App\Http\Controllers\Admin\AdminForexBonusCopntroller;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSectionController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\BestForexBrokerSubCategoryController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    // composer dump-autoload
    dd('Done');
});

Auth::routes();
Route::get('/admin/login', [FrontendHomeController::class, 'login'])->name('frontend.index');


Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.index');
Route::get('/advertising', [FrontendHomeController::class, 'advertisement'])->name('frontend.advertisement');
Route::get('/media-kit', [FrontendHomeController::class, 'mediaKit'])->name('frontend.mediaKit');


// post urls
Route::get('/blog/{slug}', [FrontendHomeController::class, 'BlogDetails'])->name('frontend.post.details');
Route::post('/comment/blog', [FrontendHomeController::class, 'BlogComment'])->name('blog.comment.store');

// bonus
Route::get('/bonus/{slug}', [FrontendHomeController::class, 'bonusDetails'])->name('frontend.bonus.details');
Route::get('/category/{slug}', [FrontendHomeController::class, 'bonusCategory'])->name('frontend.bonusCategory');


// broker urls
Route::get('/broker/{slug}', [FrontendHomeController::class, 'brokerDetails'])->name('frontend.broker.details');

Route::get('/crypto/{slug}', [FrontendHomeController::class, 'crypto'])->name('frontend.crypto');

// broker urls
Route::get('/forex-broker-awards', [FrontendHomeController::class, 'award'])->name('frontend.award.index');
Route::get('/global-bank-awards', [FrontendHomeController::class, 'gbaward'])->name('frontend.award.gbaward');
// Route::get('/global-online-bank', [FrontendHomeController::class, 'goaward'])->name('frontend.award.goaward');
Route::get('/prop-trading-frim-awards', [FrontendHomeController::class, 'ptfaward'])->name('frontend.award.ptfaward');

Route::get('/award/{slug}', [FrontendHomeController::class, 'awardDetails'])->name('frontend.award.details');
Route::get('/search-by-year/award', [FrontendHomeController::class, 'search'])->name('search.award');
Route::post('/comment/award', [FrontendHomeController::class, 'storeComment'])->name('award.comment.store');

Route::get('/compare', [FrontendHomeController::class, 'compare'])->name('frontend.compare');


Route::get('/contact', [FrontendHomeController::class, 'contant'])->name('frontend.contact');
Route::get('/privacy-policy', [FrontendHomeController::class, 'privacyPolicy'])->name('frontend.privacyPolicy');
Route::get('/terms-of-service', [FrontendHomeController::class, 'termsOfService'])->name('frontend.termsOfService');
Route::get('/copywright-policy', [FrontendHomeController::class, 'copywrightPolicy'])->name('frontend.copywrightPolicy');




Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/user-list', [AdminHomeController::class, 'userList'])->name('admin.users');
    Route::get('/user/{id}/delete', [AdminHomeController::class, 'deleteUser'])->name('admin.user.delete');


    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::get('/profile/remove', [AdminProfileController::class, 'remove'])->name('admin.profile.remove');
    Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/profile/change-password', [AdminProfileController::class, 'password'])->name('admin.profile.password');
    Route::post('/profile/update-password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.updatePassword');

    // settings route
    Route::get('/general-setting', [AdminSettingController::class, 'generalSetting'])->name('admin.setting.generalSetting');
    Route::post('/general-setting', [AdminSettingController::class, 'generalSettingUpdate'])->name('admin.setting.generalSetting.update');
    Route::get('/meta-setting', [AdminSettingController::class, 'metaSetting'])->name('admin.setting.metaSetting');
    Route::post('/meta-setting', [AdminSettingController::class, 'metaSettingUpdate'])->name('admin.setting.metaSetting.update');

    Route::get('/section', [AdminSectionController::class, 'index'])->name('admin.section.index');
    Route::get('/section/edit/{id}', [AdminSectionController::class, 'edit'])->name('admin.section.edit');
    Route::post('/section/update/{id}', [AdminSectionController::class, 'update'])->name('admin.section.update');

    Route::resource('category', AdminCategoryController::class);
    Route::resource('subcategory', AdminSubCategoryController::class);
    Route::resource('advertisement', AdminAdvertisementController::class);
    Route::post('/ad/configure-update', [AdminAdvertisementController::class, 'adUpdate'])->name('admin.ad.status');

    Route::get('/page', [AdminPageController::class, 'index'])->name('admin.page.index');
    Route::get('/page/{id}/edit', [AdminPageController::class, 'edit'])->name('admin.page.edit');
    Route::post('/page/{id}/update', [AdminPageController::class, 'update'])->name('admin.page.update');


    Route::resource('best-forex-broker-sub-category', BestForexBrokerSubCategoryController::class);




    Route::resource('broker', AdminBrokerController::class);
    Route::get('/sponserd-broker', [AdminBrokerPostController::class, 'sponserdBroker'])->name('sponserd.broker');
    Route::get('/sponserd-broker/{id}/edit', [AdminBrokerPostController::class, 'sponserdBrokerEdit'])->name('sponser-broker.edit');
    Route::post('/sponserd-broker/{id}/update', [AdminBrokerPostController::class, 'sponserdBrokerUpdate'])->name('sponserd-broker.update');
    Route::resource('broker-category', AdminBrokerCategoryController::class);
    Route::resource('broker-review', AdminBrokerPostController::class);
    Route::post('/getPositionSubCategory', [AdminBrokerPostController::class, 'getPositionSubCategory'])->name('admin.getPositionSubCategory');
    Route::resource('award', AdminAwardController::class);

    Route::resource('forex-bonus-category', AdminForexBonusCategoryController::class);
    Route::resource('forex-bonus', AdminForexBonusCopntroller::class);

    Route::resource('blog', AdminBlogController::class);
    Route::resource('crypto', AdminCryptoController::class);






});
