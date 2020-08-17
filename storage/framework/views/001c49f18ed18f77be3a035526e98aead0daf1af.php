

<?php $__env->startSection('content'); ?>
  
    <head>
          <title><?php echo e(( 'Client_Recuperer ')); ?></title>
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
            <a class="navbar-brand" style="margin-left: 260px"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" >
          <form  action="/abestacR" method="get" id="sbmt" name='sbmt'>
              <div class="input-group no-border"  style="left: -40px;">
                <input type="search" name="search"  class="form-control" placeholder="Rechercher..." >
                <div class="input-group-append" >
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold" onclick="document.forms['sbmt'].submit();"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav" >
            <li class="nav-item dropdown" style="cursor: pointer; margin-right: 40px;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="img-xs rounded-circle" src=" <?php echo e(asset('storage/profil_image/'.$admin->image)); ?>" alt="..."  />
                  <p>
                    <span class="d-lg-none d-md-block">Quelques Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <div class="account-item clearfix js-item-menu">  
                    <div class="card-body">
                           
                        <a >
                          <table >
                            <tr>
                              <td width="50%">
                                  <a href="#">
                                  <img class="img-lg rounded-circle"  src=" <?php echo e(asset('storage/profil_image/'.$admin->image)); ?>" alt="..."> 
                              </a>
                              </td>
                              <td>
                                   <h6 class="description text-left" ><b id="a"><?php echo e($admin->nom); ?> <?php echo e($admin->prenom); ?></b></h6>
                                   <a href ="<?php echo e($admin->email); ?>" id ="nab"><?php echo e($admin->email); ?></a>
                               </td>
                             </tr>
                            </table>
                        </a>  
                    </div>
                    <div style="width: 255px; margin-left: 20px;"> 
                      <hr >
                     </div>
                      <a class="dropdown-item" href="<?php echo e(route('accueil')); ?>" id="n"><i class="now-ui-icons business_bank" id="m"></i><b>Allez vers Acceuil</b></a>
                      <a class="dropdown-item" href="<?php echo e(route('profilAdmin')); ?>" id="n"><i class="now-ui-icons users_single-02" id="m"></i><b>Profil</b></a>
                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" id="n">
                        <i class="now-ui-icons media-1_button-power" id="m"></i>
                        <?php echo e(__('Déconnexion')); ?> </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                        </form>
                  </div>
                </div> 
            </li>
              
            </ul>
          </div>
        </div>
      </nav>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header flex-t col-md-12">
                <h4 class="card-title col-md-4">Clients Recuperer</h4>
                <div class="col-md-8 m-t-10" >
                    <select class="form-control" onchange="window.location.href=this.value" style="border-radius: 0.8em; cursor: pointer;float: right;height: 40px;width: 250px;">
                      <option value="0" disabled="disabled">Recuperer les utilisateurs   :</option>
                      <option value="recupervendeur">Recuperer vendeurs</option>
                      <option value="recuperclient" selected="selected">Recuperer clients</option>
                      <option value="recupemployeur">Recuperer employeurs</option>
                      <option value="recuperadmin">Recuperer admins</option>
                      <option value="admin">Retour a la page admin</option>
                    </select>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive" style="height: 420px;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th >
                        <b >Indice</b>
                      </th>
                      <th >
                        <div style="margin-left: 30px;">
                          <b>Nom_Prenom</b>
                        </div>
                      </th>
                      <th >
                        <div style="margin-left: 50px;">
                          <b >N°Tel</b>
                        </div>
                      </th>
                      <th >
                        <div style="margin-left: 50px;">
                          <b >Email</b>
                        </div>
                      </th>
                      <th>
                        <div style="margin-left: 25px;">
                          <b>Ville</b>
                        </div>
                      </th>
                      <th>
                      </th>
                      <th>
                      </th>
                    </thead>
                     <?php
                      $url = Route::getCurrentRoute()->uri();
                    ?>
                    <tbody>
                      <tr v-if="clientsrecup.length == 0 && '<?php echo $url?>'.includes('abestacR') == true" > 
                        <td></td><td></td>
                        <td >

                          <small>Cette Recherche n'a pas de Résultats</small>
                        </td>
                         <td></td>
                         <td></td>
                         <td></td> 
                      </tr>

                      <tr v-if="clientsrecup.length != 0" v-for="cl in clientsrecup" style="cursor: pointer;">
                        <td>
                         {{ cl.id }}  
                        </td>
                        <td>
                          <div style="margin-left: 30px;">
                            {{ cl.nom }} {{ cl.prenom }} 
                          </div>
                        </td>
                        <td>
                          <div style="margin-left: 50px;">
                            {{ cl.numeroTelephone }} 
                          </div>
                        </td>
                        <td>
                          <div style="margin-left: 50px;">
                           	{{ cl.email}} 
                          </div>
                        </td>
                        <td >
                          <div style="margin-left: 25px;">
                           {{ cl.ville }}
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-block btn-warning" style="margin-left: 80px; width: 120px; border-radius: 0.5em;" v-on:click="recupConfirmerC(cl)">
                            <b> Recuperer </b>
                          </button>
                        </td>
                        <td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                   <?php echo e($client_recu->links()); ?>

                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>      
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  BASMAHW&S
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  A Propos
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Desinger par <a href="https://www.invisionapp.com" target="_blank">BS</a>. Codé par <a href="https://www.creative-tim.com" target="_blank">BASMAHW&S</a>.
          </div>
        </div>
      </footer>
    </div>
  
  <!--   Core JS Files   -->
  <!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
  
  <!--*****************************************************************************************************************************************************************************************************************************-->
 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>



<script>
  function initDashboardPageCharts(){}
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                'client_recu'  => $client_recu,  
                'url'      => url('/')  
          ]); ?>;
</script>
<script>
    var app = new Vue({

    el: '#app',
    data:{
        
        clientsrecup:[],           
      },
    methods: {
        recupeClient: function(){
        axios.get(window.Laravel.url+'/recuperclient')

            .then(response => {
                 this.clientsrecup = window.Laravel.client_recu.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      recupConfirmerC:function(rec){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De recuperer ce client ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: 'green',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, recuperer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/recupconfirmerc/'+rec.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.clientsrecup.indexOf(rec);
                             this.clientsrecup.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log('errors : ',error)
                     })
                    Swal.fire(
                      'Recuperé!',
                      'Votre client est recuperé',
                      'success',
                    )
                  }
                })
          
            
        },
    },
    created:function(){
      this.recupeClient();
    }
  });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/recup_client.blade.php ENDPATH**/ ?>