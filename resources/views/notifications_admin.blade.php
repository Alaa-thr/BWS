
@extends('layouts.template_admin')

@section('content')


    <head>
    <title>{{ ( 'Notification') }}</title>
  </head>
      <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Notifications </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="height: 500px;">
                  <table class="table" width="100%">
                    <tbody>
                      <tr>
                        <td width="3%">
                          <i class="now-ui-icons ui-1_bell-53"></i>
                        </td>
                        <td  class="text-left" > a signaler le produit n1</td>
  
                        <td  class="dropdown "  id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"> 
                                <img src="assetsAdmin/img/menu.png" alt="..."/ id="f">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right "  style="margin-top: -10px;">
                                <a class="dropdown-item js-show-modal1" href="#"  id="f1">Voir plus</a>
                                <a class="dropdown-item" href="#" id="f1">Supprimer</a>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
            </script>, Designer par <a href="https://www.invisionapp.com" target="_blank">BS</a>. Codé par <a href="https://www.creative-tim.com" target="_blank">BASMAHW&S</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " style="">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" style="width: 985px;">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="p-b-30 p-l-40">
            <h4 class=" cl2">
              Commande de Tahraoui Alaâ
            </h4>
          </div>
  
          
        </div>
      </div>
    </div>

    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11-sm js-modal1-sm p-t-38 p-b-20 p-l-15 p-r-15 " style="">
      <div class="overlay-modal11-sm js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE">
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
      },
      methods:{
        getNotifications:function(){
          axios.get(window.Laravel.url+'/getnotif/')
            .then(response => {
                 this.notifications = window.Laravel.notif.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },

      },
      created:function(){ 
        this.getNotifications();
      },

   });

 </script>
 
 @endpush