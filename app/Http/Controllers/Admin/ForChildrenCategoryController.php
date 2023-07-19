<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForChildrenCategoryStoreRequest;
use App\Http\Requests\Admin\ForChildrenCategoryUpdateRequest;
use App\Models\Admin\ForChildrenCategory;
use Illuminate\Http\Request;

class ForChildrenCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $forChildrenCategories = ForChildrenCategory::paginate(15);

        return view('forChildrenCategory.index', compact('forChildrenCategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = ForChildrenCategory::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "For children category | List",'link'=>'admin/for-children-category'],['name'=>'Create']
        ];
        return view('forChildrenCategory.create',['breadcrumbs'=>$breadcrumbs,'category'=>$category]);
    }

    /**
     * @param \App\Http\Requests\Admin\ForChildrenCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForChildrenCategoryStoreRequest $request)
    {
        $forChildrenCategory = ForChildrenCategory::create($request->validated());

        $request->session()->flash('Stored successfully!');

        return redirect()->route('admin.for-children-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ForChildrenCategory $forChildrenCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ForChildrenCategory $forChildrenCategory)
    {
        return view('forChildrenCategory.show', compact('forChildrenCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ForChildrenCategory $forChildrenCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ForChildrenCategory $forChildrenCategory)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "For children category | Update",'link'=>'admin/for-children-category'],['name'=>$forChildrenCategory->title_en]
        ];
        $category = ForChildrenCategory::all();
        return view('forChildrenCategory.edit', compact('forChildrenCategory','breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ForChildrenCategoryUpdateRequest $request
     * @param \App\Models\Admin\ForChildrenCategory $forChildrenCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ForChildrenCategoryUpdateRequest $request, ForChildrenCategory $forChildrenCategory)
    {
        $forChildrenCategory->update($request->validated());

        $request->session()->flash('Updated successfully!');

        return redirect()->route('admin.for-children-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ForChildrenCategory $forChildrenCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ForChildrenCategory $forChildrenCategory)
    {
        $forChildrenCategory->delete();

        return redirect()->route('admin.for-children-category.index');
    }
}
