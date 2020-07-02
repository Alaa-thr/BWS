
<?php $__env->startSection('content'); ?>


	
	<head>
		<title><?php echo e(( 'Article')); ?></title>
	</head>
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
                 console.log("window.Laravel.ar",window.Laravel.allArticle.data);
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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/article.blade.php ENDPATH**/ ?>