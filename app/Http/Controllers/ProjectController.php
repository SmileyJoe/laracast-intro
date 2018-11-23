<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index')
            ->withProjects(Project::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create')
            ->withProject(new Project())
            ->withEdit(false)
            ->withFormAction('/project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->fromRequest(new Project, $request)->save();

        return redirect("/project");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // this doesnt work like this anymore with the tomfoolery of populating the project //
        // a 404 will be dropped if the project isn't found //
        if(!$project){
            return view('project.not_found')
                ->withPageTitle("Not Found");
        } else {
            return view('project.show')
                ->withProject($project);
        }
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
            ->withProject($project)
            ->withEdit(true)
            ->withFormAction('/project/'.$project->id);
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
        $this->fromRequest($project, $request)->update();

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

    /**
     * The create form is used for creating and editing, so this just passed
     * the data so we don't have to list the field names more then once/
     *
     * @param Project $project the project object to add the form data to
     * @param Request $request the form data
     * @return Project the passed in project with the form data added to it
     */
    private function fromRequest(Project $project, Request $request){
        $project->title = $request->title;
        $project->description = $request->description;
        return $project;
    }
}
