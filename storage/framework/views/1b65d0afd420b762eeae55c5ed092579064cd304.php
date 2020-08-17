

<?php $__env->startSection('content'); ?>

	<head>
    <title><?php echo e(( 'Profile')); ?></title>
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
    
              
                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profilemployeur.nom" value="<?php echo e(old('nom')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.nom}">
                      <span class="px-3 cl13" v-if="message.nom" v-text="message.nom[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profilemployeur.prenom" value="<?php echo e(old('prenom')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.prenom}">
                      <span class="px-3 cl13" v-if="message.prenom" v-text="message.prenom[0]"></span>
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num" type="text" class="form-control" v-model="profilemployeur.num_tel" value="<?php echo e(old('num_tel')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.num_tel}">
                      <span class="px-3 cl13" v-if="message.num_tel" v-text="message.num_tel[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="adresse_email" type="email" class="form-control" v-model="profilemployeur.email" value="<?php echo e(old('email')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.email}">
                      <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero compte BNQ</label>
                      <input name="bnq" type="text" class="form-control" v-model="profilemployeur.num_compte_banquiare" value="<?php echo e(old('num_compte_banquiare')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.num_compte_banquiare}">
                      <span class="px-3 cl13" v-if="message.num_compte_banquiare" v-text="message.num_compte_banquiare[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pl-2">
                    <div class="form-group">
                      <label >Adresse Societe/Boutique</label>
                      <input type="text" class="form-control" v-model="profilemployeur.address" v-on:click="modif = true":class="{'is-invalid' : message.address}">
                      <span class="px-3 cl13" v-if="message.address" v-text="message.address[0]"></span>
                    </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                      <label >Societe/Boutique</label>
                      <input name="societe" type="text" class="form-control" v-model="profilemployeur.nom_societe" value="<?php echo e(old('nom_societe')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.nom_societe}">
                      <span class="px-3 cl13" v-if="message.nom_societe" v-text="message.nom_societe[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-5 px-2">
                    <div class="form-group">
                      <label>pays</label>
                      <input type="" class="form-control" placeholder="pays" value="Algerie" disabled="disabled">
                    </div>
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-6">
                    <button v-if="modif"  value="Modifier" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" @click='Modifier()' >Modifier</button>     
                  </div>
                  <div class="col-md-6">
                    <button v-if="modif" class=" btn btn-danger btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" v-on:click="modif = false">Annuler</button>
                  </div>
                </div>
        
              <hr>
              <div class="row" @click='modif = false;'>
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label >Mot de passe actuel</label>
                        <input id="act" name="PasswordCurrent" type="password" class="form-control form-control-lg" :class="{'is-invalid' : message.PasswordCurrent}"  v-model="change.PasswordCurrent">

                        <div style="margin-top: -25px">
                          <i class="zmdi zmdi-eye zmdi-hc-2x"  id="show" onclick="myFunction()"></i>
                         <i class="zmdi zmdi-eye-off zmdi-hc-2x" id="hide"  onclick="myFunction()" style="margin-top: -35px"></i>
                        </div>
                        <span class="px-3 cl13" v-if="message.PasswordCurrent" v-text="message.PasswordCurrent[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row" @click='modif = false;'>
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label >Nouveau mot de passe</label>
                        <input id="nouv" name="NewPassword" type="password" 
                        class="form-control form-control-lg " :class="{'is-invalid' : message.NewPassword}" v-model="change.NewPassword">
                        <div style="margin-top: -25px">
                          <i class="zmdi zmdi-eye zmdi-hc-2x"  id="show1" onclick="myFunction1()" ></i>
                          <i class="zmdi zmdi-eye-off zmdi-hc-2x" id="hide1"  onclick="myFunction1()" style="margin-top: -35px"></i>
                        </div>
                        <span class="px-3 cl13" v-if="message.NewPassword" v-text="message.NewPassword[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row" @click='modif = false;'>
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label >Entrez à nouveau le nouveau mot de passe</label>
                        <input id="nouuv" name="ConfirmPassword" type="password" class="form-control form-control-lg" :class="{'is-invalid' : message.ConfirmPassword}" v-model="change.ConfirmPassword">
                        <div style="margin-top: -25px">
                          <i class="zmdi zmdi-eye zmdi-hc-2x"  id="show2" onclick="myFunction2()"></i>
                          <i class="zmdi zmdi-eye-off zmdi-hc-2x" id="hide2"  onclick="myFunction2()" style="margin-top: -35px"></i>
                        </div>
                        <span class="px-3 cl13" v-if="message.ConfirmPassword" v-text="message.ConfirmPassword[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group" @click='modif = false;'>
                  <div class="col-md-6 col-md-offset-4">
                      <button id="sub" class="btn btn-info" style="border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" v-on:click="changePassword();"> Changer mot de pass</button>
                  </div>
                </div>
              
                          </div>
                        </div>
                      </div>
        <div class="col-md-4" @click='modif = false;'>
          <div class="card card-user">
            <div class="image">
              <img src="assetsClient/img/input/bg5.jpg" alt="...">
            </div>
            <div class="card-body m-b-20">
              <div class="author">
                <a href="#">
                       <img class="avatar border-gray" :src="'storage/profil_image/'+profilemployeur.image" alt="..."> 
                </a>
                 <h5 class="title cl13">{{ profilemployeur.nom }} {{ profilemployeur.prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >{{ profilemployeur.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 " >{{ profilemployeur.num_tel }}</div>
                </div>
              </div>
            </div>
            <!--<hr>
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
            </div>-->
          </div>
        </div>
        
      </div>
  </div>

      
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>


<script>
function myFunction() {
  var x = document.getElementById("act");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show").style.display = "none";
    document.getElementById("hide").style.display = "block";

  } else {
    x.type = "password";
    document.getElementById("show").style.marginTop = "-35px";
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
    document.getElementById("show1").style.marginTop = "-35px";
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
    document.getElementById("show2").style.marginTop = "-35px";
    document.getElementById("show2").style.display = "block";
    document.getElementById("hide2").style.display = "none";

  }
}
</script>



<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                'employeur'=>$employeur,  //employeur connecté
               'url'       => url('/')  
          ]); ?>;
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        
        profilemployeur:[],
        modif: false,   
        msg: "hello",
        profilclient:[],
        ProduitsPanier: [],
        favoris: [],
        imagesproduit: [],
        change: {
          PasswordCurrent: null,
          NewPassword: null,
          ConfirmPassword: null,

        },
        message: {},        
      },
    methods: {

        Modifier(){
          console.log("this.profilemployeur",this.profilemployeur)
            axios.post(window.Laravel.url+'/updateProfilE',this.profilemployeur)
              .then(response => {
                this.message={};
                window.location.reload();
              })
              .catch(error => {
              
                this.message = error.response.data.errors;
                console.log('error :' , this.message);             })
        },
        changePassword: function(){
            axios.post(window.Laravel.url+'/changepassword',this.change)
              .then(response => {
                this.message={};
                window.location.reload();
              })
              .catch(error => {
              
                this.message = error.response.data.errors;
                console.log('error :' , this.message);             })
          },
      
      profil_employeur: function(){
        axios.get(window.Laravel.url+'/profilEmployeur')

            .then(response => {
                 this.profilemployeur = window.Laravel.employeur;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      }
    },
    mounted:function(){
      this.profil_employeur();
    }
  });
</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.template_employeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/profil_employeur.blade.php ENDPATH**/ ?>