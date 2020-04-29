@extends('layouts.template_clinet')
@push('javascripts')


<script src="{{ asset('assetsClient/js/vue.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 
<script>
        window.Laravel = {!! json_encode([
               'csrfToken' => csrf_token(),
                'client'=>$client,  //client connecté
               'url'       => url('/')  
          ]) !!};
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        msg: "hello",
        profilclient:[],
                   
      },

    methods: {
      profil_clinet: function(){
        axios.get(window.Laravel.url+'/profilClient')

            .then(response => {
                 this.profilclient = window.Laravel.client;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      }
      
    },
    mounted:function(){
      this.profil_clinet();
    }
  });
</script>

@endpush

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
              <form action="{{ url('/updateProfilC/'.$client->id) }}" method="post" enctype="multipart/form-data" style="margin-top: 15px; font-weight: 700;">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

              <!-- <form style="margin-top: 15px; font-weight: 700;" > -->

                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profilclient.nom" value="{{old('nom')}}">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profilclient.prenom" value="{{old('prenom')}}">
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num_telephone" type="text" class="form-control" v-model="profilclient.numeroTelephone" value="{{old('numeroTelephone')}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="adresse_email" type="email" class="form-control" v-model="profilclient.email" value="{{old('email')}}">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Code postal</label>
                      <input name="code_postal" type="text" class="form-control" v-model="profilclient.codePostal" value="{{old('codePostal')}}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pl-2">
                    <div class="form-group">
                      <label >Adresse</label>
                      <input type="text" class="form-control" placeholder="Home Address" >
                    </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                      <label >Ville</label>
                      <input name="v" type="text" class="form-control" v-model="profilclient.ville" value="{{old('ville')}}">
                    </div>
                  </div>
                  <div class="col-md-4 px-2">
                    <div class="form-group">
                      <label>pays</label>
                      <input type="" class="form-control" placeholder="pays" value="Algerie">
                    </div>
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-6">
                        <button type="submit" value="Modifier" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" >Modifier</button> 
                  </div>
                  <div class="col-md-6"> 
                    <a class=" btn btn-danger btn-block" type="submit" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" href="{{ route('profilClient') }}">Annuler</a>
                   </div>
                </div>
              </form>
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
                  <img class="avatar border-gray" src="assetsClient/img/input/profil_img.jpg" alt="...">
                </a>
                 <h5 class="title cl13">@{{ profilclient.nom }} @{{ profilclient.prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >@{{ profilclient.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 Email" >@{{ profilclient.numeroTelephone }}</div>
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








