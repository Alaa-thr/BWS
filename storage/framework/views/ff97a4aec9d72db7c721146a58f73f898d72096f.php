

<?php $__env->startSection('content'); ?>

<head>
      <title><?php echo e(( 'Historique')); ?></title>
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
                <div class="flex-t">
                    <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected" style="margin-top: 5px;">
                    <label for="article"></label> 
                   
                    <h4 style="margin-top: -6px;margin-left: 10px;">Historique </h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"  v-for="historiquec in historiqueclient"  id="his">

<div v-if="selectall" id="c">
       <input type="checkbox"  style=" margin-left: 10px;" :id="historiquec.id" :value="historiquec.id" v-model="checkedArticles" @change="changeButton(historiquec)">
      <label :for="historiquec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>
    <div v-else id="c">
      <input type="checkbox" :id="historiquec.id" :value="historiquec.id" style="margin-left: 10px;" v-model="articleIds" @click="deselectArticle(historiquec.id)">
      <label :for="historiquec.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>


  
    <div class="card-head"   >              
    <div class="row" id="xcl">
    <div >
  <p class=""  id="hh" >
       {{historiquec.created_at}}</p>
      </div> 
    <div class="col-md-4 pr-1" v-if="historiquec.produit_id  === null" >
      <div style="margin-left:22px" v-for="imgA in imagesannonce" v-if=" historiquec.annonceE_id  === imgA.id">
          <p class="" id="h" > Ajoutez cette  annonce d'emploie ' {{imgA.libellé}}' à l'historique</p>
      </div>
       
    </div>
    
    <div  class="col-md-4 pr-1" v-else="historiquec.annonceE_id  === null" >
      <div style="margin-left:22px" v-for="imgP in imagesproduit" v-if=" historiquec.produit_id  === imgP.id">
          <p class="" id="h" >Ajoutez ce produit ' {{imgP.Libellé}}' à l'historique</p>
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
           'produitCL'         => $produitCL,
           'annoncemploiesCL'         => $annoncemploiesCL,
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
          getProduit: function(){
            axios.get(window.Laravel.url+'/historiqueClient')
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
            this.getProduit();

        }
     })
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/historique_client.blade.php ENDPATH**/ ?>