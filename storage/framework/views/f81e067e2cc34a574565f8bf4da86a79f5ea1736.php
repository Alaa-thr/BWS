<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  href="images/icons/favicon.png" rel="icon" type="image/png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    

    <!-- Scripts -->
    <script src="<?php echo e(asset('jss/app.js')); ?>" ></script>
    <!--<link href="<?php echo e(asset('csss/app.css')); ?>" rel="stylesheet" type="text/css">-->
    
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="<?php echo e(asset('jss/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('jss/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('jss/sweetalert2.js')); ?>"></script>



</script>

    

</head>
<body>
    <!--<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                    <!-- Left Side Of Navbar 
                    <ul class="navbar-nav mr-auto">

                    </ul>-->

                    <!-- Right Side Of Navbar
                    <ul class="navbar-nav ml-auto"> -->
                        <!-- Authentication Links -->
                        <!--<?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->id); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>-->
 <header class="header-v4">
        <!-- Header desktop -->
        <?php

                $stripeAccueil=$stripeShop=$stripeEmploi=$stripeArticle=$stripeAPropos=$stripeContact=$stripePanier='';
                
                $urlAcctuiel = Route::getCurrentRoute()->uri();
                if($urlAcctuiel == 'article'){
                    $stripeArticle='active-menu';
                }
                else if($urlAcctuiel == 'apropos'){
                    $stripeAPropos='active-menu';
                }
                else if($urlAcctuiel == 'contact'){
                    $stripeContact='active-menu';
                }
                else if($urlAcctuiel == 'panierVisiteur'){
                    $stripePanier='active-menu';
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
                        <img src="images/icons/LogoFinal2.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo e(route('accueil')); ?>">Accueil</a>
                            </li>
                            <li class="menu1">
                                    <a href="<?php echo e(route('shop')); ?>">Shop&nbsp&nbsp</a>
                                    <span >
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
                                    
                                    <ul class="sub-menu " >
                                            <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col1  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                        Catégories
                                                    </div>
                                                    <ul>
                                                        <li class="p-b-6 ">
                                                        
                                                            <img src="images/icons/tshirt.png" class="p-b-4">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Vêtements
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/Shoes.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Chaussures
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/cosmetics.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Santé & Beauté 
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/lipstick.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04 ">
                                                                Maquillages
                                                            </a>
                                                        </li>
                                    
                                                        <li class="p-b-6">
                                                            <img src="images/icons/diamond.png" class="p-b-2">
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
                                                            <img src="images/icons/house.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04 ">
                                                                Immobilieres
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/nightstand.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Electroménagers & Meubles
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/repair.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Matériels
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/smartphone.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Télephones& Accessoires
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/laptop.png" class="p-b-2">
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
                                                            <img src="images/icons/car.png" class="p-b-2">
                                                            <a href="#" class="filter-link stext-106 trans-04">
                                                                Véhicules & Automobiles
                                                            </a>
                                                        </li>
                                                        <li class="p-b-6">
                                                            <img src="images/icons/customer.png" class="p-b-2">
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
                                    <a href="<?php echo e(route('emploi')); ?>">Emploi&nbsp&nbsp</a>
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
                                                    <img src="images/icons/architect.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Architecture
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/programmer.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Informatique
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/flash.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Electricité
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/shield.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04 ">
                                                        Sécurité
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/hotel.png" class="p-b-2">
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
                                                    <img src="images/icons/money.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04 ">
                                                        Banque
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/fruit.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Alimentation
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/medication.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Pharmacie
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/wrench.png" class="p-b-2">
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
                                                    <img src="images/icons/saw.png" class="p-b-2">
                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                        Menuiserie
                                                    </a>
                                                </li>
                                                <li class="p-b-6">
                                                    <img src="images/icons/medicine.png" class="p-b-2">
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
                            <li class="<?php echo $stripeArticle ?>">
                                    <a href="<?php echo e(route('article')); ?>">Article</a>
                            </li>
                            <li class="<?php echo $stripeAPropos ?>">
                                    <a href="<?php echo e(route('apropos')); ?>">A Propos</a>
                            </li>
                            <li class="<?php echo $stripeContact ?>">
                                <a href="<?php echo e(route('contact')); ?>">Contact</a>
                            </li>
                        </ul>                       
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header  flex-r-m ">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart <?php echo $stripePanier ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        
                        </div>
                        
                        <?php if(auth()->guard()->guest()): ?>
                            
                            <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 js-show-connect">
                                <i class="zmdi zmdi-account"></i>
                             </div>
                        <?php else: ?>
                           <div class="dropdown">
                              <button class="  dis-block dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-account"></i>
                              </button>
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                                <?php if(Auth::user()->type_compte == 'c'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('profilClient')); ?>">Mon Espace</a>
                                <?php elseif(Auth::user()->type_compte == 'v'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('statistiquesVendeur')); ?>">Mon Espace</a>
                                <?php elseif(Auth::user()->type_compte == 'e'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('profilEmployeur')); ?>">Mon Espace</a><?php elseif(Auth::user()->type_compte == 'a'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('statistiquesAdmin')); ?>">Mon Espace</a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                              </div>
                            </div>
                        <?php endif; ?>
                        

                    </div>
                </nav>
            </div>
                
        </div>
        
        <!-- Header Mobile -->
        
        <div class="wrap-header-mobile">
            
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.html"><img src="images/icons/LogoFinal2.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22  js-show-cart <?php echo $stripePanier ?>" >
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <?php if(auth()->guard()->guest()): ?>
                            
                    <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 js-show-connect">
                                <i class="zmdi zmdi-account"></i>
                    </div>
                    <?php else: ?>
                           <div class="dropdown">
                              <button class="  dis-block dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-account"></i>
                              </button>
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                                 <?php if(Auth::user()->type_compte == 'c'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('profilClient')); ?>">Mon Espace</a>
                                <?php elseif(Auth::user()->type_compte == 'v'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('statistiquesVendeur')); ?>">Mon Espace</a>
                                <?php elseif(Auth::user()->type_compte == 'e'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('profilEmployeur')); ?>">Mon Espace</a><?php elseif(Auth::user()->type_compte == 'a'): ?>
                                <a class="dropdown-item" href="<?php echo e(route('statistiquesAdmin')); ?>">Mon Espace</a>
                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                              </div>
                            </div>
                <?php endif; ?>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hov-cl1 hamburger hamburger--squeeze" >
                <a class="hamburger-box" >
                    <img src="images/menu.png" alt="..." style="width: 60%;">
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
                    <a href="<?php echo e(route('accueil')); ?> id="colorr">Accueil</a>
                    
                </li>

                <li>
                    <a href="<?php echo e(route('shop')); ?>id="colorr">Shop</a>
                    
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="<?php echo e(route('emploi')); ?>" id="colorr">Emploi</a>
                    
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="<?php echo e(route('article')); ?>id="colorr">Article</a>
                </li>

                <li>
                    <a href="<?php echo e(route('apropos')); ?> id="colorr">A propos</a>
                </li>

                <li>
                    <a href="<?php echo e(route('contact')); ?> id="colorr">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
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
    <div class="wrap-header-cart js-panel-connect">
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
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input class="form-control form-control-lg
                                <?php echo e($errors->has('email') || $errors->has('numTelephone') ? ' is-invalid' : ''); ?>" name="numTelephone" value="<?php echo e(old('numTelephone')); ?>" type="text" placeholder="Email ou Telephone"  id="numTelephone">
                                
                                <?php $__errorArgs = ['numTelephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" type="password" placeholder="Mot de passe">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label class="custom-control-label p-t-4" for="remember">Remeber me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn-lg btn-block bg10 cl0">Connexion</button>
                        
                    </div>
                    <div class="card-footer" >
                        
                        <?php if(Route::has('register')): ?>
                        <div class="card-footer-item card-footer-item-bordered" >
                            <a href="<?php echo e(route('register')); ?>" style="color:rgb(122, 122, 122); margin-right: 2%;" lass="nav-link"><?php echo e(__('Creer un Compte')); ?></a>
                        </div>

                        <?php endif; ?>
                         
                        <?php if(Route::has('password.request')): ?>
                                    
                            <div class="card-footer-item card-footer-item-bordered" >
                                 <a href="<?php echo e(route('password.request')); ?>" style="color:rgb(122, 122, 122); margin-left: 10%;"><?php echo e(__('Forgot Password')); ?></a>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    </form>
                </div>
            </div>
          
            
        </div>
    </div>
<!--**********************************************************************************************-->
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
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
                            <img src="images/item-cart-02.jpg" alt="IMG">
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
                            <img src="images/item-cart-03.jpg" alt="IMG">
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
                        <a  href="<?php echo e(route('panierVisiteur')); ?>" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a  href="<?php echo e(route('panierVisiteur')); ?>" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    </div>

    </header>

       
            <?php echo $__env->yieldContent('content'); ?>
        
    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
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
                        <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
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

     <!-- Modal1
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Lightweight Jacket
                            </h4>

                            <span class="mtext-106 cl2">
                                $58.79
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
                            </p>
                            
                            
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                            
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Type Livraison
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option value="1">DHL / 36.00 DA</option>
                                                <option value="2">Vendeure / 142.50 DA</option>
                                                <option value="3">Client / 142.50 DA</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-101 bg10 bor1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>  
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
<?php echo $__env->yieldPushContent('javascripts'); ?>

   <!--<script src="vendor/jquery/jquery-3.2.1.min.js"></script>-->  
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/slick-custom.js"></script>

    <script src="vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

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
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
    <script src="js/main.js"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\BWS\resources\views/layouts/template_visiteur.blade.php ENDPATH**/ ?>