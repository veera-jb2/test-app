<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProjectCollection;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Http\Requests\TeamRequest;

class ProjectController extends Controller
{
    public function __construct(ProjectService $projectService, UserService $userService)
    {
        $this->projectService = $projectService;
        $this->userService = $userService;
    }

    public function index(Request $request){
        $role = Auth::user()->role->role_name;
        $project = $this->projectService->index($role);
        if($project){
            $projectList = ProjectCollection::Collection($project);
            return apiResponseMessage("Project Listed Successfully", 200, ['projectList'=>$projectList]);
        }else{
            return apiResponseMessage("Failed to list a project", 400, (object)[]);
        }
    }

    public function store(ProjectRequest $request){
        if(Auth::user()->role->role_name == "admin"){
            $project = $this->projectService->store($request);
        }else{
            return apiResponseMessage("access-denied", 403, (object)[]);
        }
        if($project){
            return apiResponseMessage("Project Created Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to create a project", 400, (object)[]);
        }
    }

    public function team(UserRequest $request){
        if(Auth::user()->role->role_name == "admin"){
            $user = $this->userService->store($request,'member');
        }else{
            return apiResponseMessage("access-denied", 403, (object)[]);
        }
        if($user){
            return apiResponseMessage("User Created Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to create a User", 400, (object)[]);
        }
    }

    public function team_invite(TeamRequest $request){
        if(Auth::user()->role->role_name == "admin"){
            $user = $this->projectService->team($request);
        }else{
            return apiResponseMessage("access-denied", 403, (object)[]);
        }
        if($user){
            return apiResponseMessage("Team Invited Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to create a team", 400, (object)[]);
        }
    }
}
