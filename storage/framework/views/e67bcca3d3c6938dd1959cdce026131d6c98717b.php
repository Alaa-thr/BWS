
<?php $__env->startSection('content'); ?>
<title>Basmah.ws</title>
<div class="container" style="margin-top:10%;" id='app39'>
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="alert alert-success" role="alert" v-show='showAlert'>
              Nous avons envoyé un code.
            </div>
            <div class="card">
                <div class="card-header">Confirmation de Numéro Téléphone</div>

                <div class="card-body">
                    <form method="POST" action='\number_confirm' >
                      <?php echo csrf_field(); ?>


                        <div class="form-group row" >
                            <label for="number_confirm" class="col-md-4 col-form-label text-md-right">Entrer le code</label>

                            <div class="col-md-6">
                                <input id="number_confirm" type="text" class="form-control <?php $__errorArgs = ['number_confirm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> m-b-10" name="number_confirm" value="<?php echo e($number_confirm ?? old('number_confirm')); ?>" required autocomplete="number_confirm" autofocus>

                                <?php $__errorArgs = ['number_confirm'];
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
                                <a href="#" @click  ='sendSms'>Envoyer le code une autre fois</a>
                            </div>
                            
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Confirmer')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var app39 = new Vue({
         el : "#app39",
         data:{
            showAlert: false,
         },
         methods:{
            sendSms: function(){
                axios.get(window.Laravel.url+"/sendsms")
                .then(response => {
                    this.showAlert = true; 
                })
                .catch(error =>{
                    console.log("errors",error)
                })
            },
            
       }
    })

   </script> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/confirm_number.blade.php ENDPATH**/ ?>