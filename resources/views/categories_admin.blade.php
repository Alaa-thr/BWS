@extends('layouts.template_admin_categories')

@section('content')

    <head>
          <title>{{ ( 'Categorie ') }}</title>
    </head>
   
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" style="color: gray; margin-top: -2px; ">Categories</h4>
                  <div class="row">
                    <div class="col-md-4">
                      <button v-if="suppr" class="btn btn-sm btn-danger  btn-block" style="margin-left: 685px; margin-top: -50px; border-radius: 0.8em; width: 150px; height: 40px; "  v-on:click="deleteCategorie(c)"><b>supprimer</b></button>
                      <button v-if="suppr" class="btn btn-sm btn-warning btn-block" style="margin-left: 840px; margin-top: -50px; border-radius: 0.8em; width: 150px; height: 40px; " v-on:click="AnnulerSel" ><b>Annuler</b></button>

                      <button v-else class="btn btn-sm   btn-block" style="margin-left: 750px; margin-top: -50px; border-radius: 0.8em; background-color: #00CED1; width: 230px; height: 40px; " v-on:click="ajouterCategorie" ><b>Ajouter une Catégorie</b></button>
                    </div>
                  </div>
                <div class="row" v-if="open" style="margin-top: -5px; margin-left: 30px; ">
                  <div class="col-md-6 ">
                    <div class="form-group" style="width: 600px;">
                      <label ><b>Nom</b></label>
                      <input name="nom" type="text" pattern="[A-Z][a-z]" class="form-control" placeholder="Le nom de catégorie" required="required" v-model="ccategorie.libellé" style="color: black;" >
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
        </div>
      
      
        <div class="row" style="margin-top: 20px;" v-for="c in categories">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <table width="100%">
                  <tr>
                    <td>  
                        <input  type="checkbox"  :id="c.id" :value="c.id" v-model="checkedCategorie" @change="changeButton()">
                        <label :for="c.id" ></label>
                    </td>
                    <td style="width: 550px;"> 
                     <div> 
                       <h4 class="card-title" style="font-weight: 900;">@{{ c.libellé }}
                       </h4>
                     </div>
                    </td>
                    <td >
                      <div  style="margin-left: 100px;">
                        <button v-if="suppr2" class="btn btn-sm  btn-danger btn-block"  style="margin-right: 40px; width: 120px; height: 35px; border-radius: 1.0em;" ><b>Supprimer</b>
                        </button>
                        <button v-if="suppr2" class="btn btn-sm btn-warning btn-block" style=" width: 120px; height: 35px; border-radius: 1.0em; margin-left:130px; margin-top: -45px;"  v-on:click="AnnulerSel2"><b>Annuler</b>
                        </button>
                        <button :id="c.id" v-else class="btn btn-sm btn-block" v-on:click="ajouterSouscategorie()"  style="background-color: #00CED1; width: 230px; height: 40px; border-radius:0.8em;" ><b>Ajouter une sous catégorie</b></button>
                      </div>
                    </td>
                    <td>
                      <div  class=" dropdown">
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
                  <div class="row" v-if="open2"  style="margin-top: -5px; margin-left: 30px;">
                      <div class="col-md-6 ">
                        <div class="form-group" style="width: 600px;">
                          <label ><b>Nom</b></label>
                          <input name="nom" type="text" class="form-control" placeholder="Le nom de sous catégorie" required="required" >
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div  style="margin-left: 140px; width: 120px; margin-top: 23px; border:0; ">
                         <button type="submit" class="btn btn-success btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" >Ajouter</button>
                        </div>
                      </div>
                      <div  style="margin-left: 130px; width: 120px; height: 30px; margin-top: 14px;  border:0; ">
                        <button type="submit" class="btn btn-danger btn-block" style="font-size: 12px; border-radius: 1.3em; font-weight: 900;" v-on:click="open2=false">Annuler</button>
                      </div>
                  </div>
                  <div style="margin-top: -10px;">               
                     <hr> 
                  </div>
                  <table width="100%" >
                    <tr>
                      <td>                      
                        <input type="checkbox"  id="sous1" value="sous1" v-model="checkedSouscategorie" @change="changeButton2">
                        <label for="sous1" ></label>
                        <div class="dropdown">
                          <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/  style="margin-top: -48px; margin-left: 90px;">
                          </a>
                          <div  class="dropdown-menu dropdown-menu-left" style="margin-top: -20px;  margin-left: 85px;" >
                            <div class="account-item clearfix js-item-menu">
                              <a class="dropdown-item" href="#" style="color: blue; font-style: italic;"><b>Modifier</b></a>
                              <a class="dropdown-item" href="#" style="color: blue; font-style: italic;"><b>Supprimer</b></a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>                      
                        <input type="checkbox"  id="sous2" value="sous2" v-model="checkedSouscategorie" @change="changeButton2">
                        <label for="sous2" ></label>
                        <div class="dropdown">
                          <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/  style="margin-top: -48px; margin-left: 90px;">
                          </a>
                          <div  class="dropdown-menu dropdown-menu-left" style="margin-top: -20px;  margin-left: 85px;" >
                            <div class="account-item clearfix js-item-menu">
                              <a class="dropdown-item" href="#" style="color: blue; font-style: italic;"><b>Modifier</b></a>
                              <a class="dropdown-item" href="#" style="color: blue; font-style: italic;"><b>Supprimer</b></a>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>                                 
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
 
  @endsection


  @push('javascripts')


<script src="{{ asset('jss/vue.js') }}"></script>
  <script src="{{asset('jss/axios.min.js')}}"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.7/dist/sweetalert2.all.min.js"></script>

<script> 
        window.Laravel = {!! json_encode([
               'csrfToken'      => csrf_token(),
                'categorie'     => $categorie,
              //  'souscategorie' => $souscategorie,              
                'url'           => url('/')  
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
          libellé :'',
        },
        edit: false, 
        

                 
      },

    methods: { 
      /*getSouscategories: function(){
              axios.get(window.Laravel.url+'/getsouscategories')
              .then(response => {
                  console.log('success :' ,response);
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },*/
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
                        libellé :'',
                   };
            
          },
          ajouterSouscategorie: function(c){
              this.open2=true;
          },
          changeButton: function(){
           if(this.checkedCategorie.length > 0){
              this.suppr=true;         
            }
            else{
              this.suppr=false;
            }
          },
          AnnulerSel: function(){
            this.checkedCategorie.length = [];
            this.changeButton();
          },
          changeButton2: function(){
            if (this.checkedSouscategorie.length > 0) {
              this.suppr2=true;
            }
            else {
              this.suppr2=false;
            }
          },
          AnnulerSel2: function(){
            this.checkedSouscategorie.length = [];
            this.changeButton2();
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
     
     },
    mounted: function(){
      this.getCategories();
     }
     
 
 });
  
</script>

@endpush