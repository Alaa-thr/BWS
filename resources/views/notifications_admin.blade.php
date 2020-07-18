
@extends('layouts.template_admin')

@section('content')


    <head>
    <title>{{ ( 'Notification') }}</title>
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
                                                           <form  action="/abest" method="get">
                                                               <div class="input-group no-border"  style="left: -40px;">
                                                                 <input type="search" name="search"  class="form-control" placeholder="Rechercher..." >
                                                                 <div class="input-group-append">
                                                                   <div class="input-group-text">
                                                                     <i class="now-ui-icons ui-1_zoom-bold"></i>
                                                                   </div>
                                                                 </div>
                                                               </div>
                                                             </form>
                                                             <ul class="navbar-nav" >
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
                                                                                    <h6 class="description text-left" ><b id="a"> {{ $admin->nom }} {{ $admin->prenom }}</b></h6><a href ="{{ $admin->email }}" id ="nab">{{ $admin->email }}</a>
                                                                                </td>
                                                                              </tr>
                                                                             </table>
                                                                         </a>  
                                                                     </div>
                                                                     <div style="width: 255px; margin-left: 20px;"> 
                                                                       <hr >
                                                                      </div>
                                                                       <a class="dropdown-item" href="{{ route('accueil') }}" id="n"><i class="now-ui-icons business_bank" id="m"></i><b>Allez vers Acceuil</b></a>
                                                                       <a class="dropdown-item" href="{{ route('profilAdmin') }}" id="n"><i class="now-ui-icons users_single-02" id="m"></i><b>Profil</b></a>
                                                                       <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();" id="n">
                                                                         <i class="now-ui-icons media-1_button-power" id="m"></i>
                                                                         {{ __('Déconnexion') }} </a>
                                                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                           @csrf
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
              <div class="card-header">
                <div style=" display: flex; margin-left: 7px;">
                  <input type="checkbox" id="notification" @change="selectAll()" v-model="allSelected" style="">
                  <label for="notification"></label>
                  <h4 style="margin-top: -6px; margin-left: 5px;">Notifications</h4>
                </div>
                <button v-if="suppr" class="btn btn-sm btn-danger  btn-block" style="margin-left: 700px; margin-top: -40px; border-radius: 0.8em; width: 130px; height: 35px; "  v-on:click="deleteArrayNotif()"><b>supprimer</b></button>
                <button v-if="suppr" class="btn btn-sm btn-warning btn-block" style="margin-left: 850px; margin-top: -45px; border-radius: 0.8em; width: 130px; height: 35px; " v-on:click="AnnulerSel" ><b>Annuler</b></button>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="height: auto;">
                  <table class="table" width="100%">
                    <tbody>
                      <tr v-for="noti in notifications">
                        <td style=" width: 4%;">  
                          <div v-if="selectall">
                            <input type="checkbox" :id="noti.id" :value="noti.id" v-model="checkedNotif" @change="changeButton(noti)">
                            <label :for="noti.id" style=""></label>
                          </div>
                          <div v-else>
                            <input type="checkbox" :id="noti.id" :value="noti.id" v-model="notificationIds"  @change="deselectNotif(noti.id)">
                            <label :for="noti.id" style=""></label>
                          </div>   
                        </td>
                        <td width="3%">
                          <b><i class="now-ui-icons ui-1_bell-53" style="margin-top: 5px;"></i></b>
                        </td>
                      <!--  <td  class="text-left"  v-if="noti.client_id "><a href="#" style="  color: black; cursor: auto;" >L'client_id <b>@{{noti.nom}}</b> a supprimer la sous catégorie @{{noti.sous_categorie_libelle}} </a></td> -->
                        <td  class="text-left"><a href="#" style="  color: black; cursor: auto;" >L'employeur_id <b>@{{noti.id}}</b> a supprimer la sous catégorie @{{noti.sous_categorie_libelle}} </a></td>
                       

                        <td  class="dropdown "  id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"> 
                                <img src="assetsAdmin/img/menu.png" alt="..."/ id="f">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right "  style="margin-top: -10px;">
                                <a class="dropdown-item" href="#" id="f1" v-on:click="deleteNotification(noti)">Supprimer</a>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                 {{$notif->links()}}
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

    
 @endsection

 @push('javascripts')
 
 <script >
   window.Laravel = {!! json_encode([
               'csrfToken' => csrf_token(),
                'notif' => $notif,  
                'url'      => url('/')  
          ]) !!};
 </script>

 <script >
   var app = new Vue({
      el: '#app',
      data:{
         notifications: [],
         selectall: true,
         suppr: false,
         nextPage: null,
         checkedNotif: [],
         allSelected: false,
         notificationIds: [],
         NotificationsDelete: [],
      },
      methods:{
      
        getNotifications:function(){
          axios.get(window.Laravel.url+'/notificationsAdmin/')
            .then(pagination => {
                 console.log(pagination)
                 this.notifications = window.Laravel.notif.data;
                 this.nextPage = window.Laravel.notif.next_page_url;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },  fetchcpmment:function(){
         axios.get(window.Laravel.url)
     // axios.get(url)
            .then(pagination => {
                 this.notifications = this.notifications.concat(window.Laravel.notif.data);
                 console.log( this.notifications)

                 this.nextPage = window.Laravel.notif.next_page_url;
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
                text: 'Il ya aucun Notification a supprimer!',

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
                                     window.location.reload();             
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
                  title: 'Etes vous de supprimer ces Notifications?',
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
                                     window.location.reload();             
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
                  title: 'Etes vous sure de supprimer cette notification ??',
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
 
 @endpush