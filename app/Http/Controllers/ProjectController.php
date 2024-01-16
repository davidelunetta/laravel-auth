<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        // dd($projects);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $x = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('project_images');
                $validatedData['image_path'] = $imagePath;
            }
            $project = Project::create($validatedData);
            // Project::create($validatedData);
            // $project =  new Project();
            // $project->name=$request->name;
            // $project->description=$request->description;
            // $project->start_date=$request->start_date;
            // $project->image=$validatedData->image;
            $project->save();

            return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
         return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            
            Storage::delete($project->image_path);
    
            $imagePath = $request->file('image')->store('project_images');
            $validatedData['image_path'] = $imagePath;
        }
    
        $project->update($validatedData);
    
        return redirect()->route('admin.projects.show', $project)->with('success', 'Progetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}
