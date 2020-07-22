<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <link rel="apple-touch-icon" sizes="76x76" href="assetsVendeur/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetsVendeur/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assetsVendeur/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assetsVendeur/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assetsVendeur/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assetsVendeur/vendor/css-hamburgers/hamburgers.min.css">
  <link href="assetsVendeur/fonts/font-awesome-4.7.0/css/font-awesome.min.css"  rel="stylesheet" >
  <link href="assetsVendeur/fonts/iconic/css/material-design-iconic-font.min.css" rel="stylesheet" />
  <link href="assetsVendeur/css/util.css" rel="stylesheet" />
  <link href="assetsVendeur/css/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assetsVendeur/fonts/linearicons-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>">
  <script src="<?php echo e(asset('jss/vue.js')); ?>"></script>
  <script src="<?php echo e(asset('jss/axios.min.js')); ?>"></script>
  <script src="<?php echo e(asset('jss/sweetalert2.js')); ?>"></script>

  <?php

        		$stripeProfil=$stripeProduit=$stripeCmdR=$stripeCmdT=$stripeStatistique='';
        		
        		$urlAcctuiel = Route::getCurrentRoute()->uri();
        		if($urlAcctuiel == 'statistiques'){
        			$stripeStatistique='active';
        		}
        		else if($urlAcctuiel == 'profilVendeur'){
        			$stripeProfil='active';
        		}
        		else if($urlAcctuiel == 'produitVendeur'){
        			$stripeProduit='active';
        		}
        		else if($urlAcctuiel == 'commandeRecuVendeur'){
        			$stripeCmdR='active';
        		}
        		else if($urlAcctuiel == 'commandeTraiterVendeur'){
        			$stripeCmdT='active';
        		}
  ?>
</head>

<body >

  <!-- Header -->
	<header id="app44">
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
					<a href="#" class="loggo">
						
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li >
								<a href="<?php echo e(route('accueil')); ?>">Accueil</a>
							</li>
							<li class="menu1">
                                    <a href="<?php echo e(route('shop')); ?>">Shop&nbsp&nbsp</a>
                                    <span >
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
									<ul class="sub-menu " >
                                            <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col8  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                        Catégories
                                                    </div>
                                                    <ul >
                                                        <li class="p-b-6 " v-for="(catego,cntt) in categories" :key = 'cntt' v-if="cntt <count">

                    <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

                                                         <a href="#" class="filter-link stext-106 trans-04">
                                                            {{catego.libelle}}
                                                         </a>
                                                        </li>
                                                       
                                                    </ul >
                                                    <ul >
                                                <li class="p-b-6 " v-if="autreProd === 0">

                                                   

                                                    <a href="<?php echo e(route('shop')); ?>" class="filter-link stext-106 trans-04">
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
								 <ul class="sub-menu " style="width: 990%;" >
                                    <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col8  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                Catégories
                                            </div>
                            
                                             <ul >
                                                <li class="p-b-6 " v-for="(catego,cntt) in categoriesE" :key = 'cntt' v-if="cntt <count">

                    <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

                                                    <a href="#" class="filter-link stext-106 trans-04">
                                                            {{catego.libelle}}
                                                    </a>
                                                </li>
                                                       
                                            </ul >
                                            <ul >
                                                <li class="p-b-6 " v-if="autreAnn === 0">

                                                   

                                                    <a href="<?php echo e(route('emploi')); ?>" class="filter-link stext-106 trans-04">
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
							<li>
									<a href="<?php echo e(route('article')); ?>">Article</a>
							</li>
							<li>
									<a href="<?php echo e(route('apropos')); ?>">A Propos</a>
							</li>
							<li>
								<a href="<?php echo e(route('contact')); ?>">Contact</a>
							</li>
						</ul>						
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header  flex-r-m " style="margin-left: 28%">
						<div class="icon-header-item cl2 hov-cl1 trans-04  p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" onclick="connecterAvant()">
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
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton" style="margin-right: 60px;">
                                <div href="<?php echo e(route('statistiquesVendeur')); ?>">
                              		<a class="dropdown-item" href="<?php echo e(route('statistiquesVendeur')); ?>"><b><?php echo e(__('Mon Espace')); ?></b></a>
                              	</div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <b><?php echo e(__('Logout')); ?></b>
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
				<a href="<?php echo e(route('accueil')); ?>"><img src="images/icons/LogoFinal2.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" onclick="connecterAvant()">
							<i class="zmdi zmdi-shopping-cart"></i>
						
			    </div>

				<div class="dropdown">
                              <button class="  dis-block dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-account"></i>
                              </button>
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                              	<div href="<?php echo e(route('statistiquesVendeur')); ?>">
                              		<a class="dropdown-item" href="<?php echo e(route('statistiquesVendeur')); ?>" ><?php echo e(__('Mon Espace')); ?></a>
                              	</div>
                                
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
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hov-cl1 hamburger hamburger--squeeze" >
				<a class="hamburger-box" >
					<img src="assetsVendeur/img/menu.png" alt="..." style="width: 60%;">
        </a>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
            <!-- Navbar -->
          
			
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
					<a href="<?php echo e(route('accueil')); ?>" id="colorr">Accueil</a>
					
				</li>

				<li>
					<a href="<?php echo e(route('shop')); ?>" id="colorr">Shop</a>
					
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
					<a href="<?php echo e(route('article')); ?>" id="colorr">Article</a>
				</li>

				<li>
					<a href="<?php echo e(route('apropos')); ?>" id="colorr">A propos</a>
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

                <form class="wrap-search-header flex-w p-l-15" action="/abest" method="get">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input  type="search" name="search" class="form-control" placeholder="Search...">
                    
                </form>
                
                
            </div>
        </div>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart" style="z-index: 13000; ">
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

  <div class="wrapper">
    <div class="sidebarr" data-color="griss" style="z-index: 10000;">
      
      <div class="logo m-t-15">
        <img src ="assetsVendeur/img/logo1.png" alt="...">
      </div>
      <div class="sidebar-wrapper " id="sidebar-wrapper">
        <ul class="nav">
        	
           <li class="<?php echo $stripeStatistique ?>">
            <a href="<?php echo e(route('statistiquesVendeur')); ?>">
              <i class="now-ui-icons business_chart-bar-32" id="y"></i>
              <div class="m-t-5" id="x">Statistique</div>
            </a>
          </li>
          <li class="<?php echo $stripeProfil ?>">
            <a href="<?php echo e(route('profilVendeur')); ?>">
              <i class="now-ui-icons users_single-02" id="y"></i>
              <div class="m-t-5" id="x">Profil</div>
            </a>
          </li>
          <li class="<?php echo $stripeProduit ?>">
             <a href="<?php echo e(route('produitVendeur')); ?>">
              <i class="now-ui-icons shopping_shop" id="y"></i>
              <div class="m-t-5" id="x">produits</div>
            </a>
          </li>
          <li class="<?php echo $stripeCmdR ?>">
            <a href="<?php echo e(route('commandeRecuVendeur')); ?>">
              <i class="now-ui-icons ui-1_bell-53" id="y"></i>
              <div class="m-t-5" id="x">Commandes  Reçus</div>
            </a>
          </li>
          <li class="<?php echo $stripeCmdT ?>">
            <a href="<?php echo e(route('commandeTraiterVendeur')); ?>">
              <i class="now-ui-icons files_single-copy-04" id="y"></i>
              <div class="m-t-5" id="x">Commandes traitées</div>
            </a>
          </li>
          
        </ul>
      </div>
    </div>

	    <div class="main-panel" id="main-panel">
	    	
		 	<?php echo $__env->yieldContent('content'); ?>
		 	<?php echo $__env->yieldPushContent('javascripts'); ?>
		<div>
  <footer class="bg3 p-t-75 p-b-32 ">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 p-b-50 p-l-30">
          
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

        <div class="col-sm-6 col-lg-3 p-b-50">
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

        <p class="stext-107 cl6 txt-center m-b-13">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

        </p>
      </div>
    </div>
  </footer>

 </div>

		</div>
	</div>

	



 
<script>
	

       var app44 = new Vue({
         el : "#app44",
         data:{
            categories: [],
            sousCategories: [],
            categoriesE: [],
            count: 6,
            autreAnn:false,
            autreProd:false,
            categorieAnn: [],
            //wayLogin: <?php echo e(json_encode(route('login'))); ?>,
         },
         methods:{

            getCategorieHome: function(){
                axios.get(window.Laravel.url+"/getcategoriehome")
                        .then(response => {
                           app44.categories = response.data.categorie;
                           app44.sousCategories = response.data.sousCatego;
                           app44.categorieAnn = response.data.autreProduit;
                           app44.autreAnn = response.data.autre;
                           app44.autreProd = response.data.another;

                           this.categoriesE =  response.data.categorieE;
                        })
                        .catch(error =>{
                            console.log("errors",error)
                        })
            },
         },
         mounted:function(){
            this.getCategorieHome();
         },
       })
  	function connecterAvant(){
        
            Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
                          footer: '<form method="GET" action="<?php echo e(route("logoutregister")); ?>"><?php echo csrf_field(); ?><a style=" color: #007bff;" href="<?php echo e(route("logoutregister")); ?>">Créer Compte</a></form>',
                          showCancelButton: true,
                          cancelButtonColor: '#d33',
                          confirmButtonColor: '#13c940',
                          confirmButtonText:
                            'Se Connecter',
            }).then((result) => {
                if (result.value){
                    axios.post('http://localhost:8000/logout')
                    .then(response => {
                              window.location.href = '/accueil';
                    })
                    .catch(error => {console.log("error",error)})
                	}	
                             
            });
       }
  </script>
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="assetsVendeur/js/animsition.min.js"></script>
  <script src="assetsVendeur/js/main.js"></script>
  <script src="assetsVendeur/js/core/jquery.min.js"></script>
  <script src="assetsVendeur/js/core/popper.min.js"></script>
  <script src="assetsVendeur/js/core/bootstrap.min.js"></script>
  <script src="assetsVendeur/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="assetsVendeur/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assetsVendeur/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assetsVendeur/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assetsVendeur/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      initDashboardPageCharts();

    });
  </script>
    <script src="assetsVendeur/vendor/animsition/js/animsition.min.js"></script>
    <script src="assetsVendeur/vendor/bootstrap/js/popper.js"></script>
    <script src="assetsVendeur/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
   </script>
    <script src="assetsVendeur/vendor/daterangepicker/moment.min.js"></script>
    <script src="assetsVendeur/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="assetsVendeur/vendor/slick/slick.min.js"></script>

    <script src="assetsVendeur/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="assetsVendeur/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="assetsVendeur/vendor/sweetalert/sweetalert.min.js"></script>
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
    <script src="assetsVendeur/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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


</body>
</html><?php /**PATH C:\xampp\htdocs\BWS\resources\views/layouts/template_vendeur.blade.php ENDPATH**/ ?>