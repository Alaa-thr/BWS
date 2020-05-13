

<?php $__env->startSection('content'); ?>

    <head>
          <title><?php echo e(( 'Categorie ')); ?></title>
    </head>
   
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
             
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-sm   btn-block" style="margin-left: 360px; margin-top: -5px; border-radius: 0.8em; background-color: #00CED1; width: 230px; height: 40px; " v-on:click="ajouterCategorie" ><b>Ajouter une Catégorie</b></button>
                    </div>
                  </div>
                <div class="row" v-if="open" style="margin-top: -5px;">
                  <div class="col-md-6 ">
                    <div class="form-group" style="width: 600px;">
                      <label ><b>Nom</b></label>
                      <input name="nom" type="text" class="form-control" placeholder="Le nom de catégorie" required="required" v-model="ccategorie.libellé" style="color: black;">
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div  style="margin-left: 120px; width: 120px; margin-top: 23px; border:0; ">
                      <button v-if="edit" type="submit" class="btn btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="updateCategorie">Modifier</button>

                      <button v-else type="submit" class="btn btn-success btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="addCategorie" >Ajouter</button>
                   </div>
                  </div>
                  <div >
                   <div  style="margin-left: 100px; width: 180px; height: 30px; margin-top: 23px;  border:0; ">
                        <button type="submit" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="open=false">Annuler et Fermer</button>
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      
        <div class="row" style="margin-top: 20px;" v-for="c in categories">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">{{ c.libellé }}</h4>
                 <div style="margin-left: 750px; margin-top: -40px; ">
                   <button class="btn btn-sm btn-warning btn-block" style="width: 100px; border-radius: 2em;"v-on:click="editCategorie(c)"><b>Modifier</b>
                   </button>   
                 </div>
                 <div style=" margin-left: 855px; margin-top: -38px;  ">
                  <button class="btn btn-sm btn-danger btn-block"  v-on:click="deleteCategorie(c)" style="width:  120px; border-radius: 2em;"><b>supprimer</b>
                  </button>
                </div>
                <hr> 
                <table width="100%" >
                  <tr>
                    <td >                      
                      <input type="checkbox"  :id="c.id">
                      <label :for="c.id" ></label>
                        <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                           <a class="dropdown-item" href="#"><b>Modifier</b></a>
                           <a class="dropdown-item" href="#"><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                  </tr>
               </table> 
                <div class="col-md-4" >
                  <button class="btn btn-sm  btn-block" style="; margin-top: 5px; border-radius: 0.8em; height: 30px; background-color: #00CED1 ; margin-left: 320px;" v-on:click="open2 = true " ><b> Ajouter une sous Catégorie</b></button>
                </div>
                <div class="row" v-if="open2" style="margin-top: -5px;">
                  <div class="col-md-6 ">
                    <div class="form-group" style="width: 600px;">
                      <label ><b>Nom</b></label>
                      <input name="nom" type="text" class="form-control" placeholder="Le nom de sous catégorie" required="required">
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div  style="margin-left: 120px; width: 120px; margin-top: 23px; border:0; ">
                      <button type="submit" class="btn btn-success btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" >Ajouter</button>
                   </div>
                  </div>
                  <div >
                   <div  style="margin-left: 100px; width: 180px; height: 30px; margin-top: 23px;  border:0; ">
                        <button type="submit" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="open2=false">Annuler et Fermer</button>
                   </div>
                  </div>
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
  </div>
  <?php $__env->stopSection(); ?>


  <?php $__env->startPush('javascripts'); ?>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.7/dist/sweetalert2.all.min.js"></script>

<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken'  => csrf_token(),
                'categorie' =>$categorie,              
                'url'        => url('/')  
          ]); ?>;
</script>

<script>
  
  var app = new Vue({
      el: '#app',
      data:{
        open: false,
        open2: false,
        
        categories: [],  
        ccategorie: {
          id: 0,
          libellé :'',
        },
        edit: false, 
        

                 
      },

    methods: {
           getCategories:function(){
             axios.get(window.Laravel.url+'/categoriesAdmin')
             .then(response => {
                  this.categories = window.Laravel.categorie;
             })
             .catch(error => {
                  console.log('errors : '  ,error);
             })
          },
          addCategorie:function(){
              axios.post(window.Laravel.url+'/addcategorie',this.ccategorie)
              .then(response => {
                if(response.data.etat){
                  this.open = false;

                  this.ccategorie.id = response.data.id;
                  this.categories.unshift(this.ccategorie);
                  
                   this.ccategorie = {
                        id: 0,
                        libellé :'',
                   };
                 
                }
              })
              .catch(error => {
                console.log('errors' ,error)
              })
          },
          editCategorie:function(c){
            this.open = true;
            this.edit = true;
            this.ccategorie = c;
            
          },
          ajouterCategorie:function(){
            this.open = true;
            this.edit = false;
            this.ccategorie = {
                        id: 0,
                        libellé :'',
                   };
            
          },
          
          updateCategorie:function(){
              axios.put(window.Laravel.url+'/updatecategorie',this.ccategorie)
              .then(response => {
                if(response.data.etat){
                  this.open = false;

                   this.ccategorie = {
                        id: 0,
                        libellé :'',
                   };
                }
                this.edit = false;
              })
              .catch(error => {
                console.log('errors' ,error)
              })
          },
         deleteCategorie:function(c){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De supprimer cette categorie ?",
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
                                 
                             var position = this.categories.indexOf(c);
                             this.categories.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log(error)
                     })
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success',
                    )
                  }
                })
          
            
        }

          
     },
    mounted:function(){
      this.getCategories();
     }
     
 
 });
  
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin_categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/categories_admin.blade.php ENDPATH**/ ?>