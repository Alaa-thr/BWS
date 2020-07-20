@extends('layouts.template_admin')

@section('content')

  
  <head>
    <title>{{ ( 'Profile') }}</title>
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
  <div class="main-panel" id="main-panel" >
      
      <div class="panel-header panel-header-sm">
      </div>
  <div class="content" id="app" >
     <div class="row" >
        <div class="col-md-8">
          <div class="card" >
            <div class="card-header"  v-on:click="modif = false">
              <h5 class="title"  v-on:click="modif = false">Editer Profile</h5>
            </div>
            <div class="card-body"  >

             <div  style="margin-top: 15px; font-weight: 700;">

                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profiladmin.nom" value="{{old('nom')}}" v-on:click="modif = true" :class="{'is-invalid' : message.nom}">
                      <span class="px-3 cl13" v-if="message.nom" v-text="message.nom[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profiladmin.prenom" value="{{old('prenom')}}" v-on:click="modif = true" :class="{'is-invalid' : message.prenom}">
                      <span class="px-3 cl13" v-if="message.prenom" v-text="message.prenom[0]"></span>
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num" type="" class="form-control" v-model="profiladmin.numTelephone" value="{{old('numTelephone')}}" v-on:click="modif = true" :class="{'is-invalid' : message.numTelephone}">
                      <span class="px-3 cl13" v-if="message.numTelephone" v-text="message.numTelephone[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="email" type="email" class="form-control" v-model="profiladmin.email" value="{{old('email')}}" v-on:click="modif = true" :class="{'is-invalid' : message.email}">
                      <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero compte BNQ</label>
                      <input name="bnq" type="text" class="form-control" v-model="profiladmin.numCarteBanquaire" value="{{old('numCarteBanquaire')}}" v-on:click="modif = true" :class="{'is-invalid' : message.numCarteBanquaire}">
                      <span class="px-3 cl13" v-if="message.numCarteBanquaire" v-text="message.numCarteBanquaire[0]"></span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>pays</label>
                      <input type="" class="form-control" placeholder="pays" value="Algerie" disabled="disabled">
                    </div>
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-6">
                    <button v-if="modif" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" v-on:click="modifieInfoProfils()">Modifier</button>     
                  </div>
                  <div class="col-md-6">
                    <button v-if="modif" class=" btn btn-danger btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" v-on:click="annulerModif">Annuler</button>
                  </div>
                </div>
              </div>
              <hr>
                             
                             <div class="row">
                              <div class="col-md-6 pl-2">
                                  <div class="form-group">
                                    <label >Mot de passe actuel</label>
                                    <input id="act" name="changepassword" type="password" class="form-control form-control-lg @error('changepassword') is-invalid @enderror" v-model="change.changepassword">
                                   <img src="images/icons/img_476715.png" style="width:10%" id="show" onclick="myFunction()">
                                   <img src="images/icons/download.png" style="width:10%;  height: 10%;display: none;"  id="hide" onclick="myFunction()">
              
              
                                    <div id="message2">
                                          <strong id="err2">
                                          Entrez vostre mot de pass actuel
                                          </strong>
                                          </div>
                
                                  </div>
                                </div>
                                
                              </div>
                              <div class="row">
                              <div class="col-md-6 pl-2">
                                  <div class="form-group">
                                    <label >Nouveau mot de passe</label>
                                    <input id="nouv" name="current_password" type="password" 
                                    class="form-control form-control-lg @error('current_password') is-invalid @enderror" v-model="change.current_password">
                                    <img src="images/icons/img_476715.png" style="width:10%" id="show1" onclick="myFunction1()">
                                   <img src="images/icons/download.png" style="width:10%;height: 10%;display: none;"  id="hide1" onclick="myFunction1()">
                                    </div>
                                </div>
                                
                              </div>
                              <div class="row">
                              <div class="col-md-6 pl-2">
                                  <div class="form-group">
                                    <label >Entrez à nouveau le nouveau mot de passe</label>
                                    <input id="nouuv" name="new_password" type="password" class="form-control form-control-lg @error('new_password') is-invalid @enderror" v-model="change.new_password">
                                    <img src="images/icons/img_476715.png" style="width:10%" id="show2" onclick="myFunction2()">
                                   <img src="images/icons/download.png" style="width:10%;height: 5%;display: none;"  id="hide2" onclick="myFunction2()">
              
                                    <div id="message1">
                                          <strong id="err1">
                                          Les mots de passe ne sont pas identiques
                                          </strong>
                                          </div>
                                  </div>
                                </div>
                                
                              </div>
                             
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="" id="sub"  v-on:click="changePassword();"> Changer mot de pass</button>
              
                              </div>
                                
                            </div> 
              
                          </div>
                        </div>
                      </div>
        <div class="col-md-4" v-on:click="modif = false">
          <div class="card card-user">
            <div class="image">
              <img src="assetsClient/img/input/bg5.jpg" alt="...">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                       <img class="avatar border-gray" :src="'storage/profil_image/'+profiladmin.image" alt="..."> 
                </a>
                 <h5 class="title cl13">@{{ profiladmin.nom }} @{{ profiladmin.prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >@{{ profiladmin.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 " >@{{ profiladmin.numTelephone }}</div>
                </div>
              </div>
              
            </div>
            <hr>
            <div class="button-container">
              <a href="https://fr-fr.facebook.com/login/?cuid=AYhDmx48sR6SgDCj4JV3MYV8JfC13sNq3mnhOGhhROZIAsVBzuUFIA6iaDdkoxwds-br6j5a07aST_am1jwjTgH3cytQdv4jQU0a-pvjYtflCb2VGrRQdnEKQoxKcxb-n2zyprqTYUc2LKAg2iEIo14u&next" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://www.instagram.com/" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </div>
          </div>
        </div>
        
      </div>
  </div>
  <footer class="footer" >
        <div class=" container-fluid " v-on:click="modif = false">
          <nav >
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

 
@endsection

@push('javascripts')

<script>
function myFunction() {
  var x = document.getElementById("act");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show").style.display = "none";
    document.getElementById("hide").style.display = "block";

  } else {
    x.type = "password";
    document.getElementById("show").style.marginTop = "-30px";
    document.getElementById("show").style.display = "block";
    document.getElementById("hide").style.display = "none";

  }
}
function myFunction1() {
  var x = document.getElementById("nouv");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show1").style.display = "none";
    document.getElementById("hide1").style.display = "block";

  
  } 
  else {
    x.type = "password";
    document.getElementById("show1").style.marginTop = "-30px";
    document.getElementById("show1").style.display = "block";
    document.getElementById("hide1").style.display = "none";

  }
}
function myFunction2() {
  var x = document.getElementById("nouuv");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show2").style.display = "none";
    document.getElementById("hide2").style.display = "block";

  
  } else {
    x.type = "password";
    document.getElementById("show2").style.marginTop = "-30px";
    document.getElementById("show2").style.display = "block";
    document.getElementById("hide2").style.display = "none";

  }
}
</script>


<script>
        window.Laravel = {!! json_encode([
               'csrfToken' => csrf_token(),
                'admin'  => $admin,  //admin connecté
                'url'      => url('/')  
          ]) !!};
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        
        profiladmin:[],
        modif: false,
        profilclient:[],
        ProduitsPanier: [],
        favoris: [],
        imagesproduit: [],
        message:"hh",
        change: {
          changepassword: null,
          current_password: null,
          new_password: null,

        },
        oldInformation: {
          nom: window.Laravel.admin.nom,
          prenom: window.Laravel.admin.prenom,
          num: window.Laravel.admin.numTelephone,
          email: window.Laravel.admin.email,
          numB: window.Laravel.admin.numCarteBanquaire,
          msg: "hello",
      
        },
        message: {},
                   
      },
    methods: {
     
      modifieInfoProfils: function(){ 
        axios.put(window.Laravel.url+'/updateProfil',this.profiladmin)
            .then(response => {
                 this.profiladmin = response.data.admin;
                 Swal.fire(
                    "La Modification a été fait avec success!",
                      "",
                      'success'
                 );
                 this.modif = false;
                 this.message= {};
            })
            .catch(error =>{
                this.message = error.response.data.errors;
                 console.log('errors :' , error);
            })
      },
      annulerModif: function(){
        this.profiladmin.nom = this.oldInformation.nom;
        this.profiladmin.prenom = this.oldInformation.prenom;
        this.profiladmin.numTelephone = this.oldInformation.numTelephone;
        this.profiladmin.email = this.oldInformation.email;
        this.profiladmin.numCarteBanquaire = this.oldInformation.numCarteBanquaire;
        this.modif=false;
        this.message= {};
      },
      changePassword: function(){
          	axios.post(window.Laravel.url+'/changepassword',this.change)
              .then(response => {
                if(response.data.a == 0){
                  console.log('hi 0 :');
                  window.location.reload();

                }
                else if(response.data.a == 1){
                  console.log('hi 1:');

                  document.getElementById("nouv").style.borderColor = "red";
                  document.getElementById("nouuv").style.borderColor = "red";
                  document.getElementById("err1").style.display = "block";

                    }
                    else if(response.data.a == 2){
                      console.log('hi :2');

                      document.getElementById("act").style.borderColor = "red";
                      document.getElementById("err2").style.display = "block";

                    }

              
               })
              .catch(error => {
                window.location.reload();
                console.log('error :' , error);             })
          },
      profil_admin: function(){
        axios.get(window.Laravel.url+'/profilAdmin')

            .then(response => {
                 this.profiladmin = window.Laravel.admin;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
    },
    created:function(){
      this.profil_admin();
    }
  });
</script>

@endpush






