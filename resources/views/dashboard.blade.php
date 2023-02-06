@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
        <div class="mdc-card info-card info-card--success">
            <div class="card-inner">
            <h5 class="card-title">Projects</h5>
            <h5 class="font-weight-light pb-2 mb-1 border-bottom">{{ $projects_count }}</h5>
            <div class="card-icon-wrapper">
                <i class="material-icons">dvr</i>
            </div>
            </div>
        </div>
        </div>
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
        <div class="mdc-card info-card info-card--danger">
            <div class="card-inner">
            <h5 class="card-title">Completed Tasks</h5>
            <h5 class="font-weight-light pb-2 mb-1 border-bottom">{{ $complete_tasks_count }}</h5>
            <div class="card-icon-wrapper">
                <i class="material-icons">assessment</i>
            </div>
            </div>
        </div>
        </div>
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
        <div class="mdc-card info-card info-card--primary">
            <div class="card-inner">
            <h5 class="card-title">In Complete Tasks</h5>
            <h5 class="font-weight-light pb-2 mb-1 border-bottom">{{ $incomplete_tasks_count }}</h5>
            <div class="card-icon-wrapper">
                <i class="material-icons">unarchive</i>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection