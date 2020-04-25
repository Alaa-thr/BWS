<?php $__env->startSection('content'); ?>

    <head>
        <title><?php echo e(( 'Cree Compte')); ?></title>
    </head>
 <!--*******************************************************************************************************-->
 <div class="container">
     <section class="creat-count " >
        <div  class=" container " style="padding: 8%;">
            <div class="m-b-50 ">
                <span class="mtext-111 cl13">Créer Compte</span>
                <br>
                <p class="m-t-4" style="font-size: smaller">C'est simple et rapide.</p>
            </div>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30" id="nom" name="nom" type="text" placeholder="Nom" >
                    <input class="form-control form-control-lg" id="prenom" type="text" name="prenom"placeholder="Prenom" >
                 </div>
                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30  <?php $__errorArgs = ['numTelephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="numTelephone" value="<?php echo e(old('numTelephone')); ?>" id="numtlf" type="text" placeholder="Numero Telephone" >

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

                    <input class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" id="email" name="email" type="email" placeholder="@email" >

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
                <div class="form-group m-b-35">
                    <input class="form-control form-control-lg m-r-30 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mtps" type="password" placeholder="mot de passe" name="password" >
                    
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
                    <select class="form-control form-control-lg m-r-30" id="exampleFormControlSelect1" name="ville">
                      <option selected>Choisir une ville</option>
                      <option name="13">Tlemcen</option>
                      <option value="16">Alger</option>
                      <option value="31">Oran</option>
                      <option value="22">Sidi Bel Abbes</option>
                      <option value="5">Batna</option>
                    </select>
                    <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="compte">
                        <option selected>Connecté tant que</option>
                        <option>Client</option>
                        <option>Vendeur</option>
                        <option>Employeur</option>
                    </select>
                </div>
                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30 " id="nom_btq" type="text" placeholder="Nom de Boutique" name="Nom_boutique">
                    <input class="form-control form-control-lg " id="nom_btq"  name="Num_Compte_Banquaire" type="text" placeholder="Numero Compte Bancaire" > 
                </div>
                <div class="form-group m-b-35">
                    <input class="form-control form-control-lg" id="addrsse_btq" name ="addrsse_botique" type="text" placeholder="Addresse de Boutique">                      
                </div>
                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30 " id="nom_btq" name="nom_societe" type="text" placeholder="Nom de Société">
                    <input class="form-control form-control-lg " id="nom_btq" name="num_compte_banquiare" type="text" placeholder="Numero Compte Bancaire" >                   
                </div>
                <div class="form-group m-b-65">
                    <input class="form-control form-control-lg" id="addrsse_soct" name="addrsse_soct" type="text" placeholder="Addresse de Société" >                       
                </div>
                <div class="form-group row mb-0">
                    <button type="submit" class="btn-lg btn-block" style="background-color:#ca2323;color:white">Connexion</button>
                </div>
                
            </form>
        </div>
    </section>
</div>
    <!--*******************************************************************************************************-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Basmahws_Alaâ\resources\views/auth/register.blade.php ENDPATH**/ ?>