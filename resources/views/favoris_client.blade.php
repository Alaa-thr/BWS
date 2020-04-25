@extends('layouts.template_clinet')
@section('content')

	
	<head>
		<title>{{ ( 'Favoris') }}</title>
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
            <a class="navbar-brand" href="#pablo">Favoris </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
        <div class="content" id="pr">
     <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Favoris</h5>
            </div>
            <div class="card-body">
              <form>
                
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-user">
            
          </div>
        </div>
        
      </div>
  </div>
@endsection