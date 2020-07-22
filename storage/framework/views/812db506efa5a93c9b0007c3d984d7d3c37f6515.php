

<?php $__env->startSection('content'); ?>
<?php
  $id=1;


?>
<head>
      <title><?php echo e(( 'Commande Reçu')); ?></title>
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
                   <h4 style="margin-top: -6px;margin-left: 10px;">Commande Reçu</h4>
                </div>
                <hr>
                <div class="card-body"   v-for="commandec in commandeclient" >
                  <div class="card-head" id="cmddd" v-on:click="AfficheInfo(commandec.id,commandec.client_id)">              
                    <div class="row  col-md-12"  > 
                        <div class=" col-md-12 flex-t" >
                          <div class=" m-l--25 m-t--7 col-md-6" >
                              <p id='txt' >Commande {{commandec.id_cmd}}</p>
                          </div>
                          <div  class="m-t--7 col-md-4">
                                <p id="txt" style="float: right;">  {{commandec.date}}</p>
                          </div>
                          <div class="col-md-2 dropdown">                            
                              <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                                    <i class="fas fa-ellipsis-v"  id="y"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" >
                                  <a  class="dropdown-item js-show-modal1" v-on:click="AfficheInfo(commandec.id,commandec.client_id)" 
                                    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
                              </div>
                          </div> 
                        </div> 
                        <div class="col-md-12 flex-t m-b-10" >
                          <div  class="m-l--25 col-md-7" v-if="commandec.address">
                            <p id="txt" >Address: {{commandec.address}}</p> 
                          </div> 
                          <div class="col-md-7"  v-else >
                            <p id="txt"  >Code postal: {{commandec.code_postale}}</p>
                          </div>
                          <div class="col-md-4">
                            <p id="txt" style="float: right;" >Prix_total: {{commandec.prix_total}} DA </p>
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
                <div class="col-md-6 " >
                  <button v-on:click=" RecuCommande(client.id,client.id_client);"   class="btn-sm btn-success " style="border: 0; float: right;border-radius: 1em;height: 35px;" ><b>Accepté</b>
                  </button>  
                </div> 
                <div class="col-md-6">
                  <button v-on:click=" RefuserCommande(client.id,client.id_client);"   class="btn-sm btn-danger " style="border: 0; float: right; border-radius: 1em;height: 35px;" ><b>Refuser</b>
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
    detaillsA: {
      idA: 0,
      idClient:0,
    },
    client: {
      nom_client: 'NON',
      prenom_client: 'NON'
    },
  
  },
methods: {

  RecuCommande: function(id,idClient){
             axios.put(window.Laravel.url+'/recucommande/'+id+'/'+idClient)
              .then(response => {
                  var position = app.commandeclient.indexOf(response.data.traiter[0]);
                  app.commandeclient.splice(position,1);
                  $('.js-modal1').removeClass('show-modal1');    
                  Swal.fire({
                    title: 'Cette Commande est Accepté!',
                    html: '<ul><li style="list-style-type: disc;">Vous devais contactez <b>'+this.client['nom_client']+' '+this.client['prenom_client']+' </b>pour un accord entre vous.</li><li style="list-style-type: disc;">La <b>QAUNTITé DES PRODUITS</b> de cette commande vas<b> DIMINU.</b></li><li style="list-style-type: disc;">Vous trouvez cette commande dans commande traitées.</li></ul>',
                    icon:'success'
                  });
                  
                       
              }).catch(error => {
                  console.log("errors : "  , error);
              })
          },
          RefuserCommande: function(id,idClient){
            $('.js-modal1').removeClass('show-modal1'); 
            Swal.fire({
              title: 'Etes vous?',
              text: "De refusé cette Commande?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Oui, refuser !',
              cancelButtonText: 'Annuler'
            }).then((result) => {
              if (result.value) {
                axios.put(window.Laravel.url+'/refusercommande/'+id+'/'+idClient)
                .then(response => {
                    var position = app.commandeclient.indexOf(response.data.traiter[0]);
                    app.commandeclient.splice(position,1);
                     
                    this.hideModel = false;  
                   })
                .catch(error => {
                    console.log("errors : "  , error);
                })

                Swal.fire(
                  "Vous trouver!",
                  'cette commande dans Commande Traiter et une notification a été envoyée au client.',
                  'success'
                )
              }
            })
             
          },
          detaillsacommandeVendeur: function(){
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
  tt: [],


  },
methods: {
  

 
 
  
  
  AfficheInfo: function($idCmd,$idClient){
    $('.js-modal1').addClass('show-modal1');
    app2.hideModel = true;
    app2.detaillsA.idA= $idCmd;
    app2.detaillsA.idClient= $idClient;
    app2.detaillsacommandeVendeur();
  },
  get_commande_vendeur: function(){
            axios.get(window.Laravel.url+'/commandeRecuVendeur')

                .then(response => {
                  this.tt = window.Laravel.article.data;
                  var $x=1;
                  this.tt.forEach(key1 =>{

                        for(i=0; i<window.Laravel.cmd.length  ; i++ ){
                            if(key1.id == window.Laravel.cmd[i].id){
                               this.commandeclient.push({id: key1.id ,address:window.Laravel.cmd[i].address,date:window.Laravel.cmd[i].date,client_id:window.Laravel.cmd[i].client_id,id_cmd:$x});
                               $x++;
                                i = window.Laravel.cmd.length;
                            }
                       }
                     });
                  
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

},  
created:function(){
  this.get_commande_vendeur();
}
});


</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/commande_recu_vendeur.blade.php ENDPATH**/ ?>