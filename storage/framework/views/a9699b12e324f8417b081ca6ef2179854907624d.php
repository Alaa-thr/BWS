
 
<?php $__env->startSection('content'); ?>

<head>
      <title><?php echo e(( 'Notification ')); ?></title>
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
                <ul class="header-cart-wrapitem w-full"  >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier">
                        <div class="header-cart-item-img"  @click="deleteProduitPanier(command)">
                        <img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" 
                        alt="IMG-PRODUCT"  style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoris" v-if="fv.id === command.produit_id" id="bb">
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
                        Totale: {{p.prixTo}} DA
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
            <div class="col-md-12 flex-t">    
              <div class="flex-t col-md-9">
                  <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected">
                  <label for="article"></label>
                  <h4 class="m-t--5">Notification</h4>
              </div>
              <div class="flex-t col-md-3" >
                <div  class="col-md-6">
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px;float: right; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                </div>
                  
                <div  class="col-md-6">  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px;float: right; " ><b>Annuler</b>
                  </button>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-md-12" v-for="notificationc in notificationclient" >
              <div class="col-md-12 flex-t">
                <div v-if="selectall" >                    
                  <input type="checkbox" :id="notificationc.id" :value="notificationc.id" v-model="checkedArticles" @change="changeButton(notificationc)"> 
                  <label :for="notificationc.id"></label>
                </div>
                <div v-else >
                  <input type="checkbox" :id="notificationc.id" :value="notificationc.id" v-model="articleIds" @click="deselectArticle(notificationc.id)">
                  <label :for="notificationc.id"></label>
                </div>
                <div class="card-head col-md-12" >              
                  <div class="row col-md-12"  >
                    <div  class="col-md-11" v-on:click="AfficheInfo(notificationc.id)" style="cursor: pointer;">
                      <span  v-for="imgA in imagesannonce" v-if=" notificationc.vendeur_id  === imgA.id" style="color:black" >Le vendeur <b>{{imgA.Nom}}</b> a était refusé l'achat de ces produits dans ta commande numero <b>{{notificationc.cmd_id}}</b>
                      </span>
                    </div>
                    <div class="col-md-1" >
                      <div class="dropdown" style="float: right;">
                        <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                          <i class="fas fa-ellipsis-v"  style="color: black"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"  >
                          <a   v-on:click="AfficheInfo(notificationc.id)"  class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
                          <a class="dropdown-item" v-on:click="deleteNotificationClient(notificationc)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;"> Supprimer</a>
                         </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
              <hr>                 
            </div>
          </div>     
              <?php echo e($article->links()); ?>

          </div>
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
           'emploC'         => $emploC,
           'vendeurC'         => $vendeurC,
           'ImageP'         => $ImageP,
           'Fav'         => $Fav,
           'command'         => $command,
           'prixTotale'   => $prixTotale,
           "url"      => url("/")  
      ]); ?>;
</script>

<script>




var app = new Vue({

el: '#app',


data:{
  notificationclient: [],
  employeur:[],
  imagesannonce:[],
  suppr: false, 
  checkedArticles: [],
  artilcesDelete: [],
  allSelected: false,
  articleIds: [],
  selectall: true,

  },
methods: {
  AfficheInfo: function($id){
    this.notificationclient.forEach(key=>{
      if(key.id == $id){
        Swal.fire({
                  title: 'A couse de',
                  html: '<div class="bor8"><textarea disabled class="stext-115 cl2 plh3 size-120 p-lr-28 p-tb-25" style="font-size: 17px;">'+key.cause+'</textarea></div>',
                  showCancelButton: false,
                  confirmButtonText: 'Ok',
        })
      }
   }) 
  },
   deleteArrayArticle:function(){
        if(this.artilcesDelete.length == 0){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Il ya aucun Notification a supprimer!',

          }).then((result) => {
            this.allSelected = false;
            this.suppr=false;
            this.selectall = true;
           
         })
          return;
        }
        Swal.fire({
        title: 'Etes vous?',
        text: "De supprimer cette Notification?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletenotificationclient/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.notificationclient.indexOf(key);
                            this.notificationclient.splice(position,1);      
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
            'Votre notification a été supprimé.',
            'success'
          )
        }
        
        })
   },
 
   deleteNotificationClient: function(article){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette Notification?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletenotificationclient/'+article.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.notificationclient.indexOf(article);
                       this.notificationclient.splice(position,1);
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
        'Votre notification a été supprimé.',
        'success'
      )
    }
    
    })
  },
 
 
  
  
  
  get_notification_client: function(){
            axios.get(window.Laravel.url+'/notificationClient')

                .then(response => {
                     this.notificationclient = window.Laravel.article.data;
                     this.employeur = window.Laravel.emploC;
                     this.imagesannonce = window.Laravel.vendeurC;

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
            for (user in this.notificationclient) {
                this.articleIds.push(this.notificationclient[user].id);
                this.artilcesDelete.push(this.notificationclient[user]);
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
  this.get_notification_client();
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
          get_notification_client: function(){
            axios.get(window.Laravel.url+'/notificationClient')
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
            this.get_notification_client();

        }
     })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/notification_client.blade.php ENDPATH**/ ?>