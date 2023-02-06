<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Role;
use App\Models\ProjectMember;
use App\Mail\InviteMail;
use App\Models\Project;

class UserService {

    public function store(Request $request,$role){
        try{
              $role = Role::where('role_name',$role)->first();
              if(!empty($role)){
                $user = new User;
                $user->first_name = $request->first_name ;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->role_id = $role->id;
                $user->password = Hash::make($request->password); 
                $user->save();
                if($role->role_name == "member"){
                  $project_member = new ProjectMember();
                  $project_member->project_id = $request->project_id;
                  $project_member->user_id = $user->id;
                  $project_member->save();
                  try{
                    $project_details = Project::find($request->project_id);
                    $reveiverEmailAddress = $request->email;
                    $user_name = $request->first_name.' '.$request->last_name;
                    Mail::to($reveiverEmailAddress)->send(new InviteMail($project_details->project_name,$user_name));
                  }catch(Exception $e){
                   dd($e);
                  }
                }
                return true;
              }else{
                return false;
              }         
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

}