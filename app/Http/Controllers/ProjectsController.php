<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Mail\ProjectCreated;

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
        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', compact("projects"));
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required',
        ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);
    
        $project->save();

        \Mail::to('viorel.robu@schweighofer.ro')->send(
            new ProjectCreated($project)
        );

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
        $project->update(request(['title', 'description']));
        
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
}
