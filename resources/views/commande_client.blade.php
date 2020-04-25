@extends('layouts.template_clinet')
@section('content')

	
	<head>
		<title>{{ ( 'Mes Commandes') }}</title>
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
            <a class="navbar-brand" href="#pablo">Mes Commandes </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>


	<div class="content" id="pr">
     <div class="row"  >
        <div class="col-md-8" >
          <div class="card"  id="xc" style=" width: 1000px;" >
            <div class="card-header">
              <h5 class="titre" >Commande</h5>
            </div>
            <div class="card-body"  >
				<form class="bg0 p-t-75 p-b-85"  id="cx" style="height: 300px;">
					<!--commande 1-->
					<div class="card-head"  id="c">              
					  <div class="row" >
						<div class="col-md-4 pr-1" >
						  <div>
							<input class="increase" type="checkbox" />         
							   <p class="" id="t" > Commande 1</p>
						  </div>
						</div>
						<div class="col-md-4 px-1">
						 
						</div>
						<div class="col-md-4 pl-1">
						  <div class="">
							<a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
							  <i class="fas fa-ellipsis-v"  id="y"></i>
						   </a>
						  <div class="dropdown-menu " x-placement="right-start" style=" margin-right: 11px;">
						<a  href="#" id="vv"  class=" trans-04 p-lr-11 icon-header-noti  js-show-modal1" >Plus de Détails</a><br>
						<a href="#" id="vv">Supprimer</a>
						   </div><p class=""  id="tt" > 09/04/2020 15:39</p>
						  </div>
						</div>
					  </div>
					  <div class="row">
						<div class="col-md-4 pr-1">
						  <div class="">
							<label  id="ttt">Addresse : Mansourah-Tlemcen</label>
						  </div>
						</div>
						<div class="col-md-4 px-1">
						 
						</div>
						<div class="col-md-4 pr-3">
						  <div class="">
							<label  id="tttt">Prix Total : 2290 Da</label>
						  </div>
						</div>
					  </div>      
					</div>
					
		  
					   <!--commande 2-->
					<div class="card-head"  id="c">              
					  <div class="row" >
						<div class="col-md-4 pr-1" >
						  <div>
							<input class="increase" type="checkbox" />         
							   <p class="" id="t" > Commande 1</p>
						  </div>
						</div>
						<div class="col-md-4 px-1">
						 
						</div>
						<div class="col-md-4 pl-1">
						  <div class="">
							<a class="f" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">
							  <i class="fas fa-ellipsis-v"  id="y"></i>
						   </a>
						  <div class="dropdown-menu " x-placement="right-start" style=" margin-right: 11px;">
						<a  href="#" id="vv"  class=" trans-04 p-lr-11 icon-header-noti  js-show-modal1" >Plus de Détails</a><br>
						<a href="#" id="vv">Supprimer</a>
						   </div><p class=""  id="tt" > 09/04/2020 15:39</p>
						  </div>
						</div>
					  </div>
					  <div class="row">
						<div class="col-md-4 pr-1">
						  <div class="">
							<label  id="ttt">Addresse : Mansourah-Tlemcen</label>
						  </div>
						</div>
						<div class="col-md-4 px-1">
						 
						</div>
						<div class="col-md-4 pr-3">
						  <div class="">
							<label  id="tttt">Prix Total : 2290 Da</label>
						  </div>
						</div>
					  </div>      
					</div>
					
					  
				</form>
				  
				
			  
				
            </div>
          </div>
        </div>
	   </div>
      </div>
        
@endsection