

<?php $__env->startSection('content'); ?>

    <head>
        <title><?php echo e(( 'Produits')); ?></title>
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
            <a class="navbar-brand" href="#pablo">Produits </a>
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
                <h4 class="card-title " style="margin-top: -5px; ">Mes produits</h4>
               
                    <div class="txt-right"style="margin-top: -50px; " >
                            <button  v-if="suppr" class="btn-sm btn-info js-show-modal1 m-r-30" style="height: 35px;" v-on:click="AfficherAjout()" ><b>Ajouter Produit</b>
                            </button>
                            <button  v-else class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                            </button>
                            <button v-else v-on:click="AnnulerSel()"  class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                            </button>
                    </div>
              </div> 
            <div class="row isotope-grid" style =" margin-left:22px; margin-right:22px;" >
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
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit.prix}} DA
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
            <div >
                    <?php echo e($produit->links()); ?>

                </div>
        </div>
    </div>

                  
                </div>
              </div>
         
<!-- Modal1 -->
    <div class="wrap-modal11 js-modal1 p-t-80 p-b-20" id='app2' v-if="hideModel">
        <div class="overlay-modal11" v-on:click="CancelArticle()"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent" v-if="openInfo ">
                <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()">
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Lightweight Jacket
                            </h4>

                            <span class="mtext-106 cl2">
                                $58.79
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
                            </p>
                            
                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                            
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Type Livraison
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option value="1">DHL / 36.00 DA</option>
                                                <option value="2">Vendeure / 142.50 DA</option>
                                                <option value="3">Client / 142.50 DA</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-101 bg10 bor1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>  
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout"style=" width: 990px; padding-top: 45%">
                  <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelArticle()">
                    <img src="images/icon-close.png" alt="CLOSE">
                  </button>
                  <section class=" creat-article " >     
                      <div  class=" container-creat-article">
                        <div class="row">
                          <div class="col-md-10 pr-2" >
                            <div class="form-group mb-3">
                              <label>Nom de Poduit</label>
                              <input  type="text" class="form-control" placeholder="Le nom doit commencer par un Maj ou Numero" v-model="produitAjout.Libellé" :class="{'is-invalid' : message.Libellé}"/>
                              <span class="px-3 cl13" v-if="message.Libellé" v-text="message.Libellé[0]">
                              </span>
                              
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-10 pr-2" >
                            <div class="form-group ">
                              <label>Description de Produit</label>
                              <textarea class="form-control" placeholder="La description doit commencer par un Maj ou Numero" v-model="produitAjout.description" :class="{'is-invalid' : message.description}"></textarea>
                               <span class="px-3 cl13" v-if="message.description" v-text="message.description[0]">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="row col-md-12 pr-2 flex-t" >
                        
                            <div class="form-group m-r-35">
                              <label for='img'>Image<span style="font-size: 12px">(Entrer l'image de profil pour votre produit*)</span></label>
                              <input type="file" class="form-control" accept="image/png, image/jpeg" style="height: 40px;"  v-on:change="imagePreview" :class="{'is-invalid' : message.image}"  id='img'/>
                              <span class="px-3 cl13" v-if="message.image" v-text="message.image[0]">
                              </span>
                            </div>
                            <div class="form-group">
                              <label for="imgs">Images<span style="font-size: 12px">(Entrer les autres images s'il existe*)</span></label>
                              <input type="file" class="form-control" accept="image/png, image/jpeg" style="height: 40px" id='imgs' name="img[]" v-on:change="imagesPreviews" multiple>
                              
                            </div>
                         
                        </div>
                        <div class="row">
                          <div class="col-md-10 pr-2" >
                            <div class="form-group">
                              <label>Prix</label>
                              <input type="number" name="prix" class="form-control" placeholder="0.00/DA*" v-model="produitAjout.prix" :class="{'is-invalid' : message.prix}" />
                              <span class="px-3 cl13" v-if="message.prix" v-text="message.prix[0]">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="row col-md-12 pr-2 flex-t m-b-20">
                         
                            <div class="form-group m-r-45" style="width: 320px">
                              <label>Quantité de Produit</label>
                              <input type="number" name="Qte_P" class="form-control" placeholder="0.00/Piece*" v-model="produitAjout.Qte_P" :class="{'is-invalid' : message.Qte_P}"/>
                              <span class="px-3 cl13" v-if="message.Qte_P" v-text="message.Qte_P[0]"></span>
                            </div>
                            <div class="form-group  " style="width: 320px">
                              <label>Poid de Produit</label>
                              <input type="number" name="poid" class="form-control" placeholder="0.00Kg/g*" v-model="produitAjout.poid" :class="{'is-invalid' : message.poid}" />
                              <span class="px-3 cl13" v-if="message.poid" v-text="message.poid[0]"></span>
                            </div>
                         
                        </div>
                        <div class="row col-md-12 pr-2 flex-t m-b-30">
                            <select class="form-control form-control-lg m-r-45" id="categoSelect" name="catego" style="height: 40px; width: 320px ;border-radius: 1em;" v-on:change="activeSousCatego($event)" :class="{'is-invalid' : message.catego}">
                              <option value="" hidden="hidden" selected>&nbsp&nbspSélectionner une Ctegorie</option> 
                              <option v-for="catego in categories" :value="catego.id" >&nbsp&nbsp{{catego.libelle}}</option> 
                            </select>
                            <span class="px-3 cl13" v-if="message.catego" v-text="message.catego[0]"></span>

                            <select class="form-control form-control-lg " id="sousCtagoSelect" name="sous_categorie_id" style="height: 40px;width: 320px;border-radius: 1em; " disabled= "true" v-on:change="getIdSousCatego($event)" :class="{'is-invalid' : message.sous_categorie_id}">
                              <option value="" hidden="hidden" selected>&nbsp&nbspSélectionner une Sous Categorie</option> 
                              <option v-for="Scatego in sousCategories" :value="Scatego.id" >&nbsp&nbsp{{Scatego.libelle}}</option> 
                            </select>
                            <span class="px-3 cl13" v-if="message.sous_categorie_id" v-text="message.sous_categorie_id[0]"></span>
                        </div>
                        <div class="row m-b-30">
                            <div class="col-md-10 pr-2" >
                                <label>Sélectionner une/plusieurs Couleur(s) pour votre produit</label>
                                <select class="form-control form-control-lg" id="colorSelect" name ="clr[]" v-model="colorsP" style="border-radius: 1em;" multiple :class="{'is-invalid' : message.colors}"> 
                                  <option v-for="color in colors" :value="color.id" >&nbsp&nbsp{{color.nom}}</option> 
                                </select>
                                <span class="px-3 cl13" v-if="message.colors" v-text="message.colors[0]"></span>
                            </div>
                        </div>
                        <div class="row m-b-30">
                            <div class="col-md-10 pr-2 "> 
                                <label>Sélectionner le type de Taille produit</label>
                                <select class="form-control form-control-lg m-b-25" id="typetpSelect" name="typetp" v-model="Type" style="height: 40px; width: 320px ;border-radius: 1em;" @change="activeTaille()">
                                  <option value="0" >&nbsp&nbspAucune</option> 
                                  <option value="1">&nbsp&nbspTaille pour les vêtements</option>
                                  <option value="2">&nbsp&nbspPointure pour les chaussures</option>
                                </select>
                                
                                <div v-if="typeTaille">
                                    <label>Sélectionner Taille(s) disponible pour votre produit</label>
                                    <select class="form-control form-control-lg" id="tailleSelect" name ="tal[]" v-model="tailleP" style="border-radius: 1em;" multiple :class="{'is-invalid' : message.tailles}">
                                        <option value="S">&nbsp&nbspTaille S</option>
                                        <option value="M">&nbsp&nbspTaille M</option>
                                        <option value="L">&nbsp&nbspTaille L</option>
                                        <option value="XL">&nbsp&nbspTaille XL</option>
                                        <option value="XXL">&nbsp&nbspTaille XXL</option>
                                        <option value="XXXL">&nbsp&nbspTaille XXXL</option> 
                                    </select>
                                    <span class="px-3 cl13" v-if="message.tailles" v-text="message.tailles[0]"></span>
                                </div>
                                <div v-if="typePointure">
                                    <label>Sélectionner Pointure(s) disponible pour votre produit</label>
                                    <select class="form-control form-control-lg" id="PointureSelect" name ="pntr[]" v-model="PointureP" style="border-radius: 1em;" multiple :class="{'is-invalid' : message.pointures}">
                                        <?php for($i = 19; $i <= 50; $i++): ?>
                                            <option value="<?php echo e($i); ?>">&nbsp&nbspPointure <?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span class="px-3 cl13" v-if="message.pointures" v-text="message.pointures[0]"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-10 flex-t">
                                 <button type="submit" v-if="modifier" class="btn btn-success btn-block m-r-5" style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="" >Modifier
                                </button> 
                                <!--button type="submit" v-else class="btn btn-success btn-block m-r-5" style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addProduit()" >Ajouter
                                </button-->
                                <button type="submit" v-else class="js-show-modal1 btn btn-success btn-block m-r-5" style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="AfficherAjout2()">Suivant
                                </button> 
                                <button type="submit"  class="btn btn-danger btn-block " style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="CancelArticle()" >Annuler
                                </button> 
                          </div>
                        </div>
                      </div>
                  </section>
              
            </div>
            <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout2 "style=" width: 990px; padding-top: 45%">
                  <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelArticle()">
                    <img src="images/icon-close.png" alt="CLOSE">
                  </button>
                 <div class="tab " style="border: 1px" >
                    <div class="form-group m-b-35 m-l-50 " style="margin-left: 30px; margin-top: -20px;">
                        <input type="checkbox" value="" class="form-control" id="selectall" onclick="selectAll(this);" >
                        <label for="selectall" style="font-size: 20px;" >Selectionner Tout :</label>
                    </div>
                   <div class="form-group m-b-35 m-l-50 " v-for="v in villes" style="display: inline-flex;">
                                    <div  >
                                        <input type="checkbox" class=" form-control  <?php $__errorArgs = ['villeC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="v.id" :id="v.id" name="villeC[]" >
                                        <label class="p-l-25 p-t-4" :for="v.id" >{{v.nom}}</label>
                                        <?php $__errorArgs = ['villeC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                    </div>
                    <div class="form-group input-group m-b-60">
                                  <input type="text" class="form-control <?php $__errorArgs = ['prix_tarif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Text input with dropdown button" placeholder="Entrez le prix de livraison pour la(les) ville(s) selectionner" name="prix_tarif" style="height: 45px" value="<?php echo e(old('prix_tarif')); ?>">
                                  <div class="input-group-append">
                                    <select class="form-control form-control-lg <?php $__errorArgs = ['poids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleFormControlSelect1"  name="poids" style="height: 45px">
                                            <option value="1" selected <?php echo e(old('poids') == 1 ? 'selected' : ''); ?>>/Kg</option>
                                            <option value="2" <?php echo e(old('poids') == 2 ? 'selected' : ''); ?>>/g</option>
                                    </select>
                                  </div>
                                  <?php $__errorArgs = ['prix_tarif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascripts'); ?>



  

<script> 
        window.Laravel = <?php echo json_encode([

               'csrfToken'      => csrf_token(),
               'produit'        => $produit,
               'ImageP'         => $ImageP,
                'url'           => url('/'), 
          ]); ?>;
</script>
<script>

        Vue.mixin({

            methods:{
              addProduit: function(){
                app2.produitAjout.image = app2.image;
                app2.produitAjout.images = app2.imagesP;
                app2.produitAjout.colors = app2.colorsP;
                app2.produitAjout.tailles = app2.tailleP;
                app2.produitAjout.pointures = app2.PointureP;
                app2.produitAjout.typet = app2.Type;
                /*console.log("app2.produitAjout.tailles",app2.produitAjout.tailles);
                console.log("app2.produitAjout.pointures",app2.produitAjout);*/
                axios.post(window.Laravel.url+"/addproduit",app2.produitAjout)
                .then(response => {
                  if(response.data.etat){
                     window.location.reload();
                     app2.produitAjout = response.data.produitAjout;
                     app2.imageP = response.data.imageProduitAjout;
                     app2.produitAjout.id = response.data.produitAjout.id;
                     app.ProduitsVendeur.unshift(app2.produitAjout);
                     app.imagesproduit.unshift(app2.imageP);
                     app2.produitAjout={
                            id: 0,
                            sous_categorie_id: '',
                            catego: '',
                            Libellé: '',
                            prix: '',
                            description: '',
                            Qte_P: '',
                            poid: '',
                            image: '',
                            images: [],
                            colors: [],
                            tailles: [],
                            pointures: [],
                            typet: 0,
                     };
                     app2.imageP= {
                        produit_id: 0,
                        image: ''
                     };
                     app2.imagesP= [];
                     app2.colorsP= [];
                     app2.tailleP= [];
                     app2.PointureP= [];
                     app2.hideModel=false;
                     app2.openAjout = false;
                     app2.message = {};
                     app2.image = '';
                     app2.Type = '';
                  }          
                })
                .catch(error =>{
                    app2.message = error.response.data.errors;
                    console.log('errors :' , app2.message);
                })
          },         
        }                     
      });

     var app2 = new Vue({
        el: '#app2',
        data:{
          hideModel: false,
          openAjout: false,
          openAjout2: false,
          openInfo: false,
          modifier: false,
          produitAjout: {
            id: 0,
            sous_categorie_id: '',
            catego: '',
            Libellé: '',
            prix: '',
            description: '',
            Qte_P: '',
            poid: '',
            image: '',
            images: [],
            colors: [],
            tailles: [],
            pointures: [],
            typet: 0,
          },
          villes: [],
          image: '',
          message: {},
          sousCategories: [],
          categories: [],
          colors: [],
          imageP: {
            produit_id: 0,
            image: ''
          },
          imagesP: [],
          colorsP: [],
          tailleP: [],
          PointureP: [],
          typeTaille: false ,
          typePointure: false,
          Type: 0,

          
        },
        methods:{
          
            CancelArticle(){
                this.openAjout = false ;
                this.hideModel = false;
                this.produitAjout = { 
                            id: 0,
                            vendeur_id: this.vendeurID,
                            sous_categorie_id: 0,
                            Libellé: '',
                            prix: 0,
                            description: '',
                            Qte_P: 0,
                            poid: 0,
                            image: '',
                            images: [],
                            colors: [],
                            tailles: [],
                            pointures: [],
                };
                this.message = {};
                this.tailleP= [];
                this.PointureP= [];
                this.Type = '';
            },
            imagePreview(event) {
               var fileR = new FileReader();
               fileR.readAsDataURL(event.target.files[0]);
               fileR.onload = (event) => {                 
                  this.image = event.target.result;
               }              
            },
            getVille: function(){
                axios.get(window.Laravel.url+'/getville')
                 .then(response => {
                      this.villes = response.data;
                      console.log("this.villes",this.villes)
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
 
            },
            openAjoutt :function(){
              this.openAjout = true;
              
            },
            imagesPreviews(event) {
               
               for( i = 0 ; i < event.target.files.length ; i++){
                    var fileR = new FileReader();
                    fileR.readAsDataURL(event.target.files[i]);

                    fileR.onload = (event) => {                 
                          this.imagesP.push(event.target.result) ;
                    } 
               }
               
                            
            },
            getSousCategories: function(CategoId){
                  axios.get(window.Laravel.url+'/getAllsouscategories/'+CategoId)
                  .then(response => {
                    this.sousCategories = response.data;
                   })
                  .catch(error => {
                      console.log('errors : '  , error);
                  })
            },
            getCategories:function(){
                 axios.get(window.Laravel.url+'/getAllcategories')
                 .then(response => {
                      this.categories = response.data;
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
             
            },
            getColors: function(){
                axios.get(window.Laravel.url+'/getAllcolor')
                 .then(response => {
                    this.colors = response.data;
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
            },
            activeSousCatego: function(event){
                document.getElementById('sousCtagoSelect').disabled = false;
                this.produitAjout.catego = event.target.value;
                this.getSousCategories(event.target.value);

            },
            AfficherAjout2: function(){
             this.hideModel = true;
             this.openAjout2 = true;
             this.openAjout = false
             this.openInfo = false;
             this.produitAjout ={
                        id: 0,
                        vendeur_id: 0,
                        sous_categorie_id: 0,
                        Libellé: '',
                        prix: 0,
                        description: '',
                        Qte_P: 0,
                        poid: 0
             }
            },
            activeTaille: function(){
                if(this.Type == 1){
                    this.typeTaille = true;
                    this.typePointure = false;
                    this.PointureP = [];
                    
                }
                else if(this.Type == 2){
                    this.typePointure = true;
                    this.typeTaille = false;
                    this.tailleP = [];
                  
                }
                else if(this.Type == 0){
                    this.typePointure = false;
                    this.typeTaille = false;
                    this.PointureP = [];
                    this.tailleP = [];
                    
                   
                }

            },
            getIdSousCatego: function(event){
                this.produitAjout.sous_categorie_id = event.target.value;
            },
            getIdColor: function(event){
                
                console.log("this.produitAjout.colors",event);
            }
        },
        created: function(){
            this.getCategories();
            this.getColors();
            this.getVille();
        }
     })
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
          getProduit: function(){
            axios.get(window.Laravel.url+'/produitVendeur')
              .then(response => {
                this.ProduitsVendeur = window.Laravel.produit.data;
                this.imagesproduit = window.Laravel.ImageP;
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          AfficherAjout: function(){
             app2.hideModel = true;
             app2.openAjout = true;
             app2.openInfo = false;
             app2.openAjout2 = false;
              
          },

          ShowInfo: function(){
            app2.hideModel = true;
             app2.openAjout = false;
             app2.openInfo = true;
          }

        },
        created:function(){
            this.getProduit();

        }
     })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/produit_vendeur.blade.php ENDPATH**/ ?>