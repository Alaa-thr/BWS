@extends('layouts.template_visiteur')
@section('content')

	
	<head>
		<title>{{ ( 'Panier') }}</title>
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
            
            <div class="header-cart-content flex-w js-pscroll" id="app1" >
                <ul class="header-cart-wrapitem w-full"  >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier">
                        <div class="header-cart-item-img"  >
                        <img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" 
                        alt="IMG-PRODUCT"  style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoris" v-if="fv.id === command.produit_id">
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
                    
                <div class="header-cart-total w-full p-tb-40">
                        Total: 
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
	

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85" >
		<div class="container" id='app'>
			<div class="row">

			<!--alert-->
@if(session()->has('success'))
<div class="row"> 
<div class="alert alert-success" style="  margin-left:33px;width: 1160px;">

<button type="button"  class="close" data-dismiss="alert" aria-hidden="true">&times;

</button>
 {{ session()->get('success')}}
</div>

</div>
	  @endif
	  
				<div class="col-lg-10 m-l-80 m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Produit</th>
									<th class="column-2"></th>
									<th class="column-3">Prix</th>
									<th class="column-3 p-l-35">Quantite</th>
									<th class="column-2 p-l-85">Couleur/Taille</th>
									<th class="column-6">Livraison / Prix</th>
									<th class="column-2 p-l-100">Prix Total</th>
								</tr>

								<tr class="table_row" v-for="produit in produitCommandes" v-if="produit.commande_envoyee===0">
									<td class="column-1">
										<div class="how-itemcart1" @click="deleteProduitPanier(produit)">
											<img :src="'storage/produits_image/'+ produit.image" alt="IMG">
										</div>
									</td>
									<td class="column-2" >
										
									<span :data-toggle="!!produit.nom_vendeur ? 'tooltip' : false" data-html="true" :title="'Vendeur : <b>'+produit.nom_vendeur.toUpperCase()+' ' +produit.prenom_vendeur.toUpperCase()+'</b>'" >

										@{{produit.Libellé}}
										</span>
									</td>
										
									<td class="column-3">@{{produit.prix}}DA</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-downp cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(-1, produit.produit_id )">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" :value="produit.qte" id="qte">

											<div class="btn-num-product-upp cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(1, produit.produit_id )">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-2 p-l-50">
										<div v-if="produit.taille != 0" class="flex-t">
											<select class="custom-select m-r-10" id=""  style="width: 100px"  v-on:change="updateProduitPanier($event,produit.produit_id,'color')" >
											  <option  value="" disabled>Couleur</option>
			                                  <option :value="produit.couleur_id">@{{produit.nom}}</option>
			                                  <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === produit.produit_id && color.color_id != produit.couleur_id">@{{color.nom}}</option>
			                                  
											</select>
											
											<select  class="custom-select" id=""  style="width: 100px" v-on:change="updateProduitPanier($event,produit.produit_id,'taille')">
											 <option  value="" disabled>Taille</option>
			                                 <option :value="produit.taille">@{{produit.taille}}</option>
											 <option v-for="taille in tailles" :value="taille.nom" v-if="taille.nom != produit.taille && produit.produit_id === taille.produit_id ">@{{taille.nom}}</option>
											</select>
											
										</div>
										<div v-else class="flex-t">
											<select class="custom-select m-r-10" id=""  style="width: 212px" v-on:change="updateProduitPanier($event,produit.produit_id,'color')">
											  <option  value="" disabled>Couleur</option>
			                                  <option :value="produit.couleur_id">@{{produit.nom}}</option>
			                                  <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === produit.produit_id && color.color_id != produit.couleur_id">@{{color.nom}}</option>
			                                  
											</select>
											
										</div>

									</td>
									<td class="column-6" >
										
											<select class="custom-select " id="inputGroupSelect01" style="width: 270px; margin-top:-17px" v-on:change="updateProduitPanier($event,produit.produit_id,'typeL')">
											  <option  value="" disabled>Type de Livraison</option>
											  <option  value="vc" v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                  <option value="cv" v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                  <option value="dhl" v-if="produit.type_livraison === 'dhl'">DHL(Poste)</option>
			                                  <option v-for="typeLivraison in typeLivraisons" value="vc" v-if="typeLivraison.vendeur_id === produit.vendeur_id && typeLivraison.type_livraison != produit.type_livraison &&  typeLivraison.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                  <option v-for="typeLivraison in typeLivraisons" value="cv" v-if="typeLivraison.vendeur_id === produit.vendeur_id && typeLivraison.type_livraison != produit.type_livraison &&  typeLivraison.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                  <option v-for="typeLivraison in typeLivraisons" value="dhl" v-if="typeLivraison.vendeur_id === produit.vendeur_id && typeLivraison.type_livraison != produit.type_livraison &&  typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
											</select>
										
									</td>
									<td class="column-2 p-l-100">@{{produit.prixTo}} DA</td>
								</tr>

								

								
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="header-cart-total  p-tb-40">
								
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 " v-on:click="openCommande()">
								Commander
							</div>
						</div>
					</div>
				</div>
			</div>
		
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" >
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="p-b-30 p-l-40">
					<h4 class="ltext-102  cl2">
				           COMMANDE DE    {{strtoupper ($client->nom)}}   {{strtoupper ($client->prenom)}}

					</h4>
				</div>

				<div class="row" >
					<div class="col-md-6 col-lg-6 m-r-40">
						<div class="p-l-60 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="p-t-20 p-b-20 p-l-50">
									<h4 class="mtext-105 cl13 p-l-70">
										Vos Produits
									</h4>
								</div>
								<div class="div1" >
								  <div>

										<div class="table_row flex-t p-b-20" v-for="produit in produitCommandesDemmande" v-if="produit.commande_envoyee===0">
											<div class="column-1">
												<div class="how-itemcart1" style="height: 80px">
													<img :src="'storage/produits_image/'+ produit.image" alt="IMG">
												</div>
											</div>
											<div class="column-2 p-l-40 p-r-40 p-t-10">@{{produit.qte}}x@{{produit.prix}} DA
											</div>
											<div class="column-2 p-l-40 ">
												<div class="input-group mb-3 ">
													<div   v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</div>
					                                  <div  v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</div>
					                                  <div  v-if="produit.type_livraison === 'dhl'">DHL(Poste)</div>	
												</div>
												<div class="flex-t m-t--10">
													<div>Couleur: @{{produit.nom}}</div>
													<div v-if="produit.taille != 0">&nbsp/&nbsp&nbspTaille: @{{produit.taille}}</div>
												</div>
											</div>
										</div>
										
								  </div>
								</div>
							</div>
						</div>
						<div class="header-cart-total m-l-60 p-tb-40" v-for="t in prixT">
								<b>Totale:&nbsp</b> @{{t.prixTo}}&nbspDA
						</div>
					</div>
				
					<div class="col-md-6 col-lg-5 p-b-30 m-l-30" >
						<div class=" p-t-5 p-lr-0-lg" >
							
							<!--  -->
							<div class="p-t-19">
								<div class="p-b-50  p-l-40">
									<h4 class="mtext-105 cl13 p-l-50">
										Vos Informations
									</h4>
								</div>
								<div class="p-b-10">
									<form>
										<div class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Numero Telephone
											</div>
											<div class="size-219">
												<div class=" bg0 ">
													<input class="form-control" type="text" id="Numero" type="text" v-model="art.numero_tlf" :class="{'is-invalid' : message.numero_tlf}" >
                      								 <span class="px-3 cl13" v-if="message.numero_tlf" v-text="message.numero_tlf[0]">
                    								  </span>

												</div>
											</div>
										</div>

										<div class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Email
											</div>
											<div class="size-219 ">
												<div class=" bg0">
													<input class="form-control m-r-30" id="Email" type="text"   v-model="art.email" :class="{'is-invalid' : message.email}" >
                       								 <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]">
                    								  </span>
												</div>
											</div>
										</div>

										<div v-if="adrresse" class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Adrrsse
											</div>
											<div class="size-219">
												<div class="bg0">
													<input class="form-control m-r-30" id="adrrsse" type="text"   v-model="art.address" :class="{'is-invalid' : message.address}" >
                       								 <span class="px-3 cl13" v-if="message.address" v-text="message.address[0]">
                    								  </span>
												</div>
											</div>
										</div>

										<div v-if="codePostale" class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												code Postale
											</div>
											<div class="size-219">
												<div class="bg0">
													<input class="form-control m-r-30" id="code" type="text"   v-model="art.code_postale" :class="{'is-invalid' : message.code_postale}" >
                       								 <span class="px-3 cl13" v-if="message.code_postale" v-text="message.code_postale[0]">
                    								  </span>
												</div>
											</div>
										</div>

									</form>
								</div>
								<!--  -->

								<div class="flex-w flex-r-m p-b-10">
									<div class="m-r-60">
										<button class="stext-101 cl0 size-1044 bg10 bor1 trans-04 m-r-10" v-on:click="CancelCommande()">
											Annuler
										</button>
										<button class=" stext-101 cl0 size-1044 bg11 bor1 trans-04" v-on:click="EnvoyerCommande()">
											Envoyer
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
		

@endsection
@push("javascripts")
 
<script>
        window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "produitCmds"   => $produitCmds,
               'color'         => $color,
               'taille'         => $taille,
               'typeLivraison'         => $typeLivraison,
			   "client" => $client,
			   "idClient" => $idClient,

			   'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'command'         => $command,
               "url"      => url("/")  
          ]) !!};
</script>
<script>
 Vue.mixin({


methods:{
	
	EnvoyerCommande: function(){
		if(app.adrresse == false){
	    		app.art.nonAddresse = 0;
	    }
	    if(app.codePostale == false){
	    		app.art.nonCode = 0;
	    }
	 axios.post(window.Laravel.url+"/envoyercommande",app.art)

	.then(response => {
	  if(response.data.etat){
		 app.art = response.data.commandeAjout; 
		 app.art.id = response.data.commandeAjout.id; 
		 window.location.reload(); 
		 app.articlesadmin.unshift(app.art);
		 app.art={
			  id: 0,
			  client_id: window.Laravel.idClient,
			  numero_tlf: window.Laravel.client.numeroTelephone, 
			  email: window.Laravel.client.email, 
			  address: window.Laravel.client.addresse, 
			  code_postale: window.Laravel.client.codePostal,
			  nonAddresse: 1,
			  nonCode: 1, 

			  
		 };
  		 app.message = {};
	   }          
	})
	.catch(error =>{
		app.message = error.response.data.errors;
		console.log('errors :' , app.message);
	})
},         
}                     
}); 


	var app = new Vue({
	    el: '#app',
	    data:{
	      produitCommandes: [],
	      colors: [],
	      tailles: [],
	      typeLivraisons: [],
	      tailleExist: true,
	      adrresse: false,
	      codePostale: false,
		  art: {
			id: 0,
			client_id: window.Laravel.idClient,
			numero_tlf: window.Laravel.client.numeroTelephone, 
			email: window.Laravel.client.email, 
			address: window.Laravel.client.addresse, 
			code_postale: window.Laravel.client.codePostal,
			nonAddresse: 1,
			nonCode: 1, 
		  },
		  infoClinet: [] ,
		  updateP: {
		  	produit_id: 0,
		  	val: 0,
		  	type: ''
		  },
          message: {},
          produitCommandesDemmande: [],
          prixT: [],
	    },
	    methods: {
	    	callfunctionQte(val,id){
	    		changeQte(val,id);
	    	},
	    	updateProduitPanier: function(e,id,type){
		      	if(type == 'qte'){
		      		this.updateP.val = e;
		      	}
		      	else{
		      		this.updateP.val = e.target.options[e.target.options.selectedIndex].value;
		      	} 
		      	this.updateP.produit_id = id;		      	
		      	this.updateP.type = type;         
		        axios.post(window.Laravel.url+'/updateproduitpanier',this.updateP)
		            .then(response => {
		                if(response.data.etat){
		                          

		                }                     
		            })
		            .catch(error =>{
		                console.log('errors :' , error);
		             })
  
			},
	    	deleteProduitPanier: function(produit){
		       Swal.fire({
		        title: 'Etes vous?',
		        text: "De supprimer cette Produit?",
		        icon: 'warning',
		        showCancelButton: true,
		        confirmButtonColor: '#3085d6',
		        cancelButtonColor: '#d33',
		        confirmButtonText: 'Oui, Supprimer!'
		      }).then((result) => {
		          if (result.value) {
		              axios.delete(window.Laravel.url+'/deleteproduitpanier/'+produit.produit_id)
		                .then(response => {
		                  if(response.data.etat){
		                           var position = this.produitCommandes.indexOf(produit);
		                           this.produitCommandes.splice(position,1);

		                  }                     
		                })
		                .catch(error =>{
		                           console.log('errors :' , error);
		                })

		       	  }
		        
		        })
			},
	    	ProduitCommande:function(){

	    	    axios.get(window.Laravel.url+'/panier')
                .then(response => {
                	this.produitCommandes = window.Laravel.produitCmds;
                	this.infoClinet = this.produitCommandes[0];
                	this.colors = window.Laravel.color;
                	this.tailles = window.Laravel.taille;
                	this.typeLivraisons = window.Laravel.typeLivraison;
                })                     
                .catch(error =>{
                           console.log('errors :' , error);
                })
	    	},
	    	openCommande: function(){
	    		this.adrresse = false;
	    		this.codePostale = false;
	    		if(this.produitCommandes.length == 0 ){
	    				Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: 'Vous devez ajouter des produits à votre panier en premier.',
						}).then((result) => {
          						if (result.value) {
          							window.location.href = "{{route('shop')}}";
          						}
          				})
	    		}
	    		else{
	    			 axios.get(window.Laravel.url+'/panierdemmande')
	                .then(response => {
	                	this.produitCommandesDemmande = response.data.produitCmds;
	                	this.infoClinet = this.produitCommandesDemmande[0];
	                	this.prixT = response.data.prixT;
		                $('.js-modal1').addClass('show-modal1');
			    		this.produitCommandesDemmande.forEach(key => {
			    			if(key.type_livraison == "vc"){
			    				this.adrresse = true;
			    			}
			    			if(key.type_livraison == "dhl"){
			    				this.codePostale = true;
			    			}
		    		
	    				});
	                })                     
	                .catch(error =>{
	                           console.log('errors :' , error);
	                })


	               
	    		}
	    	},
	    	CancelCommande(){
      		$('.js-modal1').removeClass('show-modal1');

			this.message= {};
			 	
      	}, 
      	  
 



	    },
	    mounted:function(){
	    	this.ProduitCommande();
	    },
	});

	  function changeQte(val,id){
	  	var x= parseInt(document.getElementById('qte').value,10);
	 	if(val == 1){
	 		document.getElementById('qte').value = x+1;
	 		app.updateProduitPanier(x+1,id,'qte')
	 	}	
	 	else if(val == -1 && x > 1){
	 		document.getElementById('qte').value = x-1;
	 		app.updateProduitPanier(x-1,id,'qte')
	 	}       		
	  }
</script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
/*function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("adrrsse"),mapProp);
}*/
Vue.directive('tooltip', function(el, binding){
    $(el).tooltip({
             title: binding.value,
             placement: binding.arg,
             trigger: 'hover'             
         })
})
</script>
<script>
     var app1 = new Vue({
        el: '#app1',
        data:{
          message:'hello',
          ProduitsPanier: [],
          favoris: [],
          imagesproduit: [],
        },
        methods:{
			ProduitCommande: function(){
            axios.get(window.Laravel.url+'/panier')
              .then(response => {
                this.favoris = window.Laravel.Fav;
                this.imagesproduit = window.Laravel.ImageP;
                this.ProduitsPanier = window.Laravel.command;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          

        },
        created:function(){
            this.ProduitCommande();

        }
     })
</script>
@endpush