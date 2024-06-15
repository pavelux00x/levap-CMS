<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <title>2FA</title>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        {{-- <img src="{{asset('backend_assets')}}/images/logo-img.png" width="180" alt="" /> --}}
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Verifica 2fa</h3>
                                    </p>
                                </div>
                                {{-- <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="social_auth/google"> <span class="d-flex
                                    justify-content-center align-items-center">
                          <img class="me-2" src="{{asset('backend_assets')}}/images/icons/search.svg" width="16"
                               alt="Image
                          Description">
                          <span>Registrati con google</span>
											</span>
                                    </a>
                                </div> --}}
                                <div class="login-separater text-center mb-4"> <span>Verifica a 2 Fattori</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form method="POST" action="{{ route('2fa.post') }}">
                                        @csrf

                                        <div class="col-sm-12">
                                            <label for="inputUserName" class="form-label">Codice</label>
                                            <input id="two_factor_code" type="text" class="form-control @error('two_factor_code') is-invalid @enderror" name="two_factor_code" required autofocus>
                                            @error('two_factor_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Attenzione!!! Riprova.</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <br>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Invia</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
@include('backend.includes.js')

<!--Password show & hide js -->

</body>

</html>
