@extends('layouts.base')
@section('content')
    @include('includes.topbar')
    @include('includes.spinner')
    <div class="main-content mb-5">
        <div class="row custom-card">
            <div class="col-lg-12 ">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">DEMANDE DE CHEQUIER</h4>
                    </div>

                    <div class="card-body p-5 mb-4">

                        <form class="row d-flex justify-content-center">
                            <div class="col-lg-6 ">
                
                            <div class="mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Comptes</label>
                                {{-- <div class="" style="display: inline"> --}}
                                    <select name="idcptemet" id="compte-select" class="form-control w-100">
                                        @foreach ($comptes as $compte)
                                            <option value="{{ $compte['idcompte'] }}">{{ $compte['nomcompte'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                {{-- </div> --}}
                            </div>

                            <div class="mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Type de
                                    Chequier</label>
                                <div class="">
                                    <select class="form-control w-100">

                                    </select>
                                </div>


                            </div>

                            

                            <div class="mb-1">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Type
                                    Feuillet</label>
                                <div class="">
                                    <select class="form-control w-100">
                                        <option>CHEQUE CLIENT DE 25 PAGES</option>
                                        <option>CHEQUE CLIENT DE 25 PAGES</option>
                                        <option>CHEQUE CLIENT DE 25 PAGES</option>
                                        <option>CHEQUE CLIENT DE 25 PAGES</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Quantité</label>
                                <div class="">
                                    <input type="text" class="form-control w-100" id="horizontal-firstname-input">

                                </div>
                            </div>

                            <div class="row justify-content-start">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('includes.footer')
@endsection
