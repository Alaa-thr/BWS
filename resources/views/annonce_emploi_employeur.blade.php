@extends('layouts.template_employeur')

@section('content')

  <head>
    <title>{{ ( 'Annonces Emploies') }}</title>
  </head>

    <div class="panel-header panel-header-sm"></div> 
    <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              @if(session()->has('danger'))
                  <div class="row"> 
                    <div class="alert alert-danger" style="  margin-left:33px;width: 960px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ session()->get('danger')}}
                    </div>
                  </div>
              @endif
              <div class="card-header">
                
                    <div class="flex-t">
                        <input type="checkbox" id="annonce" @change="selectAll()" v-model="allSelected" >
                        <label for="annonce"></label>
                        <h4 style="margin-top: -6px;">Annonces</h4>
                    </div>

                <div class="txt-right"style="margin-top: -40px; " >
                      <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayAnnonce()"><b>Supprimer</b>
                      </button>
                      
                      <button v-else  class="btn-sm btn-info js-show-modal1" style="height: 35px;" v-on:click="AfficherAjout()" ><b>Ajouter annonce</b>
                      
                      </button>
                      <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                      </button>
                   </div>
                <hr> 
               <div class="row m-b-10 " v-for="annoncea in annoncesEmployeur" style="display: inline-flex; height: 160px; width: 360px;">
                      <div v-if="selectall">
                        <input type="checkbox" :id="annoncea.id" :value="annoncea.id" v-model="checkedAnnonces" @change="changeButton(annoncea)">
                        <label :for="annoncea.id" style="margin-top: 40px; margin-left: 20px;"></label>
                      </div>
                      <div v-else>
                        <input type="checkbox" :id="annoncea.id" :value="annoncea.id" v-model="annonceIds" @click="deselectAnnonce(annoncea.id)">
                        <label :for="annoncea.id" style="margin-top: 40px; margin-left: 20px;">
                        </label>
                      </div>
                        <div class="col-md-3 " v-if="annoncea.image!=null">
                          <img v-if="annoncea.image"  :src="'storage/annonces_image/'+ annoncea.image" style="height: 110px; width:120px; margin-bottom: 20px ; "/>
                          
                        </div>
                        
                        <div class="col-md-5" v-if="annoncea.image!=null">
                          <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >@{{ annoncea.libellé }}</h6><br>
                            <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                              @{{ MoitieDescription(annoncea.discription,40, '...') }}
                            </div>  
                            <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                                Nombre de condidat : @{{annoncea.nombre_condidat}}
                            </div>
                            <div class="txt-right m-t-20">
                                <a class="js-show-modal1 " style=" color: black;  font-style: italic; font-weight: 500; cursor: pointer; margin-right: -30px; " v-on:click="AfficheInfo(annoncea.id)"><b>  Afficher Plus </b>
                                </a>
                             </div>
                        </div>
                        <div class="col-md-8" v-else>
                          <h6 class="title" style="margin-top: -4px;  color: red; margin-left: -10px;" >@{{ annoncea.libellé }}</h6><br>
                            <div class="description" style="margin-top: -10px; font-size: 11px; margin-left: -10px;">
                              @{{ MoitieDescription(annoncea.discription,100, '...') }}
                            </div>  
                            <div class="description" style="font-weight: 500; color: black; font-size: 12px; margin-left: -10px; margin-top: 10px;">
                                Nombre de condidat : @{{annoncea.nombre_condidat}}
                            </div>
                            <div class="txt-right m-t-20">
                                <a class="js-show-modal1 " style=" color: black;  font-style: italic; font-weight: 500; cursor: pointer; margin-right: -30px; " v-on:click="AfficheInfo(annoncea.id)"><b>  Afficher Plus </b>
                                </a>
                             </div>
                        </div>
                        <table>
                         <tr>                        
                            <td class="dropdown" >
                              <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                               <img src="assetsEmployeur/img/menu.png" /> 
                              </a>
                              <div class="dropdown-menu dropdown-menu-right ">   
                               <a class="dropdown-item js-show-modal1" style="color: blue; font-style: italic; font-weight: 900; cursor: pointer;" v-on:click="updateAnnonce(annoncea)">Modifier</a>
                               <a class="dropdown-item" v-on:click="deleteAnnonce(annoncea)" style="color: blue; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
                              </div>
                            </td>
                         </tr>
                       </table>
                       <div style="border-left: 2px solid #000; display: inline-block; height: 130px; margin: 0 20px;">
                       </div> 
                 </div>  
                 <div> 
                   {{$annonce->links()}}<!-- pour afficher la pagination -->
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

<div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel">
  <div class="overlay-modal11 " v-on:click="CancelAnnonce(annc)"></div>
  
  <div class="container">
      <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 970px; margin-top: 40px;"   v-for="annoncea in annoncesemployeur2">
          <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="hideModel = false">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="row">
            <div class="col-md-8">
              <div class="p-b-30 p-l-40" style="margin-left: 80px;" >
                <h3 class=" cl2" >
                   Informations sur L'annonce
                </h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10" >
              <img v-if="annoncea.image!=null" :src="'storage/annonces_image/'+ annoncea.image" style="width: 1500px; height: 450px; margin-left: 80px; " />

            </div> 
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="title" style="color: red; margin-top: 30px; margin-left: 90px;" >
                  <h4><b>@{{annoncea.libellé }}</b></h4><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 m-l-50 m-t--10 m-b-10">
               <p style="color: black;">@{{ annoncea.discription }}</p>
            </div>               
          </div> 
          <div class="row">
            <div class="col-md-10">
              <div class="description" style="margin-left: 90px; font-weight: 700; color: black;">
                Le nombre de condidat est : @{{annoncea.nombre_condidat}}
              </div>
            </div>
          </div> 
      </div>

    <!--*****************************************************-->
      <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent m-t-35" v-if="openAjout" style=" width: 970px; padding-top: 45%">
          <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelAnnonce(annc)">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <section class=" creat-article " id="myDIV">     
              <div  class=" container-creat-article">
                <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group mb-3">
                      <label >Titre</label>
                      <input  type="text" class="form-control" placeholder="Le titre doit commencer avec un Maj ou un nombre" v-model="annc.libellé" :class="{'is-invalid' : message.libellé}" >
                      <span class="px-3 cl13" v-if="message.libellé" v-text="message.libellé[0]">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group">
                      <label >description</label>
                      <textarea class="form-control" placeholder="La description doit commencer avec un Maj ou un nombre" v-model="annc.discription" :class="{'is-invalid' : message.discription}"></textarea>
                      <span class="px-3 cl13" v-if="message.discription" v-text="message.discription[0]">
                      </span>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group mb-3">
                      <label >Nombre_condidat</label>
                      <input  type="number" class="form-control" placeholder="entrez ici le nombre de condidat  "  v-model="annc.nombre_condidat " :class="{'is-invalid' : message.nombre_condidat}" >
                      <span class="px-3 cl13" v-if="message.nombre_condidat" v-text="message.nombre_condidat[0]">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row col-md-12 pr-2 flex-t m-b-30">
                    <select class="form-control form-control-lg m-r-30" id="categoSelect" name="catego" style="height: 40px; width: 300px ;border-radius: 1em;" v-on:change="activeSousCatego($event)" >
                              <option value="" hidden="hidden" selected>&nbsp&nbspSélectionner une Categorie</option> 
                              <option v-for="catego in categories" :value="catego.id" >&nbsp&nbsp@{{catego.libelle}}</option> 
                    </select>
                    <div>
                        <select class="form-control form-control-lg " id="sousCtagoSelect" name="sous_categorie_id" style="height: 40px;width: 300px;border-radius: 1em;" disabled= "true" v-on:change="getIdSousCatego($event)" :class="{'is-invalid' : message.sous_categorie_id}">
                              <option value="" hidden="hidden" selected>&nbsp&nbspSélectionner une Sous Categorie</option> 
                              <option v-for="Scatego in sousCategories" :value="Scatego.id" >&nbsp&nbsp@{{Scatego.libelle}}</option> 
                        </select>
                        <span class="px-3 cl13" v-if="message.sous_categorie_id" v-text="message.sous_categorie_id[0]"></span>
                      </div>
                  </div>
                  <div class="row" >
                    <div class="col-md-10 pr-2" >
                      <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control"  v-on:change="imagePreview" accept="image/*" :class="{'is-invalid' : message.image}">
                        <span class="px-3 cl13" v-if="message.image" v-text="message.image[0]"></span>
                      </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10 flex-t m-l-60 m-b-20">
                        <button type="submit" v-if="modifier" class="btn btn-success btn-block " style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="updateannoncebutton()" >Modifier
                        </button> 
                        <button type="submit" v-if="modifier==false && PaimentExsist==true" class="btn btn-success btn-block " style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addAnnonce()" >Ajouter
                        </button> 
                        <button type="submit"  class="btn btn-danger btn-block " style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="CancelAnnonce(annc)" >Annuler
                        </button> 
                        <button type="submit" v-if="modifier==false && PaimentExsist==false" class="btn btn-success btn-block " style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;"  v-on:click="myFunction()"> Suivant
                        </button> 
                        
                            
                  </div>
                </div>
                </section>
        </div>
        <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent m-t-35" v-if="openPaiment" style=" width: 970px; padding-top: 45%">
          <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelAnnonce(annc)">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <section class=" creat-article">     
            <div  class=" container-creat-article col-md-12">
              <div class="col-md-12 m-b-30">
                <h5 class="m-t--40 m-l--40 col-md-12">Paiment</h5>
              </div>
              <div class="col-md-12">
                <div class="col-md-12 m-b-40">
                    <div class="col-md-12 m-b-20">
                        <span >Vous devez payer pour publier votre annonce(Le paimment sera par MOIS ou ANNONCE).</span>
                    </div>
                    <div class="col-md-12 flex-t m-b-15">
                        <span class = "col-md-6" style="color:black;">Numéro bancaire pour paiment:</span>
                        <div class ="col-md-6">
                          <input class =" form-control" type="text" disabled value="<?php echo $idbigAdmin[0]->numCarteBanquaire?>">
                        </div>
                    </div>
                    <div class="col-md-12 flex-t">
                        <span class = "col-md-6" style="color:black;">Paimment par Mois ou Annonce:</span>
                        <div class = "col-md-6">
                          <select class="form-control col-md-12" v-on:change="getTypePaiment($event)" :class="{'is-invalid' : message.typePaiment}">
                            <option value="0" selected disabled>Mois/Annonce</option>
                            <option value="m">Mois</option>
                            <option value="a">Annonce</option>
                          </select>
                          <span class="px-3 cl13" v-if="message.typePaiment" v-text="message.typePaiment[0]"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 flex-t">
                  <button type="submit"  class="btn btn-danger btn-block " style="  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="myFunctionP">Previous</button> 
                  <button type="submit"  class="btn btn-success btn-block " style=" border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addAnnonceP();" >Ajouter</button>
                    
                </div>    
              </div>      
            </div>
          </section>
        </div>
      </div>
    </div>



@endsection
@push("javascripts")
<script>
        window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "annonce"   => $annonce,
               "idEmployeur" => $idEmployeur,
               "idbigAdmin"   =>$idbigAdmin,
               "url"      => url("/")  
          ]) !!};
</script>

<script>


   Vue.mixin({
     methods:{
          addAnnonceP: function(){
            app2.annc.image = app2.image;
             console.log("app.app2.annc",app2.annc)
            axios.post(window.Laravel.url+"/addannoncepaiment",app2.annc)

            .then(response => {
              if(response.data.etat){
                 app2.annc = response.data.annonceAjout;
                 app2.annc.id = response.data.annonceAjout.id;
                 window.location.reload();
                 app.annoncesEmployeur.unshift(app2.annc);
                 console.log("app.annoncesemployeur",app.annoncesEmployeur)
                 app2.annc={
                      id: 0,
                      employeur_id: window.Laravel.idEmployeur,
                      sous_categorie_id:'',
                      catego: '',
                      libellé: '', 
                      discription: '',
                      nombre_condidat:'',
                      image: null,
                      typePaiment: '',
                 };
                 app2.image = null;
                 app2.hideModel=false;
                 app2.openAjout = false;
                 app2.message = {};
              }          
            })
            .catch(error =>{
                app2.message = error.response.data.errors;
                console.log('errors :' , app2.message);
            })
          }, 
          addAnnonce: function(){
            app2.annc.image = app2.image;
             console.log("app.app2.annc",app2.annc)
            axios.post(window.Laravel.url+"/addannonce",app2.annc)

            .then(response => {
              if(response.data.etat){
                 app2.annc = response.data.annonceAjout;
                 app2.annc.id = response.data.annonceAjout.id;
                 window.location.reload();
                 app.annoncesEmployeur.unshift(app2.annc);
                 console.log("app.annoncesemployeur",app.annoncesEmployeur)
                 app2.annc={
                      id: 0,
                      employeur_id: window.Laravel.idEmployeur,
                      sous_categorie_id:'',
                      catego: '',
                      libellé: '', 
                      discription: '',
                      nombre_condidat:'',
                      image: null,
                      typePaiment: '',
                 };
                 app2.image = null;
                 app2.hideModel=false;
                 app2.openAjout = false;
                 app2.message = {};
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
        annoncesemployeur2: [],
        openInfo: false,
        openAjout: false,
        hideModel: false,
        openPaiment:false,
        annc: {
          id: 0,
          employeur_id: window.Laravel.idEmployeur,
          sous_categorie_id: '',
          catego: '',
          libellé: '', 
          discription: '',
          nombre_condidat:'',
          image: '',
          typePaiment: '',
        },
        oldAnnc: {
          libellé: '', 
          discription: '',
          nombre_condidat:'',
          image: ''
        },
        detaillsAn: {
          idAn: 0,
        },
        message:'hello',
        sousCategories: [],
        categories: [],
        modifier: false,
        image: null,
        PaimentExsist: true,

        
                   
      },  
       methods: {
        getTypePaiment(event){
          this.annc.typePaiment = event.target.value;
        },
         myFunctionP: function(){
          this.openPaiment = false;
          this.openInfo = false;
          this.openAjout = true;
         },
         myFunction: function(){
          this.annc.image = this.image;
          console.log('annonce',this.annc)
             axios.post(window.Laravel.url+'/verifierInputsAnnonce',this.annc)
                 .then(response => {
                    this.message = {};
                    
                    this.openPaiment = true;
                    this.openInfo = false;
                    this.openAjout = false;
                 })
                 .catch(error => {
                      this.message = error.response.data.errors;
                      console.log('errors :' , this.message);
                 })
        },
        updateannoncebutton: function(){
         if(this.annc.libellé == ''){

            this.annc.libellé =  this.oldAnnc.libellé;
         }
         if(this.annc.discription == ''){

            this.annc.discription =  this.oldAnnc.discription;
         }
          if(this.annc.nombre_condidat == ''){

            this.annc.nombre_condidat =  this.oldAnnc.nombre_condidat;
         }

         this.annc.image = this.image;
         if(this.annc.image == ''){
            this.annc.image = this.oldAnnc.image;
         } 
          
          if(this.annc.sousCategories == ''){

            this.annc.sousCategories =  this.oldAnnc.sousCategories;
         }        
         axios.put(window.Laravel.url+"/updateannonce",this.annc)

            .then(response => {
              if(response.data.etat){
                 this.annc = response.data.annonceAjout;
                 app.annoncesEmployeur.forEach(key => { 
                  if(key.id == this.annc.id){
                        key.image = this.annc.image;
                  }
                })
                 this.hideModel = false;
                 this.annc={
                      id: 0,
                      employeur_id: window.Laravel.idEmployeur,
                      sous_categorie_id:'',
                      catego: '',
                      libellé: '', 
                      discription: '',
                      nombre_condidat:'',
                      image: '',
                      typePaiment: '',
                 };

              } 
              this.modifier = false;
              this.message = {};
              this.image = '';
              this.oldAnnc = {
                    libellé: '', 
                    discription: '',
                    nombre_condidat:'',
                    image: ''
              };     
            })
            .catch(error =>{
                this.message = error.response.data.errors;
                console.log('errors :' , this.message);
            })

      }, 
       detaillsAnnonce: function(){

        axios.post(window.Laravel.url+'/detaillsannonces', this.detaillsAn)

            .then(response => {

                 this.annoncesemployeur2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
       imagePreview(event) {
           var fileR = new FileReader();
           fileR.readAsDataURL(event.target.files[0]);
           fileR.onload = (event) => {
              this.image = event.target.result;
           }
           
      },
       CancelAnnonce(annonce){
        this.modifier = false ;
        this.hideModel = false;
        this.annc = {       
                      id: 0,
                      employeur_id: window.Laravel.idEmployeur,
                      sous_categorie_id:'',
                      catego: '',
                      libellé: '', 
                      discription: '',
                      nombre_condidat:'',
                      image: '',
                      typePaiment: '',
        };
        this.message = {};
        annonce.libellé = this.oldAnnc.libellé;
        annonce.discription = this.oldAnnc.discription;
        annonce.nombre_condidat = this.oldAnnc.nombre_condidat;

      },

      getSousCategories: function(CategoId){
                  axios.get(window.Laravel.url+'/getAllSouscategories/'+CategoId)
                  .then(response => {
                    this.sousCategories = response.data;
                   })
                  .catch(error => {
                      console.log('errors : '  , error);
                  })
            }, 
      getCategories:function(){
                 axios.get(window.Laravel.url+'/getAllCategories')
                 .then(response => {
                      this.categories = response.data.categorie;
                      if(response.data.paimentExiste.length ==0 ||response.data.paimentExiste[0].paiment_par =='a' ){
                        this.PaimentExsist = false;
                      }
                      else{
                        this.PaimentExsist = true;
                      }
                 })
                 .catch(error => {
                      console.log('errors : '  ,error);
                 })
             
            },
       activeSousCatego: function(event){
                document.getElementById('sousCtagoSelect').disabled = false;
                this.annonceAjout.catego = event.target.value;
                this.getSousCategories(event.target.value);

            },
         getIdSousCatego: function(event){
                app2.annc.sous_categorie_id = event.target.value;
            },

    },  
    created: function(){
            this.getCategories();

           
        }  

  });



var app = new Vue({

    el: '#app',
 data:{
      annoncesEmployeur: [],
      suppr: false,
      checkedAnnonces: [],
      annoncesDelete: [],
      allSelected: false,
      annonceIds: [],
      selectall: true,
       },
 methods: {
      

     deleteArrayAnnonce:function(){
            if(this.annoncesDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucun annonce a supprimer!',

              }).then((result) => {
                this.allSelected = false;
                this.suppr=false;
                this.selectall = true;
               
             })
              return;
            }
            Swal.fire({
            title: 'Etes vous?',
            text: "De supprimer cette Annonce?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, Supprimer!'
          }).then((result) => {
              if (result.value) {
                this.annoncesDelete.forEach(key => {
                  axios.delete(window.Laravel.url+'/deleteannonce/'+key.id)
                    .then(response => {
                      if(response.data.etat){
                                            
                                var position = this.annoncesEmployeur.indexOf(key);
                                this.annoncesEmployeur.splice(position,1);      
                      }                    
                    })
                    .catch(error =>{
                               console.log('errors :' , error);
                    })
                })
                    this.allSelected = false; 
                    this.checkedAnnonces.length = [];
                    this.suppr=false;
                    this.annoncesDelete = [];
                    this.selectall = true;
              Swal.fire(
                'Effacé!',
                'Votre annonce a été supprimé.',
                'success'
              )
            }
            
            })
       },
        deleteAnnonce: function(annonce){
            Swal.fire({
        title: 'Etes vous?',
        text: "De supprimer cette Annonce?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
              axios.delete(window.Laravel.url+'/deleteannonce/'+annonce.id)
                .then(response => {
                  if(response.data.etat){
                           var position = this.annoncesEmployeur.indexOf(annonce);
                           this.annoncesEmployeur.splice(position,1);
                           
                           this.checkedAnnonces.length = [];
                           this.suppr=false;
                           this.annoncesDelete = [];
                           this.selectall = true;
                  }                     
                })
                .catch(error =>{
                           console.log('errors :' , error);
                })
          Swal.fire(
            'Effacé!',
            'Votre annonce a été supprimé.',
            'success'
          )
        }
        
        })
      },
       changeButton: function(a){ 

        if(this.checkedAnnonces.length > 0){
          this.suppr=true;
          this.annoncesDelete.unshift(a);
        }
        else{
          this.annoncesDelete = [];
          this.suppr=false;
        } 
        if(this.checkedAnnonces.length < this.annoncesDelete.length){
              
            this.annoncesDelete = this.annoncesDelete.filter(function(item) { return item != a; });
        }       
      }, 
      AnnulerSel: function(){
        this.checkedAnnonces.length = [];
        this.changeButton(null);
        this.selectall = true;
        this.allSelected = false;
      },
       selectAll: function() {
            this.selectall = false;
            if (this.allSelected) {
                for (user in this.annoncesEmployeur) {
                    this.annonceIds.push(this.annoncesEmployeur[user].id);
                    this.annoncesDelete.push(this.annoncesEmployeur[user]);
                }
                this.suppr=true;
             }
             else{
              this.annonceIds = [];
              this.annoncesDelete= [];
              this.suppr=false;
              this.selectall = true;
              this.checkedAnnonces = [];
            }
             
        },
         updateAnnonce: function(annonce){     
         app2.hideModel = true;
         app2.openAjout = true;
         app2.openInfo = false;
         app2.modifier = true; 
         app2.annc = annonce;
         app2.oldAnnc.libellé = annonce.libellé;
         app2.oldAnnc.discription = annonce.discription;
         app2.oldAnnc.image = annonce.image;
         app2.oldAnnc.nombre_condidat = annonce.nombre_condidat;
         app2.oldAnnc.sous_categorie_id=annonce.sous_categorie_id;
         
       }, 
        AfficherAjout: function(){
         app2.hideModel = true;
         app2.openAjout = true;
         app2.openInfo = false;
         app2.modifier = false;
         app2.annonceAjout ={
                      id: 0,
                      employeur_id: window.Laravel.idEmployeur,
                      sous_categorie_id:'',
                      catego: '',
                      libellé: '', 
                      discription: '',
                      nombre_condidat:'',
                      image: ''
         }
      }, 
       AfficheInfo: function($id){
        app2.hideModel = true; 
        app2.openInfo = true;
        app2.openAjout = false;
        app2.openPaiment = false;
        app2.detaillsAn.idAn= $id;
        app2.detaillsAnnonce();
      }, 
     annonce_emploi: function(){
            axios.get(window.Laravel.url+'/annoncesemploi')
              .then(response => {
                this.annoncesEmployeur = window.Laravel.annonce.data;
                })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
       MoitieDescription:  function (text, length, suffix){
          if(text.length <= length){
            return text;

          }
         
          return text.substring(0, length) + suffix;

      },
      deselectAnnonce: function(annonce){
             this.annoncesDelete.forEach(key => {
                  if(key.id == annonce){
                      var position = this.annoncesDelete.indexOf(key);
                      this.annoncesDelete.splice(position,1);                    
                  } 
            });              
      },
    }, 
    created:function(){
      this.annonce_emploi();
    } 

});




</script>
@endpush