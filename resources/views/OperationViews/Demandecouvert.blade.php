@extends('layouts.base')
@section('content')
    @include('includes.topbar')
    @include('includes.spinner')
    <div class="main-content mb-5">
        <div class="row custom-card">
            <div class="col-lg-12 ">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-center fw-bold">DEMANDE DE DÉCOUVERT</h4>
                    </div>

                    <div class="card-body p-5 mb-4">
                        <form>
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Comptes</label>
                                <div class="col-sm-9">
                                    <select class="form-control w-50">
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Montant</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control w-25" id="horizontal-firstname-input">           
                                </div>
                            </div>



                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control w-25" id="horizontal-firstname-input">           
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control w-50" id="horizontal-firstname-input">
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('includes.footer')
@endsection
