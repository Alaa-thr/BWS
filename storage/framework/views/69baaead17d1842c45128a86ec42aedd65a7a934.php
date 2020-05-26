

<?php $__env->startSection('content'); ?>

    <head>
          <title><?php echo e(( 'Article ')); ?></title>
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
                        <input type="checkbox" id="article" @change="selectAll()" v-model="allSelected">
                        <label for="article"></label>
                        <h4 style="margin-top: -6px;">Articles</h4>
                    </div>

                <div class="txt-right"style="margin-top: -40px; " >
                      <button v-if="suppr" class="btn-sm btn-danger " style="height: 35px; " v-on:click="deleteArrayArticle()"><b>Supprimer</b>
                      </button>
                      
                      <button v-else  class="btn-sm btn-info js-show-modal1" style="height: 35px;" v-on:click="AfficherAjout()" ><b>Ajouter article</b>
                      
                      </button>
                      <button v-on:click="AnnulerSel()" v-if="suppr" class="btn-sm btn-warning " style="height: 35px; " ><b>Annuler</b>
                      </button>
                   </div>
             
                
                <hr>       
              
               <div class="row m-b-10" v-for="articlea in articlesadmin" >
                  <div v-if="selectall">
                    <input type="checkbox" :id="articlea.id" :value="articlea.id" v-model="checkedArticles" @change="changeButton(articlea)">
                    <label :for="articlea.id" style="margin-top: 40px; margin-left: 10px;"></label>
                  </div>
                  <div v-else>
                    <input type="checkbox" :id="articlea.id" :value="articlea.id" v-model="articleIds" @click="deselectArticle(articlea.id)">
                    <label :for="articlea.id" style="margin-top: 40px; margin-left: 10px;"></label>
                  </div>
                    <div class="col-md-3 " style="padding-right: 20px; " >
                      <img  :src="'storage/articles_image/'+ articlea.image" style="height: 130px;width: 800px; margin-bottom: 20px">
                    </div>
                    
                    <div class="col-md-8" >
                      <h5 class="title" style="margin-top: -8px; margin-left: 20px; color: red;" >{{ articlea.titre }}</h5><br>
                        <div class="description" style="margin-top: -10px; font-size: 17px; margin-left: 20px;">
                          {{ MoitieDescription(articlea.description,100, '...') }}

                         
                          <div class="txt-right m-t-20">
                           <a class="js-show-modal1 " style=" color: black; font-style: italic; font-weight: 500; cursor: pointer;" v-on:click="AfficheInfo(articlea.id)"><b> Afficher Plus </b>
                           </a>
                           </div>
                        </div>
                         
                    </div>
                    <table>
                     <tr>                        
                        <td class="dropdown" >
                          <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                           <img src="assetsAdmin/img/menu.png" /> 
                          </a>
                          <div class="dropdown-menu dropdown-menu-right ">   
                           <a class="dropdown-item js-show-modal1" style="color: red; font-style: italic; font-weight: 900; cursor: pointer;" v-on:click="updateArticle(articlea)">Modifier</a>
                           <a class="dropdown-item" v-on:click="deleteArticle(articlea)"style="color: red; font-style: italic; font-weight: 900; cursor: pointer;">Supprimer</a>
                          </div>
                        </td>
                     </tr>
                   </table> 
                </div>
                 <div> 
                       <?php echo e($article->links()); ?><!-- pour afficher la pagination -->
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
            </script>, Designer par <a href="https://www.invisionapp.com" target="_blank">BS</a>. Codé par <a href="https://www.creative-tim.com" target="_blank">BASMAHW&S</a>.
          </div>
        </div>
      </footer>
    </div>
   <!-- Modal1 for laptob-->
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2" v-if="hideModel">
      <div class="overlay-modal11 " v-on:click="CancelArticle(art)"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 985px;"   v-for="articlea in articlesadmin2">
          <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="hideModel = false">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="row">
            <div class="col-md-6">
              <div class="p-b-30 p-l-40" style="margin-left: 80px;" >
                <h3 class=" cl2" >
                   Informations sur l'image
                </h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10" >
              <img :src="'storage/articles_image/'+ articlea.image" style="width: 1500px; height: 450px; margin-left: 80px; " />
            </div> 
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="title" style="color: red; margin-top: 30px; margin-left: 90px;" >
                  <h4><b>{{  articlea.titre }}</b></h4><br>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
               <p>{{ articlea.description }}</p>
            </div>               
          </div>  
        </div>

<!--********************************************************************************************************************************************************************-->
        
        <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout" style=" width: 985px; padding-top: 45%">
          <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="CancelArticle(art)">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <section class=" creat-article " >     
              <div  class=" container-creat-article">
                <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group mb-3">
                      <label>Titre</label>
                      <input  type="text" class="form-control" placeholder="Le titre doit commencer avec un Maj ou un nombre" v-model="art.titre" :class="{'is-invalid' : message.titre}" >
                      <span class="px-3 cl13" v-if="message.titre" v-text="message.titre[0]">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group">
                      <label>description</label>
                      <textarea class="form-control" placeholder="La description doit commencer avec un Maj ou un nombre" v-model="art.description" :class="{'is-invalid' : message.description}"></textarea>
                      <span class="px-3 cl13" v-if="message.description" v-text="message.description[0]">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row" >
                  <div class="col-md-10 pr-2" >
                    <div class="form-group">
                      <label for="image" >image</label>
                      <input type="file" class="form-control"  v-on:change="imagePreview" :class="{'is-invalid' : message.image}">
                      <span class="px-3 cl13" v-if="message.image" v-text="message.image[0]"></span>
                    </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-10 flex-t">
                        <button type="submit" v-if="modifier" class="btn btn-success btn-block " style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="updateArticleButton()" >Modifier
                        </button> 
                        <button type="submit" v-else class="btn btn-success btn-block " style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addArticle()" >Ajouter
                        </button> 
                        <button type="submit"  class="btn btn-danger btn-block " style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="CancelArticle(art)" >Anuller
                        </button> 
                        
                            
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
               "article"   => $article,//attribut di n retourniwah m la fnct "article_admin" f controller fih kml les article di kaynin f la tabel articles w ykono mretbin 3la 7sab la date de creation
               "idAdmin" => $idAdmin,//attribut di n retourniwah m la fnct "article_admin" f controller fih id ta3 admin => na7tajouh bach ki njiw n'ajoutiw ou nsupprimiw ou nmodifyiw (n ajoutiw article just pour had admin)(n supprimiw just article ta3 had admin)(nmodifyiw just article ta3 had admin)
               "url"      => url("/")  
          ]); ?>;
</script>

<script>


   Vue.mixin({// fonction global dans vuejs

        methods:{
          addArticle: function(){//ki nersaw 3la button "ajouter" di f  formulait tetéxucita had method pour ajouter un article 3meltha global psq fiha na7taj des attributs m les 2 vue "app" et "app2" w manjemtch na3mlha f "app2" psq f vue js manenejmouch n3ayto l un attributs maji f ta7t la vue di rek takhdem fiha (la méme choose pour le contraire) 
            app2.art.image = app2.image;// b7ato image di dakhalnaha f input f tableau "art" bach nzaftouh la fnct "addArticle" f contoller
            axios.post(window.Laravel.url+"/addarticle",app2.art)

            .then(response => {
              if(response.data.etat){
                 app2.art = response.data.articleAjout;//n7ato l article jdid di criyinah f 'art'
                 app2.art.id = response.data.articleAjout.id;//stoké id de article di criyinah
                 window.location.reload();//pour actualiser la page
                 app.articlesadmin.unshift(app2.art);//n ajoutiw l'aricle jdid f debut ta3  tableau "articlesadmin"(di y affichilna les article f la page "Article")(bach fawek ma najoutiw article yet2aficha f lwl)
                 console.log("app.articlesadmin",app.articlesadmin)
                 app2.art={//vider tableau "art"
                      id: 0,
                      admin_id: window.Laravel.idAdmin,
                      titre: '', 
                      description: '',
                      image: ''
                 };
                 app2.hideModel=false;//n7aiw l model (bach ki yersa 3la ajouter yetna7a hadak model di ra fih formulaire)
                 app2.openAjout = false;
                 app2.message = {};//vider tableau "message" pour vider les erreurs
                 app2.image = '';
              }          
            })
            .catch(error =>{
                app2.message = error.response.data.errors;
                console.log('errors :' , app2.message);
            })
      },         
    }                     
  });
  var app2 = new Vue({// j'ai ajouter ce 2eme Vue psq swalah di n2afichiwhom f Modal1 may2adouch ychoufo "id = app"
      el: '#app2',
      data:{
        articlesadmin2: [],//tableau di n'affichiw bih detaills ta3 un article (ykoun fih l'article di rena habin n'affichiw detaills te3o)      
        openInfo: false,//bach nbeyno detaills ta3 article f modal ki tkoun = true, sinon maybanch
        openAjout: false,//bach nbeyno formulaire d'ajout
        hideModel: false,//bach nkhabiw l modal
        art: {// bach n7ato fih l'article di nzaftohom l controller (pour les modification et l'ajout) et nestokiw fihom les resultats di yzafethomlna les methods di f controller
          id: 0,
          admin_id: window.Laravel.idAdmin,
          titre: '', 
          description: '',
          image: ''
        },
        oldArt: {// bach n7ato fih les info la9dam ta3 un article (le cas ta3 ki manmodifyiwch image ou titre ou description) f la method "updateArticleButton"
          titre: '', 
          description: '',
          image: ''
        },
        detaillsA: {// bach ndiro fih l id ta3 article di rena habin njibo les detaills te3o bah n2afichiwhom
          idA: 0,
        },
        message: {},//pour les erreurs de validation (c a d lokan ydakhelna un titre di mayrespictich les condition tawa3n tkharejlo erreur di nestokiwha f had tableau)
        modifier: false,//bach na7iw w n'affichiw button "modifie"
        image: '',//bach n7ato fiha les donnes ta3 l'image di dakhalnaha f input

        
                   
      },
    methods: {
       updateArticleButton: function(){//ki nersaw 3la button "modifie" di f formulaire
         if(this.art.titre == ''){//le cas di manmodifyiwch le titre

            this.art.titre =  this.oldArt.titre;//nhato f tableau "art" le titre la9dim w di rena 7atinah f "oldArt.titre"
         }
         if(this.art.description == ''){//le cas di manmodifyiwch la description

            this.art.description =  this.oldArt.description;//nhato f tableau "art" la description la9dima w di rena 7atinah f "oldArt.description"
         }
         this.art.image = this.image;// this.image has value that i uploed it for modifications
         if(this.art.image == ''){//if art.image is null that mean that the client didn't change the image for modifications
            this.art.image = this.oldArt.image;//nhato f tableau "art" l'image la9dima w di rena 7atinah f "oldArt.image"
         }         
         axios.put(window.Laravel.url+"/updatearticle",this.art)//n3ayto la fcnt "updateArticleButton" di ra f controller w na3tiwha un parametre tablreau "art" di fih les info di dakhelhom f modification

            .then(response => {
              if(response.data.etat){//apres l'execution de methode "updateArticleButton" di f controller ida khadmet nichan ra machya tredena attrubit asmo "etat" w ykoun true (c a d la modification n3amlt trés bien)
                 this.art = response.data.articleAjout;// "response.data.articleAjout" l'article di tbedel => tredhouna la method "updateArticleButton" di f controller w n7atouh f tableau "art" 
                 app.articlesadmin.forEach(key => { // boucle foreach tetmecha 3la tableau "articlesadmin" di y  affichilna les articles f la page "Article"                    
                  if(key.id == this.art.id){//ida l id d'article courent == a id ta3 article di modifyinah => n7ato l'image ta3 article modifie f article courent (hna f vuejs lokan mana3amlouch had if may2afichilnach l'image ta3 article lokan nmodifyiwha 7ata na3amlo refresh l la page => psq key.image ykoun fiha event.target.result)
                        key.image = this.art.image;
                  }
                })
                 this.hideModel = false;//bach n affichiw Model
                 this.art={//initialiser le tableau
                      id: 0,
                      admin_id: window.Laravel.idAdmin,
                      titre: '', 
                      description: '',
                      image: ''
                 };

              } 
              this.modifier = false;//bach na7iw button "modifie" m formulaire psq bach lokan 3awed mouraha n7alo formulaire ta3 l'ajout matet2affichach "modifier"
              this.message = {};//vider tableau "message" m les erreur ida kano kaynin lors de la modification (c a d des erreurs f input) 
              this.image = '';//vider image
              this.oldArt = {
                    titre: '', 
                    description: '',
                    image: ''
              };     
            })
            .catch(error =>{
                this.message = error.response.data.errors;
                console.log('errors :' , this.message);
            })

      },
      detaillsArticle: function(){//ki nersaw 3la "Continue la lecture" => n3ayto la fcnt "AfficheInfo" di hiya t3ayet l had la fnct bach nrecupiriw les info ta3 article f BDD

        axios.post(window.Laravel.url+'/detaillsarticle', this.detaillsA)//n3ayto la fcnt "detaillsArticle" di ra f controller w na3tiwha un parametre di fih l id ta3 article di rena habin n'affichiw les info te3ao

            .then(response => {

                 this.articlesadmin2 = response.data;//n7ato l article di tzafethoulna la method "detaillsArticle" di f controller f tableau "articlesadmin2" pour l'afficher
                 
            })
            .catch(error =>{
                 console.log('errors :' , error);// le cas d'erreur
            })
      },
      imagePreview(event) {//ki ndakhlo une image f formulaire
           var fileR = new FileReader();//l'objet FileReader yjibelna le contenu de fichiers ou donnees ki nselictionniw una fichier f input
           fileR.readAsDataURL(event.target.files[0]);//Cette méthode démarre la lecture du contenu pour le blob "event.target.files[0]". Une fois que la lecture est terminée, l'attribut result contient une URL de données qui représente les données du fichier (c a d ya2ralna les donnee ta3 image di dakhalnaha), "event.target.files[0]" fiha l'image di dakhalnaha
           fileR.onload = (event) => {
              
              this.image = event.target.result;//n7ato had les info ta3 image attribut 'image'
           }
           
      },
      CancelArticle(article){//ki nersaw 3la annuler di f formulaire ou 'X' di foug fourmeulaire tbela3elna Modal 1
        this.modifier = false ;
        this.hideModel = false;
        this.art = {        //initialiser le tableau "art" di fih les info ta3 un article di khtarinah pour modifie
                      id: 0,
                      admin_id: window.Laravel.idAdmin,
                      titre: '', 
                      description: '',
                      image: ''
        };
        this.message = {};//vider le tableau "message" di fih les erreur di yet'affichaw (le cas ta3 ki tji t moifie wela t ajouti article w yetla3lk erreur f input w t3awed ta3ml annuler => ki t3awed tedkhol l hadak l formulaire les message erreur mayab9awch ghi baynin)
        article.titre = this.oldArt.titre;//n7ato le titre de "article" f tableau "oldArt" (le cas di nbedi nmodifier un article 3awed nersa cancel (b vuejs ki tji tmodifie méme lokan tkoun 3ada marsitch 3la modifie => titre di f la page article yetbedel) alors bach mayeb2anach mbedel w yweli titre la2dim)
        article.description = this.oldArt.description;// méme choose pour la description       
      },

    },    
});

   var app = new Vue({

    el: '#app',
   
    
    data:{
      articlesadmin: [],//tableau di n7ato fih les article di ram 3adna f tla table article
      suppr: false, //pour afficher les 2 button "supprimer" et "annuler"
      checkedArticles: [],//tableau di n7ato fih les articles di selectioninahom ba7adhom (khati checkbox di foug)
      artilcesDelete: [],//tableau di n7ato fih les article di rena 7abin nsupprimiwhom
      allSelected: false,//pour hadik checkbox di godam "Article" l foug (bach na7iw sellection menha ou na3amlouh)
      articleIds: [],//tableau pour selictionné tout les articles ki nersaw 3la checkbox di l foug
      selectall: true,//bach nbedlo les <input type="checkbox"> ta3 chaque article ou ki nersaw 3la checkbox di l foug 

      },
    methods: {
      
       deleteArrayArticle:function(){//pour supprimer plusieur article en méme temp (tet'executa ki nersa 3la button supprimer di tet'afficha f blaset button "ajouter article")
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
            text: "De supprimer cette Atricle?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, Supprimer!'
          }).then((result) => {
              if (result.value) {
                this.artilcesDelete.forEach(key => {// "artilcesDelete" tableau di fih les articles di khasni nsupprimihom, "forEach" une loop foreach, "key" howa l'indice di yetmecha f tableau "artilcesDelete" (c a d key khatra ykoun egale a artilcesDelete[0], artilcesDelete[1], ...)
                  axios.delete(window.Laravel.url+'/deletearticle/'+key.id)
                    .then(response => {
                      if(response.data.etat){
                                            
                                var position = this.articlesadmin.indexOf(key);
                                this.articlesadmin.splice(position,1);      
                      }                    
                    })
                    .catch(error =>{
                               console.log('errors :' , error);
                    })
                })
                    this.allSelected = false;//bach hadik checkbox di godam "Article" l foug tetna7a menha selection ki nkemel la supprition 
                    this.checkedArticles.length = [];//men mour la supprition ida kona mselectionin les articles bla manersaw 3la checkbox di foug => nkhawiw tableau "checkedArticles" di kano fih les articles di mselictionnyin
                    this.suppr=false;//bach nredo button "ajouter article" w na7iw les 2 button "supprimer" et "annuler"
                    this.artilcesDelete = [];//vider la liste des articles qui ont supprimer
                    this.selectall = true;//bach nredo les checkbox ta3 kol article
              Swal.fire(
                'Effacé!',
                'Votre article a été supprimé.',
                'success'
              )
            }
            
            })
       },
     
      deleteArticle: function(article){//ki tesra 3la supprimer di f 3 point
            Swal.fire({//pour alert de confirmation
        title: 'Etes vous?',
        text: "De supprimer cette Atricle?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, Supprimer!'
      }).then((result) => {
          if (result.value) {//ki tconfirmi bedi rek hab tsupprimer, sino ida 3mlt "cancel" mayedkholch l had l if
              axios.delete(window.Laravel.url+'/deletearticle/'+article.id)
                .then(response => {
                  if(response.data.etat){//apres l'execution de methode "deleteArticle" di f controller ida khadmet nichan ra machya tredena attrubit asmo "etat" w ykoun true (c a d la supprission n3amlt trés bien)
                           var position = this.articlesadmin.indexOf(article);//give the position of the article that i want to delete it on table articlesadmin
                           this.articlesadmin.splice(position,1);// delete from table the article who have $position and delete only one element after this $position
                           //les 3 instruction hadou pour le cas di ki nselictionni un article w nersa 3la 3 point w nsupprimer
                           this.checkedArticles.length = [];//nkhawiw tableau psq ra dija fih  article di rsina 3la checkbox te3o
                           this.suppr=false;// nredo button "ajouter article" w na7iw les 2 button "supprimer" et "annuler" psq ki rsina 3la checkbox ta3 article ybano "supprimer" et "annuler"
                           this.artilcesDelete = [];//vider la liste des articles qui ont supprimer
                           this.selectall = true;//bach nredo les checkbox ta3 kol article
                  }                     
                })
                .catch(error =>{//ida kan kyn un erreur f l'execution ta3 mathode "deleteArticle" yedkhol hna w y afficher erreur f console
                           console.log('errors :' , error);
                })
          Swal.fire(//apres la confirmation de la supprition 
            'Effacé!',
            'Votre article a été supprimé.',
            'success'
          )
        }
        
        })
      },
      updateArticle: function(article){//ki nersaw 3la "modifier" di ra f 3point     
         app2.hideModel = true;
         app2.openAjout = true;
         app2.openInfo = false;
         app2.modifier = true; //pour afficher button "modifier" ta7t formulaire di yetla3ena
         app2.art = article;// bach n7ato f table "art" l'article di rena 7abin nmodifyiwah "article"
         app2.oldArt.titre = article.titre;//n7ato le titre de "article" f tableau "oldArt"
         app2.oldArt.description = article.description;//n7ato le description de "article" f tableau "oldArt"
         app2.oldArt.image = article.image;//n7ato le image de "article" f tableau "oldArt"
         
       },      
      AfficherAjout: function(){//ki nersa 3la button "ahouter article"
         app2.hideModel = true;//n'affichiw le Modal 1
         app2.openAjout = true;//n'affichiw le formulaire
         app2.openInfo = false;//c a d ida kan les info ta3 article baynin => yetkhaba bach yet'afficha ghi le formulaire d'ajout
         app2.modifier = false;
         app2.art ={
                      id: 0,
                      admin_id: window.Laravel.idAdmin,
                      titre: '', 
                      description: '',
                      image: ''
         }
      },
      AfficheInfo: function($id){//ki nersaw 3la "Continue la lecture" w 3andha un parametre di howa id ta3 article di rena habin n affichiw les info te3o
        app2.hideModel = true; //n'affichiw le Modal 1
        app2.openInfo = true;// nbeyno div l blanc di fih les info ta3 l'article
        app2.detaillsA.idA= $id;//n7ato f tableau "detaillsA" l id ta3 article di rena habin nbeyno les info ta3o
        app2.detaillsArticle();//n3ayto la fcnt "detaillsArticle"
      },
      article_admin: function(){//pour l'affichage de touts les articles di ram f la table articles
                axios.get(window.Laravel.url+'/articlesAdmin')

                    .then(response => {//ida la fcnt "article_admin" di f controller "AdminController" khadmet nichan w madaret ta erreur 
                         this.articlesadmin = window.Laravel.article.data;//n7ato les articles di jebnahom m method "article_admin" w n7atohom f tableau "articlesadmin"                      
                    })
                    .catch(error =>{//ida la fcnt "article_admin" di f controller "AdminController" makhadmetch nichan w daret erreur 
                         console.log('errors :' , error);//y affichilna hadik l'erreur f console(F12)
                    })
      },
      changeButton: function(a){//ki nselectioniw un checkbox de chaque article tetéxucita (khati checkbow di godam article) (zednaha 3la le cas di nsélictioniw 1 ou 2 ou 3 ... ta3 les articles, ida habit tssuprimer kml les articles ya takhdem b hadi ta ta3ml checkbox di godem "Article" la diff binathom hiya => checkbox di godem "Article" yetsilictionaw kml derba wahda w lokhra khas tfout 3lihom wa7da b wa7da)
        this.artilcesDelete.unshift(a);//bach n ajoutiw les articles di selictioninahow f tableau "artilcesDelete" bach nsuprimiwhom
        if(this.checkedArticles.length > 0){//nchofo ida ra kayen des articles selictioninahom (khati checkbox di godem "Article") f tableau "checkedArticles" ou nn 
          this.suppr=true;//afficher les 2 button "supprimer" et "annuler" f blaset button "ajouter article"
        }
        else{//sinon c a d makanch ta checkbox ra mselictionya (le cas di nkoun 3mlna selection awed na7inaha)
          this.artilcesDelete = [];//nkhawiw tableau "artilcesDelete" di kona 3amerna fih les articles bach nsuprimiwhom
          this.suppr=false;//bach nredo button "ajouter article" w na7iw les 2 button "supprimer" et "annuler"
        }        
      }, 
      AnnulerSel: function(){//ki nersaw 3la button Annuler
        this.checkedArticles.length = [];//kml les articles di kona mselictioniwhm (bla manersaw 3la chechbox di godam article) na7iwlhom hadak selectionnement w nkhawiw tableau "checkedArticles"
        this.changeButton();//appelle fct changeButton bach nredo l button "ajouter article" (yedkhol l else psq "this.checkedArticles.length = 0" welat = 0 bhadi "this.checkedArticles.length = [];")
        this.selectall = true;//bach nredo les <input type="checkbox"> ta3 chaque article (bach ki nsélictioniwhom w nersaw 3la 3 point => supprimer takhdem la supprition ou bien 3la button "supprilmer" di tban f blaset "ajouter article")
        this.allSelected = false;//bach hadik checkbox di godam "Article" l foug tetna7a menha selection
      },
      MoitieDescription:  function (text, length, suffix){//bach n2affichiw ghi nes ta3 l ketba f la page article
          // si la taille de text est <= a l'argument Length, return the text koma di kan 
          if(text.length <= length){
            return text;

          }
          // sinon khali f text des caractére 3la 7sab "lenght" w zid f tali les '...' in the end
          return text.substring(0, length) + suffix;

      },
      selectAll: function() {//bach nsélictioniw kml les articles derba wahda
            this.selectall = false;//bach naffichiw les <input type="checkbox"> di ki nersaw 3la checkbox di ra godam le nom "Article" l foug (c a d ta3 di nselectioniw kml les article)
            if (this.allSelected) {//ida checkbox di ra godam le nom "Article" l foug  siléctionninaha ou nn (ida ra mselictionnya => "allSelected = true" sinon " = false")
                for (user in this.articlesadmin) {
                    this.articleIds.push(this.articlesadmin[user].id);//tout les articles di 3adna => select checkbox ta3hom
                    this.artilcesDelete.push(this.articlesadmin[user]);//ajouter tous les articles di selictioninahom f tableau "artilcesDelete" pour les supprimer f debut ta3 tableau "artilcesDelete"
                }
                this.suppr=true;// pour afficher les 2 button "supprimer" et "annuler" f blaset button "ajouter article"
             }
             else{// ki na7iw selects di dernahom ta3 kml les articles
              this.articleIds = [];//vider les articles di selictioninahom m tableau "articleIds"
              this.artilcesDelete= [];//ki na7iw select ta3 kml les checkbox khasna nkhawiw tableau di 7atina fih les article bach nsupprimiwhom
              this.suppr=false;//bach nredo button "ajouter article" w na7iw les 2 button "supprimer" et "annuler"
              this.selectall = true;//bach naffichiw les <input type="checkbox"> ta3 kol article (c a d checkbox di nersaw 3liha ki nhabo nsupprumiw un artile)
              this.checkedArticles = [];//bach ki nkouno dija selectionnina les articles kol wahed bahdo awed 3mlna selectAll awed na7iw hadik selectAll => hadouk les checkbox di 3mlnahom f lwl yakhwaw(ya3ni select yemchi menhom)
            }
             
        },
        deselectArticle: function(article){//ki na3amlo sellectAll awed na7iw 1 ou 2 ou ... article m hadouk les aricle di selectionnay kml(c a d bach mansuprimich kml)(had le cas ta3 ki ykono bzzf ta3 les article khasna na7iwhom w kyn ha 2 ou 3 makhasnich na7ihom => na3ml sellect all w na7i les articles di makhasnich na7ihom), 3andha ana parametre di howa l id ta3 article di machi rena habin nsupprimiwah
             this.artilcesDelete.forEach(key => {//boucle foreach tetmecha 3la tableau "artilcesDelete", key c les article di kyn f tableau 
                  if(key.id == article){// ida kan key.id == article c a d id ta3 article di ra f tableau "artilcesDelete" = a id di zafetnah f paremetre yedkhol ysupprimer had l article m tablea "artilcesDelete"
                      var position = this.artilcesDelete.indexOf(key);
                      this.artilcesDelete.splice(position,1);                    
                  } 
            });             
        }
    },  
    created:function(){
      this.article_admin();
    }
  });

  
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/articles_admin.blade.php ENDPATH**/ ?>