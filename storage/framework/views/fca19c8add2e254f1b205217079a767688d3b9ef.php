<!doctype html>
<html lang="fr" id='html_id'>
<script src="<?php echo e(asset('js/vue.js')); ?>"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  href="<?php echo e(asset('images/icons/title_icon.png')); ?>" rel="icon" type="image/png">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

   

    <!-- Scripts -->

    <script src="<?php echo e(asset('jss/app.js')); ?>" ></script>
    <script src="<?php echo e(asset('jss/vee-validate.min.js')); ?>"></script>
    <!--<link href="<?php echo e(asset('csss/app.css')); ?>" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="<?php echo e(asset('assetsClient/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/iconic/css/material-design-iconic-font.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/linearicons-v1.0.0/icon-font.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/animate/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/animsition/css/animsition.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/slick/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/MagnificPopup/magnific-popup.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
 
   <script src="<?php echo e(asset('jss/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('jss/axios.min.js')); ?>"></script>
    <script src="<?php echo e(asset('jss/sweetalert2.js')); ?>"></script>

    

</head>
<body>
   
 <header id='app3'>
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
            <div class="top-bar ">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Soyez Heureux avec NOUS 
                    </div>
                    <div class="right-top-bar flex-w h-full">
                        <a class="flex-c-m trans-04 p-lr-25">
                           <div id="google_translate_element" class="m-t-15"></div>
                        </a>
                        
                    </div>
                    

                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->       
                    <a href="<?php echo e(route('accueil')); ?>" class="logo">
                        <img src="<?php echo e(asset('images/icons/LogoFinal2.png')); ?>" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <?php if(auth()->guard()->guest()): ?>
                            <li class="<?php echo $stripeAccueil ?>">
                                <a href="<?php echo e(route('accueil')); ?>">Accueil</a>
                            </li>
                            <li >
                                    <div class="menu1">
                                        <a href="<?php echo e(route('shop')); ?>">Shop&nbsp&nbsp</a>
                                        <span >
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <ul class="sub-menu " >
                                            <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col8  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                        Catégories
                                                    </div>
                                                    <ul >
                                    
                                                        <li class="p-b-6 " v-for="(catego,cntt) in categories" :key = 'cntt' v-if="cntt <count">

                                                            <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

        <a :href="'/shop/search_categorie='+catego.id" class="filter-link stext-106 trans-04">
                                                                    {{catego.libelle}}
                                                            </a>
                                                        </li>
                                                               
                                                    </ul >
                                                    <ul >
                                                <li class="p-b-6 " v-if="autreProd === 1">

                                                   

                                                    <a href="/shop/search_categorie=1" class="filter-link stext-106 trans-04">
                                                            Autre
                                                    </a>
                                                </li>
                                                       
                                            </ul >
                                                </div>
                                    
            <?php 
                   
                    for ($k = 0; $k < 6; $k++){
                            unset($categorie[$k]);               
                    }
                    $cc=count($categorie);
                   
            ?>                                 
            <?php for($i=0; $i< $cc;  ): ?>
           
                        <?php
                            $j=0;
                        ?>
               
                        <div class="filter-col8 p-b-27 p-t-39"><!--filteredItems1-->
                <?php $__currentLoopData = $categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctgo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                    <?php if($j < 6): ?>
                        <?php
                            $j++;
                        ?>            
                        <ul>
                            <li class="p-b-6 " >
                            <?php if($ctgo->image !=null): ?> 
                                <img src="<?php echo asset('storage/categorie_image/'.$ctgo->image) ?>" class="p-b-4">
                            <?php endif; ?>
                                <a href="#" class="filter-link stext-106 trans-04"><?php echo e($ctgo->libelle); ?></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php for($f = 0; $f < $j; $f++): ?>
                    
                    <?php $categorie->shift($f);?>                
                  
                <?php endfor; ?>
               
                <?php
                    $cc-=$j;
                ?>
                                                </div>
            <?php endfor; ?>
                                            </div>
                                        </ul>
                                        
                            </li>
                            <li class="menu1">
                                    <a href="<?php echo e(route('emploi')); ?>">Emploi&nbsp&nbsp</a>
                                    <span >
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
                                <ul class="sub-menu " style="width: 575%;" >
                                    <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                        <div class="filter-col1  p-b-27">
                                            <div class="mtext-102 cl2 p-b-15" style="color: #ca2323;">
                                                Catégories
                                            </div>
                            
                                            <ul >
                                                        <li class="p-b-6 " v-for="(catego,cntt) in categoriesE" :key = 'cntt' v-if="cntt <count">

                                                            <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

        <a :href="'/emploi/search_categorie='+catego.id"  class="filter-link stext-106 trans-04">
                                                                    {{catego.libelle}}
                                                            </a>
                                                        </li>
                                                               
                                                    </ul >
                                                    <ul >
                                                <li class="p-b-6 " v-if="autreAnn === 1">

                                                   

                                                    <a href="/emploi/search_categorie=1" class="filter-link stext-106 trans-04">
                                                            Autre
                                                    </a>
                                                </li>
                                                       
                                            </ul >
                                        </div>
                                         <?php 
                   
                    for ($k = 0; $k < 6; $k++){
                            unset($categorieE[$k]);               
                    }
                    $cc=count($categorieE);
                   
            ?>                                 
            <?php for($i=0; $i< $cc;  ): ?>
           
                        <?php
                            $j=0;
                        ?>
               
                        <div class="filter-col8 p-b-27 p-t-39"><!--filteredItems1-->
                <?php $__currentLoopData = $categorieE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctgo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                    <?php if($j < 6): ?>
                        <?php
                            $j++;
                        ?>            
                        <ul>
                            <li class="p-b-6 " >
                            <?php if($ctgo->image !=null): ?> 
                                <img src="<?php echo asset('storage/categorie_image/'.$ctgo->image) ?>" class="p-b-4">
                            <?php endif; ?>
                                <a href="#" class="filter-link stext-106 trans-04"><?php echo e($ctgo->libelle); ?></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php for($f = 0; $f < $j; $f++): ?>
                    
                    <?php $categorieE->shift($f);?>                
                  
                <?php endfor; ?>
               
                <?php
                    $cc-=$j;
                ?>
                                                </div>
            <?php endfor; ?>
                                        
                                    </div>
                                </ul>
                            </li>
                            <li >
                                    <a href="<?php echo e(route('article')); ?>">Article</a>
                            </li>
                            <li >
                                    <a href="<?php echo e(route('apropos')); ?>">A Propos</a>
                            </li>
                            <li >
                                <a href="<?php echo e(route('contact')); ?>">Contact</a>
                            </li>
                            <?php else: ?>
                                <?php if(Auth::user()->number_confirm != null): ?>
                                    <li class="<?php echo $stripeAccueil ?>">
                                       <a href="\confirmation">Accueil</a>
                                    </li>
                                    <li >
                                    <div class="menu1">
                                        <a href="\confirmation">Shop&nbsp&nbsp</a>
                                        <span >
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    
                                        
                                    </li>
                            <li class="menu1">
                                    <a href="\confirmation">Emploi&nbsp&nbsp</a>
                                    <span >
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
                               
                            </li>
                            <li >
                                    <a href="\confirmation">Article</a>
                            </li>
                            <li >
                                    <a href="\confirmation">A Propos</a>
                            </li>
                            <li >
                                <a href="\confirmation">Contact</a>
                            </li>

                                <?php else: ?>
                                    <li class="<?php echo $stripeAccueil ?>">
                                        <a href="<?php echo e(route('accueil')); ?>">Accueil</a>
                                    </li>
                                    <li >
                                    <div class="menu1">
                                        <a href="<?php echo e(route('shop')); ?>">Shop&nbsp&nbsp</a>
                                        <span >
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <ul class="sub-menu " >
                                            <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col8  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                        Catégories
                                                    </div>
                                                    <ul >
                                    
                                                        <li class="p-b-6 " v-for="(catego,cntt) in categories" :key = 'cntt' v-if="cntt <count">

                                                            <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

        <a :href="'/shop/search_categorie='+catego.id" class="filter-link stext-106 trans-04">
                                                                    {{catego.libelle}}
                                                            </a>
                                                        </li>
                                                               
                                                    </ul >
                                                    <ul >
                                                <li class="p-b-6 " v-if="autreProd === 1">

                                                   

                                                    <a href="/shop/search_categorie=1" class="filter-link stext-106 trans-04">
                                                            Autre
                                                    </a>
                                                </li>
                                                       
                                            </ul >
                                                </div>
                                    
            <?php 
                   
                    for ($k = 0; $k < 6; $k++){
                            unset($categorie[$k]);               
                    }
                    $cc=count($categorie);
                   
            ?>                                 
            <?php for($i=0; $i< $cc;  ): ?>
           
                        <?php
                            $j=0;
                        ?>
               
                        <div class="filter-col8 p-b-27 p-t-39"><!--filteredItems1-->
                <?php $__currentLoopData = $categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctgo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                    <?php if($j < 6): ?>
                        <?php
                            $j++;
                        ?>            
                        <ul>
                            <li class="p-b-6 " >
                            <?php if($ctgo->image !=null): ?> 
                                <img src="<?php echo asset('storage/categorie_image/'.$ctgo->image) ?>" class="p-b-4">
                            <?php endif; ?>
                                <a href="#" class="filter-link stext-106 trans-04"><?php echo e($ctgo->libelle); ?></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php for($f = 0; $f < $j; $f++): ?>
                    
                    <?php $categorie->shift($f);?>                
                  
                <?php endfor; ?>
               
                <?php
                    $cc-=$j;
                ?>
                                                </div>
            <?php endfor; ?>
                                            </div>
                                        </ul>
                                        
                            </li>
                            <li class="menu1">
                                    <a href="<?php echo e(route('emploi')); ?>">Emploi&nbsp&nbsp</a>
                                    <span >
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
                                <ul class="sub-menu " style="width: 575%;" >
                                    <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                        <div class="filter-col1  p-b-27">
                                            <div class="mtext-102 cl2 p-b-15" style="color: #ca2323;">
                                                Catégories
                                            </div>
                            
                                            <ul >
                                                        <li class="p-b-6 " v-for="(catego,cntt) in categoriesE" :key = 'cntt' v-if="cntt <count">

                                                            <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

        <a :href="'/emploi/search_categorie='+catego.id"  class="filter-link stext-106 trans-04">
                                                                    {{catego.libelle}}
                                                            </a>
                                                        </li>
                                                               
                                                    </ul >
                                                    <ul >
                                                <li class="p-b-6 " v-if="autreAnn === 1">

                                                   

                                                    <a href="/emploi/search_categorie=1" class="filter-link stext-106 trans-04">
                                                            Autre
                                                    </a>
                                                </li>
                                                       
                                            </ul >
                                        </div>
                                         <?php 
                   
                    for ($k = 0; $k < 6; $k++){
                            unset($categorieE[$k]);               
                    }
                    $cc=count($categorieE);
                   
            ?>                                 
            <?php for($i=0; $i< $cc;  ): ?>
           
                        <?php
                            $j=0;
                        ?>
               
                        <div class="filter-col8 p-b-27 p-t-39"><!--filteredItems1-->
                <?php $__currentLoopData = $categorieE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctgo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                    <?php if($j < 6): ?>
                        <?php
                            $j++;
                        ?>            
                        <ul>
                            <li class="p-b-6 " >
                            <?php if($ctgo->image !=null): ?> 
                                <img src="<?php echo asset('storage/categorie_image/'.$ctgo->image) ?>" class="p-b-4">
                            <?php endif; ?>
                                <a href="#" class="filter-link stext-106 trans-04"><?php echo e($ctgo->libelle); ?></a>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php for($f = 0; $f < $j; $f++): ?>
                    
                    <?php $categorieE->shift($f);?>                
                  
                <?php endfor; ?>
               
                <?php
                    $cc-=$j;
                ?>
                                                </div>
            <?php endfor; ?>
                                        
                                    </div>
                                </ul>
                            </li>
                            <li >
                                    <a href="<?php echo e(route('article')); ?>">Article</a>
                            </li>
                            <li >
                                    <a href="<?php echo e(route('apropos')); ?>">A Propos</a>
                            </li>
                            <li >
                                <a href="<?php echo e(route('contact')); ?>">Contact</a>
                            </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        </ul>                       
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header  flex-r-m ">
                        <?php if(auth()->guard()->guest()): ?>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        <?php else: ?>
                            <?php if(Auth::user()->number_confirm != null): ?>
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                <i class="zmdi zmdi-search"></i>
                            </div>
                            <?php else: ?>
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                                <i class="zmdi zmdi-search"></i>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 <?php echo $stripePanier ?>" onclick="connecterAvant()" >
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <?php else: ?>
                            <?php if(Auth::user()->number_confirm != null): ?>
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22   <?php echo $stripePanier ?>" >
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <?php else: ?>
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22   <?php echo $stripePanier ?>" onclick="Estconnecter()" >
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
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
                                <?php if(Auth::user()->number_confirm != null): ?>
                                <a class="dropdown-item" href="\confirmation">Mon Espace</a>
                                <?php elseif(Auth::user()->type_compte == 'c'): ?>
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
                <a href="<?php echo e(route('accueil')); ?>"><img src="<?php echo e(asset('images/icons/LogoFinal2.png')); ?>" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <?php if(auth()->guard()->guest()): ?>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22 <?php echo $stripePanier ?>" onclick="connecterAvant()" >
                            <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                <?php else: ?>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22   <?php echo $stripePanier ?>" onclick="Estconnecter()" >
                            <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                <?php endif; ?>

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
                                <?php if(Auth::user()->number_confirm != null): ?>
                                <a class="dropdown-item" href="\confirmation">Mon Espace</a>
                                <?php elseif(Auth::user()->type_compte == 'c'): ?>
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
                    <img src="<?php echo e(asset('images/menu.png')); ?>" alt="..." style="width: 60%;">
                </a>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            
                <div class="top-bar-mobile">
                    <div class="content-topbar flex-sb-m h-full container">
                        <div class="left-top-bar">
                            Soyez Heureux avec NOUS
                        </div>
                        <div class="right-top-bar flex-w h-full">
                          <a class="flex-c-m trans-04 p-lr-25">
                              <div id="google_translate_element" class="m-t-15"></div>
                          </a>
                                    
                        </div>

                    </div>
                </div>
            

             <ul class="main-menu-m">
                <li>
                    <a href="<?php echo e(route('accueil')); ?>" id="colorr">Accueil</a>
                    
                </li>

                <li>
                    <a href="<?php echo e(route('shop')); ?>"id="colorr">Shop</a>
                    <ul class="sub-menu-m">

                <?php $__currentLoopData = $categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctgo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                              
                        <li>
                            
                               <a href="index.html"><?php echo e($ctgo->libelle); ?></a>
                        </li>
                           
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
               
                                               
           
                        
                        <!--<li><a href="home-03.html">Homepage 3</a></li>-->
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="<?php echo e(route('emploi')); ?>" id="colorr">Emploi</a>
                    <ul class="sub-menu-m">
                        <li><a href="index.html">Homepage 1</a></li>
                        <li><a href="home-02.html">Homepage 2</a></li>
                        <li><a href="home-03.html">Homepage 3</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="<?php echo e(route('article')); ?>"id="colorr">Article</a>
                </li>

                <li>
                    <a href="<?php echo e(route('apropos')); ?> "id="colorr">A propos</a>
                </li>

                <li>
                    <a href="<?php echo e(route('contact')); ?>" id="colorr">Contact</a>
                </li>
            </ul>
        </div>

      <!-- Modal Search -->
      <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search" style="z-index: 11000;">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" action="/produit_Aemploi_article" method="get">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input  type="search" name="search" class="form-control" placeholder="Produit/Annonce Emploi/Article">
                    
                </form>
                
                
            </div>
        </div>

<!--Cart Connect--><!--**************************************************************************-->
    <div class="wrap-header-cart js-panel-connect" >
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
                        <a href="<?php echo e(route('accueil')); ?>" class="logo p-l-50" >
                            <img src="images/icons/LogoFinal2.png" alt="IMG-LOGO" />
                        </a>
                        <span class="splash-description">Please enter your user information.</span>
                    </div>
                    <div class="card-body">
                       
                        <form method="POST" :action="wayLogin()">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input class="form-control form-control-lg
                                <?php echo e($errors->has('email') || $errors->has('numTelephone') ? ' is-invalid' : ''); ?>" name="numTelephone" value="<?php echo e(old('numTelephone')); ?>" type="text" placeholder="Email ou Telephone"  id="numTelephone" v-on:keyup='Connect()'>
                                
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
                            <div class="form-group m-t--10 " v-if="hideSelect">
                                <span class="stext-109">Vous avez 2 compte avec ce "{{ eventss.value}}" :</span>
                                <select class="form-control form-control-lg <?php $__errorArgs = ['type_compte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stext-104 m-t-5" id="type_compte"  name="type_compte"   style="height: 45px" value="<?php echo e(old('type_compte')); ?>">

                                    <option value="0" disabled selected >Souhaitez vous connecter avec</option>
                                    <option v-for="typ in types" value="c" v-if="typ === 'c'">Compte Client</option>
                                    <option v-for="typ in types" value="v" v-if="typ === 'v'">Compte Vendeur</option>
                                    <option v-for="typ in types" value="e" v-if="typ === 'e'">Compte Employeur</option>
                                    <option v-for="typ in types" value="a" v-if="typ === 'a'">Compte Admin</option>

                                </select>

                                <?php $__errorArgs = ['type_compte'];
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
                            <div class=" custom-checkbox p-b-10">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label class="custom-control-label p-t-4 p-l-24 " for="remember">Remeber me</label>
                            </div>
                            <button type="submit" class="btn-lg btn-block bg10 cl0" >Connexion</button>
                        
                    </div>
                    <div class="card-footer" >
                        
                        <?php if(Route::has('register')): ?>
                        <div class="card-footer-item card-footer-item-bordered" >
                            <a href="<?php echo e(route('register')); ?>" style="color:rgb(122, 122, 122); margin-right: 2%;" lass="nav-link"><?php echo e(__('Creer un Compte')); ?></a>
                        </div>

                        <?php endif; ?>
                         
                        <?php if(Route::has('password.request')): ?>
                                    
                            <div class="card-footer-item card-footer-item-bordered" >
                                 <a href="<?php echo e(route('password.request')); ?>" style="color:rgb(122, 122, 122); margin-left: 10%;"><?php echo e(__('Mot de Passe Oublié')); ?></a>
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
    

    </header>

       
            <?php echo $__env->yieldContent('content'); ?>
        
    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32" style="margin-top:12%;">
        <div class="container">
            <div class="row">
                <div class="p-b-50" style="width: 8%;">
                   
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Type Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="<?php echo e(route('shop')); ?>" class="stext-107 cl7 hov-cl1 trans-04">
                                Shop
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="<?php echo e(route('emploi')); ?>" class="stext-107 cl7 hov-cl1 trans-04">
                                Emploi
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50 m-r-120">
                    <h4 class="stext-301 cl0 p-b-30">
                        Contactez nous
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        <?php if(auth()->guard()->guest()): ?>
                        Des questions, Quelque chose n'est pas bien? Faites-nous savoir sur 05-40-84-47-82, basmah.work_shop@gmail.com ou <a href="<?php echo e(route('contact')); ?>">contact</a>.
                        <?php else: ?>
                        <?php if(Auth::user()->number_confirm != null): ?>
                            Des questions, Quelque chose n'est pas bien? Faites-nous savoir sur 05-40-84-47-82, basmah.work_shop@gmail.com ou <a href="\confirmation">contact</a>.
                        <?php else: ?>
                            Des questions, Quelque chose n'est pas bien? Faites-nous savoir sur 05-40-84-47-82, basmah.work_shop@gmail.com ou <a href="<?php echo e(route('contact')); ?>">contact</a>.
                        <?php endif; ?>
                        <?php endif; ?>
                    </p>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Rejoignez-nous
                    </h4>
                    <p class="stext-107 cl7 size-201">
                        <?php if(auth()->guard()->guest()): ?>
                       Si vous n'avez pas un compte creé le <a href="<?php echo e(route('register')); ?>">ici</a>.<br>
                         Ou connecté à votre <a href='#' class="js-show-connect">compte</a>
                       <?php else: ?>
                         Si vous n'avez pas un compte creé le.<br>
                         Ou connecté à votre compte.
                       <?php endif; ?>
                      
                    </p>
                </div>
            </div>

            <div class="p-t-40">
               

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
   
    <?php echo $__env->yieldPushContent('javascript'); ?>
   <!--<script src="vendor/jquery/jquery-3.2.1.min.js"></script>--> 
   <script>
    
        window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               "url"      => url("/")  
          ]); ?>;
    

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
            categories: [],
            sousCategories: [],
            categoriesE: [],
            autreAnn:false,
            autreProd:false,
            categorieAnn: [],
            count: 6,
            //wayLogin: <?php echo e(json_encode(route('login'))); ?>,
         },
         methods:{
            getCategorieHome: function(){
                axios.get(window.Laravel.url+"/getcategoriehome")
                        .then(response => {
                           this.categories = response.data.categorie;
                           this.sousCategories = response.data.sousCatego;
                           this.categoriesE =  response.data.categorieE;
                           this.categorieAnn = response.data.autreProduit;
                           this.autreAnn = response.data.annonce1Var;
                           this.autreProd = response.data.produit1Var;


                        })
                        .catch(error =>{
                            console.log("errors",error)
                        })
            },
            wayLogin: function(){
                if(this.types.length == 0){
                    return "<?php echo e(route('login')); ?>";
                }
                else{
                     return "<?php echo e(route('authenticate')); ?>";
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
                                
                            }
                            else{
                                app3.hideSelect = false;

                            }
                            

                        })
                        .catch(error =>{
                            console.log("errors",error)
                        })
                        
                        
                     }, 10)
                
            },

         },
         mounted:function(){
            this.Connect();
            this.getCategorieHome();
         },
       
       })
       function connecterAvant(){
        
            Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
                          footer: '<form method="GET" action="<?php echo e(route("logoutregister")); ?>"><?php echo csrf_field(); ?><a href="<?php echo e(route("logoutregister")); ?>">Créer Compte</a></form>',
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
            axios.get(window.Laravel.url+'/estconnecter')
              .then(response => {
                    if(response.data.etat){
                        $('.js-panel-cart').addClass('show-header-cart');
                    }
                    else{
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
                          footer: '<form method="GET" action="<?php echo e(route("logoutregister")); ?>"><?php echo csrf_field(); ?><a href="<?php echo e(route("logoutregister")); ?>">Créer Compte</a></form>',
                          showCancelButton: true,
                          cancelButtonColor: '#d33',
                          confirmButtonColor: '#13c940',
                          confirmButtonText:
                            'Se Connecter',
                        }).then((result) => {
                            if (result.value){                          
                                axios.post(window.Laravel.url+'/logout')
                                .then(response => {
                                          window.location.href = '/accueil';
                                })
                                .catch(error => {console.log("error",error)})
                            }
                         
                        });
                    }
               })
              .catch(error => {
                  console.log('errors : '  , error);
            })            
            
       }

   </script> 

  

</script>

   <script type="text/javascript">

    
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
}
    </script>

    <script type="text/javascript" >
        (function(){var gtConstEvalStartTime = new Date();/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='440335.1449305758';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
    </script>
    
    <script src="<?php echo e(asset('vendor/animsition/js/animsition.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="<?php echo e(asset('vendor/daterangepicker/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick-custom.js')); ?>"></script>

    <script src="<?php echo e(asset('vendor/parallax100/parallax100.js')); ?>"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="<?php echo e(asset('vendor/isotope/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/sweetalert/sweetalert.min.js')); ?>"></script>
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
    <script src="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
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
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script >

        window.addEventListener("load",function() {
            var x;
            setTimeout(function () {
              x=document.getElementsByClassName('goog-te-combo')[0].value;

              if(x == ''){
                document.getElementById('html_id').style.marginTop = '0px';
              }
              else{
                document.getElementById('html_id').style.marginTop = '-40px';
              }
              document.getElementsByClassName('goog-te-combo')[0].onchange = function() {
                document.getElementById('html_id').style.marginTop = '-40px';
        }
            },10500);
        
  
      
    });

    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\BWS\resources\views/layouts/app.blade.php ENDPATH**/ ?>