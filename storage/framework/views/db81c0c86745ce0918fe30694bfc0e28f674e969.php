


<?php $__env->startSection('content'); ?>

      <head>
          <title><?php echo e(( 'Employeur ')); ?></title>
      </head>
      <div class="main-panel" id="main-panel">
     
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Employeur</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                       <b> Indice</b>
                      </th>
                      <th>
                        <b>Nom_Prenom</b>
                      </th>
                      <th>
                       <b> N°_Telephone</b>
                      </th>
                      <th>
                       <b> Email</b>
                      </th>
                      <th>

                      </th>
                      <th>

                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="employeura in employeuradmin">
                        <td>
                          {{employeura.id}}
                        </td>
                        <td>
                          {{employeura.nom}} {{employeura.prenom}} 
                        </td>
                        <td>
                          {{employeura.num_tel}}
                        </td>
                        <td >
                          {{employeura.email}}
                        </td>
                        <td  class="dropdown " id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsAdmin/img/menu.png" alt="..."/ id="k1">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right" >
                               <a class="dropdown-item js-show-modal1" href="#" id="k2">Details</a>
                               <a class="dropdown-item" href="#" id="k2">Supprimer</a>
                            </div>
                        </td>
                        <td>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                  <div class="pagination" >
                        <a href="#"> &laquo; </a>
                        <a href="#" class="active"> 1 </a>
                        <a href="#"> 2 </a>
                        <a href="#"> 3 </a>
                        <a href="#"> 4 </a>
                        <a href="#"> 5 </a>
                        <a href="#"> &raquo; </a>
                   </div>
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
  </div>
  <!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11 js-modal1 p-t-38 p-b-20 p-l-15 p-r-15 " style="">
      <div class="overlay-modal11 js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="p-b-30 p-l-40">
            <h4 class=" cl2">
              Commande de Tahraoui Alaâ
            </h4>
          </div>
  
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="p-l-50 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
                  <div class="p-t-20 p-b-20 p-l-50">
                    <h4 class="cl13 p-l-70">
                      Vos Produits
                    </h4>
                  </div>
                  <div class="div1">
                    <div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-04.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">DHL / 36.00 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-05.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-01.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-02.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27 ">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-03.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/product-06.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/product-05.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 col-lg-5 p-b-30 m-l-30">
              <div class=" p-t-5 p-lr-0-lg">
                
                <!--  -->
                <div class="p-t-19">
                  <div class="p-b-60  p-l-40">
                    <h4 class="cl13 p-l-50">
                      Vos Informations
                    </h4>
                  </div>
                  <div class="p-b-10">
                    <form>
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Numero Telephone
                        </div>
                        <div class="size-219">
                          <div class=" bg0 ">
                            <input class="form-control" id="nom" type="text" placeholder="0540844782" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Email
                        </div>
                        <div class="size-219 ">
                          <div class=" bg0">
                            <input class="form-control m-r-30" id="nom" type="text" placeholder="thralae@gmail.com" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          Adrrsse
                        </div>
                        <div class="size-219">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" placeholder="Tlemcen-bouhanak" Disabled>
                          </div>
                        </div>
                      </div>
  
                      <div class="form-group flex-w p-b-10">
                        <div class="size-205 cl2 m-r-2" style="font-size: 15px;">
                          code Postale
                        </div>
                        <div class="size-219">
                          <div class="bg0">
                            <input class="form-control m-r-30" id="nom" type="text" placeholder="13600" Disabled>
                          </div>
                        </div>
                      </div>
  
                    </form>
                  </div>
                  <!--  -->
  
                  <div class="flex-w flex-r-m p-b-10">
                    <div>
                      <button class="cl0 size-102 bg10 bor1 trans-04 m-r-5">
                        Supprimer
                      </button>
                    </div>
                  </div>  
                </div>
                
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal1 for laptob-->
    
    <div class="wrap-modal11-sm js-modal1-sm p-t-38 p-b-20 p-l-15 p-r-15 " style="">
      <div class="overlay-modal11-sm js-hide-modal1"></div>
  
      <div class="container">
        <div class="bg0 p-t-45 p-b-100 p-lr-15-lg how-pos3-parent">
          <button class="how-pos3 hov3 trans-04 p-t-6 js-hide-modal1">
            <img src="images/icon-close.png" alt="CLOSE">
          </button>
          <div class="p-b-30 p-l-40">
            <h4 class=" cl2">
              Commande de Tahraoui Alaâ
            </h4>
          </div>
  
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="p-l-50 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
                  <div class="p-t-20 p-b-20 p-l-50">
                    <h4 class="cl13 p-l-70">
                      Vos Produits
                    </h4>
                  </div>
                  <div class="div1">
                    <div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-04.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">DHL / 36.00 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-05.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-01.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-02.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27 ">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/item-cart-03.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/product-06.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                      <div class="table_row flex-t p-b-10">
                        <div class="column-1">
                          <div class="how-itemcart1">
                            <img src="images/product-05.jpg" alt="IMG">
                          </div>
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-27">36.00 DA</div>
                        <div class="column-2 p-l-40 p-t-27">Vendeure / 142.50 DA</div>
                      </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            
       
        </div>
      </div>
    </div>
  </div>
 
 <?php $__env->stopSection(); ?>

  <?php $__env->startPush('javascripts'); ?>


<script src="<?php echo e(asset('assetsClient/js/vue.js')); ?>"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 
<script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                  'employeur' => $employeur,  //vendeur connecté
                'url'      => url('/')  
          ]); ?>;
</script>

<script>
   var app = new Vue({

    el: '#app',
    data:{
        
        employeuradmin:[],           
      },
    methods: {
      employeur_admin: function(){
        axios.get(window.Laravel.url+'/employeur')

            .then(response => {
                 this.employeuradmin = window.Laravel.employeur;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      }
    },
    mounted:function(){
      this.employeur_admin();
    }
  });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\BWS\resources\views/employeur_admin.blade.php ENDPATH**/ ?>