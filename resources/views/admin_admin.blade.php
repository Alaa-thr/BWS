<!DOCTYPE html>
<html lang="fr" id='html_id'>

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
          <form  action="/abestaa" method="get" id="sbmt" name='sbmt'>
              <div class="input-group no-border"  style="left: -40px;">
                <input type="search" name="search"  class="form-control" placeholder="Rechercher..." >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"  onclick="document.forms['sbmt'].submit();"></i>
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
                  <img class="img-xs rounded-circle" src=" {{asset('storage/profil_image/'.$admin->image)}}" alt="..."  />
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
                                  <img class="img-lg rounded-circle"  src=" {{asset('storage/profil_image/'.$admin->image)}}" alt="..."> 
                              </a>
                              </td>
                              <td>
                                   <h6 class="description text-left" ><b id="a">
                                    {{ $admin->nom }} {{ $admin->prenom }}</b></h6>
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
          <title>{{ ( 'Admin ') }}</title>
      </head>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header col-md-12 flex-t">
                <h4 class="card-title col-md-3"> Admin</h4>
                <div  class="col-md-6" >
                    <select class="form-control m-t-9" onchange="window.location.href=this.value" style=" width: 250px;height: 40px; border-radius: 0.8em; cursor: pointer;float: right;">
                      <option  style="border:none;" value="0" selected="selected" disabled="disabled">Recuperer les utilisateurs   :</option>
                      <option value="recupervendeur">Recuperer vendeurs</option>
                      <option value="recuperclient">Recuperer clients</option>
                      <option value="recupemployeur">Recuperer employeurs</option>
                      <option value="recuperadmin">Recuperer admins</option>
                    </select>
                </div>
                <div class="col-md-3" >
                  <button class="btn btn-sm btn-block btn-info js-show-modal1" style="width: 160px; border-radius: 0.5em; height: 35px; box-shadow: 0 5px 10px rgba(0,0,0,.2);float: right;" v-on:click="AfficherAjout()">
                    <b> Ajouter Admin</b>
                  </button>
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
                        <b>Nom_Prenom</b>
                      </th>
                      <th >
                        <b >N°Téléphone</b>
                      </th>
                      <th >
                        <b >Email</b>
                      </th>
                      <th>
                        <b> Type </b>
                      </th>
                      <th>
                      </th>
                    </thead>
                    @php
                      $url = Route::getCurrentRoute()->uri();
                    @endphp
                    <tbody>
                      <tr v-if="adminadmin.length == 0 && '<?php echo $url?>'.includes('abestaa') == true" > 
                        <td></td><td></td>
                        <td >

                          <small>Cette Recherche n'a pas de Résultats</small>
                        </td>
                         <td></td>
                         <td></td>
                         <td></td> 
                      </tr>
                      <tr v-if="adminadmin.length"  v-for="admina in adminadmin" style="cursor: pointer;">
                        <td  class="js-show-modal1"  v-on:click="AfficherInfo(admina.id)">
                         @{{admina.id}}  
                        </td>
                        <td  class="js-show-modal1"  v-on:click="AfficherInfo(admina.id)">
                          @{{admina.nom}} @{{admina.prenom}} 
                        </td>
                        <td  class="js-show-modal1"  v-on:click="AfficherInfo(admina.id)">
                          @{{admina.numTelephone}} 
                        </td>
                        <td  class="js-show-modal1"  v-on:click="AfficherInfo(admina.id)">
                          @{{admina.email}} 

                        </td >
                        <td v-if="admina.big_admin === 1 "  class="js-show-modal1"  v-on:click="AfficherInfo(admina.id)">
                           Admin Supèrieure
                        </td>
                        <td v-else  class="js-show-modal1"  v-on:click="AfficherInfo(admina.id)">

                          Admin Simple
                        </td>
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsAdmin/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: -10px; margin-right: -10px;">
                              <a class="dropdown-item js-show-modal1" href="#" id="k2" v-on:click="AfficherInfo(admina.id)">Details</a>
                              <a class="dropdown-item" href="#" id="k2" v-on:click="deleteAdmin(admina)">Supprimer</a>
                            </div>
                        </td>
                        <td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                   {{ $adminn->links() }}
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
    
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-if="hideModel">
      <div class="overlay-modal11 js-hide-modal1" v-on:click="CancelAdmin()"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo"  style="width: 950px;" v-for="adminaa in adminadmin2">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE"  v-on:click="CancelAdmin()">
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
                              <img class="avatar border-gray" :src="'storage/profil_image/'+adminaa.image" alt="..."> 
                            </a>
                            <h5 class="title cl13">@{{ adminaa.nom }} @{{ adminaa.prenom }}
                            </h5>
                          </div>
                          <div style="margin-top: 30px;">
                            <hr>
                          </div>
                           <div class="row">
                            <div class=" title" style="margin-left: 20px; margin-top: 50px;">Email :</div>
                           
                            <div class="author" style="margin-left: 10px; color:black; margin-top: 50px;"><b>@{{ adminaa.email }}</b></div>
                          </div>
                          <div class="row" >
                            <div class=" title" style="margin-left: 20px; margin-top: 40px;">Numero</div>
                            <div class="title" style="margin-top: 40px; margin-left: 20px;">:</div>
                            <div  style="margin-left: 10px; color:black; margin-top: 40px; height: 70px;"><b>@{{ adminaa.numTelephone }}</b></div>
                          </div>
                      </div>
                    </div>
                  </div>
                    <img src="../assetsAdmin/img/icon_admin.png" alt="..." style="margin-left: 480px; margin-top: -800px; width: 40px;">
                  <table>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -300px;">
                          Crée Le
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -300px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -300px; color: red;">
                          @{{ adminaa.created_at }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -230px;">
                          N° compte BNQ
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -230px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -230px;">
                          @{{ adminaa.numCarteBanquaire }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -170px;">
                          Type
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -170px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div v-if="adminaa.big_admin === 1 "  style="margin-left: 20px; margin-top: -170px;">
                           Admin Supèrieure
                        </div>
                        <div v-else  style="margin-left: 20px; margin-top: -170px;">

                          Admin Simple
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </section>    
        </div>

<!--***********************************************************************
  ******************************************-->
        <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout" style=" width: 950px; padding-top: 45%" >
          <button class="how-pos3 hov3 trans-04 p-t-6" >
            <img src="images/icon-close.png" alt="CLOSE" v-on:click="CancelAjout(adm)">
          </button>
          <section class=" creat-article ">     
            <div  class=" container-creat-article" style="margin-top: -55px;">
                @csrf
                  <div class="row m-t-20">
                    <div class="col-md-5 pr-2" >
                      <div class="form-group mb-3">
                        <label>Nom</label>
                        <input  type="text" class="formm-control " placeholder="Votre nom doit commencer par un Maj" style="width: 310px;" v-model="adm.nom" :class="{'is-invalid' : message.nom}">
                        <span class="px-3 cl13" v-if="message.nom" v-text="message.nom[0]"></span>
                      </div>
                    </div>
                    <div class="col-md-5 pr-2" >
                      <div class="form-group mb-3">
                        <label>Prenom</label>
                        <input  type="text" class="formm-control" placeholder="Votre prenom doit commencer par un Maj" v-model="adm.prenom" :class="{'is-invalid' : message.prenom}">
                        <span class="px-3 cl13" v-if="message.prenom" v-text="message.prenom[0]"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-5 pr-2" >
                      <div class="form-group">
                        <label>Numero de telephone</label>
                        <input type="text" class="formm-control" placeholder="05/07/06********" v-model="adm.numTelephone" :class="{'is-invalid' : message.numTelephone}">
                        <span class="px-3 cl13" v-if="message.numTelephone" v-text="message.numTelephone[0]"></span>
                      </div>
                    </div>
                    <div class="col-md-5 pr-2" >
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="formm-control" placeholder="Adresse email" v-model="adm.email" :class="{'is-invalid' : message.email}">
                        <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-10 pr-2">
                      <div  class="form-group">
                        <label>Password</label>
                        <input type="Password" id="mtps" class="formm-control" placeholder="mot de passe****" style="width: 630px;" v-model="adm.mtps" :class="{'is-invalid' : message.mtps}">
                        <span class="px-3 cl13" v-if="message.mtps" v-text="message.mtps[0]"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-10 pr-2" >
                      <div class="form-group" >
                        <label for="image" >image</label>
                        <input type="file" style="width: 630px;" class="formm-control" v-on:change="imagePreview" :class="{'is-invalid' : message.image}">
                        <span class="px-3 cl13" v-if="message.image" v-text="message.image[0]"></span>
                      </div>
                   </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-5 pr-2" style="margin-right: 15px">
                      <div class="form-group">
                        <label for="">Numero de compte BNQ</label>
                        <input type="text" class="formm-control" placeholder="N° compte BNQ" v-model="adm.numCarteBanquaire" :class="{'is-invalid' : message.numCarteBanquaire}">
                        <span class="px-3 cl13" v-if="message.numCarteBanquaire" v-text="message.numCarteBanquaire[0]"></span>
                      </div>
                    </div>
                    <div class="col-md-5 pr-2">
                      <div class="form-group" >
                        <label for="typeAdmin">Type</label>
                        <select class="form-control" id="typeAdmin" name ="typeAdmin" style="border-radius: 0.3em;" @change="SaveTypeAdmin($event)" :class="{'is-invalid' : message.type}">
                            <option value="" hidden selected>Choisir un type:</option>
                            <option value="1">Big-admin</option>
                            <option value="2">Admin simple</option>
                        </select>
                        <span class="px-3 cl13" v-if="message.type" v-text="message.type[0]"></span>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <button type="submit"  class="btn btn-success btn-block " style="margin-top:60px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 300px; " v-on:click="addAdmin()">Ajouter
                      </button>     
                    </div>
                    <div class="col-md-5">
                      <button type="submit"  class="btn btn-danger btn-block " style="margin-top:60px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 300px; margin-left: 10px;" v-on:click="CancelAjout(adm)">Annuler
                      </button>
                    </div>
                </div>
             
            </div>
          </section>
              
        </div>
      </div>
    </div>
  <!--*****************************************************************************************************************************************************************************************************************************-->
 

@push('javascripts')



<script>
        window.Laravel = {!! json_encode([
               'csrfToken' => csrf_token(),
                  'adminn' => $adminn,  //admin connecté
                'url'      => url('/')  
          ]) !!};
</script>

<script>
   function initDashboardPageCharts(){}
  Vue.mixin({

        methods:{
          addAdmin: function(){
            app2.adm.image = app2.image;
            axios.post(window.Laravel.url+"/addadmin",app2.adm)

            .then(response => {
              if(response.data.etat){
                 app2.adm = response.data.adminAjout;
                 app2.adm.id = response.data.adminAjout.id;
                 app.adminadmin.push(app2.adm);
                 app.adminadmin[app.adminadmin.length-1]['id']=app.adminadmin[app.adminadmin.length-2]['id']+1;
                 app2.adm={
                      id: 0,
                      nom: '',
                      prenom: '',
                      email: '',
                      big_admin: 0,
                      type: 0,
                      numTelephone: '', 
                      numCarteBanquaire: '',
                      image: '',
                      mtps: '',
                 };
                 app2.hideModel=false;
                 app2.openAjout = false;
                 app2.image = '';
                 app2.message  = {};
              }          
            })
            .catch(error =>{
                app2.message = error.response.data.errors;
                console.log('errors :' , app2.message);
            })
      },         
    }                     
  });
  var app2 = new Vue({
     el: '#app2',
     data:{
        adminadmin2: [],
        hideModel: false,
        openInfo: false,
        openAjout: false,
        adm: {// bach n7ato fih l'article di nzaftohom l controller (pour les modification et l'ajout) et nestokiw fihom les resultats di yzafethomlna les methods di f controller
          id: 0,
          nom: '',
          prenom: '',
          email: '',
          big_admin: 0,
          type: '',
          numTelephone: '', 
          numCarteBanquaire: '',
          image: '',
          mtps: '',
        },
        detailsAD:{
          idAD: 0,
          
        },
        image: '',
        message: {},
     },
     methods: {
           SaveTypeAdmin:function(event){
              this.adm.big_admin = event.target.value;
              this.adm.type = event.target.value;
           },
           details_admin: function(){
             axios.post(window.Laravel.url+'/detailsadmin',this.detailsAD)

            .then(response => {
                 this.adminadmin2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      CancelAdmin: function(){
        this.hideModel = false;
        this.openInfo = false;
      },
      imagePreview(event) {//ki ndakhlo une image f formulaire limage  
           var fileR = new FileReader();
           fileR.readAsDataURL(event.target.files[0]);
           fileR.onload = (event) => {
              
              this.image = event.target.result;//n7ato had les info ta3 image attribut 'image'
           }
           
      },
      CancelAjout: function(admin){
        this.openAjout = false;
        this.hideModel = false;
        this.adm = {
          id: 0,
          nom: '',
          prenom: '',
          email: '',
          type: '',
          numTelephone: '', 
          numCarteBanquaire: '',
          image: '',
          mtps: '',
        };
        this.message={};
        app2.image = '';
      },
       
    },
   });
   var app = new Vue({

    el: '#app',
    data:{
        
        adminadmin:[],           
      },
    methods: {
      admin_admin: function(){
        axios.get(window.Laravel.url+'/admin')

            .then(response => {
                 this.adminadmin = window.Laravel.adminn.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      AfficherAjout: function(){
         app2.hideModel = true;
         app2.openAjout = true;
         app2.openInfo = false; 
      },
      AfficherInfo: function($id){
        app2.hideModel=true;
        app2.openInfo=true;
        app2.detailsAD.idAD= $id;
        app2.details_admin();
      },
      deleteAdmin:function(adm){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De supprimer ce admin ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/deleteadmin/'+adm.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.adminadmin.indexOf(adm);
                             this.adminadmin.splice(position,1);   
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
      this.admin_admin();
    }
  });
</script>




<script type="text/javascript">

    
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
}
    </script>

    <script type="text/javascript" >
        (function(){var gtConstEvalStartTime = new Date();/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='440335.1449305758';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
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
  <script >

        window.addEventListener("load",function() {
            var x;
            setTimeout(function () {
              x=document.getElementsByClassName('goog-te-combo')[0].value;
              
              if(x == ''){
                document.getElementById('html_id').style.marginTop = '0px';
              }
              else{
                document.getElementById('html_id').style.marginTop = '-40px';
              }
            document.getElementsByClassName('goog-te-combo')[0].onchange = function() {
                document.getElementById('html_id').style.marginTop = '-40px';
            }
            },15000);
        
  
      
    });

    </script>

</body>
</html>