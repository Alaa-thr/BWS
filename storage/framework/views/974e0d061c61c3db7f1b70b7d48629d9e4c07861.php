

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .swal2-container {
      z-index: 9001;
    }
    
</style>
<head>
      <title><?php echo e(( 'Commande Traitée')); ?></title>
  </head>

<div class="main-panel" id="main-panel">
  
  <div class="panel-header panel-header-sm" >
  </div>
  <div class="content" id="app">
    <div class="row">
   
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" >
            <div class="col-md-12">
              <div class="flex-t col-md-12">
                <div class="flex-t col-md-6">
                  <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected">
                  <label for="article"></label> 
                  <h4 style="margin-top: -6px;margin-left: 10px;">Commande Traitée</h4>
                </div>

                <div class="txt-right col-md-6" >
                  <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                  </button>
                  <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                  </button>
                </div>
              </div>
              <hr>       
            </div>
            <div class="card-body col-md-12 " >
              <div class="card-head m-t--20 " style="border: 1px "  v-for="commandec in commandeclient" >
                <div class="row  col-md-12 ">
                  <div class=" col-md-12 flex-t" >
                    <div class="col-md-6" v-if="selectall" >
                      <input type="checkbox"  :id="commandec.id" :value="commandec.id" v-model="checkedArticles" @change="changeButton(commandec)">
                      <label :for="commandec.id" id="txt">Commande Numero  {{commandec.id_cmd}}</label>
                    </div>
                    <div class="col-md-6 " v-else>
                      <input type="checkbox" :id="commandec.id" :value="commandec.id"  v-model="articleIds" @click="deselectArticle(commandec.id)">
                      <label :for="commandec.id" id="txt">Commande Numero  {{commandec.id_cmd}}</label>
                    </div>
                  
                    <div  class="col-md-4 " v-on:click="AfficheInfo(commandec.id,commandec.client_id)">
                        <label id="txt" > prix_total : {{commandec.prix_total}} DA </label>
                    </div>
                    <div class="col-md-2 dropdown">
                      
                        <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                              <i class="fas fa-ellipsis-v"  id="y"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"  >
                            <a  class="dropdown-item js-show-modal1" v-on:click="AfficheInfo(commandec.id,commandec.client_id)" 
                            style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
                            <a class="dropdown-item" v-on:click="deleteCommandeVendeur(commandec)"
                            style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">
                            Supprimer</a>
                        </div>
                     
                    </div>
                    
                  
                </div>
              </div>
              <hr class="m-t-10 m-b-30">                  
            </div>
          </div>     
              <?php echo e($article->links()); ?>

        </div>
      </div>      
    </div>
  </div>      
</div>

<!-- Modal1 for laptob-->
  <div class="wrap-modal11 js-modal1 p-t-80 p-b-20"  id="app2" v-show="hideModel" >
      <div class="overlay-modal11 " v-on:click="CancelArticle()"></div>
      <div class="container col-md-12" >
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent col-md-12" >
          <button class="how-pos3 hov3 trans-04 " v-on:click="CancelArticle()" >
              <img src="images/icons/icon-close.png" alt="CLOSE">
          </button>
          <div class="p-b-30 p-l-40" >
            <h4 class="ltext-102  cl2">
                     COMMANDE DE    {{client.nom_client.toUpperCase()}} {{client.prenom_client.toUpperCase()}}

              
            </h4>
          </div>
          <div class="row col-md-12 flex-t"  >
            <div class="col-md-6 " >
              <div class="p-lr-0-lg" >
                <div class="wrap-slick3 flex-sb flex-w">
                  <div class="p-t-20 p-b-20 p-l-50">
                    <h4 class="mtext-105 cl13 p-l-70">
                      Produits
                    </h4>
                  </div>
                  <div class="div1">
                    <div>
                      <div class="table_row flex-t p-b-20" v-for="produit in commandeclient2" >
                        <div class="column-1">
                          <div  style="height: 80px; width: 60px">
                            <img :src="'storage/produits_image/'+ produit.image" alt="IMG" >
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-10">{{produit.qte}} x {{produit.prix_total}} DA
                        </div>
                        <div class="column-2 p-l-40 ">
                          <div class="input-group mb-3 ">
                            <div   v-if="produit.type_livraison === 'vc'">Le vendeur effectuer la livraison</div>
                            <div  v-if="produit.type_livraison === 'cv'">Le client apporte leur produit</div>
                          <div  v-if="produit.type_livraison === 'dhl'">DHL(Poste)</div> 
                        </div>
                        <div class="flex-t m-t--10">
                          <div>Couleur: {{produit.nom}}</div>
                          <div v-if="produit.taille != 0">&nbsp&nbsp/&nbsp&nbspTaille: {{produit.taille}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          

          <div class="col-md-6">
            <div class="p-t-20 p-b-50 p-l-50">
              <h4 class="mtext-105 cl13 p-l-70">
                      Information sur Client
              </h4>
            </div>
            <div class="col-md-12 p-b-10">
              <div class="col-md-12 form-group flex-w p-b-20">
                <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                        Numero Telephone
                </div>
                <div class="size-219">
                  <div class=" bg0 ">
                     <input class="form-control" type="text" :value="client.numero_tlf"Disabled>
                  </div>
                </div>
              </div>

              <div class="col-md-12 form-group flex-w p-b-20">
                <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                        Email
                </div>
                <div class="size-219 ">
                   <div class=" bg0">
                      <input class="form-control "  type="text" :value="client.email" Disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group flex-w p-b-20">
                <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                        Ville
                </div>
                <div class="size-219">
                  <div class="bg0">
                      <input class="form-control " type="text" :value="client.ville" Disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group flex-w p-b-20">
                <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                        Address
                </div>
                <div class="size-219">
                  <div class="bg0">
                      <input class="form-control " type="text" :value="client.address" Disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group flex-w p-b-35">
                <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                        Code Postale
                </div>
                <div class="size-219">
                  <div class="bg0">
                    <input class="form-control " type="text" :value="client.code_postale" Disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12 flex-t">
                <div class="col-md-6">
                  <button v-on:click=" deleteCommandeVendeurr(client)"   class="btn-sm btn-danger " style="border: 0; float: right; border-radius: 1em;height: 35px;" ><b>Supprimer</b>
                  </button>   
                </div>       
              </div>
            </div>
          </div>
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
           'emploC' => $emploC,
           'prV' => $prV,
           'cmd' => $cmd,
           'prixx' => $prixx,
           "url"      => url("/")  
      ]); ?>;
</script>

<script>
function initDashboardPageCharts () {}


var app2 = new Vue({
  el: '#app2',
  data:{
    commandeclient2: [],
    employeur:[],
    produit:[],
    hideModel: false,
    client: {
      nom_client: 'NON',
      prenom_client: 'NON'
    },
    detaillsA: {
      idA: 0,
      idClient:0,
    },
  
  },
methods: {

          RecuCommande: function(id){
          	axios.put(window.Laravel.url+'/recucommande/'+id)
              .then(response => {
                	console.log("response",response.data);
                  window.location.reload();
               })
              .catch(error => {
                  console.log('errors : '  , error);
             })
          },
          detaillsacommandeVendeur: function(){;
            axios.post(window.Laravel.url+'/detaillsacommandevendeur', this.detaillsA)

                .then(response => {
                     this.commandeclient2 = response.data;//detaill de commande
                     this.client = this.commandeclient2[0];
                })
                .catch(error =>{
                     console.log('errors :' , error);
                })
          },
          CancelArticle(){
            this.hideModel = false;
          },
          deleteCommandeVendeurr: function(commande){
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
                      axios.delete(window.Laravel.url+'/deletecommandevendeur/'+commande.id+'/'+commande.client_id+'/'+commande.vendeur_id)
                        .then(response => {
                          if(response.data.etat){

                              $('.js-modal1').removeClass('show-modal1');
                              app.commandeclient.forEach(key=>{
                                console.log(key)
                                if(key.id == commande.id && key.client_id == commande.client_id && key.vendeur_id == commande.vendeur_id){
                                  var position = app.commandeclient.indexOf(key);
                                   app.commandeclient.splice(position,1);
                                }
                              })
                                   
                                   app.checkedArticles.length = [];
                                   app.suppr=false;
                                   app.artilcesDelete = [];
                                   app.selectall = true;
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
  tt:[],

  },
methods: {
  
   deleteArrayArticle:function(){
        if(this.artilcesDelete.length == 0){
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
            this.artilcesDelete.forEach(key => {
              axios.delete(window.Laravel.url+'/deletecommandevendeur/'+key.id+'/'+key.client_id+'/'+key.vendeur_id)
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
            'Votre commande a été supprimé.',
            'success'
          )
        }
        
        })
   },
   deleteCommandeVendeur: function(commande){
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
                      axios.delete(window.Laravel.url+'/deletecommandevendeur/'+commande.id+'/'+commande.client_id+'/'+commande.vendeur_id)
                        .then(response => {
                          if(response.data.etat){

                                $('.js-modal1').removeClass('show-modal1');
                              app.commandeclient.forEach(key=>{
                                console.log(key)
                                if(key.id == commande.id && key.client_id == commande.client_id && key.vendeur_id == commande.vendeur_id){
                                  var position = app.commandeclient.indexOf(key);
                                   app.commandeclient.splice(position,1);
                                }
                              })
                                   
                                   app.checkedArticles.length = [];
                                   app.suppr=false;
                                   app.artilcesDelete = [];
                                   app.selectall = true;
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
 AfficheInfo: function($idCmd,$idClient){
    $('.js-modal1').addClass('show-modal1');
    app2.hideModel = true;
    app2.detaillsA.idA= $idCmd;
    app2.detaillsA.idClient= $idClient;
    app2.detaillsacommandeVendeur();
  },
  get_commande_vendeur: function(){
            axios.get(window.Laravel.url+'/commandeTraiterVendeur')

                .then(response => {
                     this.tt = window.Laravel.article.data;
                  var $x=1;
                  this.tt.forEach(key1 =>{

                        for(i=0; i<window.Laravel.cmd.length  ; i++ ){
                            if(key1.id == window.Laravel.cmd[i].id){
                               this.commandeclient.push({id: key1.id ,address:window.Laravel.cmd[i].address,date:window.Laravel.cmd[i].date,client_id:window.Laravel.cmd[i].client_id,id_cmd:$x,vendeur_id:window.Laravel.cmd[i].vendeur_id});
                               $x++;
                                i = window.Laravel.cmd.length;
                            }
                       }
                     });
                  console.log("window.Laravel.prixx",window.Laravel.prixx)
                  console.log("window.Laravel.cmd",window.Laravel.cmd)
                  console.log("this.tt",this.tt)
                  console.log("this.commandeclient",this.commandeclient)
                  this.commandeclient.forEach(key=>{
                     for(i=0; i<window.Laravel.prixx.length  ; i++ ){
                            if(key.id == window.Laravel.prixx[i].id){
                               this.commandeclient[i]['prix_total']=window.Laravel.prixx[i].PrixTotal;
                                i = window.Laravel.prixx.length;
                            }
                       }
                    
                  })

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
  this.get_commande_vendeur();
}
});


</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/commande_traiter_vendeur.blade.php ENDPATH**/ ?>