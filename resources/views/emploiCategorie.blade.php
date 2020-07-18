@extends('layouts.template_visiteur')
@section('content')
<style type="text/css">
	.swal2-container {
	  z-index: 9001;
	}
</style>
	
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
	@php
		$url = Route::getCurrentRoute()->uri();
	@endphp
	<!-- Annonce d'emploi -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container" id="app">
			<div class="flex-w flex-sb-m p-b-60">
				<div class="flex-w flex-c-m m-tb-20">
			        <div class="m-l-25 respon6-next" style="width: 230px;">
			            <div class="rs1-select2 bor8 bg0" >
			            	<select class="js-select2" id="tttt" onchange="window.location.href = this.options[this.selectedIndex].value">
								@if($url != "emploi/search_categorie={id}/sous-categorie={id1}" && $url != "emploi/search_categorie={id}/sous-categorie={id1}/ville={id2}" && $url != "emploi/search_categorie={id}/ville={id1}/sous-categorie={id2}" )
				                	<option value="0" disabled selected>Sous-Categorie</option>
				                @else
									<option value="0" disabled selected>
										@{{name}}
									</option>
				                @endif
				                
				                @foreach($sousC as $sc)
				                		@if($url == "emploi/search_categorie={id}/sous-categorie={id1}/ville={id2}")
					                	 	<option  value="/emploi/search_categorie=<?php echo($sc->categorie_id)?>/sous-categorie=<?php echo($sc->id)?>/ville={{request()->route('id2')}}">
					                			{{$sc->libelle}}
					                		</option>
					                	@elseif($url == "emploi/search_categorie={id}/ville={id1}")
					                		<option  value="/emploi/search_categorie=<?php echo($sc->categorie_id)?>/ville={{request()->route('id1')}}/sous-categorie=<?php echo($sc->id)?>">
					                			{{$sc->libelle}}
					                		</option>
					                	@elseif($url == "emploi/search_categorie={id}/ville={id1}/sous-categorie={id2}")
				                		<option  value="/emploi/search_categorie={{request()->route('id')}}/ville={{request()->route('id1')}}/sous-categorie=<?php echo($sc->id)?>">
				                			{{$sc->libelle}}
				                		</option>

				                		@else
				                			<option  value="/emploi/search_categorie=<?php echo($sc->categorie_id)?>/sous-categorie=<?php echo($sc->id)?>">
				                			{{$sc->libelle}}
				                			</option>


				                		@endif
				                @endforeach
			            	</select>
			                <div class="dropDownSelect2"></div>
			            </div>
					</div>
					<div class="m-l-25 respon6-next" style="width: 230px;">
			            <div class="rs1-select2 bor8 bg0" >
			            	<select class="js-select2" id="villes"  onchange="window.location.href = this.options[this.selectedIndex].value">
								@if($url != "emploi/search_categorie={id}/ville={id1}" && $url != "emploi/search_categorie={id}/sous-categorie={id1}/ville={id2}" && $url != "emploi/search_categorie={id}/ville={id1}/sous-categorie={id2}")
				                	<option value="0" disabled selected>Villes</option>
				                @else
									<option value="0" disabled selected>
										@{{ville}}
									</option>
				                @endif
				                
				                @foreach($ville as $vl)
				                	@if($url == "emploi/search_categorie={id}")
				                		<option  value="/emploi/search_categorie={{request()->route('id')}}/ville=<?php echo($vl->nom)?>">
				                			{{$vl->nom}}
				                		</option>
	
				                	@elseif($url == "emploi/search_categorie={id}/sous-categorie={id1}")
				                		<option  value="/emploi/search_categorie={{request()->route('id')}}/sous-categorie={{request()->route('id1')}}/ville=<?php echo($vl->nom)?>">
				                			{{$vl->nom}}
				                		</option>
				                	@elseif($url == "emploi/search_categorie={id}/ville={id1}/sous-categorie={id2}")
				                		<option  value="/emploi/search_categorie={{request()->route('id')}}/ville=<?php echo($vl->nom)?>/sous-categorie={{request()->route('id2')}}">
				                			{{$vl->nom}}
				                		</option>

				                	@elseif($url == "emploi/search_categorie={id}/ville={id1}")
				                		<option  value="/emploi/search_categorie={{request()->route('id')}}/ville=<?php echo($vl->nom)?>">
				                			{{$vl->nom}}
				                		</option>
				                	@else
				                		<option  value="/emploi/search_categorie={{request()->route('id')}}/sous-categorie={{request()->route('id1')}}/ville=<?php echo($vl->nom)?>">
				                			{{$vl->nom}}
				                		</option>

				                	@endif
				                	 	
				                @endforeach
			            	</select>
			                <div class="dropDownSelect2"></div>
			            </div>
					</div>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
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
			</div>
					@foreach($emploi as $emp)
		        	<div class="row m-b-10"   style="display: inline-flex;  width: 420px; height: 160px;">
		        			
		        		<div style="display: inline-flex;  width: 420px; height: 160px;">
		        		@if($emp->image != null)
						<div  class="col-md-4 block2 block2-pic hov-img0" style="margin-left: 30px;">
							<img  :src="getPicture('<?php echo $emp->image ?>')" style="height: 120px; width: 120px; ">
							<a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo({{ json_encode($emp->id) }})" style="cursor: pointer;">
								Quick View
							</a>
						</div>

						<div class="col-md-6 js-show-modal1"  v-on:click="AfficheInfo({{ json_encode($emp->id) }})" style="cursor: pointer;">
							<h5 class="title" style="color: red;">
								<b>{{$emp->libellé}}</b>
							</h5><br>
							<div class="description" style="margin-top: -10px; font-size: 14px;">
								{{ MoitieDescription('<?php echo $emp->discription?>' ,45, '...') }}
							</div>
							<div class="description" style="margin-top: 10px;">
								<b>Nombre de condidat : {{$emp->nombre_condidat}}</b>
							</div>
						</div>
						@else
						<p style="height: 60px"></p>
						<div class="col-md-10 m-l-30 js-show-modal1" v-on:click="AfficheInfo({{ json_encode($emp->id) }})" style="cursor: pointer;">
							<h5 class="title" style="color: red;" >
								<b>{{$emp->libellé}}</b>
							</h5><br>
							<div class="description" style=" font-size: 14px;">
								{{ MoitieDescription('<?php echo $emp->discription?>' ,100, '...') }}
							</div>
							<div class="description" style="">
								<b>Nombre de condidat : {{$emp->nombre_condidat}}</b>
							</div>
						</div>
						@endif
						@php $k=0; @endphp
						@for($i=0 ; $i< count($fav) ; $i++)
								@if($fav[$i]->annonce_emploi_id  == $emp->id)
										
									@php
										$k=$k+1;
										$i=count($fav);
										
									@endphp
								@endif

						@endfor	
						@if($k == 1)
							<div class="m-t-100" style="float: right;">
								
								<a  class="" v-on:click="AjoutAuFavoris({{ json_encode($emp) }})" style="cursor: pointer;" >
									<i  class="zmdi zmdi-favorite zmdi-hc-lg" style="color: #e60000; " id="<?php echo $emp->id ?>"></i>
								</a>
							</div>
						@else
							<div class="m-t-100" style="float: right;">
									
									<a  class="" v-on:click="AjoutAuFavoris({{ json_encode($emp) }})" style="cursor: pointer; "  >
										<i  class="cl222 zmdi zmdi-favorite-outline zmdi-hc-lg favoo " id="<?php echo $emp->id ?>"></i>
										
									</a>
							</div>
						@endif
							<div style="border-left: 2px solid #000; display: inline-block;height: 120px; margin: 0 20px; margin-left: 12px;">
                       		</div>
						</div>
					
						
						
							
			   </div>
@endforeach
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
					<img src="{{asset('images/icons/icon-close.png')}}" alt="CLOSE">
				</button>
				<div class="p-b-30 p-l-40">
					<h4 class="ltext-102  cl2">
				           Fait Une Demande   

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
				              <img  :src="getPicture(empp.image)" style="width: 300px; height: 190px; " />
				              
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
											<span>Si votre fichier de CV est volumineux, ça peut prendre au plus quelques secondes pour le téléchargé.<br> MERCI DE PATIENCE</span>
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
										<div class=""  style="margin-top:-158%;argin-right:10px;" >
												<a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"   style="  margin-left: 335px;">
													<i class="fas fa-ellipsis-v"  id="y" style="color: black"></i>
												</a>
     									 <div class="dropdown-menu " x-placement="right-start" id="divSignal">

										  <a  class="dropdown-item"  v-on:click="SignalerAnnonce(empp.id)"  
												style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;" >   Signaler Annonce</a>
																<a class="dropdown-item" v-on:click="SignalerEmployeur(empp.employeur_id)"
												style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;">
												Signaler Employeur</a>
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


<script>
	window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "emploi"     => $emploi,
			   'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'fav'         => $fav,
               'command'        => $command,
               'prixTotale'		=> $prixTotale,
               'client'		=> $client,
               'id'		=>$id,
               'idville'		=>$idville,
               "url"      => url("/")  
    ]) !!};



</script>
<script>
	function adde(a){

		$('#'+a).removeClass('zmdi-favorite-outline');
		$('#'+a).addClass('zmdi-favorite');
		document.getElementById(a).style.color = '#e60000';
	}
	function deletee(a){
		$('#'+a).removeClass('zmdi-favorite');
		$('#'+a).addClass('zmdi-favorite-outline');
		document.getElementById(a).style.color = '#d3d3d3';
	}
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
     		getPicture(img){
      			return "{{asset('storage/annonces_image')}}"+"/"+img;
      		},
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
			  SignalerEmployeur: function(id){
          	axios.post(window.Laravel.url+'/signaleremployeur/'+id)
              .then(response => {
				Swal.fire(
					  "Signal est fait avec success!",
					);
					$('.js-modal1').removeClass('show-modal1');
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
		SignalerAnnonce: function(id){
          	axios.post(window.Laravel.url+'/signalerannonce/'+id)
              .then(response => {
				Swal.fire(
					  "Signal est fait avec success!",
					);
					$('.js-modal1').removeClass('show-modal1');
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
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
        name: null,
        ville: null,
      },
      methods:{
      	getPicture(img){
      		return "{{asset('storage/annonces_image')}}"+"/"+img;
      	},
		AjoutAuFavoris: function(produit){
				axios.post(window.Laravel.url+'/ajoutaufavorisE/'+produit.id)
	              .then(response => {
	              		if(response.data.etat == "add"){
							swal(produit.libellé, "a été ajouté au liste de favoris.", "success");
							adde(produit.id);
               	 		}
               	 		else{
               	 			swal(produit.libellé, "a été retiré au liste de favoris.", "success");
	                		deletee(produit.id);
               	 		}
					
				             
			        	
	               })
	              .catch(error => {
	                  console.log('errors : '  , error);
	             })
            
        },
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
       },
       selectSousC: function(){
       		if(window.Laravel.id !=0){
       		 	this.name =window.Laravel.id[0].libelle;
       		}
       		if(window.Laravel.idville != 0){
       			this.ville = window.Laravel.idville[0].nom;
       		}
          	 
        }

        
      },
      created:function(){
        this.getEmploi();
      },
       mounted:function(){
       		 	this.selectSousC();
       		
      }
  });
</script>

@endsection