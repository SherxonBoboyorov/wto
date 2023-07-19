<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoStoreRequest;
use App\Http\Requests\Admin\VideoUpdateRequest;
use App\Models\Admin\Gallery;
use App\Models\Admin\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Videos::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];


        return view('video.index', compact('model','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $gallery = Gallery::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Videos | List",'link'=>'admin/videos'],['name'=>'Create']
        ];
        return view('video.create',compact('gallery','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\VideoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoStoreRequest $request)
    {
        $video = Videos::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');;

        return redirect()->route('admin.videos.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Videos $video
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Videos $video)
    {
        return view('video.show', compact('video'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Videos $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Videos $video)
    {
        $gallery = Gallery::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Videos | Update",'link'=>'admin/videos'],['name'=>$video->title_en]
        ];
        return view('video.edit', compact('video','gallery','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\VideoUpdateRequest $request
     * @param \App\Models\Admin\Videos $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, Videos $video)
    {
        $video->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.videos.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Videos $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Videos $video)
    {
        $video->delete();
        $request->session()->flash('delete', 'Deleted successfully!');
        return redirect()->route('admin.videos.index');
    }
}
