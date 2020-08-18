
<!DOCTYPE html>
<html lang="fr" id='html_id'>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assetsAdmin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('images/icons/title_icon.png')}}">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
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

          @if($urlAcctuiel == 'statistiquesAdmin')
            <a class="navbar-brand" style="margin-left: 260px">Nombre Inscription / Mois de L'année Courante</a>
          @endif

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

        </div>
      </nav>

      <!-- End Navbar -->
      @yield('content')
</div>
  
  @stack('javascripts')
  
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      initDashboardPageCharts();

    });
     $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
  </script>
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
            },10500);
        
  
      
    });

    </script>
</body>
</html>