<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use App\Models\Admin\Carousel;
use App\Models\Admin\Exposition;
use App\Models\Admin\ForChildren;
use App\Models\Admin\ForChildrenCategory;
use App\Models\Admin\Gallery;
use App\Models\Admin\Leaders;
use App\Models\Admin\MuseumCollection;
use App\Models\Admin\News;
use App\Models\Admin\Photos;
use App\Models\Admin\ScientificResearch;
use App\Models\Admin\UsefullLinks;
use App\Models\Admin\Videos;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $carousel = Carousel::where('status',1)->orderBy('order','asc')->get();
        $about = About::first();
        $expositions = Exposition::where('status',1)->orderBy('order','asc')->paginate(12);
        $forChild = ForChildren::first();
        $museumCollection = MuseumCollection::where('status',1)->orderBy('order','asc')->paginate(12);
        $photos = Gallery::where('status',1)->orderBy('order','asc')->paginate(12);
        $news = News::where('status',1)->orderBy('order','asc')->paginate(3);
        $usefullLinks = UsefullLinks::where('status',1)->orderBy('order','asc')->paginate(12);
        return view('front.index',[
            'carousel'=>$carousel,
            'about'=>$about,
            'expositions'=>$expositions,
            'forChild'=>$forChild,
            'museumCollection'=>$museumCollection,
            'photos'=>$photos,
            'news'=>$news,
            'usefullLinks'=>$usefullLinks,
        ]); 
    }
    public function about(){
        $model = About::first();
        $breadcrumbs = [
            ['link' => "/", 'name' =>  __('front.main_menu')], ['name' =>   __('front.about_museum')]
        ];
        return view('front.about',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    public function news(){
        $model = News::where('status',1)->latest()->paginate(12);
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['name' =>   __('front.news')]
        ];
        return view('front.news',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    public function newsIn(News $news){
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['link' => "/site/news", 'name' =>   __('front.news')], ['name' => $news->title]
        ];
        return view('front.news-in',[
            'model'=>$news,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    public function leaders(){
        $model = Leaders::where('status',1)->orderBy('order','asc')->get();
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['name' =>   __('front.leaders_menu')]
        ];
        return view('front.leaders',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    public function gallery(){
        $galleries = Gallery::where('status',1)->orderBy('order','asc')->paginate(10);
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['name' =>  __('front.gallery')]
        ];
        return view('front.gallery',[
            'galleries'=>$galleries,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    public function fotoIn($slug=null){
        $gallery = Gallery::find($slug);
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['link' => "/site/gallery", 'name' =>   __('front.gallery')], ['name' => $gallery->title]
        ];
        return view('front.foto_in', ['gallery'=>$gallery,'breadcrumbs'=>$breadcrumbs]);
    }

    public function videoIn($slug=null){
        $gallery = Videos::find($slug);
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['link' => "/site/gallery", 'name' =>   __('front.gallery')], ['name' => $gallery->title]
        ];
        return view('front.video_in',['gallery'=>$gallery,'breadcrumbs'=>$breadcrumbs]);
    }

    public function forChildren(ForChildren $model){
        $model = ForChildren::where('id',$model->id)->firstOrFail();
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')],
            ['name' =>   __('front.for_children_menu')],
            ['name' =>  $model->title],

            
        ];
        return view('front.for-children',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }
    public function expositions($category=null){
        $model = Exposition::where('status',1)->orderBy('order','asc');
        if($category){
            $model = $model->where('category_id',$category);
        }
        $model = $model->paginate(12);
        $breadcrumbs = [
            ['link' => "/", 'name' =>   __('front.main_menu')], ['name' =>   __ ('front.expositions')]
        ];
        return view('front.expositions',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }
    public function researches($category=null){
        $model = ScientificResearch::where('status',1)->orderBy('order','asc');
        if($category){
            $model = $model->where('category_id',$category);
        }
        $model = $model->paginate(12);
        $breadcrumbs = [
            ['link' => "/", 'name' =>  __('front.main_menu')], ['name' =>  __('front.science_menu')]
        ];
        return view('front.researches',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs,
            'id' => $category
        ]);
    }

    public function exposition(Exposition $model){
        $breadcrumbs = [
            ['link' => "/", 'name' =>  __('front.main_menu')], ['link' => "/site/expositions", 'name' =>  __('front.expositions')], ['name' => $model->title]
        ];
        return view('front.exposition',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }
    public function research(ScientificResearch $model){
        $breadcrumbs = [
            ['link' => "/", 'name' =>  __('front.main_menu')], ['link' => "/site/research", 'name' =>  __('front.science_menu')], ['name' => $model->title]
        ];
        return view('front.research',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }
    public function museumCollections(){
        $model = MuseumCollection::where('status',1)->orderBy('order','asc')->paginate(12);
        $breadcrumbs = [
            ['link' => "/", 'name' =>  __('front.main_menu')], ['name' =>  __('front.museum_collections_menu')]
        ];
        return view('front.museum-collections',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }
    public function museumCollection(){
        $model = MuseumCollection::latest()->first();
        $breadcrumbs = [
            ['link' => "/", 'name' =>  __('front.main_menu')], ['link' => "/site/museum-collections", 'name' =>  __('front.museum_collections_menu')], ['name' => $model->title]
        ];
        return view('front.museum-collection',[
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }


}