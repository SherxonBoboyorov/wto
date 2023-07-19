<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutStoreRequest;
use App\Http\Requests\Admin\AboutUpdateRequest;
use App\Models\Admin\About;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $about = About::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('about.index', ['about'=>$about,'breadcrumbs'=>$breadcrumbs]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "About | List",'link'=>'admin/about'],['name'=>'Create']
        ];
        return view('about.create',[
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    /**
     * @param \App\Http\Requests\Admin\AboutStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutStoreRequest $request)
    {
        $about = About::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.about.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\About $about
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, About $about)
    {
        return view('about.show', compact('about'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\About $about
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, About $about)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "About | Update",'link'=>'admin/about'],['name'=>$about->title_en]
        ];
        return view('about.edit', compact('about','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\AboutUpdateRequest $request
     * @param \App\Models\Admin\About $about
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUpdateRequest $request, About $about)
    {
        $about->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.about.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\About $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, About $about)
    {
        $about->delete();   
        $request->session()->flash('delete', 'Deleted successfully!');
        return redirect()->route('admin.about.index');
    }
}
