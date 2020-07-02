@extends('layouts.template_visiteur')
@section('content')

	
	<head>
		<title>{{ ( 'Shops') }}</title>
	</head>


	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shop
			</span>
		</div>
	</div>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col5 p-r-10 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col7 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col6 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<div class="row isotope-grid" id="app1">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit in produits" >
					
					<div class="block2">
						<div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
							
							<img v-if="imgP.produit_id === produit.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

							<a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit)">
                                Quick View
                            </a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									@{{produit.Libellé}}
								</a>

								<span class="stext-105 cl3">
									@{{produit.prix}}DA
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="AjoutAuFavoris(produit.id)">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
					<!-- Modal1 -->
			<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" >
			        <div class="overlay-modal1" v-on:click="CancelArticle()" ></div>

			        <div class="container">
			            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
			                <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()" >
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
			                                @{{detaillproduit.Libellé}}
			                            </h4>

			                            <span class="mtext-106 cl2">
			                                @{{detaillproduit.prix}}DA
			                            </span>

			                            <p class="stext-102 cl3 p-t-23">
			                                @{{detaillproduit.description}}.
			                            </p>
			                            <p class="stext-102 cl3 p-t-23 " >
			                            	<span :data-toggle="!!detaillproduit.Nom ? 'tooltip' : false" data-html="true" :title="detaillproduit.Nom " >
			                               Vendeur&nbsp:<b>&nbsp&nbsp@{{detaillproduit.Nom}} &nbsp@{{detaillproduit.Prenom}}</b>.</span>
			                           		
			                            </p>
			                            <!--  -->
			                            <div class="p-t-33">
			                                <div v-show="tailleExiste" class="flex-w flex-r-m p-b-10">
			                                    <div class="size-203 flex-c-m respon6 p-b-10">
			                                        Taille
			                                    </div>

			                                    <div class="size-204 respon6-next">
			                                        <div class="rs1-select2 bor8 bg0" :class="{'is-invalid' : message.taille}">
			                                            <select class="js-select2" name="t" onchange="selectTaille(this.options[this.selectedIndex].value)">
			                                                <option value="0" disabled selected>Choisir la taille</option>
			                                                <option v-for="taille in tailles" v-if="taille.produit_id  === detaillproduit.id" :value="taille.nom">@{{taille.nom}}</option>
			                                            </select>
			                                                                                 
			                                            <div class="dropDownSelect2"></div>
			                                        </div>
			                                        <span class=" cl13" v-if="message.taille" v-text="message.taille[0]"></span>
			                                    </div>
			                                    
			                                </div>

			                                <div class="flex-w flex-r-m p-b-10">
			                                    <div class="size-203 flex-c-m respon6 p-b-10">
			                                        Couleur
			                                    </div>

			                                    <div class="size-204 respon6-next">
			                                        <div class="rs1-select2 bor8 bg0"  :class="{'is-invalid' : message.couleur_id}">
			                                            <select class="js-select2" name="c" onchange="selectColor(this.options[this.selectedIndex].value)">
			                                                <option value="0" disabled selected="true">Choisir la couleur</option>
			                                                <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === detaillproduit.id">@{{color.nom}}</option>
			                                            </select>
			                                            <div class="dropDownSelect2"></div>
			                                        </div>
			                                        <span class=" cl13" v-if="message.couleur_id" v-text="message.couleur_id[0]"></span>
			                                    </div>
			                                </div>

			                                <!--  -->
			                            
			                                <div class="flex-w flex-r-m p-b-10">
			                                    <div class="size-203 flex-c-m respon6 p-b-10">
			                                        Type Livraison
			                                    </div>

			                                    <div class="size-204 respon6-next">
			                                        <div class="rs1-select2 bor8 bg0" :class="{'is-invalid' : message.type_livraison}">
			                                            <select  class="js-select2" name="TL" onchange="selectLivraisen(this.options[this.selectedIndex].value)">
			                                                <option value="0" selected disabled>Choisir le type de livraison</option>
			                                                
			                                                <option v-for="typeLivraison in typeLivraisons" value="vc" v-if="typeLivraison.vendeur_id === detaillproduit.vendeur_id && typeLivraison.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                                <option v-for="typeLivraison in typeLivraisons" value="cv" v-if="typeLivraison.vendeur_id === detaillproduit.vendeur_id && typeLivraison.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                                <option v-for="typeLivraison in typeLivraisons" value="dhl" v-if="typeLivraison.vendeur_id === detaillproduit.vendeur_id && typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
			                                            </select>
			                                            <div class="dropDownSelect2"></div>
			                                        </div>
			                                        <span class=" cl13" v-if="message.type_livraison" v-text="message.type_livraison[0]"></span>
			                                    </div>
			                                </div>
			    
			                                <div class="flex-w flex-r-m p-b-10">
			                                    <div class="size-204 flex-w flex-m respon6-next">
			                                        <div class="wrap-num-product flex-w m-r-20 m-tb-15" :class="{'is-invalid' : message.qte}">
			                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
			                                                <i class="fs-16 zmdi zmdi-minus"></i>
			                                            </div>

			                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="0" placeholder="0">

			                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
			                                                <i class="fs-16 zmdi zmdi-plus"></i>
			                                            </div>
			                                        </div >
			                                        <span class="m-b-10 cl13" v-if="message.qte" v-text="message.qte[0]" style="margin-top: -10px"></span>
													<div class="flex-t">
				                                        <button class="flex-c-m m-r-20 stext-102 cl0 size-102 bg11 bor1 p-lr-15 trans-04" v-on:click="addPanier()">
				                                            Ajouter au panier
				                                        </button>
				                                        <button class="flex-c-m stext-102 cl0 size-102 bg10 bor1 p-lr-15 trans-04" v-on:click="CancelArticle()" >
				                                            Annuler
				                                        </button>
			                                        </div>
			                                    </div>
			                                </div>  
			                            </div>
			                            

			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
    		</div>
				</div>
		
   
				
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>

	

	
@endsection
@push('javascripts')



<script>
	window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               'produit'        => $produit,
               'ImageP'         => $ImageP,
               'color'         => $color,
               'taille'         => $taille,
               'typeLivraison'         => $typeLivraison,
               "url"      => url("/")  
    ]) !!};

	 var app1 = new Vue({
      el: '#app1',
      data:{
      	msg: 'welcome',
      	produits: [],
      	imagesproduit:[],
      	colors: [],
      	typeLivraisons: [],
      	detaillproduit: [],
      	tailles: [],
      	ajoutPanier: {
      		vendeur_id: 0,
      		produit_id: 0,
      		couleur_id: '',
      		qte: null,
      		type_livraison: '',
      		taille: '',
      		prix: 0,
      		tailExst : 0,

      	},
      	tailleExiste: false,
      	message: {},
      	hideModel: false,

      },
      methods:{
      	CancelArticle(){
      		$('.js-modal1').removeClass('show-modal1');
      		this.ajoutPanier= {
			      		vendeur_id: 0,
			      		produit_id: 0,
			      		couleur_id: '',
			      		qte: null,
			      		type_livraison: '',
			      		taille: '',
			      		prix: 0,
			      		tailExst : 0,

			      	};
			this.message= {};
			 	
      	},
      	addPanier: function(){
      		axios.post(window.Laravel.url+'/addpanier',this.ajoutPanier)
              .then(response => {
              	if(response.data.etat && !response.data.produitExister){
              		Swal.fire(
					  "L'ajout est fait avec success!",
					  'Votre produit a bien ajouter a votre panier.',
					  'success'
					);
              		$('.js-modal1').removeClass('show-modal1');
              		this.ajoutPanier= {
			      		vendeur_id: 0,
			      		produit_id: 0,
			      		couleur_id: '',
			      		qte: null,
			      		type_livraison: '',
			      		taille: '',
			      		prix: 0,
			      		tailExst : 0,

			      	};
			      	this.message= {};
			      	document.getElementByname("t").value = 0;
			      	document.getElementByname("c").value = 0;
			      	document.getElementByname("TL").value = 0;			      	
              	}
              	else if(response.data.etat && response.data.produitExister){
              		$('.js-modal1').removeClass('show-modal1');
              		this.ajoutPanier= {
				      		vendeur_id: 0,
				      		produit_id: 0,
				      		couleur_id: '',
				      		qte: null,
				      		type_livraison: '',
				      		taille: '',
				      		prix: 0,
				      		tailExst : 0,

				      	};
				    this.message= {};
              		Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Le produit est dija existé dans votre panier.',		  
					});
              	}
                else if(!response.data.etat && response.data.cnncte){
                	$('.js-modal1').removeClass('show-modal1');
                	Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
					  footer: '<form method="GET" action="{{ route("logoutregister") }}">@csrf<a href="{{ route("logoutregister") }}">Créer Compte</a></form>',
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
            	else if(!response.data.etat && !response.data.cnncte){
            			$('.js-modal1').removeClass('show-modal1');
            			Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
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
               })
              .catch(error => {
              	
                  this.message = error.response.data.errors;
                    console.log('errors :' , this.message);

                
             })
      	},
      	detaillProduit:function(produit){
      		
      		var position = this.produits.indexOf(produit);
      		var i = 0;
      		this.ajoutPanier.vendeur_id = produit.vendeur_id;
      		this.ajoutPanier.prix = produit.prix;
      		this.detaillproduit = this.produits[position];
      		this.detaillproduit.Nom = this.detaillproduit.Nom.toUpperCase();
      		this.detaillproduit.Prenom = this.detaillproduit.Prenom.toUpperCase();
      		this.ajoutPanier.produit_id = this.detaillproduit.id;
      		this.tailles.forEach(key => {
      			if(this.detaillproduit.id == key.produit_id ){
      					i++;
      			}
      		});
      		if(i != 0){
      		    this.tailleExiste = true;
      		    app1.ajoutPanier.tailExst = 1;
      		}
      		else{
      			this.tailleExiste = false;
      			app1.ajoutPanier.tailExst = 0;
      		}
      	},
      	 getProduit: function(){
            axios.get(window.Laravel.url+'/shop')
              .then(response => {
                this.produits = window.Laravel.produit;
                this.imagesproduit = window.Laravel.ImageP;
                this.colors = window.Laravel.color;
                this.typeLivraisons = window.Laravel.typeLivraison;
                this.tailles = window.Laravel.taille;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          AjoutAuFavoris: function(id){//jebna l id ta3 l produit bach nzaftouh l la method AjoutAuFavoris di ra f controller clientController
          	axios.post(window.Laravel.url+'/ajoutaufavoris/'+id)
              .then(response => {
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          }

      },
      created:function(){
      	this.getProduit();
      }
  });
  function selectTaille(taille){
  	app1.ajoutPanier.taille = taille;
  	     		
  }
  function selectColor(color){
  	app1.ajoutPanier.couleur_id = color;     		
  }
  function selectLivraisen(livraisen){
  	app1.ajoutPanier.type_livraison = livraisen;     		
  }
  function seletQte(qte){
  	app1.ajoutPanier.qte = qte; 
  }


</script>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
/*function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("adrrsse"),mapProp);
}*/


</script>

@endpush