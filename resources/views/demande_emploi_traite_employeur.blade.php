@extends('layouts.template_employeur')

@section('content')

	<head>
		<title>{{ ( 'Demande Traiter') }}</title>
	</head>
	 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle ">
              <button type="button" class="navbar-toggler ">
                <span class="navbar-toggler-bar bar1 "></span>
                <span class="navbar-toggler-bar bar2 "></span>
                <span class="navbar-toggler-bar bar3 "></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Demande Traiter </a>
          </div>
        </div>
      </nav>
        <div class="panel-header panel-header-sm">
      </div> 

       <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> demandes traités</h4>
               </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" width="100%">
                    <tbody>
                      <tr>
                        <td width="3%">
                    <input class="increase" type="checkbox" /> </td> 
                           <td  class="text-left" >demande traité de hadjer</td>
                          <td style="color:forestgreen"><b>accepté</b></td>
                        <td  class="dropdown "  id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsEmployeur/img/menu.png" alt="..."/ id="f">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right "  >
                                <a class="dropdown-item" href="#" id="f1">Voir plus</a>
                                <a class="dropdown-item" href="#" id="f1">Supprimer</a>
                            </div>
                        </td>
                      </tr>
                        <tr>
                        <td width="3%">
                    <input class="increase" type="checkbox" /> </td> 
                           <td  class="text-left" >demande traité de...</td>
                          <td style="color:red"><b>refusé</b></td>
                        <td  class="dropdown "  id="k">
                          <a  data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
                                <img src="assetsEmployeur/img/menu.png" alt="..."/ id="f">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right "  >
                                <a class="dropdown-item" href="#" id="f1">Voir plus</a>
                                <a class="dropdown-item" href="#" id="f1">Supprimer</a>
                            </div>
                        </td>
                      </tr>
                      </tbody></table>
                    <div class="pagination" >
                        <a href="#"> &laquo; </a>
                        <a href="#" class="active" id="f3"> 1 </a>
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


@endsection