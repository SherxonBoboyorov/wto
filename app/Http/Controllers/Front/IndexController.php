<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Activity;
use App\Models\Admin\ActivityCategory;
use App\Models\Admin\Carousel;
use App\Models\Admin\Event;
use App\Models\Admin\News;
use App\Models\Admin\Team;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homepage() 
    {

        $sliders = Carousel::orderBy('created_at', 'DESC')->get();
        $pages = About::all();
        $teams = Team::orderBy('created_at', 'DESC')->paginate(8);
        $articles = News::orderBy('created_at', 'DESC')->paginate(3);
        $events = Event::orderBy('created_at', 'DESC')->paginate(3);
        $avtivitycategories = ActivityCategory::all();
        $activities = Activity::orderBy('created_at', 'DESC')->get();

        return view('front.index', compact(
            'sliders',
            'pages',
            'teams',
            'articles',
            'events',
            'avtivitycategories',
            'activities',
        ));
    }
}
