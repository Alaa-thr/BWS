

<?php $__env->startSection('content'); ?>

	<head>
		<title><?php echo e(( 'Commande Reçu')); ?></title>
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
            <a class="navbar-brand" href="#pablo">Commandes Reçus </a>
          </div>
        </div>
     </nav>
     
     <div class="panel-header panel-header-sm">
     </div>

	<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Commande Reçus</h4>
              </div>  
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                      <h8 class="card-title">N°Commande</h8>
                      </th>
                      <th>
                         <h8 class="card-title"> Date commande</h8>
                      </th>
                      <th>
                       <h8 class="card-title"> Type livraison</h8>
                      </th>
                      <th>
                    <h8 class="card-title"> L'addresse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h8>
                      </th>
                     
                      
                    </thead>  
                
                    <tbody>
                      <tr>
                        <td>
                          Commande°1
                        </td>
                        <td>
                          12/12/2012
                        </td>
                        <td >
                          V->C
                        </td>
                        <td >
                          Oran rue larbie ben mhidi n°5
                        </td>
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsVendeur/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" >
                                <a class="dropdown-item" href="#" id="k2">Accepter</a>
                                <a class="dropdown-item" href="#" id="k2">refuser</a>
                            </div>
                        </td>
                   

                                           </tr>
                      
                      <tr> 
                        <td>
                          Commande°2
                        </td>

                        <td>
                          12/12/2012
                        </td>
                        <td>
                          V->L
                        </td>
                        <td >
                          BOUARFA CHETOUANE TLM
                        </td>
                       
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsVendeur/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" >
                                <a class="dropdown-item" href="#" id="k2">Accepter</a>
                                <a class="dropdown-item" href="#" id="k2">refuser</a>
                            </div>
                        </td>
                        <td>
                        </td>
                      </tr>
                      <tr> 
                        <td>
                          Commande°3
                        </td>

                        <td>
                          12/12/2012
                        </td>
                        <td>
                          V->L
                        </td>
                        <td >
                          OUZIDAN N°58  lkqds lqsj <pre></pre> TLM
                        </td>
                  
                       <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsVendeur/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" >
                                  <a class="dropdown-item" href="#" id="k2">Accepter</a>
                                <a class="dropdown-item" href="#" id="k2">refuser</a>
                            </div>
                        </td>
                        <td>
                        </td>
                      </tr>
                
                      <tr>
                        <td>
                          
                        </td>
                        <td>
                          
                        </td>
                        <td >
                          
                        </td>
                        <td >
                          
                        </td>
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsVendeur/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" >
                              <a class="dropdown-item" href="#" id="k2">Accepter</a>
                                <a class="dropdown-item" href="#" id="k2">refuser</a>
                        </td>
                        <td>
                        </td>
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
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Basmahws_Alaâ\resources\views/commande_recu_vendeur.blade.php ENDPATH**/ ?>