<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScientificResearchStoreRequest;
use App\Http\Requests\Admin\ScientificResearchUpdateRequest;
use App\Models\Admin\ScientificResearch;
use App\Models\Admin\ScientificResearchCategory;
use Illuminate\Http\Request;

class ScientificResearchController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scientificResearches = ScientificResearch::paginate(10);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('scientificResearch.index', compact('scientificResearches','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = ScientificResearchCategory::all();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Research | List",'link'=>'admin/scientific-research'],['name'=>'Create']
        ];

        return view('scientificResearch.create',compact('breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ScientificResearchStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScientificResearchStoreRequest $request)
    {
        $scientificResearch = ScientificResearch::create($request->validated());

      
        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.scientific-research.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ScientificResearch $scientificResearch
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ScientificResearch $scientificResearch)
    {
        return view('scientificResearch.show', compact('scientificResearch'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ScientificResearch $scientificResearch
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ScientificResearch $scientificResearch)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Research | List",'link'=>'admin/scientific-research'],['name'=>$scientificResearch->title_en]
        ];
        $category = ScientificResearchCategory::all();
        return view('scientificResearch.edit', compact('scientificResearch','breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ScientificResearchUpdateRequest $request
     * @param \App\Models\Admin\ScientificResearch $scientificResearch
     * @return \Illuminate\Http\Response
     */
    public function update(ScientificResearchUpdateRequest $request, ScientificResearch $scientificResearch)
    {
        $scientificResearch->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');


        return redirect()->route('admin.scientific-research.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ScientificResearch $scientificResearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ScientificResearch $scientificResearch)
    {
        $scientificResearch->delete();
        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.scientific-research.index');
    }
}
