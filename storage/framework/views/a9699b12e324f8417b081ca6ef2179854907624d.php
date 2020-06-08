
 
<?php $__env->startSection('content'); ?>

<head>
      <title><?php echo e(( 'Notification ')); ?></title>
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
                    <h4 style="margin-top: -6px; margin-left: 10px;">Notification</h4>
                </div>

            <div class="txt-right"style="margin-top: -40px; " >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  
                  
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
               </div>
         
            
            <hr style="margin-top:42px;">       
          
        
            <div class="card-body"    v-for="notificationc in notificationclient" >

<div v-if="selectall" >                    
<div id="noti" >    
 <i class="now-ui-icons ui-1_bell-53" ></i></div> 
       <label :for="notificationc.id" style="margin-top: 40px; margin-left: 10px;"></label>
    </div>
    <div v-else >
      <div id="ch1">
      <input type="checkbox" :id="notificationc.id" :value="notificationc.id" v-model="articleIds" @click="deselectArticle(notificationc.id)"></div>
      <label :for="notificationc.id" style="margin-top: 65px; margin-left: 10px;"></label>
    </div>


  <div class="card-head"  id="hmd"  >              
    <div class="row"  >
    <div >
  <p class=""  id="hh" >
       {{notificationc.id}}</p>
      </div> 
 
    
    <div  class="col-md-4 pr-1" v-if="notificationc.vendeur_id  === null" >
      <div style="margin-left:22px" v-for="emplC in employeur" v-if=" notificationc.employeur_id  === emplC.id">
          <p class="" id="h" >Employeur ' {{emplC.nom}}' à  nouveau annonce d'emplois.</p>
      </div>
       
    </div>
    <div  class="col-md-4 pr-1" v-else="notificationc.employeur_id  === null" >
      <div style="margin-left:22px" v-for="imgA in imagesannonce" v-if=" notificationc.vendeur_id  === imgA.id">
          <p class="" id="h" >vendeur ' {{imgA.Nom}}' à  nouveau annonce d'emplois.</p>
      </div>
       
    </div>
    <div class="col-md-4 pl-1" >
      <div class="" >
      <a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#" id="point">
        <i class="fas fa-ellipsis-v"  id="y"></i>
       </a>
      <div class="dropdown-menu " x-placement="right-start" id="pl"  >
      <a   v-on:click="AfficheInfo(notificationc.id)"  class="dropdown-item js-show-modal1" 
      style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
    <a class="dropdown-item" v-on:click="deleteNotificationClient(notificationc)"
    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
    Supprimer</a>
       </div>
      
    </div>    

    </div>      

  </div>      

  <hr>

    
</div>                  
              </div>

            </div>     
              <?php echo e($article->links()); ?>

          </div>
    
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
           'notificC'         => $notificC,
           'ImageA'         => $ImageA,

           "url"      => url("/")  
      ]); ?>;
</script>

<script>



var app2 = new Vue({
  el: '#app2',
  data:{
    openInfo: false,
    hideModel: false,
    detaillsA: {
      idA: 0,
    },

  },
methods: {


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
  notificationclient: [],
  employeur:[],imagesannonce:[],
  suppr: false, 
  checkedArticles: [],
  artilcesDelete: [],
  allSelected: false,
  articleIds: [],
  selectall: true,

  },
methods: {
  AfficheInfo: function($id){
    app2.hideModel = true; 
    app2.openAjout = false ;
    app2.openInfo = true;
    app2.detaillsA.idA= $id;
    app2.detaillsCommande();
  },
   deleteArrayArticle:function(){
        if(this.artilcesDelete.length == 0){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Il ya aucun Notification a supprimer!',

          }).then((result) => {
            this.allSelected = false;
            this.suppr=false;
            this.selectall = true;
           
         })
          return;
        }
        Swal.fire({
        title: 'Etes vous?',
        text: "De supprimer cette Notification?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletenotificationclient/'+key.id)
                .then(response => {
                  if(response.data.etat){
                                        
                            var position = this.notificationclient.indexOf(key);
                            this.notificationclient.splice(position,1);      
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
            'Votre notification a été supprimé.',
            'success'
          )
        }
        
        })
   },
 
   deleteNotificationClient: function(article){
        Swal.fire({
    title: 'Etes vous?',
    text: "De supprimer cette Notification?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprimer!'
  }).then((result) => {
      if (result.value) {
          axios.delete(window.Laravel.url+'/deletenotificationclient/'+article.id)
            .then(response => {
              if(response.data.etat){
                       var position = this.notificationclient.indexOf(article);
                       this.notificationclient.splice(position,1);
                       this.checkedArticles.length = [];
                       this.suppr=false;
                       this.artilcesDelete = [];
                       this.selectall = true;
              }                     
            })
            .catch(error =>{
                       console.log('errors :' , error);
            })
      Swal.fire(
        'Effacé!',
        'Votre notification a été supprimé.',
        'success'
      )
    }
    
    })
  },
 
 
  
  
  
  get_notification_client: function(){
            axios.get(window.Laravel.url+'/notificationClient')

                .then(response => {
                     this.notificationclient = window.Laravel.article.data;
                     this.employeur = window.Laravel.notificC;
                     this.imagesannonce = window.Laravel.ImageA;

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
            for (user in this.notificationclient) {
                this.articleIds.push(this.notificationclient[user].id);
                this.artilcesDelete.push(this.notificationclient[user]);
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
  this.get_notification_client();
}
});


</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/notification_client.blade.php ENDPATH**/ ?>