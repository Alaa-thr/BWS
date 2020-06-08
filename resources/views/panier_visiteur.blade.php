@extends('layouts.template_visiteur')
@section('content')

	
	<head>
		<title>{{ ( 'Panier') }}</title>
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
	<form class="bg0 p-t-75 p-b-85" id='app'>
		<div class="container">
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
									<th class="column-6">Livraison / Prix</th>
									<th class="column-5 p-l-100">Prix Total</th>
								</tr>

								<tr class="table_row" v-for="produit in produitCommandes">
									<td class="column-1">
										<div class="how-itemcart1">
											<img :src="'storage/produits_image/'+ produit.image" alt="IMG">
										</div>
									</td>
									<td class="column-2">@{{produit.Libellé}}</td>
									<td class="column-3">@{{produit.prix}}</td>
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
									<td class="column-6">
										<div class="input-group mb-3">
											<select class="custom-select" id="inputGroupSelect01">
											  <option  value="vc" v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                  <option value="cv" v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                  <option value="dhl" v-if="produit.type_livraison === 'dhl'">DHL(Poste)</option>
											</select>
										</div>
									</td>
									<td class="column-5">@{{produit.prix}} DA</td>
								</tr>

								

								
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 js-show-modal1">
								Commander
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		

@endsection
@push("javascripts")
 
<script>
        window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "produitCmds"   => $produitCmds,
               "url"      => url("/")  
          ]) !!};
</script>
<script>
	var app = new Vue({
	    el: '#app',
	    data:{
	      produitCommandes: [],

	    },
	    methods: {
	    	ProduitCommande:function(){
	    	    axios.get(window.Laravel.url+'/panier')
                .then(response => {
                	this.produitCommandes = window.Laravel.produitCmds;
                  console.log("response", this.produitCommandes)
                })                     
                .catch(error =>{
                           console.log('errors :' , error);
                })
	    	},
	    },
	    mounted:function(){
	    	this.ProduitCommande();
	    }
	});
</script>
@endpush