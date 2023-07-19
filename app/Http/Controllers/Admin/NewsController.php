<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsStoreRequest;
use App\Http\Requests\Admin\NewsUpdateRequest;
use App\Models\Admin\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('news.index', compact('news','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "News | List",'link'=>'admin/news'],['name'=>'Create']
        ];
        return view('news.create',compact('breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\NewsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $request)
    {
        $news = News::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.news.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, News $news)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "News | Update",'link'=>'admin/news'],['name'=>$news->title_en]
        ];
        return view('news.edit', compact('news','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\NewsUpdateRequest $request
     * @param \App\Models\Admin\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $news->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.news.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        $news->delete();

        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.news.index');
    }
}
