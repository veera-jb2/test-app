@extends('base')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
            <h6 class="card-title">Create Project</h6>
            <div class="template-demo">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input class="mdc-text-field__input" id="project_name">
                    <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Name <span style="color:red;">*</span></label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 project_name_form_error d-none">
                            <div class="invalid-feedback project_name_form_error d-none" role="alert"><strong></strong></div> 
                </div>
            </div>
            </div>
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
<script src="{{ asset('resources/views/project/js/create.js') }}"></script>
@endsection