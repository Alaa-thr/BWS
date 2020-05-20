
<style>


#regForm {
  background-color: #ffffff;
  font-family: Raleway;
}


/* Hide all steps by default: */
.tab {
  display: none;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
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

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
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

 /*event.target.value  pour recuperé */      
    },methods:{
        getVille() {
            axios.get(window.Laravel.url+"/getville")
            .then(response => {
                this.villes = response.data;
                 console.log("ssucces",response);
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
           
               
               

        <form id="regForm" method="POST" action="<?php echo e(route('register')); ?>">
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
unset($__errorArgs, $__bag); ?>" name="numTelephone" value="<?php echo e(old('numTelephone')); ?>" id="numtlf" type="text" placeholder="Numero Telephone*">

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
                            <option value="4" <?php echo e(old('compte') == 4 ? 'selected' : ''); ?>>Admin</option>

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
    </div>
  </div>
  <!--<div class="tab " style="border: 2px" >
    <div class="custom-checkbox m-b-20">
        <input type="checkbox" class="custom-control-input form-control m-t-2" value="" id="selectall" onclick="selectAll(this);" >
        <label class="custom-control-label p-l-25 " for="selectall" style="font-size: 20px" >Selectionner Tout :</label>
    </div>
   <div class="form-group m-b-35 m-l-50 " v-for="v in villes" style="display: inline-flex;">
                    <div class="custom-checkbox m-r-14" >
                        <input type="checkbox" class="custom-control-input form-control  <?php $__errorArgs = ['villeC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="v.id" :id="v.id" name="villeC[]" >
                        <label class="custom-control-label p-l-25 p-t-4" :for="v.id" >{{v.nom}}</label>
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
  </div>-->
    <div id="nextPrevious">
      <button type="button" id="prevBtn" onclick="nextPrev(-1,-1)" class="btn-lg m-t-8 btn-block m-r-30" style="background-color:#ca2323;color:white">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1,1)" class="btn-lg btn-block bg10" style="background-color:#ca2323;color:white">Creer Compte</button>
      
    </div>

  <div style="text-align:center;margin-top:40px; display: none;" id="stepp">
    <span class="step"></span>
    <span class="step"></span>
    <!--<span class="step"></span>-->
  </div>

</form>
   
        </div>
    </section>
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
  if (cmpt==2 || cmpt==3){
      onChange();
  }
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.background = "#13c940";
    document.getElementById("nextBtn").innerHTML = "Creer Compte";
  } 
  else if(n == 0 && perv==-1){
    document.getElementById("nextBtn").innerHTML = "Suivant";
  }
  else if(n == 0 && prev==1){
    document.getElementById("nextBtn").innerHTML = "Creer Compte";
  }
  else {
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
    if(cmpt==1 || cmpt==3 || cmpt==4 || cmpt=="") {
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
    var v_nextPrevious = document.getElementById("nextPrevious");
    if(cmpt==0){
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").style.background = "#ca2323";
    }
    if(cmpt==2){
        document.getElementById("stepp").style.display = "block";
        document.getElementById("nextBtn").innerHTML = "Suivant";
        document.getElementById("nextPrevious").className = "flex-t";
        document.getElementById("nextBtn").style.background = "#13c940";     
        v[0].style.display= "flex";
        v[1].style.display= "block";
        v[2].style.display= "block";
        e[0].style.display= "none";
        e[1].style.display= "none";
        e[2].style.display= "none";

    }
    else if(cmpt==1) {
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("nextBtn").style.background = "#ca2323";
        v[0].style.display= "none";
        v[1].style.display= "none";
        v[2].style.display= "none";
        e[0].style.display= "none";
        e[1].style.display= "none";
        e[2].style.display= "none";

    }
    else if(cmpt==3) {
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("nextBtn").style.background = "#ca2323";
        v[0].style.display= "none";
        v[1].style.display= "none";
        v[2].style.display= "none";
        e[0].style.display= "flex";
        e[1].style.display= "block";
        e[2].style.display= "block";

    }

}

function selectAll(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/auth/register.blade.php ENDPATH**/ ?>