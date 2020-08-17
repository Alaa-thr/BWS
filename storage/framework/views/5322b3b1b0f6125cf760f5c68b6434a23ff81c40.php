
<?php $__env->startSection('content'); ?>

	
	<head>
		<title><?php echo e(( 'Contact')); ?></title>
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
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/contactus.jpg');">
		<h2 class="ltext-105 cl0 txt-left m-l-70">
			Contactez Nous
		</h2>
	</section>	
		

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container" id="app">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<h4 class="mtext-105 cl2 txt-center p-b-30 color-t">
							Contactez_nous
						</h4>
            <div class=" m-b-20">
  						<div class="bor8 how-pos4-parent" :class="{'is-invalid' : message.adresse_email}">
  							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Votre Adresse Email" v-model="eemail.adresse_email" >
  							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
  						</div>
              <span class="px-3" style="color: #ca2323;" v-if="message.adresse_email" v-text="message.adresse_email[0]"></span>
            </div>
            <div class="m-b-30">
  						<div class="bor8" :class="{'is-invalid' : message.message}">
  							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Comment pouvons-nous vous aidez?" v-model="eemail.message" ></textarea>
  						</div>
              <span class="px-3" style="color: #ca2323;" v-if="message.message" v-text="message.message[0]"></span>
            </div>
						<button type=""  class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer bg10" v-on:click="addEmail()">
							Envoyer
						</button>
					
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2 color-t">
								Addresse
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Algerie Tlemcen, université Abou Baker Bel-Kayed 
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2 color-t">
								Parlons
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								05-40-84-47-82
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2 color-t">
								Email
							</span>

							<p class="stext-115 cl6 size-213 p-t-18 ">
								basmah.work_shop@gmail.com
							</p>
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
      	eemail:{
      		id: 0,
      		adresse_email: '',
      		message: '',
      		
      	},
      	message: {},
      },
      methods:{
      	
      	addEmail:function(){
              axios.post(window.Laravel.url+'/addemail',this.eemail)
              .then(response => {
                if(response.data.etat){
               	  Swal.fire({
				  position: '',
				  icon: 'success',
				  title: 'Votre message a été envoyé.',
				  html: 'Nous vous répondrons bientôt sur '+ response.data.email.adresse_email,
				  })
                  this.eemail = response.data.email;
                  this.eemail.id = response.data.email.id;
                  this.eemail = {
                        id: 0,
			      		
			      		adresse_email: '',
			      		message: '',
			      		
                    };
                   this.message={};

                }
              })
              .catch(error => {
              	this.message = error.response.data.errors;
                console.log('errors :' , error);
              })
              
           },

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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/contact.blade.php ENDPATH**/ ?>