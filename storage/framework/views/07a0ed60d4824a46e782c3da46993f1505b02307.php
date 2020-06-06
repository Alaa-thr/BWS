

<?php $__env->startSection('content'); ?>

      <head>
          <title><?php echo e(( 'Vendeur ')); ?></title>
      </head>
      <div class="main-panel" id="main-panel">
     

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app" >
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Vendeur</h4>
              </div>
              <div class="card-body" >
                <div class="table-responsive" style="height: 620px;">
                  <table class="table" >
                    <thead class=" text-primary">
                      <th><b>Indice</b></th>
                      <th ><b>Nom_Prenom</b></th>
                      <th ><b> N°Téléphone</b></th>
                      <th ><b>Email</b></th>
                      <th></th>
                      <th></th>
                    </thead>
                    <tbody>
                      <tr v-for="vendeura in vendeuradmin">
                        <td>{{vendeura.id}}</td>

                        <td>{{vendeura.Nom}} {{vendeura.Prenom}}</td>
                        <td >{{vendeura.numTelephone}}</td>
                        <td >{{vendeura.email}}</td>
                        <td  class="dropdown " id="k">
                            <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsAdmin/img/menu.png" alt="..." id="k1">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: -10px; margin-right: -10px;">
                              <a class="dropdown-item js-show-modal1" href="#" id="k2" v-on:click="AfficherInfo(vendeura.id)">Details</a>
                                <a class="dropdown-item" href="#" id="k2" v-on:click="deleteVendeur(vendeura)">Supprimer</a>
                            </div>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div>
                   <?php echo e($vendeur->links()); ?>

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
</div>
<!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-if="hideModel">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent"  style="width: 985px;" v-for="vendeuraa in vendeuradmin2">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE"  v-on:click="CancelVend()">
          </button>
          <section class=" creat-article " style="margin-top: 50px;">
            <div class="container-creat-article">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin-left: -60px; margin-top: -20px;">
                    <div class="card card-user" >
                      <div class="image">
                        <img src="assetsClient/img/input/bg5.jpg" alt="...">
                      </div>
                      <div class="card-body" >
                          <div class="author">
                            <a href="#">
                              <img class="avatar border-gray" src="assetsClient/img/input/profil_img.jpg" alt="..."/>
                            </a>
                            <h5 class="title cl13">{{ vendeuraa.Nom }} {{ vendeuraa.Prenom }}
                            </h5>
                          </div>
                          <div style="margin-top: 30px;">
                            <hr>
                          </div>
                           <div class="row">
                            <div class=" title" style="margin-left: 20px; margin-top: 50px;">Email</div>
                            <div class="title" style="margin-top: 50px; margin-left: 35px;">:</div>
                            <div class="author" style="margin-left: 10px; color:black; margin-top: 50px;"><b>{{ vendeuraa.email }}</b></div>
                          </div>
                          <div class="row" >
                            <div class=" title" style="margin-left: 20px; margin-top: 40px;">Numero</div>
                            <div class="title" style="margin-top: 40px; margin-left: 20px;">:</div>
                            <div  style="margin-left: 10px; color:black; margin-top: 40px; height: 70px;"><b>{{ vendeuraa.numTelephone }}</b></div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <table>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -350px;">
                          Crée Le
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -350px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -350px; color: red;">
                          {{ vendeuraa.created_at }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -300px;">
                          Adresse
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -300px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -300px;">
                          {{ vendeuraa.Addresse }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -250px;">
                          Boutique
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -250px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -250px;">
                          {{ vendeuraa.Nom_boutique }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -200px;">
                          N° Compte BNQ
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -200px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -200px;">
                          {{ vendeuraa.Num_Compte_Banquaire }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -150px;">
                          abonnements
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -150px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -150px;">
                          {{ vendeuraa.Nbre_abbon}}
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </section>    
        </div>
      </div>
    </div>

    <!-- Modal1 for laptob-->
    
 

  <?php $__env->stopSection(); ?>

  <?php $__env->startPush('javascripts'); ?>



<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                  'vendeur' => $vendeur,  //vendeur connecté
                'url'      => url('/')  
          ]); ?>;
</script>

<script>
  var app2 = new Vue({
     el: '#app2',
     data:{
        vendeuradmin2: [],
        hideModel: false,
        detailsV:{
          idV: 0,
          
        },
     },
     methods: {
           details_vendeur: function(){
             axios.post(window.Laravel.url+'/detailsvendeur',this.detailsV)

            .then(response => {
                 this.vendeuradmin2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      CancelVend: function(){
        this.hideModel = false;
      },
       
    },
   });
   var app = new Vue({

    el: '#app',
    data:{
        
        vendeuradmin:[],           
      },
    methods: {
      vendeur_admin: function(){
        axios.get(window.Laravel.url+'/vendeur')

            .then(response => {
                 this.vendeuradmin = window.Laravel.vendeur.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      AfficherInfo: function($id){
        app2.hideModel=true;
        app2.detailsV.idV= $id;
        app2.details_vendeur();
      },
      deleteVendeur:function(vend){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De supprimer ce vendeur ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/deletvendeur/'+vend.id) 
                     .then(response =>{
                         if(response.data.etat){  
                             var position = this.vendeuradmin.indexOf(vend);
                             this.vendeuradmin.splice(position,1);
                         }
                         
                      })
                     .catch(error => {
                        console.log(error)
                     })
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success',
                    )
                  }
                })
          
            
        },
    },
    created:function(){
      this.vendeur_admin();
    }
  });
   
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/vendeur_admin.blade.php ENDPATH**/ ?>