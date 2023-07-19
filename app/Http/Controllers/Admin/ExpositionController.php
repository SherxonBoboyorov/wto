<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpositionStoreRequest;
use App\Http\Requests\Admin\ExpositionUpdateRequest;
use App\Models\Admin\Exposition;
use App\Models\Admin\ExpositionCategory;
use Illuminate\Http\Request;

class ExpositionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exposition = Exposition::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('exposition.index', compact('exposition','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Exposition | List",'link'=>'admin/exposition'],['name'=>'Create']
        ];
        $category = ExpositionCategory::all();
        return view('exposition.create',compact('breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ExpositionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpositionStoreRequest $request)
    {
        $exposition = Exposition::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.exposition.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Exposition $exposition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Exposition $exposition)
    {
        return view('exposition.show', compact('exposition'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Exposition $exposition
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Exposition $exposition)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Exposition | Update",'link'=>'admin/exposition'],['name'=>$exposition->title_en]
        ];
        $category = ExpositionCategory::all();
        return view('exposition.edit', compact('exposition','breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ExpositionUpdateRequest $request
     * @param \App\Models\Admin\Exposition $exposition
     * @return \Illuminate\Http\Response
     */
    public function update(ExpositionUpdateRequest $request, Exposition $exposition)
    {
        $exposition->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.exposition.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Exposition $exposition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Exposition $exposition)
    {
        $exposition->delete();

        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.exposition.index');
    }
}
