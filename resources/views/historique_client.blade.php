@extends('layouts.template_clinet')
 
@section('content')

<head>
      <title>{{ ( 'Historique ') }}</title>
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
                    <h4 style="margin-top: -6px;margin-left: 10px;">Historiques</h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"   v-for="historiquec in historiqueclient" >

<div v-if="selectall" >
       <input type="checkbox" :id="historiquec.id" :value="historiquec.id" v-model="checkedArticles" @change="changeButton(historiquec)">
      <label :for="historiquec.id" style="margin-top: 35px; margin-left: 10px;"></label>
    </div>
    <div v-else >
      <div id="ch1">
      <input type="checkbox" :id="historiquec.id" :value="historiquec.id" style="margin-left: -20px;" v-model="articleIds" @click="deselectArticle(historiquec.id)"></div>
      <label :for="historiquec.id" style="margin-top: 35px; margin-left: 10px;"></label>
    </div>


  <div class="card-head"  id="hmdd"  >              
    <div class="row" >
    <div >
  <p class=""  id="hh" >
       @{{historiquec.created_at}}</p>
      </div> 
    <div class="col-md-4 pr-1" v-if="historiquec.produit_id  === null" >
      <div style="margin-left:22px" v-for="imgA in imagesannonce" v-if=" historiquec.annonceE_id  === imgA.id">
          <p class="" id="h" > Vous Avez envoyez  annonce ' @{{imgA.libellé}}'</p>
      </div>
       
    </div>
    
    <div  class="col-md-4 pr-1" v-else="historiquec.annonceE_id  === null" >
      <div style="margin-left:22px" v-for="imgP in imagesproduit" v-if=" historiquec.produit_id  === imgP.id">
          <p class="" id="h" >Vous Avez ajoutez  produit ' @{{imgP.Libellé}}' sur votre panier</p>
      </div>
       
    </div>

    <div class="col-md-4 pl-1" >
      <div class="" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl" >
    <a class="dropdown-item" v-on:click="deleteHistorique(historiquec)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
    Supprimer</a>
       </div>
      
    </div>    

    </div>      

  </div>      

  <hr>

    
</div>                   {{$article->links()}}
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
           "article"   => $article,
           "idAdmin" => $idAdmin,
           'produitCL'         => $produitCL,
           'annoncemploiesCL'         => $annoncemploiesCL,
           "url"      => url("/")  
      ]) !!};
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    openInfo: false,

    hideModel: false,
   
 
 
    detaillsA: {
      idA: 0,
    },

  
  
               
  },
methods: {


  


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
  historiqueclient: [],
  imagesproduit:[],imagesannonce:[],
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
            text: 'Il ya aucun Historique a supprimer!',

          }).then((result) => {
            this.allSelected = false;
            this.suppr=false;
            this.selectall = true;
           
         })
          return;
        }
        Swal.fire({
        title: 'Etes vous?',
        text: "De supprimer cette Historique?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletehistorique/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.historiqueclient.indexOf(key);
                            this.historiqueclient.splice(position,1);      
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
            'Votre historique a été supprimé.',
            'success'
          )
        }
        
        })
   },
 
   deleteHistorique: function(article){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette Historique?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletehistorique/'+article.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.historiqueclient.indexOf(article);
                       this.historiqueclient.splice(position,1);
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
        'Votre historique a été supprimé.',
        'success'
      )
    }
    
    })
  },
 
 
  
  
  
  get_historique_client: function(){
            axios.get(window.Laravel.url+'/historiqueClient')

                .then(response => {
                     this.historiqueclient = window.Laravel.article.data;
                     this.imagesproduit = window.Laravel.produitCL;
                     this.imagesannonce = window.Laravel.annoncemploiesCL;
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
            for (user in this.historiqueclient) {
                this.articleIds.push(this.historiqueclient[user].id);
                this.artilcesDelete.push(this.historiqueclient[user]);
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
  this.get_historique_client();
}
});


</script>

@endpush