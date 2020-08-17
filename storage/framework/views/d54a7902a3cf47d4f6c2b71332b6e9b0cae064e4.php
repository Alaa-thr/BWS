
<?php $__env->startSection('content'); ?>
<head>
	<title><?php echo e(( 'Compte Désactivé')); ?></title>
</head>
<div class="bg0 m-t-23 p-b-60">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					
			</div>

			<div class="flex-w flex-c-m m-tb-10">
					
			</div>

		</div>
		<div class="m-t-60 col-md-12">
			<div class="col-md-12 txt-center">
				<div class="m-b-10" >
					<img src="<?php echo e(asset('images/attention.png')); ?>"style="height: 120px;width: 120px">
				</div>
				<div class="m-b-20">
					<h1>Oops...</h1>
				</div>
				<div>
					<h4>Votre compte a été désactivé. Pour plus d'information <a href="<?php echo e(route('contact')); ?>">contactez nous</a>. </h4>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/compte_desactive.blade.php ENDPATH**/ ?>