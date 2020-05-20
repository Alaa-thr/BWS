@extends('layouts.template_admin')

@section('content')
  
    <head>
          <title>{{ ( 'Admin_Recuperer ') }}</title>
      </head>
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="app">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Admin recuperer</h4>
                <div class="box " style="margin-left: 730px; margin-top: -40px;">
                    <select onchange="window.location.href=this.value">
                      <option>Recuperer les utilisateurs   :</option>
                      <option value="recupervendeur">Recuperer vendeurs</option>
                      <option value="recuperclient">Recuperer clients</option>
                      <option value="recupemployeur">Recuperer employeurs</option>
                      <option value="recuperadmin">Recuperer admins</option>
                      <option value="admin">Retour a la page admin</option>
                    </select>
                </div>
              </div>
              
              <div class="card-body">
                <div class="table-responsive" style="height: 420px; margin-top: 55px;">
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
                      <tr v-for="ad in adminsrecup">
                        <td>
                         @{{ad.id}}  
                        </td>
                        <td>
                          <div style="margin-left: 40px;">
                            @{{ad.nom}} @{{ad.prenom}} 
                          </div>
                        </td>
                        <td>
                          <div style="margin-left: 70px;">
                            @{{ad.numTelephone}} 
                          </div>
                        </td>
                        <td>
                          <div style="margin-left: 70px;">
                        	 @{{ad.email}} 
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-block btn-warning" style="margin-left: 70px; width: 120px; border-radius: 0.5em;" v-on:click="recupConfirmerA(ad)">
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
                   {{ $admin_recu->links() }}
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
                'admin_recu'  => $admin_recu,  
                'url'      => url('/')  
          ]) !!};
</script>
<script>
    var app = new Vue({

    el: '#app',
    data:{
        
        adminsrecup:[],           
      },
    methods: {
        recupeAdmin: function(){
        axios.get(window.Laravel.url+'/recuperadmin')

            .then(response => {
                 this.adminsrecup = window.Laravel.admin_recu.data;
            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
      },
      recupConfirmerA:function(rec){

                Swal.fire({
                  title: 'Etes vous sure ?',
                  text: "De recuperer ce admin ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: 'green',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Oui, recuperer!'
                }).then((result) => {
                  if (result.value) {
                    axios.get(window.Laravel.url+'/recupconfirmera/'+rec.id) 
                     .then(response =>{
                         if(response.data.etat){   
                             var position = this.adminsrecup.indexOf(rec);
                             this.adminsrecup.splice(position,1);   
                         }
                         
                      })
                     .catch(error => {
                        console.log('errors : ',error)
                     })
                    Swal.fire(
                      'Recuperé!',
                      'Votre admin est recuperé',
                      'succès',
                    )
                  }
                })
          
            
        },
    },
    created:function(){
      this.recupeAdmin();
    }
  });
</script>

@endpush