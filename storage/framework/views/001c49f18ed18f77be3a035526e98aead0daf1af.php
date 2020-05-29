

<?php $__env->startSection('content'); ?>
  
    <head>
          <title><?php echo e(( 'Client_Recuperer ')); ?></title>
      </head>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Clients Recuperer</h4>
                <div class="box " style="margin-left: 730px; margin-top: -40px;">
                    <select onchange="window.location.href=this.value">
                      <option>Recuperer les utilisateurs   :</option>
                      <option value="recupervendeur">Recuperer vendeurs</option>
                      <option value="recuperclient">Recuperer clients</option>
                      <option value="recupemployeur">Recuperer employeurs</option>
                      <option value="recuperadmin">Recuperer admins</option>
                      <option value="admin">Retour a la page admin</option>
                    </select>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive" style="height: 420px; margin-top: 55px;">
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
                    <tbody>
                      <tr v-for="cl in clientsrecup">
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
                      'succès',
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