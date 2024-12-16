@extends('layouts.base')

@section('content')
    @include('includes.topbar')

    <br><br><br><br><br>

    <div class="main-content mb-5">

        <div class="row custom-card  ">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">DEPOT {{ env('SOCIETY_NAME') }} VIA MOBILE MONEY</h4>
                    </div>
                    <div class="card-body p-4 mb-4">
                        <form action="#">
                            <ul class="wizard-nav">
                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Seller Details">
                                            1
                                            <i class="uil uil-list-ul"></i>
                                        </div>
                                    </div>
                                </li>

                                <li class="wizard-list-item">
                                    <div class="list-item">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Company Document">
                                            2
                                            <i class="uil uil-clipboard-notes"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="wizard-tab">
                                <div class="text-center">
                                    {{-- <h5>DE</h5> --}}
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">

                                          <div class="mb-1 mt-3">
                                    <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">COMPTES SUR LIVRET COLLECTE QUOTIDIENNE de
                                            KANGNI JULIENNE</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="basicpill-vatno-input" class="form-label">SOLDE</label>
                                    <div class="d-flex align-items-center flex-direction-row gap-3">
                                        <input type="text" class="form-control w-25"
                                            id="basicpill-lastname-input">
                                        <button class="btn btn-primary"><i
                                                class="bx bx-refresh fw-bold"></i></button>
                                    </div>
                                </div>
                                
                                    <div class="text-center mb-4">
                                        <h5>Détails sur le numéro de téléphone</h5>
                                    </div>
                                    
                                   
                                        <label class="form-label" for="formrow-password-input">Telephone</label>
                                        <div class="mb-3">
                                            {{-- <label class="form-label" for="formrow-firstname-input">First name</label> --}}
                                            <select name="" id="" class="form-control">

                                        </select>
                                        {{-- <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter First Name"> --}}
                                    </div>

                                    <div class="row">                                                            
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <div class="mb-3">
                                                {{-- <label style="visibility: hidden" class="form-label " for="formrow-email-input">Email</label> --}}
                                                <select name="" id="" class="form-control">

                                                </select>
                                                {{-- <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter E-mail"> --}}
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-8 col-lg-8 col-sm-8">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="formrow-password-input">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    
                                    <div class="row">   
                                        <div class="text-right">
                                            <h6>Titulaire</h6>
                                        </div>                                                         
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                {{-- <label class="form-label" for="formrow-email-input">Email</label> --}}
                                                <div class="mb-3">
                                                    {{-- <label class="form-label" for="formrow-password-input">Password</label> --}}
                                                    <input type="text" class="form-control" readonly id="formrow-password-input">
                                                </div>
                                                {{-- <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter E-mail"> --}}
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                {{-- <label class="form-label" for="formrow-password-input">Password</label> --}}
                                                <input type="password" class="form-control" id="formrow-password-input">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    </div>
                                </div>
                            </div>

                            <div class="wizard-tab">
                                    <div class="text-center">
                                        <h5>Détails Monetaires de l'operation</h5>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-6 ">

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">MONTANT</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-75"
                                                        id="basicpill-lastname-input">
                                                        FCFA
                                                    {{-- <button class="btn btn-primary"><i class="bx bx-refresh fw-bold"></i></button> --}}
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">FRAIS</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-50"
                                                        id="basicpill-lastname-input">
                                                    <button class="btn btn-primary"><i class="bx bx-refresh fw-bold"></i></button>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">Montant a renverser</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-75"
                                                        id="basicpill-lastname-input">
                                                    {{-- <button class="btn btn-primary"><i class="bx bx-refresh fw-bold"></i></button> --}}
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="basicpill-card-verification-input"
                                                    class="form-label">DESCRIPTION</label>
                                                <textarea class="form-control" name="" id="" cols="10" rows="4"></textarea>
                                            </div>

                                            <div class="d-flex align-items-center flex-direction-row gap-3">
                                       
                                                <button class="btn btn-primary">Valider</button>
                                                <button class="btn btn-primary">Annuler</button>
        
                                            </div>

                                        </div>
                                    </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <button type="button" class="btn btn-primary w-sm" id="prevBtn"
                                    onclick="nextPrev(-1)">Precedent</button>
                                <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn"
                                    onclick="nextPrev(1)">Suivant</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
        @include('includes.footer')
    </div>
@endsection
