

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .swal2-container {
      z-index: 9001;
    }
    
</style>

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
                  <div class="card-head" id="cmddd" style="cursor: pointer;">              
                    <div class="row  col-md-12 m-t-5"  > 
                        <div class=" col-md-12 flex-t m-b-10" >
                          <div class=" m-l--25 m-t--7 col-md-8 flex-t"  v-on:click="AfficheInfo(commandec.id,commandec.client_id,commandec)" >
                              <p  style="color: black">Commande de<p class="m-l--25"  id='txt'>{{commandec.id_cmd}}</p></p>
                          </div>
                          <div  class="m-t--7 col-md-3" v-on:click="AfficheInfo(commandec.id,commandec.client_id,commandec)" >
                                <p id="txt" style="float: right;">  {{commandec.date}}</p>
                          </div>
                          <div class="col-md-2 dropdown m-t-5 m-l--10">                            
                              <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"  style="float: right;">
                                    <i class="fas fa-ellipsis-v"  style="color: black"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" >
                                  <a  v-on:click="pdf(commandec.id)" class="dropdown-item"  style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Télécharger
                                  </a>
                                  <a  class="dropdown-item js-show-modal1" v-on:click="AfficheInfo(commandec.id,commandec.client_id,commandec)" 
                                    style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" >Afficher Plus</a>
                              </div>
                          </div> 
                        </div> 
                        <div class="col-md-12 flex-t m-b-10" v-on:click="AfficheInfo(commandec.id,commandec.client_id,commandec)" >
                          <div  class="m-l--25 col-md-9 flex-t" v-if="commandec.address">
                            <p  style="color: black">Address: <p class="m-l--25"  id='txt'>{{commandec.address}}</p></p>
                         
                          </div> 
                          <div class="col-md-9 flex-t"  v-else >
                            <p  style="color: black">Code postal: <p class="m-l--25"  id='txt'>{{commandec.code_postale}}</p></p>
                            
                          </div>
                          <div class="col-md-4 flex-t">
                            <p  style="color: black;float: right;">Prix Totale: <p class="m-l--25"  id='txt'>{{commandec.prix_total}} DA</p></p>
                          
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
                        <div class="column-2 p-l-40 p-r-40 p-t-10">{{produit.qte}} x {{produit.prix_produit}} DA
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
              <div class="col-md-12 form-group flex-w p-b-20" v-if="client.address">
                <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                        Address
                </div>
                <div class="size-219">
                  <div class="bg0">
                      <input class="form-control " type="text" :value="client.address" Disabled>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group flex-w p-b-35" v-if="client.code_postale">
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
                  <button v-on:click=" RecuCommande(client.id,client.id_client);"   class="btn-sm btn-success btn-block" style="border: 0; float: right;border-radius: 1em;height: 35px;" ><b>Accepté</b>
                  </button>  
                </div> 
                <div class="col-md-6">
                  <button v-on:click=" RefuserCommande(client.id,client.id_client);"   class="btn-sm btn-danger btn-block" style="border: 0; float: right; border-radius: 1em;height: 35px;" ><b>Refuser</b>
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
           'tarif' => $tarif,
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
    cause: {
      text: '',
    },
    cmdDetails: [],
  
  },
methods: {

  RecuCommande: function(id,idClient){
             axios.put(window.Laravel.url+'/recucommande/'+id+'/'+idClient)
              .then(response => {
                  var position = app.commandeclient.indexOf(this.cmdDetails);
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
                 Swal.fire({
                  title: 'Saisissez la raison du refus',
                  input: 'textarea',
                  inputAttributes: {
                    autocapitalize: 'off'
                  },
                  showCancelButton: true,
                  confirmButtonText: 'Envoyer',
                  cancelButtonText: 'Annuler',
                  cancelButtonColor: '#d33',
                  showLoaderOnConfirm: true,
                  preConfirm: (login) => {// le cas de texterea vide
                     var id = document.getElementsByClassName("swal2-textarea");
                     var value = id[0].value;
                     this.cause.text = value;
                    return axios.post(window.Laravel.url+`/checktextarea`,this.cause)
                      .then(response => {
                      })
                      .catch(error => {
                        Swal.showValidationMessage(
                          `${error.response.data.errors.text[0]}`
                        )
                      })
                  },
                }).then((result) => {
                  if (result.value) {
                    $('.js-modal1').removeClass('show-modal1');
                    axios.put(window.Laravel.url+'/refusercommande/'+id+'/'+idClient+'/'+this.cause.text)
                    .then(response => {
                        var position = app.commandeclient.indexOf(this.cmdDetails);
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
              }
            })
             
          },
          detaillsacommandeVendeur: function(){
            axios.post(window.Laravel.url+'/detaillsacommandevendeur', this.detaillsA)

                .then(response => {
                     this.commandeclient2 = response.data.commande_detaills;//detaill de command
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
  
  pdf: function(idCmd){

      Swal.fire(
          "",
          "Le telechargement de votre commande sera commencé dans quelque seconde",
          "success"
      )
        axios.get(window.Laravel.url+'/dynamic_pdf/pdf/'+idCmd)
         .then(response => {

          })
          .catch(error =>{
            console.log('errors :' , error);
          })
                
    },
  
  AfficheInfo: function($idCmd,$idClient,$cmd){
    $('.js-modal1').addClass('show-modal1');
    app2.hideModel = true;
    app2.detaillsA.idA= $idCmd;
    app2.detaillsA.idClient= $idClient;
    app2.cmdDetails = $cmd;
    app2.detaillsacommandeVendeur();
  },
  get_commande_vendeur: function(){
            axios.get(window.Laravel.url+'/commandeRecuVendeur')

                .then(response => {
                  this.tt = window.Laravel.article.data;

                  var $x=1;
                  var $prx = 0,$k=0;
                  this.tt.forEach(key1 =>{

                        for(i=0; i<window.Laravel.cmd.length  ; i++ ){
                            if(key1.id == window.Laravel.cmd[i].id && key1.client_id == window.Laravel.cmd[i].client_id ){
                               this.commandeclient.push({id: key1.id ,address:window.Laravel.cmd[i].address,date:window.Laravel.cmd[i].date,client_id:window.Laravel.cmd[i].client_id,id_cmd:window.Laravel.cmd[i].nom.toUpperCase()+' '+window.Laravel.cmd[i].prenom.toUpperCase()});
                               $x++;
                                i = window.Laravel.cmd.length;
                            }
                       }
                     });
                  this.commandeclient.forEach(key=>{
                     
                      window.Laravel.prixx.forEach(key1=>{
                        if(key1.id == key.id && key1.client_id == key.client_id){
                          for(i=0; i<window.Laravel.tarif.length  ; i++ ){
                            if(key1.ville == window.Laravel.tarif[i].nom && key1.type_livraison == 'vc' ){
                              $k++;
                               $prx+= (key1.prix_produit * key1.qte)+window.Laravel.tarif[i].prix;
                            }
                            if(key1.ville == window.Laravel.tarif[i].nom && key1.type_livraison != 'vc' ){
                              $k++;
                               $prx+= key1.prix_produit * key1.qte;
                            }
                          }
                          if($k==0){
                            $prx+= (key1.prix_produit * key1.qte)
                          }
                        }
                        
                      })
                     $k=0; 
                     key['prix_total'] = $prx
                     $prx=0;

                    
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