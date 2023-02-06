<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Mail\InviteMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ProjectService {

    public function store(Request $request){
        try{
             $project = new Project();   
             $project->project_name = $request->project_name;
             $project->created_by = Auth::user()->id;
             $project->save();
             return true;   
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

    public function index($role){
        try{
            if($role != "admin"){
              $projects_list = ProjectMember::where('user_id',Auth::user()->id)->pluck('project_id')->toArray();
              $project = Project::whereIn('id',$projects_list)->get();
            }else{
                $project = Project::get();
            }
            return $project;
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

    public function team(Request $request){
        try{
         $project_member = new ProjectMember();
         $project_member->project_id = $request->project_id;
         $project_member->user_id = $request->user_id;
         $project_member->save();
         try{
            $project_details = Project::find($request->project_id);
            $user_details = User::find($request->user_id);
            $user_name = $user_details->first_name.' '.$user_details->last_name;
            Mail::to($user_details->email)->send(new InviteMail($project_details->project_name,$user_name));
          }catch(Exception $e){
            dd($e);
          }
         return true;
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }
}