@extends('layouts.template_employeur')

@section('content')

	<head>
		<title>{{ ( 'Demande Reçu') }}</title>
	</head>
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle ">
              <button type="button" class="navbar-toggler ">
                <span class="navbar-toggler-bar bar1 "></span>
                <span class="navbar-toggler-bar bar2 "></span>
                <span class="navbar-toggler-bar bar3 "></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Demande Reçu</a>
          </div>
        </div>
      </nav>
        <div class="panel-header panel-header-sm">
      </div> 
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> demandes reçus </h4>
              </div>
               <div class="txt-right"style="margin-top: -40px; " >
                      <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayDemande()"><b>Supprimer</b>
                      </button>
                      <button v-else  class="btn-sm btn-info js-show-modal1" style="height: 35px;" v-on:click="AfficherAjout()" ><b>Ajouter annonce</b>
                      <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                      </button>
                   </div>
                <hr> 
                     <div class="flex-t">
                    <div class="row m-b-10" v-for="demandea in demandereçus" >
                  <div v-if="selectall">
                    <input type="checkbox" :id="demandea.id" :value="demandea.id" v-model="checkedDemandes" @change="changeButton(demandea)">
                    <label :for="demandea.id" style="margin-top: 40px; margin-left: 10px;"></label>
                  </div>
                   <div v-else>
                    <input type="checkbox" :id="demandea.id" :value="demandea.id" v-model="demandeIds" @click="deselectDemande(demandea.id)">
                    <label :for="demandea.id" style="margin-top: 40px; margin-left: 10px;"></label>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



@endsection

@push("javascripts")




<script>
    window.Laravel = {!! json_encode([
           "csrfToken"  => csrf_token(),
           "demande"   => $demande ?? '',
           "idEmployeur" => $idEmployeur ?? '',
           'emploD'=> $emploD ?? '',  
           'annE'=> $annE ?? '',
           "url"      => url("/")  
      ]) !!};
</script>

<script>
Vue.mixin({
methods: {
  detaillsdemandeReçu: function(){
    axios.post(window.Laravel.url+'/detaillsdemandereçu', this.detaillsD)
        .then(response => {
             this.demandereçus2 = response.data;
             this.employeur = window.Laravel.emploC;
             this.annonces = window.Laravel.annE;
             
        })
        .catch(error =>{
             console.log('errors :' , error);
        })
  },
  CancelDemande(demande){
    this.modifier = false ;
    this.hideModel = false;
    this.dmnd = {        
                  id: 0,
                  employeur_id: window.Laravel.idEmployeur,
                  titre: '', 
                  description: '',
                  image: ''
    };
    this.message = {};
    demande.titre = this.oldDmnd.titre;
    demande.description = this.oldDmnd.description;
  },
},    
});
var app2 = new Vue({
  el: '#app2',
  data:{
    demandereçus2: [],
    clients:[],
    annonces:[],
    openInfo: false,
    hideModel: false,
    detaillsD: {
      idD: 0,
    },
  },
});
  
  
               

var app = new Vue({
el: '#app',
data:{
  demandereçus: [],
  suppr: false, 
  checkedDemandes: [],
  demandesDelete: [],
  allSelected: false,
  demandeIds: [],
  selectall: true,
  },
methods: {
  
   deleteArrayDemande:function(){
        if(this.demandesDelete.length == 0){
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
        text: "De supprimer cette Commande?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.demandesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletedemandereçu/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.demandereçus.indexOf(key);
                            this.demandereçus.splice(position,1);      
                  }                    
                })
                .catch(error =>{
                           console.log('errors :' , error);
                })
            })
                this.allSelected = false;
                this.checkedDemandes.length = [];
                this.suppr=false;
                this.demandesDelete = [];
                this.selectall = true;
          Swal.fire(
            'Effacé!',
            'Votre commande a été supprimé.',
            'success'
          )
        }
        
        })
   },
 
   deleteDemandeReçu: function(demande){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette Commande?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletedemandereçu/'+demande.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.demandereçus.indexOf(demande);
                       this.demandereçus.splice(position,1);
                       this.checkedDemandes.length = [];
                       this.suppr=false;
                       this.demandesDelete = [];
                       this.selectall = true;
              }                     
            })
            .catch(error =>{
                       console.log('errors :' , error);
            })
      Swal.fire(
        'Effacé!',
        'Votre commande a été supprimé.',
        'success'
      )
    }
    
    })
  },
 
 
  
  
  AfficheInfo: function($id){
    app2.hideModel = true; 
    app2.openAjout = false ;
    app2.openInfo = true;
    app2.detaillsD.idD= $id;
    app2.detaillsdemandeReçu();
  },
 demande_reçu: function(){
            axios.get(window.Laravel.url+'/demandeemploireçu')
                .then(response => {
                     this.demandereçus = window.Laravel.demande.data;
                })
                .catch(error =>{
                     console.log('errors :' , error);
                })
  },
  changeButton: function(a){
    this.demandesDelete.unshift(a);
    if(this.checkedDemandes.length > 0){
      this.suppr=true;
    }
    else{
      this.demandesDelete = [];
      this.suppr=false;
    }        
  }, 
  AnnulerSel: function(){
    this.checkedDemandes.length = [];
    this.changeButton();
    this.selectall = true;
    this.allSelected = false;
  },
 
 
  selectAll: function() {
        this.selectall = false;
        if (this.allSelected) {
            for (user in this.demandereçus) {
                this.demandeIds.push(this.demandereçus[user].id);
                this.demandesDelete.push(this.demandereçus[user]);
            }
            this.suppr=true;
         }
         else{
          this.demandeIds = [];
          this.demandesDelete= [];
          this.suppr=false;
          this.selectall = true;
          this.checkedDemandes = [];
        }
         
    },
    deselectDemande: function(demande){
         this.artilcesDelete.forEach(key => {
              if(key.id == demande){
                  var position = this.demandesDelete.indexOf(key);
                  this.demabdesDelete.splice(position,1);                    
              } 
        });             
    }
},  
created:function(){
  this.demande_reçu();
}
},
});
</script>

@endpush