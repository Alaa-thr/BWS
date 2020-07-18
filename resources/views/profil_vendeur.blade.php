@extends('layouts.template_vendeur')

@section('content')

  
  <head>
    <title>{{ ( 'Profile') }}</title>
  </head>
  
   <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" >
        <div class="container-fluid"  >
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Profile </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
  <div class="content" id="app" id='pr'>
     <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Editer Profile</h5>
            </div>
            <div class="card-body">
            <form action="{{ url('/updateProfilV/'.$vendeur->id) }}" method="post" enctype="multipart/form-data" style="margin-top: 15px; font-weight: 700;">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

              <!--form style="margin-top: 15px; font-weight: 700;" -->

                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profilvendeur.Nom" value="{{old('Nom')}}" v-on:click="modif = true">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profilvendeur.Prenom" value="{{old('Prenom')}}" v-on:click="modif = true">
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num" type="text" class="form-control" v-model="profilvendeur.numTelephone" value="{{old('numTelephone')}}" v-on:click="modif = true">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="adresse_email" type="email" class="form-control" v-model="profilvendeur.email" value="{{old('email')}}" v-on:click="modif = true">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero compte BNQ</label>
                      <input name="bnq" type="text" class="form-control" v-model="profilvendeur.Num_Compte_Banquaire " value="{{old('Num_Compte_Banquaire ')}}" v-on:click="modif = true">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pl-2">
                    <div class="form-group">
                      <label >Adresse</label>
                      <input type="text" class="form-control" placeholder="Home Address" v-on:click="modif = true">
                    </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                      <label >Boutique</label>
                      <input name="boutique" type="text" class="form-control" v-model="profilvendeur.Nom_boutique" value="{{old('Nom_boutique')}}" v-on:click="modif = true">
                    </div>
                  </div>
                  <div class="col-md-4 px-2">
                    <div class="form-group">
                      <label>pays</label>
                      <input type="" class="form-control" placeholder="pays" value="Algerie" disabled="disabled">
                    </div>
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-6">
                    <button v-if="modif" type="submit"  value="Modifier" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" >Modifier</button>     
                  </div>
                  <div class="col-md-6">
                    <button v-if="modif" class=" btn btn-danger btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" v-on:click="modif = false">Annuler</button>
                  </div>
                </div>
              </form>
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
        <div class="col-md-4" >
          <div class="card card-user">
            <div class="image">
              <img src="assetsClient/img/input/bg5.jpg" alt="...">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                       <img class="avatar border-gray" :src="'storage/profil_image/'+profilvendeur.image" alt="..."> 
                </a>
                 <h5 class="title cl13">@{{ profilvendeur.Nom }} @{{ profilvendeur.Prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >@{{ profilvendeur.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 " >@{{ profilvendeur.numTelephone }}</div>
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
                'vendeur'  => $vendeur,  //vendeur connecté
                'url'      => url('/')  
          ]) !!};
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        
        profilvendeur:[],           
        modif: false,
        msg: "hello",
        profilclient:[],
        ProduitsPanier: [],
        favoris: [],
        imagesproduit: [],
        message:"hh",
        change: {
          changepassword: null,
          current_password: null,
          new_password: null,

        }
      },
    methods: {
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
               
                console.log('error :' , error);             })
          },
      profil_vendeur: function(){
        axios.get(window.Laravel.url+'/profilVendeur')

            .then(response => {
                 this.profilvendeur = window.Laravel.vendeur;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      }
    },
    mounted:function(){
      this.profil_vendeur();
    }
  });
</script>

@endpush






