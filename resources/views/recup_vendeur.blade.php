@extends('layouts.template_admin')

@section('content')
  
    <head>
          <title>{{ ( 'Vendeur_Recuperer ') }}</title>
      </head>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Vendeur recuperer</h4>
                <div  style="margin-left: 730px; margin-top: -40px;">
                    <select class="form-control" onchange="window.location.href=this.value" style="border-radius: 0.8em; cursor: pointer;">
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
                <div class="table-responsive" style="height: 420px; margin-top: 75px;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th >
                        <div >
                          <b>Indice</b>
                        </div>
                      </th>
                      <th >
                        <div style="margin-left: 30px;">
                          <b>Nom_Prenom</b>
                        </div>
                      </th>
                      <th >
                        <div style="margin-left: 60px;">
                          <b >N°Téléphone</b>
                        </div>
                      </th>
                      <th>
                        <div style="margin-left: 70px;">
                         <b>Email</b>
                       </div>
                      </th>
                      <th>
                      </th>
                      <th>
                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="vend in vendeursrecup">
                        <td >
                          <div >
                            @{{vend.id}}  
                          </div>
                        </td>
                        <td >
                          <div style="margin-left: 30px;">
                            @{{vend.Nom}} @{{vend.Prenom}} 
                          </div>
                        </td>
                        <td>
                          <div style="margin-left: 60px;">
                            @{{vend.numTelephone}} 
                          </div>
                        </td>
                        <td >
                          <div style="margin-left: 70px;">
                        	  @{{vend.email}}
                          </div> 
                        </td>
                        <td>
                          <button class="btn btn-sm btn-block btn-warning" style="margin-left: 140px; width: 120px; border-radius: 0.5em;" v-on:click="recupConfirmer(vend)">
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
                   {{ $vendeur_recu->links() }}
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
                'vendeur_recu'  => $vendeur_recu,  
                'url'      => url('/')  
          ]) !!};
</script>
<script>
    var app = new Vue({

    el: '#app',
    data:{
        
        vendeursrecup:[],           
      },
    methods: {
        recupeVendeur: function(){
        axios.get(window.Laravel.url+'/recupervendeur')

            .then(response => {
                 this.vendeursrecup = window.Laravel.vendeur_recu.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      recupConfirmer:function(rec){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De recuperer ce vendeur ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: 'green',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, recuperer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/recupconfirmer/'+rec.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.vendeursrecup.indexOf(rec);
                             this.vendeursrecup.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log('errors : ',error)
                     })
                    Swal.fire(
                      'Recuperé!',
                      'Votre vendeur est recuperé',
                      'succès',
                    )
                  }
                })
          
            
        },
    },
    created:function(){
      this.recupeVendeur();
    }
  });
</script>

@endpush