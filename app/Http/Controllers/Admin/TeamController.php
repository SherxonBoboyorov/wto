<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamStoreRequest;
use App\Http\Requests\Admin\TeamUpdateRequest;
use App\Models\Admin\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = Team::paginate(12);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('team.index', compact('teams', 'breadcrumbs'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"],['name' => "Team | List",'link'=>'admin/team'],['name'=>'Create']
        ];
        return view('team.create', compact('breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\TeamStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        $team = Team::create($request->validated());

        $request->session()->flash('create', 'Stored successfully!');

        return redirect()->route('admin.team.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Team $team)
    {
        return view('team.show', compact('team'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Team $team)
    {

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Team | Update",'link'=>'admin/team'],['name'=>$team->title_en]
        ];
        return view('team.edit', compact('team', 'breadcrumbs'));
    }

    /**
     * @param \App\Http\Requests\Admin\TeamUpdateRequest $request
     * @param \App\Models\Admin\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        $team->update($request->validated());

        $request->session()->flash('update', 'Updated successfully!');

        return redirect()->route('admin.team.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        $team->delete();

        $request->session()->flash('delete', 'Deleted successfully!');


        return redirect()->route('admin.team.index');
    }
}
