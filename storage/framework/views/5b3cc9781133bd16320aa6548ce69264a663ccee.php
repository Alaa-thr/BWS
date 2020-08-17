

<?php $__env->startSection('content'); ?>

	
	<head>
		<title><?php echo e(( 'Profile')); ?></title>
	</head>
	
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart" style="z-index: 11000; ">
        <div class="s-full js-hide-cart"></div>
        
        <div class="header-cart flex-col-l p-l-55 p-r-25">
            
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Votre Panier
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart" >
                    <i class="zmdi zmdi-close" style="margin-left: 171%"></i>
                </div>
                
            </div>
            
            <div class="header-cart-content flex-w js-pscroll" id="app1" >
                <ul class="header-cart-wrapitem w-full" >
                    <li class="header-cart-item flex-w flex-t m-b-12" v-for="command in ProduitsPanier" >
                        <div class="header-cart-item-img"  @click="deleteProduitPanier(command)">
                        <img v-for="imgP in imagesproduit" v-if="imgP.produit_id === command.produit_id && imgP.profile === 1" :src="'storage/produits_image/'+ imgP.image" 
                        alt="IMG-PRODUCT"  style="height: 60px;">
                        </div>

                        <div class="header-cart-item-txt p-t-8"  v-for="fv in favoris" v-if="fv.id === command.produit_id" >
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            {{fv.Libellé}}
                            </a>

                            <span class="header-cart-item-info">
                            {{command.qte}} x  {{fv.prix}} DA
                            </span>
                        </div>
                    </li>
                </ul>
                
                <div class="w-full" >
                    
                <div class="header-cart-total w-full p-tb-40" v-for="p in prix">
                        Total: {{p.prixTo}} DA
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="<?php echo e(route('panier')); ?>" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="<?php echo e(route('panier')); ?>" class="flex-c-m stext-101 cl0 size-107 bg10 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    </div>
	 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" >
        <div class="container-fluid"  >
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Profile </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
	<div class="content" id="app" id='pr'>
     <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Editer Profile</h5>
            </div>
           
           
            <div class="card-body">
              <!-- <form style="margin-top: 15px; font-weight: 700;" > -->

                <div class="row">
                  <div class="col-md-4 pl-2">
                    <div class="form-group">
                      <label>Nom</label>
                      <input name="nom" type="text" class="form-control" v-model="profilclient.nom" value="<?php echo e(old('nom')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.nom}">
                      <span class="px-3 cl13" v-if="message.nom" v-text="message.nom[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Prénom</label>
                      <input name="prenom" type="text" class="form-control" v-model="profilclient.prenom" value="<?php echo e(old('prenom')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.prenom}"> 
                      <span class="px-3 cl13" v-if="message.prenom" v-text="message.prenom[0]"></span>
                   </div>
                 </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Numero Telephone</label>
                      <input name="num_telephone" type="text" class="form-control" v-model="profilclient.numeroTelephone" value="<?php echo e(old('numeroTelephone')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.numeroTelephone}">
                      <span class="px-3 cl13" v-if="message.numeroTelephone" v-text="message.numeroTelephone[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 pl-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1" >Adresse Email</label>
                      <input name="adresse_email" type="email" class="form-control" v-model="profilclient.email" value="<?php echo e(old('email')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.email}">
                      <span class="px-3 cl13" v-if="message.email" v-text="message.email[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Code postal</label>
                      <input name="code_postal" type="text" class="form-control" v-model="profilclient.codePostal" value="<?php echo e(old('codePostal')); ?>" v-on:click="modif = true":class="{'is-invalid' : message.codePostal}">
                      <span class="px-3 cl13" v-if="message.codePostal" v-text="message.codePostal[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pl-2">
                    <div class="form-group">
                      <label >Adresse</label>
                      <input type="text" class="form-control" placeholder="Home Address"  v-model="profilclient.addresse" v-on:click="modif = true":class="{'is-invalid' : message.addresse}">
                      <span class="px-3 cl13" v-if="message.addresse" v-text="message.addresse[0]"></span>
                    </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pl-2 size-204 respon6-next">
                    <div class="">
                      <label >Ville</label>
                      <div class=" rs1-select2 bor8 bg0" style="height: 40px;  border-radius: 2em;" v-on:click="modif = true">
                      <select class="js-select2"  :class="{'is-invalid' : message.ville}" onchange="changeVille(this.options[this.selectedIndex].value)">
                        <option :value="profilclient.ville" selected >{{profilclient.ville}}</option>
                        <option v-for='v in villes' v-if='v.nom != profilclient.ville' :value="v.nom">{{v.nom}}</option>
                        
                      </select>
                      <div class="dropDownSelect2"></div>

                      </div>
                      <span class="px-3 cl13" v-if="message.ville" v-text="message.ville[0]"></span>
                    </div>
                  </div>
                  <div class="col-md-4 px-2">
                    <div class="form-group">
                      <label>pays</label>
                      <input type="" class="form-control" placeholder="pays" value="Algerie" disabled="disabled">
                    </div>
                  </div>
                </div>
                  
             
                <div class="row">
                  <div class="col-md-6">
                    <button v-if="modif" value="Modifier" class="btn btn-warning btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" @click='Modifier()'>Modifier</button> 
                  </div>
                  <div class="col-md-6">
                    <button v-if="modif" class=" btn btn-danger btn-block" style="margin-top: 40px;  border: 0;  border-radius: 2em; font-size: 12px; font-weight: 900;" v-on:click="modif = false">Annuler</button>
                  </div>
                </div>
                <hr>
                             
               <div class="row"  @click='modif = false;'>
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label >Mot de passe actuel</label>
                        <input id="act" name="PasswordCurrent" type="password" class="form-control form-control-lg" :class="{'is-invalid' : message.PasswordCurrent}"  v-model="change.PasswordCurrent">

                        <div style="margin-top: -25px">
                          <i class="zmdi zmdi-eye zmdi-hc-2x"  id="show" onclick="myFunction()"></i>
                         <i class="zmdi zmdi-eye-off zmdi-hc-2x" id="hide"  onclick="myFunction()"></i>
                        </div>
                        <span class="px-3 cl13" v-if="message.PasswordCurrent" v-text="message.PasswordCurrent[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row" @click='modif = false;'>
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label >Nouveau mot de passe</label>
                        <input id="nouv" name="NewPassword" type="password" 
                        class="form-control form-control-lg " :class="{'is-invalid' : message.NewPassword}" v-model="change.NewPassword">
                        <div style="margin-top: -25px">
                          <i class="zmdi zmdi-eye zmdi-hc-2x"  id="show1" onclick="myFunction1()"></i>
                          <i class="zmdi zmdi-eye-off zmdi-hc-2x" id="hide1"  onclick="myFunction1()"></i>
                        </div>
                        <span class="px-3 cl13" v-if="message.NewPassword" v-text="message.NewPassword[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="row" @click='modif = false;'>
                  <div class="col-md-6 pl-2">
                    <div class="form-group">
                        <label >Entrez à nouveau le nouveau mot de passe</label>
                        <input id="nouuv" name="ConfirmPassword" type="password" class="form-control form-control-lg" :class="{'is-invalid' : message.ConfirmPassword}" v-model="change.ConfirmPassword">
                        <div style="margin-top: -25px">
                          <i class="zmdi zmdi-eye zmdi-hc-2x"  id="show2" onclick="myFunction2()"></i>
                          <i class="zmdi zmdi-eye-off zmdi-hc-2x" id="hide2"  onclick="myFunction2()"></i>
                        </div>
                        <span class="px-3 cl13" v-if="message.ConfirmPassword" v-text="message.ConfirmPassword[0]"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group" @click='modif = false;'>
                  <div class="col-md-6 col-md-offset-4">
                      <button type="" id="sub" class="btn btn-info" style="border: 0;  border-radius: 2em; font-size: 12px; font-weight: 700;" v-on:click="changePassword();"> Changer mot de pass</button>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4"  @click='modif = false;'>
          <div class="card card-user">
            <div class="image">
              <img src="assetsClient/img/input/bg5.jpg" alt="...">
            </div>
            <div class="card-body m-b-20">
              <div class="author">
                <a href="#">
                       <img class="avatar border-gray" :src="'storage/profil_image/'+profilclient.image" alt="..."> 
                 

                </a>
                 <h5 class="title cl13">{{ profilclient.nom }} {{ profilclient.prenom }}</h5>
              </div>
              <div style=" margin-top: 20px;">
                <div class="row">
                  <div class=" title" style="margin-left: 20px;">Email:</div>
                  <div class="col-md-9 Email" >{{ profilclient.email }}</div>
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class=" title" style="margin-left: 20px;">Numero:</div>
                  <div class="col-md-8 " >{{ profilclient.numeroTelephone }}</div>
                </div>
              </div>
            </div>
            <!--<hr>
            <div class="button-container">
              <a href="https://fr-fr.facebook.com/login/?cuid=AYhDmx48sR6SgDCj4JV3MYV8JfC13sNq3mnhOGhhROZIAsVBzuUFIA6iaDdkoxwds-br6j5a07aST_am1jwjTgH3cytQdv4jQU0a-pvjYtflCb2VGrRQdnEKQoxKcxb-n2zyprqTYUc2LKAg2iEIo14u&next" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://www.instagram.com/" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </div>-->
          </div>
        </div>
        
      </div>
  </div>

 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>
<script>
  
function myFunction() {
  var x = document.getElementById("act");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show").style.display = "none";
    document.getElementById("hide").style.display = "block";

  } else {
    x.type = "password";
    document.getElementById("show").style.marginTop = "-35px";
    document.getElementById("show").style.display = "block";
    document.getElementById("hide").style.display = "none";

  }
}
function myFunction1() {
  var x = document.getElementById("nouv");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show1").style.display = "none";
    document.getElementById("hide1").style.display = "block";

  
  } 
  else {
    x.type = "password";
    document.getElementById("show1").style.marginTop = "-35px";
    document.getElementById("show1").style.display = "block";
    document.getElementById("hide1").style.display = "none";

  }
}
function myFunction2() {
  var x = document.getElementById("nouuv");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("show2").style.display = "none";
    document.getElementById("hide2").style.display = "block";

  
  } else {
    x.type = "password";
    document.getElementById("show2").style.marginTop = "-35px";
    document.getElementById("show2").style.display = "block";
    document.getElementById("hide2").style.display = "none";

  }
}
</script>


<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
               'client'=>$client,  //client connecté
               'ImageP'         => $ImageP,
               'Fav'         => $Fav,
               'command'         => $command,
               'prixTotale'   => $prixTotale,
               'ville'    => $ville,
               'url'       => url('/')  
          ]); ?>;
</script>

<script>
  var x = window.Laravel.client.ville;
    function changeVille(value){
   
    x=value;
  }
   var app = new Vue({

    el: '#app',
    data:{
        msg: "hello",
        profilclient:[],
        modif: false,
        change: {
          PasswordCurrent: null,
          NewPassword: null,
          ConfirmPassword: null,

        },
        message: {},
        villes: [],
                   
    },
    methods: {
      annuler(){
            this.modif = false;
        },
        Modifier(){
          this.profilclient.ville = x;
            axios.post(window.Laravel.url+'/updateProfilC',this.profilclient)
              .then(response => {
                this.message={};
                window.location.reload();
              })
              .catch(error => {
              
                this.message = error.response.data.errors;
                console.log('error :' , this.message);             })
        },
      changePassword: function(){
          	axios.post(window.Laravel.url+'/changepassword',this.change)
              .then(response => {
                this.message={};
                window.location.reload();

              
               })
              .catch(error => {
              
                this.message = error.response.data.errors;
                console.log('error :' , this.message);             })
          },
      profil_clinet: function(){
        axios.get(window.Laravel.url+'/profilClient')

            .then(response => {
                this.profilclient = window.Laravel.client;
                app1.imagesproduit = window.Laravel.ImageP;
                app1.ProduitsPanier = window.Laravel.command;
                app1.favoris = window.Laravel.Fav;
                app1.prix = window.Laravel.prixTotale;
                this.villes = window.Laravel.ville;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      }
      
    },
    mounted:function(){
      this.profil_clinet();
    }
  });
       var app1 = new Vue({
        el: '#app1',
        data:{
          ProduitsPanier: [],
          favoris: [],
          imagesproduit: [],
          prix:[],
        },
        methods:{
          deleteProduitPanier: function(produit){
           
                  axios.delete(window.Laravel.url+'/deleteproduitpanier/'+produit.produit_id+'/'+produit.qte+'/'+produit.taille+'/'+produit.type_livraison+'/'+produit.couleur_id)
                    .then(response => {
                      if(response.data.etat){
                               var position = this.ProduitsPanier.indexOf(produit);
                               this.ProduitsPanier.splice(position,1);
                               if(this.ProduitsPanier.lenght == 0){
                                  this.prix[0].prixTo = 0;
                               }
                               else{
                                  this.prix[0].prixTo -= produit.prix_produit*produit.qte;
                               }

                      }                     
                    })
                    .catch(error =>{
                               console.log('errors :' , error);
                    })

              
          },
      },

     })

</script>


<?php $__env->stopPush(); ?>








<?php echo $__env->make('layouts.template_clinet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/profil_clinet.blade.php ENDPATH**/ ?>