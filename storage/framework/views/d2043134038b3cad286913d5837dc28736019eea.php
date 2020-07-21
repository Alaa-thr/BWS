
<?php $__env->startSection('content'); ?>

<?php
	function modify_url($params,$val,$oldVal){

		$replace = $params."=".$val;
		$subject = $params."=".$oldVal;
		$y=str_replace ( $subject, $replace,URL::current() );
		  return $y;
	}
	function deleteFrom_url($params,$val){
		$taillee = "/ville=".request()->route("vil");
		$type = "/type_livraison=".request()->route("type");
		
		if(strpos(Route::getCurrentRoute()->uri(), 'ville') && strpos(Route::getCurrentRoute()->uri(), 'type_livraison')){
			$y=str_replace($taillee, "", URL::current());
			$z=str_replace($type, "", $y);
			return $z.'/'.$params.'='.$val;
			
		}
		else if(strpos(Route::getCurrentRoute()->uri(), 'ville') && !strpos(Route::getCurrentRoute()->uri(), 'type_livraison')){
			$y=str_replace($taillee, "", URL::current());
			return $y.'/'.$params.'='.$val;
		}
		else{
			$y=str_replace($type, "", URL::current());
			return $y.'/'.$params.'='.$val;
		}

	}
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
                        	<img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="getPicture(imgP.image)" alt="IMG-PRODUCT"  style="height: 60px;">
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
	<?php
		$url = Route::getCurrentRoute()->uri();
	?>
	<!-- Product -->
	<div class="bg0 m-t-25 p-b-140">
		<div class="container" >
			<div class="flex-w flex-sb-m p-b-52" id="app122">
				<div class="flex-w flex-c-m m-tb-5">
			        <div class=" respon6-next" style="width: 230px;">
			            <div class="rs1-select2 bor8 bg0" >
			            	
				            	<select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" name='sousCategorie'>
									<?php if($url == "shop/search_categorie={id}"): ?>
					                	<option value="0" disabled selected>Sous-Categorie</option>
					                <?php else: ?>

					                	<option value="0" disabled selected>{{NameSousCategorie}}</option>
					                <?php endif; ?>
									<?php $__currentLoopData = $sousC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
										<option type="submit" value="/shop/search_categorie=<?php echo($sc->categorie_id)?>/sous-categorie=<?php echo($sc->id)?>">
												<?php echo e($sc->libelle); ?>

										</option>

										
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
			                
				        
			            </div>
					</div>
					<?php if(strpos($url, 'sous-categorie')): ?>
			        <div class="m-l-25 respon6-next" style="width: 230px;">
						<div class="rs1-select2 bor8 bg0" >
							<?php if(strpos($url, 'couleur')!= FALSE && strpos($url, 'prix')==FALSE && strpos($url, 'taille')==FALSE): ?>
				            	<select class="js-select2"  onchange="window.location.href = this.options[this.selectedIndex].value" >
									<option value="0" disabled selected>{{NameColor}}</option>
					                
									<?php $__currentLoopData = $AllColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ACL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option type="submit" value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/couleur=<?php echo($ACL->nom)?>">
											<?php echo e($ACL->nom); ?>

										</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>


				            <?php elseif(strpos($url, 'couleur')== FALSE && (strpos($url, 'prix')!=FALSE || strpos($url, 'taille')!=FALSE) && (strpos($url, 'ville')!=FALSE || strpos($url, 'type_livraison')!=FALSE)): ?>
				            	<select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" >
					                <option value="0" disabled selected>Couleur</option>
					                
									<?php $__currentLoopData = $AllColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ACL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option type="submit" value="<?php echo deleteFrom_url('couleur',$ACL->nom)?>">
											<?php echo e($ACL->nom); ?>

										</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
				            <?php elseif(strpos($url, 'couleur')!= FALSE  && (strpos($url, 'ville')!=FALSE || strpos($url, 'type_livraison')!=FALSE)): ?>
				            	<select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" >
					                <option value="0" disabled selected>Couleur</option>
					                
									<?php $__currentLoopData = $AllColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ACL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option type="submit" value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/couleur=<?php echo $ACL->nom?>">
											<?php echo e($ACL->nom); ?>

										</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>


				            <?php elseif(((strpos($url, 'couleur') && strpos($url, 'prix') && strpos($url, 'taille')) || (strpos($url, 'couleur') && strpos($url, 'prix')) || (strpos($url, 'couleur') && strpos($url, 'taille')))&& (strpos($url, 'ville')==FALSE && strpos($url, 'type_livraison')==FALSE)): ?>
				            	<select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" >
					                <option value="0" disabled selected>{{NameColor}}</option>
					                
									<?php $__currentLoopData = $AllColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ACL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option type="submit" value="<?php echo modify_url('couleur',$ACL->nom,request()->route("coul"))?>">
											<?php echo e($ACL->nom); ?>

										</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
			                <?php else: ?>
				            	<select class="js-select2" onchange="window.location.href += this.options[this.selectedIndex].value" >
									<option value="0" disabled selected>Couleur</option>
					                
									<?php $__currentLoopData = $AllColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ACL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option type="submit" value="/couleur=<?php echo($ACL->nom)?>">
											<?php echo e($ACL->nom); ?>

										</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
			                
				        	<?php endif; ?>
				    
			            </div>
			        </div>
			        <div class="m-l-25 respon6-next" style="width: 230px;">
						<div class="rs1-select2 bor8 bg0" >
			            	<?php if(strpos($url, 'couleur')== FALSE && strpos($url, 'prix')==FALSE && strpos($url, 'taille')!=FALSE): ?>
				            	
				            	<select class="js-select2"  onchange="window.location.href = this.options[this.selectedIndex].value">
									
					                <option value="0" disabled selected>{{NameTaille}}</option>

					                <option  value="<?php echo modify_url('taille','S',request()->route("tail"))?>">S</option>
	                        		<option  value="<?php echo modify_url('taille','M',request()->route("tail"))?>">M</option>
	                        		<option  value="<?php echo modify_url('taille','L',request()->route("tail"))?>">L</option>
	                        		<option  value="<?php echo modify_url('taille','XL',request()->route("tail"))?>">XL</option>
	                        		<option  value="<?php echo modify_url('taille','XXL',request()->route("tail"))?>">XXL</option>
	                        		<option  value="<?php echo modify_url('taille','XXXL',request()->route("tail"))?>">XXXL</option>

	                        		<option value="" disabled >Pointure </option>
					                <?php for($i = 19; $i <= 50; $i++): ?>
                                            <option value="<?php echo modify_url('taille',$i,request()->route("tail"))?>">&nbsp&nbspPointure <?php echo e($i); ?></option>
                                    <?php endfor; ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
				            <?php elseif(strpos($url, 'taille')== FALSE && (strpos($url, 'prix')!=FALSE || strpos($url, 'couleur')!=FALSE) && (strpos($url, 'ville')!=FALSE || strpos($url, 'type_livraison')!=FALSE)): ?>
				            	<select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" >
					                <option value="0" disabled selected>Taille Pour Vetement</option>

					                <option  value="<?php echo deleteFrom_url('taille','S')?>">S</option>
	                        		<option  value="<?php echo deleteFrom_url('taille','M')?>">M</option>
	                        		<option  value="<?php echo deleteFrom_url('taille','L')?>">L</option>
	                        		<option  value="<?php echo deleteFrom_url('taille','XL')?>">XL</option>
	                        		<option  value="<?php echo deleteFrom_url('taille','XXL')?>">XXL</option>
	                        		<option  value="<?php echo deleteFrom_url('taille','XXXL')?>">XXXL</option>

	                        		<option value="" disabled >Pointure </option>
					                <?php for($i = 19; $i <= 50; $i++): ?>
                                            <option value="<?php echo deleteFrom_url('taille',$i)?>">&nbsp&nbspPointure <?php echo e($i); ?></option>
                                    <?php endfor; ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
				            <?php elseif(strpos($url, 'taille')!= FALSE  && (strpos($url, 'ville')!=FALSE || strpos($url, 'type_livraison')!=FALSE)): ?>
				                <select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" >
					                <option value="0" disabled selected>Taille Pour Vetement</option>

					                <option value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=S">S</option>
	                        		<option value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=M">M</option>
	                        		<option  value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=L">L</option>
	                        		<option  value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=XL">XL</option>
	                        		<option  value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=XXL">XXL</option>
	                        		<option  value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=XXXL">XXXL</option>

	                        		<option value="" disabled >Pointure </option>
					                <?php for($i = 19; $i <= 50; $i++): ?>
                                            <option value="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/taille=<?php echo $i?>">&nbsp&nbspPointure <?php echo e($i); ?></option>
                                    <?php endfor; ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
				            <?php elseif(((strpos($url, 'couleur') && strpos($url, 'prix') && strpos($url, 'taille')) || (strpos($url, 'taille') && strpos($url, 'prix')) || (strpos($url, 'couleur') && strpos($url, 'taille')))&& (strpos($url, 'ville')==FALSE && strpos($url, 'type_livraison')==FALSE)): ?>
				            	<select class="js-select2"  onchange="window.location.href = this.options[this.selectedIndex].value" >
									
					                <option value="0" disabled selected>{{NameTaille}}</option>

					                <option  value="<?php echo modify_url('taille','S',request()->route("tail"))?>">S</option>
	                        		<option  value="<?php echo modify_url('taille','M',request()->route("tail"))?>">M</option>
	                        		<option  value="<?php echo modify_url('taille','L',request()->route("tail"))?>">L</option>
	                        		<option  value="<?php echo modify_url('taille','XL',request()->route("tail"))?>">XL</option>
	                        		<option  value="<?php echo modify_url('taille','XXL',request()->route("tail"))?>">XXL</option>
	                        		<option  value="<?php echo modify_url('taille','XXXL',request()->route("tail"))?>">XXXL</option>

	                        		<option value="" disabled >Pointure </option>
					                <?php for($i = 19; $i <= 50; $i++): ?>
                                            <option value="<?php echo modify_url('taille',$i,request()->route("tail"))?>">&nbsp&nbspPointure <?php echo e($i); ?></option>
                                    <?php endfor; ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
			                <?php else: ?>
			                	<select class="js-select2" onchange="window.location.href += this.options[this.selectedIndex].value" >
									
					                <option value="0" disabled selected>Taille Pour Vetement</option>

					                <option  value="/taille=S">S</option>
	                        		<option  value="/taille=M">M</option>
	                        		<option  value="/taille=L">L</option>
	                        		<option  value="/taille=XL">XL</option>
	                        		<option  value="/taille=XXL">XXL</option>
	                        		<option  value="/taille=XXXL">XXXL</option>

	                        		<option value="" disabled >Pointure </option>
					                <?php for($i = 19; $i <= 50; $i++): ?>
                                            <option value="/taille=<?php echo $i?>">&nbsp&nbspPointure <?php echo e($i); ?></option>
                                    <?php endfor; ?>
						                	
				            	</select>
				                <div class="dropDownSelect2"></div>
				        	<?php endif; ?>
			            </div>
			        </div>
					<div class="m-l-25 respon6-next" style="width: 230px;">
						<div class="rs1-select2 bg0" >
			            	<h5>Prix: <span id="demo"></span>DA</h5>
			            	<!--<form id="percent" action="/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/prix=10" method="GET">
  							<input type="range"  min="<?php echo $priceMin ?>" max="<?php echo $priceMax ?>" value="0" style="width: 230px;" oninput='document.getElementById("percent").submit();'>
				            </form>-->
							<?php if(strpos($url, 'prix')!= FALSE && strpos($url, 'couleur')==FALSE && strpos($url, 'taille')==FALSE): ?>
								
				                <input type="range" id="myRange" min="<?php echo $priceMin ?>" max="<?php echo $priceMax ?>" :value="NamePrix" style="width: 230px;" oninput="updateRange()" onchange="window.location.href = '/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/prix='+this.value;">


				            <?php elseif(strpos($url, 'prix')== FALSE && (strpos($url, 'couleur')!=FALSE || strpos($url, 'taille')!=FALSE) && (strpos($url, 'ville')!=FALSE || strpos($url, 'type_livraison')!=FALSE)): ?>
				            	
				                <input type="range" id="myRange" min="<?php echo $priceMin ?>" max="<?php echo $priceMax ?>" value="0" style="width: 230px;" oninput="updateRange()" onchange="window.location.href=updateRangeInput(this.value,'prix',this.value)"/>
				            <?php elseif(strpos($url, 'prix')!= FALSE  && (strpos($url, 'ville')!=FALSE || strpos($url, 'type_livraison')!=FALSE)): ?>
				                <input type="range" id="myRange" min="<?php echo $priceMin ?>" max="<?php echo $priceMax ?>" :value="NamePrix" style="width: 230px;" oninput="updateRange()" onchange="window.location.href= '/shop/search_categorie=<?php echo e(request()->route('id')); ?>/sous-categorie=<?php echo e(request()->route('id1')); ?>/prix='+this.value"/>

							<?php elseif(((strpos($url, 'couleur') && strpos($url, 'prix') && strpos($url, 'taille')) || (strpos($url, 'couleur') && strpos($url, 'prix')) || (strpos($url, 'prix') && strpos($url, 'taille')))&& (strpos($url, 'ville')==FALSE && strpos($url, 'type_livraison')==FALSE)): ?>
				            	
				                <input type="range" id="myRange" min="<?php echo $priceMin ?>" max="<?php echo $priceMax ?>" :value="NamePrix" style="width: 230px;" oninput="updateRange()" onchange="window.location.href= updateRange_url(this.value,'<?php echo e(request()->route('prx')); ?>')"/>

							<?php else: ?>
								
				            	<input type="range" id="myRange" min="<?php echo $priceMin ?>" max="<?php echo $priceMax ?>" value="0" style="width: 230px;" oninput="updateRange()" onchange="window.location.href+= '/prix='+this.value"/>
			                	
				        	<?php endif; ?>
  							
				            
			            </div>
			        </div>
			        <?php endif; ?>
				</div>
			    <div class="flex-w flex-c-m m-tb-20">
			    	
			       
			        <?php if(strpos($url, 'couleur')!= FALSE ||strpos($url, 'taille')!= FALSE  ||strpos($url, 'prix')!= FALSE): ?>
			        <div class="  respon6-next" style="width: 230px;">
						<div class="rs1-select2 bor8 bg0" >
			            	<?php if(strpos($url, 'type_livraison')!= FALSE): ?>
				            	<select class="js-select2"  onchange="window.location.href = this.options[this.selectedIndex].value" >
									<option v-if='NameTypeL == "vc"' value="vc" disabled selected>Le vendeur effectuer la livraison </option>
									<option v-else-if='NameTypeL == "cv"' value="cv" disabled selected>Vous apportez votre produit</option>
									<option v-else-if='NameTypeL == "dhl"' value="dhl" disabled selected>DHL(Poste)</option>
									
									<option  value="<?php echo modify_url('type_livraison','vc',request()->route("type"))?>">Le vendeur effectuer la livraison </option>
									<option   value="<?php echo modify_url('type_livraison','cv',request()->route('type'))?>">Vous apportez votre produit</option>
									<option   value="<?php echo modify_url('type_livraison','dhl',request()->route('type'))?>">DHL(Poste)</option>
								</select>
				                <div class="dropDownSelect2"></div>
							<?php else: ?>
				                <select class="js-select2"  onchange="window.location.href += this.options[this.selectedIndex].value" >
									<option value="0" disabled selected>Type de Livraison</option>
									<option  value="/type_livraison=vc">Le vendeur effectuer la livraison </option>
									<option   value="/type_livraison=cv">Vous apportez votre produit</option>
									<option   value="/type_livraison=dhl">DHL(Poste)</option>
							    </select>
				                <div class="dropDownSelect2"></div>
							<?php endif; ?>
			                </div>
				        </div>
			        
			        <div class="m-l-25 respon6-next" style="width: 230px;">
						<div class="rs1-select2 bor8 bg0" >
			            	<?php if(strpos($url, 'ville')!= FALSE): ?><!--existe-->
				            	<select class="js-select2" onchange="window.location.href = this.options[this.selectedIndex].value" >
									<?php if(strpos($url, 'ville')!= FALSE): ?>
					                	<option value="0" disabled selected>{{NameVille}}</option>
					               	<?php endif; ?>
	                   				<?php $__currentLoopData = $ville; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VIL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                   					<option value="<?php echo modify_url('ville',$VIL->nom,request()->route("vil"))?>">
												<?php echo e($VIL->nom); ?>

										</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
				                <div class="dropDownSelect2"></div>

				            <?php elseif(strpos($url, 'ville')== FALSE): ?><!-- N'existe pas-->
				            	<select class="js-select2" onchange="window.location.href += this.options[this.selectedIndex].value" >
										<option value="0" disabled selected>Ville</option>
					               		<?php $__currentLoopData = $ville; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $VIL): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					               			<option value="/ville=<?php echo $VIL->nom ?>">
												<?php echo e($VIL->nom); ?>

											</option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        </select>
				                <div class="dropDownSelect2"></div>
			               <?php endif; ?> 
				        
			            </div>
			        </div>
			        <?php endif; ?>

			    </div>

				
				
				
			</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<div class="row isotope-grid" id="app1">
				<?php $__currentLoopData = $produit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" >
				

					<div class="block2" >
						<div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
							
							<img v-if="imgP.produit_id == <?php echo $prdt->id ?> && imgP.profile === 1"  :src="getPicture(imgP.image)" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

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
								
								$k=0;
							?>
						<?php for($i=0 ; $i< count($fav) ; $i++): ?>
								<?php if($fav[$i]->produit_id == $prdt->id): ?>
										
									<?php
										$k=$k+1;
										$i=count($fav);
										
									?>
								
									

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
			                    <img src="<?php echo e(asset('images/icons/icon-close.png')); ?>" alt="CLOSE">
			                </button>

			                <div class="row">
			                    <div class="col-md-6 col-lg-7 p-b-30">
                                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                                        <div class="wrap-slick3 flex-sb flex-w">
                                            <div class=" flex-t">
                                                <div class="m-r-10">
                                                    <div class ="m-b-10" v-for="imgg in getImageD" style="border: 1px solid">
                                                    <img   :src="getPicture(imgg.image)" alt="IMG-PRODUCT" style="width: 65px;height: 65px;" v-on:click="changePicVue(imgg.image)">
                                                    </div>
                                                </div>
                                                
                                                <div class="item-slick3" >
                                                    <div class="wrap-pic-w">

                                                        <img v-for="img in getImageD" v-if="img.profile==1" :src="getPicture(img.image)" alt="IMG-PRODUCT" id="pic"/>
                                                    </div>
                                                </div>
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
													<div class=""  style="margin-top:-330%;" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"   style="  margin-left: 335px;">
        <i class="fas fa-ellipsis-v"  id="y" style="color: black"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="divSignal">
                    <a    v-on:click="SignalerProduit(detaillproduit.id)"  class="dropdown-item js-show-modal1" 
      style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;" >   Signaler Produit</a>
                    <a class="dropdown-item" v-on:click="SignalerVendeur(detaillproduit.vendeur_id)"
    style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;">
    Signaler Vendeur</a>
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
	function updateRange_url($val,$oldVal){
		
		$replace = '/prix='+$val;
		$subject = '/prix='+$oldVal;
		$y='<?php echo URL::current()?>'.replace($subject, $replace);
		  return $y;
		

	
	}
	function updateRangeInput(vall,params,val) {
	       	$taillee = "/ville="+'<?php echo request()->route("vil")?>';
			$type = "/type_livraison="+'<?php echo request()->route("type")?>';
			
			if('<?php echo Route::getCurrentRoute()->uri()?>'.indexOf('ville')!= -1 && '<?php echo Route::getCurrentRoute()->uri()?>'.indexOf('type_livraison') !=-1){
				$y='<?php echo URL::current()?>'.replace($taillee, "");
				$z=$y.replace($type, "");
				return  $z+'/'+params+'='+val;
				
			}
			else if('<?php echo Route::getCurrentRoute()->uri()?>'.indexOf('ville')!= -1  && '<?php echo Route::getCurrentRoute()->uri()?>'.indexOf('type_livraison') ==-1){
				$y='<?php echo URL::current()?>'.replace($taillee, "");
				return  $y+'/'+params+'='+val;
			}
			else{
				$y='<?php echo URL::current()?>'.replace($type, "");
				return  $y+'/'+params+'='+val;
			}
	}
    function updateRange() {
        var slider = document.getElementById("myRange");
		var output = document.getElementById("demo");
		if(slider!=null   && output!=null){
			output.innerHTML = slider.value; 
			slider.oninput = function() {
			  output.innerHTML = this.value;
			}
		}       
    }

    document.addEventListener('readystatechange', () => {   
	  	updateRange();
	});


</script>
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
	function changePic(img){
        document.getElementById("pic").src = 'http://localhost:8000/storage/produits_image/'+img;
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
               'NameColor'=> $NameColor,
               'NameTaille'=> $NameTaille,
               'NamePrix'=> $NamePrix,
               'NameVille'=> $NameVille,
               'NameTypeL'=> $NameTypeL,
               'prixTotale'		=> $prixTotale,
               'NameSousCategorie' =>$NameSousCategorie,
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
        	getPicture(img){
      			return "<?php echo e(asset('storage/produits_image')); ?>"+"/"+img;
      		},
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
      	getImageD: [],
      	
      },
      methods:{
      	getPicture(img){
      		return "<?php echo e(asset('storage/produits_image')); ?>"+"/"+img;
      	},
        changePicVue(img){
            changePic(img);
        },
		SignalerVendeur: function(id){
          	axios.post(window.Laravel.url+'/signalervendeur/'+id)
              .then(response => {
				Swal.fire(
					  "Signal est fait avec success!",
					);
					$('.js-modal1').removeClass('show-modal1');
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
		SignalerProduit: function(id){
          	axios.post(window.Laravel.url+'/signalerproduit/'+id)
              .then(response => {
				Swal.fire(
					  "Signal est fait avec success!",
					);
					$('.js-modal1').removeClass('show-modal1');
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
      	
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
				     initialiser();
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
      		axios.get(window.Laravel.url+'/getimageD/'+produit.id)
                .then(response => {
                      this.getImageD = response.data.imagee;                       
                })
                .catch(error =>{
                        console.log('errors :' , error);
                })
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
  var app122 = new Vue({
      el: '#app122',
      data:{
      	msg: 'welcome',
      	NameSousCategorie: null,
      	NameColor: null,
      	NameTaille: null,
      	NamePrix: 0,
      	NameVille: null,
      	NameTypeL: null,
      	
      },
      methods:{
          selectSousC: function(){
          	console.log(window.Laravel.NameSousCategorie);
          	console.log('color',window.Laravel.NameColor);
          	console.log('taille',window.Laravel.NameTaille);
          	console.log('prix',window.Laravel.NamePrix);
          	console.log('ville',window.Laravel.NameVille);
          	console.log('typeL',window.Laravel.NameTypeL);
       		if(window.Laravel.NameSousCategorie !=0){
       		 	this.NameSousCategorie =window.Laravel.NameSousCategorie[0].libelle;
       		 	
       		}
       		if(window.Laravel.NameColor !=0){
       		 	this.NameColor =window.Laravel.NameColor[0].nom;
       		 	
       		}
       		if(window.Laravel.NameTaille !=0){
       		 	this.NameTaille =window.Laravel.NameTaille[0].nom;
       		 	
       		}
       		if(window.Laravel.NamePrix !=0){
       		 	this.NamePrix =window.Laravel.NamePrix[0].prix;
       		 	
       		}
       		if(window.Laravel.NameVille !=0){
       		 	this.NameVille =window.Laravel.NameVille[0].nom;
       		 	
       		}
       		if(window.Laravel.NameTypeL !=0){
       		 	this.NameTypeL =window.Laravel.NameTypeL[0].type_livraison;
       		 	
       		}
          	 
          }

      },
      created:function(){
      	this.selectSousC();
      }
  });

</script>

<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});


</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/shopCategorie.blade.php ENDPATH**/ ?>