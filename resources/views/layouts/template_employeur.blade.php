<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <link rel="apple-touch-icon" sizes="76x76" href="assetsEmployeur/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetsEmployeur/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
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
  <?php

           $stripeProfil=$stripeAnnonce=$stripeDmndR=$stripeDmndT='';
                
           $urlAcctuiel = Route::getCurrentRoute()->uri();
           if($urlAcctuiel == 'profilEmployeur'){
               $stripeProfil='active';
           }
           else if($urlAcctuiel == 'annonceEmploi'){
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
					<a href="#" class="loggo">
						
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
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
									<a href="{{route('article')}}">Article</a>
							</li>
							<li>
									<a href="{{route('apropos')}}">A Propos</a>
							</li>
							<li>
								<a href="{{route('contact')}}">Contact</a>
							</li>
						</ul>						
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header  flex-r-m " style="margin-left: 28%">
						<div class="icon-header-item cl2 hov-cl1 trans-04  p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart" >
							<i class="zmdi zmdi-shopping-cart"></i>
						
						</div>
							
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
                                <a class="dropdown-item" href="#"><b>Profil</b></a>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                           <b> {{ __('Logout') }} </b>
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
				<a href="{{route('accueil')}}"><img src="images/icons/LogoFinal2.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22  js-show-cart" >
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<div class="dropdown">
                              <button class="  dis-block dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-22" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-account"></i>
                              </button>
                              
                              <div class="dropdown-menu m-r-35" aria-labelledby="dropdownMenuButton">
                              	<div href="{{ route('profilVendeur') }}">
                              		<a class="dropdown-item" href="{{ route('profilVendeur') }}" >{{ __('Profil') }}</a>
                              	</div>
                                
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
					<a href="{{route('shop')}}" id="colorr">Shop</a>
					
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
					<a href="{{route('article')}}" id="colorr">Article</a>
				</li>

				<li>
					<a href="{{route('apropos')}}" id="colorr">A propos</a>
				</li>

				<li>
					<a href="{{route('contact')}}" id="colorr">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search" style="z-index: 11000;">
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
            <a  href="{{route('profilEmployeur')}}">
              <i class="now-ui-icons users_single-02" id="y"></i>
              <div class="m-t-5" id="x">Profil</div>
            </a>
          </li>
          <li class="<?php echo $stripeAnnonce ?>">
            <a href="{{route('annonceEmploi')}}">
              <i class="now-ui-icons business_briefcase-24" id="y"></i>
              <div class="m-t-5" id="x">Annonces d'emplois</div>
            </a>
          </li>
          <li class="<?php echo $stripeDmndR ?>">
            <a href="{{route('demandeEmploiRecu')}}">
              <i class="now-ui-icons ui-1_bell-53" id="y"></i>
              <div class="m-t-5" id="x">Demandes d'emplois Reçus</div>
            </a>
          </li>
          <li class="<?php echo $stripeDmndT ?>">
            <a href="{{route('demandeEmploiTraite')}}">
              <i class="now-ui-icons files_single-copy-04" id="y"></i>
              <div class="m-t-5" id="x">demandes traités</div>
            </a>
          </li>
        </ul>
      </div>
    </div>


	    <div class="main-panel" id="main-panel">
	    	
		 	@yield('content')
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

	
  @stack('javascripts')
  
  <script src="assetsEmployeur/js/jquery-3.2.1.min.js"></script>
  <script src="assetsEmployeur/js/animsition.min.js"></script>
  <script src="assetsEmployeur/js/main.js"></script>
  <script src="assetsEmployeur/js/core/jquery.min.js"></script>
  <script src="assetsEmployeur/js/core/popper.min.js"></script>
  <script src="assetsEmployeur/js/core/bootstrap.min.js"></script>
  <script src="assetsEmployeur/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assetsEmployeur/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assetsEmployeur/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assetsEmployeur/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assetsEmployeur/demo/demo.js"></script>

</body>
</html>