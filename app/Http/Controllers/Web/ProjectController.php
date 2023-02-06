<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Models\ProjectMember;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
      return view('project.index');       
    }
    
    public function create()
    {
      return view('project.create');       
    }

    public function invite($id){
      $role_id = Role::where('role_name','member')->pluck('id')->first();
      $project_members_list = ProjectMember::where('project_id',$id)->pluck('user_id')->toArray();
      $member_list = User::where('role_id',$role_id)->whereNotIn('id',$project_members_list)->get();
      $project = Project::find($id);
      return view('project.invite',compact('project','member_list')); 
    }

    public function team($id){
      $project = Project::find($id);
      return view('project.team',compact('project')); 
    }

    public function all_projects(){
      if(Auth::user()->role->role_name == "member"){
        $projects_list = ProjectMember::where('user_id',Auth::user()->id)->pluck('project_id')->toArray();
        $projects = Project::whereIn('id',$projects_list)->with('projectTask')->get();
      }else{
        $projects = Project::with('projectTask')->get();
      }  
      return view('project.projects',compact('projects')); 
    }
    
}
