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

             <div class="flex-t">
                        <input type="checkbox" id="" @change="selectAll()" v-model="allSelected">
                        <label for=""></label>
                        <h4 style="margin-top: -6px;">Articles</h4>
                    </div>

                <div class="txt-right"style="margin-top: -40px; " >
                      <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                      </button>
                      
                      
                      <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                      </button>
                   </div>
             
                
                <hr>       

                
            <div class="card-body"  >
      				<form class="bg0 p-t-50 " v-for="commande in commandesClient">

              <div v-if="selectall">
                    <input type="checkbox" :id="commande.id" :value="commande.id" v-model="checkedArticles" @change="changeButton(commande)">
                    <label :for="commande.id" style="margin-top: 40px; margin-left: 10px;"></label>
                  </div>
                  <div v-else>
                    <input type="checkbox" :id="commande.id" :value="commande.id" v-model="articleIds" @click="deselectArticle(commande.id)">
                    <label :for="commande.id" style="margin-top: 40px; margin-left: 10px;"></label>
                  </div>


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
                    <a   v-on:click="AfficheInfo(commande.id)"  class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
                  <a class="dropdown-item" v-on:click="deleteArticle(commande)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
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
    <!-- Modal1 for laptob-->
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel">
      <div class="overlay-modal11 " v-on:click="CancelArticle(art)"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 1000px;"   v-for="commande in commandesClient">
          <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="hideModel = false">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
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
                    <a   v-on:click="AfficheInfo(commande.id)"  class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
                  <a class="dropdown-item" v-on:click="deleteArticle(commande)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
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
      					
        </div>

<!--********************************************************************************************************************************************************************-->
        
       
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


var app2 = new Vue({
      el: '#app2',
      data:{
        articlesadmin2: [],
        openInfo: false,
        hideModel: false,
        detaillsC: {
          idC: 0,
        },
      },
    methods: {
    
      detaillsCommande: function(){

        axios.post(window.Laravel.url+'/detaillscommande', this.detaillsC)

            .then(response => {

                 this.articlesadmin2 = response.data;
                 
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
   
   
      CancelArticle(article){
        this.modifier = false ;
        this.hideModel = false;
       
       

     
          
      },

    },    
});


     var app = new Vue({
        el: '#app',
        data:{
          message:'hello',
          commandesClient: [],
          suppr: false,
      checkedArticles: [],
      artilcesDelete: [],
      allSelected: false,
      articleIds: [],
      selectall: true,

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
          },
          deleteArrayArticle:function(){
            if(this.artilcesDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucun Article a supprimer!',

              }).then((result) => {
                this.allSelected = false;
                this.suppr=false;
                this.selectall = true;
               
             })
              return;
            }
            Swal.fire({
            title: 'Etes vous?',
            text: "De supprimer cette Atricle?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, Supprimer!'
          }).then((result) => {
              if (result.value) {
                this.artilcesDelete.forEach(key => {
                  axios.delete(window.Laravel.url+'/deletearticle/'+key.id)
                    .then(response => {
                      if(response.data.etat){
                                            
                                var position = this.commandesClient.indexOf(key);
                                this.commandesClient.splice(position,1);      
                      }                    
                    })
                    .catch(error =>{
                               console.log('errors :' , error);
                    })
                })
                    this.allSelected = false;
                    this.checkedArticles.length = [];

                    this.artilcesDelete = [];
                    this.selectall = true;
              Swal.fire(
                'Effacé!',
                'Votre article a été supprimé.',
                'success'
              )
            }
            
            })
       },
     
      deleteArticle: function(article){
            Swal.fire({
        title: 'Etes vous?',
        text: "De supprimer cette Atricle?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
              axios.delete(window.Laravel.url+'/deletearticle/'+article.id)
                .then(response => {
                  if(response.data.etat){
                           var position = this.commandesClient.indexOf(article);
                           this.commandesClient.splice(position,1);
                          
                           this.checkedArticles.length = [];
                           this.suppr=false;
                           this.artilcesDelete = [];
                           this.selectall = true;
                  }                     
                })
                .catch(error =>{
                           console.log('errors :' , error);
                })
          Swal.fire(
            'Effacé!',
            'Votre article a été supprimé.',
            'success'
          )
        }
        
        })
      },
      
      
     
    
    
      changeButton: function(a){
        this.artilcesDelete.unshift(a);
        if(this.checkedArticles.length > 0){
          this.suppr=true;
        }
        else{
          this.artilcesDelete = [];
          this.suppr=false;
        }        
      }, 
      AnnulerSel: function(){
        this.checkedArticles.length = [];
        this.changeButton();
        this.selectall = true;
        this.allSelected = false;
      },
     
      selectAll: function() {
            this.selectall = false;
            if (this.allSelected) {
                for (user in this.commandesClient) {
                    this.articleIds.push(this.commandesClient[user].id);
                    this.artilcesDelete.push(this.commandesClient[user]);
                }
                this.suppr=true;
             }
             else{
              this.articleIds = [];
              this.artilcesDelete= [];
              this.suppr=false;
              this.selectall = true;
              this.checkedArticles = [];
            }
             
        },
        deselectArticle: function(article){
             this.artilcesDelete.forEach(key => {
                  if(key.id == article){
                      var position = this.artilcesDelete.indexOf(key);
                      this.artilcesDelete.splice(position,1);                    
                  } 
            });             
        }

        },
        AfficheInfo: function($id){
        app2.hideModel = true; 
        app2.openInfo = true;
        app2.detaillsC.idC= $id;
        app2.detaillsCommande();
      },
     
     
        created:function(){
            this.getCommande();

        }
     })
</script>
@endpush