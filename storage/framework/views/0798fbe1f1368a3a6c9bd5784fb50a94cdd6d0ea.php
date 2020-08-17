


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
                                                 
                                                          
                                                          
                                                 
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation" >
    <form  action="/notificationS" method="get" id="sbmt" name='sbmt'>
        <div class="input-group no-border"  style="left: -40px;">
          <input type="search" name="search"  class="form-control" placeholder="Rechercher..." >
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="now-ui-icons ui-1_zoom-bold" onclick="document.forms['sbmt'].submit();"></i>
            </div>
          </div>
        </div>
    </form>
    <ul class="navbar-nav" >
      <li>
          <div style="margin-top: 10px; margin-right: 10px;">
              <div id="google_translate_element"></div>                       
          </div>
        </li>
    <li class="nav-item dropdown" style="cursor: pointer; margin-right: 40px;">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="img-xs rounded-circle"  src="<?php echo asset('storage/profil_image/'.$admin->image) ?>" alt="..."  />
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
                  <img class="img-lg rounded-circle" src="<?php echo asset('storage/profil_image/'.$admin->image) ?>" alt="..."> 
              </a>
            </td>
            <td>
                <h6 class="description text-left" ><b id="a"> <?php echo e($admin->nom); ?> <?php echo e($admin->prenom); ?></b></h6><a href ="<?php echo e($admin->email); ?>" id ="nab"><?php echo e($admin->email); ?></a>
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
      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="n">
        <i class="now-ui-icons media-1_button-power" id="m"></i><?php echo e(__('Déconnexion')); ?> </a>
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
            <div class="card col-md-12">
              <div class="card-header col-md-12" style="display: flex;">
                <div class="col-md-8" style=" display: flex; margin-left: 7px;">
                  <input type="checkbox" id="notification" @change="selectAll()" v-model="allSelected" style="">
                  <label for="notification"></label>
                  <h4 style="margin-top: -6px; margin-left: 5px;">Notifications</h4>
                </div>
                <div class="col-md-2" style="float: right; margin-top: -13px">  
                  <button v-if="suppr" class="btn btn-sm btn-danger  btn-block" style=" border-radius: 0.8em; height: 35px; "  v-on:click="deleteArrayNotif()"><b>supprimer</b></button>
                </div>
                <div class="col-md-2" style=" margin-top: -13px">
                  <button v-if="suppr" class="btn btn-sm btn-warning btn-block" style="border-radius: 0.8em; height: 35px; " v-on:click="AnnulerSel" ><b>Annuler</b></button>
                </div>
              </div>
              <hr >
              <div class="card-body col-md-12">
                <?php
                    $url = Route::getCurrentRoute()->uri();
                ?>
                <div class="col-md-12" v-if="notifications.length == 0 && '<?php echo $url?>'.includes('notificationS') == true" style="text-align: center; margin-bottom: 40px">
                          <span>Cette Recherche n'a pas de Résultats</span>
                </div>
                <div v-if="notifications.length != 0 " class=" col-md-12" v-for="noti in notifications" >
                     
                      <div class="col-md-12" style="display: inline-flex;">
                          
                          <div class="col-md-1" v-if="selectall">
                            <input type="checkbox" :id="noti.id" :value="noti.id" v-model="checkedNotif" @change="changeButton(noti)">
                            <label :for="noti.id"></label>
                          </div>
                          <div class="col-md-1" v-else>
                            <input type="checkbox" :id="noti.id" :value="noti.id" v-model="notificationIds"  @change="deselectNotif(noti.id)">
                            <label :for="noti.id"></label>
                          </div>
                          <div v-if="noti.paiement_employeur_id  != null && noti.paiement_vendeur_id == null && noti.admin_id == null && noti.paiment_par =='a'" class="col-md-10" style="color: black">
                               L'employeur <b>{{noti.nom_empl.toUpperCase()}} {{noti.prenom_empl.toUpperCase()}}</b> a demandé de l'acceptation de ces annonces, son numéro de banque: <b>{{noti.num_compte_banquiare.toUpperCase()}}</b> par <b>Annonce</b>
                          </div>
                          <div v-if="noti.paiement_employeur_id  != null && noti.paiement_vendeur_id == null && noti.admin_id == null && noti.paiment_par =='m'" class="col-md-10" style="color: black">
                               L'employeur <b>{{noti.nom_empl.toUpperCase()}} {{noti.prenom_empl.toUpperCase()}}</b> a demandé de l'acceptation de ces annonces, son numéro de banque: <b>{{noti.num_compte_banquiare.toUpperCase()}}</b> par <b>Mois</b>
                          </div>
                          <div v-if="noti.paiement_vendeur_id  != null && noti.paiement_employeur_id == null && noti.admin_id == null" class="col-md-10" style="color: black">
                               Le Vendeur <b>{{noti.nom_vendeur.toUpperCase()}} {{noti.prenom_vendeur.toUpperCase()}}</b> a demandé de l'acceptation de ces produits, son numéro de banque: <b>{{noti.Num_Compte_Banquaire.toUpperCase()}} </b>
                          </div>   
                          <div v-if="noti.admin_id != null && noti.paiement_employeur_id  == null && noti.paiement_vendeur_id == null  && noti.sous_categorie_libelle != null " class="col-md-10" style="color: black">
                               L'admin <b>{{noti.nom.toUpperCase()}} {{noti.prenom.toUpperCase()}}</b> a supprimer la sous-catégorie '&nbsp<b>{{noti.sous_categorie_libelle}}</b>&nbsp' de catégorie <b>{{noti.categorie_libelle}}</b> et type <b>{{noti.typeCategoSousCatego}}</b>
                          </div>
                          <div v-if="noti.admin_id != null && noti.paiement_employeur_id  == null && noti.paiement_vendeur_id == null  && noti.sous_categorie_libelle == null " class="col-md-10" style="color: black">
                               L'admin <b>{{noti.nom.toUpperCase()}} {{noti.prenom.toUpperCase()}}</b> a supprimer catégorie '&nbsp<b>{{noti.categorie_libelle}}</b>&nbsp' de type <b>{{noti.typeCategoSousCatego}}</b>
                          </div>
                          <div  class="col-md-1 dropdown" style="cursor: pointer;">
                              <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                                        <i class="fas fa-ellipsis-v"  ></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right"  >
                                  <a class="dropdown-item" v-on:click="deleteNotification(noti)"
                                      style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
                                      Supprimer</a>
                              </div>
                               
                              
                          </div>
                      </div>
                    <hr>
                  </div>
                 <?php echo e($notif->links()); ?>

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
            </script>, Designer par <a href="https://www.invisionapp.com" target="_blank">BS</a>. Codé par <a href="https://www.creative-tim.com" target="_blank">BASMAHW&S</a>.
          </div>
        </div>
      </footer>
    </div>
  
  <!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " style="">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" style="width: 985px;">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1"  >
            <img src="images/icon-close.png" alt="CLOSE" >
          </button>
          <div class="p-b-30 p-l-40">
            <h4 class=" cl2">
              Commande de Tahraoui Alaâ
            </h4>
          </div>
  
          
        </div>
      </div>
    </div>

    
 <?php $__env->stopSection(); ?>

 <?php $__env->startPush('javascripts'); ?>
 
 <script >
   window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
               'notif' => $notif,
                'notifA' => $notifA,
                'notifV' => $notifV,
                'notifE' => $notifE,  
                'url'      => url('/')  
          ]); ?>;
 </script>

 <script >
   function initDashboardPageCharts(){}
   var app = new Vue({
      el: '#app',
      data:{
         notifications: [],
         selectall: true,
         suppr: false,
         checkedNotif: [],
         allSelected: false,
         notificationIds: [],
         NotificationsDelete: [],
      },
      methods:{
      
        getNotifications:function(){
          var j=0;
          axios.get(window.Laravel.url+'/notificationsAdmin/')
            .then(pagination => {
              console.log(",window.Laravel.notifE",window.Laravel.notifE)
              window.Laravel.notif.data.forEach(key=>{
                  if(key.admin_id!=null){
                    window.Laravel.notifA.forEach(key1=>{
                        if(key1.admin_id == key.admin_id && key1.categorie_libelle==key.categorie_libelle && key1.typeCategoSousCatego==key.typeCategoSousCatego && key1.sous_categorie_libelle==key.sous_categorie_libelle){
                          this.notifications.push(key1)
                        }
                    })
                  }

                  if(key.paiement_vendeur_id !=null){
                    window.Laravel.notifV.forEach(key1=>{
                        if(key1.paiement_vendeur_id  == key.paiement_vendeur_id ){
                          this.notifications.push(key1)
                        }
                    })
                    
                  }
                  if(key.paiement_employeur_id !=null){
                    for (var i = j; i < window.Laravel.notifE.length; i++) {
                      console.log("1")
                      if(key.paiement_employeur_id  == window.Laravel.notifE[i].paiement_employeur_id ){
                         console.log("2")
                          this.notifications.push(window.Laravel.notifE[i])
                          i = window.Laravel.notifE.length;
                          j++;
                        }
                    }
                    
                  }

              })
              console.log("1,this.notifications",this.notifications)
                 
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        }, 
        selectAll:function(){
            this.selectall = false;
            if (this.allSelected) {
                for (user in this.notifications) {
                    this.notificationIds.push(this.notifications[user].id);
                    this.NotificationsDelete.push(this.notifications[user]);
                }
                this.suppr=true;
             }
             else{
              this.notificationIds = [];
              this.NotificationsDelete= [];
              this.suppr=false;
              this.selectall = true;
              this.checkedNotif = [];
            }
        },
        deselectNotif: function(notifId){
             this.NotificationsDelete.forEach(key => {
                  if(key.id == notifId){
                      var position = this.NotificationsDelete.indexOf(key);
                      this.NotificationsDelete.splice(position,1);                    
                  } 
            });             
      },
        changeButton: function(n){
              if(this.checkedNotif.length > 0){
                this.suppr=true;
                this.NotificationsDelete.unshift(n);
              }
              else{
                this.NotificationsDelete = [];
                this.suppr=false;
                
              } 
              if(this.checkedNotif.length < this.NotificationsDelete.length){
                this.deselectNotif(n.id)
              } 
      },
      deleteArrayNotif:function(){
            if(this.NotificationsDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucune Notification a supprimer!',

              }).then((result) => {
                this.allSelected = false;
                this.suppr=false;
                this.selectall = true;
               
             })
              
            }
            else if(this.NotificationsDelete.length == 1){
                Swal.fire({
                  title: 'Etes vous sure de supprimer cette Notification?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.NotificationsDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deletenotification/'+key.id)
                          .then(response => {
                            if(response.data.etat){             
                                      var position = this.notifications.indexOf(key);
                                      this.notifications.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelected = false;
                          this.checkedNotif.length = [];
                          this.suppr=false;
                          this.NotificationsDelete = [];
                          this.selectall = true;

                    Swal.fire(
                      'Effacé!',
                      'Votre Notification a été supprimé.',
                      'success'
                    )
                  }
                  
                  })

            }
            else{
                Swal.fire({
                  title: 'Etes vous sure de supprimer cette Notification?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.NotificationsDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deletenotification/'+key.id)
                          .then(response => {
                            if(response.data.etat){            
                                      var position = this.notifications.indexOf(key);
                                      this.notifications.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelected = false;
                          this.checkedNotif.length = [];
                          this.suppr=false;
                          this.NotificationsDelete= [];
                          this.selectall = true;

                    Swal.fire(
                      'Effacé!',
                      'Vos Notifications ont été supprimées.',
                      'success'
                    )
                  }
                  
                  })

            }
            
      },
       AnnulerSel: function(){
            this.notificationIds.length = [];
            this.checkedNotif.length = [];
            this.changeButton(null);
            this.selectall = true;
            this.allSelected = false;
      },
      deleteNotification:function(n){
                Swal.fire({
                  title: 'Etes vous sure de supprimer cette Notification?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {

                  if (result.value) {
                    axios.delete(window.Laravel.url+'/deletenotification/'+n.id) 
                     .then(response =>{
                         if(response.data.etat){
                                 
                             var position = this.notifications.indexOf(n);
                             this.notifications.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log(error)
                     })
                    Swal.fire(
                      'Effacé!',
                      'Votre notification a été supprimé.',
                      'success'
                    )
                  }

                })
          
            
      },
    },
      created:function(){ 
        this.getNotifications();
      },

   });

 </script>
 
 <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/notifications_admin.blade.php ENDPATH**/ ?>