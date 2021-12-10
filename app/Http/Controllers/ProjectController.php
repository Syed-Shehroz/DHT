<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $clienID = $request->route('clientID');
        $projects = projects::where('client_id',$clienID)->get();
      return view ('projects.index')->with('projects', $projects);
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
        projects::create($input);
        return redirect('project')->with('flash_message', 'Project Addedd!');
    }


    public function show($id)
    {
        $project = projects::find($id);
        return view('projects.show')->with('projects', $project);
    }


    public function edit($id)
    {
        $project = projects::find($id);
        return view('projects.edit')->with('projects', $project);

    }


    public function update(Request $request, $id)
    {
        $project = projects::find($id);
        $input = $request->all();
        $project->update($input);
        return redirect('project')->with('flash_message', 'Project Updated!');
    }


    public function destroy($id)
    {
        projects::destroy($id);
        return redirect('project')->with('flash_message', 'Project deleted!');
    }
}
