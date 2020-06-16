
<?php $__env->startSection('content'); ?>

	
	<head>
		<title><?php echo e(( 'Panier')); ?></title>
	</head>
	
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Panier
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85" >
		<div class="container" id='app'>
			<div class="row">
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

								<tr class="table_row" v-for="produit in produitCommandes">
									<td class="column-1">
										<div class="how-itemcart1">
											<img :src="'storage/produits_image/'+ produit.image" alt="IMG">
										</div>
									</td>
									<td class="column-2" >
										
									<span :data-toggle="!!produit.nom_vendeur ? 'tooltip' : false" data-html="true" :title="'Vendeur : <b>'+produit.nom_vendeur.toUpperCase()+' ' +produit.prenom_vendeur.toUpperCase()+'</b>'" >

										{{produit.Libellé}}
										</span>
									</td>
										
									<td class="column-3">{{produit.prix}}DA</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" :value="produit.qte">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-2 p-l-50">
										<div v-if="produit.taille != null" class="flex-t">
											<select class="custom-select m-r-10" id=""  style="width: 100px">
											  <option  value="" disabled>Couleur</option>
			                                  <option :value="produit.couleur_id">{{produit.nom}}</option>
			                                  <option v-for="color in colors" :value="color.id" v-if="color.produit_id === produit.produit_id && color.color_id != produit.couleur_id">{{color.nom}}</option>
			                                  
											</select>
											
											<select  class="custom-select" id=""  style="width: 100px" >
											 <option  value="" disabled>Taille</option>
			                                 <option :value="produit.taille">{{produit.taille}}</option>
											 <option v-for="taille in tailles" :value="taille.nom" v-if="taille.nom != produit.taille && produit.produit_id === taille.produit_id ">{{taille.nom}}</option>
											</select>
											
										</div>
										<div v-else class="flex-t">
											<select class="custom-select m-r-10" id=""  style="width: 212px">
											  <option  value="" disabled>Couleur</option>
			                                  <option :value="produit.couleur_id">{{produit.nom}}</option>
			                                  <option v-for="color in colors" :value="color.id" v-if="color.produit_id === produit.produit_id && color.color_id != produit.couleur_id">{{color.nom}}</option>
			                                  
											</select>
											
										</div>

									</td>
									<td class="column-6" >
										
											<select class="custom-select " id="inputGroupSelect01" style="width: 270px; margin-top:-17px">
											  <option  value="" disabled>Type de Livraison</option>
											  <option  value="vc" v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                  <option value="cv" v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                  <option value="dhl" v-if="produit.type_livraison === 'dhl'">DHL(Poste)</option>
			                                  <option v-for="typeLivraison in typeLivraisons" value="vc" v-if="typeLivraison.vendeur_id === produit.vendeur_id && typeLivraison.type_livraison != produit.type_livraison &&  typeLivraison.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                  <option v-for="typeLivraison in typeLivraisons" value="cv" v-if="typeLivraison.vendeur_id === produit.vendeur_id && typeLivraison.type_livraison != produit.type_livraison &&  typeLivraison.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                  <option v-for="typeLivraison in typeLivraisons" value="dhl" v-if="typeLivraison.vendeur_id === produit.vendeur_id && typeLivraison.type_livraison != produit.type_livraison &&  typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
											</select>
										
									</td>
									<td class="column-2 p-l-100">{{produit.prix}} DA</td>
								</tr>

								

								
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 " v-on:click="openCommande()">
								Commander
							</div>
						</div>
					</div>
				</div>
			</div>
		
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="p-b-30 p-l-40">
					<h4 class="ltext-102  cl2">
						Commande de Tahraoui Alaâ
					</h4>
				</div>

				<div class="row">
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

										<div class="table_row flex-t p-b-20" v-for="produit in produitCommandes">
											<div class="column-1">
												<div class="how-itemcart1" style="height: 80px">
													<img :src="'storage/produits_image/'+ produit.image" alt="IMG">
												</div>
											</div>
											<div class="column-2 p-l-40 p-r-40 p-t-10">{{produit.prix}} DA
											</div>
											<div class="column-2 p-l-40 ">
												<div class="input-group mb-3 ">
													<div   v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</div>
					                                  <div  v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</div>
					                                  <div  v-if="produit.type_livraison === 'dhl'">DHL(Poste)</div>	
												</div>
												<div class="flex-t m-t--10">
													<div>Couleur: {{produit.nom}}</div>
													<div v-if="produit.taille != null">&nbsp&nbsp/&nbsp&nbspTaille: {{produit.taille}}</div>
												</div>
											</div>
										</div>
										
								  </div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30 m-l-30">
						<div class=" p-t-5 p-lr-0-lg">
							
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
													<input class="form-control" id="Numero" type="text" placeholder="Numero Telephone" >
												</div>
											</div>
										</div>

										<div class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Email
											</div>
											<div class="size-219 ">
												<div class=" bg0">
													<input class="form-control m-r-30" id="Email" type="text" placeholder="Email" >
												</div>
											</div>
										</div>

										<div v-if="adrresse" class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												Adrrsse
											</div>
											<div class="size-219">
												<div class="bg0">
													<input class="form-control m-r-30" id="adrrsse" type="text" placeholder="Adrrsse">



												</div>
											</div>
										</div>

										<div v-if="codePostale" class="form-group flex-w p-b-10">
											<div class="size-205 cl2 m-r-2" style="font-size: 15px;">
												code Postale
											</div>
											<div class="size-219">
												<div class="bg0">
													<input class="form-control m-r-30" id="code" type="text" placeholder="code Postale" >
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
										<button class=" stext-101 cl0 size-1044 bg11 bor1 trans-04">
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
		

<?php $__env->stopSection(); ?>
<?php $__env->startPush("javascripts"); ?>
 
<script>
        window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               "produitCmds"   => $produitCmds,
               'color'         => $color,
               'taille'         => $taille,
               'typeLivraison'         => $typeLivraison,
               "url"      => url("/")  
          ]); ?>;
</script>
<script>

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

	    },
	    methods: {
	    	ProduitCommande:function(){
	    	    axios.get(window.Laravel.url+'/panier')
                .then(response => {
                	this.produitCommandes = window.Laravel.produitCmds;
                	this.colors = window.Laravel.color;
                	this.tailles = window.Laravel.taille;
                	this.typeLivraisons = window.Laravel.typeLivraison;
                	
                  console.log("response", this.produitCommandes)
                  console.log("tailles", this.tailles)
                  console.log("colors", window.Laravel.color)
                })                     
                .catch(error =>{
                           console.log('errors :' , error);
                })
	    	},
	    	openCommande: function(){
	    		
	    		$('.js-modal1').addClass('show-modal1');
	    		this.produitCommandes.forEach(key => {
	    			if(key.type_livraison == "vc"){
	    				this.adrresse = true;
	    			}
	    			if(key.type_livraison == "dhl"){
	    				this.codePostale = true;
	    			}
	    		})
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/panier_visiteur.blade.php ENDPATH**/ ?>