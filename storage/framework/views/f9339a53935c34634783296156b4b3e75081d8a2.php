





<?php $__env->startSection('content'); ?>

    <head>
        <title><?php echo e(( 'Favorie')); ?></title>
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
                <ul class="header-cart-wrapitem w-full" v-for="command in ProduitsPanierr">
                    <li class="header-cart-item flex-w flex-t m-b-12" >
                        <div class="header-cart-item-img" v-for="imgP in imagesproduitr">
                        <img v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favorirs" v-if="fv.id === command.produit_id" >
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
                    
                <div class="header-cart-total w-full p-tb-40">
                        Total: 
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
            <a class="navbar-brand" href="#pablo">Favories </a>
          </div>
        </div>
    </nav>
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row" id='app'>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header m-b-30">
                <h4 class="card-title " style="margin-top: -5px; ">Favories</h4>
               
                    
              </div> 
            <div class="row isotope-grid" style =" margin-left:22px; margin-right:22px;" >
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit in ProduitsVendeur">
                    <!-- Block2 -->
                    <div class="block2" v-if="produit.annonce_emploi_id===null">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit">
                            <img v-if="imgP.produit_id === produit.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 290px;width: 990px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="ShowInfo()">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l " v-for="fv in favoris" v-if="produit.produit_id === fv.id">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{fv.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{fv.prix}} DA
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row m-b-10 " v-if="produit.produit_id===null" v-for="annonce in AnnonceTableau" style="display: inline-flex; height: 160px; width: 360px;">
                     
                     
                     <div class="col-md-3 "   v-if="produit.annonce_emploi_id===annonce.id">
                       <img v-if=""  :src="'storage/annonces_image/'+ annonce.image" style="height: 110px; width:120px; margin-bottom: 20px">
                     </div>
                     
                     <div class="col-md-5" >
                       <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >{{ annonce.libellé }}</h6><br>
                         <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                         {{ MoitieDescription(annonce.discription,15, '...') }}

                         </div>  
                         <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                         Nombre de condidat : {{annonce.nombre_condidat}}                         </div>
                         <div class="txt-right m-t-20">
                            
                          </div>
                     </div>
                    
                    <div style="border-left: 2px solid #000; display: inline-block;height: 130px; margin: 0 20px;">
                    </div> 
</div>  
             

                </div>
            </div>
            <div >
                    <?php echo e($produit->links()); ?>

                </div>
        </div>
    </div>

                  
                </div>
              </div>
         
     
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascripts'); ?>



  

<script> 
        window.Laravel = <?php echo json_encode([

               'csrfToken'      => csrf_token(),
               'produit'        => $produit,
               'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'annonce'         => $annonce,

                'url'           => url('/'), 
          ]); ?>;
</script>

<script>
     var app1 = new Vue({
        el: '#app1',
        data:{
          message:'hello',
          ProduitsPanierr: [],
          favorisr: [],
          imagesproduitr: [],
        },
        methods:{
          get_favoris_client: function(){
            axios.get(window.Laravel.url+'/favorisClient')
              .then(response => {
                this.favorisr = window.Laravel.Fav;
                this.imagesproduitr = window.Laravel.ImageP;
                this.ProduitsPanierr = window.Laravel.command;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          

        },
        created:function(){
            this.get_favoris_client();

        }
     })
</script>
<script>
     var app = new Vue({
        el: '#app',
        data:{
          message:'hello',
          ProduitsVendeur: [],
          suppr: true,
          imagesproduit: [],
          favoris: [],
          p:[],
          ProduitsPanier: [],
          AnnonceTableau: [],

        },
        methods:{
            MoitieDescription:  function (text, length, suffix){
          if(text.length <= length){
            return text;

          }
         
          return text.substring(0, length) + suffix;

      }, 
          getProduit: function(){
            axios.get(window.Laravel.url+'/favorisClient')
              .then(response => {
                this.ProduitsVendeur = window.Laravel.produit.data;
                this.imagesproduit = window.Laravel.ImageP;
                this.favoris = window.Laravel.Fav;
                this.ProduitsPanier = window.Laravel.command;
                this.AnnonceTableau = window.Laravel.annonce;

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
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/favoris_client.blade.php ENDPATH**/ ?>