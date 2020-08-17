@extends('layouts.template_clinet')

@section('content')

<style type="text/css">

    .swal2-container {
      z-index: 9001;
    }
    
</style>
    <head>
        <title>{{ ( 'Favorie') }}</title>
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
            
            <div class="header-cart-content flex-w js-pscroll" id="app1" >
                <ul class="header-cart-wrapitem w-full"  >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanierr" >
                        <div class="header-cart-item-img" @click="deleteProduitPanier(command)" >
                            <img v-for="imgP in imagesproduitr" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT"  style="height: 60px;">

                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favorirs" v-if="fv.id === command.produit_id" >
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            @{{fv.Libellé}}
                            </a>

                            <span class="header-cart-item-info">
                            @{{command.qte}} x  @{{fv.prix}} DA
                            </span>
                        </div>
                    </li>
                </ul>
                
                <div class="w-full" >
                    
                <div class="header-cart-total w-full p-tb-40" v-for="p in prix">
                        Totale: @{{p.prixTo}} DA
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{route('panier')}}" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{route('panier')}}" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    </div>

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
            <a class="navbar-brand" href="#pablo">Favories </a>
          </div>
        </div>
    </nav>
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row" id='app'>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header m-b-30">
                <h4 class="card-title " style="margin-top: -5px; ">Favories</h4>
               
                    
              </div> 
            <div class="row isotope-grid" style =" margin-left:22px; margin-right:22px;" >
                <div class="p-b-35 col-sm-4 col-md-5 col-lg-3 isotope-item women" v-for="fv in produitss">
                    <!-- Block2 -->
                    <div class="block2" >
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit">
                            <img v-if="imgP.produit_id === fv.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 250px;width: 280px;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(fv)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l " >
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    @{{fv.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    @{{fv.prix}} DA
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <div class="p-t-3">
                                  <a  class="" v-on:click="AjoutAuFavoris(fv,'produit')" style="cursor: pointer;">
                                    <i  class="zmdi zmdi-favorite zmdi-hc-lg" style="color: #e60000; " :id="fv.id"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="p-b-35 col-sm-4 col-md-5 col-lg-3 isotope-item women" v-for="anc in AnnonceTableau">
                    <div class=" row  block2 m-b-10 " style="display: inline-flex; height: 160px; width: 360px;">
                        <div style="display: inline-flex; height: 160px; width: 360px;">
                        <div class="col-md-3 block2 block2-pic hov-img0" v-if="anc.image!=null">
                          <img  :src="'storage/annonces_image/'+ anc.image" style="height: 120px; width:120px;"/>
                          <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2  bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfo(anc.id)" style="cursor: pointer;">
                            Quick View
                          </a>
                          
                        </div>
                        
                        <div class="col-md-5 " v-if="anc.image!=null">
                          <div class="js-show-modal1" @click="AfficheInfo(anc.id)" style="cursor: pointer;">
                            <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >@{{ anc.libellé }}</h6><br>
                            <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                              @{{ MoitieDescription(anc.discription,40, '...') }}
                            </div>  
                            <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                                Nombre de condidat : @{{anc.nombre_condidat}}
                            </div>
                          </div>
                            <a  class="m-t-10" v-on:click="AjoutAuFavoris(anc,'annonce')" style="cursor: pointer; float: right;" >
                                <i  class="zmdi zmdi-favorite zmdi-hc-lg" style="color: #e60000; " :id="anc.id"></i>
                            </a>
                        </div>
                        <div class="col-md-8" v-if="anc.image ==null">
                          <div class="js-show-modal1" @click="AfficheInfo(anc.id)" style="cursor: pointer;">
                            <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >@{{ anc.libellé }}</h6><br>
                            <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                                @{{ MoitieDescription(anc.discription,80, '...') }}
                            </div>  
                            <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                                  Nombre de condidat : @{{anc.nombre_condidat}}
                            </div>
                          </div>
                          <a  class="m-t-10" v-on:click="AjoutAuFavoris(anc,'annonce')" style="cursor: pointer; float: right;" >
                                <i  class="zmdi zmdi-favorite zmdi-hc-lg" style="color: #e60000; " :id="anc.id"></i>
                          </a>
                        </div>
                        <div style="border-left: 2px solid #000; display: inline-block; height: 130px; margin: 0 20px;">
                       </div> 
                    </div>
                 </div> 




                   
                  </div>
                </div>
            <div>
                    {{$produit->links()}}
          </div>
        </div>
    </div>
    <div class="wrap-modal11 js-modal1 p-t-80 p-b-20 p-l-15 p-r-15 " v-show="hideModel">
      <div class="overlay-modal11 " @click='CancelArticle'></div>
        <div class="container" v-show='commande' >
                        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                            <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()" >
                                <img src="images/icons/icon-close.png" alt="CLOSE">
                            </button>
                            <div class="p-b-30 p-l-40">
                              <h4 class="ltext-102  cl2">
                                     Fait Un Ajout   

                              </h4>
                              <div  class=" m-r-50 m-t--30"  style="float: right;" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"   style="  margin-left: 335px;">
        <i class="fas fa-ellipsis-v"  id="y"  style="color: black"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="divSignal">
                    <a    v-on:click="SignalerProduit(detaillproduit.id)"  class="dropdown-item" 
      style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;" >   Signaler Produit</a>
                    <a class="dropdown-item" v-on:click="SignalerVendeur(detaillproduit.vendeur_id)"
    style="color: #0074d9; font-style: italic; font-weight: 900; cursor: pointer;">
    Signaler Vendeur</a>
       </div>
      
    </div> 
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

                                                        <img v-for="img in getImageD" v-if="img.profile==1" :src="'storage/produits_image/'+img.image" alt="IMG-PRODUCT" id="pic"/style="width: 500px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-5 p-b-30">
                                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                            @{{this.detaillproduit.Libellé}}
                                        </h4>

                                        <span class="mtext-106 cl2">
                                            @{{this.detaillproduit.prix}}DA
                                        </span>

                                        <p class="stext-102 cl3 p-t-23">
                                            @{{this.detaillproduit.description}}.
                                        </p>
                                        <p class="stext-102 cl3 p-t-23 " >
                                            <span :data-toggle="!!this.detaillproduit.Nom ? 'tooltip' : false" data-html="true" :title="this.detaillproduit.Nom " >
                                           Vendeur&nbsp:<b>&nbsp&nbsp@{{this.detaillproduit.Nom}} &nbsp@{{this.detaillproduit.Prenom}}</b>.</span>
                                            
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
                                                            <option v-for="taille in taillesss" v-if="taille.produit_id  === detaillproduit.id" :value="taille.nom">@{{taille.nom}}</option>
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
                                                            <option v-for="color in colors" :value="color.color_id" v-if="color.produit_id === detaillproduit.id">@{{color.nom}}</option>
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
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(-1)">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="0" placeholder="0" id="qtee">

                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" @click="callfunctionQte(1)">
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
                            <div class="col-md-5">
                              <div class="title" style="color: red; margin-top: 30px;" >
                                  <h4><b>@{{empp.libellé }}</b></h4><br>
                              </div>
                            </div>
                          </div>
                          <div class="row" style=" margin-top: -15px;">
                            <div class="col-md-11 ">
                               <p class="m-l-10 m-b-10" style="color: black;">@{{ empp.discription }}</p>
                               <p style="color: black;"><b>Le nombre de condidat est :</b> @{{empp.nombre_condidat}}</p>
                               <div class="">
                                    <p  style="color: black;">
                                    <b>Pour contacté l'employeur @{{ empp.nom }} @{{empp.prenom}} : &nbsp</b> </p>
                                  <div class="m-t--8" style="text-align:center">  
                                    <p style="color: black;">
                                        Numero: @{{empp.num_tel}} / Email: @{{empp.email}}
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

                                        <div  class="form-group flex-w p-b-10" >
                                            <div class="size-205 cl2 m-r-2" style="font-size: 12px; margin-top: 10px;">
                                                CV
                                            </div>
                                            <div class="size-219 m-b-5" >
                                                <div class="bg0 " >
                                                    <input class="form-control" id="cv" type="file" :class="{'is-invalid' : message.cv}" v-on:change="cvPreview" accept=
                                                    "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                                    text/plain, application/pdf, image/jpeg,image/png" style="margin-top: 0px; height: 38px; width: 248px; font-weight: 500; left: 24px;">
                                                    <span class="px-3 cl13" v-if="message.cv" v-text="message.cv[0]"></span>
                                                </div>
                                            </div>
                                            <span style="margin-top: 40px;">Si votre fichier de CV est volumineux, ça peut prendre au plus quelques secondes pour le téléchargé.<br> MERCI DE PATIENCE</span>
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
                                        
                                        <div class=""  style="margin-top:-149%;" >
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
                  
  </div>
</div>
         
     
@endsection
@push('javascripts')



  

<script> 
        window.Laravel = {!! json_encode([

               'csrfToken'      => csrf_token(),
               'produit'        => $produit,
               'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'annonce'         => $annonce,
               'client'         => $client,
               'color' => $color,
               'typeLivraison' => $typeLivraison,
               'taille' => $taille , 
               'command' => $command ,
               'url'           => url('/'), 
          ]) !!};
</script>


<script>
  function selectTaille(taille){
    app.ajoutPanier.taille = taille;
                
  }
  function selectColor(color){
    app.ajoutPanier.couleur_id = color;            
  }
  function selectLivraisen(livraisen){
    app.ajoutPanier.type_livraison = livraisen;            
  }
  function seletQte(qte){
    app.ajoutPanier.qte = qte; 
  }
  function changePic(img){
        document.getElementById("pic").src = 'http://localhost:8000/storage/produits_image/'+img;
  }
  function initialiser(){
        
        document.getElementById("tttt").options.selectedIndex = 0;
        document.getElementById("cccc").options.selectedIndex = 0;
        document.getElementById("qtee").value = 0;
        document.getElementById("TLTLTL").options.selectedIndex = 0;    
  }
  function initialiseCV(){
        document.getElementById('cv').value = null;
  }
  function changeQte(val){
        var x= parseInt(document.getElementById('qtee').value,10);
        if(val == 1){
            app.ajoutPanier.qte = x+1;
        }   
        else if(val == -1 && x > 1){
            app.ajoutPanier.qte = x-1;
        }               
    }
     var app = new Vue({
        el: '#app',
        data:{
          favo: [],
          suppr: true,
          imagesproduit: [],
          produitss: [],
          p:[],
          ProduitsPanier: [],
          AnnonceTableau: [],
          detaillproduit: [],
          getImageD: [],
          hideModel: false,
          commande: false,
          demande: false,
          tailless: [],
          tailleExiste: false,
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
          message: {},
          sendDemande: {
            nom_Prenom: '',
            tlf: '',
            email: '',
            cv: null,
            annonceE_id: 0,
          },
          clientt: [],
          colors: [],
          typeLivraisons: [],
          taillesss: [],
          emplois2: [],
          detailsEMP: {
            idEMP:0,
          },


        },
        methods:{
          callfunctionQte(val){
                changeQte(val);
          },
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
                              footer: '<form method="GET" action="{{ route("logoutregister") }}">@csrf<a href="{{ route("logoutregister") }}">Créer Compte</a></form>',
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
                              footer: '<form method="GET" action="{{ route("logoutregister") }}">@csrf<a href="{{ route("logoutregister") }}">Créer Compte</a></form>',
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
                
                 axios.post(window.Laravel.url+'/detailsemp',this.detailsEMP)

                .then(response => {
                     this.emplois2 = response.data;
                })
                .catch(error =>{
                     console.log('errors :' , error);
                })
          },
          AfficheInfo: function($id){
            console.log("id",$id);
                this.hideModel = true;
                this.demande=true;
                this.commande=false; 
                this.detailsEMP.idEMP= $id;
                this.detaillsAnnonceemp();
          },
          addPanier: function(){
                console.log("app11.ajoutPanier",this.ajoutPanier)
                axios.post(window.Laravel.url+'/addpanier',this.ajoutPanier)
                  .then(response => {
                    if(response.data.etat && !response.data.produitExister){
                        app1.favorirs.unshift(response.data.cmd);
                        app1.imagesproduitr.unshift(response.data.image);
                        app1.ProduitsPanierr.unshift(response.data.commande);
                        app1.prix[0].prixTo += response.data.prixTotale;
                        
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
                          footer: '<form method="GET" action="{{ route("logoutregister") }}">@csrf<a href="{{ route("logoutregister") }}">Créer Compte</a></form>',
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
                              footer: '<form method="GET" action="{{ route("logoutregister") }}">@csrf<a href="{{ route("logoutregister") }}">Créer Compte</a></form>',
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
          changePicVue(img){
                changePic(img);
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
          detaillProduit:function(produit){
              console.log(produit)
                axios.get(window.Laravel.url+'/getimageD/'+produit.id)
                .then(response => {
                      this.getImageD = response.data.imagee;                       
                })
                .catch(error =>{
                        console.log('errors :' , error);
                })
                this.hideModel = true;
                this.commande = true;
                this.demande = false; 
                var i = 0;
                 
                this.ajoutPanier.vendeur_id = produit.vendeur_id;
                this.ajoutPanier.prix = produit.prix;
                this.detaillproduit = produit;
                this.detaillproduit.Nom = this.detaillproduit.Nom.toUpperCase();
                this.detaillproduit.Prenom = this.detaillproduit.Prenom.toUpperCase();
                this.ajoutPanier.produit_id = this.detaillproduit.id;
                this.tailless.forEach(key => {
                    if(this.detaillproduit.id == key.produit_id ){
                            i++;
                            console.log('produit');
                    }
                });
                if(i != 0){
                    this.tailleExiste = true;
                    this.ajoutPanier.tailExst = 1;
                }
                else{
                    this.tailleExiste = false;
                    this.ajoutPanier.tailExst = 0;
                }
          },
          AjoutAuFavoris: function(produit,type){
            if(type == 'produit'){
              axios.post(window.Laravel.url+'/ajoutaufavoris/'+produit.id)
              .then(response => {
                        if(response.data.etat == "remove"){
                          Swal.fire(produit.Libellé, "a été retiré au liste de favoris.", "success");
                          
                          var position = this.produitss.indexOf(produit);
                          this.produitss.splice(position,1);
                          
                        }
              })
              .catch(error => {
                        console.log('errors : '  , error);
              })
            }
            else{
              axios.post(window.Laravel.url+'/ajoutaufavorisE/'+produit.id)
              .then(response => {
                        if(response.data.etat == "remove"){
                          Swal.fire(produit.libellé, "a été retiré au liste de favoris.", "success");
                          var position = this.AnnonceTableau.indexOf(produit);
                          this.AnnonceTableau.splice(position,1);

                        }
              })
              .catch(error => {
                        console.log('errors : '  , error);
              })
            }
            
                
          },
          MoitieDescription:  function (text, length, suffix){
              if(text.length <= length){
                return text;

              }
             
              return text.substring(0, length) + suffix;

          }, 
          getProduit: function(){
            axios.get(window.Laravel.url+'/favorisClient')
              .then(response => {
                this.favo = window.Laravel.produit.data;
                this.imagesproduit = window.Laravel.ImageP;
                this.produitss = window.Laravel.Fav;
                this.AnnonceTableau = window.Laravel.annonce;
                this.clientt = window.Laravel.client;
                this.sendDemande= {
                        nom_Prenom: this.clientt.nom.concat(' ').concat(this.clientt.prenom),
                        tlf: this.clientt.numeroTelephone,
                        email: this.clientt.email,
                };
                this.colors = window.Laravel.color;
                this.typeLivraisons = window.Laravel.typeLivraison;
                this.taillesss = window.Laravel.taille;
                console.log("annoce",this.AnnonceTableau);
                console.log("favoris ",this.favo);
                console.log("produit",this.produitss);
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          

        },
        created:function(){
            this.getProduit();

        }
     })
</script>
<script>
     var app1 = new Vue({
        el: '#app1',
        data:{
          message:'hello',
          ProduitsPanierr: [],
          favorirs: [],
          imagesproduitr: [],
          prix: [],
        },
        methods:{
          deleteProduitPanier: function(produit){
                      axios.delete(window.Laravel.url+'/deleteproduitpanier/'+produit.produit_id+'/'+produit.qte+'/'+produit.taille+'/'+produit.type_livraison+'/'+produit.couleur_id)
                        .then(response => {
                          if(response.data.etat){
                                   var position = this.ProduitsPanierr.indexOf(produit);
                                   this.ProduitsPanierr.splice(position,1);
                                   if(this.ProduitsPanierr.lenght == 0){
                                        this.prix[0].prixTo = 0;
                                   }
                                   else{
                                        this.prix[0].prixTo -= produit.prix_produit*produit.qte;
                                   }

                          }                     
                        })
                        .catch(error =>{
                                   console.log('errors :' , error);
                        })

                  
            },
          get_favoris_client: function(){
            axios.get(window.Laravel.url+'/getproduithome')
              .then(response => {
                this.favorirs = response.data.Fav;
                this.imagesproduitr = response.data.ImageP;
                this.ProduitsPanierr = response.data.command;
                this.prix = response.data.prixTotale;
                console.log("this.ProduitsPanierr",this.ProduitsPanierr)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          }
          

        },
        created:function(){
            this.get_favoris_client();

        }
     })
</script>
@endpush