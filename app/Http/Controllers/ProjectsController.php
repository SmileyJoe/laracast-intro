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
}
