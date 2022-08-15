@extends('layouts/contentLayoutMaster')

@section('title', 'Switch')

@section('content')
<!-- Basic Switches Starts -->
<section id="basic-switches">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Switch</h4>
                </div>
                <div class="card-body">
                    <div class="demo-inline-spacing">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="customSwitch1" />
                            <label class="form-check-label" for="customSwitch1">Toggle this switch element</label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" disabled id="customSwitch2" />
                            <label class="form-check-label" for="customSwitch2">Disabled switch element</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Switches Ends -->

<!-- Switch Colors Starts -->
<section id="switch-colors">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Colored Switch</h4>
                </div>
                <div class="card-body">
                    <p class="card-text mb-0">
                        Use class <code>.form-check-#{$color-name}</code> with <code>.form-switch</code> to change
                        switch's color
                    </p>
                    <div class="demo-inline-spacing">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch3">Primary</label>
                            <div class="form-check form-check-primary form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch3" />
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch44">Secondary</label>
                            <div class="form-check form-check-secondary form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch44" />
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch4">Success</label>
                            <div class="form-check form-check-success form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch4" />
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch5">Danger</label>
                            <div class="form-check form-check-danger form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch5" />
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch7">Warning</label>
                            <div class="form-check form-check-warning form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch7" />
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch6">Info</label>
                            <div class="form-check form-check-info form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch6" />
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch8">Dark</label>
                            <div class="form-check form-check-dark form-switch">
                                <input type="checkbox" checked class="form-check-input" id="customSwitch8" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Switch Colors Ends -->

<!-- Switch Icons Starts -->
<section id="switch-icons">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Switch with Icons</h4>
                </div>
                <div class="card-body">
                    <p class="card-text mb-0">
                        Use class <code>.switch-icon-left & .switch-icon-right</code> inside of
                        <code>.form-check-label</code> to
                        create a switch with icon.
                    </p>
                    <div class="demo-inline-spacing">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch10">Primary</label>
                            <div class="form-check form-switch form-check-primary">
                                <input type="checkbox" class="form-check-input" id="customSwitch10" checked />
                                <label class="form-check-label" for="customSwitch10">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch11">Secondary</label>
                            <div class="form-check form-switch form-check-secondary">
                                <input type="checkbox" class="form-check-input" id="customSwitch11" checked />
                                <label class="form-check-label" for="customSwitch11">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch111">Success</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" id="customSwitch111" checked />
                                <label class="form-check-label" for="customSwitch111">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch12">Danger</label>
                            <div class="form-check form-switch form-check-danger">
                                <input type="checkbox" class="form-check-input" id="customSwitch12" checked />
                                <label class="form-check-label" for="customSwitch12">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch14">Warning</label>
                            <div class="form-check form-switch form-check-warning">
                                <input type="checkbox" class="form-check-input" id="customSwitch14" checked />
                                <label class="form-check-label" for="customSwitch14">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch13">Info</label>
                            <div class="form-check form-switch form-check-info">
                                <input type="checkbox" class="form-check-input" id="customSwitch13" checked />
                                <label class="form-check-label" for="customSwitch13">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="customSwitch15">Dark</label>
                            <div class="form-check form-switch form-check-dark">
                                <input type="checkbox" class="form-check-input" id="customSwitch15" checked />
                                <label class="form-check-label" for="customSwitch15">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Switch Icons Ends -->
@endsection