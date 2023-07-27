<?php

use App\Http\Controllers\Front\ActivitiesController;
use App\Http\Controllers\Front\ActivityInController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteController;



use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\TeamController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\EventsController;

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


// locale Route
// Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('/', [IndexController::class, 'homepage'])->name('/');
        Route::get('about', [PageController::class, 'about'])->name('about');
        Route::get('our-teams', [TeamController::class, 'list'])->name('our-teams');
        Route::get('our-teams/{id}', [TeamController::class, 'show'])->name('our-team');
        Route::get('articles', [ArticleController::class, 'list'])->name('articles');
        Route::get('articles/{id}', [ArticleController::class, 'show'])->name('article');
        Route::get('events', [EventsController::class, 'list'])->name('events');
        Route::get('events/{id}', [EventsController::class, 'show'])->name('event');
        Route::get('activities/{id?}', [ActivitiesController::class, 'list'])->name('activities');
        Route::get('activitiy/{id}', [ActivitiesController::class, 'show'])->name('activitiy');
        Route::get('contact', [ContactController::class, 'contact'])->name('contact');
        Route::post('save_callback', [ContactController::class, 'saveCallback'])->name('saveCallback');

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
    Route::resource('activity-category', App\Http\Controllers\Admin\ActivityCategoryController::class);
    Route::resource('activity', App\Http\Controllers\Admin\ActivityController::class);

    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);

});


