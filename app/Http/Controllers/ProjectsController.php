<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{
    // Allow access only for logged in users
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('can:update,project')->except(['index', 'store', 'create']);
    }
    public function index()
    {
        // auth()->id(); // returns the logged in user id
        // auth()->user(); // returns a User object
        // auth()->check(); // returns a boolean
        // auth()->guest(); // helper function
        $projects = auth()->user()->project;

        return view('projects.index', compact("projects"));
    }

    public function store()
    {
        $attributes =$this->validateProject();

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        session()->flash('message', 'Your project has been created');

        return redirect('/projects');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        // abort_if
        // abort_unless
        $this->authorize('update', $project);
        // abort_unless(\Gate::allows('update', $project), 403);

        return view('projects.show', compact("project"));
    }

    public function update(Project $project)
    {
        $attributes = $this->validateProject();

        $project->update($attributes);
        
        $project->save();

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact("project"));
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();

        return redirect('/projects');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',
        ]);
    }
}
