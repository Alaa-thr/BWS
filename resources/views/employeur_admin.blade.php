<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assetsAdmin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetsAdmin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assetsAdmin/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assetsAdmin/css/now-ui-dashboard.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assetsAdmin/demo/demo.css" rel="stylesheet" />
  

  <link href="assetsAdmin/css/util.css" rel="stylesheet" />
  <link href="assetsAdmin/css/main.css" rel="stylesheet" />
  <script src="{{ asset('jss/vue.js') }}"></script>
  <script src="{{asset('jss/axios.min.js')}}"></script>
  <script src="{{asset('jss/sweetalert2.js')}}"></script>

  <?php

         $stripeProfil=$stripeStatistique=$stripeEmail=$stripeNotif=$stripeArticle=$stripeCatego=$stripeGererUser='';
                
         $urlAcctuiel = Route::getCurrentRoute()->uri();
         if($urlAcctuiel == 'statistiquesAdmin'){
             $stripeStatistique='active';
         }
         else if($urlAcctuiel == 'profilAdmin'){
             $stripeProfil='active';
         }
         else if($urlAcctuiel == 'emails'){
             $stripeEmail='active';
         }
         else if($urlAcctuiel == 'vendeur' || $urlAcctuiel == 'admin' || $urlAcctuiel == 'client' ||$urlAcctuiel == 'employeur' || $urlAcctuiel == 'recupervendeur' || $urlAcctuiel == 'recuperclient' || $urlAcctuiel == 'recupemployeur' ||$urlAcctuiel == 'recuperadmin'){
             $stripeGererUser='active';
         }
         else if($urlAcctuiel == 'notificationsAdmin'){
             $stripeNotif='active';
         }
         else if($urlAcctuiel == 'articlesAdmin'){
             $stripeArticle='active';
         }
         else if($urlAcctuiel == 'categories'){
             $stripeCatego='active';
         }
  ?>
</head>

<body >
    <div >
    <div class="sidebarr" data-color="griss" style="z-index: 10000;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <img src ="assetsAdmin/img/logo1.png" alt="...">
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
         
          <li class="<?php echo $stripeStatistique ?>">
            <a href="{{route('statistiquesAdmin')}}">
              <i class="now-ui-icons business_chart-bar-32" id="y"></i>
              <div class="m-t-5" id="x">Statistiques</div>
            </a>
          </li>
          <li class="<?php echo $stripeProfil ?>">
            <a href="{{route('profilAdmin')}}">
              <i class="now-ui-icons users_single-02" id="y"></i>
              <div class="m-t-5" id="x">Profile</div>
            </a>
          </li>
          
          <li class="<?php echo $stripeEmail ?>">
            <a href="{{route('emails')}}">
              <i class="now-ui-icons ui-1_send" id="y"></i>
              <div class="m-t-5" id="x">Emails</div>
            </a>
          </li>
          <li class=" dropdown <?php echo $stripeGererUser ?>" >
          <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

              <i class="now-ui-icons business_badge" id="y"></i>
              <div class="m-t-5" id="x">Gerer Utilisateur</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="margin-right: 50px;">
                  <div class="account-item clearfix js-item-menu">
                    <div class="card-body">
                      <a href="{{route('vendeur')}}" id="s"><b>Vendeur</b></a>
                      <hr>
                      <a href="{{route('client')}}" id="s"><b>Client</b></a>
                      <hr>
                      <a href="{{route('employeur')}}" id="s"><b>Employeur</b></a>
                      <hr>
                      <a href="{{route('admin')}}" id="s"><b>Admin</b></a>
                      </div>
                    </div>
            </div>
          </li>
          <li class="<?php echo $stripeNotif ?>">
            <a href="{{route('notificationsAdmin')}}">
              <i class="now-ui-icons ui-1_bell-53" id="y"></i>
              <div class="m-t-5" id="x">Notifications</div>
            </a>
          </li>
          
          <li class="<?php echo $stripeArticle ?>">
            <a href="{{route('articlesAdmin')}}">
              <i class="now-ui-icons education_paper" id="y"></i>
              <div class="m-t-5" id="x">Articles</div>
            </a>
          </li>
          
         
          <li class="<?php echo $stripeCatego ?>">
            <a href="{{route('categories')}}">
              <i class="now-ui-icons design_bullet-list-67" id="y"></i>
              <div class="m-t-5" id="x">Categories</div>
            </a>
          </li>
          
        </ul>
      </div>
    </div>

    <!-- Navbar -->

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
          <form  action="/abestae" method="get">
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
                  <img class="img-xs rounded-circle" src="<?php echo asset('storage/profil_image/'.$admin->image) ?>" alt="..."  />
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
                                   <h6 class="description text-left" ><b id="a">{{ $admin->nom }} {{ $admin->prenom }}</b></h6>
                                   <a href ="{{ $admin->email }}" id ="nab">{{ $admin->email }}</a>
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

      <head>
          <title>{{ ( 'Employeur ') }}</title>
      </head>
      <div class="main-panel" id="main-panel">
     
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Employeur</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="height: 620px;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                       <b> Indice</b>
                      </th>
                      <th>
                        <b>Nom_Prenom</b>
                      </th>
                      <th>
                       <b> N°_Telephone</b>
                      </th>
                      <th>
                       <b> Email</b>
                      </th>
                      <th>

                      </th>
                      <th>

                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="employeura in employeuradmin"  style="cursor: pointer;">
                        <td class="js-show-modal1"  v-on:click="AfficherInfo(employeura.id)">
                          @{{employeura.id}}
                        </td>
                        <td class="js-show-modal1"  v-on:click="AfficherInfo(employeura.id)">
                          @{{employeura.nom}} @{{employeura.prenom}} 
                        </td>
                        <td class="js-show-modal1"  v-on:click="AfficherInfo(employeura.id)">
                          @{{employeura.num_tel}}
                        </td>
                        <td class="js-show-modal1"  v-on:click="AfficherInfo(employeura.id)">
                          @{{employeura.email}}
                        </td>
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsAdmin/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: -10px; margin-right: -10px;">
                               <a class="dropdown-item js-show-modal1" href="#" id="k2" v-on:click="AfficherInfo(employeura.id)">Details</a>
                               <a class="dropdown-item" href="#" id="k2" v-on:click="deleteEmployeur(employeura)">Supprimer</a>
                            </div>
                        </td>
                        <td>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div>
                   {{ $employeur->links() }}
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
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent"  style="width: 985px;" v-for="employeuraa in employeuradmin2">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE"  v-on:click="CancelEmp()">
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
                              <img class="avatar border-gray" :src="'storage/profil_image/'+employeuraa.image" alt="..."> 
                            </a>
                            <h5 class="title cl13">@{{ employeuraa.nom }} @{{ employeuraa.prenom }}
                            </h5>
                          </div>
                          <div style="margin-top: 30px;">
                            <hr>
                          </div>
                           <div class="row">
                            <div class=" title" style="margin-left: 20px; margin-top: 50px;">Email</div>
                            <div class="title" style="margin-top: 50px; margin-left: 35px;">:</div>
                            <div class="author" style="margin-left: 10px; color:black; margin-top: 50px;"><b>@{{ employeuraa.email }}</b></div>
                          </div>
                          <div class="row" >
                            <div class=" title" style="margin-left: 20px; margin-top: 40px;">Numero</div>
                            <div class="title" style="margin-top: 40px; margin-left: 20px;">:</div>
                            <div  style="margin-left: 10px; color:black; margin-top: 40px; height: 70px;"><b>@{{ employeuraa.num_tel }}</b></div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <table>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -330px;">
                          Crée Le
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -330px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -330px; color: red;">
                          @{{ employeuraa.created_at }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -260px;">
                          Adresse
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -260px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -260px;">
                          @{{ employeuraa.address }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -190px;">
                          Societe
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -190px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -190px;">
                          @{{ employeuraa.nom_societe }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -120px;">
                          N° Compte BNQ
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -120px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -120px;">
                          @{{ employeuraa.num_compte_banquiare  }}
                        </div>
                      </td>
                     
                    </tr>
                   
                    <tr>
                        <div style="margin-left: 350px;margin-top:-15%; ">
                        <button id="verif" class="btn btn-success btn-block " style="width:320px;
                          border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;"  v-on:click="VerifierAnnonce(employeuraa.id);"> Annonce <br>existent pour publier ?
                        </button>
                        <button id="exist" class="btn btn-success btn-block " style="width:320px;display:none;
                          border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" > Existe 
                        </button>
                        <button id="notexis" class="btn btn-disabled btn-block " style="width:320px;display:none;
                          border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" disabled> Not Existe
                        </button> 
                        </div>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
          </section>    
        </div>
      </div>
    </div>
 

  @push('javascripts')



<script>
        window.Laravel = {!! json_encode([
               'csrfToken' => csrf_token(),
                  'employeur' => $employeur,  //employeur connecté
                'url'      => url('/')  
          ]) !!};
</script>

<script>
  var app2 = new Vue({
     el: '#app2',
     data:{
        employeuradmin2: [],
        hideModel: false,
        detailsE:{
          idE: 0,
        },
     },
     methods: {
      VerifierAnnonce: function(id){
          var s = document.getElementById("exist");
            var m = document.getElementById("notexis");
            var v= document.getElementById("verif");

          	axios.post(window.Laravel.url+'/verifierannonce/'+id)
              .then(response => {
                if(response.data.etat){     //est ce que hadii ma3naha etat===true?? oui
                      s.style.display = "block";
                      v.style.display = "none";

                	console.log("ressponse",response.data.etat)}

                  else{     //est ce que hadii ma3naha etat===false?? oui
                    v.style.display = "none";

                    m.style.display = "block";
                    console.log("ressssponse",response.data.etat)

                  }
               })
              .catch(error => {
                               

                  console.log('errors : '  , error);
             })
          },
     
           details_employeur: function(){
             axios.post(window.Laravel.url+'/detailsemployeur',this.detailsE)

            .then(response => {
                 this.employeuradmin2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      CancelEmp: function(){
        this.hideModel = false;
      },
       
    },
   });
   var app = new Vue({

    el: '#app',
    data:{
        
        employeuradmin:[],           
      },
    methods: {
     
      employeur_admin: function(){
        axios.get(window.Laravel.url+'/employeur')

            .then(response => {
                 this.employeuradmin = window.Laravel.employeur.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      AfficherInfo: function($id){
        app2.hideModel=true;
        app2.detailsE.idE= $id;
        app2.details_employeur();
      },
      deleteEmployeur:function(emp){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De supprimer ce employeur ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/deleteemployeur/'+emp.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.employeuradmin.indexOf(emp);
                             this.employeuradmin.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log('errors : ',error)
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
      this.employeur_admin();
    }
  });
</script>


<script src="assetsAdmin/js/jquery-3.2.1.min.js"></script>
  <script src="assetsAdmin/js/animsition.min.js"></script>
  <script src="assetsAdmin/js/main.js"></script>
  <script src="assetsAdmin/js/core/jquery.min.js"></script>
  <script src="assetsAdmin/js/core/popper.min.js"></script>
  <script src="assetsAdmin/js/core/bootstrap.min.js"></script>
  <script src="assetsAdmin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->

  <!-- Chart JS -->
  <script src="assetsAdmin/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assetsAdmin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assetsAdmin/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assetsAdmin/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      initDashboardPageCharts();

    });
  </script>
</body>
</html>