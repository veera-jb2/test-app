<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class TaskCollection extends JsonResource
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
            'project_id' => $this->project_id,
            'task_name' => $this->task_name,
            'status' => $this->task_status == '0' ? 'In Complete' : 'Completed'
        ];
    }
}