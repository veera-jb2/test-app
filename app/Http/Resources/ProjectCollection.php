<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class ProjectCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
    	return [
            'id'   => $this->id,
            'project_name' => $this->project_name,
            'completed_tasks' =>  !empty($this->projectTask) ? $this->projectTask->where('task_status','1')->count() : '0',
            'incomplete_tasks' => !empty($this->projectTask) ? $this->projectTask->where('task_status','0')->count() : '0',
            'invited_members' => !empty($this->projectMember) ? $this->projectMember->count() : '0'
        ];
    }
}