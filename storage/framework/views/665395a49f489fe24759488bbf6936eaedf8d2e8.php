
<?php $__env->startSection('content'); ?>

    <head>
        <title><?php echo e(( 'Cree Compte')); ?></title>
    </head>
 <!--*******************************************************************************************************-->
 <div class="container" id="app">
     <section class="creat-count " >
        <div  class=" container " style="padding: 8%;">
            <div class="m-b-50 ">
                <span class="mtext-111 cl13">Créer Compte</span>
                <br>
                <p class="m-t-4" style="font-size: smaller">C'est simple et rapide.</p>
            </div>
           
               
               

        <form id="regForm" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

            
  <div class="tab" >
    <div class="form-group flex-t m-b-35">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg  <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nom" name="nom" type="text" placeholder="Nom*" value="<?php echo e(old('nom')); ?>">

                        <?php $__errorArgs = ['nom'];
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

                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="prenom" type="text" name="prenom"placeholder="Prenom*" value="<?php echo e(old('prenom')); ?>">
                        

                        <?php $__errorArgs = ['prenom'];
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
    <div class="form-group flex-t m-b-35">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg   <?php $__errorArgs = ['numTelephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="numTelephone" value="<?php echo e(old('numTelephone')); ?>" id="numtlf" type="tel" placeholder="Numero Telephone*">

                        <?php $__errorArgs = ['numTelephone'];
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
                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" id="email" name="email" type="email" placeholder="@email*" >

                        <?php $__errorArgs = ['email'];
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
    <div class="form-group m-b-35">
                    <input class="form-control form-control-lg  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mtps" type="password" placeholder="mot de passe*" name="password" >
                    
                    <?php $__errorArgs = ['password'];
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
    <div class="form-group flex-t m-b-35">
                    <div class=" m-r-30" style="width: 375px ">
                        <select class="form-control form-control-lg <?php $__errorArgs = ['ville'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleFormControlSelect2" name="ville" style="height: 45px">
                          <option value="" hidden="hidden" selected>Choisir une ville</option> 
                          <option v-for="v in villes" :value="v.nom" >{{v.nom}}</option> 
                        </select>

                        <?php $__errorArgs = ['ville'];
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
                    <div class="" style="width: 375px">

                        <select class="form-control form-control-lg <?php $__errorArgs = ['compte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleFormControlSelect1"  name="compte"  onchange="onChange()" style="height: 45px" value="<?php echo e(old('compte')); ?>">
                            <option value="" selected hidden="hidden">Crée compte tant que</option>
                            <option value="1" <?php echo e(old('compte') == 1 ? 'selected' : ''); ?>>Client</option>
                            <option value="2" <?php echo e(old('compte') == 2 ? 'selected' : ''); ?>>Vendeur</option>
                            <option value="3" <?php echo e(old('compte') == 3 ? 'selected' : ''); ?>>Employeur</option>

                        </select>
                        <?php $__errorArgs = ['compte'];
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
    <div class="from-group  m-b-40 openC" style="display: none">
                    <input type="file" class="form-control <?php $__errorArgs = ['photoC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="photoC" id="photoC" value="<?php echo e(old('photoC')); ?>" style="height: 45px">
                    <?php $__errorArgs = ['photoC'];
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
                    <div class=" m-t-15">
                      <input type="checkbox" class="form-check-input m-l-2" id="check1" onchange="openSubmit(1)">
                      <label class="form-check-label m-l-8" for="check1" style="color: black;">J'ai lu et j'accepte les <a style=" color: #007bff;" class="pointer js-show-modal1" id="condi" @click="openCondition('c')">Conditions générales de l'achat et vente</a> de Basmah.WS</label>
                    </div>
                        
    </div>
     <div class="form-group flex-t m-b-35 openV"  style="display: none">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg  " id="nom_btq" type="text" placeholder="Nom de Boutique" name="Nom_boutique" value="<?php echo e(old('Nom_boutique')); ?>">
                    </div>
                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg <?php $__errorArgs = ['Num_Compte_Banquaire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nom_btq"  name="Num_Compte_Banquaire" type="text" placeholder="Numero Compte Bancaire*" value="<?php echo e(old('Num_Compte_Banquaire')); ?>"> 

                        <?php $__errorArgs = ['Num_Compte_Banquaire'];
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
    <div class="form-group m-b-35 openV" style="display: none">
                    <input class="form-control form-control-lg <?php $__errorArgs = ['addrsse_boutique'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="addrsse_btq" name ="addrsse_boutique" type="text" placeholder="Addresse de Boutique*" value="<?php echo e(old('addrsse_boutique')); ?>">    

                    <?php $__errorArgs = ['addrsse_boutique'];
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
    <div class="from-group  m-b-40 openV" style="display: none">
                    <input type="file" class="form-control <?php $__errorArgs = ['photoV'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="photoV" value="<?php echo e(old('photoV')); ?>" style="height: 45px">
                    <?php $__errorArgs = ['photoV'];
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
    <div class="form-group flex-t m-b-35 openE" style="display: none">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg  <?php $__errorArgs = ['nom_societe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nom_btq" name="nom_societe" type="text" placeholder="Nom de Société*" value="<?php echo e(old('nom_societe')); ?>">

                        <?php $__errorArgs = ['nom_societe'];
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
                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg <?php $__errorArgs = ['num_compte_banquiare'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nom_btq" name="num_compte_banquiare" type="text" placeholder="Numero Compte Bancaire*" value="<?php echo e(old('num_compte_banquiare')); ?>"> 

                        <?php $__errorArgs = ['num_compte_banquiare'];
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
    <div class="form-group m-b-35 openE" style="display: none">
                    <input class="form-control form-control-lg <?php $__errorArgs = ['addrsse_soct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="addrsse_soct" name="addrsse_soct" type="text" placeholder="Addresse de Société*" value="<?php echo e(old('addrsse_soct')); ?>">

                    <?php $__errorArgs = ['addrsse_soct'];
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
    <div class="from-group  m-b-40 openE" style="display: none">
                    <input type="file" class="form-control <?php $__errorArgs = ['photoE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="photoE" value="<?php echo e(old('photoE')); ?>" style="height: 45px">
                    <?php $__errorArgs = ['photoE'];
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
                    <div class=" m-t-15">
                      <input type="checkbox" class="form-check-input m-l-2" id="check3" onchange="openSubmit(3)">
                      <label class="form-check-label m-l-8" for="check3" style="color: black;">J'ai lu et j'accepte les <a style=" color: #007bff;" class="pointer js-show-modal1" id="condi" @click="openCondition('e')">Conditions générales de l'achat et vente</a> de Basmah.WS</label>
                    </div>
                        
    </div>
  </div>
  <div class="tab">
    <div class="form-group m-b-35" >
                    <label class="m-b-13" style="font-size: 20px">Sélectionnez le(s) type(s) de livraison que que vous pouvez effectuer :</label>
                    <select class="form-control form-control-lg <?php $__errorArgs = ['typeL'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="typeLivrs"  name="typeL[]" multiple >
                       <option value="0" disabled >Sélectionnez</option>
                        <option value="dhl" <?php echo e(in_array("dhl", old("typeL") ?: []) ? "selected": ""); ?>>DHL(Poste)</option>
                        <option value="vc"<?php echo e(in_array("vc", old("typeL") ?: []) ? "selected": ""); ?>>Vous effectuer la livraison</option>
                        <option value="cv"<?php echo e(in_array("cv", old("typeL") ?: []) ? "selected": ""); ?>>Client ramener ces produits</option>
                           
                            
                    </select>                           
                    <?php $__errorArgs = ['typeL'];
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
                    <div class=" m-t-15">
                      <input type="checkbox" class="form-check-input m-l-2" id="check2" onchange="openSubmit(2)">
                      <label class="form-check-label m-l-8" for="check2" style="color: black;">J'ai lu et j'accepte les <a style=" color: #007bff;" class="pointer js-show-modal1" id="condi" @click="openCondition('v')">Conditions générales de l'achat et vente</a> de Basmah.WS</label>
                    </div>
    </div>
  </div>
    <div id="nextPrevious">
      <button type="button" id="prevBtn" onclick="nextPrev(-1,-1)" class="btn-lg m-t-8 btn-block m-r-30" style="background-color:#ca2323;color:white">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1,1)" class="btn-lg btn-block bg10"  disabled>Creer Compte</button>
      
    </div>

  <div style="text-align:center;margin-top:40px; display: none;" id="stepp">
    <span class="step"></span>
    <span class="step"></span>
    <!--<span class="step"></span>-->
  </div>

</form>
   
        </div>
    </section>

<!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20" >
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="<?php echo e(asset('images/icons/icon-close.png')); ?>" alt="CLOSE">
                </button>

                <div class="row" v-if='client'>
                    
                      <div class="col-md-12 col-lg-12 p-b-40 p-r-30" >
                        <div class="col-md-12 col-lg-12 p-r-30 m-l-30">
                            <h2 style="color:red">À compter du 3 août 2020 </h2> 
                            <div class="col-md-12 col-lg-12 m-t-25 p-r-30">
                                <p class="m-b-20" style="font-size: 20px;color:black;">
                                    Merci d'utiliser notre site commercial Basmah Work&Shop pour l'achat/vente Produit et offre/consulter et postuler Demande d'emploie. Nous sommes heureux que vous soyez ici. Veuillez lire attentivement ces conditions d'utilisation avant d'accéder ou d'utiliser BWS. Parce qu'il s'agit d'un contrat si important entre nous et nos utilisateurs, nous avons essayé de le rendre aussi clair que possible. Pour votre commodité, nous avons présenté ces conditions dans un bref résumé non contraignant suivi des conditions juridiques complètes. Si vous n'acceptez pas nos conditions d'utilisation, vous ne pouvez pas crée un compte BWS.
                                </p>
                                
                                <ul style="list-style-type: disc;font-size: 20px;color:black;">Pour les conditions qui sont doivent respecter par vous se sont:
                                    
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Votre compte sa sera déconnecté automatiquement au délai de 48h.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Après la déconnexion votre panier sera vidé. </li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Votre demande ou commande non terminé seront annulées.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Nous somme pas responsable de la livraison dans le cas de le produit n'est parvenu, et une fausse demande d'emploi .</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Un seul numéro de téléphone/ou adresse e-mail pour créer seulement un compte.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;"> Vous avez le droit pour signaler des produits/annonces emplois dans le cas de contenu illégale et vendeurs/employeurs .</li>
                                    
                                    
                                </ul>

                            </div>

                        </div>


                        
                    </div>

                </div>
                <div class="row" v-if='vendeur'>
                    
                      <div class="col-md-12 col-lg-12 p-b-40 p-r-30" >
                        <div class="col-md-12 col-lg-12 p-r-30 m-l-30">
                            <h2 style="color:red">À compter du 3 août 2020 </h2> 
                            <div class="col-md-12 col-lg-12 m-t-25 p-r-30">
                                <p class="m-b-20" style="font-size: 20px;color:black;">
                                    Merci d'utiliser notre site commercial Basmah Work&Shop pour l'achat/vente Produit et offre/consulter et postuler Demande d'emploie. Nous sommes heureux que vous soyez ici. Veuillez lire attentivement ces conditions d'utilisation avant d'accéder ou d'utiliser BWS. Parce qu'il s'agit d'un contrat si important entre nous et nos utilisateurs, nous avons essayé de le rendre aussi clair que possible. Pour votre commodité, nous avons présenté ces conditions dans un bref résumé non contraignant suivi des conditions juridiques complètes. Si vous n'acceptez pas nos conditions d'utilisation, vous ne pouvez pas crée un compte BWS.
                                </p>
                                
                                <ul style="list-style-type: disc;font-size: 20px;color:black;">Pour les conditions qui sont doivent respecter par vous se sont:
                                    
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Votre compte sa sera déconnecté automatiquement au délai de 48h.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Vos produits seront publié dans notre site si le payement est fait.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Le client a la possibilité de signaler vos produits si sont illégal. si le produit a était signalé 3 fois ou plus ce dernier sera supprimé.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Le client a la possibilité de vous signaler, et votre compte sera désactivés si vous avez 5 signal. Dans le cas de désactivation du compte vous devez contacter l'admis pour le récupérer.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Un seul numéro de téléphone/ou adresse e-mail pour créer seulement un compte.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Il existe 3 types de livraison, et vous avez le droit de choisir ce qui vous convient .</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Si vous avez la possibilité de faire la livraison, vous devais ajoutez le tarif à chaque ville, si vous n’avais pas l’ajouté nous devons compté que le tarif est 0DA .</li>
                                    
                                    
                                </ul>

                            </div>

                        </div>


                        
                    </div>

                </div>
                <div class="row" v-if='employeur'>
                     <div class="col-md-12 col-lg-12 p-b-40 p-r-30" >
                        <div class="col-md-12 col-lg-12 p-r-30 m-l-30">
                            <h2 style="color:red">À compter du 3 août 2020 </h2> 
                            <div class="col-md-12 col-lg-12 m-t-25 p-r-30">
                                <p class="m-b-20" style="font-size: 20px;color:black;">
                                    Merci d'utiliser notre site commercial Basmah Work&Shop pour l'achat/vente Produit et offre/consulter et postuler Demande d'emploie. Nous sommes heureux que vous soyez ici. Veuillez lire attentivement ces conditions d'utilisation avant d'accéder ou d'utiliser BWS. Parce qu'il s'agit d'un contrat si important entre nous et nos utilisateurs, nous avons essayé de le rendre aussi clair que possible. Pour votre commodité, nous avons présenté ces conditions dans un bref résumé non contraignant suivi des conditions juridiques complètes. Si vous n'acceptez pas nos conditions d'utilisation, vous ne pouvez pas crée un compte BWS.
                                </p>
                                
                                <ul style="list-style-type: disc;font-size: 20px;color:black;">Pour les conditions qui sont doivent respecter par vous se sont:
                                    
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Votre compte sa sera déconnecté automatiquement au délai de 48h.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Le client a la possibilité de signaler vos annonces d'emplois si sont illégal. si l’annonce a était signalé 3 fois ou plus cette derniere sera supprimé. </li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Le client a la possibilité de vous signaler, et votre compte sera désactivés si vous avez 5 signal. Dans le cas de désactivation du compte vous devez contacter l'admis pour le récupérer. </li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Vos annonces d'emplois seront publié dans notre site si le payement est fait.</li>
                                        <li class="m-l-30" style="list-style-type: disc;font-size: 20px;color:black;">Un seul numéro de téléphone/ou adresse e-mail pour créer seulement un compte.</li>
                                    
                                    
                                </ul>

                            </div>

                        </div>


                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
var currentTab = 0;
showTab(currentTab,1); 
function showTab(n,perv) {

  var x = document.getElementsByClassName("tab");
  var select = document.getElementById('exampleFormControlSelect1');
  var options = select.getElementsByTagName('option');
  var cmpt = options[select.selectedIndex].value;
  x[n].style.display = "block";
  if (cmpt==1 || cmpt==2 || cmpt==3){//ki nersa 3la cree compte w tkoun kayna error ki yredni system f register swalah ghi yetbedlo ye9o3do baynin 3la 7sab typeCompte
      onChange();
  }
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById('nextBtn').disabled = true; 
    document.getElementById("nextBtn").style.background = "#ddd";
    document.getElementById("nextBtn").innerHTML = "Creer Compte";
  } 
  else if(n == 0 && perv==1 && cmpt==2){
    document.getElementById('nextBtn').disabled = false; 
    document.getElementById("nextBtn").innerHTML = "Suivant";
    document.getElementById('check2').checked = false;
  }
  else if(n == 0 && perv==1 && cmpt!=2){
    document.getElementById('nextBtn').disabled = true; 
    document.getElementById("nextBtn").innerHTML = "Creer Compte";
  }
  else {
    document.getElementById('nextBtn').disabled = false; 
    document.getElementById("nextBtn").innerHTML = "Suivant";
    document.getElementById("nextBtn").style.background = "#13c940";
  }

  fixStepIndicator(n);
}

function nextPrev(n,prev) {
    var select = document.getElementById('exampleFormControlSelect1');
    var options = select.getElementsByTagName('option');
    var cmpt = options[select.selectedIndex].value;
    validateForm();
    if(cmpt==1 || cmpt==3 || cmpt=="") {
        document.getElementById("regForm").submit();
        return false;
    }

    
  var x = document.getElementsByClassName("tab");

  if(currentTab != x.length-1 && prev==1){
    x[currentTab].style.display = "none";
  }
  else if(prev==-1){
    x[currentTab].style.display = "none";
  }

  currentTab = currentTab + n;
  if (currentTab >= x.length) {

    document.getElementById("regForm").submit();
    return false;
  }

    showTab(currentTab,n); 
}

function validateForm() {

  var  valid = true;

  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; 
}

function fixStepIndicator(n) {

  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }

  x[n].className += " active";
}

function onChange() {
    var select = document.getElementById('exampleFormControlSelect1');
    var options = select.getElementsByTagName('option');
    var cmpt = options[select.selectedIndex].value;
    var v = document.getElementsByClassName("openV");
    var e = document.getElementsByClassName("openE");
    var c = document.getElementsByClassName("openC")
    var v_nextPrevious = document.getElementById("nextPrevious");
    if(cmpt==0){
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("stepp").style.display = "none";
    }
    if(cmpt==2){
        document.getElementById('check1').checked = false;
        document.getElementById('check3').checked = false;
        document.getElementById("stepp").style.display = "block";
        document.getElementById("nextBtn").innerHTML = "Suivant";
        document.getElementById("nextPrevious").className = "flex-t";
        document.getElementById("nextBtn").style.background = "#13c940"; 
        document.getElementById('nextBtn').disabled = false;    
        v[0].style.display= "flex";
        v[1].style.display= "block";
        v[2].style.display= "block";
        e[0].style.display= "none";
        e[1].style.display= "none";
        e[2].style.display= "none";
        c[0].style.display= "none";

    }
    else if(cmpt==1) {
        document.getElementById('check2').checked = false;
        document.getElementById('check3').checked = false;
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("nextBtn").style.background = "#ddd";
       document.getElementById('nextBtn').disabled = true;
        c[0].style.display= "block";
        v[0].style.display= "none";
        v[1].style.display= "none";
        v[2].style.display= "none";
        e[0].style.display= "none";
        e[1].style.display= "none";
        e[2].style.display= "none";

    }
    else if(cmpt==3) {
        document.getElementById('check2').checked = false;
        document.getElementById('check1').checked = false;
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("nextBtn").style.background = "#ddd";
        document.getElementById('nextBtn').disabled = true;
        v[0].style.display= "none";
        v[1].style.display= "none";
        v[2].style.display= "none";
        e[0].style.display= "flex";
        e[1].style.display= "block";
        e[2].style.display= "block";
        c[0].style.display= "none";

    }

}

function selectAll(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
function openSubmit(idCheck){ 

  if(document.getElementById('check1').checked == true && idCheck == 1){ 
      document.getElementById('nextBtn').disabled = false; 
      document.getElementById("nextBtn").style.background = "#ca2323";
  }
  else if(document.getElementById('check1').checked == false && idCheck == 1){
      document.getElementById('nextBtn').disabled = true; 
      document.getElementById("nextBtn").style.background = "#ddd";
  }
  if(document.getElementById('check2').checked == true  && idCheck == 2){ 
      document.getElementById('nextBtn').disabled = false; 
      document.getElementById("nextBtn").style.background = "#ca2323";
  }
  else if(document.getElementById('check2').checked == false && idCheck == 2){
      document.getElementById('nextBtn').disabled = true;
      document.getElementById("nextBtn").style.background = "#ddd";
  }
  if(document.getElementById('check3').checked == true && idCheck == 3){ 
      document.getElementById('nextBtn').disabled = false;
      document.getElementById("nextBtn").style.background = "#ca2323";
  }
  else if(document.getElementById('check3').checked == false && idCheck == 3){
      document.getElementById('nextBtn').disabled = true; 
      document.getElementById("nextBtn").style.background = "#ddd";
  }
}
</script>
<style>


#regForm {
  background-color: #ffffff;
  font-family: Raleway;
}

.tab {
  display: none;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

#nextBtn {
  background-color:#ca2323;
  color:white;
}

#nextBtn[disabled]{
        cursor: not-allowed;
        pointer-events: none;
        color: #c0c0c0;
        background-color: #ddd;
        background: #ddd;
}

.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

.step.finish {
  background-color: #4CAF50;
}
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script>
     window.Laravel=<?php echo json_encode([
      'csrftoken'   =>csrf_token(),
      'url'    =>url('/')
      ]); ?>

</script>

<script >
     var app = new Vue({

    el: '#app',
    data:{
      villes : [],
      client: false,
      vendeur: false,
      employeur: false,             

 /*event.target.value  pour recuperé */      
    },methods:{
        openCondition($type){
            if($type == 'c'){
                this.client = true;
                this.vendeur = false;
                this.employeur = false;
            }
            else if($type == 'v'){
                this.vendeur = true;
                this.client = false;
                this.employeur = false;
            }
            else if($type == 'e'){
                this.employeur = true;
                this.client = false;
                this.vendeur = false;
            }
        },
        getVille() {
            axios.get(window.Laravel.url+"/getville")
            .then(response => {
                this.villes = response.data;

            })
            .catch(error =>{
                console.log("errors",error)
            })
        }

    },
    mounted:function(){
        this.getVille();
    }
    
  });

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/auth/register.blade.php ENDPATH**/ ?>