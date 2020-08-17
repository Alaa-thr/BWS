@extends('layouts.template_clinet')

@section('content')

<head>
      <title>{{ ( 'Mes Commandes') }}</title>
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
                <ul class="header-cart-wrapitem w-full" >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier" >
                        <div class="header-cart-item-img"  @click="deleteProduitPanier(command)">
                        <img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" 
                        alt="IMG-PRODUCT"  style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoris" v-if="fv.id === command.produit_id" >
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
                    
                <div class="header-cart-total w-full p-tb-40" v-for="p in prix">
                        Total: @{{p.prixTo}} DA
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
            <div class="flex-t col-md-12">
              <div class="flex-t col-md-9">
                  <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected" style="margin-top: 5px;">
                  <label for="article"></label> 
                  <h4 style="margin-top: -6px;margin-left: 10px;">Commande </h4>
              </div>
              <div class="flex-t col-md-3" >
                <div class="col-md-5">
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; float: right;" v-on:click="deleteArrayArticle()"><b>Supprimer</b></button>
                </div>
                <div class="col-md-3" >
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px;" ><b>Annuler</b>
                   </button>
                </div>
               </div>
            </div>        
            <hr >       
                      
                    
          <div class="card-body"  v-for="commandec in commandeclient" >
            <div class="card-head"  id="cmddd"   >              
                <div class="row col-md-12"  >
                  
                  <div class="row  col-md-12"  > 
                    <div class=" col-md-12 flex-t" >
                       <div class="flex-t col-md-7" v-if="selectall">
                         <input type="checkbox"  :id="commandec.id" :value="commandec.id" v-model="checkedArticles" @change="changeButton(commandec)">
                        <label id="txt" :for="commandec.id" style="; margin-left: 10px;">Commande @{{commandec.id}}</label>
                      </div>
                      <div class="flex-t col-md-7" v-else>
                        <input type="checkbox" :id="commandec.id" :value="commandec.id"  v-model="articleIds" @click="deselectArticle(commandec.id)">
                        <label id="txt" :for="commandec.id" style=" margin-left: 10px;">Commande @{{commandec.id}}</label>
                      </div>
                      <div  class="m-t--7 col-md-4 js-show-modal1" v-on:click="AfficheInfo(commandec.id)" style="cursor: pointer;">
                          <p id="txt" style="float: right;">  @{{commandec.date}}</p>
                      </div>
                      <div class="col-md-2 dropdown m-t-5" style="cursor: pointer;">
                        <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                          <i class="fas fa-ellipsis-v"  style="color: black"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" >
                          <a  v-on:click="pdf(commandec.id)" class="dropdown-item"  style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Télécharger
                          </a>
                          <a class="dropdown-item js-show-modal1" v-on:click="AfficheInfo(commandec.id)" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Afficher Plus
                          </a>
                          <a class="dropdown-item" v-on:click="deleteCommandeVendeur(commandec)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-12 flex-t m-b-10 js-show-modal1" v-on:click="AfficheInfo(commandec.id)" style="cursor: pointer;">
                      <div  class="m-l--25 col-md-9" v-if="commandec.address">
                       
                         <p id="txt" v-if="commandec.address!= null && commandec.code_postale == null">Address: @{{commandec.address}}</p> 
                         <p id="txt" v-if="commandec.address!= null && commandec.code_postale != null">Address: @{{commandec.address}} / Code postal: @{{commandec.code_postale}}</p> 
                      </div>
                      <div class="m-l--25 col-md-9"  v-else >
                        <p id="txt"  >Code postal: @{{commandec.code_postale}}</p>
                      </div>
                      
                      <div class="col-md-4">
                        <p id="txt" style="" >Prix Totale: @{{commandec.prix_total}} DA </p>
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
 
<!-- Modal1 for laptob-->
<div class="wrap-modal11 js-modal1 p-t-40 p-b-20 p-l-15 p-r-15" id='app2'  >
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container m-t-35"  >
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent"  >
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
      <img src="images/icons/icon-close.png" alt="CLOSE">
    </button>
          <div class="p-b-30 p-l-40">
            <h4 class=" cl2">
              Commande de {{strtoupper ($client->nom)}}   {{strtoupper ($client->prenom)}}
            </h4>
          </div>
  
          <div class="row"  >
            <div class="col-md-7 " >
              <div class="p-l-30 p-lr-0-lg" >
                <div class="wrap-slick3 flex-sb flex-w"  id="cb">
                  <div class="p-t-55 p-b-20 " >
                    <h4 class="cl13 p-l-70">
                      Vos Produits
                    </h4>
                  </div>
                  <div class="div1">
                    <div>
                      <div class="table_row flex-t p-b-20" v-for="produit in commandeclient2" >
                        <div class="column-1">
                          <div class="how-itemcart1" >
                            <img :src="'storage/produits_image/'+ produit.image" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-10">@{{produit.qte}} x @{{produit.prix_produit}} DA
                        </div>
                        <div class="column-2 p-l-40 ">
                          <div class="input-group mb-3 ">
                            <div   v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison/ @{{produit.type}} DA</div>
                            <div  v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</div>
                            <div  v-if="produit.type_livraison === 'dhl'">DHL(Poste)</div>  
                          </div>
                          <div class="flex-t m-t--10">
                            <div>Couleur: @{{produit.nom}}</div>
                            <div v-if="produit.taille != 0">&nbsp&nbsp/&nbsp&nbspTaille: @{{produit.taille}}</div>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 p-b-30" >
              <div class=" p-t-5 " >
                
                <!--  -->
                <div class="p-t-19" >
                  <div class="p-b-60  p-l-40">
                    <h4 class="cl13 p-l-50">
                      Vos Informations
                    </h4>
                  </div>
                 <div class="p-b-10 col-md-12">
                    <form class="m-l-50 col-md-12" >
                      <div class="form-group flex-w p-b-10 col-md-12" >
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Numero Telephone
                        </div>
                        <div class="size-219 col-md-12">
                          <div class=" bg0">
                            <input class="form-control" id="nom" type="text" :value="commandeclientD.numero_tlf" Disabled >
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10 col-md-12">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Email
                        </div>
                        <div class="size-219  col-md-12">
                          <div class=" bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.email" Disabled>
                          </div>
                        </div>
                      </div>
                      <div class="form-group flex-w p-b-10 col-md-12" v-if="commandeclientD.address != null">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Ville
                        </div>
                        <div class="size-219 col-md-12">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.ville" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10 col-md-12" v-if="commandeclientD.address != null">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Adrrsse
                        </div>
                        <div class="size-219 col-md-12">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.address" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10 col-md-12"  v-if="commandeclientD.code_postale != null">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          code Postale
                        </div>
                        <div class="size-219 col-md-12">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.code_postale" Disabled>
                          </div>
                        </div>
                      </div>
  
                    </form>
                  </div>
                  <!--  -->
  
                  <div class="flex-w flex-r-m p-b-10 col-md-12">
                    <div v-on:click="deleteCommande2(commandeclientD)">
                      <button class="cl0 size-102 bg10 bor1 trans-04 m-r-5" 
                      >
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


@endsection




@push("javascripts")




<script>
    window.Laravel = {!! json_encode([
           "csrfToken"  => csrf_token(),
           "article"   => $article,
           "idAdmin" => $idAdmin,
           'cmd'    => $cmd,
           'client'    => $client,
           'ImageP'         => $ImageP,
           'Fav'         => $Fav,
           'command'         => $command,
           'prixTotale'   => $prixTotale,
           "url"      => url("/")  
      ]) !!};
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    commandeclient2: [],
    commandeclientD: [],
    openInfo: false,
    hideModel: false,
    detaillsA: {
      idA: 0,
    },
             
  },
methods: {

   deleteCommande2(cmd){
      $('.js-modal1').removeClass('show-modal1');
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
                axios.get(window.Laravel.url+'/deletecommande/'+cmd.id)
                  .then(response => {
                    if(response.data.etat){
                      app.commandeclient.forEach(key=>{
                        if(key.id == cmd.id ){
                        
                            var position = app.commandeclient.indexOf(key);
                        app.commandeclient.splice(position,1);
                        }
                      })
                        
                        app.checkedArticles.length = [];
                        app.suppr=false;
                        app.artilcesDelete = [];
                        app.selectall = true;
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
  detaillsCommande: function(){
    axios.post(window.Laravel.url+'/detaillsacommande', this.detaillsA)

        .then(response => {
             this.commandeclient2 = response.data.cmd;
             this.commandeclientD = this.commandeclient2[0];
             this.commandeclient2.forEach(key=>{
              
                  key['type'] = 0;
                
             })
             this.commandeclient2.forEach(key=>{
              response.data.type_prix.forEach(key1=>{
                if(key.type_livraison == 'vc' && key.vendeur_id == key1.vendeur_id){
                  key['type'] = key1.prix
                }
              })
             })
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
  tt: [],
  },
methods: {
    deleteCommandeVendeur($cmd){
      app2.deleteCommande2($cmd);
    },
   deleteArrayArticle:function(){
        if(this.artilcesDelete.length == 0){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Il ya aucun Commande a supprimer!',

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
              axios.get(window.Laravel.url+'/deletecommande/'+key.id)
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
    pdf: function(idCmd){

      Swal.fire(
          "",
          "Le telechargement de votre commande sera commencé dans quelque seconde",
          "success"
      )
        axios.get(window.Laravel.url+'/dynamic_pdf/pdf/'+idCmd)
         .then(response => {

          })
          .catch(error =>{
            console.log('errors :' , error);
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
                     this.tt = window.Laravel.article.data;
                     this.tt.forEach(key1 =>{
                        for(i=0; i<window.Laravel.cmd.length; i++ ){
                            if(key1.id == window.Laravel.cmd[i].id && key1.client_id == window.Laravel.cmd[i].client_id){

                               this.commandeclient.push({id: key1.id ,address:window.Laravel.cmd[i].address,date:window.Laravel.cmd[i].date,prix_total:window.Laravel.cmd[i].prix_totale,code_postale: window.Laravel.cmd[i].code_postale});
                                i = window.Laravel.cmd.length;
                            }
                       }
                     });
                   
                     

                })
                .catch(error =>{
                     console.log('errors :' , error);
                })
  },
  deselectArticle: function(article){
         this.artilcesDelete.forEach(key => {
              if(key.id == article){
                 var position = this.artilcesDelete.indexOf(key);
                      this.artilcesDelete.splice(position,1);                    
              } 
        
        });             
    },
  changeButton: function(a){

              if(this.checkedArticles.length > 0){
                this.suppr=true;
                this.artilcesDelete.unshift(a);
              }
              else{
                this.artilcesDelete = [];
                this.suppr=false;
                
              } 
              if(this.checkedArticles.length < this.artilcesDelete.length){
              
                 this.artilcesDelete = this.artilcesDelete.filter(function(item) { return item != a; });
              }       
  }, 
  AnnulerSel: function(){

            this.articleIds.length = [];
            this.checkedArticles.length = [];
            this.changeButton(null);
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

},  
created:function(){
  this.get_commande_client();
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
          prix:[],
        },
        methods:{
          deleteProduitPanier: function(produit){
           
                  axios.delete(window.Laravel.url+'/deleteproduitpanier/'+produit.produit_id+'/'+produit.qte+'/'+produit.taille+'/'+produit.type_livraison+'/'+produit.couleur_id)
                    .then(response => {
                      if(response.data.etat){
                               var position = this.ProduitsPanier.indexOf(produit);
                               this.ProduitsPanier.splice(position,1);
                               if(this.ProduitsPanier.lenght == 0){
                                  this.prix[0].prixTo = 0;
                               }
                               else{
                                  this.prix[0].prixTo -= produit.prix_produit*produit.qte;
                               }


                      }                     
                    })
                    .catch(error =>{
                               console.log('errors :' , error);
                    })

              
          },
          get_commande_client: function(){
            axios.get(window.Laravel.url+'/commandeClient')
              .then(response => {
                this.favoris = window.Laravel.Fav;
                this.imagesproduit = window.Laravel.ImageP;
                this.ProduitsPanier = window.Laravel.command;
                this.prix = window.Laravel.prixTotale;


               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          

        },
        created:function(){
            this.get_commande_client();

        }
     })
</script>

@endpush