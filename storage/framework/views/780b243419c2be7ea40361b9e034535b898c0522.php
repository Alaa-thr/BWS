

<?php $__env->startSection('content'); ?>

<head>
      <title><?php echo e(( 'Mes Demandes ')); ?></title>
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
                            {{fv.Libellé}}
                            </a>

                            <span class="header-cart-item-info">
                            {{command.qte}} x  {{fv.prix}} DA
                            </span>
                        </div>
                    </li>
                </ul>
                
                <div class="w-full" >
                    
                <div class="header-cart-total w-full p-tb-40" v-for="p in prix">
                        Total: {{p.prixTo}} DA
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="<?php echo e(route('panier')); ?>" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="<?php echo e(route('panier')); ?>" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
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
            <?php if(session()->has('success')): ?>
                <div class="row"> 
                  <div class="alert alert-success" style="  margin-left:33px;width: 960px;">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;

                  </button>
                   <?php echo e(session()->get('success')); ?>

                  </div>
                </div>
            <?php endif; ?>
            <div class="flex-t col-md-12">
              <div class="flex-t col-md-4">
                <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected" style="margin-top: 5px;">
                <label for="article"></label> 
                 <h4 style="margin-top: -6px;margin-left: 10px;">Demandes</h4>
              </div>
              <div class="flex-t col-md-8">
                <div class="col-md-8">
                    <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; float: right;" v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                    </button>
                </div>    
                <div class="col-md-3">  
                    <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                    </button>
                </div>
              </div>
            </div>
            <hr >       
          
        
            <div class="card-body"  v-for="demandec in demandeclient" >
              <div class="card-head"  id="cmddd"   >              
                <div class="row col-md-12"  >
                  <div class="row  col-md-12"  > 
                    <div class=" col-md-12 flex-t" >
                      <div class="flex-t col-md-7" v-if="selectall">
                        <input type="checkbox"  :id="demandec.id" :value="demandec.id" v-model="checkedArticles" @change="changeButton(demandec)">
                        <label :for="demandec.id"  id="txt" style=" margin-left: 10px;">Demande   {{demandec.id}}</label>
                      </div>
                      <div class="flex-t col-md-7" v-else>
                        <input type="checkbox" :id="demandec.id" :value="demandec.id" v-model="articleIds" @click="deselectArticle(demandec.id)">
                       <label :for="demandec.id" id="txt"  style=" margin-left: 10px;">Demande   {{demandec.id}}</label>
                      </div>
                      <div  class="m-t--7 col-md-4 js-show-modal1" v-on:click="AfficheInfo(demandec.id)" style="cursor: pointer;">
                          <p id="txt" style="float: right;">   {{demandec.date}}</p>
                      </div>
                      <div class="col-md-2 dropdown m-t-5" style="cursor: pointer;">
                        <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                          <i class="fas fa-ellipsis-v"  id="y"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" >
                          <a class="dropdown-item js-show-modal1" v-on:click="AfficheInfo(demandec.id)" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Afficher Plus
                          </a>
                          <a class="dropdown-item" v-on:click="deleteDemande(demandec)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 flex-t m-b-10 js-show-modal1" v-on:click="AfficheInfo(demandec.id)" style="cursor: pointer;">
                      <div class="col-md-12" >
                        <p id="txt" >CV_client : {{demandec.cv_client}} </p>
                      </div> 
                    </div>
                  </div>
                </div>                  
              </div>
            </div>     
              <?php echo e($article->links()); ?>

          </div>
        </div>      
      </div>
    </div>      

<!-- Modal1 for laptob-->
<div class="wrap-modal11 js-modal1 p-t-80 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel" >
  <div class="overlay-modal11 " v-on:click="CancelArticle()"></div>

  <div class="container" >

 
    <div class="bg0  p-b-100 p-lr-15-lg how-pos3-parent" style="width: 970px;padding-top: 40%">

      <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1" v-on:click="canceldemande()">
        <img src="images/icon-close.png" alt="CLOSE" >
      </button>
      
      <section class=" creat-article ">     
        <div  class=" container-creat-article">
          <div class="col-md-12 flex-t m-t--10 m-b-30">
            <h4 class="ltext-102 col-md-9 cl2 m-l--60" >DEMANDE DE {{condidat.nom_Prenom.toUpperCase()}}
            </h4>
           
            <div class="col-md-3 m-t--5">
              <p  id="txt" >{{condidat.date}}</p>
            </div>
          </div>
          <div class="row col-md-12 m-l--30" >
            <div class="col-md-12" >
              <p class="m-l--20" id="txt" >Information de condidat : </p>
                  <div class="flex-t m-l-10">
                      <p id="txt">Nom et prenom :</p>
                     <p id="t3">{{condidat.nom_Prenom.toUpperCase()}} </p>
                  </div>
                  <div class="flex-t m-l-10">
                    <p id="txt">E-mail: </p>
                    <p id="t3" >{{condidat.email}}</p>
                  </div>
                  <div class="flex-t m-l-10">
                      <p id="txt">Numéro_téléphone:</p>
                     <p id="t3">{{condidat.numeroTlf}}</p> 
                  </div>
                  <div class="flex-t m-l-10">
                       <p id="txt">CV_client:</p>
                       <a :href="'storage/demande_cv/'+ condidat.cv_client" download="">
                          <p style=" cursor: pointer;">{{condidat.cv_client}}</p>
                        </a>
                  </div>
            </div> 
          </div>
          <div class="row col-md-12 m-l--30 m-b-30" >
            <div class="col-md-12" >
              <p class="m-l--20" id="txt" >Information sur l'annonce : </p>
                  <div class="flex-t m-l-10">
                      <p id="txt">Libellé :</p>
                     <p id="t3">{{annoceInfo.libellé}} </p>
                  </div>
                  <div class="flex-t m-l-10">
                    <p id="txt">Discription: </p>
                    <p id="t3" >{{annoceInfo.discription}}</p>
                  </div>
            </div> 
          </div>
          <div class="row col-md-10">
              <div class="col-md-10">
                <button v-on:click=" deleteDemandee(condidat);" class="btn-sm btn-danger " style=" height: 35px; border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; float: right;" ><b>Supprimer</b></button>     
              </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>




<?php $__env->startPush("javascripts"); ?>




<script>
    window.Laravel = <?php echo json_encode([
           "csrfToken"  => csrf_token(),
           "article"   => $article,
           "idAdmin" => $idAdmin,
           'ImageP'         => $ImageP,
           'Fav'         => $Fav,
           'command'         => $command,
           'prixTotale'   => $prixTotale,
           "url"      => url("/")  
      ]); ?>;
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    demandeclient2: [],
    openInfo: false,
    annoceInfo:[],
    hideModel: false,
    detaillsA: {
      idA: 0,
    },
    condidat: {
      nom_Prenom: 'non',

    },

  
  
               
  },
methods: {

deleteDemandee: function(article){

    $('.js-modal1').removeClass('show-modal1'); 
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
                       var position = app.demandeclient.indexOf(article);
                       app.demandeclient.splice(position,1);
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
  detaillsDemande: function(){

    axios.post(window.Laravel.url+'/detaillsademande', this.detaillsA)

        .then(response => {

             this.demandeclient2 = response.data.demande_detaills;
             this.condidat = this.demandeclient2[0] 
             this.annoceInfo = response.data.annonce[0];
             
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
    if(this.checkedArticles.length < this.artilcesDelete.length){
              
            this.artilcesDelete = this.artilcesDelete.filter(function(item) { return item != a; });
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
                                  this.prix[0].prixTo -= produit.prix_total*produit.qte;
                               }

                      }                     
                    })
                    .catch(error =>{
                               console.log('errors :' , error);
                    })

              
          },
          get_demande_client: function(){
            axios.get(window.Laravel.url+'/demandeClient')
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
            this.get_demande_client();

        }
     })
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/demande_clinet.blade.php ENDPATH**/ ?>