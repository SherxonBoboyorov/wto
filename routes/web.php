<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('main');
// Route::get('home', [StaterkitController::class, 'home'])->name('home');
// // Route Components
// Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
// Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
// Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
// Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
// Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::prefix('site')->name('site.')->controller(App\Http\Controllers\SiteController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/leaders', 'leaders')->name('leaders');
    Route::get("/exposition/{model}", 'exposition')->name('exposition');
    Route::get("/expositions/{category?}", 'expositions')->name('expositions');
    Route::get("/researches/{category?}", 'researches')->name('researches');
    Route::get("/research/{model}", 'research')->name('research');
    // Route::get("/museum-collection/{model}", 'museumCollection')->name('museum-collection');
    Route::get('/news', 'news')->name('news');
    Route::get('/for-children/{model}', 'forChildren')->name('for-children');
    Route::get('/news/{news?}', 'newsIn')->name('newsIn');
    Route::get('/museum-collection', 'museumCollection')->name('museum-collection');

    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/gallery/photos/{slug?}', 'fotoIn')->name('photoIn');
    Route::get('/gallery/videos/{slug?}', 'videoIn')->name('videoIn');
});

Route::prefix('admin')->middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'])->name('admin.')->group(function(){
    Route::get('/',[StaterkitController::class, 'home'])->name('home');
    Route::resource('about', App\Http\Controllers\Admin\AboutController::class)->only(['edit','update','index']);

    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    
    Route::resource('leaders', App\Http\Controllers\Admin\LeadersController::class);
    
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class);
    
    Route::resource('videos', App\Http\Controllers\Admin\VideosController::class);
    
    Route::resource('photos', App\Http\Controllers\Admin\PhotosController::class);
    
    Route::resource('carousel', App\Http\Controllers\Admin\CarouselController::class);

    Route::resource('exposition', App\Http\Controllers\Admin\ExpositionController::class);

    Route::resource('for-children-category', App\Http\Controllers\Admin\ForChildrenCategoryController::class);

    Route::resource('for-children', App\Http\Controllers\Admin\ForChildrenController::class);

    Route::resource('museum-collection', App\Http\Controllers\Admin\MuseumCollectionController::class);

    Route::resource('usefull-links', App\Http\Controllers\Admin\UsefullLinksController::class);

    
    Route::resource('exposition-category', App\Http\Controllers\Admin\ExpositionCategoryController::class);

    Route::resource('scientific-research-category', App\Http\Controllers\Admin\ScientificResearchCategoryController::class);

    Route::resource('scientific-research', App\Http\Controllers\Admin\ScientificResearchController::class);

    Route::resource('event', App\Http\Controllers\Admin\EventController::class);

});








