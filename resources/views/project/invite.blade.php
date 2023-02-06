@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell--span-12">
          <div class="mdc-card">
            <h6 class="card-title">Invite Team Member for {{ $project->project_name }}</h6>
            <div class="template-demo">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <a href ="{{ route('project.team.create',['id'=>$project->id]) }}">Click Here If Your Expected Member is not exist in the list</a>
                </div>
               </div>
              <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="template-demo">
                    <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                      <input type="hidden" name="enhanced-select" id="member" value="">
                      <i class="mdc-select__dropdown-icon"></i>
                      <div class="mdc-select__selected-text"></div>
                      <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                        <ul class="mdc-list">
                          @foreach($member_list as $member)
                          <li class="mdc-list-item" data-value="{{ $member->id }}">
                            {{ $member->first_name.' '.$member->last_name }}
                          </li>
                          @endforeach
                        </ul>
                      </div>
                      <span class="mdc-floating-label">Select Team Member</span>
                      <div class="mdc-line-ripple"></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 user_id_form_error d-none">
                            <div class="invalid-feedback user_id_form_error d-none" role="alert"><strong></strong></div> 
                </div>
            </div>
            <input type="hidden" id="project_id" value="{{ $project->id }}" />
            <div class="mdc-layout-grid__cell--span-4" style="margin-top:50px;">
                      </button>
                      <button class="mdc-button mdc-button--unelevated filled-button--success" id="submit">
                      Invite
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
<script src="{{ asset('resources/views/project/js/invite.js') }}"></script>
@endsection