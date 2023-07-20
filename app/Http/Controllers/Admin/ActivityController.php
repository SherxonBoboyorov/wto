<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityStoreRequest;
use App\Http\Requests\Admin\ActivityUpdateRequest;
use App\Models\Admin\Activity;
use App\Models\Admin\ActivityCategory;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Activity::paginate(12);
        
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('activity.index', compact('activities', 'breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $category = ActivityCategory::all();
        
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Activity | List",'link'=>'admin/activity'],['name'=>'Create']
        ];

        return view('activity.create', compact('category', 'breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\ActivityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityStoreRequest $request)
    {
        $activity = Activity::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.activity.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Activity $activity)
    {
        return view('activity.show', compact('activity'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Activity $activity)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Activity | List",'link'=>'admin/activity'],['name'=>$activity->title_en]
        ];
        $category = ActivityCategory::all();


        return view('activity.edit', compact('activity', 'breadcrumbs', 'category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ActivityUpdateRequest $request
     * @param \App\Models\Admin\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        $activity->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.activity.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Activity $activity)
    {
        $activity->delete();

        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.activity.index');
    }
}
