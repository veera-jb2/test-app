@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell--span-12">
          <div class="mdc-card">
            <h6 class="card-title">Edit Task for {{ $project->project_name }}</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="task_name" value="{{ $project_task->task_name }}">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Name <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 task_name_form_error d-none">
                            <div class="invalid-feedback task_name_form_error d-none" role="alert"><strong></strong></div> 
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="template-demo">
                    <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                      <input type="hidden" name="enhanced-select" id="task_status" value="{{ $project_task->task_status }}">
                      <i class="mdc-select__dropdown-icon"></i>
                      <div class="mdc-select__selected-text"></div>
                      <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                        <ul class="mdc-list">
                          
                          <li class="mdc-list-item" data-value="0">
                            InComplete
                          </li>
                          <li class="mdc-list-item" data-value="1">
                            Completed
                          </li>
                        </ul>
                      </div>
                      <span class="mdc-floating-label">Update Task Status</span>
                      <div class="mdc-line-ripple"></div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
            <input type="hidden" id="project_id" value="{{ $project->id }}" />
            <input type="hidden" id="task_id" value="{{ $project_task->id }}" />
            <div class="mdc-layout-grid__cell--span-4" style="margin-top:50px;">
                      </button>
                      <button class="mdc-button mdc-button--unelevated filled-button--success" id="submit">
                      Update
                      </button>
                      <button class="mdc-button mdc-button--unelevated filled-button--secondary" onclick="cancel();">
                        Cancel
                      </button>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('resources/views/task/js/edit.js') }}"></script>
@endsection