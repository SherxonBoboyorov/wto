<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventStoreRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
use App\Models\Admin\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::paginate(12);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('event.index', compact('events', 'breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Event | List",'link'=>'admin/event'],['name'=>'Create']
        ];
        return view('event.create', compact('breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\EventStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $event = Event::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.event.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Event $event)
    {
        return view('event.show', compact('event'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Event $event)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Event | Update",'link'=>'admin/event'],['name'=>$event->title_en]
        ];
        return view('event.edit', compact('event', 'breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\EventUpdateRequest $request
     * @param \App\Models\Admin\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $event->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.event.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $event->delete();

        $request->session()->flash('delete', 'Deleted successfully!');

        return redirect()->route('admin.event.index');
    }
}
