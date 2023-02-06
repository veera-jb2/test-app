@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="mdc-card p-0">
            <h6 class="card-title card-padding pb-0">Tasks of {{ $project->project_name }} <a href="{{ route('task.create',['project_id'=>$project->id]) }}">Create Task</a></h6>
            <div class="table-responsive">
            <table class="table table-hoverable">
                <thead>
                <tr>
                    <th class="text-left">Task Name</th>
                    <th>Task Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="tasks_table">           
                </tbody>
            </table>
            </div>
        </div>
        </div>
        <input type="hidden" id="project_id" value="{{ $project->id }}" />
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('resources/views/task/js/index.js') }}"></script>
@endsection