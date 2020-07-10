

<?php $__env->startSection('content'); ?>

  
  <head>
    <title><?php echo e(( 'Profile')); ?></title>
  </head>
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
                      <input name="nom" type="text" class="form-control" v-model="profiladmin.nom" value="<?php echo e(old('nom')); ?>" v-on:click="modif = true" :class="{'is-invalid' : message.nom}">
                      <span class="px-3 cl13" v-if="message.nom" v-text="message.nom[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profiladmin.prenom" value="<?php echo e(old('prenom')); ?>" v-on:click="modif = true" :class="{'is-invalid' : message.prenom}">
                      <span class="px-3 cl13" v-if="message.prenom" v-text="message.prenom[0]"></span>
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num" type="" class="form-control" v-model="profiladmin.numTelephone" value="<?php echo e(old('numTelephone')); ?>" v-on:click="modif = true" :class="{'is-invalid' : message.numTelephone}">
                      <span class="px-3 cl13" v-if="message.numTelephone" v-text="message.numTelephone[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="email" type="email" class="form-control" v-model="profiladmin.email" value="<?php echo e(old('email')); ?>" v-on:click="modif = true" :class="{'is-invalid' : message.email}">
                      <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero compte BNQ</label>
                      <input name="bnq" type="text" class="form-control" v-model="profiladmin.numCarteBanquaire" value="<?php echo e(old('numCarteBanquaire')); ?>" v-on:click="modif = true" :class="{'is-invalid' : message.numCarteBanquaire}">
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
                  <img class="avatar border-gray" src="assetsClient/img/input/profil_img.jpg" alt="...">
                </a>
                 <h5 class="title cl13">{{ profiladmin.nom }} {{ profiladmin.prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >{{ profiladmin.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 " >{{ profiladmin.numTelephone }}</div>
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

 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>


<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                'admin'  => $admin,  //admin connecté
                'url'      => url('/')  
          ]); ?>;
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        
        profiladmin:[],
        modif: false,
        oldInformation: {
          nom: window.Laravel.admin.nom,
          prenom: window.Laravel.admin.prenom,
          num: window.Laravel.admin.numTelephone,
          email: window.Laravel.admin.email,
          numB: window.Laravel.admin.numCarteBanquaire,
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

<?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/profil_admin.blade.php ENDPATH**/ ?>