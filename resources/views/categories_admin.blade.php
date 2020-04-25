@extends('layouts.template_admin_categories')

@section('content')

    <head>
          <title>{{ ( 'Categorie ') }}</title>
    </head>
  
    <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Voiture</h4>
                <hr> 
                <table width="100%">
                  <form>
                  <tr>
                    <td>                      
                      <input type="checkbox" name="voiture1" value="4x4" id="voiture1">
                      <label for="voiture1" id="i1">4x4</label>
                        <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div> 
            
                    </td>
                    <td>
                      <input type="checkbox" name="voiture2" value="BMW" id="voiture2">
                      <label for="voiture2" id="i1">BMW</label>
                          <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="voiture3" value="Renault" id="voiture3">
                      <label for="voiture3" id="i1">Renault</label>
                       <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="voiture4" value="Audi" id="voiture4">
                      <label for="voiture4" id="i1">Citroin</label>
                      <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                  </tr>
                  <tr >
                    <td>                      
                      <input type="checkbox" name="voiture5" value="Ferari" id="voiture5" >
                      <label for="voiture5" id="i1">Ferari</label>
                      <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i9">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="voiture6" value="Bugatti" id="voiture6" >
                      <label for="voiture6" id="i1">Bugatti</label>
                      <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i9">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="voiture7" value="Mercedes" id="voiture7" >
                      <label for="voiture7" id="i1" >Mercedes</label>
                      <a class=" dropdown-menu-center" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i9">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="voiture8" value="Peugeaut" id="voiture8" >
                      <label for="voiture8" id="i1">Peugeaut</label>
                      <a class=" dropdown-menu-center" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i9">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                  </tr>
                </form>
                </table>
              
              </div>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" >Make up</h4>
                <hr>
                <table width="100%">
                  <form>
                  <tr>
                    <td>                      
                      <input type="checkbox" name="makeup1" value="4x4" id="makeup1">
                      <label for="makeup1" id="i1">lipstick</label>
                        <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div> 
            
                    </td>
                    <td>
                      <input type="checkbox" name="makeup2" value="BMW" id="makeup2">
                      <label for="makeup2" id="i1">eyeshadow</label>
                          <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="makeup3" value="Renault" id="makeup3">
                      <label for="makeup3" id="i1"></label>
                       <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                    <td>
                      <input type="checkbox" name="makeup4" value="Audi" id="makeup4">
                      <label for="makeup4" id="i1"></label>
                      <a class=" dropdown" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="   true" aria-expanded="false">
                            <img  src="assetsAdmin/img/menu.png" alt="..."/ id="i">
                        </a>
                       <div class="dropdown-menu dropdown-menu" id="k3" aria-labelledby="navbarDropdownMenuLink" >
                       <div class="account-item clearfix js-item-menu" >  
                          
                           <a class="dropdown-item" ><b>Modifier</b></a>
                           <a class="dropdown-item" ><b>Supprimer</b></a>
                       </div>
                       </div>
                    </td>
                  </tr>
                  
                </form>
                </table>
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
  @endsection