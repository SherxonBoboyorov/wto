<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarouselStoreRequest;
use App\Http\Requests\Admin\CarouselUpdateRequest;
use App\Models\Admin\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Carousel::paginate(10);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('carousel.index', [
            'model'=>$model,
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Carousel | List",'link'=>'admin/carousel'],['name'=>'Create']
        ];
        return view('carousel.create',[
            'breadcrumbs'=>$breadcrumbs
        ]);
    }

    /**
     * @param \App\Http\Requests\Admin\CarouselStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselStoreRequest $request)
    {
        $carousel = Carousel::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.carousel.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Carousel $carousel)
    {
        return view('admin.carousel.show', compact('carousel'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Carousel $carousel)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Carousel | List",'link'=>'admin/carousel'],['name'=>$carousel->title_en]
        ];
        return view('carousel.edit', compact('carousel','breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\CarouselUpdateRequest $request
     * @param \App\Models\Admin\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselUpdateRequest $request, Carousel $carousel)
    {
        $carousel->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.carousel.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Carousel $carousel)
    {
        $carousel->delete();
        
        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.carousel.index');
    }
}
