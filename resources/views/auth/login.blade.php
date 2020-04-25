@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cart Connect--><!--**************************************************************************-->
<!--    <div class="wrap-header-cart js-panel-connect">
        <div class="s-full js-hide-connect"></div>

        <div class="header-cart flex-col-l p-l-40 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8" style="margin-top: 6%">
                <span class="mtext-103 cl2">
                    S'identifier
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-connect">
                    <i class="zmdi zmdi-close" style="margin-left: 340%"></i>
                </div>
            </div>
            <div class="splash-container js-pscroll" >
                <div class="card " >
                    <div class="card-header">
                        <a href="index.html" class="logo p-l-50" >
                            <img src="images/icons/LogoFinal2.png" alt="IMG-LOGO" >
                        </a>
                        <span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Email ou Telephone"  id="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label p-t-4" for="remember">Remeber me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn-lg btn-block bg10 cl0">Connexion</button>
                        
                    </div>
                    <div class="card-footer" >
                        
                        @if (Route::has('register'))
                        <div class="card-footer-item card-footer-item-bordered" >
                            <a href="{{ route('register') }}" style="color:rgb(122, 122, 122); margin-right: 2%;" lass="nav-link">{{ __('Creer un Compte') }}</a>
                        </div>

                        @endif
                         
                        @if (Route::has('password.request'))
                                    
                            <div class="card-footer-item card-footer-item-bordered" >
                                 <a href="{{ route('password.request') }}" style="color:rgb(122, 122, 122); margin-left: 10%;">{{ __('Forgot Password') }}</a>
                            </div>
                        @endif
                        
                    </div>
                    </form>
                </div>
            </div>
          
            
        </div>
    </div>-->

@endsection
