@extends('layouts.template_vendeur')

@section('content')

<head>
      <title>{{ ( 'Commande Reçu') }}</title>
  </head>

<div class="main-panel" id="main-panel">
  
  <div class="panel-header panel-header-sm" >
  </div>
  <div class="content" id="app">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" >
                
                <div class="flex-t">
                    <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected" style="margin-top: 5px;">
                    <label for="article"></label>
                    <h4 style="margin-top: -6px;margin-left: 10px;">Commande Reçu</h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"   v-for="commandec in commandeclient" >

<div v-if="selectall" >
       <input type="checkbox"  style=" margin-left: 10px;" :id="commandec.id" :value="commandec.id" v-model="checkedArticles" @change="changeButton(commandec)">
      <label :for="commandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>
    <div v-else ><div id="ch1">
      <input type="checkbox" :id="commandec.id" :value="commandec.id" style="margin-left: 10px;" v-model="articleIds" @click="deselectArticle(commandec.id)"></div>
      <label :for="commandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>


  
    <div class="card-head" >              
    <div class="row"  >
    <div >
  <p class="cvendeur"  id="txt" >
  Commande Numero  @{{commandec.id}}</p>
      </div> 
 
    
    <div  class="col-md-4 pr-1" id="cv">
      <div style="margin-left:22px" >
          <p id="txt" > prix_total : @{{commandec.prix_total}} </p>
      </div>
       
    </div>
   
    <div class="col-md-4 pl-1" id="a">
      <div class="" id="b" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl"  >
      <a   v-on:click="AfficheInfo(commandec.id)"  class="dropdown-item js-show-modal1" 
      style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteCommandeVendeur(commandec)"
    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
    Supprimer</a>
       </div>
      
    </div>    

    </div>      

  </div>      

  <hr  id="cvendeu">

    
</div>                  
              </div>

            </div>     
              {{$article->links()}}
              </div>

            </div>      
          </div>
        </div>      
      </div>
    </div>


</div>
<!-- Modal1 for laptob-->
<div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel" style="margin-top:122px;">
  <div class="overlay-modal11 " v-on:click="CancelArticle(art)"></div>

  <div class="container" >

 
    <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 985px; height:451px;"  v-for="commandec in commandeclient2">

      <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="hideModel = false">
        <img src="images/icon-close.png" alt="CLOSE">
      </button>
      

      <div class="row" >
    <div class="col-md-4 pr-1" >
      <div style="margin-left:22px">
          <p class="" id="t" >commande @{{commandec.id}} </p>
      </div>
    </div>
    <div class="col-md-4 px-1">
     
    </div>
    <div class="col-md-4 pl-1">
      <div class=""style="margin-top: 11px;" >
       
      <p class=""  id="tt" >@{{commandec.created_at}}</p>
      </div>
    </div>
    </div>  
    <hr  id="clr">

    <div class="row" style="margin-left:22px;margin-top:52px;"  v-for="emplC in employeur" v-if="commandec.client_id  === emplC.id">
    <div class="col-md-4 pr-1" >
      <div style="margin-left:-16px;">
          <p class="" id="t" >Les information sur Client @{{commandec.id}} : </p>
      </div>
    </div>
    <div class="col-md-4 px-1" >
    <div class="" style="margin-left:-126px;margin-top:7px;">
       
       <p class=""  id="tt" >@{{emplC.nom}}  @{{emplC.prenom}}  </p>
       </div>
    </div>
    <div class="col-md-4 pl-1"  >
      <div class="" style="margin-left:-211px;margin-top:7px;">
       
      <p class=""  id="tt" > @{{emplC.ville}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Code Postal:@{{emplC.codePostal}} 
 </p>
      </div>
    </div>

    <div class="col-md-4 pl-1"  >
      <div class="" style="margin-left: 200px;margin-top: 51px;">
       
      <p class=""  id="tt" > @{{emplC.email}}  </p>
      </div>
    </div>

    <div class="col-md-4 pl-1"  >
      <div class="" style="margin-left:350px;margin-top: 51px;">
       
      <p class=""  id="tt" >@{{emplC.numeroTelephone}}</p>
      </div>
    </div>
    </div>  


    <hr  id="clr">

    <div class="row" style="margin-left:22px;margin-top:62px;" v-for="emplC in produit" v-if="commandec.produit_id  === emplC.id">
    <div class="col-md-4 pr-1" >
      <div style="margin-left:-16px;">
          <p class="" id="t" >Les produit commandés sont : </p>
      </div>
    </div>
    <div class="col-md-4 px-1" >
    <div class="" style="margin-left:-126px;margin-top:7px;">
       
       <p class=""  id="tt" >@{{emplC.Libellé}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Prix :@{{emplC.prix}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Quantité :@{{commandec.qte}} 
        </p>
       </div>
    </div>
     
    </div>  

    <hr  id="clr">

    <div class="row" style="margin-left:22px;margin-top:42px;">
    <div class="col-md-4 pr-1" >
      <div style="margin-left:-16px">
          <p class="" id="t" >Address:@{{commandec.address}} </p>
      </div>
    </div>
    <div class="col-md-4 px-1">
     
    </div>
    <div class="col-md-4 pl-1">
      <div class="">
       
      <p class=""  id="tt" >Réponse Vendeur :@{{commandec.Réponse_vendeur}}</p>
      </div>
    </div>
    </div>  
    <hr  id="clr">

    <div class="row" style="margin-left:22px;margin-top:52px;">
    <div class="col-md-4 pr-1" >
      <div style="margin-left:-16px">
          <p class="" id="t" >Type Livraison:@{{commandec.type_livraison}} </p>
      </div>
    </div>
    <div class="col-md-4 px-1">
     
    </div>
    <div class="col-md-4 pl-1">
      <div class="">
       
      <p class=""  id="tt" >Ville: @{{commandec.ville}}</p>
      </div>
    </div>
    </div>  

         
      </div>
      </div>

    </div>

<!--********************************************************************************************************************************************************************-->
    
   
   
  </div>
</div>



  





@endsection




@push("javascripts")




<script>
    window.Laravel = {!! json_encode([
           "csrfToken"  => csrf_token(),
           "article"   => $article,
           "idAdmin" => $idAdmin,         'emploC'         => $emploC,  'prV'         => $prV,

           "url"      => url("/")  
      ]) !!};
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    commandeclient2: [],employeur:[],produit:[],
    openInfo: false,

    hideModel: false,
   
 
 
    detaillsA: {
      idA: 0,
    },

  
  
               
  },
methods: {


  detaillsacommandeVendeur: function(){

    axios.post(window.Laravel.url+'/detaillsacommandevendeur', this.detaillsA)

        .then(response => {

             this.commandeclient2 = response.data;
             this.employeur = window.Laravel.emploC;
             this.produit = window.Laravel.prV;

             
        })
        .catch(error =>{
             console.log('errors :' , error);
        })
  },


  CancelArticle(article){
    this.modifier = false ;
    this.hideModel = false;
    this.art = {        
                  id: 0,
                  admin_id: window.Laravel.idAdmin,
                  titre: '', 
                  description: '',
                  image: ''
    };
    this.message = {};
    article.titre = this.oldArt.titre;
    article.description = this.oldArt.description;
  },

},    
});

var app = new Vue({

el: '#app',


data:{
  commandeclient: [],
  suppr: false, 
  checkedArticles: [],
  artilcesDelete: [],
  allSelected: false,
  articleIds: [],
  selectall: true,

  },
methods: {
  
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
        text: "De supprimer cette Commande?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletecommandevendeur/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.commandeclient.indexOf(key);
                            this.commandeclient.splice(position,1);      
                  }                    
                })
                .catch(error =>{
                           console.log('errors :' , error);
                })
            })
                this.allSelected = false;
                this.checkedArticles.length = [];
                this.suppr=false;
                this.artilcesDelete = [];
                this.selectall = true;
          Swal.fire(
            'Effacé!',
            'Votre commande a été supprimé.',
            'success'
          )
        }
        
        })
   },
 
   deleteCommandeVendeur: function(article){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette Commande?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletecommandevendeur/'+article.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.commandeclient.indexOf(article);
                       this.commandeclient.splice(position,1);
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
        'Votre commande a été supprimé.',
        'success'
      )
    }
    
    })
  },
 
 
  
  
  AfficheInfo: function($id){
    app2.hideModel = true; 
    app2.openAjout = false ;
    app2.openInfo = true;
    app2.detaillsA.idA= $id;
    app2.detaillsacommandeVendeur();
  },
  get_commande_vendeur: function(){
            axios.get(window.Laravel.url+'/commandeRecuVendeur')

                .then(response => {
                     this.commandeclient = window.Laravel.article.data;

                })
                .catch(error =>{
                     console.log('errors :' , error);
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
            for (user in this.commandeclient) {
                this.articleIds.push(this.commandeclient[user].id);
                this.artilcesDelete.push(this.commandeclient[user]);
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
created:function(){
  this.get_commande_vendeur();
}
});


</script>

@endpush