<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MuseumCollectionStoreRequest;
use App\Http\Requests\Admin\MuseumCollectionUpdateRequest;
use App\Models\Admin\MuseumCollection;
use Illuminate\Http\Request;

class MuseumCollectionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $museumCollections = MuseumCollection::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('museumCollection.index', compact('museumCollections','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Museum collection | List",'link'=>'admin/museum-collection'],['name'=>'Create']
        ];
        return view('museumCollection.create',compact('breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\MuseumCollectionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuseumCollectionStoreRequest $request)
    {
        $museumCollection = MuseumCollection::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.museum-collection.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\MuseumCollection $museumCollection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MuseumCollection $museumCollection)
    {
        return view('museumCollection.show', compact('museumCollection'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\MuseumCollection $museumCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MuseumCollection $museumCollection)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Museum collection | Update",'link'=>'admin/museum-collection'],['name'=>$museumCollection->title_en]
        ];
        return view('museumCollection.edit', compact('museumCollection','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\MuseumCollectionUpdateRequest $request
     * @param \App\Models\Admin\MuseumCollection $museumCollection
     * @return \Illuminate\Http\Response
     */
    public function update(MuseumCollectionUpdateRequest $request, MuseumCollection $museumCollection)
    {
        $museumCollection->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.museum-collection.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\MuseumCollection $museumCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MuseumCollection $museumCollection)
    {
        $museumCollection->delete();
        
        $request->session()->flash('delete', 'Deleted successfully!');
        
        return redirect()->route('admin.museum-collection.index');
    }
}
