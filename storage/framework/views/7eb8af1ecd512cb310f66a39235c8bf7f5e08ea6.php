

<?php $__env->startSection('content'); ?>

  
  <head>
    <title><?php echo e(( 'Profile')); ?></title>
  </head>
  <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
  <div class="content" id="app" >
     <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Editer Profile</h5>
            </div>
            <div class="card-body">

             <form action="<?php echo e(url('/updateProfilA/'.$admin->id)); ?>" method="post" enctype="multipart/form-data" style="margin-top: 15px; font-weight: 700;">
                <input type="hidden" name="_method" value="PUT">
                <?php echo e(csrf_field()); ?>


              <!--form style="margin-top: 15px; font-weight: 700;" -->
                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profiladmin.nom" value="<?php echo e(old('nom')); ?>">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profiladmin.prenom" value="<?php echo e(old('prenom')); ?>">
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num" type="" class="form-control" v-model="profiladmin.numTelephone" value="<?php echo e(old('numTelephone')); ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="adresse_email" type="email" class="form-control" v-model="profiladmin.email" value="<?php echo e(old('admin')); ?>">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero compte BNQ</label>
                      <input name="bnq" type="text" class="form-control" v-model="profiladmin.numCarteBanquaire" value="<?php echo e(old('numCarteBanquaire')); ?>">
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
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>pays</label>
                      <input type="" class="form-control" placeholder="pays" value="Algerie" disabled="">
                    </div>
                  </div>
                </div>
                  
                <div class="row">
                  <div class="col-md-6">
                        <button type="submit"  value="Modifier" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" >Modifier</button>     
                  </div>
                  <div class="col-md-6">
                    <a class=" btn btn-danger btn-block" type="submit" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" href="<?php echo e(route('profilAdmin')); ?>">Annuler</a>
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

 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>


<script src="<?php echo e(asset('js/vue.js')); ?>"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 
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
      },
    methods: {
      profil_admin: function(){
        axios.get(window.Laravel.url+'/profilAdmin')

            .then(response => {
                 this.profiladmin = window.Laravel.admin;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      }
    },
    mounted:function(){
      this.profil_admin();
    }
  });
</script>

<?php $__env->stopPush(); ?>







<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/profil_admin.blade.php ENDPATH**/ ?>