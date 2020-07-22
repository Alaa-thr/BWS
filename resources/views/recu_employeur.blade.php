@extends('layouts.template_admin')

@section('content')
<!--select  class="form-control" onchange="window.location.href=this.value" style="margin-left: 470px; margin-top: -45px; border-radius: 0.8em; width: 230px; height: 40px;">
                      <option value="0" selected disabled>Choisie le type de Categories :</option>
                      <option value="shopCategories">Shop Categories</option>
                      <option value="emploiCategories">Emploi Categories</option>
                    </select-->

  
    <head>
          <title>{{ ( 'Employeur_Recuperer ') }}</title>
      </head>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header flex-t col-md-12">
                <h4 class="card-title col-md-4">Employeur recuperer</h4>
                <div  class="col-md-8 m-t-10">
                    <select class="form-control" onchange="window.location.href=this.value" style="border-radius: 0.8em; cursor: pointer; float: right;height: 40px;width: 250px;">
                      <option value="0" selected="selected" disabled="disabled">Recuperer les utilisateurs   :</option>
                      <option value="recupervendeur">Recuperer vendeurs</option>
                      <option value="recuperclient">Recuperer clients</option>
                      <option value="recupemployeur">Recuperer employeurs</option>
                      <option value="recuperadmin">Recuperer admins</option>
                      <option value="admin">Retour a la page admin</option>
                    </select>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive" style="height: 420px;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th >
                        <b >Indice</b>
                      </th>
                      <th >
                        <div style="margin-left: 40px;">
                          <b>Nom_Prenom</b>
                        </div>
                      </th>
                      <th >
                        <div style="margin-left: 70px;">
                          <b >N°Téléphone</b>
                        </div>
                      </th>
                      <th >
                        <div style="margin-left: 70px;">
                          <b >Email</b>
                        </div>
                      </th>
                      <th>
                      </th>
                      <th>
                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="empl in employeusrecup">
                        <td>
                          <div >
                           @{{ empl.id }}  
                         </div>
                        </td>
                        <td>
                          <div style="margin-left: 40px;">
                            @{{ empl.nom }} @{{ empl.prenom }}
                          </div> 
                        </td>
                        <td>
                          <div style="margin-left: 70px;">
                            @{{ empl.num_tel }} 
                          </div>
                        </td>
                        <td>
                          <div style="margin-left: 70px;">
                           @{{ empl.email }} 
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-block btn-warning" style="margin-left: 110px; width: 120px; border-radius: 0.5em;" v-on:click="recupConfirmerE(empl)">
                            <b> Recuperer </b>
                          </button>
                        </td>
                        <td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                   {{ $employeur_recu->links() }}
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
  
  <!--   Core JS Files   -->
  <!--***************************************************************************************************************
  
  **************************************************************************************************************-->
    <!-- Modal1 for laptob-->
    
  
  <!--*****************************************************************************************************************************************************************************************************************************-->
 
@endsection

@push('javascripts')



<script>
        window.Laravel = {!! json_encode([
               'csrfToken' => csrf_token(),
                'employeur_recu'  => $employeur_recu,  
                'url'      => url('/'),  
          ]) !!};
</script>
<script>
    var app = new Vue({

    el: '#app',
    data:{
        
        employeusrecup:[],           
      },
    methods: {
        recupeEmployeur: function(){
        axios.get(window.Laravel.url+'/recupemployeur')

            .then(response => {
                 this.employeusrecup = window.Laravel.employeur_recu.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },
        recupConfirmerE:function(rec){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De recuperer ce employeur ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: 'green',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, recuperer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/recupconfirmere/'+rec.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.employeusrecup.indexOf(rec);
                             this.employeusrecup.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log('errors : ',error)
                     })
                    Swal.fire(
                      'Recuperé!',
                      'Votre employeur est recuperé',
                      'succès',
                    )
                  }
                })
          
            
        },
    },
    created:function(){
      this.recupeEmployeur();
    }
  });
</script>

@endpush