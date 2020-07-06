@extends('layouts.template_clinet')

@section('content')

<head>
      <title>{{ ( 'Mes Demandes ') }}</title>
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
                <ul class="header-cart-wrapitem w-full" v-for="command in ProduitsPanier" >
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img" v-for="imgP in imagesproduit" id="profi">
                        <img v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" 
                        alt="IMG-PRODUCT"  style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoris" v-if="fv.id === command.produit_id" id="bb">
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
<div class="main-panel" id="main-panel">
  
  <div class="panel-header panel-header-sm" >
  </div>
  <div class="content" id="app">
    <div class="row">
   
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" >
          @if(session()->has('success'))
<div class="row"> 
<div class="alert alert-success" style="  margin-left:33px;width: 960px;">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;

</button>
 {{ session()->get('success')}}
</div>

</div>
      @endif
                <div class="flex-t">
                    <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected" style="margin-top: 5px;">
                    <label for="article"></label> 
                   
                    <h4 style="margin-top: -6px;margin-left: 10px;">Demandes</h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"  v-for="demandec in demandeclient" >

<div v-if="selectall" id="c">
       <input type="checkbox"  style=" margin-left: 10px;" :id="demandec.id" :value="demandec.id" v-model="checkedArticles" @change="changeButton(demandec)">
      <label :for="demandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>
    <div v-else id="c">
      <input type="checkbox" :id="demandec.id" :value="demandec.id" style="margin-left: 10px;" v-model="articleIds" @click="deselectArticle(demandec.id)">
      <label :for="demandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>


  
    <div class="card-head"  id="cmd"   >              
    <div class="row"  >
    <div >
  <p class="cvendeur"  id="txt" >
  Demande   @{{demandec.id}}</p>
      </div> 
 
    
    <div  class="col-md-4 pr-1" id="cv">
      <div style="margin-left:22px" >
          <p id="txt" > @{{demandec.created_at}} </p>
      </div>
       
    </div>
   
    <div class="col-md-4 pl-1" id="a">
      <div class="" id="b" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point"  style="  margin-left: 245px;">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl" >
      <a   v-on:click="AfficheInfo(demandec.id)"  class="dropdown-item js-show-modal1" 
      style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteCommandeVendeur(demandec)"
    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
    Supprimer</a>
       </div>
      
    </div>    

    </div>      
    <div  class="col-md-4 pr-1" id="cb">
      <div  >
          <p id="txt" > Addresse : @{{demandec.address}}</p>
      </div>
       
    </div>

    <div  class="col-md-4 pr-1" id="cbb">
      <div  >
          <p id="txt" >CV_client : @{{demandec.cv_client}}</p>
      </div>
       
    </div>

  </div>      

  


    
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

  <div class="container">

 
    <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 985px;"   v-for="demandec in demandeclient2">

      <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="hideModel = false">
        <img src="images/icon-close.png" alt="CLOSE">
      </button>
      

      <div class="row" >
    <div class="col-md-4 pr-1" >
      <div style="margin-left:22px">
          <p class="" id="t" >Demande @{{demandec.id}}  </p>
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
      <a   v-on:click="AfficheInfo(demandec.id)"  class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteDemande(demandec)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
       </div><p class=""  id="tt" >@{{demandec.created_at}}</p>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 pr-1">
      <div class="">
      <label  id="ttt">Addresse : @{{demandec.address}}</label>
      </div>
    </div>
    <div class="col-md-4 px-1">
     
    </div>
    <div class="col-md-4 pr-3">
      <div class="">
      <label  id="tttt">CV_client : @{{demandec.cv_client}}</label>
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
               'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'command'         => $command,
           "url"      => url("/")  
      ]) !!};
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    demandeclient2: [],
    openInfo: false,

    hideModel: false,
   
 
 
    detaillsA: {
      idA: 0,
    },

  
  
               
  },
methods: {


  detaillsDemande: function(){

    axios.post(window.Laravel.url+'/detaillsademande', this.detaillsA)

        .then(response => {

             this.demandeclient2 = response.data;
             
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
	demandeclient: [],
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
        text: "De supprimer cette Demande?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletedemande/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.demandeclient.indexOf(key);
                            this.demandeclient.splice(position,1);      
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
            'Votre demande a été supprimé.',
            'success'
          )
        }
        
        })
   },
 
   deleteDemande: function(article){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette Demande?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletedemande/'+article.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.demandeclient.indexOf(article);
                       this.demandeclient.splice(position,1);
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
        'Votre demande a été supprimé.',
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
    app2.detaillsDemande();
  },
  get_demande_client: function(){
            axios.get(window.Laravel.url+'/demandeClient')

                .then(response => {
                     this.demandeclient = window.Laravel.article.data;
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
            for (user in this.demandeclient) {
                this.articleIds.push(this.demandeclient[user].id);
                this.artilcesDelete.push(this.demandeclient[user]);
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
  this.get_demande_client();
}
});


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
          get_demande_client: function(){
            axios.get(window.Laravel.url+'/demandeClient')
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
            this.get_demande_client();

        }
     })
</script>

@endpush