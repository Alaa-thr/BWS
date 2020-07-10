
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
  <script src="<?php echo e(asset('jss/vue.js')); ?>"></script>
  <script src="<?php echo e(asset('jss/axios.min.js')); ?>"></script>
  <script src="<?php echo e(asset('jss/sweetalert2.js')); ?>"></script>

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
            <a href="<?php echo e(route('statistiquesAdmin')); ?>">
              <i class="now-ui-icons business_chart-bar-32" id="y"></i>
              <div class="m-t-5" id="x">Statistiques</div>
            </a>
          </li>
          <li class="<?php echo $stripeProfil ?>">
            <a href="<?php echo e(route('profilAdmin')); ?>">
              <i class="now-ui-icons users_single-02" id="y"></i>
              <div class="m-t-5" id="x">Profile</div>
            </a>
          </li>
          
          <li class="<?php echo $stripeEmail ?>">
            <a href="<?php echo e(route('emails')); ?>">
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
                      <a href="<?php echo e(route('vendeur')); ?>" id="s"><b>Vendeur</b></a>
                      <hr>
                      <a href="<?php echo e(route('client')); ?>" id="s"><b>Client</b></a>
                      <hr>
                      <a href="<?php echo e(route('employeur')); ?>" id="s"><b>Employeur</b></a>
                      <hr>
                      <a href="<?php echo e(route('admin')); ?>" id="s"><b>Admin</b></a>
                      </div>
                    </div>
            </div>
          </li>
          <li class="<?php echo $stripeNotif ?>">
            <a href="<?php echo e(route('notificationsAdmin')); ?>">
              <i class="now-ui-icons ui-1_bell-53" id="y"></i>
              <div class="m-t-5" id="x">Notifications</div>
            </a>
          </li>
          
          <li class="<?php echo $stripeArticle ?>">
            <a href="<?php echo e(route('articlesAdmin')); ?>">
              <i class="now-ui-icons education_paper" id="y"></i>
              <div class="m-t-5" id="x">Articles</div>
            </a>
          </li>
          
         
          <li class="<?php echo $stripeCatego ?>">
            <a href="<?php echo e(route('categories')); ?>">
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
            <a class="navbar-brand" style="margin-left: 260px">Nombre Inscription / Mois de L'année Courante</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <form  action="/abest" method="get">
              <div class="input-group no-border">
                <input type="search" name="search"  class="form-control" placeholder="Rechercher...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#pablo">
                  <i class="now-ui-icons ui-1_bell-53" id="fa"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifs</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <div class="account-item clearfix js-item-menu">
                    <div class="card-body">
                      <h7 style="color: gray;">Vous avez 3 Nouveaux Notififcations</h7>
                    <hr>
                      <a class="dropdown-item" href="#"><b>1....</b></a>
                      <a class="dropdown-item" href="#"><b>2....</b></a>
                      <a class="dropdown-item" href="#"><b>3....</b></a>
                      <hr>
                      <a class="dropdown-item" href="notifications.html"  id="n"><h6>Voir Touts Les Notifications</h6></a>
                      </div>
                    </div>
                  </div> 
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#pablo">
                  <i class="now-ui-icons ui-1_email-85"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Email</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <div class="account-item clearfix js-item-menu">
                    <div class="card-body">
                     <h7 style="color: gray;"><b>Vous avez 3 nouveaux Emails</b></h7>
                      <hr>
                      <a class="dropdown-item" href="#"><i class="now-ui-icons ui-1_send" id="m"></i><b>Nouveau Email de </b><b id="a"> (Jonathan Smith)...</b><i class="now-ui-icons arrows-1_minimal-right" id="m"></i>
                      </a>
                      
                      <a class="dropdown-item" href="#"><i class="now-ui-icons ui-1_send" id="v"></i><b>Nouveau Email de </b><b id="a"> (Islam Bellifa)...</b><i class="now-ui-icons arrows-1_minimal-right" id="v"></i>
                      </a>

                      <a class="dropdown-item" href="#"><i class="now-ui-icons ui-1_send" id="w"></i><b>Nouveau Email de </b><b id="a"> (Miloud Slimani)...</b><i class="now-ui-icons arrows-1_minimal-right" id="w"></i>
                      </a>
                      <hr>
                      <a class="dropdown-item " href="Emails.html" id="n"><h6>Voir Touts Les Emails</h6></a>
                      </div>
                    </div>
                  </div>
              </li>
            <li class="nav-item dropdown" style="cursor: pointer;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="img-xs rounded-circle" src="assetsAdmin/img/admin.jpg" alt="..."/>
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
                                 <a href="assetsAdmin/img/admin.jpg"><img class="img-lg rounded-circle" src="assetsAdmin/img/admin.jpg"    alt="..."></a>
                              </td>
                              <td>
                                   <h6 class="description text-left" ><b id="a">Nabil Baba Ahmed</b></h6><a href ="babaahmednabil3@gmail.com" id ="nab">babaahmednabil3@gmail.com</a>
                               </td>
                             </tr>
                            </table>
                        </a>  
                    </div> 
                    <hr width="90%">
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

      <!-- End Navbar -->
      <?php echo $__env->yieldContent('content'); ?>
</div>
  
  <?php echo $__env->yieldPushContent('javascripts'); ?>
  

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
</html><?php /**PATH C:\xampp\htdocs\BWS\resources\views/layouts/template_admin.blade.php ENDPATH**/ ?>