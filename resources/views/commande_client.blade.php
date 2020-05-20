@extends('layouts.template_clinet')
@section('content')

	
	<head>
		<title>{{ ( 'Mes Commandes') }}</title>
	</head>
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Mes Commandes </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>


	<div class="content" id="pr">
     <div class="row"  >
        <div class="col-md-8" id="app">
          <div class="card"  id="xc" style=" width: 1000px;" >
            <div class="card-header m-b-35">
              <h5 class="titre" >Commande</h5>
            </div>
            <div class="card-body"  >
      				<form class="bg0 p-t-50 " v-for="commande in commandesClient">
      					<!--commande 1-->
      					<div class="card-head"  id="cmd" >              
      					  <div class="row" >
      						<div class="col-md-4 pr-1" >
      						  <div style="margin-left:22px">
      							<input class="increase" type="checkbox" />         
      							   <p class="" id="t" >Commande @{{commande.id}} </p>
      						  </div>
      						</div>
      						<div class="col-md-4 px-1">
      						 
      						</div>
      						<div class="col-md-4 pl-1">
      						  <div class="">
      							<a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point">
      							  <i class="fas fa-ellipsis-v"  id="y"></i>
      						   </a>
      						  <div class="dropdown-menu " x-placement="right-start" id="pl">
      						<a  href="#" id="vv"  class=" trans-04 p-lr-11 icon-header-noti  js-show-modal1" >Plus de Détails</a><br>
      						<a href="#" id="vv" style="padding-left:12px">Supprimer</a>
      						   </div><p class=""  id="tt" >@{{commande.created_at}}</p>
      						  </div>
      						</div>
      					  </div>
      					  <div class="row">
      						<div class="col-md-4 pr-1">
      						  <div class="">
      							<label  id="ttt">Addresse : @{{commande.address}}</label>
      						  </div>
      						</div>
      						<div class="col-md-4 px-1">
      						 
      						</div>
      						<div class="col-md-4 pr-3">
      						  <div class="">
      							<label  id="tttt">Prix Total : @{{commande.prix_total}}</label>
      						  </div>
      						</div>
      					  </div>      
      					</div>
      					
      					  
      				</form>
            </div>
          </div>
        </div>
	   </div>
  </div>
      <!--***************************************************************************************************
  ****************************************************************************************************-->
  	<!-- Modal1 -->
    <div class="wrap-modal11 js-modal1 p-t-40 p-b-20 p-l-15 p-r-15">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container" style="margin-top: 30px; margin-left:-52px;">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="p-b-30 p-l-40">
            <h4 class=" cl2">
              Commande de Tahraoui Alaâ
            </h4>
          </div>
  
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="p-l-50 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
                  <div class="p-t-20 p-b-20 p-l-50">
                    <h4 class="cl13 p-l-70">
                      Vos Produits
                    </h4>
                  </div>
                  <div class="div1">
                    <div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-04.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">DHL / 36.00 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-05.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-01.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-02.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27 ">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-03.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/product-06.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/product-05.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
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
                  <div class="p-b-60  p-l-40">
                    <h4 class="cl13 p-l-50">
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
                            <input class="form-control" id="nom" type="text" placeholder="0540844782" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Email
                        </div>
                        <div class="size-219 ">
                          <div class=" bg0">
                            <input class="form-control m-r-30" id="nom" type="text" placeholder="thralae@gmail.com" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Adrrsse
                        </div>
                        <div class="size-219">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" placeholder="Tlemcen-bouhanak" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          code Postale
                        </div>
                        <div class="size-219">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" placeholder="13600" Disabled>
                          </div>
                        </div>
                      </div>
  
                    </form>
                  </div>
                  <!--  -->
  
                  <div class="flex-w flex-r-m p-b-10">
                    <div>
                      <button class="cl0 size-102 bg10 bor1 trans-04 m-r-5">
                        Supprimer
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
<!--****************************************************************************************************
  ****************************************************************************************************-->
  
@endsection
@push('javascripts')



  

<script> 
        window.Laravel = {!! json_encode([

               'csrfToken'      => csrf_token(),                                 
                'url'           => url('/'), 
          ]) !!};
</script>
<script>
     var app = new Vue({
        el: '#app',
        data:{
          message:'hello',
          commandesClient: []
        },
        methods:{
          getCommande: function(){
            axios.get(window.Laravel.url+'/getcommande')
              .then(response => {
                this.commandesClient = response.data;
          
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          }

        },
        created:function(){
            this.getCommande();

        }
     })
</script>
@endpush