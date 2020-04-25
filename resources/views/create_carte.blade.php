
@section('carte_connect')





<head>
 <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">


</head>








     <!--Cart Connect--><!--**************************************************************************-->
    <div class="wrap-header-cart js-panel-connect" style="z-index: 13000;">
        <div class="s-full js-hide-connect"></div>

        <div class="header-cart flex-col-l p-l-40 p-r-25" >
            <div class="header-cart-title flex-w flex-sb-m p-b-8" style="margin-top: 6%">
                <span class="mtext-103 cl2">
                    S'identifier
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-connect">
                    <i class="zmdi zmdi-close" style="margin-left: 340%"></i>
                </div>
            </div>
            <div class="splash-container js-pscroll" >
                <div class="" >
                    <div class="card-header">
                        <a href="{{ route('accueil') }}" class="loggo p-l-50" >
                            <img src="images/icons/LogoFinal2.png" alt="IMG-LOGO" >
                        </a>
                        <span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="card-body" >
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
                            <div class=" custom-checkbox p-b-10">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label p-t-4 p-l-24 " for="remember">Remeber me</label>
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
    </div>
@endsection