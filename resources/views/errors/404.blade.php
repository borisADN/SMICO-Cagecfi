@extends('layouts.base')
@section('content')
<div class="auth-bg-basic d-flex align-items-center min-vh-100">
    <div class="bg-overlay bg-light"></div>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 py-5 px-3">
            

            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-7">
                    <div class="card bg-transparent shadow-none border-0">
                        <div class="card-body">
                            <div class="px-3 py-3 text-center">
                                <h1 class="error-title"><span class="blink-infinite">404</span></h1>
                                <h4 class="text-uppercase">Desole😞, page non trouvée!</h4>
                                <p class="font-size-15 mx-auto text-muted w-75 mt-4">La page que vous recherchez n'existe pas ou a été déplacée.</p>
                                <div class="mt-5 text-center">
                                    <a class="btn btn-primary waves-effect waves-light" href="{{ route('home') }}">Retourner à l'accueil</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div><!-- end row -->

         
        </div>
    </div>
    <!-- end container fluid -->
</div>
    @endsection
