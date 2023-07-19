<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpositionCategoryStoreRequest;
use App\Http\Requests\Admin\ExpositionCategoryUpdateRequest;
use App\Models\Admin\ExpositionCategory;
use Illuminate\Http\Request;

class ExpositionCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expositionCategories = ExpositionCategory::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('expositionCategory.index', compact('expositionCategories','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('expositionCategory.create');
    }

    /**
     * @param \App\Http\Requests\Admin\ExpositionCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpositionCategoryStoreRequest $request)
    {
        $expositionCategory = ExpositionCategory::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.exposition-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ExpositionCategory $expositionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ExpositionCategory $expositionCategory)
    {
        return view('expositionCategory.show', compact('expositionCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ExpositionCategory $expositionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ExpositionCategory $expositionCategory)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Exposition categories  ",'link'=>'admin/exposition-category'],['name'=>$expositionCategory->title_en]
        ];
        return view('expositionCategory.edit', compact('expositionCategory','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\ExpositionCategoryUpdateRequest $request
     * @param \App\Models\Admin\ExpositionCategory $expositionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ExpositionCategoryUpdateRequest $request, ExpositionCategory $expositionCategory)
    {
        $expositionCategory->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.exposition-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ExpositionCategory $expositionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ExpositionCategory $expositionCategory)
    {
        $expositionCategory->delete();
        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.exposition-category.index');
    }
}
