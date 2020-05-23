@extends('layouts.template_clinet')
 
@section('content')

<head>
      <title>{{ ( 'Mes Commandes ') }}</title>
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
                    <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected">
                    <label for="article"></label>
                    <h4 style="margin-top: -6px;">Commandes</h4>
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
       <input type="checkbox" :id="commandec.id" :value="commandec.id" v-model="checkedArticles" @change="changeButton(commandec)">
      <label :for="commandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>
    <div v-else ><div id="ch1">
      <input type="checkbox" :id="commandec.id" :value="commandec.id" v-model="articleIds" @click="deselectArticle(commandec.id)"></div>
      <label :for="commandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>


  <div class="card-head"  id="cmd"  >              
    <div class="row" >
    <div class="col-md-4 pr-1" >
      <div style="margin-left:22px">
          <p class="" id="t" >commande @{{commandec.id}} </p>
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
      <a   v-on:click="AfficheInfo(commandec.id)"  class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteCommande(commandec)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
       </div><p class=""  id="tt" >@{{commandec.created_at}}</p>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 pr-1">
      <div class="">
      <label  id="ttt">Addresse : @{{commandec.address}}</label>
      </div>
    </div>
    <div class="col-md-4 px-1">
     
    </div>
    <div class="col-md-4 pr-3">
      <div class="">
      <label  id="tttt">Prix Total : @{{commandec.prix_total}}</label>
      </div>
    </div>
    </div>      
  </div>

  
    
</div>                   {{$article->links()}}
              </div>

            </div>      
          </div>
        </div>      
      </div>
    </div>

  <footer class="footer">
    <div class=" container-fluid ">
      <nav>
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              BASMAHW&S
            </a>
          </li>
          <li>
            <a href="http://presentation.creative-tim.com">
              A Propos
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright" id="copyright">
        &copy; <script>
          document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
        </script>, Designer par <a href="https://www.invisionapp.com" target="_blank">BS</a>. Codé par <a href="https://www.creative-tim.com" target="_blank">BASMAHW&S</a>.
      </div>
    </div>
  </footer>
</div>
<!-- Modal1 for laptob-->
<div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel" style="margin-top:122px;">
  <div class="overlay-modal11 " v-on:click="CancelArticle(art)"></div>

  <div class="container">

 
    <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 985px;"   v-for="commandec in commandeclient2">

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
      <div class="">
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl">
      <a   v-on:click="AfficheInfo(commandec.id)"  class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteCommande(commandec)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
       </div><p class=""  id="tt" >@{{commandec.created_at}}</p>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 pr-1">
      <div class="">
      <label  id="ttt">Addresse : @{{commandec.address}}</label>
      </div>
    </div>
    <div class="col-md-4 px-1">
     
    </div>
    <div class="col-md-4 pr-3">
      <div class="">
      <label  id="tttt">Prix Total : @{{commandec.prix_total}}</label>
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
           "idAdmin" => $idAdmin,
           "url"      => url("/")  
      ]) !!};
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    commandeclient2: [],
    openInfo: false,

    hideModel: false,
   
 
 
    detaillsA: {
      idA: 0,
    },

  
  
               
  },
methods: {


  detaillsCommande: function(){

    axios.post(window.Laravel.url+'/detaillsacommande', this.detaillsA)

        .then(response => {

             this.commandeclient2 = response.data;
             
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
              axios.delete(window.Laravel.url+'/deletecommande/'+key.id)
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
 
   deleteCommande: function(article){
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
          axios.delete(window.Laravel.url+'/deletecommande/'+article.id)
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
    app2.detaillsCommande();
  },
  get_commande_client: function(){
            axios.get(window.Laravel.url+'/commandeClient')

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
<<<<<<< HEAD
             
        },
        deselectArticle: function(article){
             this.artilcesDelete.forEach(key => {
                  if(key.id == article){
                      var position = this.artilcesDelete.indexOf(key);
                      this.artilcesDelete.splice(position,1);                    
                  } 
            });             
        },
        AfficheInfo: function($id){
        app2.hideModel = true; 
        app2.openInfo = true;
        app2.detaillsC.idC= $id;
        app2.detaillsCommande();
      },
     
     },
        created:function(){
            this.getCommande();
=======
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
  this.get_commande_client();
}
});

>>>>>>> fbd4bd2206491efaad28d05cc139da022e628496

</script>

@endpush