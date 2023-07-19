<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForChildStoreRequest;
use App\Http\Requests\Admin\ForChildUpdateRequest;
use App\Models\Admin\ForChildren;
use App\Models\Admin\ForChildrenCategory;
use Illuminate\Http\Request;

class ForChildrenController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $forChildren = ForChildren::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('forChild.index', compact('forChildren','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "For children | List",'link'=>'admin/for-children'],['name'=>'Create']
        ];
        $category = ForChildrenCategory::all();
        return view('forChild.create',compact('breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ForChildStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForChildStoreRequest $request)
    {
        $forChild = ForChildren::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.for-children.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ForChildren $forChild
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ForChildren $forChild)
    {
        return view('forChild.show', compact('forChild'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ForChildren $forChild
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ForChildren $forChild)
    {     
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Exposition | Update",'link'=>'admin/expostion'],['name'=>$forChild->title_en]
        ];
        $category = ForChildrenCategory::all();
        return view('forChild.edit', compact('forChild','breadcrumbs','category'));
    }

    /**
     * @param \App\Http\Requests\Admin\ForChildUpdateRequest $request
     * @param \App\Models\Admin\ForChildren $forChild
     * @return \Illuminate\Http\Response
     */
    public function update(ForChildUpdateRequest $request, ForChildren $forChild)
    {
        $forChild->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.for-children.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\ForChildren $forChild
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ForChildren $forChild)
    {
        $forChild->delete();
        $request->session()->flash('delete', 'Deleted successfully!');
        return redirect()->route('admin.for-children.index');
    }
}
