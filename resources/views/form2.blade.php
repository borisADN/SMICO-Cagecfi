@extends('layouts.base')

@section('content')
    @include('includes.topbar')

    <br><br><br><br><br>

    <div class="main-content mb-5">

        <div class="row custom-card  ">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">VIREMENT VERS AUTRES COMPTES {{env('SOCIETY_NAME')}}</h4> 
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
                                    <h5>DE</h5>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">
                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">COMPTES SUR LIVRET COLLECTE QUOTIDIENNE de
                                                    KANGNI JULIENNE</option>
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">SOLDE</label>
                                            <div class="d-flex align-items-center flex-direction-row gap-3">
                                                <input type="text" class="form-control w-25"
                                                    id="basicpill-lastname-input">
                                                <button class="btn btn-primary"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="text-center mb-4">
                                                <h5>Details Monetaires de L'operation</h5>
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-pancard-input" class="form-label">MONTANT</label>
                                                <input type="text" class="form-control" id="basicpill-pancard-input">
                                            </div>

                                            <div class="mb-1">
                                                <label for="basicpill-vatno-input" class="form-label">FRAIS</label>
                                                <div class="d-flex align-items-center flex-direction-row gap-3">
                                                    <input type="text" class="form-control w-25"
                                                        id="basicpill-lastname-input">
                                                    <button class="btn btn-primary"><i
                                                            class="bx bx-refresh fw-bold"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="wizard-tab">
                                <div class="text-center">
                                    <h5>VERS</h5>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 ">

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">ID Mobile</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control w-50"
                                                    id="basicpill-lastname-input">
                                                <button class="btn btn-primary"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Code Client</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control w-50"
                                                    id="basicpill-lastname-input">
                                                <button class="btn btn-primary"><i
                                                        class="bx bx-refresh fw-bold"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-vatno-input" class="form-label">Titulaire</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control "
                                                    id="basicpill-lastname-input">
                                               
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-namecard-input" class="form-label">COMPTES</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">COMPTES SUR LIVRET COLLECTE QUOTIDIENNE de
                                                    KANGNI JULIENNE</option>
                                            </select>
                                        </div>

                                        <div class="mb-1">
                                            <label for="basicpill-card-verification-input"
                                                class="form-label">DESCRITION</label>
                                            <textarea class="form-control" name="" id="" cols="10" rows="4"></textarea>
                                        </div>

                                         {{-- <button type="button" class="btn btn-primary">Annuler</button> --}}
                                        
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
