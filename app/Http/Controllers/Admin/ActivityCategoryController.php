<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityCategoryStoreRequest;
use App\Http\Requests\Admin\ActivityCategoryUpdateRequest;
use App\Models\Admin\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activityCategories = ActivityCategory::paginate(10);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('activityCategory.index', compact('activityCategories', 'breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('activityCategory.create');
    }

    /**
     * @param \App\Http\Requests\Admin\ActivityCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityCategoryStoreRequest $request)
    {
        $activityCategory = ActivityCategory::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.activity-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ActivityCategory $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ActivityCategory $activityCategory)
    {
        return view('activityCategory.show', compact('activityCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ActivityCategory $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ActivityCategory $activityCategory)
    {
        
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Activity Categories | Update",'link'=>'admin/activity-category'],['name'=>$activityCategory->title_en]
        ];
        return view('activityCategory.edit', compact('activityCategory', 'breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\ActivityCategoryUpdateRequest $request
     * @param \App\Models\Admin\ActivityCategory $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityCategoryUpdateRequest $request, ActivityCategory $activityCategory)
    {
        $activityCategory->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.activity-category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ActivityCategory $activityCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ActivityCategory $activityCategory)
    {
        $activityCategory->delete();

        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.activity-category.index');
    }
}
