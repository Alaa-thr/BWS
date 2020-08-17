@extends('layouts.template_admin')

@section('content')

    <head>
        <title> {{$search}}</title>
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
            <a class="navbar-brand" style="margin-left: 260px"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" >
          <form  action="/abest" method="get">
              <div class="input-group no-border"  style="left: -40px;">
                <input type="search" name="search"  class="form-control" placeholder="Rechercher..." >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav" >
              <li>
          <div style="margin-top: 10px; margin-right: 10px;">
              <div id="google_translate_element"></div>                       
          </div>
        </li>
            <li class="nav-item dropdown" style="cursor: pointer; margin-right: 40px;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="img-xs rounded-circle" src="assetsAdmin/img/admin.jpg" alt="..."  />
                  <p>
                    <span class="d-lg-none d-md-block">Quelques Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <div class="account-item clearfix js-item-menu">  
                    <div class="card-body">
                           
                        <a >
                          <table >
                            <tr>
                              <td width="50%">
                                 <a href="assetsAdmin/img/admin.jpg"><img class="img-lg rounded-circle" src="assetsAdmin/img/admin.jpg"    alt="..."></a>
                              </td>
                              <td>
                                   <h6 class="description text-left" ><b id="a">Nabil Baba Ahmed</b></h6><a href ="babaahmednabil3@gmail.com" id ="nab">babaahmednabil3@gmail.com</a>
                               </td>
                             </tr>
                            </table>
                        </a>  
                    </div>
                    <div style="width: 255px; margin-left: 20px;"> 
                      <hr >
                     </div>
                      <a class="dropdown-item" href="{{ route('accueil') }}" id="n"><i class="now-ui-icons business_bank" id="m"></i><b>Allez vers Acceuil</b></a>
                      <a class="dropdown-item" href="{{ route('profilAdmin') }}" id="n"><i class="now-ui-icons users_single-02" id="m"></i><b>Profil</b></a>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" id="n">
                        <i class="now-ui-icons media-1_button-power" id="m"></i>
                        {{ __('Déconnexion') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                  </div>
                </div> 
            </li>
              
            </ul>
          </div>
        </div>
      </nav>
    <div class="panel-header panel-header-sm" >
    </div>
    <div class="content" >
    
        <div class="row" id='app' >
        
          <div class="col-md-12" >
          
            <div class="card" id="adm">
              <div class="card-header m-b-30" >
              
                <h4 class="card-title " style="margin-top: -5px; "> {{$search}}</h4>
               
                    
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
                                    @{{produit.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    @{{produit.prix}} DA
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

            
                    {{$produit->links()}}
                </div>
        </div>


        
    </div>

    <div class="content" id="xxx" >

			<div class="row"  id="app1"  >
				<div class="col-md-2 col-lg-9 p-b-2"  >
					<div class="p-r-15 p-r-0-lg" >
						<!-- item blog -->
						<div class="p-b-63" v-for="art in articles" >
							<a :href="'/articleDetaille/'+art.id" class="hov-img0 how-pos5-parent">
								<img :src="'storage/articles_image/'+ art.image"  style="height: 501px; ">

							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a :href="'/articleDetaille/'+art.id" class="ltext-108 cl2 hov-cl1 trans-04 color-t">
										@{{ art.titre }}
									</a>
								</h4>

								<p class="stext-117 cl6">
									 @{{ MoitieDescription(art.description,200, '. . .') }} 
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
									
										<span>
											@{{art.date}}
											
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
							 {{$article->links()}}
						</div>
						
					</div>
				</div>
			
				
			</div>
      </div>



      <div class="content" id="xx">
        <div class="row"  id="app3">
          
                
                   
               <div class="row m-b-10 " v-for="annoncea in annoncesEmployeur" style="display: inline-flex; height: 160px; width: 360px;">
                     
                        <div class="col-md-3 "  >
                          <img v-if=""  :src="'storage/annonces_image/'+ annoncea.image" style="height: 110px; width:120px; margin-bottom: 20px">
                        </div>
                        
                        <div class="col-md-5" >
                          <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >@{{ annoncea.libellé }}</h6><br>
                            <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                              @{{ MoitieDescription(annoncea.discription,13, '...') }}
                            </div>  
                            <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                                Nombre de condidat : @{{annoncea.nombre_condidat}}
                            </div>
                            <div class="txt-right m-t-20">
                                <a class="js-show-modal1 " style=" color: black;  font-style: italic; font-weight: 500; cursor: pointer; margin-right: -30px; " v-on:click="AfficheInfo(annoncea.id)"><b>  Afficher Plus </b>
                                </a>
                             </div>
                        </div>
                       
                       <div style="border-left: 2px solid #000; display: inline-block;height: 130px; margin: 0 20px;">
                       </div> 
                 </div>  
                 <div> 
                   {{$annonce->links()}}<!-- pour afficher la pagination -->
                </div>
              </div>
             </div>
           </div>
         </div>
        </div>
     </div>
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app4" v-if="hideModel">
      <div class="overlay-modal11 " v-on:click="CancelAnnonce(annc)"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 985px; margin-top: 40px;"   v-for="annoncea in annoncesemployeur2">
          <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="hideModel = false">
            <img src="images/icon-close.png" alt="CLOSE">
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
              <img :src="'storage/annonces_image/'+ annoncea.image" style="width: 1500px; height: 450px; margin-left: 80px; " />
            </div> 
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="title" style="color: red; margin-top: 30px; margin-left: 90px;" >
                  <h4><b>@{{annoncea.libellé }}</b></h4><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <div class="description" style="margin-left: 90px; margin-top: -20px; font-weight: 700; color: black;">
                Le nombre de condidat est : @{{annoncea.nombre_condidat}}
              </div>
            </div>
          </div>
          <div class="row" style="margin-left: 50px; margin-top: 10px;">
            <div class="col-md-2">
               <p style="color: black;">@{{ annoncea.discription }}</p>
            </div>               
          </div>  
        </div>

    <!--*****************************************************-->
    
    </div>


		</div>
                  
                </div>
              </div>
         
     
@endsection
@push('javascripts')



  

<script> 
        window.Laravel = {!! json_encode([

               'csrfToken'      => csrf_token(),
               'produit'        => $produit,
               'ImageP'         => $ImageP,
               'search'         => $search,
             	'article' => $article,
               "annonce"   => $annonce,

                'url'           => url('/'), 
          ]) !!};
</script>
<script>


   
   
     var app4 = new Vue({
      el: '#app4',
      data:{
        annoncesemployeur2: [],
        openInfo: false,
        hideModel: false,
       
        detaillsAn: {
          idAn: 0,
        },
       
                   
      },  
       methods: {
         
       detaillsAnnonce: function(){

        axios.post(window.Laravel.url+'/detaillsannonces', this.detaillsAn)

            .then(response => {

                 this.annoncesemployeur2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
       imagePreview(event) {
           var fileR = new FileReader();
           fileR.readAsDataURL(event.target.files[0]);
           fileR.onload = (event) => {
              
              this.image = event.target.result;
           }
           
      },
       CancelAnnonce(annonce){
        this.modifier = false ;
        this.hideModel = false;
        
       },

    
    },  
   

  });



var app3 = new Vue({

    el: '#app3',
 data:{
      annoncesEmployeur: [],
    
       },
 methods: {
      

       AfficheInfo: function($id){
        app4.hideModel = true; 
        app4.openInfo = true;
        app4.detaillsAn.idAn= $id;
        app4.detaillsAnnonce();
      }, 
     getsearch: function(){
            axios.get(window.Laravel.url+'/abest')
              .then(response => {
                this.annoncesEmployeur = window.Laravel.annonce.data;
                })
              .catch(error => {
                  console.log('errors : '  , error);
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
    } 

});




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
@endpush