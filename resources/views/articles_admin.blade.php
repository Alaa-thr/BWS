@extends('layouts.template_admin')

@section('content')

    <head>
          <title>{{ ( 'Article ') }}</title>
      </head>
  
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm" >
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" >
                <h4 class="card-title">Articles</h4>
                <div style="margin-top: -50px; margin-left: 850px; " >
                  <button  class="btn-sm btn-info js-show-modal1" style="height: 35px;" v-on:click="AfficherAjout()" ><b>Ajouter article</b></button>
                </div>
                
                <hr>       
              
               <div class="row m-b-10" v-for="articlea in articlesadmin" >
                    <input type="checkbox" :id="articlea.id" >
                    <label :for="articlea.id" style="margin-top: 40px; margin-left: 10px;"></label>
                    <div class="col-md-3 " style="padding-right: 20px; " >
                      <img  :src="'storage/articles_image/'+ articlea.image" style="height: 130px;width: 800px; margin-bottom: 20px">
                    </div>
                    
                    <div class="col-md-8" >
                      <h5 class="title" style="margin-top: -8px; margin-left: 20px; color: red;" >@{{ articlea.titre }}</h5><br>
                        <div class="description" style="margin-top: -10px; font-size: 17px; margin-left: 20px;">
                          @{{ MoitieDescription(articlea.description,100, '...') }}

                         
                          <div class="txt-right m-t-20">
                           <a class="js-show-modal1 " style=" color: black; font-style: italic; font-weight: 500; " v-on:click="AfficheInfo(articlea.id)"><b> Continue la lecture </b>
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
                           <a class="dropdown-item js-show-modal1"  style="color: red; font-style: italic; font-weight: 900; " v-on:click="openInfo=true">Modifier</a>
                           <a class="dropdown-item" href="#" style="color: red; font-style: italic; font-weight: 900;">Supprimer</a>
                          </div>
                        </td>
                     </tr>
                   </table> 
                </div>
                 <div class="" v-if="nextPage"> 
                       <button @click="getNext(nextPage)">
                         show next
                       </button>
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
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15"  id="app2" v-if="cc">
      <div class="overlay-modal11 " v-on:click="cc = false"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent" v-if="openInfo " style=" width: 1000px;"   v-for="articlea in articlesadmin2">
          <button class="how-pos3 hov3 trans-04 p-t-6 " v-on:click="cc = false">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="p-b-30 p-l-40" style="margin-left: 80px;" >
            <h3 class=" cl2" >
               Informations sur l'image
            </h3>
          </div>
            <div class="col-md-10" >
                <img :src="'storage/articles_image/'+ articlea.image" style="width: 1000px; margin-left: 80px; " />
            </div> 
              <div class="title" style="color: red; margin-top: 30px; margin-left: 90px;" >
                <h4><b>@{{  articlea.titre }}</b></h4>
              </div>
            <div class="col-md-10" >
              <div class="description" style="margin-left: 80px; color: black; margin-top: 10px; font-size: 17px;">
                @{{ articlea.description }}
                </div>               
            </div>
        </div>

<!--********************************************************************************************************************************************************************-->
        
        <div class="bg0 p-b-150 p-lr-15-lg how-pos3-parent" v-if="openAjout" style=" width: 1000px; padding-top: 45%">
          <button class="how-pos3 hov3 trans-04 p-t-6" v-on:click="cc = false">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <section class=" creat-article " >     
              <div  class=" container-creat-article">
                <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group mb-3">
                      <label>Titre</label>
                      <input  type="text" class="form-control" placeholder="Titre" v-model="art.titre" :class="{'is-invalid' : message.titre}">
                      <span class="px-3 cl13" v-if="message.titre" v-text="message.titre[0]">
                      </span>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-2" >
                    <div class="form-group">
                      <label>description</label>
                      <textarea class="form-control" placeholder="Description" v-model="art.description" :class="{'is-invalid' : message.description}"></textarea>
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
                        <button type="submit"  class="btn btn-danger btn-block " style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="CancelArticle()" >Anuller
                        </button> 
                        <button type="submit"  class="btn btn-success btn-block " style="margin-top:40px;  border: 0;  border-radius: 1em; font-size: 12px;  font-weight: 700;" v-on:click="addArticle()" >Ajouter
                        </button>     
                  </div>
                </div>

              </div>
            
          </section>
              
        </div>
      </div>
    </div>



      
    
   
    
    

  @endsection




@push("javascripts")



 
<script>
        window.Laravel = {!! json_encode([
               "csrfToken"  => csrf_token(),
               "article"   => $article,
               "idArticle" => $idArticle,
               "url"      => url("/")  
          ]) !!};
</script>

<script>


   Vue.mixin({

      data: function(){
        return{
           text: '',
        }
        
      },
        methods:{
          addArticle: function(){
        axios.post(window.Laravel.url+"/addarticle",app2.art)

            .then(response => {
              if(response.data.etat){
                 app2.art = response.data.articleAjout;
                 app2.cc=false;
                 app.articlesadmin.unshift(app2.art);
                 app2.art={
                      id: 0,
                      admin_id: window.Laravel.idArticle,
                      titre: '', 
                      description: '',
                      image: ''
                 };
                 app2.message = {};

              }          
            })
            .catch(error =>{
                app2.message = error.response.data.errors;
                console.log('errors :' , app2.message);
            })
      }
        }
           
          
    });
  var app2 = new Vue({
      el: '#app2',
      data:{
        articlesadmin2: [],
        openInfo: false,
        openAjout: false,
        cc: false,
        art: {
          id: 0,
          admin_id: window.Laravel.idArticle,
          titre: '', 
          description: '',
          image: ''
        },
        detaillsA: {
          idA: 0,
        },
        message: {},

        
                   
      },
    methods: {
      detaillsArticle: function(){
        axios.post(window.Laravel.url+'/detaillsarticle', this.detaillsA)

            .then(response => {

                 this.articlesadmin2 = response.data;
                 
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      imagePreview(event) {
           var fileR = new FileReader();
           fileR.readAsDataURL(event.target.files[0]);
           fileR.onload = (event) => {
              this.art.image = event.target.result;
         
           }
           
      },
      CancelArticle(){
        this.cc = false;
        this.art = {};
        this.message = {};
      }
    },    
});

   var app = new Vue({

    el: '#app',
   
    
    data:{
      articlesadmin: [],
      nextPage: null,

      },
    methods: {
      
      
      AfficherAjout: function(){
         app2.cc = true;
         app2.openAjout = true;
         app2.openInfo = false;
      },
      AfficheInfo: function($id){
        app2.cc = true;
        app2.openAjout = false;
        app2.openInfo = true;
        app2.detaillsA.idA= $id;
        app2.detaillsArticle();
      },
      article_admin: function(){
                axios.get(window.Laravel.url+'/articlesAdmin')

                    .then(response => {
                         this.articlesadmin = window.Laravel.article;
                         this.nextPage = window.Laravel.article.next_page_url;
                           console.log('ccccc',window.Laravel.article);                       
                    })
                    .catch(error =>{
                         console.log('errors :' , error);
                    })
      },
      getNext: function(urll) {
              axios.get(urll)

                    .then(response => {
                          console.log('bbbbb',urll); 
                         this.articlesadmin = window.Laravel.article.data;
                         this.nextPage = window.Laravel.article.next_page_url;
                         console.log('aaaaa',window.Laravel.article);                       
                    })
                    .catch(error =>{
                         console.log('errors :' , error);
                    })
      },
      getImageArticle: function(){
        
          return "storage/articles_image/"+ this.articlesadmin[0].image;
          
      },
      MoitieDescription:  function (text, length, suffix){
          // si la taille de text est <= a l'argument Length, return the text as he is 
          if(text.length <= length){
            return text;

          }
          // else leave in the text Length caractere and but the '...' in the end
          return text.substring(0, length) + suffix;

      } 
    },
     mounted:function(){
      this.article_admin();


    }
  });

  
</script>

@endpush