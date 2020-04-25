<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  href="images/icons/favicon.png" rel="icon" type="image/png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(( 'Basmah.WS')); ?></title>

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
 <header>
        <!-- Header desktop -->
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
                            <li class="active-menu">
                                <a href="index.html">Accueil</a>
                            </li>
                            <li >
                                    <div class="menu1">
                                        <a href="product.html">Shop&nbsp&nbsp</a>
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
                                    <a href="Emploi.html">Emploi&nbsp&nbsp</a>
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
                            <li>
                                    <a href="blog.html">Article</a>
                            </li>
                            <li>
                                    <a href="about.html">A Propos</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>                       
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header  flex-r-m ">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart" >
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
                                <a class="dropdown-item" href="#">Profil</a>
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

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22  js-show-cart" >
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-connect">
                    <i class="zmdi zmdi-account"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
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
                    <a href="index.html" id="colorr">Accueil</a>
                    
                </li>

                <li>
                    <a href="product.html" id="colorr">Shop</a>
                    
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="Emploi.html" id="colorr">Emploi</a>
                    
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="blog.html" id="colorr">Article</a>
                </li>

                <li>
                    <a href="about.html" id="colorr">A propos</a>
                </li>

                <li>
                    <a href="contact.html" id="colorr">Contact</a>
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
                                <input class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" type="email" placeholder="Email ou Telephone"  id="email">

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
                        <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
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

       
            <?php echo $__env->yieldContent('content'); ?>
        
    

<!--===============================================================================================
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>-->  
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
<?php /**PATH C:\xampp\htdocs\try\resources\views/layouts/app.blade.php ENDPATH**/ ?>