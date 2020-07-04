

<?php $__env->startSection('content'); ?>

    <head>
        <title> <?php echo e($search); ?></title>
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
            <a class="navbar-brand" href="#pablo"> <?php echo e($search); ?> </a>
          </div>
        </div>
    </nav>
    <div class="panel-header panel-header-sm" >
    </div>
    <div class="content" >
    
        <div class="row" id='app'>
        
          <div class="col-md-12">
          
            <div class="card">
              <div class="card-header m-b-30">
              
                <h4 class="card-title " style="margin-top: -5px; "> <?php echo e($search); ?></h4>
               
                    
              </div> 
            <div  class="row isotope-grid" style =" margin-left:22px; margin-right:22px;" >
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit in ProduitsVendeur">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit">
                            <img v-if="imgP.produit_id === produit.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 290px;width: 990px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="ShowInfo()">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l " >
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit.prix}} DA
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
               


            </div>
            
            <div >

            
                    <?php echo e($produit->links()); ?>

                </div>
        </div>


        
    </div>

			<div class="row"  id="app1" >
				<div class="col-md-8 col-lg-9 p-b-80" >
					<div class="p-r-45 p-r-0-lg" >
						<!-- item blog -->
						<div class="p-b-63" v-for="art in articles" >
							<a :href="'/articleDetaille/'+art.id" class="hov-img0 how-pos5-parent">
								<img :src="'storage/articles_image/'+ art.image"  style="height: 501px; ">

							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a :href="'/articleDetaille/'+art.id" class="ltext-108 cl2 hov-cl1 trans-04 color-t">
										{{ art.titre }}
									</a>
								</h4>

								<p class="stext-117 cl6">
									 {{ MoitieDescription(art.description,200, '. . .') }} 
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
									
										<span>
											{{art.date}}
											
										</span>

									</span>

									<a :href="'/articleDetaille/'+art.id" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10" style="font-style: italic;">
										Afficher plus

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>

                <hr id="articl">
							</div>
						</div>
						<div style="float: right;">
							 <?php echo e($article->links()); ?>

						</div>
						
					</div>
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
               'search'         => $search,
             	'article' => $article,

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
         
          p:[],

        },
        methods:{
        
       
          getsearch: function(){
            axios.get(window.Laravel.url+'/abest')
              .then(response => {
                this.ProduitsVendeur = window.Laravel.produit.data;
                this.imagesproduit = window.Laravel.ImageP;
                this.annonceTableau = window.Laravel.annonce;
                this.articleTableau = window.Laravel.article;

               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          

        },
        created:function(){
            this.getsearch();

        }
     })
</script>
<script>
  var app1 = new Vue({
      el: '#app1',
      data:{
         articles: [],
         articles2: [],
      },
      methods:{
        getsearch: function(){
        axios.get(window.Laravel.url+'/abest')
            .then(response => {
                 this.articles = window.Laravel.article.data;
                 console.log("window.Laravel.ar",window.Laravel.article.data);
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },
        Afficherinfo: function($art){
        axios.get(window.Laravel.url+'/article_detaillé/'+art.id)
            .then(response => {
            	this.articles2 = window.Laravel.ardet;
            })
            .catch(error => {
               console.log('errors : ' , error);
            })
        },
        MoitieDescription:  function (text, length, suffix){
          if(text.length <= length){
            return text;
          }
          return text.substring(0, length) + suffix;
        },
       },
       created:function(){
       this.getsearch();
      },
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/searchvendeur.blade.php ENDPATH**/ ?>