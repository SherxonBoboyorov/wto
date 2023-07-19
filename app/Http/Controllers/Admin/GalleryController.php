<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryStoreRequest;
use App\Http\Requests\Admin\GalleryUpdateRequest;
use App\Models\Admin\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Gallery::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('gallery.index', compact('model','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Gallery | List",'link'=>'admin/gallery'],['name'=>'Create']
        ];
        return view('gallery.create',[
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    /**
     * @param \App\Http\Requests\Admin\GalleryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStoreRequest $request)
    {
        $gallery = Gallery::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.gallery.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Gallery $gallery)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Gallery | Update",'link'=>'admin/gallery'],['name'=>$gallery->title_en]
        ];
        return view('gallery.edit', compact('gallery','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\GalleryUpdateRequest $request
     * @param \App\Models\Admin\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdateRequest $request, Gallery $gallery)
    {
        $gallery->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.gallery.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gallery $gallery)
    {
        $gallery->delete();
       
        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.gallery.index');
    }
}
