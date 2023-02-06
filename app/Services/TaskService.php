<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Events\NotificationShow;

class TaskService {

    public function store(Request $request){
        try{
             $project_task = new ProjectTask();   
             $project_task->project_id = $request->project_id;
             $project_task->task_name = $request->task_name;
             $project_task->created_by = Auth::user()->id;
             $project_task->save();
             return true;   
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

    public function index($request){
        try{
            $project_tasks = ProjectTask::where('project_id',$request->project_id)->get();
            return $project_tasks;
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

    public function update(Request $request, $id){
        try{
            $project_task = ProjectTask::find($id);
            if($request->task_status != $project_task->task_status){
                if($request->task_status == "0"){
                    $status = "In Complete";
                }else{
                    $status = "Completed";
                }
                event(new NotificationShow($request->task_name.' is marked as '.$status));  
            }
            $project_task->task_name = $request->task_name;
            $project_task->task_status = $request->task_status;
            $project_task->updated_by = Auth::user()->id;
            $project_task->update(); 
            event(new NotificationShow($request->task_name.' is updated'));  
            return true;
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }

    public function destroy(Request $request, $id){
        try{
            $project_tasks = ProjectTask::find($id);
            $task_name = $project_tasks->task_name;
            $project_tasks->delete();
            event(new NotificationShow($task_name.' is deleted')); 
            return true;
        }catch(\Exception $e){
            dd($e);
            return false;
        }
    }
}