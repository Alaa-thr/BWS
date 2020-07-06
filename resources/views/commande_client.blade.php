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
                   
                    <h4 style="margin-top: -6px;margin-left: 10px;">Commande </h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"  v-for="commandec in commandeclient" >

<div v-if="selectall" id="c">
       <input type="checkbox"  style=" margin-left: 10px;" :id="commandec.id" :value="commandec.id" v-model="checkedArticles" @change="changeButton(commandec)">
      <label :for="commandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>
    <div v-else id="c">
      <input type="checkbox" :id="commandec.id" :value="commandec.id" style="margin-left: 10px;" v-model="articleIds" @click="deselectArticle(commandec.id)">
      <label :for="commandec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>


  
    <div class="card-head"  id="cmd"   >              
    <div class="row"  >
    <div >
  <p class="cvendeur"  id="txt" >
  Commande @{{commandec.id}}</p>
      </div> 
 
    
    <div  class="col-md-4 pr-1" id="cv">
      <div style="margin-left:22px" >
          <p id="txt" > @{{commandec.created_at}} </p>
      </div>
       
    </div>
   
    <div class="col-md-4 pl-1" id="a">
      <div class="" id="b" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point"  style="  margin-left: 245px;">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl" >
      <a   v-on:click="AfficheInfo(commandec.id)"  class="dropdown-item js-show-modal1" 
      style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteCommandeVendeur(commandec)"
    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
    Supprimer</a>
       </div>
      
    </div>    

    </div>      
    <div  class="col-md-4 pr-1" id="cb" >
      <div  v-if="commandec.address != null">
          <p id="txt" >Addresse : @{{commandec.address}}</p>
      </div>
       
    </div>

    <div  class="col-md-4 pr-1" id="cbb">
      <div  >
          <p id="txt" >Prix Total : @{{commandec.prix_total}}</p>
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
            <div class="col-md-6 col-lg-6" >
              <div class="p-l-50 p-lr-0-lg" >
                <div class="wrap-slick3 flex-sb flex-w"  id="cb">
                  <div class="p-t-55 p-b-20 p-l-50" >
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
                        <div class="column-2 p-l-40 p-r-40 p-t-10">@{{produit.prix}} DA
                        </div>
                        <div class="column-2 p-l-40 ">
                          <div class="input-group mb-3 ">
                            <div   v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</div>
                                              <div  v-if="produit.type_livraison === 'cv'">Vous apportez votre produit</div>
                                              <div  v-if="produit.type_livraison === 'dhl'">DHL(Poste)</div>  
                          </div>
                          <div class="flex-t m-t--10">
                            <div>Couleur: @{{produit.nom}}</div>
                            <div v-if="produit.taille != null">&nbsp&nbsp/&nbsp&nbspTaille: @{{produit.taille}}</div>
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
                  <div class="p-b-60  p-l-40">
                    <h4 class="cl13 p-l-50">
                      Vos Informations
                    </h4>
                  </div>
                  <div class="p-b-10">
                    <form >
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Numero Telephone
                        </div>
                        <div class="size-219">
                          <div class=" bg0 ">
                            <input class="form-control" id="nom" type="text" :value="commandeclientD.numero_tlf" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Email
                        </div>
                        <div class="size-219 ">
                          <div class=" bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.email" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10" v-if="commandeclientD.address != null">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Adrrsse
                        </div>
                        <div class="size-219">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.address" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10"  v-if="commandeclientD.code_postale != null">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          code Postale
                        </div>
                        <div class="size-219">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" :value="commandeclientD.code_postale" Disabled>
                          </div>
                        </div>
                      </div>
  
                    </form>
                  </div>
                  <!--  -->
  
                  <div class="flex-w flex-r-m p-b-10">
                    <div v-on:click="deleteCommande2(commandeclientD.id)">
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
           'cmd'    => $cmd,
           'client'    => $client,
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
                axios.get(window.Laravel.url+'/deletecommande/'+cmd)
                  .then(response => {
                    if(response.data.etat){
                             var position = app.commandeclient.indexOf(cmd);
                             app.commandeclient.splice(position,1);
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
             this.commandeclient2 = response.data;
             this.commandeclientD = this.commandeclient2[0];
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
      app2.deleteCommande2($cmd.id);
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
                            if(key1.id == window.Laravel.cmd[i].id){

                               this.commandeclient.push({id: key1.id ,prix_total:window.Laravel.cmd[i].prix_total,address:window.Laravel.cmd[i].address,created_at:window.Laravel.cmd[i].created_at});
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
        },
        methods:{
          get_commande_client: function(){
            axios.get(window.Laravel.url+'/commandeClient')
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
            this.get_commande_client();

        }
     })
</script>

@endpush