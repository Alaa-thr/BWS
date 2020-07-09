@extends('layouts.template_visiteur')
@section('content')

	
	<head>
		<title>{{ ( 'Emplois') }}</title>
	</head>
	 <!-- Cart -->
	 <div class="wrap-header-cart js-panel-cart" style="z-index: 11000; ">
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
            
            <div class="header-cart-content flex-w js-pscroll" id="app11" >
                <ul class="header-cart-wrapitem w-full"  >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier" >
                        <div class="header-cart-item-img" @click="deleteProduitPanier(command)" >
                        	<img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT"  style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoris" v-if="fv.id === command.produit_id" >
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            @{{fv.Libellé}}
                            </a>

                            <span class="header-cart-item-info">
                            @{{command.qte}} x  @{{fv.prix}} DA
                            </span>
                        </div>
                    </li>
                </ul>
                
                <div class="w-full" >
                    
                <div class="header-cart-total w-full p-tb-40" v-for="p in prix">
                        Totale: @{{p.prixTo}} DA
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{route('panier')}}" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{route('panier')}}" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    </div>
<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Emploi
			</span>
		</div>
	</div>

	<!-- Annonce d'emploi -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container" id="app">
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
		        	<div class="row m-b-10"  v-for="emp in emplois" style="display: inline-flex;  width: 420px; height: 160px;">
						<div v-if="emp.image!=null" class="col-md-4 block2 block2-pic hov-img0" style="margin-left: 30px;">
							<img   :src="'storage/annonces_image/'+ emp.image" style="height: 120px; width: 350px; ">
							<a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(emp.id)" style="cursor: pointer;">
								Quick View
							</a>
						</div>

						<div v-if="emp.image!=null" class="col-md-6 js-show-modal1"  v-on:click="AfficheInfo(emp.id)" style="cursor: pointer;">
							<h5 class="title" style="color: red;">
								<b>@{{emp.libellé}}</b>
							</h5><br>
							<div class="description" style="margin-top: -10px; font-size: 14px;">
								@{{ MoitieDescription(emp.discription,45, '...') }}
							</div>
							<div class="description" style="margin-top: 10px;">
								<b>Nombre de condidat : @{{emp.nombre_condidat}}</b>
							</div> 
							<div class="block2-txt-child2 ">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="AnnonceAuFavoris(emp.id)">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" style="margin-top: 20px; margin-left: 150px;">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON" style="margin-top: 20px; margin-left: 150px;">
								</a>
							</div>
						</div>
						<p v-if="emp.image==null" style="height: 60px"></p>
						<div v-if="emp.image==null" class="col-md-10 m-l-30 js-show-modal1" v-on:click="AfficheInfo(emp.id)" style="cursor: pointer;">
							<h5 class="title" style="color: red;" >
								<b>@{{emp.libellé}}</b>
							</h5><br>
							<div class="description" style=" font-size: 14px;">
								@{{ MoitieDescription(emp.discription,100, '...') }}
							</div>
							<div class="description" style="">
								<b>Nombre de condidat : @{{emp.nombre_condidat}}</b>
							</div> 
							<div class="block2-txt-child2" style="float: right;">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="AnnonceAuFavoris(emp.id)">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" style="margin-top: 20px;">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON" style="margin-top: 20px; ">
								</a>
							</div>
						</div>
						<div style="border-left: 2px solid #000; display: inline-block;height: 120px; margin: 0 20px; margin-left: 12px;">
                       </div>
						
							
			   </div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More

				</a>
			</div>
			<div style="margin-left: 900px;"> 
                   {{$emploi->links()}}<!-- pour afficher la pagination -->
             </div>
		</div>
	</div>

	<div class="wrap-modal1 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-if="hideModel">
      <div class="overlay-modal1 " @click='CancelArticle'></div>
  		<div class="container">
			<div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent" >
				<button class="how-pos3 hov3 trans-04 " @click='CancelArticle'>
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="p-b-30 p-l-40">
					<h4 class="ltext-102  cl2">
				           COMMANDE DE   

					</h4>
				</div>

				<div class="row" v-for="empp in emplois2">
					<div class="col-md-6 col-lg-6  m-l-50">
						<section class=" col-md-12  " > 
				           <div class="row">
				            <div class="col-md-10">
				              <div class="p-b-30 " style="margin-top: 25px;" >
				                <h3 class=" mtext-105 cl13" >
				                   Informations sur L'annonce
				                </h3>
				              </div>
				            </div>
				          </div>
				          <div class="row" v-if="empp.image!=null">
				            <div class="col-md-10" >
				              <img  :src="'storage/annonces_image/'+ empp.image" style="width: 300px; height: 190px; " />
				              
				            </div> 
				          </div>
				          <div class="row">
				            <div class="col-md-4">
				              <div class="title" style="color: red; margin-top: 30px;" >
				                  <h4><b>@{{empp.libellé }}</b></h4><br>
				              </div>
				            </div>
				          </div>
				          <div class="row" style=" margin-top: -15px;">
				            <div class="col-md-11 ">
				               <p class="m-l-10 m-b-10" style="color: black;">@{{ empp.discription }}</p>
				               <p style="color: black;"><b>Le nombre de condidat est :</b> @{{empp.nombre_condidat}}</p>
				               <div class="flex-t">
				               		<p  style="color: black;">
					               	<b>Pour contacté l'employeur @{{ empp.nom }} @{{empp.prenom}} : &nbsp</b> </p>
								  <div class="m-t--8">	
					                <p style="color: black;">
					                	@{{empp.num_tel}}
					                </p>
					                <p style="color: black;">
					                   @{{empp.email}}
					               </p>
				               	 </div>
				               </div>
				            </div>               
				          </div>
          				</section> 

					</div>
				
					<div class="col-md-6 col-lg-5 p-b-30 m-l-30" >
						<div class=" p-t-5 p-lr-0-lg" >
							
							<!--  -->
							<div class="p-t-19 col-md-14">
								<div class="p-b-50  ">
									<h4 class="mtext-105 cl13 p-l-50">
										Vos Informations
									</h4>
								</div>
								<div class="p-b-10">
									<form>
										<div  class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Nom et Prenom
											</div>
											<div class="size-219">
												<div class="bg0">
													<input class="form-control m-r-30" id="nom_prenom" type="text" v-model='sendDemande.nom_Prenom' :class="{'is-invalid' : message.nom_Prenom}">
                       								 <span class="px-3 cl13" v-if="message.nom_Prenom" v-text="message.nom_Prenom[0]"></span>
												</div>
											</div>
										</div>
										<div class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Numero Telephone
											</div>
											<div class="size-219">
												<div class=" bg0 ">
													<input class="form-control" type="text" id="Numero" type="text" v-model='sendDemande.tlf' :class="{'is-invalid' : message.tlf}">
                      								 <span class="px-3 cl13" v-if="message.tlf" v-text="message.tlf[0]"></span>

												</div>
											</div>
										</div>

										<div class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Email
											</div>
											<div class="size-219 ">
												<div class=" bg0">
													<input class="form-control m-r-30" id="Email" type="text"  v-model='sendDemande.email' :class="{'is-invalid' : message.email}">
                       								 <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
												</div>
											</div>
										</div>

										<div  class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												CV
											</div>
											<div class="size-219 m-b-5">
												<div class="bg0">
													<input class="form-control m-r-30" id="cv" type="file" :class="{'is-invalid' : message.cv}" v-on:change="cvPreview" accept=
													"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
													text/plain, application/pdf, image/jpeg,image/png">
                       								<span class="px-3 cl13" v-if="message.cv" v-text="message.cv[0]"></span>
												</div>
											</div>
											<span>Si votre fichier de CV est volumineux, ça peut prendre au plus quelques secondes pour le téléchargé.<br> MERCI POUR PATIENCE</span>
										</div>

									</form>
								</div>
								<!--  -->

								<div class="flex-w flex-r-m p-b-10">
									<div class="m-r-60">
										<button class="stext-101 cl0 size-1044 bg10 bor1 trans-04 m-r-10" v-on:click="CancelArticle">
											Annuler
										</button>
										<button class=" stext-101 cl0 size-1044 bg11 bor1 trans-04" v-on:click="addDemande(emplois2[0].id)">
											Demander
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


<script>
	window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "emploi"     => $emploi,
			   'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'command'        => $command,
               'prixTotale'		=> $prixTotale,
               'client'		=> $client,
               "url"      => url("/")  
    ]) !!};



</script>
<script>
     var app11 = new Vue({
        el: '#app11',
        data:{
          
          ProduitsPanier: [],
          favoris: [],
          imagesproduit: [],
          prix:[],
          

        },
        methods:{
        	deleteProduitPanier: function(produit){
		       
		              axios.delete(window.Laravel.url+'/deleteproduitpanier/'+produit.produit_id)
		                .then(response => {
		                  if(response.data.etat){
		                  	console.log("produit",produit);
		                           var position = this.ProduitsPanier.indexOf(produit);
		                           this.ProduitsPanier.splice(position,1);
		                           if(this.ProduitsPanier.lenght == 0){
		                           		this.prix[0].prixTo = 0;
		                           }
		                           else{
		                           		this.prix[0].prixTo -= produit.prix_total*produit.qte;
		                           }

		                  }                     
		                })
		                .catch(error =>{
		                           console.log('errors :' , error);
		                })

		       	  
			},
			emploi: function(){
            axios.get(window.Laravel.url+'/emploi')
              .then(response => {
                this.imagesproduit = window.Laravel.ImageP;
                this.ProduitsPanier = window.Laravel.command;
                this.prix = window.Laravel.prixTotale;
                this.favoris = window.Laravel.Fav;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
        },
        created:function(){
           this.emploi();


        }
     })
</script>


<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>
<script>
	function initialiseCV(){
		document.getElementById('cv').value = null;
	}
	var app2 = new Vue({
     el: '#app2',
     data:{
        emplois2: [],
        hideModel: false,
        openInfo: false,
        detailsEMP:{
          idEMP: 0,
         },
        sendDemande: {
          	nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
          	tlf: window.Laravel.client.numeroTelephone,
          	email: window.Laravel.client.email,
          	cv: null,
          	annonceE_id: 0,
        },
        message: {},
     },
     methods: {
     		CancelArticle(){
	      		$('.js-modal1').removeClass('show-modal1');
	      		this.sendDemande= {
					nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
					tlf: window.Laravel.client.numeroTelephone,
					email: window.Laravel.client.email,
					cv: null,
					annonceE_id: 0,

				};
				initialiseCV();
				this.message= {};
				 	
	      	},
	     	addDemande: function(id_Annonce){
	      		this.sendDemande.annonceE_id = id_Annonce;
	      		axios.get(window.Laravel.url+'/iscnnected')

		            .then(responsee => {
		            	if(!responsee.data.etatee && responsee.data.type == 0){
		            		this.sendDemande= {
					      		nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
					          	tlf: window.Laravel.client.numeroTelephone,
					          	email: window.Laravel.client.email,
					          	cv: null,
					          	annonceE_id: 0,

					      	};
					      	initialiseCV();
					      	this.message= {};
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
		            	else if(responsee.data.etatee && responsee.data.type == 1){
		            		this.sendDemande= {
					      		nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
					          	tlf: window.Laravel.client.numeroTelephone,
					          	email: window.Laravel.client.email,
					          	cv: null,
					          	annonceE_id: 0,

					      	};
					      	initialiseCV();
					      	this.message= {};
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
		            	else{
		            		Swal.fire({
							  title: 'Etes-vous sûr?',
							  text: "De ces INFORMATIONS dans votre demande?",
							  icon: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Oui,envoyer'
							}).then((result) => {
							  if (result.value) {
							    	axios.post(window.Laravel.url+'/envoyerdemande',this.sendDemande)

					            .then(response => {
					            	if(response.data.etat && response.data.cncte && response.data.demandeExiste){//cncté et client mais demande existe

					                 	Swal.fire({
					                 	  icon: 'error',
										  title: 'Oops...',
					                 	  text:"Vous avez déja fait une demande de ce annonce!",
										});
										this.sendDemande= {
								      		nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
								          	tlf: window.Laravel.client.numeroTelephone,
								          	email: window.Laravel.client.email,
								          	cv: null,
								          	annonceE_id: 0,

								      	};
					              		$('.js-modal1').removeClass('show-modal1');
					              		initialiseCV();
								      	this.message= {};
					            	}
					            	else if(response.data.etat && response.data.cncte && !response.data.demandeExiste){//cncté et client
					                 	Swal.fire(
					                 	  "La Demande a été envoyé avec success!",
										  "",
										  'success'
										);
										this.sendDemande= {
								      		nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
								          	tlf: window.Laravel.client.numeroTelephone,
								          	email: window.Laravel.client.email,
								          	cv: null,
								          	annonceE_id: 0,

								      	};
					              		$('.js-modal1').removeClass('show-modal1');
					              		initialiseCV();
								      	this.message= {};
					            	}
					            	
					            })
					            .catch(error =>{
					                this.message = error.response.data.errors;
			                    	console.log('errors :' , this.message);
					            })

							  }
							});
				      		
		            	}
		            });
		            
	      			
	      		
	      		
	      	},
     	   cvPreview: function (event){
     	   		var fileR = new FileReader();
	           fileR.readAsDataURL(event.target.files[0]);

	           fileR.onload = (event) => {
	              this.sendDemande.cv = event.target.result;
	           }
     	   },
           detaillsAnnonceemp: function(){
	             axios.post(window.Laravel.url+'/detailsemp',this.detailsEMP)

	            .then(response => {
	                 this.emplois2 = response.data;
	            })
	            .catch(error =>{
	                 console.log('errors :' , error);
	            })
        	},
       
    },
   });
	var app = new Vue({
      el: '#app',
      data:{
        emplois: [],
      },
      methods:{

        getEmploi: function(){
	        axios.get(window.Laravel.url+'/emploi')

	            .then(response => {
	                 this.emplois = window.Laravel.emploi.data;
	            })
	            .catch(error =>{p
	                 console.log('errors :' , error);
	            })
        },
        AfficheInfo: function($id){
        app2.hideModel = true; 
        app2.openInfo = true;
        app2.detailsEMP.idEMP= $id;
        app2.detaillsAnnonceemp();
      },
       MoitieDescription:  function (text, length, suffix){
          if(text.length <= length){
            return text;

          }
         
          return text.substring(0, length) + suffix;

      }, 
	  AnnonceAuFavoris: function(id){
          	axios.post(window.Laravel.url+'/annonceaufavoris/'+id)
              .then(response => {
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          }

        
      },
      created:function(){
        this.getEmploi();
      },
  });
</script>

@endsection