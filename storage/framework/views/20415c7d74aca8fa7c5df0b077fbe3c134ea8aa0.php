

<?php $__env->startSection('content'); ?>

<head>
      <title><?php echo e(( 'Demande Reçu ')); ?></title>
  </head>

<div class="main-panel" id="main-panel">
  
  <div class="panel-header panel-header-sm" >
  </div>
  <div class="content" id="app">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

      
          <div class="card-header" >
               
                <div class="flex-t">
                    <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected" style="margin-top: 5px;">
                    <label for="article"></label>
                    <h4 style="margin-top: -6px;margin-left: 10px;">Demande Reçu</h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"   v-for="commandec in commandeclient" v-if="commandec.demmande_traiter!==1">

<div v-if="selectall"  id="c"  style="margin-bottom: -20px">
       <input type="checkbox"  style=" margin-left: 10px; " :id="commandec.id" :value="commandec.id" v-model="checkedArticles" @change="changeButton(commandec)">
      <label :for="commandec.id" style="margin-top: 5px; margin-left: 10px;"></label>
    </div>
    <div v-else  id="c" >
      <input type="checkbox" :id="commandec.id" :value="commandec.id" style="margin-left: 10px;" v-model="articleIds" @click="deselectArticle(commandec.id)">
      <label :for="commandec.id" style="margin-top: 5px; margin-left: 10px;"></label>
    </div>


  
    <div class="card-head"  id="cmd">              
    <div class="row"  >
    <div >
  <p class="cvendeur"  id="txt" >
  Demande   {{commandec.id}}</p>
      </div> 
 
    
    <div  class="col-md-4 pr-1" id="cv">
      <div style="margin-left:22px" >
          <p id="txt" style="margin-left: 60px">  {{commandec.date}}</p>
      </div>
       
    </div>
   
    <div class="col-md-4 pl-1" id="a">
      <div class="" id="b" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point"  style="margin-left: 245px">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl"  >
      <a   v-on:click="AfficheInfo(commandec.id)"  class="dropdown-item " 
      style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
<<<<<<< HEAD
    <a class="dropdown-item " v-on:click="deleteDemandeReçuEmployeur(articlea)"
=======
    <a class="dropdown-item " v-on:click="deleteDemandeReçuEmployeur(commandec)"
>>>>>>> 972cd76de5808c4efa19ced1533269b756e75bba
    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
    Supprimer</a>
       </div>
       
    </div>    

    </div> 
    <div  >
<p id="txt" style="margin-top: -20px ;margin-left: 39px" >Condidat: </p> 
<p id="txt1" style="margin-top: -20px;margin-left:120px;">{{commandec.nom.toUpperCase()}} {{commandec.prenom.toUpperCase()}}</p>
 </div>     
 <div  >
<p id="txt" style="margin-top: -20px ;margin-left: 150px" >Annonce: </p> 
<p id="txt1" style="margin-top: -20px;margin-left:220px;">{{commandec.libellé.toUpperCase()}} </p>
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
      </div>
    </div>


</div>
<!-- Modal1 for laptob-->
<div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2"  style="margin-top:50px;">
  <div class="overlay-modal11 js-hide-modal1 " ></div>

  <div class="container" >

 
    <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" style="width: 985px;"  v-for="commandec in commandeclient2">

      <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1" >
        <img src="images/icon-close.png" alt="CLOSE">
      </button>
      

      <div class="row" >
    <div class="col-md-4 pr-1" >
      <div class="p-b-30-p-l-40">
         <h4 class="ltext-102 cl2" style="margin-left: 20px"> Demande </h4>
         <h4 class="ltext-102 cl2" style="margin-left: 170px;margin-top: -30px"> de </h4>
         <h4 class="ltext-102 cl2" style="margin-left: 220px;margin-top: -30px">{{commandec.nom}} </h4>
         <h4 class="ltext-102 cl2" style="margin-left: 330px;margin-top: -30px"> {{commandec.prenom}} </h4>
      </div>
    </div>
    <div class="col-md-4 px-1">

     
    </div>
    <div class="col-md-4 pl-1" >
      <div class=""style="margin-top: 11px;" >
       
      <p class=""  id="tt" style="margin-left: 180px;margin-top: -5px">{{commandec.date}}</p>
      </div>
    </div>
    </div>  
   

    <div class="row" style="margin-left:22px;margin-top:52px;"  v-for="emplC in employeur" >
    <div class="col-md-4 pr-1" >
      <div style="margin-left:-16px;">
          <p class="" id="t2" > Information de condidat:<br>  </p>
              <p id="t1" style="margin-left: 50px;margin-top: 10px">   Nom et prenom :</p>
             <p id="t3" style="margin-left: 180px;margin-top: -22px">   {{emplC.nom}}  {{emplC.prenom}} <br> </p>
            <p id="t1" style="margin-left: 50px;margin-top: 10px"> E-mail: </p>
            <p id="t3" style="margin-left: 110px;margin-top:-22px">{{emplC.email}} 
              <br>  </p>
              <p id="t1" style="margin-left: 50px;margin-top: 10px">   Numéro_téléphone:</p>
             <p id="t3" style="margin-left: 210px;margin-top:-22px">  {{emplC.numeroTelephone}}</p> 
               <p id="t1" style="margin-left: 50px;margin-top: 10px">   CV_client:{{emplC.cv_client}}</p>
     
    </div>
    </div>  

</div>
    

    <div class="row" style="margin-left:22px;margin-top:20px;" v-for="emplC in commandeclient2" >
    <div class="col-md-10 pr-1" >
      <div style="margin-left:-16px;">
       <p class="" id="t2" >Information sur l'annonce :<br> </p>
       <p class=""  id="t1"  style="margin-top: 10px;margin-left: -60px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       Libellé :</p>
      <p id="t3" style="margin-left:120px;margin-top: -22px"> {{emplC.libellé}}</p>
       
       <p class=""  id="t1" style="margin-top: 10px;margin-left: 50px" > Discription :</p>
     <p id="t3" style="margin-left: 150px;margin-top: -22px"> {{emplC.discription}} </p>
       </div>
    </div>
    </div>  

    <div class="row" style="margin-left:400px;">
    <div class="col-md-8 pr-1" >
      <div style="margin-left:464px">
      <button v-on:click=" Recudemande(commandec.id);" class="btn-sm btn-success " style="height: 35px; " ><b>Traiter</b>

                  </button>     
                   </div>
    </div>
   
    </div> 
    
      </div>
      </div>

    </div>

<!--********************************************************************************************************************************************************************-->
    
   
   
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
   
 
 
    detaillsA: {
      idA: 0,
    },
               
  },
methods: {
  Recudemande: function(id){

            axios.put(window.Laravel.url+'/recudemande/'+id)
              .then(response => {
                  console.log(this.employeur)
                  this.employeur.forEach(key=>{
                    if(response.data.etat){
                    
                      var position = this.employeur.indexOf(key);
                      this.employeur.splice(position,1);
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
  detaillsdemandeReçuEmplyeur: function(){
    axios.post(window.Laravel.url+'/detaillsdemandereçuemplyeur', this.detaillsA)
        .then(response => {
             this.commandeclient2 = response.data;
             this.employeur = window.Laravel.emploC;
             this.produit = window.Laravel.prV;
             console.log("this.emplC", this.commandeclient2);
        })
        .catch(error =>{
             console.log('errors :' , error);
        })
  },
  CancelArticle(article){
    this.modifier = false ;
    this.hideModel = false;
    this.art = {        
                  id: 0,
                  admin_id: window.Laravel.idAdmin,
                  titre: '', 
                  description: '',
                  image: ''
    };
    this.message = {};
    article.titre = this.oldArt.titre;
    article.description = this.oldArt.description;
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
  
    deleteArrayArticle:function(){
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
    $('.js-modal1').addClass('show-modal1');
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
<<<<<<< HEAD
=======

>>>>>>> 972cd76de5808c4efa19ced1533269b756e75bba
<?php echo $__env->make('layouts.template_employeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/demande_emploi_reçu_employeur.blade.php ENDPATH**/ ?>