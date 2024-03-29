

<?php $__env->startSection('content'); ?>

    <head>
          <title><?php echo e(( 'Categorie ')); ?></title>
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
      <form  action="/categorieS" method="get" id="sbmt" name='sbmt'>
      <div class="input-group no-border"  style="left: -40px;">
        <input type="search" name="search"  class="form-control" placeholder="Rechercher..." >
        <div class="input-group-append">
          <div class="input-group-text">
            <i class="now-ui-icons ui-1_zoom-bold" onclick="document.forms['sbmt'].submit();"></i>
          </div>
        </div>
      </div>
    </form>
      <ul class="navbar-nav" >
        <li>
          <div style="margin-top: 10px; margin-right: 10px;">
              <div id="google_translate_element"></div>                       
          </div>
        </li>
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
              <h6 class="description text-left" ><b id="a"> <?php echo e($admin->nom); ?> <?php echo e($admin->prenom); ?></b></h6><a href ="<?php echo e($admin->email); ?>" id ="nab"><?php echo e($admin->email); ?></a>
          </td>
        </tr>
        </table>
    </a>  
</div>
<div style="width: 255px; margin-left: 20px;"> 
    <hr >
  </div>
    <a class="dropdown-item" href="<?php echo e(route('accueil')); ?>" id="n"><i class="now-ui-icons business_bank" id="m"></i><b>Allez vers Acceuil</b></a>
    <a class="dropdown-item" href="<?php echo e(route('profilAdmin')); ?>" id="n"><i class="now-ui-icons users_single-02" id="m"></i><b>Profil</b></a>
    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="n">
      <i class="now-ui-icons media-1_button-power" id="m"></i>__('Déconnexion') }} </a>
      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?>
      </form>
          </div>
        </div> 
    </li>
                                                               
   </ul>
  </div>
</div>
</nav>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header col-md-12" >
                <div class="col-md-12" style=" display: inline-flex;">
                  <div class="col-md-5" style=" display: inline-flex;">
                        <input type="checkbox" id="categorie" @change="selectAll()" v-model="allSelected">
                        <label for="categorie"></label>
                        <h4 style="margin-top: -6px;">Categories</h4>
                  </div>
                  
                  <div class=" col-md-9" style="display: inline-flex;">
                    <div class="col-md-5">
                      <select  class="form-control" onchange="window.location.href=this.value" style="float: right;margin-top: -3px; border-radius: 0.8em; height: 40px; cursor: pointer;">
                      <option value="0" selected disabled>Choisie le type de Categories :</option>
                      <option value="shopCategories">Shop Categories</option>
                      <option value="emploiCategories">Emploi Categories</option>
                    </select>
                    </div>
                   <div class="col-md-8" style="display: inline-flex;">
                      <div v-if="suppr" class="col-md-4">
                        <button  class="btn btn-sm btn-danger" style="margin-top: -3px; border-radius: 0.8em; height: 40px;"  v-on:click="deleteArrayCategorie()"><b>supprimer</b></button>
                      </div>
                      <div v-if="suppr" class="col-md-4">
                        <button  class="btn btn-sm btn-warning" style=" margin-top: -3px;border-radius: 0.8em; height: 40px;" v-on:click="AnnulerSel" ><b>Annuler</b></button>
                      </div>
                      <div v-else class="col-md-11">
                        <button  class=" btn btn-sm " style="margin-top: -3px; border-radius: 0.8em; background-color: #00CED1; height: 40px;  " v-on:click="ajouterCategorie" ><b>Ajouter une Catégorie</b></button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row col-md-12" v-if="open" style=" display: inline-flex; ">
                  <div class="col-md-8 ">
                    <div class="form-group col-md-13">
                      <label ><b>Nom</b></label>
                      <input name="nom" type="text" class="form-control" placeholder="Entrez le nom de catégorie (Le nom doit être commencé avec un Maj ou un Numero)" v-model="ccategorie.libelle" style="color: black;" :class="{'is-invalid' : message.libelle}"/>
                      <span class="px-3" style="color: #ca2323" v-if="message.libelle" v-text="message.libelle[0]"></span>

                      <div style="display: inline-flex; margin-top: 10px;">

                        <select v-if="edit === false" class="form-control" id="typeCategorie" name ="typeCategorie" @change="SavetTypeCategorie($event)" :class="{'is-invalid' : message.typeCategorie}" style="margin-right: 20px; height: 38px;">
                        <option value="0" selected disabled>Choisie le type de Categories :</option>
                        <option value="shop">Shop Categories</option>
                        <option value="emploi">Emploi Categories</option>
                        </select>                        
                        <input type="file" class="form-control "  v-on:change="imagePreview" accept="image/*" :class="{'is-invalid' : message.image}" accept="image/png, image/jpeg" style="height: 38px;">
                        <input v-if="edit === true" type="file" class="form-control "  v-on:change="imagePreview" accept="image/*" :class="{'is-invalid' : message.image}" accept="image/png, image/jpeg" style="height: 38px;">
                        
                      </div>
                      <span class="px-3" v-if="message.typeCategorie" v-text="message.typeCategorie[0]" style="color: #ca2323"></span>
                    </div>
                  </div>
                  <div class="col-md-4" style="margin-top: 30px; display: inline-flex;">
                    
                    
                    <div v-if="edit" class="col-md-6 ">
                        <button  type="submit" class="btn btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="updateCategorieButton()">Modifier</button>
                    </div>
                    <div v-else class="col-md-6 ">
                        <button  type="submit" class="btn btn-success btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="addCategorie" >Ajouter</button>
                     </div>
                     <div  class="col-md-6 "style="  height: 30px;   ">
                          <button type="submit" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="CancelCatego(ccategorie)">Annuler </button>
                     </div>

                  
                  </div> 
                </div>
                  <div class="row col-md-12" v-if="open" style="padding-bottom: 10px;">
                    <div class=" alert-warning" role="alert" style="padding-left: 10px;padding-top: 1px;padding-bottom: 1px;">
                      <i class="now-ui-icons travel_info" id="y"></i>
                       Vous pouvez choisir des images pour votre catégories ici:<a href="https://www.flaticon.com" class="alert-link" target=_blank> Free Vector Icons</a>. Et l'image doit etre de taille 16x16 px, pour avoir une organisation comme
                      <b class="alert-link " style="cursor: pointer;text-decoration: underline;" v-on:click="showImage">ceci</b>.
                    </div> 
                  </div>            
                
                

              </div>
            </div>
          </div>
        </div>
      
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
           <?php
            $url = Route::getCurrentRoute()->uri();
           ?>
           <div class="row"  v-if="categories.length == 0 && '<?php echo $url?>'.includes('categorieS') == true">
             <div  class="col-md-12" >
              <div class="card">
                <div class="card-header">
                  <div style="text-align: center; margin-bottom: 40px">
                          <span>Cette Recherche n'a pas de Résultats</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div v-if="AutreExiste && '<?php echo $url?>'.includes('categorieS') != true" class="row" style="margin-top: 20px;">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <table width="100%" id="c.id">
                  <tr>
                    <td style="width: 99%;">
                        <div style="display: inline-flex;"> 
                           <h4 class="card-title" style="font-weight: 500px;"><b>Autre 
                           </b></h4><small style="font-size: 13px; margin-top: 20px"> (Toutes les sous-catégories appartenant à des catégories supprimées)</small>
                        </div>
                    </td>
                  </tr>
                </table>                  
                <div style="margin-top: -10px;">               
                     <hr> 
                </div>
                  
                <div  v-for="sousCatego in sousCategoriesNull" style="display: inline-flex; margin-right:10px " > 
                          <div style="display: inline-flex;">
                            <p style="width: 88px">{{sousCatego.libelle}}</p>
                          </div>
                  </div>
                                                    
              </div>
            </div>
          </div>
        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
       
        <div class="row" style="margin-top: 20px;" v-for="c in categories">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                
                <table v-if="categories.length != 0" width="100%" id="c.id">
                  <tr>
                    <td style=" width: 4%;">  
                        <div v-if="selectall">
                          <input type="checkbox" :id="c.id && c.typeCategorie && c.libelle" :value="c.id" v-model="checkedCategorie" @change="changeButton(c)">
                          <label :for="c.id && c.typeCategorie && c.libelle" style=""></label>
                        </div>
                        <div v-else>
                          <input type="checkbox" :id="c.id && c.typeCategorie && c.libelle" :value="c.id" v-model="categorieIds" @change="deselectCategorie(c.id)">
                          <label :for="c.id && c.typeCategorie && c.libelle" style=" "></label>
                        </div>
                        
                    </td>
                    <td style="width: 34%;">
                        <div> 
                           <h4 class="card-title" style="font-weight: 500px;"><b>{{ c.libelle }} 
                            <small style="font-size: 13px;">(Categorie dans {{c.typeCategorie}})</small>
                           </b></h4>
                        </div>
                    </td>
                    <td  style="width: 60%;">
                      <div class="" style="float:right">
                        <div v-if="suppr2 && c.id === idSousCatego">
                        <button class="btn btn-sm  btn-danger btn-block"  style="margin-right: 40px; width: 120px; height: 35px; border-radius: 1.0em;" v-on:click="deleteArraySousCategorie()" ><b>Supprimer</b>
                        </button>
                        <button class="btn btn-sm btn-warning btn-block" style=" width: 120px; height: 35px; border-radius: 1.0em; margin-left:130px; margin-top: -45px;"  v-on:click="AnnulerSel2"><b>Annuler</b>
                        </button>
                        </div>
                        <button v-else id="c.id" class="btn btn-sm btn-block" v-on:click="ajouterSouscategorie(c.id)"  style="background-color: #00CED1; width: 230px; height: 40px; border-radius:0.8em;" ><b>Ajouter une sous catégorie</b></button>
                      </div>
                    </td>
                    <td style="width: 3%;">
                      <div  class=" dropdown p-l-10" style="float:right">
                        <a href="#"  data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                         <img  src="assetsAdmin/img/menu.png" alt="..."/ >
                        </a>
                        <div  class="dropdown-menu dropdown-menu-right" style="margin-top: 15px;" >
                          <div class="account-item clearfix js-item-menu">
                            <a class="dropdown-item"  style="color: red; font-style: italic; cursor: pointer;" v-on:click="updateCategorie(c)"><b>Modifier</b>
                            </a>
                            <a class="dropdown-item"  v-on:click="deleteCategorie(c)" style="color: red; font-style: italic; cursor: pointer;"><b>Supprimer</b>
                            </a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table> 
<!--***************************Sous Catego******************************************************-->
               <div class="row col-md-12" v-if="open2 && c.id === idSousCatego" style="display: inline-flex;">
                  <div class="col-md-8 ">
                    <div class="form-group" >
                          <label ><b>Nom</b></label>
                          <input name="nom" type="text" class="form-control" placeholder="Entrez le nom de sous-catégorie (Le nom doit être commencé avec un Maj ou un Numero)" v-model="SousCategoAjout.libelle" :class="{'is-invalid' : message.libelle}"/>
                          <span class="px-3" style="color: #ca2323" v-if="message.libelle" v-text="message.libelle[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4" style="margin-top: 12px; display: inline-flex;">
                    <div v-if="edit"class='col-md-6'>
                          <button  type="submit" class="btn btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="updateSousCategorieButton()">Modifier</button>
                    </div>
                    <div v-else class='col-md-6'>
                        <button type="submit" class="btn btn-success btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="addSousCategorie(c.id)">Ajouter</button>
                    </div>
                    <div class='col-md-6'>
                        <button type="submit" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="CancelSousCatego(SousCategoAjout)">Annuler</button>
                    </div>
                  </div>
                  
              </div>
<!--*********************************************************************************-->                 
                  <div style="margin-top: -10px;">               
                     <hr> 
                  </div>
                  
                      <div  v-for="sousCatego in sousCategories" v-if="sousCategories.length > 0 && sousCatego.categorie_id === c.id" style="display: inline-flex; margin-right:10px " ><!--sousCategories.length > 0 le cas de catego maykoun 3andha sous catego -->  

                          <div style="display: inline-flex;"><!--normal-->                    
                            <input type="checkbox"  :id="sousCatego.libelle && sousCatego.id" :value="sousCatego.id" v-model="checkedSouscategorie" @change="changeButtonSousCatego(sousCatego, c.id)">
                            <label :for="sousCatego.libelle && sousCatego.id" ></label>
                            <p style="width: 88px">{{sousCatego.libelle}}</p>
                          </div>
                            <div class="dropdown">
                              <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img  src="assetsAdmin/img/menu.png" alt="..." style=" margin-left: 55px;"/>
                              </a>
                              <div  class="dropdown-menu dropdown-menu-center"  >
                                <div class="account-item clearfix js-item-menu">
                                  <a class="dropdown-item" style="color: red; font-style: italic; cursor: pointer;" v-on:click="updateSousCategorie(sousCatego)"><b>Modifier</b></a>
                                  <a class="dropdown-item" style="color: red; font-style: italic; cursor: pointer;" v-on:click="deleteSousCategorie(sousCatego)"><b>Supprimer</b></a>
                                </div>
                              </div>
                            </div>
                      </div>
                                                    
              </div>
            </div>
          </div>

        </div>
                  <?php echo e($categorie->links()); ?>

              <br><br>
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
          <div class="copyright" id="copyright" >
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

               'csrfToken'      => csrf_token(),
               'categorie'      => $categorie,
               'var'            => $var,                                  
                'url'           => url('/'), 
          ]); ?>;
</script>

<script>
   function initDashboardPageCharts(){}
  var app = new Vue({
      el: '#app',
      data:{
        open: false,
        open2: false,
        suppr: false,
        suppr2: false,
        categories: [], 
        sousCategories: [], 
        checkedCategorie: [],
        checkedSouscategorie: [],
        ccategorie: {
          id: 0,
          libelle :'',
          typeCategorie: '',
          image: null,
        },
        sousccategorie: {
          id: 0,
          categorie_id:0 ,
          libelle :'',
        },
        edit: false, 
        idSousCatego: '',
        CategoriesDelete: [],
        allSelected: false,
        categorieIds: [],
        selectall: true,
        SousCategoAjout:{
          id: 0,
          categorie_id:0 ,
          libelle :'',
        },
        SousCategoriesDelete: [],
        oldCatego: {
          libelle: '', 
        },
        oldSousCatego: {
          libelle: '', 
        },
        message: {},
        AutreExiste: false,
        sousCategoriesNull: [],
        image: null,
        

                 
      },

    methods: {
      showImage: function(){
          Swal.fire({
          imageUrl: '<?php echo e(asset('storage/categorie_image/CategoLook.png')); ?>',
        
          imageHeight: 340,
          imageAlt: 'A tall image'
        })
      },
      imagePreview(event) {
           var fileR = new FileReader();
           fileR.readAsDataURL(event.target.files[0]);
           fileR.onload = (event) => {
              
              this.image = event.target.result;
           }          
      },
      SavetTypeCategorie:function(event){

              this.ccategorie.typeCategorie = event.target.value;

      },
      CancelSousCatego(souscategorie){
        this.edit = false;
        this.open2 = false;
        this.SousCategoAjout= {
          id: 0,
          categorie_id:0 ,
          libelle :'',
        };
        this.message = {};
        souscategorie.libelle = this.oldSousCatego.libelle;
      },
      CancelCatego(categorie){
        this.edit = false;
        this.open = false;
        this.ccategorie = {
                        id: 0,
                        libelle :'',
                        image: null,
                  };
        this.message = {};
        categorie.libelle = this.oldCatego.libelle;
      },
      updateCategorie: function(categorie){
         this.edit = true;
         this.open = true;
         this.open2 = false;
         this.suppr = false;
         this.checkedCategorie = [];
         this.deletecategorie = [];
         this.ccategorie = categorie;
         this.oldCatego.libelle = categorie.libelle;
         
      },
      updateSousCategorie: function(souscategorie){
         this.edit = true;
         this.open = false;
         this.open2 = true;
         this.suppr2 = false;
         this.suppr = false;
         this.checkedSouscategorie = [];
         this.deletesouscategorie = [];
         this.idSousCatego = souscategorie.categorie_id;
         this.SousCategoAjout = souscategorie;
         this.oldSousCatego.libelle = souscategorie.libelle;
         
      },
      updateSousCategorieButton: function(){
         if(this.SousCategoAjout.libelle == ''){

            this.SousCategoAjout.libelle =  this.oldSousCatego.libelle;
         }
      
         axios.put(window.Laravel.url+"/updatesouscategorie",this.SousCategoAjout)

            .then(response => {
              if(response.data.etat){
                 this.edit = false;
                 this.open2 = false;
                 this.SousCategoAjout= {
                   id: 0,
                   categorie_id:0 ,
                   libelle :'',
                };
                this.message = {};
                this.oldSousCatego= {
                  libelle: '', 
                };

              } 
                 
            })
            .catch(error =>{
                this.message = error.response.data.errors;
                console.log('errors :' , this.message);
            })

      }, 
      updateCategorieButton: function(){
        this.ccategorie.image = this.image;
         if(this.ccategorie.libelle == ''){

            this.ccategorie.libelle =  this.oldCatego.libelle;
         }
      
         axios.put(window.Laravel.url+"/updatecategorie",this.ccategorie)

            .then(response => {
              if(response.data.etat){
                 this.edit = false;
                 this.open = false;
                 this.ccategorie = {
                        id: 0,
                        libelle :'',
                        image: null,
                  };
                this.message = {};
                this.oldCatego= {
                  libelle: '', 
                };
                this.image=null;

              } 
                 
            })
            .catch(error =>{
                this.message = error.response.data.errors;
                console.log('errors :' , this.message);
            })

      }, 
      getSousCategories: function(){
              axios.get(window.Laravel.url+'/getsouscategories')
              .then(response => {
                this.sousCategories = response.data.sousCatego;
                this.sousCategoriesNull = response.data.sousCategoNull;
          
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
      addSousCategorie: function(categorieId){
            this.SousCategoAjout.categorie_id = categorieId;
            axios.post(window.Laravel.url+'/addsouscategorie',this.SousCategoAjout)
              .then(response => {
                if(response.data.etat){
                 this.SousCategoAjout = response.data.sousCategorieAjout;
                 this.SousCategoAjout.id = response.data.sousCategorieAjout.id;
                 this.sousCategories.unshift(this.SousCategoAjout);
                 this.open2 = false;
                 this.message = {};
                 this.SousCategoAjout={
                    id: 0,
                    categorie_id:0 ,
                    libelle :'',
                  };
                }
                else{
                  this.SousCategoAjout = response.data.sousCategorieAjout;
                  this.SousCategoAjout.id = response.data.sousCategorieAjout.id;
                  this.sousCategories.unshift(this.SousCategoAjout);

                  var position = this.sousCategoriesNull.indexOf(response.data.sousCategorieAjout);
                  this.sousCategoriesNull.splice(position,1);
                  this.open2 = false;
                  this.message = {};
                  this.SousCategoAjout={
                    id: 0,
                    categorie_id:0 ,
                    libelle :'',
                  };
                }
               })
              .catch(error => {
                  this.message = error.response.data.errors;
                  console.log('errors :' , this.message);
             })

      },
      selectAll: function() {
            this.open2 = false;
            this.open = false;
            this.selectall = false;
            if (this.allSelected) {
                for (user in this.categories) {
                    this.categorieIds.push(this.categories[user].id);
                    this.CategoriesDelete.push(this.categories[user]);
                }
                this.suppr=true;
             }
             else{
              this.categorieIds = [];
              this.CategoriesDelete= [];
              this.suppr=false;
              this.selectall = true;
              this.checkedCategorie = [];
            }

                           
             
      },
      deleteArraySousCategorie:function(){

             if(this.SousCategoriesDelete.length == 1){
                  Swal.fire({
                  title: 'Etes vous sure de supprimer cette sous-categorie ??',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>ATTENTION!</h6>Toutes les produits appartenant à cette sous-catégorie seront perdues .</smal>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.SousCategoriesDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deletesouscategorie/'+key.id) 
                           .then(response =>{
                               if(response.data.etat){
                                       
                                   var position = this.sousCategories.indexOf(key);
                                   this.sousCategories.splice(position,1);
                                   this.suppr2 = false;   
                               }
                               
                            })
                           .catch(error =>{
                                     console.log('errors :' , error);
                            })
                      })
                          this.allSelected = false;
                          this.checkedSouscategorie.length = [];
                          this.suppr=false;
                          this.SousCategoriesDelete = [];
                          this.selectall = true;
                    Swal.fire(
                      'Effacé!',
                      'Votre Sous-Categorie a été supprimé.',
                      'success'
                    )
                  }
                  
                  
                  })

            }
            else{
                Swal.fire({
              title: 'Etes vous sure de supprimer ces sous-categories ??',
              html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>ATTENTION!</h6>Toutes les produits appartenant à cette sous-catégorie seront perdues .</smal>",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Oui, Supprimer!'
            }).then((result) => {
                if (result.value) {
                  this.SousCategoriesDelete.forEach(key => {
                    axios.delete(window.Laravel.url+'/deletesouscategorie/'+key.id) 
                       .then(response =>{
                           if(response.data.etat){
                                  
                               var position = this.sousCategories.indexOf(key);
                               this.sousCategories.splice(position,1);
                               this.suppr2 = false;   
                           }
                           
                        })
                       .catch(error =>{
                                 console.log('errors :' , error);
                        })
                  })
                      this.allSelected = false;
                      this.checkedSouscategorie.length = [];
                      this.suppr=false;
                      this.SousCategoriesDelete = [];
                      this.selectall = true;
                Swal.fire(
                  'Effacé!',
                  'Vos sous-catégories ont été supprimées.',
                  'success'
                )
              }
              
              })
            }
            
      },
      getCategories:function(){
             axios.get(window.Laravel.url+'/categories')
             .then(response => {
                  this.categories = window.Laravel.categorie.data;
                  console.log('window.Laravel.var',window.Laravel.var)
                  if(window.Laravel.var == 1){
                        this.AutreExiste = true;
                  }
                  
                  
             })
             .catch(error => {
                  console.log('errors : '  ,error);
             })
             
      },
      deleteArrayCategorie:function(){
            if(this.CategoriesDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucun Categorie a supprimer!',

              }).then((result) => {
                this.allSelected = false;
                this.suppr=false;
                this.selectall = true;
               
             })
              
            }
            else if(this.CategoriesDelete.length == 1){
                Swal.fire({
                  title: 'Etes vous de supprimer cette Categorie?',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>ATTENTION!</h6>Toutes les sous-catégories appartenant à cette catégorie seront perdues.</smal>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.CategoriesDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deletecategorie/'+key.id)
                          .then(response => {
                            if(response.data.etat){
                                    window.location.reload();             
                                    var position = this.categories.indexOf(key);
                                    this.categories.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelected = false;
                          this.checkedCategorie.length = [];
                          this.suppr=false;
                          this.CategoriesDelete = [];
                          this.selectall = true;

                    Swal.fire(
                      'Effacé!',
                      'Votre Categorie a été supprimé.',
                      'success'
                    )
                  }
                  
                  })

            }
            else{
                Swal.fire({
                  title: 'Etes vous de supprimer ces Categories?',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>ATTENTION!</h6>Toutes les sous-catégories appartenant à ces catégories seront perdues.</smal>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.CategoriesDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deletecategorie/'+key.id)
                          .then(response => {
                            if(response.data.etat){
                                     window.location.reload();             
                                      var position = this.categories.indexOf(key);
                                      this.categories.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelected = false;
                          this.checkedCategorie.length = [];
                          this.suppr=false;
                          this.CategoriesDelete = [];
                          this.selectall = true;

                    Swal.fire(
                      'Effacé!',
                      'Vos Categories ont été supprimé.',
                      'success'
                    )
                  }
                  
                  })

            }
            
      },
      

      addCategorie:function(){
              this.ccategorie.image = this.image;
              axios.post(window.Laravel.url+'/addcategorie',this.ccategorie)
              .then(response => {
                if(response.data.etat){
                  this.open = false;
                  this.ccategorie = response.data.categorie;
                  this.ccategorie.id = response.data.categorie.id;
                  this.categories.unshift(this.ccategorie);                 
                  this.ccategorie = {
                        id: 0,
                        libelle :'',
                        image: null,
                  };
                  this.image= null;
                  this.message={};
                 
                }
                
              })
              .catch(error => {
                this.message = error.response.data.errors;
                console.log('errors :' , this.message);
              })
      },
      deleteSousCategorie:function(souscategorie){
                this.open2 = false;
                this.open = false;
                Swal.fire({
                  title: 'Etes vous sure de supprimer cette sous-categorie ??',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>ATTENTION!</h6>Toutes les produits appartenant à cette sous-catégorie seront perdues .</smal>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {

                  if (result.value) {
                    axios.delete(window.Laravel.url+'/deletesouscategorie/'+souscategorie.id) 
                     .then(response =>{
                         if(response.data.etat){
                             window.location.reload();    
                             var position = this.sousCategories.indexOf(souscategorie);
                             this.sousCategories.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log(error)
                     })
                    Swal.fire(
                      'Effacé!',
                      'Votre Sous-Categorie a été supprimé.',
                      'success'
                    )
                  }
                })
          
            
      },
      deleteCategorie:function(c){
                this.open2 = false;
                this.open = false;
                Swal.fire({
                  title: 'Etes vous sure de supprimer cette categorie ??',
                  html: "<smal style='font-size:15px; display:flex'><h6 style='color: red'>ATTENTION!</h6>Toutes les sous-catégories appartenant à cette catégorie seront perdues.</smal>",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {

                  if (result.value) {
                    axios.delete(window.Laravel.url+'/deletecategorie/'+c.id) 
                     .then(response =>{
                         if(response.data.etat){
                             window.location.reload();    
                             var position = this.categories.indexOf(c);
                             this.categories.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log(error)
                     })
                    Swal.fire(
                      'Effacé!',
                      'Votre Categorie a été supprimé.',
                      'success'
                    )
                  }

                })
          
            
      },

      ajouterCategorie: function(){
            this.open = true;
            this.edit = false;
            this.open2 = false;
            this.ccategorie = {
                        id: 0,
                        libelle :'',
                        image: null,
                  };
            this.message = {};
            
      },
      ajouterSouscategorie: function(id){
            this.edit = false;
            this.open2 = true;
            this.open = false;
            this.idSousCatego = id; 
            this.SousCategoAjout = {
                id: 0,
                categorie_id:0 ,
                libelle :'',
            };
            this.message = {};

      },
      deselectCategorie: function(categorieId){
             this.CategoriesDelete.forEach(key => {
                  if(key.id == categorieId){
                      var position = this.CategoriesDelete.indexOf(key);
                      this.CategoriesDelete.splice(position,1);                    
                  } 
            });             
      },

      changeButton: function(a){
             this.open2 = false;
             this.open = false;
              if(this.checkedCategorie.length > 0){
                this.suppr=true;
                this.CategoriesDelete.unshift(a);
              }
              else{
                this.CategoriesDelete = [];
                this.suppr=false;
                
              } 
              if(this.checkedCategorie.length < this.CategoriesDelete.length){
                this.deselectCategorie(a.id)
              } 
      },
      AnnulerSel: function(){
            this.categorieIds.length = [];
            this.checkedCategorie.length = [];
            this.changeButton(null);
            this.selectall = true;
            this.allSelected = false;
            this.message={};
      },
      changeButtonSousCatego: function(a,idCatego){
              if(this.checkedSouscategorie.length > 0 ){
                  this.SousCategoriesDelete.forEach(key => {
                      if(key.categorie_id != a.categorie_id){
                        var position = this.SousCategoriesDelete.indexOf(key);
                          this.SousCategoriesDelete.splice(position,1);
                          this.checkedSouscategorie.splice(position,1)
                      }
                  });
                this.suppr2=true;
                this.open2 = false;
                this.open = false;
                this.idSousCatego = idCatego;
                this.SousCategoriesDelete.push(a);
              }
              else{
                this.SousCategoriesDelete.length = 0;
                this.suppr2=false;
              }  
              if(this.checkedSouscategorie.length < this.SousCategoriesDelete.length){
                  this.SousCategoriesDelete = this.SousCategoriesDelete.filter(function(item) { return item != a; });
              }
      },
      AnnulerSel2: function(){
            this.checkedSouscategorie.length = [];
            this.SousCategoriesDelete = [];
            this.changeButtonSousCatego(null,null);
            this.message={};
      },   
     
     },
    created: function(){
      this.getCategories();
      this.getSousCategories();
           
     }
     
 
 });

</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script>
 
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

</script>
                            
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin_categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/categories_admin.blade.php ENDPATH**/ ?>