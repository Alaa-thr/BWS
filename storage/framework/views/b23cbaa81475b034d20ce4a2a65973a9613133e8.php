
<?php $__env->startSection('content'); ?>


	
	<head>
		<title><?php echo e(( 'Article')); ?></title>
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
            
            <div class="header-cart-content flex-w js-pscroll" id="app11" >
                <ul class="header-cart-wrapitem w-full"  >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier" >
                        <div class="header-cart-item-img" @click="deleteProduitPanier(command)" >
                          <img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT"  style="height: 60px;">
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
<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Acticle
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container" id="app">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!-- item blog -->
						<div class="p-b-63" v-for="art in articles">
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
											<span class="cl4">Créé Par</span>  {{ art.nom.toUpperCase() }}
											{{ art.prenom.toUpperCase() }}
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>
										<span>
											{{art.date}}
											
										</span>

									</span>

									<a :href="'/articleDetaille/'+art.id" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10" style="font-style: italic;">
										Afficher plus

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
						<div style="float: right;">
							 <?php echo e($allArticle->links()); ?>

						</div>
						
					</div>
				</div>
				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>
						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Fashion
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Beauty
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Street Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Life Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										DIY & Crafts
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</section>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>

<script> 
        window.Laravel = <?php echo json_encode([

               'csrfToken' => csrf_token(),
             	 'allArticle' => $allArticle,
				       'ImageP'         => $ImageP,
               'Fav'            => $Fav,
               'command'        => $command,
               'prixTotale'   => $prixTotale,
               'url'       => url('/'), 
          ]); ?>;
</script>
<script>
  var app = new Vue({
      el: '#app',
      data:{
         articles: [],
         articles2: [],
      },
      methods:{
        getArticle: function(){
        axios.get(window.Laravel.url+'/article')
            .then(response => {
                 this.articles = window.Laravel.allArticle.data;
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
       this.getArticle();
      },
  });
</script>
<script>
     var app11 = new Vue({
        el: '#app11',
        data:{
          message:'hello',
          ProduitsPanier: [],
          favoris: [],
          imagesproduit: [],
          prix:[],
        },
        methods:{
          deleteProduitPanier: function(produit){
           
                  axios.delete(window.Laravel.url+'/deleteproduitpanier/'+produit.produit_id)
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
			article: function(){
            axios.get(window.Laravel.url+'/article')
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
            this.article();

        }
     })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/article.blade.php ENDPATH**/ ?>