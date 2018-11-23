<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        return view('projects')
            ->withProjects(Project::all());
    }

    public function view($id){
        $project = Project::where('id', $id)->first();

        if(!$project){
            return view('project_empty')
                ->withPageTitle("Not Found");
        } else {
            return view('project')
                ->withProject($project);
        }


    }

    public function create(){
        return view('project_create')
            ->withProject(new Project())
            ->withEdit(false)
            ->withFormAction('/project/create');
    }

    public function store(){
        $project = new Project();

        $this->fromRequest($project)->save();

        return redirect("/projects");
    }

    public function edit($id){
        $project = Project::where('id', $id)->first();

        return view('project_create')
            ->withProject($project)
            ->withEdit(true)
            ->withFormAction('/project/edit/'.$id);
    }

    public function update($id){
        $project = Project::where('id', $id)->first();

        $this->fromRequest($project)->update();

        return redirect('/project/'.$id);
    }

    private function fromRequest($project){
        $project->title = request('title');
        $project->description = request('description');
        return $project;
    }
}
