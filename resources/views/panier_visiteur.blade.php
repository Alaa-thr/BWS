@extends('layouts.template_visiteur')
@section('content')

	
	<head>
		<title>{{ ( 'Panier') }}</title>
	</head>

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
									<th class="column-6">Livraison</th>
									<th class="column-2 p-l-100">Prix*Quantite</th>
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
											<div class="btn-num-product-downp cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(-1, produit.produit_id,produit.qte,produit.couleur_id,produit.taille,produit.type_livraison)">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" :value="produit.qte" :id="produit.produit_id">

											<div class="btn-num-product-upp cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(1, produit.produit_id,produit.qte,produit.couleur_id,produit.taille,produit.type_livraison)">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-2 p-l-50">
										<div v-if="produit.taille != 0" class="flex-t">
											<select class="custom-select m-r-10" id=""  style="width: 100px"  v-on:change="updateProduitPanier($event,produit.produit_id,'color',produit.qte,produit.couleur_id,produit.taille,produit.type_livraison)">
											  <option  value="0" disabled>Couleur</option>
			                                  <option :value="produit.couleur_id" selected>@{{produit.nom}}</option>
			                                  <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === produit.produit_id && color.color_id != produit.couleur_id">@{{color.nom}}</option>
			                                  
											</select>
											
											<select  class="custom-select" id=""  style="width: 100px" v-on:change="updateProduitPanier($event,produit.produit_id,'taille',produit.qte,produit.couleur_id,produit.taille,produit.type_livraison)">
											 <option  value="0" disabled>Taille</option>
			                                 <option :value="produit.taille" selected>@{{produit.taille}}</option>
											 <option v-for="taille in tailles" :value="taille.nom" v-if="taille.nom != produit.taille && produit.produit_id === taille.produit_id ">@{{taille.nom}}</option>
											</select>
											
										</div>
										<div v-else class="flex-t">
											<select class="custom-select m-r-10" id=""  style="width: 212px" v-on:change="updateProduitPanier($event,produit.produit_id,'color',produit.qte,produit.couleur_id,produit.taille,produit.type_livraison)">
											  <option  value="0" disabled>Couleur</option>
			                                  <option :value="produit.couleur_id" selected>@{{produit.nom}}</option>
			                                  <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === produit.produit_id && color.color_id != produit.couleur_id">@{{color.nom}}</option>
			                                  
											</select>
											
										</div>

									</td>
									<td class="column-6" >
										
											<select class="custom-select " id="inputGroupSelect01" style="width: 270px; margin-top:-17px" v-on:change="updateProduitPanier($event,produit.produit_id,'typeL',produit.qte,produit.couleur_id,produit.taille,produit.type_livraison)">
											  <option  value="" disabled>Type de Livraison</option>
											  <option  value="vc" v-if="produit.type_livraison === 'vc'" selected>Le vendeur effectuer la livraison</option>
			                                  <option value="cv" v-if="produit.type_livraison === 'cv'" selected>Vous apportez votre produit</option>
			                                  <option value="dhl" v-if="produit.type_livraison === 'dhl'" selected>DHL(Poste)</option>
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
													<div   v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison/ @{{produit.typee}} DA</div>
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
						<div class="header-cart-total m-l-60 p-tb-40 m-t-20" v-for="t in prixT" v-if='willayaSelect'>
								<b>Totale <small>(avec Tarif de Livraison)</small>:&nbsp</b> @{{Tarif}}&nbspDA
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

										<div class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Ville
											</div>
											<div class="size-219 ">
												<div class=" bg0">
												<select class="form-control m-r-30"   :class="{'is-invalid' : message.ville}" style="height: 40px" name="ville" @change='changeWillaya($event)' v-model='art.ville'>
													<option value=""  hidden="hidden" selected>Choisir une ville</option> 
															@foreach($villes as $ville)
													<option  value="<?php echo $ville->id?>" value="<?php echo $ville->nom?>">{{$ville->nom}}</option> 
															@endforeach
												</select>
												<span class="px-3 cl13" v-if="message.ville" v-text="message.ville[0]">
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
               'villes'         => $villes,
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
	    app.ville = window.Laravel.villes;
	    app.ville.forEach(key=>{
	    	if(key.id == app.art.ville){
	    		app.art.ville = key.nom;
	    	}
	    })
	    app.art.prix_totale = app.Tarif;
	 axios.post(window.Laravel.url+"/envoyercommande",app.art)

	.then(response => {
	  if(response.data.etat){
	  	app.message = {};
		 app.art = response.data.commandeAjout; 
		 app.art.id = response.data.commandeAjout.id; 
		 window.location.reload(); 
		 app.articlesadmin.unshift(app.art);
		 app.art={
			  id: 0,
			  client_id: window.Laravel.idClient,
			  numero_tlf: window.Laravel.client.numeroTelephone, 
			  email: window.Laravel.client.email, 
			  ville: '', 
			  address: window.Laravel.client.addresse, 
			  code_postale: window.Laravel.client.codePostal,
			  nonAddresse: 1,
			  nonCode: 1,
			  prix_totale: 0, 

			  
		 };
  		 
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

	      ville: [],
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
			ville: '', 
			address: window.Laravel.client.addresse, 
			code_postale: window.Laravel.client.codePostal,
			nonAddresse: 1,
			nonCode: 1,
			prix_totale: 0,  
		  },
		  infoClinet: [] ,
		  updateP: {
		  	produit_id: 0,
		  	val: 0,
		  	type: '',
		  	couleur: '',
		  	taille: '',
		  	typeL: '',
		  	qte: '',
		  },
          message: {},
          produitCommandesDemmande: [],
          prixT: [],
          Tarif: 0,
          willayaSelect: false,
          willayaSelectId: {
          	id: ''
          }
	    },
	    methods: {
	    	changeWillaya(event){
	    		this.Tarif=0
	    		var j=0;
	    		this.willayaSelectId.id = event.target.options[event.target.options.selectedIndex].value;
	    		axios.post(window.Laravel.url+'/getTarifCommande',this.willayaSelectId)
		            .then(response => {
		            	this.produitCommandesDemmande.forEach(key=>{
			              
			                  key['typee'] = 0
			                
			            })
		            	this.produitCommandesDemmande.forEach(key=>{
			              response.data.type_prix.forEach(key1=>{
			                if(key.type_livraison == 'vc' && key.vendeur_id == key1.vendeur_id){
			                  key['typee'] = key1.prix
			                }
			              })
			            })
		            if(response.data.tarif.length < this.produitCommandesDemmande.length){
		            	this.produitCommandesDemmande.forEach(key=>{
		            		for (var i = 0; i < response.data.tarif.length; i++)
		            		{
		            			if(response.data.tarif[i].qte == key.qte && response.data.tarif[i].couleur_id == key.couleur_id && response.data.tarif[i].taille == key.taille && response.data.tarif[i].type_livraison == key.type_livraison && response.data.tarif[i].produit_id == key.produit_id && response.data.tarif[i].vendeur_id == key.vendeur_id){
		            				
		            				j++;
		            			}

		            		}
		            		if(j==0){
		            			this.Tarif+= (key.prix_produit*key.qte)
		            		}
		            		else{
		            			j =0;
		            		}
		            	})
		            }
		            	response.data.tarif.forEach(key=>{
		            		for (var i = 0; i < this.produitCommandesDemmande.length; i++) {
		            			
		            			if(key.qte == this.produitCommandesDemmande[i].qte && key.couleur_id == this.produitCommandesDemmande[i].couleur_id && key.taille == this.produitCommandesDemmande[i].taille && key.type_livraison == this.produitCommandesDemmande[i].type_livraison && key.produit_id == this.produitCommandesDemmande[i].produit_id && key.ville_id == this.willayaSelectId.id){
		            					if( key.type_livraison == 'vc' ){
		            						this.Tarif+= (key.prix_produit*key.qte)+key.prix
		            						
		            					}
		            					else{
		            						this.Tarif+= (key.prix_produit*key.qte)
		            					}
		            					i=this.produitCommandesDemmande.length;
		            					
		            			}


		            		}
		            	})
		            	this.willayaSelect = true;
		                       
		            })
		            .catch(error =>{
		                console.log('errors :' , error);
		             })
	    	},
	    	callfunctionQte(val,id,qte,color,taille,tp){
	    		
	    		changeQte(val,id,qte,color,taille,tp);
	    	},
	    	updateProduitPanier: function(e,id,type,qtee,color,taille,tp){
	    		this.updateP.couleur = color;
	    		this.updateP.taille = taille;
	    		this.updateP.typeL = tp;
	    		this.updateP.qte = qtee;
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
		            	this.produitCommandes.forEach(key=>{
		            		
		            		if(key.couleur_id == color && key.taille == taille && key.qte == qtee && key.type_livraison == tp && key.produit_id == id ){
		            			if(type == 'taille'){
		            				key.taille = e.target.options[e.target.options.selectedIndex].value ;
		            			}else if(type == 'qte'){
		            				key.qte = e;
		            			}else if(type == 'color'){
		            				
		            				key.couleur_id = e.target.options[e.target.options.selectedIndex].value;
		            				key.nom = e.target.options[e.target.options.selectedIndex].text;
		            				
		            				
		            			}else if(type == 'typeL'){
		            				key.type_livraison = e.target.options[e.target.options.selectedIndex].value;
		            			}
		            		}

		            	})
		                       
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
                	console.log("this.produitCommandes",this.produitCommandes)
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
	                	$('.js-modal1').addClass('show-modal1');
	                	this.produitCommandesDemmande = response.data.produitCmds;
	                	this.infoClinet = this.produitCommandesDemmande[0];
	                	this.prixT = response.data.prixT;
			    		this.produitCommandesDemmande.forEach(key => {
			    			if(key.type_livraison == "vc"){
			    				this.adrresse = true;
			    			}
			    			if(key.type_livraison == "dhl"){
			    				this.codePostale = true;
			    			}
		    		
	    				});
	    				this.produitCommandesDemmande.forEach(key=>{
			              
			                  key['typee'] = 0;
			                
			            })
			            
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

	  function changeQte(val,id,qte,color,taille,tp){

	 	if(val == 1){

	 		document.getElementById(id).value = qte+1;
	 		app.updateProduitPanier(qte+1,id,'qte',qte,color,taille,tp)
	 	}	
	 	else if(val == -1 && qte > 1){
	 		document.getElementById(id).value = qte-1;
	 		app.updateProduitPanier(qte-1,id,'qte',qte,color,taille,tp)
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