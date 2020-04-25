@extends('layouts.template_vendeur')

@section('content')

	<head>
		<title>{{ ( 'Commande Traiter') }}</title>
	</head>
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Commandes Traiter </a>
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
                <h4 class="card-title"> Commande reçus</h4>
              </div>  
              <div class="card-body">
                <div class="table-responsive">
                 
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

@endsection