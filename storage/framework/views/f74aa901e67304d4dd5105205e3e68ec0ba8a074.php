
<?php $__env->startSection('content'); ?>

	<?php
		$xxxx=21;

	?>
	
	<head>
		<title><?php echo e(( 'Shops')); ?></title>
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

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoriss" v-if="fv.id === command.produit_id" >
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

	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shop
			</span>
		</div>
	</div>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col5 p-r-10 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col7 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col6 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<div class="row isotope-grid" id="app1">
				<?php $__currentLoopData = $produit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" >
				

					<div class="block2" >
						<div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
							
							<img v-if="imgP.produit_id == <?php echo $prdt->id ?> && imgP.profile === 1"  :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

							<a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(<?php echo e(json_encode($prdt)); ?>)">
                                Quick View
                            </a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo e($prdt->Libellé); ?>

								</a>

								<span class="stext-105 cl3">
									<?php echo e($prdt->prix); ?>DA
								</span>
							</div>
							<?php
								$x = "<script> echo 5;</script>";
								$j=19;
								$k=0;
							?>
						<?php for($i=0 ; $i< count($fav) ; $i++): ?>
								<?php if($fav[$i]->produit_id == $prdt->id): ?>
										
									<?php
										$k=$k+1;
										$i=count($fav);
										$j=$j+1;
									?>
								<?php else: ?>
									

								<?php endif; ?>
						<?php endfor; ?>	
						<?php if($k == 1): ?>
							<div class="p-t-3">
								
										<a  class="" v-on:click="AjoutAuFavoris(<?php echo e(json_encode($prdt)); ?>)" style="cursor: pointer;">
											<i  class="zmdi zmdi-favorite zmdi-hc-2x" style="color: #e60000; " id="<?php echo $prdt->id ?>"></i>
											
										</a>
									</div>
						<?php else: ?>
						<div class=" p-t-3">
									
									<a  class="" v-on:click="AjoutAuFavoris(<?php echo e(json_encode($prdt)); ?>)" style="cursor: pointer; " >
										<i  class="cl222 zmdi zmdi-favorite-outline zmdi-hc-2x favoo " id="<?php echo $prdt->id ?>"></i>
										
									</a>
								</div>
	
						<?php endif; ?>
						
							
						</div>
					</div>
				</div>
				
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		<!-- Modal1 -->
			<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" >
			        <div class="overlay-modal1" v-on:click="CancelArticle()" ></div>

			        <div class="container">
			            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
			                <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()" >
			                    <img src="images/icons/icon-close.png" alt="CLOSE">
			                </button>

			                <div class="row">
			                    <div class="col-md-6 col-lg-7 p-b-30">
			                        <div class="p-l-25 p-r-30 p-lr-0-lg">
			                            <div class="wrap-slick3 flex-sb flex-w" >
			                                <div class="wrap-slick3-dots"></div>
			                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
	
			                                <div class="slick3 gallery-lb">
			                                
										
												<?php $__currentLoopData = $ImageP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($t->produit_id == 21): ?>
			                                    <div  class="item-slick3" data-thumb="<?php echo asset('storage/produits_image/'.$t->image) ?>" >
			                                        <div class="wrap-pic-w pos-relative">
			                                            <img src="<?php echo asset('storage/produits_image/'.$t->image) ?>" alt="IMG-PRODUCT" style="height: 500px">

			                                        </div>
			                                    </div>
			                                	<?php endif; ?>
			                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                                  
			                             
			                           
			                                	
	


			                                    
			                                </div>
			                            </div>

			                        </div>
			                    </div>
			                    
			                    <div class="col-md-6 col-lg-5 p-b-30">
			                        <div class="p-r-50 p-t-5 p-lr-0-lg">
			                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
			                                {{this.detaillproduit.Libellé}}
			                            </h4>

			                            <span class="mtext-106 cl2">
			                                {{this.detaillproduit.prix}}DA
			                            </span>

			                            <p class="stext-102 cl3 p-t-23">
			                                {{this.detaillproduit.description}}.
			                            </p>
			                            <p class="stext-102 cl3 p-t-23 " >
			                            	<span :data-toggle="!!this.detaillproduit.Nom ? 'tooltip' : false" data-html="true" :title="this.detaillproduit.Nom " >
			                               Vendeur&nbsp:<b>&nbsp&nbsp{{this.detaillproduit.Nom}} &nbsp{{this.detaillproduit.Prenom}}</b>.</span>
			                           		
			                            </p>
			                            <!--  -->
			                            <div class="p-t-33">
			                                <div v-show="tailleExiste" class="flex-w flex-r-m p-b-10">
			                                    <div class="size-203 flex-c-m respon6 p-b-10">
			                                        Taille
			                                    </div>

			                                    <div class="size-204 respon6-next">
			                                        <div class="rs1-select2 bor8 bg0" :class="{'is-invalid' : message.taille}">
			                                            <select class="js-select2" id="tttt" onchange="selectTaille(this.options[this.selectedIndex].value)">
			                                                <option value="0" disabled selected>Choisir la taille</option>
			                                                <option v-for="taille in tailles" v-if="taille.produit_id  === detaillproduit.id" :value="taille.nom">{{taille.nom}}</option>
			                                            </select>
			                                                                                 
			                                            <div class="dropDownSelect2"></div>
			                                        </div>
			                                        <span class=" cl13" v-if="message.taille" v-text="message.taille[0]"></span>
			                                    </div>
			                                    
			                                </div>

			                                <div class="flex-w flex-r-m p-b-10">
			                                    <div class="size-203 flex-c-m respon6 p-b-10">
			                                        Couleur
			                                    </div>

			                                    <div class="size-204 respon6-next">
			                                        <div class="rs1-select2 bor8 bg0"  :class="{'is-invalid' : message.couleur_id}">
			                                            <select class="js-select2" id="cccc" onchange="selectColor(this.options[this.selectedIndex].value)">
			                                                <option value="0" disabled selected="true">Choisir la couleur</option>
			                                                <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === detaillproduit.id">{{color.nom}}</option>
			                                            </select>
			                                            <div class="dropDownSelect2"></div>
			                                        </div>
			                                        <span class=" cl13" v-if="message.couleur_id" v-text="message.couleur_id[0]"></span>
			                                    </div>
			                                </div>

			                                <!--  -->
			                            
			                                <div class="flex-w flex-r-m p-b-10">
			                                    <div class="size-203 flex-c-m respon6 p-b-10">
			                                        Type Livraison
			                                    </div>

			                                    <div class="size-204 respon6-next">
			                                        <div class="rs1-select2 bor8 bg0" :class="{'is-invalid' : message.type_livraison}">
			                                            <select  class="js-select2" id="TLTLTL" onchange="selectLivraisen(this.options[this.selectedIndex].value)">
			                                                <option id='TL0' value="0" disabled selected="true">Choisir le type de livraison</option>
			                                                
			                                                <option v-for="typeLivraison in typeLivraisons" value="vc" v-if="typeLivraison.vendeur_id === detaillproduit.vendeur_id && typeLivraison.type_livraison === 'vc'">Le vendeur effectuer la livraison</option>
			                                                <option v-for="typeLivraison in typeLivraisons" value="cv" v-if="typeLivraison.vendeur_id === detaillproduit.vendeur_id && typeLivraison.type_livraison === 'cv'">Vous apportez votre produit</option>
			                                                <option v-for="typeLivraison in typeLivraisons" value="dhl" v-if="typeLivraison.vendeur_id === detaillproduit.vendeur_id && typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
			                                            </select>
			                                            <div class="dropDownSelect2"></div>
			                                        </div>
			                                        <span class=" cl13" v-if="message.type_livraison" v-text="message.type_livraison[0]"></span>
			                                    </div>
			                                </div>
			    
			                                <div class="flex-w flex-r-m p-b-10">
			                                    <div class="size-204 flex-w flex-m respon6-next">
			                                        <div class="wrap-num-product flex-w m-r-20 m-tb-15" :class="{'is-invalid' : message.qte}">
			                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
			                                                <i class="fs-16 zmdi zmdi-minus"></i>
			                                            </div>

			                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="0" placeholder="0" id="qtee">

			                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
			                                                <i class="fs-16 zmdi zmdi-plus"></i>
			                                            </div>
			                                        </div >
			                                        <span class="m-b-10 cl13" v-if="message.qte" v-text="message.qte[0]" style="margin-top: -10px"></span>
													<div class="flex-t">
													<button class="flex-c-m m-r-20 stext-102 cl0 size-102 bg11 bor1 p-lr-15 trans-04" v-on:click="addPanier()">
				                                            Ajouter au panier
				                                        </button>
				                                        <button class="flex-c-m stext-102 cl0 size-102 bg10 bor1 p-lr-15 trans-04" v-on:click="CancelArticle()" >
				                                            Annuler
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
    		</div>
				
		 
   
				
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>

	

	
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascripts'); ?>
<script>
	function adde(a){

		$('#'+a).removeClass('zmdi-favorite-outline');
		$('#'+a).addClass('zmdi-favorite');
		document.getElementById(a).style.color = '#e60000';
	}
	function deletee(a){
		$('#'+a).removeClass('zmdi-favorite');
		$('#'+a).addClass('zmdi-favorite-outline');
		document.getElementById(a).style.color = '#d3d3d3';
	}
	function initialiser(){
		
		document.getElementById("tttt").options.selectedIndex = 0;
		document.getElementById("cccc").options.selectedIndex = 0;
		document.getElementById("qtee").value = 0;
		document.getElementById("TLTLTL").options.selectedIndex = 0;

		
	}
</script>


<script>

	window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               'produit'        => $produit,
               'ImageP'         => $ImageP,
               'color'         => $color,
               'taille'         => $taille,
               'fav'            => $fav,
               'typeLivraison'       => $typeLivraison,
          		'Fav'         => $Fav,
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
          favoriss: [],
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
			produitVisiteur: function(){
            axios.get(window.Laravel.url+'/shop')
              .then(response => {
                this.imagesproduit = window.Laravel.ImageP;
                this.ProduitsPanier = window.Laravel.command;
                this.prix = window.Laravel.prixTotale;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          getProduitPanierShop(){
          	axios.get(window.Laravel.url+'/getproduitpaniershop')
              .then(response => {
                this.favoriss = response.data.Fav;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          }
          

        },
        created:function(){
           this.produitVisiteur();
           this.getProduitPanierShop();

        }
     })
</script>
<script >
	 var app1 = new Vue({
      el: '#app1',
      data:{
      	msg: 'welcome',
      	produits: [],
      	imagesproduit:[],
      	colors: [],
      	typeLivraisons: [],
      	detaillproduit: [],
      	tailles: [],
      	ajoutPanier: {
      		vendeur_id: 0,
      		produit_id: 0,
      		couleur_id: '',
      		qte: null,
      		type_livraison: '',
      		taille: '0',
      		prix: 0,
      		tailExst : 0,

      	},
      	tailleExiste: false,
      	message: {},
      	hideModel: false,
      	favoris : [],
      	showFavoris: true,
      	remoadd: true,
      	addremo: true,
      	idproduitfavadd: '',
      	idproduitfavadd: '',
      	tttt:[],
      	
      },
      methods:{
      	getFavoris(){
      		axios.get(window.Laravel.url+'/getfavoris')
              .then(response => {
              		if(response.data.etat){
	              		this.favoris = response.data.fav;
              		}
               })
              .catch(error => {
                    console.log('errors :' , this.message);   
             })
      	},
      	CancelArticle(){
      		$('.js-modal1').removeClass('show-modal1');
      		this.ajoutPanier= {
			      		vendeur_id: 0,
			      		produit_id: 0,
			      		couleur_id: '',
			      		qte: null,
			      		type_livraison: '',
			      		taille: '0',
			      		prix: 0,
			      		tailExst : 0,

			      	};
			initialiser();
			this.message= {};
			 	
      	},
      	addPanier: function(){
      		axios.post(window.Laravel.url+'/addpanier',this.ajoutPanier)
              .then(response => {
              	if(response.data.etat && !response.data.produitExister){
              		app11.favoriss.unshift(response.data.cmd);
              		app1.imagesproduit.unshift(response.data.image);
              		app11.ProduitsPanier.unshift(response.data.commande);
              		app11.prix[0].prixTo += response.data.prixTotale;
              		
              		Swal.fire(
					  "L'ajout est fait avec success!",
					  'Votre produit a bien ajouter a votre panier.',
					  'success'
					);
					initialiser();
					this.ajoutPanier= {
			      		vendeur_id: 0,
			      		produit_id: 0,
			      		couleur_id: '',
			      		qte: null,
			      		type_livraison: '',
			      		taille: '0',
			      		prix: 0,
			      		tailExst : 0,

			      	};
              		$('.js-modal1').removeClass('show-modal1');
              		
			      	this.message= {};
			      	
			      				      	
              	}
              	else if(response.data.etat && response.data.produitExister){
              		$('.js-modal1').removeClass('show-modal1');
              		this.ajoutPanier= {
				      		vendeur_id: 0,
				      		produit_id: 0,
				      		couleur_id: '',
				      		qte: null,
				      		type_livraison: '',
				      		taille: '0',
				      		prix: 0,
				      		tailExst : 0,

				      	};
				    this.message= {};
              		Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Le produit est déja existé dans votre panier.',		  
					});
              	}
                else if(!response.data.etat && response.data.cnncte){
                	$('.js-modal1').removeClass('show-modal1');
                	Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
					  footer: '<form method="GET" action="<?php echo e(route("logoutregister")); ?>"><?php echo csrf_field(); ?><a href="<?php echo e(route("logoutregister")); ?>">Créer Compte</a></form>',
					  showCancelButton: true,
					  cancelButtonColor: '#d33',
					  confirmButtonColor: '#13c940',
					  confirmButtonText:
					    'Se Connecter',
					}).then((result) => {
						if (result.value){							
							axios.post(window.Laravel.url+'/logout')
              				.then(response => {
              						  window.location.href = '/accueil';
              				})
              				.catch(error => {console.log("error",error)})
						}
					 
					});
					
            	}
            	else if(!response.data.etat && !response.data.cnncte){
            			$('.js-modal1').removeClass('show-modal1');
            			Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Client</b> pour pouvez accedé a votre panier.',
						  footer: '<form method="GET" action="<?php echo e(route("logoutregister")); ?>"><?php echo csrf_field(); ?><a href="<?php echo e(route("logoutregister")); ?>">Créer Compte</a></form>',
						  showCancelButton: true,
					  	  cancelButtonColor: '#d33',
						  confirmButtonColor: '#13c940',
						  confirmButtonText:
						    'Se Connecter',
						}).then((result) => {
							if (result.value){
									$('.js-panel-connect').addClass('show-header-cart');
							}
							 
						});
            	}
               })
              .catch(error => {
              	
                  this.message = error.response.data.errors;
                    console.log('errors :' , this.message);              
             })
      	},
      	detaillProduit:function(produit){
      		var i = 0;
      		 this.produits.forEach(key => {
      			if(produit.id == key.id ){
      					this.tttt.push(key);
      			}
      		});
      		this.ajoutPanier.vendeur_id = produit.vendeur_id;
      		this.ajoutPanier.prix = produit.prix;
      		this.detaillproduit = produit;
      		this.detaillproduit.Nom = this.detaillproduit.Nom.toUpperCase();
      		this.detaillproduit.Prenom = this.detaillproduit.Prenom.toUpperCase();
      		this.ajoutPanier.produit_id = this.detaillproduit.id;
      		this.tailles.forEach(key => {
      			if(this.detaillproduit.id == key.produit_id ){
      					i++;
      			}
      		});
      		if(i != 0){
      		    this.tailleExiste = true;
      		    app1.ajoutPanier.tailExst = 1;
      		}
      		else{
      			this.tailleExiste = false;
      			app1.ajoutPanier.tailExst = 0;
      		}
      	},
      	 getProduit: function(){
            axios.get(window.Laravel.url+'/shop')
              .then(response => {
                this.produits = window.Laravel.produit;
                this.imagesproduit = window.Laravel.ImageP;
                this.colors = window.Laravel.color;
                this.typeLivraisons = window.Laravel.typeLivraison;
                this.tailles = window.Laravel.taille;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          AjoutAuFavoris: function(produit){
				axios.post(window.Laravel.url+'/ajoutaufavoris/'+produit.id)
	              .then(response => {
	              		if(response.data.etat == "add"){
							swal(produit.Libellé, "a été ajouté au liste de favoris.", "success");
							adde(produit.id);
               	 		}
               	 		else{
               	 			swal(produit.Libellé, "a été retiré au liste de favoris.", "success");
	                		deletee(produit.id);
               	 		}
					
				             
			        	
	               })
	              .catch(error => {
	                  console.log('errors : '  , error);
	             })
            
          }

      },
      created:function(){
      	this.getProduit();
      	this.getFavoris();
      }
  });
  function selectTaille(taille){
  	app1.ajoutPanier.taille = taille;
  	     		
  }
  function selectColor(color){
  	app1.ajoutPanier.couleur_id = color;     		
  }
  function selectLivraisen(livraisen){
  	app1.ajoutPanier.type_livraison = livraisen;     		
  }
  function seletQte(qte){
  	app1.ajoutPanier.qte = qte; 
  }


</script>

<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
/*function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("adrrsse"),mapProp);
}*/


</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/shop.blade.php ENDPATH**/ ?>