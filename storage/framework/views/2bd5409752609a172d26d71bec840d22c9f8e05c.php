


<?php $__env->startSection('content'); ?>

      <head>
          <title><?php echo e(( 'Email ')); ?></title>
      </head>
      <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div style=" display: flex; margin-left: 17px; ">
                  <input type="checkbox" id="e" @change="selectAll()" v-model="allSelected" style="">
                  <label for="e"></label>
                  <h4 class="card-title" style="margin-top: -8px;">Emails</h4>
                </div>
                <button v-if="suppr" class="btn btn-sm btn-danger  btn-block" style="margin-left: 700px; margin-top: -50px;  border-radius: 0.8em; width: 130px; height: 35px; "  v-on:click="deleteArrayEmail()"><b>supprimer</b>
                </button>
                <button v-if="suppr" class="btn btn-sm btn-warning btn-block" style="margin-left: 850px; margin-top: -45px;  border-radius: 0.8em; width: 130px; height: 35px; " v-on:click="AnnulerSel" ><b>Annuler</b>
                </button>
                <div >
                  <hr style="margin-top: -8px;">
                </div>
              </div>
              <div class="card-body" v-for="ema in emails">
                <div class="row" >
                  <div v-if="selectall" class="col-md-1" style="margin-left: -10px; ">
                    <input type="checkbox"  :id="ema.id" :value="ema.id" v-model="checkedEmail" @change="changeButton(ema)">
                    <label :for="ema.id" style="margin-left: 30px;"></label>
                  </div>
                  <div v-else class="col-md-1" style="margin-left: -10px; ">
                    <input type="checkbox"  :id="ema.id" :value="ema.id" v-model="emailIds" @change="deselectEmail(ema.id)">
                    <label :for="ema.id" style="margin-left: 30px;"></label>
                  </div>
                  <div class="col-md-1">
                    <i class="now-ui-icons ui-1_send" style="font-size: 25px; color: gray; margin-left: 20px;"></i>
                  </div>
                  <a v-if="rep && ema.reponse === 0" href="#" class="col-md-7 js-show-modal1" style="cursor: pointer; ">
                    <div><p style=" color: black; margin-top: -1px; margin-left: -25px;" v-on:click="AfficherInfo(ema.id)">Message a la part de  <b>{{ ema.adresse_email }}</b></p>
                    </div>
                  </a>
                  <a v-else href="#" class="col-md-7 js-show-modal1" style="cursor: pointer; ">
                    <div><p style=" color: black; margin-top: -1px; margin-left: -25px;" v-on:click="AfficherInfo(ema.id)">Message a la part de  <b>{{ ema.adresse_email }}</b></p><br><p style="margin-top: -20px; color: green; margin-left: -22px;"></p>
                    </div>
                  </a>
                  <div class="col-md-2 js-show-modal1">
                      <!--li  v-if="rep && ema.reponse === 0" class="label11" data-label11="Pas encors répondu"-->
                      <div v-if="rep && ema.reponse === 1" >
                        <img :data-toggle="!!ema.admin_nom ? 'tooltip' : false"  data-html="true" :title="'Ce message a été répondu par Ladmin : '+ema.admin_nom.toUpperCase()+' ' +ema.admin_prenom.toUpperCase()+''" src="assetsAdmin/img/image.jpeg"  style="width: 25px; margin-left: 70px;cursor: pointer;"/>
                      </div>
                      <div v-else>
                        <img data-toggle="tooltip" data-html="true" title="Ce message pas encore répondu" src="assetsAdmin/img/image (1).jpeg"  style="width: 25px; margin-left: 70px; cursor: pointer;"/>
                      </div>
                  </div>
                  <div class="col-md-1">
                    <a ><i class="now-ui-icons ui-1_simple-remove" style="font-size: 25px; cursor: pointer; color: red; margin-left: 20px;" v-on:click="deleteEmail(ema)"></i></a>
                  </div>
               </div>
               <div>
                <hr style="margin-bottom: 5px;">
             </div>
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

    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " id="app2" v-if="hideModel">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container" >
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent"  style="width: 900px; margin-left: 40px; height: 650px;" v-for="emaa in emails2">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1"  >
            <img src="images/icon-close.png" alt="CLOSE" v-on:click="CancelVend()">
          </button>
          <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin-left: 120px; width: 650px; margin-top: 20px;  height: 520px;">
            <h4 class="mtext-105 cl2 txt-center p-b-30 color-t" style="margin-top: -20px;">
              Email reçu
            </h4>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" v-model="emaa.adresse_email" value="<?php echo e(old('adresse_email')); ?>" disabled="disabled" style="font-size: 16px;">
              <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
            </div>

            <div class="bor8 m-b-30" >
              <textarea class="stext-111 cl2 size-120  p-tb-25" name="msg" disabled="disabled" style="font-size: 16px; ">
                {{ emaa.message }}
              </textarea>
            </div> 
              <a href="https://www.gmail.com" target=_blank>       
                <button v-if="rep2 && emaa.reponse === 0 " class=" flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer " v-on:click="repond(emaa.id)" style="width: 250px;  background-color: #ca2323; height: 40px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">                     
                  Repondre
                </button>
                <button v-else class=" flex-c-m stext-101 cl0 size-121 bg3 bor1  p-lr-15 trans-04  "  style="width: 250px;  background-color: #aaa; height: 40px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); cursor: auto;" disabled> 
                  était déja Répondu
                </button>                     
              </a>
              <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer " style="margin-top: 10px; margin-left: 270px; margin-top: -40px; width: 240px; background-color: #13c940; height: 40px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);" v-on:click="hideModel = false">
              Annuler
              </button>
        </div>
  
          
        </div>
      </div>
    </div>

  
  
  <?php $__env->stopSection(); ?>

<?php $__env->startPush('javascripts'); ?>

<script> 
        window.Laravel = <?php echo json_encode([

               'csrfToken' => csrf_token(),
               'em'     => $em,
               'url'       => url('/'), 
          ]); ?>;
</script>
<script>
  var app2 = new Vue({
     el: '#app2',
     data:{
        emails2: [],
        hideModel: false,
        rep2: true,
          detailsEM:{
          idEM: 0,
         },
     },
     methods: {
           details_email: function(){
             axios.post(window.Laravel.url+'/detailsemail',this.detailsEM)

            .then(response => {
                 this.emails2 = response.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      CancelVend: function(){
        this.hideModel = false;
      },
      repond:function(id){
        axios.put(window.Laravel.url+'/emailrependu/'+id)

            .then(response => {

                 this.hideModel = false;
                 app.rep = false;
                 window.location.reload();
                 
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
        emails: [],
        selectall: true,
        rep:true,
        allSelected: false,
        suppr: false,
        emailIds: [],
        checkedEmail: [],
        emailsDelete: [],
      },
      methods:{
        getEmail: function(){
        axios.get(window.Laravel.url+'/emails')

            .then(response => {
                 this.emails = window.Laravel.em;
                 console.log("window.Laravel.em",window.Laravel.em);
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },
        selectAll:function(){
            this.selectall = false;
            if (this.allSelected) {
                for (user in this.emails) {
                    this.emailIds.push(this.emails[user].id);
                    this.emailsDelete.push(this.emails[user]);
                }
                this.suppr=true;
             }
             else{
              this.emailIds = [];
              this.emailsDelete= [];
              this.suppr=false;
              this.selectall = true;
              this.checkedEmail = [];
            }
        },
        deleteArrayEmail:function(){
            if(this.emailsDelete.length == 0){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Il ya aucun message a supprimer!',

              }).then((result) => {
                this.allSelected = false;
                this.suppr=false;
                this.selectall = true;
               
             })
              
            }
            else if(this.emailsDelete.length == 1){
                Swal.fire({
                  title: 'Etes vous sure de supprimer ce message?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.emailsDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deleteemail/'+key.id)
                          .then(response => {
                            if(response.data.etat){            
                                      var position = this.emails.indexOf(key);
                                      this.emails.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelected = false;
                          this.checkedEmail.length = [];
                          this.suppr=false;
                          this.emailsDelete = [];
                          this.selectall = true;

                    Swal.fire(
                      'Effacé!',
                      'Votre Message a été supprimé.',
                      'success'
                    )
                  }
                  
                  })

            }
            else{
                Swal.fire({
                  title: 'Etes vous de supprimer ces messages?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      this.emailsDelete.forEach(key => {
                        axios.delete(window.Laravel.url+'/deleteemail/'+key.id)
                          .then(response => {
                            if(response.data.etat){            
                                      var position = this.emails.indexOf(key);
                                      this.emails.splice(position,1);      
                            }                    
                          })
                          .catch(error =>{
                                     console.log('errors :' , error);
                          })
                      })
                      
                          this.allSelected = false;
                          this.checkedEmail.length = [];
                          this.suppr=false;
                          this.emailsDelete = [];
                          this.selectall = true;

                    Swal.fire(
                      'Effacé!',
                      'Vos messages ont étés supprimées.',
                      'success'
                    )
                  }
                  
                  })

            }
            
      },
      AnnulerSel: function(){
            this.emailIds.length = [];
            this.checkedEmail.length = [];
            this.changeButton(null);
            this.selectall = true;
            this.allSelected = false;
      },
        deselectEmail: function(emailId){
             this.emailsDelete.forEach(key => {
                  if(key.id == emailId){
                      var position = this.emailsDelete.indexOf(key);
                      this.emailsDelete.splice(position,1);                    
                  } 
            });

        },
        deleteEmail:function(e){
         
                Swal.fire({
                  title: 'Etes vous sure de supprimer ce message ?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, supprimer!'
                }).then((result) => {

                  if (result.value) {
                    axios.delete(window.Laravel.url+'/deleteemail/'+e.id) 
                     .then(response =>{
                         if(response.data.etat){
                             var position = this.emails.indexOf(e);
                             this.emails.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log(error)
                     })
                    Swal.fire(
                      'Effacé!',
                      'Votre message a été supprimé.',
                      'success'
                    )
                  }

                })
          
            
      },
        changeButton: function(e){
              if(this.checkedEmail.length > 0){
                this.suppr=true;
                this.emailsDelete.unshift(e);
              }
              else{
                this.emailsDelete = [];
                this.suppr=false;
                
              } 
              if(this.checkedEmail.length < this.emailsDelete.length){
                this.emailsDelete = this.emailsDelete.filter(function(item) { return item != e; });
              } 

              

       },
        AfficherInfo: function($id){
          app2.hideModel=true;
          app2.detailsEM.idEM= $id;
          app2.details_email();
        },
      },
      created:function(){
        this.getEmail();
      },
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/emails_admin.blade.php ENDPATH**/ ?>