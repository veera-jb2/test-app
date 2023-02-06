<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TaskCollection;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request){
        $task = $this->taskService->index($request);
        if($task){
            $taskList = TaskCollection::Collection($task);
            return apiResponseMessage("Task Listed Successfully", 200, ['taskList'=>$taskList]);
        }else{
            return apiResponseMessage("Failed to list a task", 400, (object)[]);
        }
    }

    public function store(TaskRequest $request){
        if(Auth::user()->role->role_name == "admin"){
            $task = $this->taskService->store($request);
        }else{
            return apiResponseMessage("access-denied", 403, (object)[]);
        }
        if($task){
            return apiResponseMessage("Task Created Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to create a task", 400, (object)[]);
        }
    }

    public function destroy(Request $request, $id){
        if(Auth::user()->role->role_name == "admin"){
            $task = $this->taskService->destroy($request, $id);
        }else{
            return apiResponseMessage("access-denied", 403, (object)[]);
        }
        if($task){
            return apiResponseMessage("Task Deleted Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to delete a task", 400, (object)[]);
        }
    } 

    public function update(TaskRequest $request, $id){
        if(Auth::user()->role->role_name == "admin"){
            $task = $this->taskService->update($request, $id);
        }else{
            return apiResponseMessage("access-denied", 403, (object)[]);
        }
        if($task){
            return apiResponseMessage("Task Updated Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to update a task", 400, (object)[]);
        }
    }
}
