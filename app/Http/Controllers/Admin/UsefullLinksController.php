<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsefullLinkStoreRequest;
use App\Http\Requests\Admin\UsefullLinkUpdateRequest;
use App\Models\Admin\UsefullLinks;
use Illuminate\Http\Request;

class UsefullLinksController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usefullLinks = UsefullLinks::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('usefullLink.index', compact('usefullLinks','breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Usefull links | List",'link'=>'admin/usefull-links'],['name'=>'Create']
        ];
        return view('usefullLink.create',compact('breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\UsefullLinkStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsefullLinkStoreRequest $request)
    {
        $usefullLink = UsefullLinks::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.usefull-links.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\UsefullLinks $usefullLink
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UsefullLinks $usefullLink)
    {
        return view('usefullLink.show', compact('usefullLink'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\UsefullLinks $usefullLink
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UsefullLinks $usefullLink)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Usefull links | List",'link'=>'admin/usefull-links'],['name'=>$usefullLink->title_en]
        ];
        return view('usefullLink.edit', compact('usefullLink','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\UsefullLinkUpdateRequest $request
     * @param \App\Models\Admin\UsefullLinks $usefullLink
     * @return \Illuminate\Http\Response
     */
    public function update(UsefullLinkUpdateRequest $request, UsefullLinks $usefullLink)
    {
        $usefullLink->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.usefull-links.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\UsefullLinks $usefullLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UsefullLinks $usefullLink)
    {
        $usefullLink->delete();

        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.usefull-links.index');
    }
}
