<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LeaderStoreRequest;
use App\Http\Requests\Admin\LeaderUpdateRequest;
use App\Models\Admin\Leaders;
use Illuminate\Http\Request;

class LeadersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leaders = Leaders::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('leader.index', compact('leaders','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Leaders | List",'link'=>'admin/leaders'],['name'=>'Create']
        ];
        return view('leader.create',compact('breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\LeaderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaderStoreRequest $request)
    {
        $leader = Leaders::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.leaders.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Leaders $leader
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Leaders $leader)
    {
        return view('leader.show', compact('leader'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Leaders $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Leaders $leader)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Leaders | Update",'link'=>'admin/leaders'],['name'=>$leader->name_en]
        ];
        return view('leader.edit', compact('leader','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\LeaderUpdateRequest $request
     * @param \App\Models\Admin\Leaders $leader
     * @return \Illuminate\Http\Response
     */
    public function update(LeaderUpdateRequest $request, Leaders $leader)
    {
        $leader->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.leaders.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Leaders $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Leaders $leader)
    {
        $leader->delete();
        $request->session()->flash('delete', 'Deleted successfully!');
        return redirect()->route('admin.leaders.index');
    }
}
