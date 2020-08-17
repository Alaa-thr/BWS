
<?php $__env->startSection('content'); ?>


  
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
                            <a class="header-cart-item-name m-b-18 hov-cl1 trans-04">
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

  <!-- Product -->
  <div class="bg0 m-t-50 p-b-140">
    <div class="container">
      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <div class=" respon6-next" style="width: 230px;">
            <div class="rs1-select2 bor8 bg0" >
              <select class="js-select2" onchange="changeAffichage(this.options[this.selectedIndex].value)" name='sousCategorie'>
                <option value="0" disabled selected>choisir</option>
                <option value="p"  >Produits</option>
                <option value="ae"  >Annonces d'Emplois</option>
                <option value="a">Articles</option>
              </select>
              <div class="dropDownSelect2"></div>
            </div>
          </div>
        </div>

      </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
      
      <div class="m-b-20" id="app1">
        <div class="m-b-40" v-show='showProduit'>
          <h2>Produits</h2>
        </div>
      

      <div class="row isotope-grid"  v-show='showProduit' >
        
      <?php if(count($produit) != 0): ?>
        <?php $__currentLoopData = $produit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prdt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <div class=" col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
        

          <div class="block2" >
            <div class="block2-pic hov-img0" v-for="imgP in imagesproduit" >
              
              <img v-if="imgP.produit_id == <?php echo $prdt->id ?> && imgP.profile === 1"  :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 334px;width: 300px;">

              <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="detaillProduit(<?php echo e(json_encode($prdt)); ?>)">
                                Quick View
                            </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
        
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php else: ?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item m-t-25 m-l-28" >        
          <div >
            <span style="text-align: center;">Cette Recherche n'a pas de Résultats</span>
          </div>
        </div>
        
      <?php endif; ?>
      </div>
         <!-- Modal1 -->
      <div class="wrap-modal1 js-modal1 p-t-60 p-b-20" >
              <div class="overlay-modal1" v-on:click="CancelArticle()" ></div>

              <div class="container" v-show='hideInfo'>
                  <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                      <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()" >
                          <img src="images/icons/icon-close.png" alt="CLOSE">
                      </button>
                      <div class="col-md-12">
                               <div class="dropdown" style="float: right;" >
                                      <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"  >
                                        <img src="<?php echo e(asset('assetsAdmin/img/menu.png')); ?>" /> 
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right " >
                                        <a  v-on:click="SignalerProduit(detaillproduit.id)"  class="dropdown-item js-show-modal1 m-b-10" style="color: red; font-style: italic; font-weight: 600; cursor: pointer;">   Signaler Produit</a>
                                        <a class="dropdown-item" v-on:click="SignalerVendeur(detaillproduit.vendeur_id)"style="color: red; font-style: italic; font-weight: 600; cursor: pointer;">Signaler Vendeur</a>
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

                                                        <img v-for="img in getImageD" v-if="img.profile==1" :src="'storage/produits_image/'+img.image" alt="IMG-PRODUCT" id="pic" style="height: 600px"/>
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
                                  <p class="stext-102 cl3 p-t-2 " >
                                            <span >
                                           Boutique&nbsp:<b>&nbsp&nbsp{{this.detaillproduit.Nom_boutique}}</b></span>
                                            
                                        </p>
                                        <p class="stext-102 cl3 p-t-2" >
                                            <span >
                                           Vendeur&nbsp:<b>&nbsp&nbsp{{this.detaillproduit.Addresse}}</b></span>
                                            
                                        </p>
                                  <!--  -->
                                  <div class="p-t-33">
                                      <div v-show="tailleExiste" class="flex-w flex-r-m p-b-10">
                                          <div class="size-203 flex-c-m respon6 p-b-10">
                                              Taille
                                          </div>

                                          <div class="size-204 respon6-next">
                                              <div class="rs1-select2 bor8 bg0" :class="{'is-invalid' : message.taille}">
                                                  <select class="js-select2 tttt" id="tttt" onchange="selectTaille(this.options[this.selectedIndex].value)">
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
                                                  <select class="js-select2 cccc" id="cccc" onchange="selectColor(this.options[this.selectedIndex].value)">
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
                                                  <select  class="js-select2 TLTLTL" id="TLTLTL" onchange="selectLivraisen(this.options[this.selectedIndex].value)">
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

      <div class="container" v-show="hideDemande">
        <div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent" >
          <button class="how-pos3 hov3 trans-04 " @click='CancelArticle'>
            <img src="images/icons/icon-close.png" alt="CLOSE">
          </button>
         <div class="p-b-30 p-l-40 flex-t col-md-12">
                    <h4 class="ltext-102  cl2 col-md-4">
                           Fait Une Demande   
                    </h4>
                    <div class="dropdown col-md-8">
                        <div class="dropdown " style="float: right;" >
                            <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"  >
                            <img src="assetsAdmin/img/menu.png" /> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " >
                            <a v-on:click="SignalerAnnonce(1)" class="dropdown-item js-show-modal1 m-b-10" style="color: red; font-style: italic; font-weight: 600; cursor: pointer;"> Signaler Annonce</a>
                            <a class="dropdown-item" v-on:click="SignalerEmployeur(1)" style="color: red; font-style: italic; font-weight: 600; cursor: pointer;">Signaler Employeur</a>
                            </div>
                        </div>
                    </div> 
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
                       <p style="color: black;"><b>Nom Societé/Boutique :</b> {{empp.nom_societe}}</p>
                               <p style="color: black;"><b>Adresse Societé/Boutique :</b> {{empp.address}}</p>
                               <div >
                                    <p  style="color: black;">
                                    <b>Pour contacté l'employeur {{ empp.nom }} {{empp.prenom}} : &nbsp</b> </p>
                                  <div class="m-t-2 m-l-5">  
                                    <p style="color: black;">
                                        Tlf: {{empp.num_tel}}/Email: {{empp.email}} 
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
      <div class="bg0 m-t-23  " id="app" v-show='showAnnonce'>
        <div class=" m-t-20 p-b-45" v-show='showAnnonce'>
          <h2>Annonces d'Emplois</h2>
        </div>
        <div  >

          <?php if(count($emploi) != 0): ?>
              <?php $__currentLoopData = $emploi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                  <div class="row m-b-10"   style="display: inline-flex;  width:417px; height: 160px;">
                      
                    <div style="display: inline-flex;  width: 420px; height: 160px;">
                    <?php if($emp->image != null): ?>
                <div  class="col-md-4 block2 block2-pic hov-img0">
                  <img  src="storage/annonces_image/<?php echo $emp->image ?>"  style="height: 120px; width:120px;">
                  <a class="js-show-modal1 block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " v-on:click="AfficheInfoDemande(<?php echo e(json_encode($emp->id)); ?>)" style="cursor: pointer;">
                    Quick View
                  </a>
                </div>

                <div class="col-md-6 js-show-modal1"  v-on:click="AfficheInfoDemande(<?php echo e(json_encode($emp->id)); ?>)" style="cursor: pointer;">
                  <h5 class="title" style="color: red;">
                    <b><?php echo e($emp->libellé); ?></b>
                  </h5><br>
                  <div class="description" style="margin-top: -10px; font-size: 14px;">
                    {{ MoitieDescription('<?php echo $emp->discription?>' ,45, '...') }}
                  </div>
                  <div class="description" style="margin-top: 10px;">
                    <b>Nombre de condidat : <?php echo e($emp->nombre_condidat); ?></b>
                  </div>
                </div>
                <?php else: ?>
                <p style="height: 60px"></p>
                <div class="col-md-9 m-l-30 js-show-modal1" v-on:click="AfficheInfoDemande(<?php echo e(json_encode($emp->id)); ?>)" style="cursor: pointer;">
                  <h5 class="title" style="color: red;" >
                    <b><?php echo e($emp->libellé); ?></b>
                  </h5><br>
                  <div class="description" style=" font-size: 14px;">
                    {{ MoitieDescription('<?php echo $emp->discription?>' ,100, '...') }}
                  </div>
                  <div class="description" style="">
                    <b>Nombre de condidat : <?php echo e($emp->nombre_condidat); ?></b>
                  </div>
                </div>
                <?php endif; ?>
                <?php $k=0; ?>
                <?php for($i=0 ; $i< count($fav) ; $i++): ?>
                    <?php if($fav[$i]->annonce_emploi_id  == $emp->id): ?>
                        
                      <?php
                        $k=$k+1;
                        $i=count($fav);
                        
                      ?>
                    <?php endif; ?>

                <?php endfor; ?> 
                <?php if($k == 1): ?>
                  <div class="m-t-100" style="float: right;">
                    
                    <a  class="" v-on:click="AjoutAuFavorisE(<?php echo e(json_encode($emp)); ?>)" style="cursor: pointer; " >
                      <i  class="zmdi zmdi-favorite zmdi-hc-lg" style="color: #e60000; " id="<?php echo $emp->id ?>"></i>
                    </a>
                  </div>
                <?php else: ?>
                  <div class="m-t-100" style="float:right ;">
                      
                      <a  class="" v-on:click="AjoutAuFavorisE(<?php echo e(json_encode($emp)); ?>)" style="cursor: pointer; "  >
                        <i  class="cl222 zmdi zmdi-favorite-outline zmdi-hc-lg favoo " id="<?php echo $emp->id ?>"></i>
                        
                      </a>
                  </div>
                <?php endif; ?>
                  <div style="border-left: 2px solid #000; display: inline-block;height: 120px; margin: 0 20px; margin-left:30px;">
                              </div>
                </div>
              
                
                
                  
             </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php else: ?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item " >        
          <div >
            <span>Cette Recherche n'a pas de Résultats</span>
          </div>
        </div>
        
      <?php endif; ?>

        </div>
  </div>
  
  <div class="bg0 m-t-23 " id="app2" v-show='showArticle'>
    <div class=" m-t-20 p-b-45" v-show='showArticle'>
      <h2>Articles</h2>
    </div>
        <div >
          <?php if(count($article) != 0): ?>
                <div class="col-sm-6 col-md-4 p-b-40" v-for="artcls in articles" style="display: inline-flex;">
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
                               {{ MoitieDescriptionn(artcls.description,100, ' . . .') }}
                            </p>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                  <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item " >        
                  <div >
                    <span>Cette Recherche n'a pas de Résultats</span>
                  </div>
                </div>
                <?php endif; ?>
            </div> 
          </div>

  </div>
</div>

  

  
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascripts'); ?>
<script>
  function changeAffichage(event){
    app2.changeAffichageSelect(event);
  }
  function initialiseCV(){
    if(document.getElementById('cv') != null){
      document.getElementById('cv').value = null;
    }
  }
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
    
    document.getElementById("qtee").value = 0;
    $('.TLTLTL').val('0').trigger('change');
    $('.cccc').val('0').trigger('change');
    $('.tttt').val('0').trigger('change');

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
               'prixTotale'   => $prixTotale,
               'client'   => $client,
               'article'   => $article,
               "url"      => url("/")  
    ]); ?>;
</script>
<script>
   var app2 = new Vue({
        el: '#app2',
        data:{
          articles:[],
          showArticle: true,
        },
        methods:{
          changeAffichageSelect(value){
            if(value == 'p'){
              this.showArticle = false;
              app.showAnnonce = false;
              app1.showProduit = true;
            }else if(value == 'ae'){
              this.showArticle = false;
              app.showAnnonce = true;
              app1.showProduit = false;
            }else{
              this.showArticle = true;
              app.showAnnonce = false;
              app1.showProduit = false;
            }
        
          },
          getArticle: function(){
           this.articles = window.Laravel.article;
          },
          MoitieDescriptionn:  function (text, length, suffix){
            if(text.length <= length){
              return text;

            }
           
            return text.substring(0, length) + suffix;
          },
        },
        created:function(){
          this.getArticle();

      }
  });




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
        hideInfo: false,
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
        hideDemande: false,
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
        emplois2: [],
        detailsEMP:{
          idEMP: 0,
         },
         sendDemande: {
            nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
            tlf: window.Laravel.client.numeroTelephone,
            email: window.Laravel.client.email,
            cv: null,
            annonceE_id: 0,
        },
        showProduit: true,
        

        
      },
      methods:{

        addDemande: function(id_Annonce){
            this.sendDemande.annonceE_id = id_Annonce;
            axios.get(window.Laravel.url+'/iscnnected')

                .then(responsee => {
                  if(!responsee.data.etatee && responsee.data.type == 0){
                    this.sendDemande= {
                    nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
                      tlf: window.Laravel.client.numeroTelephone,
                      email: window.Laravel.client.email,
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
                    nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
                      tlf: window.Laravel.client.numeroTelephone,
                      email: window.Laravel.client.email,
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
                          nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
                            tlf: window.Laravel.client.numeroTelephone,
                            email: window.Laravel.client.email,
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
                          nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
                            tlf: window.Laravel.client.numeroTelephone,
                            email: window.Laravel.client.email,
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
          this.sendDemande= {
            nom_Prenom: window.Laravel.client.nom.concat(' ').concat(window.Laravel.client.prenom),
            tlf: window.Laravel.client.numeroTelephone,
            email: window.Laravel.client.email,
            cv: null,
            annonceE_id: 0,
          };
        initialiseCV();
        this.message= {};
        initialiser();
        
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
                  this.hideInfo = true;
                  this.hideDemande = false;
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
var app = new Vue({
      el: '#app',
      data:{
        emplois: [],
        showAnnonce: true,
        

      },
      methods:{
        MoitieDescription:  function (text, length, suffix){
            if(text.length <= length){
              return text;

            }
           
            return text.substring(0, length) + suffix;
          },
    AjoutAuFavorisE: function(produit){
        axios.post(window.Laravel.url+'/ajoutaufavorisE/'+produit.id)
                .then(response => {
                    if(response.data.etat == "add"){
              swal(produit.libellé, "a été ajouté au liste de favoris.", "success");
              adde(produit.id);
                    }
                    else{
                      swal(produit.libellé, "a été retiré au liste de favoris.", "success");
                      deletee(produit.id);
                    }
          
                     
                
                 })
                .catch(error => {
                    console.log('errors : '  , error);
               })
            
        },

        AfficheInfoDemande: function($id){
        app1.hideInfo = false;
        app1.hideDemande = true;
        app1.detailsEMP.idEMP= $id;
        app1.detaillsAnnonceemp();
      },
       

        
      }
  });


</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_visiteur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/searchvisiteur.blade.php ENDPATH**/ ?>