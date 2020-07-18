

<?php $__env->startSection('content'); ?>
  
    <head>
          <title><?php echo e(( 'Admin ')); ?></title>
      </head>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Admin</h4>
                <div  style="margin-left: 550px; margin-top: -45px; ">
                    <select class="formm-control" onchange="window.location.href=this.value" style=" width: 250px; height: 40px; border-radius: 0.8em; cursor: pointer;">
                      <option  style="border:none;" value="0" selected="selected" disabled="disabled">Recuperer les utilisateurs   :</option>
                      <option value="recupervendeur">Recuperer vendeurs</option>
                      <option value="recuperclient">Recuperer clients</option>
                      <option value="recupemployeur">Recuperer employeurs</option>
                      <option value="recuperadmin">Recuperer admins</option>
                    </select>
                </div>
                <div style="margin-left: 830px ; margin-top: -48px;">
                  <button class="btn btn-sm btn-block btn-info js-show-modal1" style="width: 160px; border-radius: 0.5em; height: 35px; box-shadow: 0 5px 25px rgba(0,0,0,.2);" v-on:click="AfficherAjout()">
                    <b> Ajouter Admin</b>
                  </button>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive" style="height: 420px; margin-top: 65px;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th >
                        <b >Indice</b>
                      </th>
                      <th >
                        <b>Nom_Prenom</b>
                      </th>
                      <th >
                        <b >N°Téléphone</b>
                      </th>
                      <th >
                        <b >Email</b>
                      </th>
                      <th>
                        <b> Type </b>
                      </th>
                      <th>
                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="admina in adminadmin" class="js-show-modal1" >
                        <td   v-on:click="AfficherInfo(admina.id)" style="cursor: pointer;">
                         {{admina.id}}  
                        </td>
                        <td  v-on:click="AfficherInfo(admina.id)" style="cursor: pointer;">
                          {{admina.nom}} {{admina.prenom}} 
                        </td>
                        <td  v-on:click="AfficherInfo(admina.id)" style="cursor: pointer;">
                          {{admina.numTelephone}} 
                        </td>
                        <td  v-on:click="AfficherInfo(admina.id)" style="cursor: pointer;">
                          {{admina.email}} 

                        </td>
                        <td v-if="admina.big_admin === '1' "  v-on:click="AfficherInfo(admina.id)" style="cursor: pointer;">
                           Admin Supèrieure
                        </td>
                        <td v-else  v-on:click="AfficherInfo(admina.id)" style="cursor: pointer;">
                          Admin Simple
                        </td>
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsAdmin/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: -10px; margin-right: -10px;">
                              <a class="dropdown-item js-show-modal1" href="#" id="k2" v-on:click="AfficherInfo(admina.id)">Details</a>
                              <a class="dropdown-item" href="#" id="k2" v-on:click="deleteAdmin(admina)">Supprimer</a>
                            </div>
                        </td>
                        <td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                   <?php echo e($admin->links()); ?>

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
            </script>, Desinger par <a href="https://www.invisionapp.com" target="_blank">BS</a>. Codé par <a href="https://www.creative-tim.com" target="_blank">BASMAHW&S</a>.
          </div>
        </div>
      </footer>
    </div>
  
  <!--   Core JS Files   -->
  <!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-if="hideModel">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo"  style="width: 985px;" v-for="adminaa in adminadmin2">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE"  v-on:click="CancelAdmin()">
          </button>
          <section class=" creat-article " style="margin-top: 50px;">
            <div class="container-creat-article">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6" style="margin-left: -60px; margin-top: -20px;">
                    <div class="card card-user" >
                      <div class="image">
                        <img src="assetsClient/img/input/bg5.jpg" alt="...">
                      </div>
                      <div class="card-body" >
                          <div class="author">
                            <a href="#">
                              <img class="avatar border-gray" src="assetsClient/img/input/profil_img.jpg" alt="..."/>
                            </a>
                            <h5 class="title cl13">{{ adminaa.nom }} {{ adminaa.prenom }}
                            </h5>
                          </div>
                          <div style="margin-top: 30px;">
                            <hr>
                          </div>
                           <div class="row">
                            <div class=" title" style="margin-left: 20px; margin-top: 50px;">Email</div>
                            <div class="title" style="margin-top: 50px; margin-left: 35px;">:</div>
                            <div class="author" style="margin-left: 10px; color:black; margin-top: 50px;"><b>{{ adminaa.email }}</b></div>
                          </div>
                          <div class="row" >
                            <div class=" title" style="margin-left: 20px; margin-top: 40px;">Numero</div>
                            <div class="title" style="margin-top: 40px; margin-left: 20px;">:</div>
                            <div  style="margin-left: 10px; color:black; margin-top: 40px; height: 70px;"><b>{{ adminaa.numTelephone }}</b></div>
                          </div>
                      </div>
                    </div>
                  </div>
                    <img src="../assetsAdmin/img/icon_admin.png" alt="..." style="margin-left: 480px; margin-top: -800px; width: 40px;">
                  <table>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -300px;">
                          Crée Le
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -300px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -300px; color: red;">
                          {{ adminaa.created_at }}
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="title" style="margin-left: 350px; margin-top: -250px;">
                          N° compte BNQ
                        </div>  
                      </td>
                      <td>
                        <div class="title" style="margin-left: 20px; margin-top: -250px;">
                          :
                        </div>
                      </td>
                      <td>
                        <div style="margin-left: 30px; margin-top: -250px;">
                          {{ adminaa.numCarteBanquaire }}
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </section>    
        </div>

<!--***********************************************************************
  ******************************************-->
        <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout" style=" width: 985px; padding-top: 45%" >
          <button class="how-pos3 hov3 trans-04 p-t-6" >
            <img src="images/icon-close.png" alt="CLOSE" v-on:click="CancelAjout(adm)">
          </button>
          <section class=" creat-article ">     
            <div  class=" container-creat-article" style="margin-top: -55px;">
                <?php echo csrf_field(); ?>
                  <div class="row m-t-20">
                    <div class="col-md-5 pr-2" >
                      <div class="form-group mb-3">
                        <label>Nom</label>
                        <input  type="text" class="formm-control " placeholder="Votre nom doit commencer par un Maj" style="width: 310px;" v-model="adm.nom" :class="{'is-invalid' : message.nom}">
                        <span class="px-3 cl13" v-if="message.nom" v-text="message.nom[0]"></span>
                      </div>
                    </div>
                    <div class="col-md-5 pr-2" >
                      <div class="form-group mb-3">
                        <label>Prenom</label>
                        <input  type="text" class="formm-control" placeholder="Votre prenom doit commencer par un Maj" v-model="adm.prenom" :class="{'is-invalid' : message.prenom}">
                        <span class="px-3 cl13" v-if="message.prenom" v-text="message.prenom[0]"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-5 pr-2" >
                      <div class="form-group">
                        <label>Numero de telephone</label>
                        <input type="text" class="formm-control" placeholder="05/07/06********" v-model="adm.numTelephone" :class="{'is-invalid' : message.numTelephone}">
                        <span class="px-3 cl13" v-if="message.numTelephone" v-text="message.numTelephone[0]"></span>
                      </div>
                    </div>
                    <div class="col-md-5 pr-2" >
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="formm-control" placeholder="Adresse email" v-model="adm.email" :class="{'is-invalid' : message.email}">
                        <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-10 pr-2">
                      <div  class="form-group">
                        <label>Password</label>
                        <input type="Password" id="mtps" class="formm-control" placeholder="mot de passe****"style="width: 640px;" v-model="adm.mtps" :class="{'is-invalid' : message.mtps}">
                        <span class="px-3 cl13" v-if="message.mtps" v-text="message.mtps[0]"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-10 pr-2" >
                      <div class="form-group" >
                        <label for="image" >image</label>
                        <input type="file" class="formm-control" v-on:change="imagePreview" :class="{'is-invalid' : message.image}">
                        <span class="px-3 cl13" v-if="message.image" v-text="message.image[0]"></span>
                      </div>
                   </div>
                  </div>
                  <div class="row" style="margin-top: 20px;">
                    <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label for="">Numero de compte BNQ</label>
                        <input type="text" class="formm-control" placeholder="N° compte BNQ" v-model="adm.numCarteBanquaire" :class="{'is-invalid' : message.numCarteBanquaire}">
                        <span class="px-3 cl13" v-if="message.numCarteBanquaire" v-text="message.numCarteBanquaire[0]"></span>
                      </div>
                    </div>
                    <div class="col-md-5 pr-2">
                      <div class="form-group" >
                        <label for="typeAdmin">Type</label>
                        <select class="form-control" id="typeAdmin" name ="typeAdmin" style="border-radius: 0.3em;" @change="SaveTypeAdmin($event)" :class="{'is-invalid' : message.type}">
                            <option value="" hidden selected>Choisir un type:</option>
                            <option value="1">Big-admin</option>
                            <option value="2">Admin simple</option>
                        </select>
                        <span class="px-3 cl13" v-if="message.type" v-text="message.type[0]"></span>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <button type="submit"  class="btn btn-success btn-block " style="margin-top:60px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 300px; margin-left: 10px;" v-on:click="addAdmin()">Ajouter
                      </button>     
                    </div>
                    <div class="col-md-5">
                      <button type="submit"  class="btn btn-danger btn-block " style="margin-top:60px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700; width: 300px; margin-left: -10px;" v-on:click="CancelAjout(adm)">Annuler
                      </button>
                    </div>
                </div>
             
            </div>
          </section>
              
        </div>
      </div>
    </div>
  <!--*****************************************************************************************************************************************************************************************************************************-->
 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>



<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                  'admin' => $admin,  //admin connecté
                'url'      => url('/')  
          ]); ?>;
</script>

<script>
  Vue.mixin({

        methods:{
          addAdmin: function(){

            app2.adm.image = app2.image;
            axios.post(window.Laravel.url+"/addadmin",app2.adm)

            .then(response => {
              if(response.data.etat){
                 app2.adm = response.data.adminAjout;
                 app2.adm.id = response.data.adminAjout.id;
                 window.location.reload();
                 app.adminadmin.push(app2.adm);
                 app2.adm={
                      id: 0,
                      nom: '',
                      prenom: '',
                      email: '',
                      big_admin: 0,
                      type: 0,
                      numTelephone: '', 
                      numCarteBanquaire: '',
                      image: '',
                      mtps: '',
                 };
                 app2.hideModel=false;
                 app2.openAjout = false;
                 app2.image = '';
                 app2.message  = {};
              }          
            })
            .catch(error =>{
                app2.message = error.response.data.errors;
                console.log('errors :' , app2.message);
            })
      },         
    }                     
  });
  var app2 = new Vue({
     el: '#app2',
     data:{
        adminadmin2: [],
        hideModel: false,
        openInfo: false,
        openAjout: false,
        adm: {// bach n7ato fih l'article di nzaftohom l controller (pour les modification et l'ajout) et nestokiw fihom les resultats di yzafethomlna les methods di f controller
          id: 0,
          nom: '',
          prenom: '',
          email: '',
          big_admin: 0,
          type: '',
          numTelephone: '', 
          numCarteBanquaire: '',
          image: '',
          mtps: '',
        },
        detailsAD:{
          idAD: 0,
          
        },
        image: '',
        message: {},
     },
     methods: {
           SaveTypeAdmin:function(event){
              this.adm.big_admin = event.target.value;
              this.adm.type = event.target.value;
           },
           details_admin: function(){
             axios.post(window.Laravel.url+'/detailsadmin',this.detailsAD)

            .then(response => {
                 this.adminadmin2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      CancelAdmin: function(){
        this.hideModel = false;
        this.openInfo = false;
      },
      imagePreview(event) {//ki ndakhlo une image f formulaire limage  
           var fileR = new FileReader();//l'objet FileReader yjibelna le contenu de fichiers ou donnees ki nselictionniw una fichier f input
           fileR.readAsDataURL(event.target.files[0]);//Cette méthode démarre la lecture du contenu pour le blob "event.target.files[0]". Une fois que la lecture est terminée, l'attribut result contient une URL de données qui représente les données du fichier (c a d ya2ralna les donnee ta3 image di dakhalnaha), "event.target.files[0]" fiha l'image di dakhalnaha
           fileR.onload = (event) => {
              
              this.image = event.target.result;//n7ato had les info ta3 image attribut 'image'
           }
           
      },
      CancelAjout: function(admin){
        this.openAjout = false;
        this.hideModel = false;
        this.adm = {
          id: 0,
          nom: '',
          prenom: '',
          email: '',
          type: '',
          numTelephone: '', 
          numCarteBanquaire: '',
          image: '',
          mtps: '',
        };
        this.message={};
        app2.image = '';
      },
       
    },
   });
   var app = new Vue({

    el: '#app',
    data:{
        
        adminadmin:[],           
      },
    methods: {
      admin_admin: function(){
        axios.get(window.Laravel.url+'/admin')

            .then(response => {
                 this.adminadmin = window.Laravel.admin.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      AfficherAjout: function(){
         app2.hideModel = true;
         app2.openAjout = true;
         app2.openInfo = false; 
      },
      AfficherInfo: function($id){
        app2.hideModel=true;
        app2.openInfo=true;
        app2.detailsAD.idAD= $id;
        app2.details_admin();
      },
      deleteAdmin:function(adm){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De supprimer ce admin ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/deleteadmin/'+adm.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.adminadmin.indexOf(adm);
                             this.adminadmin.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log('errors : ',error)
                     })
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success',
                    )
                  }
                })
          
            
        },
    },
    created:function(){
      this.admin_admin();
    }
  });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/admin_admin.blade.php ENDPATH**/ ?>