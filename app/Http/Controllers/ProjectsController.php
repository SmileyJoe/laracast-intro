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
            $found = false;
            $project = new Project();
            $pageTitle = "Not Found";
        } else {
            $found = true;
            $pageTitle = $project->title;
        }

        return view('project')
            ->withProject($project)
            ->withPageTitle($pageTitle)
            ->withFound($found);
    }
}
