<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreate;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:access,project')->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index')
            ->withProjects(Project::where('owner_id', auth()->id())->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        dump("Viewing project " . $project->title);
        return view('project.show')
            ->withProject($project);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // If there is old data (from a failed validation), we will create a new project object with it //
        // If there isn't, the object will just be empty and an empty form will display //
        return view('project.create')
            ->withProject(new Project(old()))
            ->withEdit(false)
            ->withFormAction('/project');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.create')
            ->withProject($project->fill(old()))
            ->withEdit(true)
            ->withFormAction('/project/'.$project->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create($this->validateData());

        Mail::to('example@test.com')->send(
            new ProjectCreate($project)
        );

        return redirect("/project");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($this->validateData());

        return redirect('/project/'.$project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/project');
    }

    private function validateData(){

        $data = request()->validate([
            'title' => ['required', 'min:5', 'max:30'],
            'description' => ['required', 'min:5']
        ]);

        $data['owner_id'] = auth()->id();

        return $data;
    }
}
