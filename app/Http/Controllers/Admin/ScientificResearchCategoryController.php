<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScientificResearchCategoryStoreRequest;
use App\Http\Requests\Admin\ScientificResearchCategoryUpdateRequest;
use App\Models\Admin\ScientificResearchCategory;
use Illuminate\Http\Request;

class ScientificResearchCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scientificResearchCategories = ScientificResearchCategory::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('scientificResearchCategory.index', compact('scientificResearchCategories','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('scientificResearchCategory.create');
    }

    /**
     * @param \App\Http\Requests\Admin\ScientificResearchCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScientificResearchCategoryStoreRequest $request)
    {
        $scientificResearchCategory = ScientificResearchCategory::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.scientific-research-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ScientificResearchCategory $scientificResearchCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ScientificResearchCategory $scientificResearchCategory)
    {
        return view('scientificResearchCategory.show', compact('scientificResearchCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ScientificResearchCategory $scientificResearchCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ScientificResearchCategory $scientificResearchCategory)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Research categories  ",'link'=>'admin/scientific-research-category'],['name'=>$scientificResearchCategory->title_en]
        ];
        return view('scientificResearchCategory.edit', compact('scientificResearchCategory','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\ScientificResearchCategoryUpdateRequest $request
     * @param \App\Models\Admin\ScientificResearchCategory $scientificResearchCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ScientificResearchCategoryUpdateRequest $request, ScientificResearchCategory $scientificResearchCategory)
    {
        $scientificResearchCategory->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.scientific-research-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ScientificResearchCategory $scientificResearchCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ScientificResearchCategory $scientificResearchCategory)
    {
        $scientificResearchCategory->delete();
        
        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.scientific-research-category.index');
    }
}
