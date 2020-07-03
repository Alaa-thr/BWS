

<?php $__env->startSection('content'); ?>

    <head>
        <title><?php echo e(( 'Favorie')); ?></title>
    </head>
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
                    <div class="block2">
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

                'url'           => url('/'), 
          ]); ?>;
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

        },
        methods:{
          getProduit: function(){
            axios.get(window.Laravel.url+'/favorisClient')
              .then(response => {
                this.ProduitsVendeur = window.Laravel.produit.data;
                this.imagesproduit = window.Laravel.ImageP;
                this.favoris = window.Laravel.Fav;
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