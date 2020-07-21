
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .swal2-container {
      z-index: 9001;
    }
    
</style>
     <title><?php echo e(( 'Basmah.WS')); ?></title>
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
            
            <div class="header-cart-content flex-w js-pscroll" id="app111" >
                <ul class="header-cart-wrapitem w-full"  >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier" >
                        <div class="header-cart-item-img" @click="deleteProduitPanier(command)" >
                            <img v-for="imgP in imagesproduit1" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT"  style="height: 60px;">

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
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                <div class="item-slick1 " style="background-image: url(images/slide-01.jpg);"  data-caption="Women’s Wear">
                    <div class="container h-full">
                        <div class=" h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-left cl2 respon2">
                                    Women Collection 2020
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 txt-left cl2 p-t-22 p-b-40 respon1">
                                    New arrivals
                                </h2>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/slide-06.jpg);"  data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-202 txt-center cl2 respon2">
                                    Men New-Season
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-104 txt-center cl2 p-t-22 p-b-40 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="item-slick1 " style="background-image: url(images/health.png);"  data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 txt-center cl2 respon2">
                                    Health Collection 2020
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 txt-center cl2 p-t-22 p-b-40 respon1">
                                    NEW SEASON
                                </h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
    
                <div class="item-slick1" style="background-image: url(images/IPHONE5.jpg);"  data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Phones Collection 2020
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    NEW SEASON
                                </h2>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url(images/kid.jpg);" data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Kid Collection 2020
                                </span>
                            </div>
                                
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 txt-center cl2 p-t-22 p-b-40 respon1">
                                    NEW SEASON
                                </h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </section>

    <!-- Product -->
    <div style="height: 15%;"  ></div>
    <!--*********************************************************-->
 <div id="app11">
    <!--*********************************************************-->
    <section class="m-b-20">
        <div  class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Présentation Produit
                </h3>
            </div>
        <!--**********************************************************************-->
        <div class="flex-w flex-sb-m p-b-10">
            <div class=" m-tb-10"></div>
            <div class="flex-w flex-sb-m m-tb-10 p-b-0">
                
                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 ">
                        <i class="zmdi zmdi-more" style="color: black;"></i>
                        <a href="<?php echo e(route('shop')); ?>" style="color: black;">&nbsp&nbsp&nbspPlus</a>
                    </div>
                    <div class="flex-c-m stext-106 cl6 size-101 bor4 pointer hov-btn3 trans-04 m-tb-4">
                        <i class="zmdi zmdi-plus-circle-o" style="color: black;"></i>
                        <button @click="deposerProduit">&nbsp&nbspDéposer Produit</button> 
                    </div> 
                </div>
            </div>  
        </div>  
        <!--************************************************************************-->
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel"  data-interval="9000">
            <div class="carousel-inner" >
              <div class="carousel-item active" >      
                    <div class="row " > <!--*******************************************************************-->
            
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit1 in produits1">
                                <!-- Block2 -->
                                <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
                            
                            <img v-if="imgP.produit_id === produit1.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 310px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit1)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit1.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit1.prix}}DA
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                            

                            
                                        
                    </div>
        </div>
        <div class="carousel-item" v-if='produits2.length != 0'>
            <div class="row "> 
                       <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit2 in produits2">
                                <!-- Block2 -->
                                <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
                            
                            <img v-if="imgP.produit_id === produit2.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 310px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit2)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit2.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit2.prix}}DA
                                </span>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
          </div>
          <div class="carousel-item" v-if='produits3.length != 0'>
            <div class="row ">
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit3 in produits3">
                                <!-- Block2 -->
                                <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
                            
                            <img v-if="imgP.produit_id === produit3.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 310px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit3)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit3.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit3.prix}}DA
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>
        <div  class="container">
        <!--**********************************************************************-->
        <!--**********************************************************************-->   
        
        <div id="carouselExampleInt" class="carousel slide" data-ride="carousel"  data-interval="7000" v-if='produits.length > 12'>
            <div class="carousel-inner">
              <div class="carousel-item active">      
                    <div class="row "> <!--*******************************************************************-->
                          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit11 in produits11">
                                <!-- Block2 -->
                                <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
                            
                            <img v-if="imgP.produit_id === produit11.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 310px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit11)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{produit11.Libellé}}
                                    </a>

                                    <span class="stext-105 cl3">
                                        {{produit11.prix}}DA
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <div class="carousel-item" v-if='produits12.length != 0'>
            <div class="row "> <!--*******************************************************************-->
                          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit12 in produits12">
                                <!-- Block2 -->
                                <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
                            
                            <img v-if="imgP.produit_id === produit12.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 310px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit12)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit12.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit12.prix}}DA
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item" v-if='produits13.length != 0'>
            <div class="row "> <!--*******************************************************************-->
                          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit13 in produits13">
                                <!-- Block2 -->
                                <div class="block2">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
                            
                            <img v-if="imgP.produit_id === produit13.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 310px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(produit13)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a  class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit13.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit13.prix}}DA
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInt" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInt" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>

    </section>
        <!--******************************************************************************-->   
    
    <div style="height: 6%;"></div>
    <!--************************************************************************************************-->
    <!-- Blog -->
    <section class="sec-blog bg0 p-t-60 p-b-80" v-if="articles.length != 0">
        <div class="container">
            <div class="p-b-66">
                <h3 class="ltext-103 cl5 txt-center ">
                    Notre Articles
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4 p-b-40" v-for="artcls in articles">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a :href="'/articleDetaille/'+artcls.id">
                                <img :src="'storage/articles_image/'+ artcls.image" alt="IMG-BLOG" style="height: 200px;">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        par
                                    </span>

                                    <span class="cl5">
                                        {{artcls.nom.toUpperCase()}} {{artcls.prenom.toUpperCase()}}
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        {{artcls.date}} 
                                    </span>
                                </span>
                            </div>
                            <div  >
                                <h4 class="p-b-12">
                                    <a :href="'/articleDetaille/'+artcls.id" class="mtext-101 cl2 hov-cl1 trans-04">
                                        {{artcls.titre}} 
                                    </a>
                                </h4>
                            </div>
                            <p class="stext-108 cl6">
                               {{ MoitieDescription(artcls.description,100, ' . . .') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--************************************************************************************************-->
    <div style="height: 9%;"></div>
    <section >
        <div  class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Présentation ANNONCE d'EMPLOI
                    
                </h3>
            </div>
        <!--**********************************************************************-->
        <div class="flex-w flex-sb-m p-b-10">
            <div class=" m-tb-10"></div>
            <div class="flex-w flex-sb-m m-tb-10 p-b-0">
                
                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 ">
                        <i class="zmdi zmdi-more" style="color: black;"></i>
                        <a href="<?php echo e(route('emploi')); ?>" style="color: black;">&nbsp&nbsp&nbspPlus</a>
                    </div>
                    <div class="flex-c-m stext-106 cl6 size-101 bor4 pointer hov-btn3 trans-04 m-tb-4">
                        <i class="zmdi">&nbsp&nbsp<img src="images/icons/add-annonce.png"></i>
                        <button v-on:click='deposerEmploi'>&nbspDéposer Annonce&nbsp</button> 
                    </div>
                </div>
            </div>  
        </div>      
        <!--************************************************************************-->
         <div id="carouselExampleIntervalE" class="carousel slide" data-ride="carousel"  data-interval="9000">
            <div class="carousel-inner" >
              <div class="carousel-item active" >      
                    <div class="row " > <!--*******************************************************************-->
            
                            <div class="col-sm-5 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit1 in produitsA1" style="height: 310px">
                                <div class="col-md-14 block2" > 
                                <div v-if="produit1.image!=null" class="col-md-14 block2 block2-pic hov-img0" style="">
                                    <img   :src="'storage/annonces_image/'+ produit1.image" style="height: 150px; ">
                                    <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(produit1.id)" style="cursor: pointer;">
                                        Quick View
                                    </a>
                                </div>

                                <div v-if="produit1.image!=null" class="col-md-14 js-show-modal1"  v-on:click="AfficheInfo(produit1.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;">
                                        <b>{{produit1.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style="margin-top: -10px; font-size: 14px;">
                                        {{ MoitieDescription(produit1.discription,60, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit1.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                                
                                <div v-if="produit1.image==null" class="col-md-14 js-show-modal1" v-on:click="AfficheInfo(produit1.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;" >
                                        <b>{{produit1.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style=" font-size: 14px;">
                                        {{ MoitieDescription(produit1.discription,100, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit1.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                               </div> 
                                
                                    
                            
                        </div>
                    </div>
        </div>
        <div class="carousel-item" v-if='produitsA2.length != 0'>
            <div class="row ">
                      <div class="col-sm-5 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit2 in produitsA2" style="height: 310px">
                                <div class="col-md-14 block2" > 
                                <div v-if="produit2.image!=null" class="col-md-14 block2 block2-pic hov-img0" style="">
                                    <img   :src="'storage/annonces_image/'+ produit2.image" style="height: 150px; ">
                                    <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(produit2.id)" style="cursor: pointer;">
                                        Quick View
                                    </a>
                                </div>

                                <div v-if="produit2.image!=null" class="col-md-14 js-show-modal1"  v-on:click="AfficheInfo(produit2.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;">
                                        <b>{{produit2.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style="margin-top: -10px; font-size: 14px;">
                                        {{ MoitieDescription(produit2.discription,60, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit2.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                                <div v-if="produit2.image==null" class="col-md-14 js-show-modal1" v-on:click="AfficheInfo(produit2.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;" >
                                        <b>{{produit2.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style=" font-size: 14px;">
                                        {{ MoitieDescription(produit2.discription,100, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit2.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                               </div> 
                                
                                    
                            
                        </div>             
            </div>
          </div>
          <div class="carousel-item" v-if='produitsA3.length != 0'>
            <div class="row ">
                        <div class="col-sm-5 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit3 in produitsA3" style="height: 310px">
                                <div class="col-md-14 block2" > 
                                <div v-if="produit3.image!=null" class="col-md-14 block2 block2-pic hov-img0" style="">
                                    <img   :src="'storage/annonces_image/'+ produit3.image" style="height: 150px; ">
                                    <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(produit3.id)" style="cursor: pointer;">
                                        Quick View
                                    </a>
                                </div>

                                <div v-if="produit3.image!=null" class="col-md-14 js-show-modal1"  v-on:click="AfficheInfo(produit3.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;">
                                        <b>{{produit3.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style="margin-top: -10px; font-size: 14px;">
                                        {{ MoitieDescription(produit3.discription,60, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit3.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                                <div v-if="produit3.image==null" class="col-md-14 js-show-modal1" v-on:click="AfficheInfo(produit3.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;" >
                                        <b>{{produit3.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style=" font-size: 14px;">
                                        {{ MoitieDescription(produit3.discription,100, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit3.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                            </div> 
                        </div> 
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIntervalE" role="button" data-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIntervalE" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>
        <div  class="container">
        <!--**********************************************************************-->
        <!--**********************************************************************-->   
        
        <div id="carouselExampleIntE" class="carousel slide" data-ride="carousel"  data-interval="7000" v-if='Annonces.length > 12'>
            <div class="carousel-inner">
              <div class="carousel-item active">      
                    <div class="row ">
                            <div class="col-sm-5 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit11 in produitsA11"style="height: 310px">
                                <div class="col-md-14 block2" > 
                                <div v-if="produit11.image!=null" class="col-md-14 block2 block2-pic hov-img0" style="">
                                    <img   :src="'storage/annonces_image/'+ produit11.image" style="height: 150px; ">
                                    <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(produit11.id)" style="cursor: pointer;">
                                        Quick View
                                    </a>
                                </div>

                                <div v-if="produit11.image!=null" class="col-md-14 js-show-modal1"  v-on:click="AfficheInfo(produit11.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;">
                                        <b>{{produit11.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style="margin-top: -10px; font-size: 14px;">
                                        {{ MoitieDescription(produit11.discription,60, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit11.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                                <div v-if="produit11.image==null" class="col-md-14 js-show-modal1" v-on:click="AfficheInfo(produit11.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;" >
                                        <b>{{produit11.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style=" font-size: 14px;">
                                        {{ MoitieDescription(produit11.discription,100, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit11.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                            </div> 
                       </div>
            </div>
        <div class="carousel-item" v-if='produitsA12.length != 0'>
            <div class="row ">
                        <div class="col-sm-5 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit12 in produitsA12" style="height: 310px">
                                <div class="col-md-14 block2" > 
                                <div v-if="produit12.image!=null" class="col-md-14 block2 block2-pic hov-img0" style="">
                                    <img   :src="'storage/annonces_image/'+ produit12.image" style="height: 150px; ">
                                    <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(produit12.id)" style="cursor: pointer;">
                                        Quick View
                                    </a>
                                </div>

                                <div v-if="produit12.image!=null" class="col-md-14 js-show-modal1"  v-on:click="AfficheInfo(produit12.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;">
                                        <b>{{produit12.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style="margin-top: -10px; font-size: 14px;">
                                        {{ MoitieDescription(produit12.discription,60, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit12.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                                <div v-if="produit12.image==null" class="col-md-14 js-show-modal1" v-on:click="AfficheInfo(produit12.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;" >
                                        <b>{{produit12.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style=" font-size: 14px;">
                                        {{ MoitieDescription(produit12.discription,100, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit12.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                            </div> 
                       </div>
            </div>
          </div>
          <div class="carousel-item" v-if='produitsA13.length != 0'>
            <div class="row ">
                         <div class="col-sm-5 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit13 in produitsA13" style="height: 310px">
                                <div class="col-md-14 block2" > 
                                <div v-if="produit13.image!=null" class="col-md-14 block2 block2-pic hov-img0" style="">
                                    <img   :src="'storage/annonces_image/'+ produit13.image" style="height: 150px; ">
                                    <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(produit13.id)" style="cursor: pointer;">
                                        Quick View
                                    </a>
                                </div>

                                <div v-if="produit13.image!=null" class="col-md-14 js-show-modal1"  v-on:click="AfficheInfo(produit13.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;">
                                        <b>{{produit13.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style="margin-top: -10px; font-size: 14px;">
                                        {{ MoitieDescription(produit13.discription,60, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit13.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                                <div v-if="produit13.image==null" class="col-md-14 js-show-modal1" v-on:click="AfficheInfo(produit13.id)" style="cursor: pointer;">
                                    <h5 class="title" style="color: red;" >
                                        <b>{{produit13.libellé}}</b>
                                    </h5><br>
                                    <div class="description" style=" font-size: 14px;">
                                        {{ MoitieDescription(produit13.discription,100, '...') }}
                                    </div>
                                    <div class="description" style="">
                                        <b>Nombre de condidat : {{produit13.nombre_condidat}}</b>
                                    </div> 
                                    
                                </div>
                            </div> 
                       </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIntE" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIntE" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        
        </div>

    </section>

    <div style="height: 15%;"></div>
 </div>  
 <div class="wrap-modal1 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-show="hideModel">
      <div class="overlay-modal1 " @click='CancelArticle'></div>
        <div class="container" v-show='commande'>
                        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                            <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()" >
                                <img src="images/icons/icon-close.png" alt="CLOSE">
                            </button>
                            <div class="p-b-30 p-l-40">
                              <h4 class="ltext-102  cl2">
                                     Fait Un Ajout   

                              </h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-7 p-b-30">
                                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                                        <div class="wrap-slick3 flex-sb flex-w">
                                            <div class=" flex-t">
                                                <div class="m-r-10">
                                                    <div class ="m-b-10" v-for="imgg in getImageD" style="border: 1px solid">
                                                    <img   :src="'storage/produits_image/'+imgg.image" alt="IMG-PRODUCT" style="width: 65px;height: 65px;" v-on:click="changePicVue(imgg.image)">
                                                    </div>
                                                </div>
                                                
                                                <div class="item-slick3" >
                                                    <div class="wrap-pic-w">

                                                        <img v-for="img in getImageD" v-if="img.profile==1" :src="'storage/produits_image/'+img.image" alt="IMG-PRODUCT" id="pic"/>
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
                                                            <option v-for="taille in tailless" v-if="taille.produit_id  === detaillproduit.id" :value="taille.nom">{{taille.nom}}</option>
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
                                                        <div class="btn-num-product-downp cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(-1)">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="0" placeholder="0" id="qtee">

                                                        <div class="btn-num-product-upp cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(1)">
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
                                            <div class=""  style="margin-top:-158%;" >
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
        <div class="container" v-if="demande" >
            <div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent" >
                <button class="how-pos3 hov3 trans-04 " @click='CancelArticle'>
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>
                <div class="p-b-30 p-l-40">
                    <h4 class="ltext-102  cl2">
                           Fait Une Demande   

                    </h4>
                </div>

                <div class="row" v-for="empp in emplois2">
                    <div class="col-md-6 col-lg-6  m-l-50">
                        <section class=" col-md-12  " > 
                           <div class="row">
                            <div class="col-md-10">
                              <div class="p-b-30 " style="margin-top: 25px;" >
                                <h3 class=" mtext-105 cl13" >
                                   Informations sur L'annonce
                                </h3>
                              </div>
                            </div>
                          </div>
                          <div class="row" v-if="empp.image!=null">
                            <div class="col-md-10" >
                              <img  :src="'storage/annonces_image/'+ empp.image" style="width: 300px; height: 190px; " />
                              
                            </div> 
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="title" style="color: red; margin-top: 30px;" >
                                  <h4><b>{{empp.libellé }}</b></h4><br>
                              </div>
                            </div>
                          </div>
                          <div class="row" style=" margin-top: -15px;">
                            <div class="col-md-11 ">
                               <p class="m-l-10 m-b-10" style="color: black;">{{ empp.discription }}</p>
                               <p style="color: black;"><b>Le nombre de condidat est :</b> {{empp.nombre_condidat}}</p>
                               <div class="flex-t">
                                    <p  style="color: black;">
                                    <b>Pour contacté l'employeur {{ empp.nom }} {{empp.prenom}} : &nbsp</b> </p>
                                  <div class="m-t--8">  
                                    <p style="color: black;">
                                        {{empp.num_tel}}
                                    </p>
                                    <p style="color: black;">
                                       {{empp.email}}
                                   </p>
                                 </div>
                               </div>
                            </div>               
                          </div>
                        </section> 

                    </div>
                
                    <div class="col-md-6 col-lg-5 p-b-30 m-l-30" >
                        <div class=" p-t-5 p-lr-0-lg" >
                            
                            <!--  -->
                            <div class="p-t-19 col-md-14">
                                <div class="p-b-50  ">
                                    <h4 class="mtext-105 cl13 p-l-50">
                                        Vos Informations
                                    </h4>
                                </div>
                                <div class="p-b-10">
                                    <form>
                                        <div  class="form-group flex-w p-b-10">
                                            <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                                                Nom et Prenom
                                            </div>
                                            <div class="size-219">
                                                <div class="bg0">
                                                    <input class="form-control m-r-30" id="nom_prenom" type="text" v-model='sendDemande.nom_Prenom' :class="{'is-invalid' : message.nom_Prenom}">
                                                     <span class="px-3 cl13" v-if="message.nom_Prenom" v-text="message.nom_Prenom[0]"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group flex-w p-b-10">
                                            <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                                                Numero Telephone
                                            </div>
                                            <div class="size-219">
                                                <div class=" bg0 ">
                                                    <input class="form-control" type="text" id="Numero" type="text" v-model='sendDemande.tlf' :class="{'is-invalid' : message.tlf}">
                                                     <span class="px-3 cl13" v-if="message.tlf" v-text="message.tlf[0]"></span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group flex-w p-b-10">
                                            <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                                                Email
                                            </div>
                                            <div class="size-219 ">
                                                <div class=" bg0">
                                                    <input class="form-control m-r-30" id="Email" type="text"  v-model='sendDemande.email' :class="{'is-invalid' : message.email}">
                                                     <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div  class="form-group flex-w p-b-10">
                                            <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                                                CV
                                            </div>
                                            <div class="size-219 m-b-5">
                                                <div class="bg0">
                                                    <input class="form-control m-r-30" id="cv" type="file" :class="{'is-invalid' : message.cv}" v-on:change="cvPreview" accept=
                                                    "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                                    text/plain, application/pdf, image/jpeg,image/png">
                                                    <span class="px-3 cl13" v-if="message.cv" v-text="message.cv[0]"></span>
                                                </div>
                                            </div>
                                            <span>Si votre fichier de CV est volumineux, ça peut prendre au plus quelques secondes pour le téléchargé.<br> MERCI DE PATIENCE</span>
                                        </div>

                                    </form>
                                </div>
                                <!--  -->

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="m-r-60">
                                        <button class=" stext-101 cl0 size-1044 bg11 bor1 trans-04" v-on:click="addDemande(emplois2[0].id)">
                                            Demander
                                        </button>
                                        <button class="stext-101 cl0 size-1044 bg10 bor1 trans-04 m-r-10" v-on:click="CancelArticle">
                                            Annuler
                                        </button>
                                        
                                        <div class=""  style="margin-top:-158%;argin-right:10px;" >
                                                <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"   style="  margin-left: 335px;">
                                                    <i class="fas fa-ellipsis-v"  id="y" style="color: black"></i>
                                                </a>
                                         <div class="dropdown-menu " x-placement="right-start" id="divSignal">
                                                                <a  class="dropdown-item"  v-on:click="SignalerAnnonce(1)"  
                                                style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;" >   Signaler Annonce</a>
                                                                <a class="dropdown-item" v-on:click="SignalerEmployeur(1)"
                                                style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;">
                                                Signaler Employeur</a>
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
<script>
    window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               "url"      => url("/")  
    ]); ?>;
</script>
<script>
    function changePic(img){
        document.getElementById("pic").src = 'http://localhost:8000/storage/produits_image/'+img;
    }
    function initialiser(){
        
        document.getElementById("qtee").value = 0;
        $('.TLTLTL').val('0').select2();
        $('.cccc').val('0').select2();
        $('.tttt').val('0').select2();    
    }
    function initialiseCV(){
        document.getElementById('cv').value = null;
    }
    function changeQte(val){
        var x= parseInt(document.getElementById('qtee').value,10);
        if(val == 1){
            document.getElementById('qtee').value = x+1;
            app11.ajoutPanier.qte = x+1;
        }   
        else if(val == -1 && x > 1){
            document.getElementById('qtee').value = x-1;
            app11.ajoutPanier.qte = x-1;
        }               
    }

    var app2 = new Vue({
     el: '#app2',
     data:{
        emplois2: [],
        hideModel: false,
        detailsEMP:{
          idEMP: 0,
         },
        sendDemande: {
            nom_Prenom: '',
            tlf: '',
            email: '',
            cv: null,
            annonceE_id: 0,
        },
        message: {},
        clientt:[],
        demande: false,
        commande:false,
        detaillproduit: [],
        tailless: [],
        tailleExiste: false,
        colors: [],
        typeLivraisons: [],
        imagesproduit2: [],
        getImageD: [],
     },
     methods: {
            SignalerVendeur: function(id){
                axios.post(window.Laravel.url+'/signalervendeur/'+id)
                  .then(response => {
                    Swal.fire(
                        "Signal est fait avec success!",
                      );
                      $('.js-modal1').removeClass('show-modal1');
                              
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
                              
                   })
                  .catch(error => {
                      console.log('errors : '  , error);
                 })
              },
            changePicVue(img){
                changePic(img);
            },
            callfunctionQte(val){
                changeQte(val);
            },
            addPanier: function(){
                axios.post(window.Laravel.url+'/addpanier',app11.ajoutPanier)
                  .then(response => {
                    if(response.data.etat && !response.data.produitExister){
                        app111.favoris.unshift(response.data.cmd);
                        app111.imagesproduit1.unshift(response.data.image);
                        app111.ProduitsPanier.unshift(response.data.commande);
                        app111.prix[0].prixTo += response.data.prixTotale;
                        Swal.fire(
                          "L'ajout est fait avec success!",
                          'Votre produit a bien ajouter a votre panier.',
                          'success'
                        );
                        initialiser();
                        app11.ajoutPanier= {
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
                        app11.ajoutPanier= {
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
                        initialiser();
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
            CancelArticle(){
                $('.js-modal1').removeClass('show-modal1');
                this.sendDemande= {
                    nom_Prenom: this.clientt.nom.concat(' ').concat(this.clientt.prenom),
                    tlf: this.clientt.numeroTelephone,
                    email: this.clientt.email,
                    cv: null,
                    annonceE_id: 0,

                };
                if(this.demande){
                    initialiseCV();
                }
                else{
                    initialiser();
                }
                this.message= {};
                this.commande = false;
                this.demande = false;
                
                    
            },
              SignalerEmployeur: function(id){
            axios.post(window.Laravel.url+'/signaleremployeur/'+id)
              .then(response => {
                Swal.fire(
                      "Signal est fait avec success!",
                    );
                    $('.js-modal1').removeClass('show-modal1');
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
        SignalerAnnonce: function(id){
            axios.post(window.Laravel.url+'/signalerannonce/'+id)
              .then(response => {
                Swal.fire(
                      "Signal est fait avec success!",
                    );
                    $('.js-modal1').removeClass('show-modal1');
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
            addDemande: function(id_Annonce){
                this.sendDemande.annonceE_id = id_Annonce;
                axios.get(window.Laravel.url+'/iscnnected')

                    .then(responsee => {
                        if(!responsee.data.etatee && responsee.data.type == 0){
                            this.sendDemande= {
                                nom_Prenom: '',
                                tlf: '',
                                email: '',
                                cv: null,
                                annonceE_id: 0,

                            };
                            initialiseCV();
                            this.message= {};
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
                        else if(responsee.data.etatee && responsee.data.type == 1){
                            this.sendDemande= {
                                nom_Prenom: '',
                                tlf: '',
                                email: '',
                                cv: null,
                                annonceE_id: 0,

                            };
                            initialiseCV();
                            this.message= {};
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
                        else{
                            Swal.fire({
                              title: 'Etes-vous sûr?',
                              text: "De ces INFORMATIONS dans votre demande?",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Oui,envoyer'
                            }).then((result) => {
                              if (result.value) {
                                    axios.post(window.Laravel.url+'/envoyerdemande',this.sendDemande)

                                .then(response => {
                                    if(response.data.etat && response.data.cncte && response.data.demandeExiste){//cncté et client mais demande existe

                                        Swal.fire({
                                          icon: 'error',
                                          title: 'Oops...',
                                          text:"Vous avez déja fait une demande de ce annonce!",
                                        });
                                        this.sendDemande= {
                                            nom_Prenom: this.clientt.nom.concat(' ').concat(this.clientt.prenom),
                                            tlf: this.clientt.numeroTelephone,
                                            email: this.clientt.email,
                                            cv: null,
                                            annonceE_id: 0,

                                        };
                                        $('.js-modal1').removeClass('show-modal1');
                                        initialiseCV();
                                        this.message= {};
                                    }
                                    else if(response.data.etat && response.data.cncte && !response.data.demandeExiste){//cncté et client
                                        Swal.fire(
                                          "La Demande a été envoyé avec success!",
                                          "",
                                          'success'
                                        );
                                        this.sendDemande= {
                                            nom_Prenom: this.clientt.nom.concat(' ').concat(this.clientt.prenom),
                                            tlf: this.clientt.numeroTelephone,
                                            email: this.clientt.email,
                                            cv: null,
                                            annonceE_id: 0,

                                        };
                                        $('.js-modal1').removeClass('show-modal1');
                                        initialiseCV();
                                        this.message= {};
                                    }
                                    
                                })
                                .catch(error =>{
                                    this.message = error.response.data.errors;
                                    console.log('errors :' , this.message);
                                })

                              }
                            });
                            
                        }
                    });
                    
                    
                
                
            },
           cvPreview: function (event){
                var fileR = new FileReader();
               fileR.readAsDataURL(event.target.files[0]);

               fileR.onload = (event) => {
                  this.sendDemande.cv = event.target.result;
               }
           },
           detaillsAnnonceemp: function(){
                this.demande=true;
                this.commande=false;
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
     var app111 = new Vue({
        el: '#app111',
        data:{
          message:'hello',
          ProduitsPanier: [],
          favoris: [],
          imagesproduit1: [],
          prix:[],
        },
        methods:{

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


        },
     })
</script>
<script >
    var app11 = new Vue({
         el : "#app11",
         data:{
            articles: [],
            produits: [],
            produits1: [],
            produits2: [],
            produits3: [],
            produits11: [],
            produits12: [],
            produits13: [],
            Annonces: [],
            produitsA1: [],
            produitsA2: [],
            produitsA3: [],
            produitsA11: [],
            produitsA12: [],
            produitsA13: [],
            imagesproduit:[],
            articleId:{
                id: '',
            },
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
            
            

         },
         methods:{
            detaillProduit:function(produit){
                axios.get(window.Laravel.url+'/getimageD/'+produit.id)
                .then(response => {
                      app2.getImageD = response.data.imagee;
                     console.log("app2.getImageD", window.Laravel.image )                       
                })
                .catch(error =>{
                        console.log('errors :' , error);
                })
                app2.hideModel = true;
                app2.commande = true;
                app2.demande = false; 
                var i = 0;
                 
                this.ajoutPanier.vendeur_id = produit.vendeur_id;
                this.ajoutPanier.prix = produit.prix;
                app2.detaillproduit = produit;
                app2.detaillproduit.Nom = app2.detaillproduit.Nom.toUpperCase();
                app2.detaillproduit.Prenom = app2.detaillproduit.Prenom.toUpperCase();
                this.ajoutPanier.produit_id = app2.detaillproduit.id;
                app2.tailless.forEach(key => {
                    if(app2.detaillproduit.id == key.produit_id ){
                            i++;
                            console.log('produit');
                    }
                });
                if(i != 0){
                    app2.tailleExiste = true;
                    this.ajoutPanier.tailExst = 1;
                }
                else{
                    app2.tailleExiste = false;
                    this.ajoutPanier.tailExst = 0;
                }
            },
            AfficheInfo: function($id){
                app2.hideModel = true; 
                app2.detailsEMP.idEMP= $id;
                app2.detaillsAnnonceemp();
            },
            getAnnonceHome: function(){
                var i=0;
                axios.get(window.Laravel.url+'/getannoncehome')
                .then(response => {
                    app11.Annonces = response.data.annonce;
                    app2.clientt =response.data.client; 
                    app2.sendDemande= {
                        nom_Prenom: response.data.client.nom.concat(' ').concat(response.data.client.prenom),
                        tlf: response.data.client.numeroTelephone,
                        email: response.data.client.email,
                    };
                    app11.Annonces.forEach(key => {
                        if(i<4){
                            app11.produitsA1.push(key);
                            i++;
                        }
                    });
                    i=0;
                    app11.Annonces.forEach(key => {
                        if(i<8 && i>=4){
                            app11.produitsA2.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.Annonces.forEach(key => {
                        if(i<12 && i>=8){
                            app11.produitsA3.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.Annonces.forEach(key => {
                        if(i<16 && i>=12){
                            app11.produitsA11.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.Annonces.forEach(key => {
                        if(i<20 && i>=16){
                            app11.produitsA12.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.Annonces.forEach(key => {
                        if(i<24 && i>=20){
                            app11.produitsA13.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                })
                .catch(error => {
                      console.log('errors : '  , error);
                })
            },
            showArticleD: function(id){
                
                app11.articleId.id = id;
                axios.post(window.Laravel.url+'/articleD',app11.articleId)
                .then(response => {
                    
                })
                .catch(error => {
                      console.log('errors : '  , error);
                })
            },
            getProduitHome: function(){
                var i=0;
                axios.get(window.Laravel.url+'/getproduithome')
                .then(response => {
                    app11.produits = response.data.produit;
                    console.log("app11.produits",app11.produits)
                    app11.imagesproduit = response.data.ImageP;
                    app2.colors = response.data.color;
                    app2.typeLivraisons = response.data.typeLivraison;
                    app2.tailless = response.data.taille;
                    app2.imagesproduit2 = response.data.ImageP;
                    app111.ProduitsPanier = response.data.command;
                    app111.prix = response.data.prixTotale;
                    app111.imagesproduit1 = response.data.ImageP;
                    app111.favoris = response.data.Fav;
                    app11.produits.forEach(key => {
                        if(i<4 ){
                            app11.produits1.push(key);
                            i++;
                        }
                    });
                    i=0;
                    app11.produits.forEach(key => {
                        if(i<8 && i>=4 ){
                            app11.produits2.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.produits.forEach(key => {
                        if(i<12 && i>=8){
                            app11.produits3.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.produits.forEach(key => {
                        if(i<16 && i>=12){
                            app11.produits11.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.produits.forEach(key => {
                        if(i<20 && i>=16){
                            app11.produits12.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    i=0;
                    app11.produits.forEach(key => {
                        if(i<24 && i>=20 ){
                            app11.produits13.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
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
            getArticleHome: function(){
                axios.get(window.Laravel.url+"/getarticlehome")
                .then(response => {
                    app11.articles = response.data.allArticle;
                })
                .catch(error =>{
                    console.log('errors :' , error);
                })
            },
            deposerProduit: function(){
                axios.get(window.Laravel.url+"/deposerproduit")
                .then(response => {
                    if(response.data.etat == 'cnnect'){
                        window.location.href = "<?php echo e(route('produitVendeur')); ?>";
                    }
                    else if(response.data.etat){
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Vendeur</b> pour deposer des produits.',
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
                    else{
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Vendeur</b> pour deposer des produits.',
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
                .catch(error =>{
                    console.log('errors :' , error);
                })
            },
            deposerEmploi: function(){
                axios.get(window.Laravel.url+"/deposeremploi")
                .then(response => {
                    if(response.data.etat == 'cnnect'){
                        window.location.href = "<?php echo e(route('annoncesemploi')); ?>";
                    }
                    else if(response.data.etat){
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Employeur</b> pour deposer des annonces.',
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
                    else{
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          html: 'Vous devez être connecté tent que <b style="text-decoration: underline;">Employeur</b> pour deposer des annonces.',
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
                .catch(error =>{
                    console.log('errors :' , error);
                })
            },
         },
         mounted:function(){
           this.getArticleHome();
           this.getProduitHome();
           this.getAnnonceHome();
         }
})
function selectTaille(taille){
    app11.ajoutPanier.taille = taille;
                
  }
  function selectColor(color){
    app11.ajoutPanier.couleur_id = color;            
  }
  function selectLivraisen(livraisen){
    app11.ajoutPanier.type_livraison = livraisen;            
  }
  function seletQte(qte){
    app11.ajoutPanier.qte = qte; 
  }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/home.blade.php ENDPATH**/ ?>