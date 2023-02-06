@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
            @foreach($projects as $project)
            <h6 class="card-title">{{ $project->project_name }}</h6>
            <ul>
              @foreach($project->projectTask as $task)
              <li>{{ $task->task_name }}</li>
              @endforeach
           </ul>
            @endforeach
    </div>
    </div>
    </div>
</div>
</div>
@endsection