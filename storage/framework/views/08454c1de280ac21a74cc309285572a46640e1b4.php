
<?php $__env->startSection('content'); ?>

  
  <head>
    <title><?php echo e(( 'Notification')); ?></title>
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
            <a class="navbar-brand" href="#pablo">Notification </a>
          </div>
        </div>
    </nav>
    <div class="panel-header panel-header-sm">
    </div>


  <div class="content" id="pr">
         <div class="row"  >
            <div class="col-md-12" >
              <div class="card"  id="xc" style=" width: 1000px;"  >
                <div class="card-header">
                  <h5 class="titre" >Vos notification</h5>
                </div>
                
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                     
                    </thead>
                    <tbody>

 <!--historique 1-->
 <tr><td>
   

<form>
<i class="zmdi zmdi-account" ></i>    <label for="subscribeNews" class="description text-right"  > 
        <a class="dropdown-item " href="#" id="hn" >2h</a>
    </label>
    <label for="subscribeNews" >
        <a class="dropdown-item"   href="#" id="dn"  >  Vous etes envoyé la commande 1</a>
    </label>
</form>

  </tr>
                    <!--historique 2-->
                    <tr>
                 <td>
   

<form>
<i class="zmdi zmdi-account" ></i>    <label for="subscribeNews" class="description text-right"  > 
        <a class="dropdown-item " href="#" id="hn" >21h</a>
    </label>
    <label for="subscribeNews" >
        <a class="dropdown-item"   href="#" id="dn"  >  Vous etes envoyé la commande 2</a>
    </label>
</form>

  </tr>
  
   <!--historique 3-->

 <tr>
                 <td>
   

<form>
<i class="zmdi zmdi-account" ></i>   
 <label for="subscribeNews" class="description text-right"  > 
        <a class="dropdown-item " href="#" id="hn" >1j</a>
    </label>
    <label for="subscribeNews" >
        <a class="dropdown-item"   href="#" id="dn"  >  Vous etes envoyé la demande 1</a>
    </label>
</form>

  </tr>
   <!--historique 4-->

   <tr>
                 <td>
   

<form>
<i class="zmdi zmdi-account" ></i>    <label for="subscribeNews" class="description text-right"  > 
        <a class="dropdown-item " href="#" id="hn" >6j</a>
    </label>
    <label for="subscribeNews" >
        <a class="dropdown-item"   href="#" id="dn"  >  Vous etes envoyé la demande 2</a>
    </label>
</form>

  </tr>
                            
              <!--historique 5-->

              <tr>
                 <td>
   

<form>
<i class="zmdi zmdi-account" ></i>    <label for="subscribeNews" class="description text-right"  > 
        <a class="dropdown-item " href="#" id="hn" >21j</a>
    </label>
    <label for="subscribeNews" >
        <a class="dropdown-item"   href="#" id="dn"  >  Vous etes envoyé la demande 3</a>
    </label>
</form>

  </tr>
             
        </tbody>
                  </table>
                  <div class="pagination" >
                        <a href="#"> &laquo; </a>
                        <a href="#" class="active"> 1 </a>
                        <a href="#"> 2 </a>
                        <a href="#"> 3 </a>
                        <a href="#"> 4 </a>
                        <a href="#"> 5 </a>
                        <a href="#"> &raquo; </a>


                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Basmah.WS\resources\views/notification_client.blade.php ENDPATH**/ ?>