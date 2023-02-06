<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectTask;

class TaskController extends Controller
{
    public function index($id)
    {
      $project =  Project::find($id);
      return view('task.index', compact('project'));       
    }
    
    public function create($id)
    {
      $project =  Project::find($id);
      return view('task.create', compact('project'));       
    }

    public function edit($id,$task_id)
    {
      $project =  Project::find($id);
      $project_task = ProjectTask::find($task_id);
      return view('task.edit', compact('project','project_task'));       
    }
    
}
