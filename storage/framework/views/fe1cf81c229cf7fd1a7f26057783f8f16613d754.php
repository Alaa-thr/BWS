

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
            <form action="<?php echo e(url('/updateProfilV/'.$vendeur->id)); ?>" method="post" enctype="multipart/form-data" style="margin-top: 15px; font-weight: 700;">
                <input type="hidden" name="_method" value="PUT">
                <?php echo e(csrf_field()); ?>


              <!--form style="margin-top: 15px; font-weight: 700;" -->

                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profilvendeur.Nom" value="<?php echo e(old('Nom')); ?>">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profilvendeur.Prenom" value="<?php echo e(old('Prenom')); ?>">
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num" type="text" class="form-control" v-model="profilvendeur.numTelephone" value="<?php echo e(old('numTelephone')); ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="adresse_email" type="email" class="form-control" v-model="profilvendeur.email" value="<?php echo e(old('email')); ?>">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero compte BNQ</label>
                      <input name="bnq" type="text" class="form-control" v-model="profilvendeur.Num_Compte_Banquaire " value="<?php echo e(old('Num_Compte_Banquaire ')); ?>">
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
                      <label >Boutique</label>
                      <input name="boutique" type="text" class="form-control" v-model="profilvendeur.Nom_boutique" value="<?php echo e(old('Nom_boutique')); ?>">
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
                        <button type="submit"  value="Modifier" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" >Modifier</button>     
                  </div>
                  <div class="col-md-6">
                    <a class=" btn btn-danger btn-block" type="submit" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" href="<?php echo e(route('profilVendeur')); ?>">Annuler</a>
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
                 <h5 class="title cl13">{{ profilvendeur.nom }} {{ profilvendeur.prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >{{ profilvendeur.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 " >{{ profilvendeur.numTelephone }}</div>
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

 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>


<script src="<?php echo e(asset('assetsClient/js/vue.js')); ?>"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 
<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                'vendeur'  => $vendeur,  //vendeur connecté
                'url'      => url('/')  
          ]); ?>;
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        
        profilvendeur:[],           
      },
    methods: {
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

<?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/profil_vendeur.blade.php ENDPATH**/ ?>