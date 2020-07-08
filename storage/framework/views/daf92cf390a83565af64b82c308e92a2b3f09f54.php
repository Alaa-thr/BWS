
<?php $__env->startSection('content'); ?>

	<head>
		<title><?php echo e(( 'A Propos')); ?></title>
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
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/gallery-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			A Propos
		</h2>
	</section>	


	
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16 color-t">
							Notre Histoire
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. 
						</p>

						<p class="stext-113 cl6 p-b-26">
							Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/about-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16 color-t">
							Notre Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
							</p>

							<span class="stext-111 cl8">
								- Steve Job’s 
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		
<script>
	window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
			   'ImageP'         => $ImageP,
               'Fav'            => $Fav,
               'command'        => $command,
               'prixTotale'		=> $prixTotale,
               "url"      => url("/")  
    ]); ?>;
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
		                  	console.log("produit",produit);
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
			apropos: function(){
            axios.get(window.Laravel.url+'/apropos')
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
            this.apropos();

        }
     })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/apropos.blade.php ENDPATH**/ ?>