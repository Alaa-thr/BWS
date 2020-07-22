

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
    <div class="content" id="app">
        <div class="row" >
          <div class="col-md-12">
            <div class="card">
            <?php if(session()->has('danger')): ?>
              <div class="row"> 
                <div class="alert alert-danger" style="  margin-left:33px;width: 960px;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;

                </button>
                 <?php echo e(session()->get('danger')); ?>

                </div>

              </div>
            <?php endif; ?>
            <?php if(session()->has('success')): ?>
              <div class="row"> 
                <div class="alert alert-danger" style="  margin-left:33px;width: 960px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                </button>
                 <?php echo e(session()->get('success')); ?>

                </div>
              </div>
            <?php endif; ?>
              <div class="card-header m-b-30">
                <input type="checkbox" id="produit" @change="selectAlll()" v-model="allSelectedd">
                <label for="produit" style="margin-left: 10px; margin-top: 10px;"></label>
                <h4 class="card-title " style="margin-top: -30px; margin-left: 50px;">Mes produits</h4>
               
                    <div class="txt-right"style="margin-top: -50px; " >
                            <button   class="btn-sm btn-light js-show-modal1 m-r-30" style="height: 35px;" v-on:click="showTarifL" ><b>Traif & Type Livraison</b>
                            <button  v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayProduit()"><b>Supprimer</b>
                            </button>
                             <button  v-else class="btn-sm btn-info js-show-modal1 m-r-30" style="height: 35px;" v-on:click="AfficherAjout()" ><b>Ajouter Produit</b>
                            </button>
                            <button v-if="suppr" v-on:click="AnnulerSel()"  class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                            </button>
                    </div>
              </div> 
            <div class="row isotope-grid" style =" margin-left:22px; margin-right:22px;" >
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" v-for="produit in ProduitsVendeur">
                    <!-- Block2 -->
                    <div v-if="selectalll">
                           <input type="checkbox" :id="produit.id" :value="produit.id" v-model="checkedproduits" @change="changeButton2(produit)">
                           <label :for="produit.id" style="margin-top: 120px; margin-left: -10px;"></label>
                   </div>
                   <div v-else>
                           <input type="checkbox" :id="produit.id" :value="produit.id" v-model="produitIds" @change="deselectProduit(produit.id)">
                           <label :for="produit.id" style="margin-top: 120px; margin-left: -10px;"></label>
                   </div>
                    <div class="block2" style="margin-top: -140px;margin-left: 20px; ">
                        <div class="block2-pic hov-img0" v-for="imgP in imagesproduit">
                            <img v-if="imgP.produit_id === produit.id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" alt="IMG-PRODUCT" style="height: 290px;width: 990px; border: 1;">

                            <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" v-on:click="dd(produit)">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l " >
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{produit.Libellé}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{produit.prix}} DA
                                </span>
                            </div>

                            <div class="js-show-modal1" v-on:click="updateProduit(produit)">
                                <img src="../images/icons/document.png" alt="..."/>
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
    <div class="wrap-modal11 js-modal1 p-t-80 p-b-20" id='app2' v-show="hideModel">
        <div class="overlay-modal11" v-on:click="CancelArticle()"></div>

        <div class="container" >
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent" v-show="openInfo">
                <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()">
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>

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

                                                        <img v-for="img in getImageD" v-if="img.profile==1" :src="'storage/produits_image/'+img.image" alt="IMG-PRODUCT" id="pic" style="width:500px;height: 380px;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-5 p-b-30">
                                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                                        <div v-for="t in detaillproduit">
                                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                            {{t.Libellé}}
                                        </h4>

                                        <span class="mtext-106 cl2 m-b-20">
                                           {{t.Qte_P}} x {{t.prix}}DA
                                        </span> <br>
                                        <span class="mtext-106 cl2 m-b-20">
                                           Sous-Categorie: {{t.libelle}} 
                                        </span> <br>
                                     

                                        <p class="stext-102 cl3 p-t-23">
                                            {{t.description}}.
                                        </p>
                                        </div>
                                        <!--  -->
            <div class="p-t-33">
                <div v-show="tailleExiste" class="flex-w flex-r-m p-b-10">
                    <div class="size-203 flex-c-m respon6 p-b-10">
                                                    Taille
                    </div>

                    <div class="size-204 respon6-next">
                        <div class="rs1-select2 bor8 bg0">
                            <select class="js-select2" >
                                <option value="0" disabled selected>Choisir la taille</option>
                                <option v-for="taille in tailless" :value="taille.nom">{{taille.nom}}</option>
                            </select>
                                                                                             
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                                                
                </div>

                <div class="flex-w flex-r-m p-b-10">
                    <div class="size-203 flex-c-m respon6 p-b-10">
                            Couleur
                    </div>

                    <div class="size-204 respon6-next">
                        <div class="rs1-select2 bor8 bg0">
                            <select class="js-select2">
                                <option value="0" disabled selected="true">Choisir la couleur</option>
                                <option v-for="color in colorss" :value="color.color_id">{{color.nom}}</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                 </div>

                                            <!--  -->
                                        
                  <div class="flex-w flex-r-m p-b-10">
                      <div class="size-203 flex-c-m respon6 p-b-10">
                                                    Type Livraison
                      </div>

                        <div class="size-204 respon6-next">
                            <div class="rs1-select2 bor8 bg0">
                                <select  class="js-select2" >
                                    <option id='TL0' value="0" disabled selected="true">Choisir le type de livraison</option>
                                                            
                                    <option v-for="typeLivraison in typeLiv" value="vc" v-if="typeLivraison.type_livraison === 'vc'">Vous effectuer la livraison</option>
                                    <option v-for="typeLivraison in typeLiv" value="cv" v-if="typeLivraison.type_livraison === 'cv'">Le client apportez votre produit</option>
                                    <option v-for="typeLivraison in typeLiv" value="dhl" v-if="typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
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
                        
                            <div class="form-group m-r-30" style="width: 305px">
                              <label for='img'>Image<span style="font-size: 12px">(Entrer l'image de profil pour votre produit*)</span></label>
                              <input type="file" class="form-control" accept="image/*" style="height: 40px;"  v-on:change="imagePreview" :class="{'is-invalid' : message.image}"  id='img'/>
                              <span class="px-3 cl13" v-if="message.image" v-text="message.image[0]">
                              </span>
                            </div>
                            <div class="form-group" style="width: 305px">
                              <label for="imgs">Images<span style="font-size: 12px">(Entrer les autres images s'il existe*)</span></label>
                              <input type="file" class="form-control" accept="image/png, image/jpeg" style="height: 40px" id='imgs' name="img[]" v-on:change="imagesPreviews" multiple>
                              
                            </div>
                         
                        </div>
                      
                        <div class="row col-md-12 pr-2 flex-t m-b-20">
                          <div class="form-group m-r-30" style="width: 305px">

                                <label>Prix</label>
                                <input type="number" name="prix" class="form-control" placeholder="0.00/DA*" v-model="produitAjout.prix" :class="{'is-invalid' : message.prix}" />
                                <span class="px-3 cl13" v-if="message.prix" v-text="message.prix[0]">
                                </span>
                          </div>

                          <div class="form-group" style="width: 305px">
                                <label>Quantité de Produit</label>
                                <input type="number" name="Qte_P" class="form-control" placeholder="0.00/Piece*" v-model="produitAjout.Qte_P" :class="{'is-invalid' : message.Qte_P}"/>
                                <span class="px-3 cl13" v-if="message.Qte_P" v-text="message.Qte_P[0]"></span>
                          </div>
                            
                         
                        </div>
                        <div class="row col-md-12 pr-2 flex-t m-b-30">
                            <select class="form-control form-control-lg m-r-30" id="categoSelect" name="catego" style="height: 40px; width: 305px ;border-radius: 1em;" v-on:change="activeSousCatego($event)" :class="{'is-invalid' : message.catego}">
                              <option value="" hidden="hidden" selected>&nbsp&nbspSélectionner une Ctegorie</option> 
                              <option v-for="catego in categories" :value="catego.id" >&nbsp&nbsp{{catego.libelle}}</option> 
                            </select>
                            <div>
                            <select class="form-control form-control-lg " id="sousCtagoSelect" name="sous_categorie_id" style="height: 40px;width: 305px;border-radius: 1em; " disabled= "true" v-on:change="getIdSousCatego($event)" :class="{'is-invalid' : message.sous_categorie_id}">
                              <option value="" hidden="hidden" selected>&nbsp&nbspSélectionner une Sous Categorie</option> 
                              <option v-for="Scatego in sousCategories" :value="Scatego.id" >&nbsp&nbsp{{Scatego.libelle}}</option> 
                            </select>
                            <span class="px-3 cl13" v-if="message.sous_categorie_id" v-text="message.sous_categorie_id[0]"></span>
                            </div>
                        </div>
                        <div class="row m-b-30">
                            <div class="col-md-10 pr-2" >
                                <label>Sélectionner une/plusieurs Couleur(s) pour votre produit</label>
                                <select class="form-control form-control-lg" id="colorSelect" name ="clr[]" v-model="colorsP" style="border-radius: 1em;" multiple :class="{'is-invalid' : message.colors}" id='clr'> 
                                  <option v-for="color in colors" :value="color.id" >&nbsp&nbsp{{color.nom}}</option> 
                                </select>
                                <span class="px-3 cl13" v-if="message.colors" v-text="message.colors[0]"></span>
                            </div>
                        </div>
                        <div class="row m-b-30">
                            <div class="col-md-10 pr-2 "> 
                                <label>Sélectionner le type de Taille produit</label>
                                <select class="form-control form-control-lg m-b-25" id="typetpSelect" name="typetp" v-model="Type" style="height: 40px; width: 320px ;border-radius: 1em;" @change="activeTaille()">
                                  <option value="0" disabled selected>&nbsp&nbspAucune</option> 
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
                                          
                                <button type="submit"  class="btn btn-danger btn-block " style="margin-top:40px;  border: 0; 
                                 border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="CancelArticle()" >Annuler
                                </button>
                                <button type="submit" v-if="modifier && addd===false" class="btn btn-success btn-block m-r-5"
                                 style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" 
                                 v-on:click="updateProduitButton()" >Modifier
                                </button> 
                                <button type="submit" v-if="modifier == false && addd === false" class="js-show-modal1 btn btn-success
                                 btn-block m-r-5" style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;"
                                  v-on:click="AfficherAjout2()">Suivant
                                </button>
                               <button v-if=" modifier === false && addd === true" type="submit" class="btn btn-success btn-block m-r-5" style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addProduitWithTest();" >Ajouter
                                </button>
                              
                          </div>
                        </div>
                      </div>
                  </section>
              
            </div>
            <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout2 "style=" width: 990px; padding-top: 10%">
                  <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelArticle()">
                    <img src="images/icon-close.png" alt="CLOSE">
                  </button>
                 <div class="tab " style="border: 1px" >
                    <div class="form-group m-b-35 m-l-50 " style="margin-left: 70px; margin-top: -10px;">
                        <input type="checkbox" v-on:change="selectAll()" class="form-control" v-model="allSelected" id="e"  >
                        <label for="e" style="font-size: 20px;" >Selectionner Tout :</label>
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
unset($__errorArgs, $__bag); ?>" :value="v.nom" :id="v.nom" name="villeC[]" v-model="checkedville" @change="changeButton(v)">
                                        <label class="p-l-25 p-t-4" :for="v.nom" >{{v.nom}}</label>
                                    </div>
                    </div>
                    <div class="form-group input-group m-b-80" style="width: 800px; margin-left: 30px;">
                                <div class="input-group mb-3" style="margin-left: 50px;">   
                                  <input id="addV" type="number" class="form-control <?php $__errorArgs = ['prix_tarif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" placeholder="Entrez le prix de livraison pour la(les) ville(s) selectionner" name="prix_tarif" style="height: 45px" v-model='prixx.prx' value="<?php echo e(old('prix_tarif')); ?>">
                                  <div class="input-group-append">
                                    <button class="btn btn-block btn-sm btn-success"  type="button" style="height: 45px; margin-top: 0px; width: 90px; font-size: 16px; border-bottom-right-radius: 1.8em 1.8em; border-top-right-radius: 1.8em 1.8em;" v-on:click="AjouterArrayVille()">valider</button>
                                    </div>
                                    <div v-if='alertTarifDanger' class="alert alert-danger" role="alert" style="width: 800px;background-color: #EF2626">
                                      Vous devez sélectionner au minimum une ville.
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div v-if='alertTarif' class="alert alert-success" style="width: 800px; background-color: #13c940">
                                      <strong>Success!</strong> Le tarif de livraison a été enregistré.
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                  <span>Si vous passer cette etape et rien valider, on vas consedére que le tarif de votre livraison est 0 DA.</span>
                                  
                                </div>
                                
                                 
                    </div>
                    <div class="flex-t m-l-50">
                        <button type="submit"  class="btn btn-warning m-r-20" style=" margin-top:-48px; border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;width: 280px; " v-on:click="Previous()" >Previous
                        </button>
                        <button type="submit"  class="btn btn-danger  m-r-20" style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 280px;  margin-top: -48px" v-on:click="CancelArticle()" >Annuler
                        </button>
                        <button v-if="SuivantPaiment == true" type="submit" class="js-show-modal1 btn btn-success btn-block m-r-5" style="margin-top:-48px;  border: 0;border-radius: 1em; font-size: 12px;  font-weight: 700; width: 280px" v-on:click="AfficherAjout3()">Suivant</button>
                        <button v-else type="submit" class="js-show-modal1 btn btn-success btn-block" style="margin-top:-48px;  border: 0;border-radius: 1em; font-size: 12px;  font-weight: 700; width: 280px" v-on:click="addProduit()">Ajouter</button>
                    </div>
                    
                  </div>
            </div>
<!--**************************paimet******************************-->

        <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent m-t-35" v-if="openPaiment" style=" width: 970px; padding-top: 45%">
          <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelAnnonce(annc)">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <section class=" creat-article">     
            <div  class=" container-creat-article col-md-12">
              <div class="col-md-12 m-b-30">
                <h5 class="m-t--40 m-l--40 col-md-12">Paiment</h5>
              </div>
              <div class="col-md-12">
                <div class="col-md-12 m-b-40">
                    <div class="col-md-12 m-b-20">
                      <ul>
                        <li style="list-style-type: disc;"><span >Vous devez payer pour publier votre annonce.</span>
                        </li>
                        <li style="list-style-type: disc;"><span >Aprés le paiement vos produits sera publié sur le site.</span>
                        </li>
                      </ul>
                        
                    </div>
                    <div class="col-md-12 flex-t m-b-15">
                        <span class = "col-md-6" style="color:black;">Numéro bancaire pour paiment :</span>
                        <div class ="col-md-6">
                          <input class =" form-control" type="text" disabled value="<?php echo $idbigAdmin[0]->numCarteBanquaire?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 flex-t">
                  <button type="submit"  class="btn btn-danger btn-block " style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="myFunctionP">Previous</button> 
                  <button type="submit"  class="btn btn-success btn-block " style=" border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addProduitwithPaiment();" >Ajouter</button>
                    
                </div>    
              </div>      
            </div>
          </section>
        </div>
            <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-show="tarifL" style=" width: 990px; padding-top: 10%">
                <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelArticle()">
                    <img src="images/icon-close.png" alt="CLOSE">
                </button>
                <div class="tab m-t--60 col-md-12 col-sm-6 m-l-15" style="border: 1px" >
                   <div >
                       <div >
                          <h5 class="m-b-50">Tarif de Livraison</h5>
                       </div>
                       <div class="size-204 respon6-next m-b-20">
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2" >
                                    <option value="0" disabled selected="true">Ville / Tarif de Livraison</option>                       
                                    <option v-for='TV in tarifVille'>{{TV.nom}} / {{TV.prix}} DA</option>
                                 </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div>
                            <span>Changer Tarif de Livraison des villes:</span>
                            <div class="flex-t">
                                <div class="size-204 respon6-next m-r-50" style="width: 470px">
                                    <div class="rs1-select2  bor8 bg0" @click="alertTarifDangerTarif = false; alertTarifTarif = false ">
                                        <select class="js-select2 leaderMultiSelctdropdown" name ="villesAddT[]" multiple>
                                            <option value="0" disabled>Villes </option><option v-for='TV in villes' :value='TV.id'>{{TV.nom}}</option>
                                         </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="input-group input-group-sm mb-3" style="width: 340px; ">
                                  <input type="number" class="form-control" placeholder="0DA/Kg" aria-describedby="basic-addon2" style="height: 35px; border: 1px solid grey" v-model='prixx.prx' @click=" alertTarifTarif = false ">
                                  <div class="input-group-append">
                                    <button class="btn btn-block btn-sm btn-success"  type="button" style="height: 35px; margin-top: 0px; width: 75px; font-size: 16px; border-bottom-right-radius: 1.8em 1.8em; border-top-right-radius: 1.8em 1.8em;" v-on:click="AjouterArrayVilleTarif()">valider</button>
                                    </div>
                                </div>
                            </div>
                             <div v-if='alertTarifDangerTarif' class="alert alert-danger" role="alert" style="width: 860px;background-color: #EF2626">
                                      Vous devez sélectionner au minimum une ville.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div  v-if="alertTarifTarif" class="alert alert-success" style="width: 860px; background-color: #13c940">
                                <strong>Success!</strong> Le tarif de livraison a été enregistré.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                   </div>
                   <hr>
                   <div >
                        <div class="m-b-50">
                          <h5 >Type de Livraison</h5>
                       </div>
                       <div >
                            <div class="flex-t m-b-20">
                                <span class="m-r-175 m-t-10">Vos Types de Livraison:</span>
                                <div class="size-204 respon6-next m-r-30" style="width: 470px">
                                    <div class="rs1-select2 bor8 bg0" @click='typeDelete = false'>
                                      <select class="js-select2 deleteTL" >
                                        <option selected value='0' disabled>Type de Livraison</option>
                                        <option v-for="typeLivraison in typeLivrVendeur" value="vc" v-if="typeLivraison.type_livraison === 'vc'"> Vous effectuer la livraison</option>
                                        <option v-for="typeLivraison in typeLivrVendeur" value="cv" v-if="typeLivraison.type_livraison === 'cv'">Le client apportez votre produit</option>
                                        <option v-for="typeLivraison in typeLivrVendeur" value="dhl" v-if="typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
                                      </select>
                                      <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <button class="btn btn-danger" style=" text-align: center; border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 98px;" @click="deleteTypeL">Supprimer</button>

                            </div>
                            <div  v-if="typeDelete" class="alert alert-danger" style="width: 860px; background-color: #EF2626">
                                 Il ya aucun type de livraison selectionné.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="flex-t">
                                <span class="m-r-20 m-t-10">Types de livraison que vous n'avez pas choisis:</span>
                                <div class="size-204 respon6-next m-r-30" style="width: 470px">
                                    <div class="rs1-select2 bor8 bg0" @click='typeAdd = false'>
                                      <select class=" js-select2 addTL" >
                                        <option selected value='0' disabled=>Types n'avez pas choisis</option>
                                        <option v-for="typeLivraison in typeLivrVendeurNotExiste" value="vc" v-if="typeLivraison.type_livraison === 'vc'"> Vous effectuer la livraison</option>
                                        <option v-for="typeLivraison in typeLivrVendeurNotExiste" value="cv" v-if="typeLivraison.type_livraison === 'cv'">Le client apportez votre produit</option>
                                        <option v-for="typeLivraison in typeLivrVendeurNotExiste" value="dhl" v-if="typeLivraison.type_livraison === 'dhl'">DHL(Poste)</option>
                                      </select>
                                      <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <button class="btn btn-success" style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 98px;" @click='addTypeL'>Ajouter</button>
                            </div>
                            <div  v-if="typeAdd" class="alert alert-danger" style="width: 860px; background-color: #EF2626">
                                Il ya aucun type de livraison selectionné.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                    
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
               'notPaier'        => $notPaier,
               'ImageP'         => $ImageP,
               "idbigAdmin"   =>$idbigAdmin,
                'url'           => url('/'), 
          ]); ?>;
</script>
<script>
    function initDashboardPageCharts () {}
        Vue.mixin({

            methods:{
              addProduitwithPaiment: function(){
                app2.produitAjout.image = app2.image;
                app2.produitAjout.images = app2.imagesP;
                app2.produitAjout.colors = app2.colorsP;
                app2.produitAjout.tailles = app2.tailleP;
                app2.produitAjout.pointures = app2.PointureP;
                app2.produitAjout.typet = app2.Type;
                axios.post(window.Laravel.url+"/addProduitwithPaiment",app2.produitAjout)
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
              addProduitWithTest: function(){
                    app2.produitAjout.image = app2.image;
                    app2.produitAjout.images = app2.imagesP;
                    app2.produitAjout.colors = app2.colorsP;
                    app2.produitAjout.tailles = app2.tailleP;
                    app2.produitAjout.pointures = app2.PointureP;
                    app2.produitAjout.typet = app2.Type;
                    axios.post(window.Laravel.url+"/addproduitwithtest",app2.produitAjout)
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
              addProduit: function(){
                app2.produitAjout.image = app2.image;
                app2.produitAjout.images = app2.imagesP;
                app2.produitAjout.colors = app2.colorsP;
                app2.produitAjout.tailles = app2.tailleP;
                app2.produitAjout.pointures = app2.PointureP;
                app2.produitAjout.typet = app2.Type;
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
    function changePic(img){
        document.getElementById("pic").src = 'http://localhost:8000/storage/produits_image/'+img;
    }
     var app2 = new Vue({
        el: '#app2',
        data:{
          hideModel: false,
          openAjout: false,
          openAjout2: false,
          openAjout3: false,
          openPaiment: false,
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
          //  poid: '',
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
          allSelected: false,
          selectall: true,
          villeIds: [],
          checkedville: [],
          villesAdd: [],
          prixx:{
            prx:0,
          },
          imagesP: [],
          colorsP: [],
          tailleP: [],
          PointureP: [],
          typeTaille: false ,
          typePointure: false,
          Type: 0,
          vville :{
            id: 0,
            nom: '',
          },

          oldprd: {
            id: 0,
            sous_categorie_id: '',
            catego: '',
            Libellé: '',
            prix: '',
            description: '',
            Qte_P: '',
            image: '',
            images: [],
            colors: [],
            tailles: [],
            pointures: [],
            typet: 0,
          },
          prd: {
            id: 0,
            sous_categorie_id: '',
            catego: '',
            Libellé: '',
            prix: '',
            description: '',
            Qte_P: '',
            image: '',
            images: [],
            colors: [],
            tailles: [],
            pointures: [],
            typet: 0,
          },
          alertTarif: false,
          alertTarifDanger: false,
          typeLVC: null,
          addd: false,
          showPaimentPage: true,
          showpaiment: null,
          getImageD: [],
          detaillproduit: [],
          tailless: [],
          colorss: [],
          typeLiv: [],
          tailleExiste: false,
          tarifL: false,
          tarifVille: [],
          typeLivrVendeur: [],
          typeLivrVendeurNotExiste: [],
          villesAddTarif: [],
          alertTarifDangerTarif: false,
          alertTarifTarif: false,
          typeDelete: false,
          typeAdd: false,
          SuivantPaiment:  true,
          p: false,

          
        },
        methods:{
            myFunctionP: function(){
            this.openPaiment = false;
            this.openInfo = false;
            if(this.typeLVC == true && this.p ==false){
              this.openAjout2 =true;
            }
            else if(this.typeLVC == true && this.p ==true){
              this.openAjout = true;
            }
            else{
              this.openAjout = false;
            }
            
           },
            deleteTypeL(){
                if($('.deleteTL').val() == null){
                    this.typeDelete = true;
                }
                else{
                    axios.delete(window.Laravel.url+'/deleteTypeLivr/'+$('.deleteTL').val())
                     .then(response => {
                         this.typeLivrVendeur.forEach(key=>{
                            if(key.type_livraison == $('.deleteTL').val()){
                                var position = this.typeLivrVendeur.indexOf(key);
                                this.typeLivrVendeurNotExiste.unshift(key);
                                this.typeLivrVendeur.splice(position,1);
                            }
                         })
                         this.typeDelete = false;
                         if(this.typeLivrVendeur.length == 0){
                            $('.deleteTL').val('0');
                         }
                     })
                     .catch(error => {
                          console.log('errors : '  ,error);
                     })
                 }
                
            },
            addTypeL(){
                if($('.addTL').val() == null){
                    this.typeAdd = true;
                }
                else{
                    axios.post(window.Laravel.url+'/addTypeLivr',{'type':$('.addTL').val()})
                     .then(response => {
                         this.typeLivrVendeurNotExiste.forEach(key=>{
                            if(key.type_livraison == $('.addTL').val()){
                                var position = this.typeLivrVendeurNotExiste.indexOf(key);
                                this.typeLivrVendeur.unshift(key);
                                this.typeLivrVendeurNotExiste.splice(position,1);
                            }
                         })
                         this.typeAdd = false;
                         if(this.typeLivrVendeurNotExiste.length == 0){
                            $('.addTL').val('0');
                         }
                     })
                     .catch(error => {
                          console.log('errors : '  ,error);
                     })
                 }
                
            },
            changePicVue(img){
                changePic(img);
            },
            Previous(){
                this.openAjout = true ;
                this.openAjout2 = false;
                this.openAjout3 = false;

            },
            getPaimentVendeurr(){
                axios.get(window.Laravel.url+'/getpaimentvendeurr')
                 .then(response => {
                     if(response.data){
                        this.showpaiment = true;
                     }
                     else{
                        this.showpaiment = false;
                    }
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
            },
            getTypeL(){
                axios.get(window.Laravel.url+'/gettypelvendeur')
                 .then(response => {
                    console.log('holl',response.data.etat)
                     if(response.data.etat){
                        this.typeLVC = true;
                        this.modifier = false
                     }
                     else if(!response.data.etat && response.data.paiment){
                        this.typeLVC = true;
                        this.modifier = false
                        this.p = true;
                     }
                     else{
                        this.typeLVC = false;
                        this.addd = true;
                        this.p = false;
                     }
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
            },
            showImage1: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/annonces_image/homeplace1.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      },
      showImage2: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/annonces_image/homeplace2.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      },
      showImage3: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/annonces_image/homeplace3.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      },
      showImageEmp1: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/annonces_image/emploplace1.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      },
      showImageEmp2: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/annonces_image/emploplace2.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      }, 
      showImageEmp3: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/annonces_image/emploplace3.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      },   
      change_valeur_vendeur: function(){
        select = document.getElementById("select");
        choice = select.selectedIndex;

axios.post(window.Laravel.url+'/paiementvendeur/'+choice)
              .then(response => {
				Swal.fire(
					  "Admin va envoyer son réponse!",
					);
                	console.log("response",response.data)
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })

},
            CancelArticle(){
                this.tailless = [];
                this.colorss = [];
                this.typeLiv = [];
                this.detaillproduit = [];
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
                          //  poid: 0,
                            image: '',
                            images: [],
                            colors: [],
                            tailles: [],
                            pointures: [],
                };
                this.message = {};
                this.tailleP= [];
                this.PointureP= [];
                this.colorsP= [];
                this.Type = '';
                this.modifier= false;
                this.addd=true;
                this.Type=0;
            },
            imagePreview(event) {
               var fileR = new FileReader();
               fileR.readAsDataURL(event.target.files[0]);
               fileR.onload = (event) => {                 
                  this.image = event.target.result;
                  this.prd.image = event.target.result;
               }              
            },
            getVille: function(){
                axios.get(window.Laravel.url+'/getville')
                 .then(response => {
                      this.villes = response.data;
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
 
            },
            openAjoutt :function(){
              this.openAjout = true;
              
            },
            AjouterArrayVilleTarif: function(){
               
               $('.leaderMultiSelctdropdown').val().forEach(key=>{
                        this.villesAddTarif.push({id: key})  ;
                })
                if(this.villesAddTarif.length == 0){
                    this.alertTarifDangerTarif = true;
                }
               else{
                    
                   this.villesAddTarif.forEach(key=>{
                        key['prix']=this.prixx.prx;
                    })
               
                    this.villesAddTarif.forEach(key => {
                        axios.post(window.Laravel.url+'/addvilles',key)
                        .then(response => {
                                    
                            this.alertTarifDangerTarif = false;
                            this.alertTarifTarif = true;
                            this.villesAddTarif = [];
                            this.prixx.prx = 0;
                            
                            $('.leaderMultiSelctdropdown').val('').trigger('change');

                                    
                        })
                        .catch(error =>{
                            console.log('errors :' , error);
                        })
                    })
                     
                 }
                 
                
                            
            },
            AjouterArrayVille: function(){
               
                this.villesAdd.forEach(key=>{
                    key['prix']=this.prixx.prx;
                })
                
                if(this.villesAdd.length == 0){
                    this.alertTarifDanger = true;
                }
                else{
                     this.villesAdd.forEach(key => {
                            axios.post(window.Laravel.url+'/addvilles',key)
                                  .then(response => {
                                    this.alertTarifDanger = false;
                                    this.alertTarif = true;
                            })
                            .catch(error =>{
                                             console.log('errors :' , error);
                                  })
                     })

                     this.allSelected = false;
                     this.checkedville = [];
                     this.villesAdd = [];
                     this.selectall = true;
                     this.prixx.prx=0;
            }
                            
        },
        updateProduitButton: function(){
            this.tarifL = false;
         if(this.prd.Libellé == ''){

            this.prd.Libellé =  this.oldprd.Libellé;         }
         if(this.prd.description == ''){

            this.prd.description =  this.oldprd.description;
         }
         if(this.prd.prix == ''){

            this.prd.prix =  this.oldprd.prix;
         }
         if(this.prd.Qte_P == ''){
            this.prd.Qte_P =  this.oldprd.Qte_P;
         }
      
      
         if(this.prd.sous_categorie_id == ''){

            this.prd.sous_categorie_id =  this.oldprd.sous_categorie_id;
         }
         if(this.prd.id == ''){

            this.prd.id =  this.oldprd.id;
         }     
         axios.put(window.Laravel.url+"/updateproduit",this.prd)
         
           .then(response => {
              if(response.data.etat){
                window.location.reload();
                this.modifier = false;
                 this.hideModel = false;
                 this.prd = {
                        id: 0,
                        sous_categorie_id: '',
                        catego: '',
                        Libellé: '',
                        prix: '',
                        description: '',
                        Qte_P: '',
                        image: '',
                        images: [],
                        colors: [],
                        tailles: [],
                        pointures: [],
                        typet: 0,
                      };
                this.addd = true;
                this.produitAjout= {
                    id: 0,
                    sous_categorie_id: '',
                    catego: '',
                    Libellé: '',
                    prix: '',
                    description: '',
                    Qte_P: '',
                    image: '',
                    images: [],
                    colors: [],
                    tailles: [],
                    pointures: [],
                    typet: 0,
                };
                this.Type=0;

              } 
              
              this.message = {}; 
              this.image = null;
              this.oldprd= {
                        id: 0,
                        sous_categorie_id: '',
                        catego: '',
                        Libellé: '',
                        prix: '',
                        description: '',
                        Qte_P: '',
                        image: '',
                        images: [],
                        colors: [],
                        tailles: [],
                        pointures: [],
                        typet: 0,
                  }; 
                this.imagesP=[];
            })
            .catch(error =>{
                this.message = error.response.data.errors;
                console.log('errors :' , this.message);
            })

      },
        imagesPreviews(event) { 
                this.imagesP = [];
                this.prd.images = [];        
               for( i = 0 ; i < event.target.files.length ; i++){
                    var fileR = new FileReader();
                    fileR.readAsDataURL(event.target.files[i]);

                    fileR.onload = (event) => {                 
                          this.imagesP.push(event.target.result);
                          this.prd.images.push(event.target.result);
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
             this.tarifL = false;
             
             this.produitAjout.image = this.image;
             this.produitAjout.images = this.imagesP;
             this.produitAjout.colors = this.colorsP;
             this.produitAjout.tailles = this.tailleP;
             this.produitAjout.pointures = this.PointureP;
             this.produitAjout.typet = this.Type;
             
             axios.post(window.Laravel.url+'/verifierInputs',this.produitAjout)
                 .then(response => {
                    this.message = {};
                    if(this.typeLVC == true && this.p == false){
                        this.openAjout2 = true;
                        this.openPaiment = false;
                    }
                    else if(this.typeLVC == true && this.p == true){
                       this.openAjout2 = false;
                       this.openPaiment = true;
                    }
                    if(response.data.length == 0){//le button suivant dans openAjout2 tban
                      this.SuivantPaiment = true;
                    }
                    else{//tban ajouter
                        this.SuivantPaiment = false;
                    } 
                    this.hideModel = true;
                    this.openAjout = false
                    this.openInfo = false;
                 })
                 .catch(error => {
                      this.message = error.response.data.errors;
                      console.log('errors :' , this.message);
                 })
             
            },
            AfficherAjout3: function(){
            this.openAjout2 = false;
            this.openPaiment = true;
             this.produitAjout.image = this.image;
             this.produitAjout.images = this.imagesP;
             this.produitAjout.colors = this.colorsP;
             this.produitAjout.tailles = this.tailleP;
             this.produitAjout.pointures = this.PointureP;
             this.produitAjout.typet = this.Type;
             /*axios.post(window.Laravel.url+'/verifierInputs',this.produitAjout)
                 .then(response => {
                    this.message = {};
                  if(this.typeLVC == true){
                        this.openAjout3 = true;
                    }
                    else{
                       this.openAjout3 = false;
                    }
                    this.hideModel = true;
                    this.openAjout = false
                    this.openAjout2 = false
                    this.openInfo = false;
                 })
                 .catch(error => {
                      this.message = error.response.data.errors;
                      console.log('errors :' , this.message);
                 })*/
             
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
            deselectVille: function(villeId){
             this.villesAdd.forEach(key => {
                  if(key.id == villeId){
                      var position = this.villesAdd.indexOf(key);
                      this.villesAdd.splice(position,1);                    
                  } 
            });             
          },
          selectAll: function(){
            this.alertTarifDanger = false;
            this.alertTarif = false;
            this.selectall = false;
            if (this.allSelected) {
                for (user in this.villes) {
                    this.villeIds.push(this.villes[user].nom);
                    this.villesAdd.push(this.villes[user]);
                    this.checkedville.push(this.villes[user].nom);
                }
             }
             else{
              this.villeIds = [];
              this.selectall = true;
              this.checkedville = [];
              this.villesAdd = [];
            }
        },
        
         changeButton: function(v){
            this.alertTarifDanger = false;
            this.alertTarif = false;
              if(this.checkedville.length > 0){
                 this.villesAdd.push(v);
              }
              else{
                this.villesAdd = [];
                
             }
             if(this.checkedville.length < this.villesAdd.length){
                this.villesAdd = this.villesAdd.filter(function(item) { return item != v; });
              }
          },
        },
        created: function(){
            this.getCategories();
            this.getColors();
            this.getVille();
            this.getTypeL();
        }
     })
</script>
<script>
     var app = new Vue({
        el: '#app',
        data:{
          ProduitsVendeur: [],
          suppr: false,
          imagesproduit: [],
          checkedproduits: [],
          selectalll: true,
          allSelectedd: false,
          produitIds: [],
          produitDelete :[],
          p:[],
          autrepaier:false,
          

        },
        methods:{
            showTarifL:function(){
                app2.tarifL = true;
                app2.hideModel = true;
                axios.get(window.Laravel.url+'/tarifville')
                .then(response => {
                        app2.tarifVille = response.data.tarifv; 
                        app2.typeLivrVendeur =  response.data.typeL;
                        app2.typeLivrVendeurNotExiste = response.data.typeLNotExiste;
                })
                .catch(error =>{
                        console.log('errors :' , error);
                })

            },
            dd:function(produit){
                app2.hideModel = true;
                app2.openAjout = false;
                app2.openAjout2 = false;
                app2.openAjout3 = false;
                app2.openInfo = true;
                app2.tarifL = false;
                axios.get(window.Laravel.url+'/getdetailsproduitvendeur/'+produit.id)
                .then(response => {
                        app2.tailless = response.data.taille;
                        app2.colorss = response.data.colors; 
                        app2.typeLiv = response.data.typeL; 
                        app2.detaillproduit = response.data.produit;
                         var i=0;
                        app2.tailless.forEach(key => {
                            if(produit.id == key.produit_id ){
                                    i++;
                            }
                        });
                        if(i != 0){
                            app2.tailleExiste = true;
                        }
                        else{
                            app2.tailleExiste = false;
                        }                
                })
                .catch(error =>{
                        console.log('errors :' , error);
                })

                axios.get(window.Laravel.url+'/getimageD/'+produit.id)
                .then(response => {
                        app2.getImageD = response.data.imagee;                       
                })
                .catch(error =>{
                        console.log('errors :' , error);
                })
               
            },
          getProduit: function(){
            axios.get(window.Laravel.url+'/produitVendeur')
              .then(response => {
                this.ProduitsVendeur = window.Laravel.produit.data;
                this.imagesproduit = window.Laravel.ImageP;
                this.autrepaier = response.data.notPaier;

               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          deleteArrayProduit:function(){
            if(this.produitDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucun produit a supprimer!',

              }).then((result) => {
                this.allSelectedd = false;
                this.suppr=false;
                this.selectalll = true;
               
             })
              
            }
            else if(this.produitDelete.length == 1){
                Swal.fire({
                  title: 'Etes vous de supprimer ce produit?',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.produitDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deleteproduit/'+key.id)
                          .then(response => {
                            if(response.data.etat){             
                                    var position = this.ProduitsVendeur.indexOf(key);
                                    this.ProduitsVendeur.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelectedd = false;
                          this.checkedproduits.length = [];
                          this.suppr=false;
                          this.produitDelete = [];
                          this.selectalll = true;

                    Swal.fire(
                      'Effacé!',
                      'Votre produit a été supprimé.',
                      'success'
                    )
                  }
                  
                  })

            }
            else{
                Swal.fire({
                  title: 'Etes vous de supprimer ces produits?',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.CategoriesDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deleteproduit/'+key.id)
                          .then(response => {
                            if(response.data.etat){             
                                      var position = this.ProduitsVendeur.indexOf(key);
                                      this.ProduitsVendeur.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelectedd = false;
                          this.checkedproduits.length = [];
                          this.suppr=false;
                          this.produitDelete = [];
                          this.selectalll = true;

                    Swal.fire(
                      'Effacé!',
                      'Vos produits ont été supprimé.',
                      'success'
                    )
                  }
                  
                  })

            }
            
        },
         updateProduit: function(produit){     
         app2.hideModel = true;
         app2.openAjout = true;
         app2.openInfo = false;
         app2.modifier = true;
         app2.openPaiment = false;
         app2.addd=false;
         app2.produitAjout = produit;
         app2.oldprd.Libellé = produit.Libellé;
         app2.oldprd.description = produit.description;
         app2.oldprd.prix = produit.prix;
         app2.oldprd.Qte_P = produit.Qte_P;
         app2.oldprd.sous_categorie_id = produit.sous_categorie_id;
         app2.oldprd.id = produit.id;
         
        },      
          AfficherAjout: function(){
             app2.hideModel = true;
             app2.openAjout = true;
             app2.openInfo = false;
             app2.openAjout2 = false;
             app2.openPaiment = false;
             app2.tarifL = false;

            
              
          },
          deselectProduit: function(produitId){
             this.produitDelete.forEach(key => {
                  if(key.id == produitId){
                      var position = this.produitDelete.indexOf(key);
                      this.produitDelete.splice(position,1);                    
                  } 
            });             
         },
           changeButton2: function(p){
               if(this.checkedproduits.length > 0){
                  this.suppr=true;
                  this.produitDelete.unshift(p);
                }
                else{
                  this.produitDelete = [];
                  this.suppr=false;
                } 
                if(this.checkedproduits.length < this.produitDelete.length){
                         this.produitDelete = this.produitDelete.filter(function(item) { return item != p; });
                }       
            }, 
          selectAlll: function() {
              this.selectalll = false;
            if (this.allSelectedd) {
                for (user in this.ProduitsVendeur) {
                    this.produitIds.push(this.ProduitsVendeur[user].id);
                    this.produitDelete.push(this.ProduitsVendeur[user]);
                }
                this.suppr=true;
             }
             else{
              this.produitIds = [];
              this.produitDelete= [];
              this.suppr=false;
              this.selectalll = true;
              this.checkedproduits = [];
            }
             
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
     });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/produit_vendeur.blade.php ENDPATH**/ ?>