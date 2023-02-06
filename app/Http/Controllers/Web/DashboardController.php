<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\ProjectMember;

class DashboardController extends Controller
{
    public function index()
    {
      $projects_count = Project::count();
      $complete_tasks_count = ProjectTask::where('task_status','1')->count();
      $incomplete_tasks_count = ProjectTask::where('task_status','0')->count();
      if(Auth::user()->role->role_name == "member"){
        $projects_list = ProjectMember::where('user_id',Auth::user()->id)->pluck('project_id')->toArray();
        $projects_count = count($projects_list);
        $complete_tasks_count = ProjectTask::where('task_status','1')->whereIn('project_id',$projects_list)->count();
        $incomplete_tasks_count = ProjectTask::where('task_status','0')->whereIn('project_id',$projects_list)->count();
      }      
      return view('dashboard',compact('projects_count','complete_tasks_count','incomplete_tasks_count'));       
    }

    
}
