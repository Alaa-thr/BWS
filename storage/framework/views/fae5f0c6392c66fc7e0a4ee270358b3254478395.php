
<?php $__env->startSection('content'); ?>

	
	<head>
		<title><?php echo e(( 'Emplois')); ?></title>
	</head>
<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Emploi
			</span>
		</div>
	</div>

	<!-- Annonce d'emploi -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container" id="app">
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
         
         <!--div class="row m-b-10 " v-for="annoncea in annoncesEmployeur" style="display: inline-flex; height: 160px; width: 360px;">
        
                        <div class="col-md-3 "  >
                          <img v-if=""  :src="'storage/annonces_image/'+ annoncea.image" style="height: 110px; width:120px; margin-bottom: 20px">
                        </div>
                        
                        <div class="col-md-5" >
                          <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >{{ annoncea.libellé }}</h6><br>
                            <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                              {{ MoitieDescription(annoncea.discription,13, '...') }}
                            </div>  
                            <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                                Nombre de condidat : {{annoncea.nombre_condidat}}
                            </div>
                            <div class="txt-right m-t-20">
                                <a class="js-show-modal1 " style=" color: black;  font-style: italic; font-weight: 500; cursor: pointer; margin-right: -30px; " v-on:click="AfficheInfo(annoncea.id)"><b>  Afficher Plus </b>
                                </a>
                             </div>
                        </div>
                        <table>
                         <tr>                        
                            <td class="dropdown" >
                              <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                               <img src="assetsEmployeur/img/menu.png" /> 
                              </a>
                              <div class="dropdown-menu dropdown-menu-right ">   
                               <a class="dropdown-item js-show-modal1" style="color: blue; font-style: italic; font-weight: 900; cursor: pointer;" v-on:click="updateAnnonce(annoncea)">Modifier</a>
                               <a class="dropdown-item" v-on:click="deleteAnnonce(annoncea)" style="color: blue; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
                              </div>
                            </td>
                         </tr>
                       </table>
                       <div style="border-left: 2px solid #000; display: inline-block;height: 130px; margin: 0 20px;">
                       </div> 
                 </div-->
		        	<div class="row m-b-10"  v-for="emp in emplois" style="display: inline-flex;  width: 420px;">
						<div class="col-md-4 block2 block2-pic hov-img0" style="margin-left: 30px;">
							<img  :src="'storage/annonces_image/'+ emp.image" style="height: 120px; width: 350px; ">
							<a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(emp.id)" style="cursor: pointer;">
								Quick View
							</a>
						</div>
						<div class="col-md-6">
							<h5 class="title" style="color: red;">
								<b>{{emp.libellé}}</b>
							</h5><br>
							<div class="description" style="margin-top: -10px; font-size: 14px;">
								{{ MoitieDescription(emp.discription,15, '...') }}
							</div>
							<div class="description" style="margin-top: 10px;">
								<b>Nombre de condidat : {{emp.nombre_condidat}}</b>
							</div>
							<div class="block2-txt-child2 ">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" style="margin-top: 20px; margin-left: 150px;">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON" style="margin-top: 20px; margin-left: 150px;">
								</a>
							</div>
						</div>
						<div style="border-left: 2px solid #000; display: inline-block;height: 120px; margin: 0 20px; margin-left: 12px;">
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

	<div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-if="hideModel">
      <div class="overlay-modal11 "></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo "  style="width: 985px;" v-for="empp in emplois2" >
          <button class="how-pos3 hov3 trans-04 p-t-6">
            <img src="images/icon-close.png" alt="CLOSE" >
          </button>
           <div class="row">
            <div class="col-md-8">
              <div class="p-b-30 p-l-40" style="margin-left: 80px;" >
                <h3 class=" cl2" >
                   Informations sur L'annonce
                </h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10" >
              <img :src="'storage/annonces_image/'+ empp.image" style="width: 1500px; height: 450px; margin-left: 80px; " />
            </div> 
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="title" style="color: red; margin-top: 30px; margin-left: 90px;" >
                  <h4><b>{{empp.libellé }}</b></h4><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="description" style="margin-left: 90px; margin-top: -20px; font-weight: 700; color: black;">
                Le nombre de condidat est : {{empp.nombre_condidat}}
              </div>
            </div>
          </div>
          <div class="row" style="margin-left: 50px; margin-top: 10px;">
            <div class="col-md-2">
               <p style="color: black;">{{ empp.discription }}</p>
            </div>               
          </div>   
        </div>
      </div>
    </div>


<script>
	window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               "emploi"     => $emploi,
               "url"      => url("/")  
    ]); ?>;



</script>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>
<script>
	var app2 = new Vue({
     el: '#app2',
     data:{
        emplois2: [],
        hideModel: false,
        openInfo: false,
        detailsEMP:{
          idEMP: 0,
         },
     },
     methods: {
           detaillsAnnonceemp: function(){
             axios.post(window.Laravel.url+'/detailsemp',this.detailsEMP)

            .then(response => {
                 this.emplois2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },
       
    },
   });
	var app = new Vue({
      el: '#app',
      data:{
        emplois: [],
      },
      methods:{
        getEmploi: function(){
        axios.get(window.Laravel.url+'/emploi')

            .then(response => {
                 this.emplois = window.Laravel.emploi;
                 console.log("window.Laravel.emploi",window.Laravel.emploi);
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },
        AfficheInfo: function($id){
        app2.hideModel = true; 
        app2.openInfo = true;
        app2.detailsEMP.idEMP= $id;
        app2.detaillsAnnonceemp();
      },
       MoitieDescription:  function (text, length, suffix){
          if(text.length <= length){
            return text;

          }
         
          return text.substring(0, length) + suffix;

      }, 
        
      },
      created:function(){
        this.getEmploi();
      },
  });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/emploi.blade.php ENDPATH**/ ?>