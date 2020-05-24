@extends('layouts.template_admin_categories')

@section('content')

    <head>
          <title>{{ ( 'Categorie ') }}</title>
    </head>
   
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <!--<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

                <div style=" display: flex">
                        <input type="checkbox" id="categorie" @change="selectAll()" v-model="allSelected">
                        <label for="categorie"></label>
                        <h4 style="margin-top: -6px;">Categories</h4>
                </div>

                  <div class="row">
                    <div class="col-md-4">
                      <button v-if="suppr" class="btn btn-sm btn-danger  btn-block" style="margin-left: 685px; margin-top: -50px; border-radius: 0.8em; width: 150px; height: 40px; "  v-on:click="deleteArrayCategorie()"><b>supprimer</b></button>
                      <button v-if="suppr" class="btn btn-sm btn-warning btn-block" style="margin-left: 840px; margin-top: -50px; border-radius: 0.8em; width: 150px; height: 40px; " v-on:click="AnnulerSel" ><b>Annuler</b></button>

                      <button v-else class="btn btn-sm   btn-block" style="margin-left: 750px; margin-top: -50px; border-radius: 0.8em; background-color: #00CED1; width: 230px; height: 40px; " v-on:click="ajouterCategorie" ><b>Ajouter une Catégorie</b></button>
                    </div>
                  </div>
                
                <div class="row" v-if="open" style="margin-top: -5px; margin-left: 30px; ">
                  <div class="col-md-6 ">
                    <div class="form-group" style="width: 600px;">
                      <label ><b>Nom</b></label>
                      <input name="nom" type="text" class="form-control" placeholder="Le nom de catégorie" required="required" v-model="ccategorie.libelle" style="color: black;" >
                    </div>
                  </div>
                  <div class="col-md-2 " style="margin-left: 20px;">
                    <div  style="margin-left: 120px; width: 120px; margin-top: 23px; border:0; ">
                      <button v-if="edit" type="submit" class="btn btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="updateCategorie">Modifier</button>

                      <button v-else type="submit" class="btn btn-success btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="addCategorie" >Ajouter</button>
                   </div>
                  </div>
                  <div >
                   <div  style="margin-left: 100px; width: 120px; height: 30px; margin-top: 23px;  border:0; margin-left: 110px;">
                        <button type="submit" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="open=false">Annuler </button>
                   </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>-->
      
      
        <div class="row" style="margin-top: 20px;" v-for="c in categories">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <table width="100%" id="c.id">
                  <tr>
                    <td style=" width: 4%;">  
                        <div v-if="selectall" style="">
                          <input type="checkbox" :id="c.id" :value="c.id" v-model="checkedCategorie" @change="changeButton(c)">
                          <label :for="c.id" style=""></label>
                        </div>
                        <div v-else style="">
                          <input type="checkbox" :id="c.id" :value="c.id" v-model="categorieIds" @click="deselectArticle(c.id)">
                          <label :for="c.id" style=" "></label>
                        </div>
                        
                    </td>
                    <td style="width: 30%;">
                        <div> 
                           <h4 class="card-title" style="font-weight: 500px;"><b>@{{ c.libelle }}
                           </b></h4>
                        </div>
                    </td>
                    <td  style="width: 63%;">
                      <div class="" style="float:right">
                        <div v-if="suppr2 && c.id === idSousCatego">
                        <button class="btn btn-sm  btn-danger btn-block"  style="margin-right: 40px; width: 120px; height: 35px; border-radius: 1.0em;" ><b>Supprimer</b>
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
                            <a class="dropdown-item"  style="color: blue; font-style: italic; cursor: pointer;" v-on:click="editCategorie(c)"><b>Modifier</b>
                            </a>
                            <a class="dropdown-item"  v-on:click="deleteCategorie(c)" style="color: blue; font-style: italic; cursor: pointer;"><b>Supprimer</b>
                            </a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table> 
<!--*********************************************************************************-->
               
<!--*********************************************************************************-->                 
                  <div style="margin-top: -10px;">               
                     <hr> 
                  </div>
                  
                      <div  v-for="sousCatego in sousCategories" v-if="sousCategories.length > 0 && sousCatego.categorie_id === c.id" style="display: inline-flex; margin-right:10px " ><!--sousCategories.length > 0 le cas de catego maykoun 3andha sous catego -->  
                          <div  style="display: inline-flex;" >                    
                            <input type="checkbox"  :id="sousCatego.libelle" :value="sousCatego.id" v-model="checkedSouscategorie" @change="changeButtonSousCatego(sousCatego, c.id)">
                            <label :for="sousCatego.libelle" ></label>
                            <p style="width: 90px">@{{sousCatego.libelle}}</p>
                          </div>
                            <div class="dropdown">
                              <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img  src="assetsAdmin/img/menu.png" alt="..." style=" margin-left: 60px;"/>
                              </a>
                              <div  class="dropdown-menu dropdown-menu-left" >
                                <div class="account-item clearfix js-item-menu">
                                  <a class="dropdown-item" href="#" style="color: blue; font-style: italic;"><b>Modifier</b></a>
                                  <a class="dropdown-item" href="#" style="color: blue; font-style: italic;"><b>Supprimer</b></a>
                                </div>
                              </div>
                            </div>
                      </div>
                                                    
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--<footer class="footer">
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
      </footer>-->
     
    </div>

  @endsection


  @push('javascripts')


<script> 
        window.Laravel = {!! json_encode([

               'csrfToken'      => csrf_token(),
               'categorie'      => $categorie,                                  
                'url'           => url('/'), 
          ]) !!};
</script>

<script>
  
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
        },
        edit: false, 
        idSousCatego: '',
        CategoriesDelete: [],
        allSelected: false,
        categorieIds: [],
        selectall: true,
        SousCAjout:{
          id: 0,
          categorie_id:0 ,
          libelle :'',
        },
        SousCategoriesDelete: [],


                 
      },

    methods: { 
      getSousCategories: function(){
              axios.get(window.Laravel.url+'/getsouscategories')
              .then(response => {
                this.sousCategories = response.data;
          
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          addSousCategorie: function(categorieId){
            this.SousCAjout.categorie_id = categorieId;
            console.log("aaa",this.SousCAjout)
            axios.post(window.Laravel.url+'/addsouscategorie',this.SousCAjout)
              .then(response => {
                if(response.data.etat){
                 this.SousCAjout = response.data.sousCategorieAjout;
                 this.SousCAjout.id = response.data.sousCategorieAjout.id;

                 app.sousCategories.unshift(this.SousCAjout);
                  console.log('successeee :' ,response.data);
                  console.log('this.SousCAjout :' ,this.SousCAjout);
                }
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })

          },
          selectAll: function() {

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
          deleteArrayCategorie:function(){
            if(this.CategoriesDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucun Article a supprimer!',

              }).then((result) => {
                this.allSelected = false;
                this.suppr=false;
                this.selectall = true;
               
             })
              return;
            }
            Swal.fire({
            title: 'Etes vous?',
            text: "De supprimer cette Atricle?",
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
                'Votre article a été supprimé.',
                'success'
              )
            }
            
            })
       },
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
                  this.ccategorie = response.data.categorie;
                  this.ccategorie.id = response.data.categorie.id;
                  this.categories.unshift(this.ccategorie);                 
                  this.ccategorie = {
                        id: 0,
                        libelle :'',
                   };
                 
                }
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
          
            
        },
          editCategorie: function(c){
            this.open = true;
            this.edit = true;
            this.ccategorie = c;
            
          },
          ajouterCategorie: function(){
            this.open = true;
            this.edit = false;
            this.ccategorie = {
                        id: 0,
                        libelle :'',
                   };
            
          },
          ajouterSouscategorie: function(id){
            this.open2 = true;
            this.idSousCatego = id; 

          },
          changeButton: function(a){
             this.CategoriesDelete.unshift(a);
              if(this.checkedCategorie.length > 0){
                this.suppr=true;
              }
              else{
                this.CategoriesDelete = [];
                this.suppr=false;
              }  
          },
          deselectArticle: function(categorie){
             this.CategoriesDelete.forEach(key => {
                  if(key.id == categorie){
                      var position = this.CategoriesDelete.indexOf(key);
                      this.CategoriesDelete.splice(position,1);                    
                  } 
            });             
        },
          AnnulerSel: function(){
            this.checkedCategorie.length = [];
            this.changeButton();
          },
          changeButtonSousCatego: function(a,idCatego){
            this.idSousCatego = idCatego;
            this.SousCategoriesDelete.unshift(a);
              if(this.checkedSouscategorie.length > 0){
                this.suppr2=true;
              }
              else{
                this.SousCategoriesDelete = [];
                this.suppr2=false;
              }  
          },
          AnnulerSel2: function(){
            this.checkedSouscategorie.length = [];
            this.changeButtonSousCatego();
          }, 
          updateCategorie:function(){
              axios.put(window.Laravel.url+'/updatecategorie',this.ccategorie)
              .then(response => {
                if(response.data.etat){
                  this.open = false;

                   this.ccategorie = {
                        id: 0,
                        libelle :'',
                   };
                }
                this.edit = false;
              })
              .catch(error => {
                console.log('errors' ,error)
              })
          },   
     
     },
    created: function(){
      this.getCategories();
      this.getSousCategories();
           
     }
     
 
 });
  
</script>

@endpush