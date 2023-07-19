<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoStoreRequest;
use App\Http\Requests\Admin\PhotoUpdateRequest;
use App\Models\Admin\Gallery;
use App\Models\Admin\Photos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Photos::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];


        return view('photo.index', compact('model','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $gallery = Gallery::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Photos | List",'link'=>'admin/photos'],['name'=>'Create']
        ];
        return view('photo.create',compact('breadcrumbs','gallery'));
    }

    /**
     * @param \App\Http\Requests\Admin\PhotoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoStoreRequest $request)
    {
        $photo = Photos::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.photos.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Photos $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Photos $photo)
    {
        return view('photo.show', compact('photo'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Photos $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Photos $photo)
    {
        $gallery = Gallery::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Photo | Update",'link'=>'admin/photos'],['name'=>$photo->title_en]
        ];
        return view('photo.edit', compact('photo','gallery','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\PhotoUpdateRequest $request
     * @param \App\Models\Admin\Photos $photo
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoUpdateRequest $request, Photos $photo)
    {
        $photo->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.photos.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Photos $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Photos $photo)
    {
        $photo->delete();
        $request->session()->flash('delete', 'Deleted successfully!');
        return redirect()->route('admin.photos.index');
    }
}
