@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="mdc-card p-0">
            <h6 class="card-title card-padding pb-0">Projects <a href="{{ route('project.create') }}">Create Project</a>  <a href="{{ route('project.all_projects') }}">All Projects</a></h6>
            <div class="table-responsive">
            <table class="table table-hoverable">
                <thead>
                <tr>
                    <th class="text-left">Project Name</th>
                    <th>Completed Tasks</th>
                    <th>In Complete Tasks</th>
                    <th>Invited Members</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="projects_table">               
                </tbody>
            </table>
            </div>
        </div>
        </div>       
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('resources/views/project/js/index.js') }}"></script>
@endsection