@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
            <h6 class="card-title">Create and Invite Team Member</h6>
            <div class="template-demo">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="first_name">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">First Name <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 first_name_form_error d-none">
                            <div class="invalid-feedback first_name_form_error d-none" role="alert"><strong></strong></div> 
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="last_name">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Last Name <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 last_name_form_error d-none">
                            <div class="invalid-feedback last_name_form_error d-none" role="alert"><strong></strong></div> 
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="email">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Email <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 email_form_error d-none">
                            <div class="invalid-feedback email_form_error d-none" role="alert"><strong></strong></div> 
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="password" type="password">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Password <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 password_form_error d-none">
                            <div class="invalid-feedback password_form_error d-none" role="alert"><strong></strong></div> 
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="password_confirmation" type="password">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Confirm Password <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 password_confirmation_form_error d-none">
                            <div class="invalid-feedback password_confirmation_form_error d-none" role="alert"><strong></strong></div> 
                </div>
            </div>
            </div>
            <input type="hidden" id="project_id" value="{{ $project->id }}">
            <div class="mdc-layout-grid__cell--span-4" style="margin-top:50px;">
                      </button>
                      <button class="mdc-button mdc-button--unelevated filled-button--success" id="submit">
                      Create
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
<script src="{{ asset('resources/views/project/js/team.js') }}"></script>
@endsection