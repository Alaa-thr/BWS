
<?php $__env->startSection('content'); ?>

     <title><?php echo e(( 'Basmah.WS')); ?></title>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>-->

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
    <section>
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
                            
                            <img v-if="imgP.produit_id === produit1.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="">
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

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
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
                            
                            <img v-if="imgP.produit_id === produit2.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="">
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

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
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
                            
                            <img v-if="imgP.produit_id === produit3.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="">
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

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
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
                            
                            <img v-if="imgP.produit_id === produit11.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="">
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

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="">
                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
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
                            
                            <img v-if="imgP.produit_id === produit12.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="">
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

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
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
                            
                            <img v-if="imgP.produit_id === produit13.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="">
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

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" v-on:click="">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON" >
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
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
    <section class="sec-blog bg0 p-t-60 p-b-80">
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
                            <a href="blog-detail.html">
                                <img :src="'storage/articles_image/'+ artcls.image" alt="IMG-BLOG" style="height: 200px;">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
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
                                    <a href="" class="mtext-101 cl2 hov-cl1 trans-04">
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
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel"  data-interval="9000">
            <div class="carousel-inner">
              <div class="carousel-item active">      
                    <div class="row "> <!--*******************************************************************-->
            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-01.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Esprit Ruffle Shirt
                                            </a>

                                            <span class="stext-105 cl3">
                                                $16.64
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
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-02.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Herschel supply
                                            </a>

                                            <span class="stext-105 cl3">
                                                $35.31
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
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-03.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Only Check Trouser
                                            </a>

                                            <span class="stext-105 cl3">
                                                $25.50
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
                            
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-04.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Classic Trench Coat
                                            </a>

                                            <span class="stext-105 cl3">
                                                $75.00
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
        <div class="carousel-item" >
            <div class="row "> <!--*******************************************************************-->
            
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-12.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Esprit Ruffle Shirt
                                        </a>

                                        <span class="stext-105 cl3">
                                            $16.64
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-11.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Herschel supply
                                        </a>

                                        <span class="stext-105 cl3">
                                            $35.31
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-06.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Only Check Trouser
                                        </a>

                                        <span class="stext-105 cl3">
                                            $25.50
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
                        
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-05.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Classic Trench Coat
                                        </a>

                                        <span class="stext-105 cl3">
                                            $75.00
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
          <div class="carousel-item" >
            <div class="row "> <!--*******************************************************************-->
            
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-10.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Esprit Ruffle Shirt
                                        </a>

                                        <span class="stext-105 cl3">
                                            $16.64
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-09.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Herschel supply
                                        </a>

                                        <span class="stext-105 cl3">
                                            $35.31
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-08.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Only Check Trouser
                                        </a>

                                        <span class="stext-105 cl3">
                                            $25.50
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
                        
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-07.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Classic Trench Coat
                                        </a>

                                        <span class="stext-105 cl3">
                                            $75.00
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
        
        <div id="carouselExampleInt" class="carousel slide" data-ride="carousel"  data-interval="7000" >
            <div class="carousel-inner">
              <div class="carousel-item active">      
                    <div class="row "> <!--*******************************************************************-->
            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-01.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Esprit Ruffle Shirt
                                            </a>

                                            <span class="stext-105 cl3">
                                                $16.64
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
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-02.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Herschel supply
                                            </a>

                                            <span class="stext-105 cl3">
                                                $35.31
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
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-03.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Only Check Trouser
                                            </a>

                                            <span class="stext-105 cl3">
                                                $25.50
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
                            
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-04.jpg" alt="IMG-PRODUCT">

                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Classic Trench Coat
                                            </a>

                                            <span class="stext-105 cl3">
                                                $75.00
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
        <div class="carousel-item" >
            <div class="row "> <!--*******************************************************************-->
            
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-12.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Esprit Ruffle Shirt
                                        </a>

                                        <span class="stext-105 cl3">
                                            $16.64
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-11.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Herschel supply
                                        </a>

                                        <span class="stext-105 cl3">
                                            $35.31
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-06.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Only Check Trouser
                                        </a>

                                        <span class="stext-105 cl3">
                                            $25.50
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
                        
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-05.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Classic Trench Coat
                                        </a>

                                        <span class="stext-105 cl3">
                                            $75.00
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
          <div class="carousel-item" >
            <div class="row "> <!--*******************************************************************-->
            
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-10.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Esprit Ruffle Shirt
                                        </a>

                                        <span class="stext-105 cl3">
                                            $16.64
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-09.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Herschel supply
                                        </a>

                                        <span class="stext-105 cl3">
                                            $35.31
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
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-08.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Only Check Trouser
                                        </a>

                                        <span class="stext-105 cl3">
                                            $25.50
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
                        
                        
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="images/product-07.jpg" alt="IMG-PRODUCT">

                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            Classic Trench Coat
                                        </a>

                                        <span class="stext-105 cl3">
                                            $75.00
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

    <div style="height: 15%;"></div>
 </div>   
<script>
    window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               "url"      => url("/")  
    ]); ?>;

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
            imagesproduit:[],
            colors: [],
            typeLivraisons: [],
            tailles: [],

         },
         methods:{
            getProduitHome: function(){
                var i=0;
                axios.get(window.Laravel.url+'/getproduithome')
                .then(response => {
                    app11.produits = response.data.produit;
                    app11.imagesproduit = response.data.ImageP;
                    app11.colors = response.data.color;
                    app11.typeLivraisons = response.data.typeLivraison;
                    app11.tailles = response.data.taille;
                    app11.produits.forEach(key => {
                        if(i<4){
                            app11.produits1.push(key);
                            i++;
                        }
                    });
                    i=0;
                    app11.produits.forEach(key => {
                        if(i<8 && i>=4){
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
                        if(i<24 && i>=20){
                            app11.produits13.push(key);
                            i++;
                        }
                        else{
                            i++;
                        }
                    });
                    console.log("window.Laravel.produit",response.data);
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
                    console.log("all article", app11.articles);
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
                        window.location.href = "<?php echo e(route('annonceEmploi')); ?>";
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
         }
})
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/home.blade.php ENDPATH**/ ?>