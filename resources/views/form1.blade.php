@extends('layouts.base')

@section('content')
    @include('includes.topbar')

<br><br><br><br><br>

<div class="main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Forms Steps</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="#">
                        <ul class="wizard-nav mb-5">
                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Seller Details">
                                        <i class="uil uil-list-ul"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Company Document">
                                        <i class="uil uil-clipboard-notes"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Bank Details">
                                        <i class="uil uil-university"></i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- wizard-nav -->

                        <div class="wizard-tab">
                            <div class="text-center mb-4">
                                <h5>Transfert entre mes comptes </h5>
                                <p class="card-title-desc">DE</p>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input" class="form-label">Comptes</label>
                                            <input type="text" class="form-control"
                                                id="basicpill-firstname-input" placeholder="Enter First Name">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input" class="form-label">Solde</label>
                                            <input type="text" class="form-control"
                                                id="basicpill-lastname-input" placeholder="Enter Last Name">
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                {{-- <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input"
                                                class="form-label">Phone</label>
                                            <input type="text" class="form-control"
                                                id="basicpill-phoneno-input" placeholder="Enter Phone Number">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input"
                                                class="form-label">Email</label>
                                            <input type="email" class="form-control"
                                                id="basicpill-email-input" placeholder="Enter E-mail">
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="basicpill-address-input"
                                                class="form-label">Address</label>
                                            <textarea id="basicpill-address-input" class="form-control" placeholder="Enter Address"
                                                rows="2"></textarea>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row --> --}}
                            </div>

                        </div>
                        <!-- wizard-tab -->

                        <div class="wizard-tab">
                            <div>
                                <div class="text-center mb-4">
                                    <h5>Details Monetaires de L'operation</h5>
                                    {{-- <p class="card-title-desc">Fill all information below</p> --}}
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" class="form-label">MONTANT</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-pancard-input" placeholder="Enter PAN Number">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input"
                                                    class="form-label">FRAIS</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-vatno-input" placeholder="Enter VAT/TIN Number">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    {{-- <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input" class="form-label">CST
                                                    No.</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-cstno-input" placeholder="Enter CST No.">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-servicetax-input"
                                                    class="form-label">Service Tax No.</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-servicetax-input" placeholder="Enter Service Tax No.">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-companyuin-input"
                                                    class="form-label">Company UIN</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-companyuin-input" placeholder="Enter Company UIN">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-declaration-input"
                                                    class="form-label">Declaration</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-declaration-input" placeholder="Enter Declaration">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row--> --}}
                                </div><!-- end form -->
                            </div>
                        </div>
                        <!-- wizard-tab -->

                        <div class="wizard-tab">
                            <div>
                                <div class="text-center mb-4">
                                    <h5>VERS</h5>
                                    {{-- <p class="card-title-desc">Fill all information below</p> --}}
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-namecard-input"
                                                    class="form-label">COMPTES</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-namecard-input" placeholder="Enter Name of Card">
                                            </div>
                                        </div><!-- end col -->
                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Credit Card Type</label>
                                                <select class="form-select">
                                                    <option selected>Select Card Type</option>
                                                    <option value="AE">American Express</option>
                                                    <option value="VI">Visa</option>
                                                    <option value="MC">MasterCard</option>
                                                    <option value="DI">Discover</option>
                                                </select>
                                            </div>
                                        </div><!-- end col --> --}}
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cardno-input"
                                                    class="form-label">Solde</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-cardno-input" placeholder="Enter Credit Number">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-card-verification-input"
                                                    class="form-label">Description</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-card-verification-input" placeholder="Enter Verification number">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    {{-- <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-expiration-input"
                                                    class="form-label">Expiration Date</label>
                                                <input type="text" class="form-control"
                                                    id="basicpill-expiration-input" placeholder="Expiration Date">
                                            </div>
                                        </div>
                                    </div><!-- end row --> --}}
                                </div><!-- end form -->
                            </div>
                        </div>
                        <!-- wizard-tab -->

                        <div class="d-flex align-items-start gap-3 mt-4">
                            <button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </form><!-- end form -->
                </div>
            </div>
        </div><!-- end col -->
    </div>




    @include('includes.footer')
    {{-- <script src="assets/js/pages/form-wizard.init.js"></script> --}}
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
</div>

<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center p-3">

            <h5 class="m-0 me-2">Theme Customizer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0" />

        <div class="p-4">
            <h6 class="mb-3">Layout</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-vertical"
                    value="vertical">
                <label class="form-check-label" for="layout-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-horizontal"
                    value="horizontal">
                <label class="form-check-label" for="layout-horizontal">Horizontal</label>
            </div>

            <h6 class="mt-4 mb-3">Layout Mode</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light"
                    value="light">
                <label class="form-check-label" for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark"
                    value="dark">
                <label class="form-check-label" for="layout-mode-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3">Layout Width</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fluid"
                    value="fluid" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                <label class="form-check-label" for="layout-width-fluid">Fluid</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed"
                    value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
            </div>

            <h6 class="mt-4 mb-3">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
                    value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark"
                    value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <div id="sidebar-setting">
                <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Size</h6>

                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                        value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                    <label class="form-check-label" for="sidebar-size-default">Default</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                        value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small"
                        value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                </div>

                <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
                        value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark"
                        value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting mt-1">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand"
                        value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                </div>
            </div>

            <h6 class="mt-4 mb-3">Direction</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                    value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                    value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
@endsection