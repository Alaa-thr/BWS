<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="{{ asset('js/vue.js') }}"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  href="{{ asset('images/icons/favicon.png')}}" rel="icon" type="image/png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   

    <!-- Scripts -->

    <script src="{{ asset('jss/app.js') }}" ></script>
    <script src="{{ asset('jss/vue.js') }}"></script>
    <script src="{{asset('jss/axios.min.js')}}">></script>
    <script src="{{asset('jss/vee-validate.min.js')}}"></script>
    <!--<link href="{{ asset('csss/app.css') }}" rel="stylesheet" type="text/css">-->
     <link href="{{ asset('assetsClient/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
 
   <script src="{{ asset('jss/vue.js') }}"></script>
    <script src="{{asset('jss/axios.min.js')}}"></script>
    <script src="{{asset('jss/sweetalert2.js')}}"></script>

    

</head>
<body>
    <!--<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                    <!-- Left Side Of Navbar 
                    <ul class="navbar-nav mr-auto">

                    </ul>-->

                    <!-- Right Side Of Navbar
                    <ul class="navbar-nav ml-auto"> -->
                        <!-- Authentication Links -->
                        <!--@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->id }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>-->
 <header>
        <!-- Header desktop -->
        <?php

                $stripeAccueil=$stripeShop=$stripeEmploi=$stripeArticle=$stripeAPropos=$stripeContact=$stripePanier='';
                
                $urlAcctuiel = Route::getCurrentRoute()->uri();
                if($urlAcctuiel == 'accueil' || $urlAcctuiel == '/'){
                    $stripeAccueil='active-menu';
                }
  ?>
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Be Happy with US 
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="#" class="logo">
                        <img src="{{ asset('images/icons/LogoFinal2.png')}}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="<?php echo $stripeAccueil ?>">
                                <a href="{{route('accueil')}}">Accueil</a>
                            </li>
                            <li >
                                    <div class="menu1">
                                        <a href="{{route('shop')}}">Shop&nbsp&nbsp</a>
                                        <span >
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <ul class="sub-menu " >
                                            <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col1  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                        Catégories
                                                    </div>
                                                    <ul>
                                                        <li class="p-b-6 ">
                                                        
                                                            <img src="{{ asset('images/icons/tshirt.png')}}" class="p-b-4">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Vêtements
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/Shoes.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Chaussures
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/cosmetics.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Santé & Beauté 
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/lipstick.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04 ">
                                                                Maquillages
                                                            </a>
                                                        </li>
                                    
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/diamond.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Bijoux
                                                            </a>
                                                        </li>
                                    
                                                        <li class="p-b-6">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                    
                                                <div class="filter-col2 p-b-27 p-t-39">
                                                    <ul>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/house.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04 ">
                                                                Immobilieres
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/nightstand.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Electroménagers & Meubles
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/repair.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Matériels
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/smartphone.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Télephones& Accessoires
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/laptop.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Informatiques
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                    
                                                <div class="filter-col3  p-b-27 p-t-39" >
                                                    <ul>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/car.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Véhicules & Automobiles
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="{{ asset('images/icons/customer.png')}}" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                    Services
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            
                                    
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <a href="#" class="filter-link stext-106 trans-04"></a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <a href="#" class="filter-link stext-106 trans-04"></a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <a href="#" class="filter-link stext-106 trans-04"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                        
                            </li>
                            <li class="menu1">
                                    <a href="{{route('emploi')}}">Emploi&nbsp&nbsp</a>
                                    <span >
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
                                <ul class="sub-menu " style="width: 1100%;" >
                                    <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                        <div class="filter-col1  p-b-27">
                                            <div class="mtext-102 cl2 p-b-15" style="color: #ca2323;">
                                                Catégories
                                            </div>
                            
                                            <ul>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/architect.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Architecture
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/programmer.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Informatique
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/flash.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Electricité
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/shield.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04 ">
                                                        Sécurité
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/hotel.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Hôtel
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter-col2 p-b-27 p-t-39">
                                            <ul>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/money.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04 ">
                                                        Banque
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/fruit.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Alimentation
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/medication.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Pharmacie
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/wrench.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Mécanicien Automobile
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    
                                                </li>
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter-col3  p-b-27 p-t-39">
                                            <ul>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/saw.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Menuiserie
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="{{ asset('images/icons/medicine.png')}}" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04 ">
                                                        Hôpital
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04"></a>
                                                </li>
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04"></a>
                                                </li>
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04"></a>
                                                </li>
                                                <li class="p-b-6">
                                                    <a href="#" class="filter-link stext-106 trans-04"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li >
                                    <a href="{{route('article')}}">Article</a>
                            </li>
                            <li >
                                    <a href="{{route('apropos')}}">A Propos</a>
                            </li>
                            <li >
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>                       
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header  flex-r-m ">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        @guest
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 <?php echo $stripePanier ?>" onclick="connecterAvant()" >
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        @else
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22   <?php echo $stripePanier ?>" onclick="Estconnecter()" >
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        @endguest
                        
                        @guest
                            
                            <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 js-show-connect">
                                <i class="zmdi zmdi-account"></i>
                             </div>
                        @else
                           <div class="dropdown">
                              <button class="  dis-block dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-account"></i>
                              </button>
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                                @if(Auth::user()->type_compte == 'c')
                                <a class="dropdown-item" href="{{ route('profilClient')}}">Mon Espace</a>
                                @elseif(Auth::user()->type_compte == 'v')
                                <a class="dropdown-item" href="{{ route('statistiquesVendeur')}}">Mon Espace</a>
                                @elseif(Auth::user()->type_compte == 'e')
                                <a class="dropdown-item" href="{{route('profilEmployeur')}}">Mon Espace</a>@elseif(Auth::user()->type_compte == 'a')
                                <a class="dropdown-item" href="{{route('statistiquesAdmin')}}">Mon Espace</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </div>
                              </div>
                            </div>
                        @endguest
                        

                    </div>
                </nav>
            </div>
                
        </div>
        
        <!-- Header Mobile -->
        
        <div class="wrap-header-mobile">
            
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('images/icons/LogoFinal2.png')}}" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                @guest
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 <?php echo $stripePanier ?>" onclick="connecterAvant()" >
                            <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                @else
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22   <?php echo $stripePanier ?>" onclick="Estconnecter()" >
                            <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                @endguest

                @guest
                            
                            <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 js-show-connect">
                                <i class="zmdi zmdi-account"></i>
                             </div>
                        @else
                           <div class="dropdown">
                              <button class="  dis-block dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-account"></i>
                              </button>
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                                @if(Auth::user()->type_compte == 'c')
                                <a class="dropdown-item" href="{{ route('profilClient')}}">Mon Espace</a>
                                @elseif(Auth::user()->type_compte == 'v')
                                <a class="dropdown-item" href="{{ route('statistiquesVendeur')}}">Mon Espace</a>
                                @elseif(Auth::user()->type_compte == 'e')
                                <a class="dropdown-item" href="{{route('profilEmployeur')}}">Mon Espace</a>@elseif(Auth::user()->type_compte == 'a')
                                <a class="dropdown-item" href="{{route('statistiquesAdmin')}}">Mon Espace</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </div>
                              </div>
                            </div>
                        @endguest
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hov-cl1 hamburger hamburger--squeeze" >
                <a class="hamburger-box" >
                    <img src="{{ asset('images/menu.png')}}" alt="..." style="width: 60%;">
                </a>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            
                <div class="top-bar-mobile">
                    <div class="content-topbar flex-sb-m h-full container">
                        <div class="left-top-bar">
                            Be Happy with US 
                        </div>
        
                        <div class="right-top-bar flex-w h-full">
                            
                            <a href="#" class="flex-c-m trans-04 p-lr-25">
                                EN
                            </a>
                                                                                                        
                            <a href="#" class="flex-c-m trans-04 p-lr-25">
                                Help & FAQs
                            </a>
                        </div>
                    </div>
                </div>
            

             <ul class="main-menu-m">
                <li>
                    <a href="{{route('accueil')}}" id="colorr">Accueil</a>
                    
                </li>

                <li>
                    <a href="{{route('shop')}}"id="colorr">Shop</a>
                    
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="{{route('emploi')}}" id="colorr">Emploi</a>
                    
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="{{route('article')}}"id="colorr">Article</a>
                </li>

                <li>
                    <a href="{{route('apropos')}} "id="colorr">A propos</a>
                </li>

                <li>
                    <a href="{{route('contact')}}" id="colorr">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ asset('images/icons/icon-close2.png')}}" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
                
            </div>
        </div>

<!--Cart Connect--><!--**************************************************************************-->
    <div class="wrap-header-cart js-panel-connect" id="app3">
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
                        <a href="{{route('accueil')}}" class="logo p-l-50" >
                            <img src="images/icons/LogoFinal2.png" alt="IMG-LOGO" />
                        </a>
                        <span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="card-body">
                       
                        <form method="POST" :action="wayLogin()">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-lg
                                {{ $errors->has('email') || $errors->has('numTelephone') ? ' is-invalid' : '' }}" name="numTelephone" value="{{ old('numTelephone') }}" type="text" placeholder="Email ou Telephone"  id="numTelephone" v-on:keyup='Connect()'>
                                
                                @error('numTelephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

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
                            <div class="form-group m-t--10 " v-if="hideSelect">
                                <span class="stext-109">Vous avez 2 compte avec ce "@{{ eventss.value}}" :</span>
                                <select class="form-control form-control-lg @error('type_compte') is-invalid @enderror stext-104 m-t-5" id="type_compte"  name="type_compte"   style="height: 45px" value="{{ old('type_compte') }}">

                                    <option value="0" disabled selected >Souhaitez vous connecter avec</option>
                                    <option v-for="typ in types" value="c" v-if="typ === 'c'">Compte Client</option>
                                    <option v-for="typ in types" value="v" v-if="typ === 'v'">Compte Vendeur</option>
                                    <option v-for="typ in types" value="e" v-if="typ === 'e'">Compte Employeur</option>
                                    <option v-for="typ in types" value="a" v-if="typ === 'a'">Compte Admin</option>

                                </select>

                                @error('type_compte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class=" custom-checkbox p-b-10">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label p-t-4 p-l-24 " for="remember">Remeber me</label>
                            </div>
                            <button type="submit" class="btn-lg btn-block bg10 cl0" >Connexion</button>
                        
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


<!--**********************************************************************************************-->
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart" >
        <div class="s-full js-hide-cart"></div>
        
        <div class="header-cart flex-col-l p-l-55 p-r-25">
            
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Votre Panier
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart" >
                    <i class="zmdi zmdi-close" style="margin-left: 171%"></i>
                </div>
                
            </div>
            
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img  src="images/item-cart-01.jpg"  alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                White Shirt Pleat
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ asset('images/item-cart-02.jpg')}}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Converse All Star
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ asset('images/item-cart-03.jpg')}}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Nixon Porter Leather
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>
                
                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{route('panier')}}" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    </div>

    </header>

       
            @yield('content')
        
    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32" style="margin-top:12%;">
        <div class="container">
            <div class="row">
                <div class="p-b-50" style="width: 8%;">
                   
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shoes
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50 m-r-120">
                    <h4 class="stext-301 cl0 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Newsletter
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="{{ asset('images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{ asset('images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </footer>
    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

 <!-- Modal1 -->
   
    @stack('javascript')
   <!--<script src="vendor/jquery/jquery-3.2.1.min.js"></script>--> 
   <script>
    
        window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "url"      => url("/")  
          ]) !!};
    

    </script>
   <script>
       var app3 = new Vue({
         el : "#app3",
         data:{
            timer: null,
            eventss: {
                value: '',
            },
            hideSelect: false,
            types: [],
            //wayLogin: {{ json_encode(route('login')) }},
         },
         methods:{
            wayLogin: function(){
                if(this.types.length == 0){
                    return "{{route('login')}}";
                }
                else{
                     return "{{route('authenticate')}}";
                }
            },
            Connect: function(){

                clearTimeout(this.timer); 
                this.timer = setTimeout(function () {

                        app3.eventss.value = document.getElementById('numTelephone').value;
                        axios.post(window.Laravel.url+"/getconnect",app3.eventss)
                        .then(response => {
                            if(response.data.etat ){
                                app3.hideSelect = true;
                                app3.types = response.data.typeCompte;
                                console.log("true",response)
                                
                            }
                            else{
                                app3.hideSelect = false;
                                console.log("false",response)
                            }
                            

                        })
                        .catch(error =>{
                            console.log("errors",error)
                        })
                        
                        
                     }, 1000)
                
            },
            showww(t){
                console.log('t',t);
            }
         },
         mounted:function(){
            this.Connect();
         }
       })
       function connecterAvant(){
        
            Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Vous devez être connecté tent que Client pour pouvez accedé a votre panier.',
                          footer: '<form method="GET" action="{{ route("logoutregister") }}">@csrf<a href="{{ route("logoutregister") }}">Créer Compte</a></form>',
                          showCancelButton: true,
                          cancelButtonColor: '#d33',
                          confirmButtonColor: '#13c940',
                          confirmButtonText:
                            'Se Connecter',
            }).then((result) => {
                if (result.value){
                    $('.js-panel-connect').addClass('show-header-cart');
                }
                             
            });
       }
       function Estconnecter(){

             $('.js-panel-cart').addClass('show-header-cart'); 
          
       }

   </script> 
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChnAfNPjSPo76qR3c9yR5IOWkA9BRlpf0"type="text/javascript"></script> 



    <script src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{ asset('js/slick-custom.js')}}"></script>

    <script src="{{ asset('vendor/parallax100/parallax100.js')}}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "A été ajouté a votre liste de favoris.", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
    <script src="{{ asset('js/main.js')}}"></script>


</body>
</html>
