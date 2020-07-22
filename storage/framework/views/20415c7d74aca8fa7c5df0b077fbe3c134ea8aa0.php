

<?php $__env->startSection('content'); ?>

<head>
      <title><?php echo e(( 'Demande Reçu ')); ?></title>
  </head>


  
  <div class="panel-header panel-header-sm" >
  </div>
  <div class="content" id="app">
    <div class="row">
   
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" >
            <div class="flex-t col-md-12">
              <div class="flex-t col-md-6">
                 <h4 style="margin-top: -6px;margin-left: 10px;">Demande Reçu</h4>
              </div>
            </div>
            <hr >       
          
        
            <div class="card-body"  v-for="demandec in commandeclient" >
              <div class="card-head"  id="cmddd"   >              
                <div class="row col-md-12"  >
                  <div class="row  col-md-12"  > 
                    <div class=" col-md-12 flex-t" >
                      <div class="flex-t col-md-7">
                        <p id="txt">Demande   {{demandec.id}}</p>
                      </div>
                      <div  class="m-t--7 col-md-4 js-show-modal1" v-on:click="AfficheInfo(demandec.id)" style="cursor: pointer;">
                          <p id="txt" style="float: right;">   {{demandec.date}}</p>
                      </div>
                      <div class="col-md-2 dropdown m-t-5" style="cursor: pointer;">
                        <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                          <i class="fas fa-ellipsis-v"  id="y"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" >
                          <a class="dropdown-item js-show-modal1" v-on:click="AfficheInfo(demandec.id)" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Afficher Plus
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 flex-t m-b-10 js-show-modal1" v-on:click="AfficheInfo(demandec.id)" style="cursor: pointer;">
                      <div class="col-md-8" >
                        <p id="txt" >Condidat: {{demandec.nom.toUpperCase()}} {{demandec.prenom.toUpperCase()}}</p> 

                      </div >
                      <div class="col-md-4">
                        <p id="txt" > Annonce: {{demandec.libellé.toUpperCase()}}</p> 
                      </div> 
                  </div>
                </div>
              </div>                  
            </div>
          </div>     
              <?php echo e($article->links()); ?>

          </div>
        </div>      
      </div>
    </div> 

<!-- Modal1 for laptob-->
<div class="wrap-modal11 js-modal1 p-t-80 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel" >
  <div class="overlay-modal11 " v-on:click="CancelArticle()"></div>

  <div class="container" >

 
    <div class="bg0  p-b-100 p-lr-15-lg how-pos3-parent" style="width: 970px;padding-top: 40%">

      <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1" v-on:click="canceldemande()">
        <img src="images/icon-close.png" alt="CLOSE" >
      </button>
      
      <section class=" creat-article ">     
        <div  class=" container-creat-article">
          <div class="col-md-12 flex-t m-t--10 m-b-30">
            <h4 class="ltext-102 col-md-9 cl2 m-l--60" >DEMANDE DE {{condidat.nom_Prenom.toUpperCase()}}
            </h4>
           
            <div class="col-md-3 m-t--5">
              <p  id="txt" >{{condidat.date}}</p>
            </div>
          </div>
          <div class="row col-md-12 m-l--30" >
            <div class="col-md-12" >
              <p class="m-l--20" id="txt" >Information de condidat : </p>
                  <div class="flex-t m-l-10">
                      <p id="txt">Nom et prenom :</p>
                     <p style="color: #ca2323">{{condidat.nom_Prenom.toUpperCase()}} </p>
                  </div>
                  <div class="flex-t m-l-10">
                    <p id="txt">E-mail: </p>
                    <p style="color: #ca2323" >{{condidat.email}}</p>
                  </div>
                  <div class="flex-t m-l-10">
                      <p id="txt">Numéro_téléphone:</p>
                     <p style="color: #ca2323">{{condidat.numeroTlf}}</p> 
                  </div>
                  <div class="flex-t m-l-10">
                       <p id="txt">CV_client:</p>
                       <a :href="'storage/demande_cv/'+ condidat.cv_client" download="">
                        <p style=" cursor: pointer;">{{condidat.cv_client}}</p>
                     </a>
                  </div>
            </div> 
          </div>
          <div class="row col-md-12 m-l--30 m-b-30" >
            <div class="col-md-12" >
              <p class="m-l--20" id="txt" >Information sur l'annonce : </p>
                  <div class="flex-t m-l-10">
                      <p id="txt">Libellé :</p>
                     <p style="color: #ca2323">{{annoceInfo.libellé}} </p>
                  </div>
                  <div class="flex-t m-l-10">
                    <p id="txt">Discription: </p>
                    <p style="color: #ca2323" >{{annoceInfo.discription}}</p>
                  </div>
            </div> 
          </div>
          <div class="row col-md-10">
              <div class="col-md-12">
                <button v-on:click=" Recudemande(condidat.id);" class="btn-sm btn-success " style=" height: 35px; border: 0; width: 100px; border-radius: 1em; font-size: 12px;  font-weight: 700; float: right;" ><b>Traiter</b></button>     
              </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>




  





<?php $__env->stopSection(); ?>




<?php $__env->startPush("javascripts"); ?>




<script>
    window.Laravel = <?php echo json_encode([
           "csrfToken"  => csrf_token(),
           "article"   => $article,
           "idAdmin" => $idAdmin,     
            "emploC" => $emploC,  
            'prV' => $prV,
           "url"      => url("/")  
      ]); ?>;
</script>

<script>
var app2 = new Vue({
  el: '#app2',
  data:{
    commandeclient2: [],
    employeur:[],
    produit:[],
    openInfo: false,
    hideModel: false,
    condidat: {
      nom_Prenom: 'non',

    },
    detaillsA: {
      idA: 0,
    },
    annoceInfo:[],
               
  },
methods: {

  Recudemande: function(id){

            axios.put(window.Laravel.url+'/recudemande/'+id)
              .then(response => {
                  console.log(this.employeur)
                  app.commandeclient.forEach(key=>{
                    if(key.id == id){
                        
                      var position = app.commandeclient.indexOf(key);
                      app.commandeclient.splice(position,1);
                    }
                  })
                  Swal.fire(
                    "Votre demande!",
                    'a été ajouter dans demande traité avec success.',
                    'success'
                  );
                  $('.js-modal1').removeClass('show-modal1');    
                 })
              .catch(error => {
                  console.log("errors : "  , error);
              })
              
          },
          canceldemande: function(){
           this.hideModel = false; 
          },
  detaillsdemandeReçuEmplyeur: function(){
    console.log(",this.detaillsA",this.detaillsA)
    axios.post(window.Laravel.url+'/detaillsdemandereçuemplyeur', this.detaillsA)
        .then(response => {
             this.commandeclient2 = response.data.demande_detaills;
             this.condidat = this.commandeclient2[0] 
             this.annoceInfo = response.data.annonce[0]; 
             console.log("this.condidat", this.commandeclient2);
             console.log("this.annoceInfo", this.annoceInfo);

        })
        .catch(error =>{
             console.log('errors :' , error);
        })
  },
},    
});
var app = new Vue({
el: '#app',
data:{
  commandeclient: [],
  suppr: false, 
  checkedArticles: [],
  artilcesDelete: [],
  allSelected: false,
  articleIds: [],
  selectall: true,
  },
methods: {
  
    deleteArrayDemande:function(){
        if(this.artilcesDelete.length == 0){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Il ya aucun Demande a supprimer!',
          }).then((result) => {
            this.allSelected = false;
            this.suppr=false;
            this.selectall = true;
           
         })
          return;
        }
        Swal.fire({
        title: 'Etes vous?',
        text: "De supprimer cette demande?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletedemanderçuemplyeur/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.commandeclient.indexOf(key);
                            this.commandeclient.splice(position,1);      
                  }                    
                })
                .catch(error =>{
                           console.log('errors :' , error);
                })
            })
                this.allSelected = false;
                this.checkedArticles.length = [];
                this.suppr=false;
                this.artilcesDelete = [];
                this.selectall = true;
          Swal.fire(
            'Effacé!',
            'Votre demande a été supprimé.',
            'success'
          )
        }
        
        })
   },
   
 
   deleteDemandeReçuEmployeur: function(article){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette demande?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletedemandereçuemplyeur/'+article.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.commandeclient.indexOf(article);
                       this.commandeclient.splice(position,1);
                       this.checkedArticles.length = [];
                       this.suppr=false;
                       this.artilcesDelete = [];
                       this.selectall = true;
                       console.log("this.commandeclient",this.commandeclient);
              }                     
            })
            .catch(error =>{
                       console.log('errors :' , error);
            })
      Swal.fire(
        'Effacé!',
        'Votre demande a été supprimé.',
        'success'
      )
    }
    
    })
  },
 
  
  
  AfficheInfo: function($id){
    
    app2.hideModel = true; 
    app2.openAjout = false ;
    app2.openInfo = true;
    app2.detaillsA.idA= $id;
    app2.detaillsdemandeReçuEmplyeur();
  },
  get_demande_reçu_emplyeur: function(){
            axios.get(window.Laravel.url+'/demandeEmploiRecu')
                .then(response => {
                     this.commandeclient = window.Laravel.article.data;
                     console.log('this.commandeclient',this.commandeclient);
                })
                .catch(error =>{
                     console.log('errors :' , error);
                })
  },
  changeButton: function(a){
    this.artilcesDelete.unshift(a);
    if(this.checkedArticles.length > 0){
      this.suppr=true;
    }
    else{
      this.artilcesDelete = [];
      this.suppr=false;
    }        
  }, 
  AnnulerSel: function(){
    this.checkedArticles.length = [];
    this.changeButton();
    this.selectall = true;
    this.allSelected = false;
  },
 
 
  selectAll: function() {
        this.selectall = false;
        if (this.allSelected) {
            for (user in this.commandeclient) {
                this.articleIds.push(this.commandeclient[user].id);
                this.artilcesDelete.push(this.commandeclient[user]);
            }
            this.suppr=true;
         }
         else{
          this.articleIds = [];
          this.artilcesDelete= [];
          this.suppr=false;
          this.selectall = true;
          this.checkedArticles = [];
        }
         
    },
    deselectArticle: function(article){
         this.artilcesDelete.forEach(key => {
              if(key.id == article){
                  var position = this.artilcesDelete.indexOf(key);
                  this.artilcesDelete.splice(position,1);                    
              } 
        });             
    }
},  
created:function(){
  this.get_demande_reçu_emplyeur();
}
});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_employeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/demande_emploi_reçu_employeur.blade.php ENDPATH**/ ?>