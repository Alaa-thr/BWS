
<?php $__env->startSection('content'); ?>

	
	<head>
		<title><?php echo e(( 'Favoris')); ?></title>
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
            <a class="navbar-brand" href="#pablo">Favoris </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
        <div class="content" id="pr">
     <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Favoris</h5>
            </div>
            <div class="card-body">
              <form>
                
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-user">
            
          </div>
        </div>
        
      </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/favoris_client.blade.php ENDPATH**/ ?>