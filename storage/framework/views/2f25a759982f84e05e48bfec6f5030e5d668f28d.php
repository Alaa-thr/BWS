<!DOCTYPE html>
<html lang="fr" id='html_id'>

<head>
  <meta charset="utf-8"/>
  <link rel="apple-touch-icon" sizes="76x76" href="assetsEmployeur/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo e(asset('images/icons/title_icon.png')); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assetsEmployeur/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assetsEmployeur/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assetsEmployeur/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assetsEmployeur/vendor/css-hamburgers/hamburgers.min.css">
  <link href="assetsEmployeur/fonts/font-awesome-4.7.0/css/font-awesome.min.css"  rel="stylesheet" >
  <link href="assetsEmployeur/fonts/iconic/css/material-design-iconic-font.min.css" rel="stylesheet" />
  <link href="assetsEmployeur/css/util.css" rel="stylesheet" />
  <link href="assetsEmployeur/css/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assetsEmployeur/fonts/linearicons-v1.0.0/icon-font.min.css">
  <script src="<?php echo e(asset('jss/vue.js')); ?>"></script>
  <script src="<?php echo e(asset('jss/axios.min.js')); ?>"></script>
  <script src="<?php echo e(asset('jss/sweetalert2.js')); ?>"></script>
  
  <?php

           $stripeProfil=$stripeAnnonce=$stripeDmndR=$stripeDmndT='';
                
           $urlAcctuiel = Route::getCurrentRoute()->uri();
           if($urlAcctuiel == 'profilEmployeur'){
               $stripeProfil='active';
           }
           else if($urlAcctuiel == 'annoncesemploi'){
               $stripeAnnonce='active';
           }
           else if($urlAcctuiel == 'demandeEmploiRecu'){
               $stripeDmndR='active';
           }
           else if($urlAcctuiel == 'demandeEmploiTraite'){
               $stripeDmndT='active';
           }

	?>
</head>

<body >

  <!-- Header -->
	<header id="app66">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
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
					<a href="#" class="loggo">
						
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
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
								<ul class="sub-menu " style="width: 990%;" >
                                    <div class="flex-w bg6 w-full p-lr-30 p-t-27 p-lr-15-sm">
                                                <div class="filter-col8  p-b-27">
                                            
                                                    <div class="mtext-102 cl2 p-b-15 cl13">
                                                Catégories
                                            </div>
                            
                                             <ul >
                                                <li class="p-b-6 " v-for="(catego,cntt) in categoriesE" :key = 'cntt' v-if="cntt <count">

                                                    <img v-if="catego.image != null" :src='"/storage/categorie_image/"+catego.image' class="p-b-4">

              <a :href="'/emploi/search_categorie='+catego.id"class="filter-link stext-106 trans-04">
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
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route('profilEmployeur')); ?>"><b>Mon Espace</b></a>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                           <b> <?php echo e(__('Logout')); ?> </b>
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
                              	<div href="<?php echo e(route('profilEmployeur')); ?>">
                              		<a class="dropdown-item" href="<?php echo e(route('profilEmployeur')); ?>" ><?php echo e(__('Mon Espace')); ?></a>
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
					<img src="assetsEmployeur/img/menu.png" alt="..." style="width: 60%;">
        </a>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
            <!-- Navbar -->
          
			
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

                <form class="wrap-search-header flex-w p-l-15" action="/produit_Aemploi_article" method="get">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input  type="search" name="search" class="form-control" placeholder="Produit/Annonce Emploi/Article">
                    
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
        <img src ="assetsEmployeur/img/logo1.png" alt="...">
      </div>
      <div class="sidebar-wrapper " id="sidebar-wrapper">
        <ul class="nav">
        	 
          <li class="<?php echo $stripeProfil ?>">
            <a  href="<?php echo e(route('profilEmployeur')); ?>">
              <i class="now-ui-icons users_single-02" id="y"></i>
              <div class="m-t-5" id="x">Profil</div>
            </a>
          </li>
          <li class="<?php echo $stripeAnnonce ?>">
            <a href="<?php echo e(route('annoncesemploi')); ?>">
              <i class="now-ui-icons business_briefcase-24" id="y"></i>
              <div class="m-t-5" id="x">Annonces d'emplois</div>
            </a>
          </li>
          <li class="<?php echo $stripeDmndR ?>">
            <a href="<?php echo e(route('demandeEmploiRecu')); ?>">
              <i class="now-ui-icons ui-1_bell-53" id="y"></i>
              <div class="m-t-5" id="x">Demandes d'emplois Reçus</div>
            </a>
          </li>
          <li class="<?php echo $stripeDmndT ?>">
            <a href="<?php echo e(route('demandeEmploiTraite')); ?>">
              <i class="now-ui-icons files_single-copy-04" id="y"></i>
              <div class="m-t-5" id="x">demandes traitées</div>
            </a>
          </li>
        </ul>
      </div>
    </div>


	    <div class="main-panel" id="main-panel">
	    	
		 	<?php echo $__env->yieldContent('content'); ?>
			<div>
  <footer class="bg3 p-t-75 p-b-32" style="margin-top:12%;">
        <div class="container">
            <div class="row">
                <div class="p-b-50" style="width: 15%;">
                   
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30 p-l-20">
                        Type Categories
                    </h4>

                    <ul>
                        <li class="p-b-10 p-l-20">
                            <a href="<?php echo e(route('shop')); ?>" class="stext-107 cl7 hov-cl1 trans-04">
                                Shop
                            </a>
                        </li>

                        <li class="p-b-10 p-l-20">
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
                    <ul>
                      <li class="stext-107 cl7 size-201">Des questions, Quelque chose n'est pas bien? Faites-nous savoir sur 05-40-84-47-82, basmah.work_shop@gmail.com ou <a href="<?php echo e(route('contact')); ?>" style="color: #148bff;">contact</a>.
                        
                      </li>
                    </ul>
                   
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Rejoignez-nous
                    </h4>
                    <ul>
                      <li class="stext-107 cl7 ">
                        Si vous n'avez pas un compte creé le.<br>
                         Ou connecté à votre compte.
                      </li>
                    </ul>
                    
                </div>
            </div>

            <div class="p-t-25 p-b-15">
               

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" style="color: #148bff;">Basmah.ws</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </footer>

 </div>

		</div>
	</div>

	
  <?php echo $__env->yieldPushContent('javascripts'); ?>
  <script>
  	 var app66 = new Vue({
         el : "#app66",
         data:{
            
            categories: [],
            sousCategories: [],
            categoriesE: [],
            count: 6,
            autreAnn:false,
            autreProd:false,
            categorieAnn: [],
         },
         methods:{

            getCategorieHome: function(){
                axios.get(window.Laravel.url+"/getcategoriehome")
                        .then(response => {
                           app66.categories = response.data.categorie;
                           app66.sousCategories = response.data.sousCatego;
                           app66.categorieAnn = response.data.autreProduit;
                           app66.autreAnn = response.data.annonce1Var;
                           app66.autreProd = response.data.produit1Var;

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
  <script src="assetsEmployeur/js/jquery-3.2.1.min.js"></script>
  <script src="assetsEmployeur/js/animsition.min.js"></script>
  <script src="assetsEmployeur/js/main.js"></script>
  <script src="assetsEmployeur/js/core/jquery.min.js"></script>
  <script src="assetsEmployeur/js/core/popper.min.js"></script>
  <script src="assetsEmployeur/js/core/bootstrap.min.js"></script>
  <script src="assetsEmployeur/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
  </script>
  <!-- Chart JS -->
  <script src="assetsEmployeur/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assetsEmployeur/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assetsEmployeur/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assetsEmployeur/demo/demo.js"></script>
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
</html><?php /**PATH C:\xampp\htdocs\BWS\resources\views/layouts/template_employeur.blade.php ENDPATH**/ ?>