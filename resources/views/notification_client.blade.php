@extends('layouts.template_clinet')
@section('content')

	
	<head>
		<title>{{ ( 'Notification') }}</title>
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
            <a class="navbar-brand" href="#pablo">Notification </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>

	<div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Style de Notification</h4>
              </div>
              <div class="card-body">
                <div class="alert alert-info">
                  <span>Simple Notification</span>
                </div>
                <div class="alert alert-info">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span>Notification avec bouton de fermeture.</span>
                </div>
                <div class="alert alert-info alert-with-icon" data-notify="container">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                  <span data-notify="message">Notification avec bouton de fermeture et icone.</span>
                </div>
                <div class="alert alert-info alert-with-icon" data-notify="container">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                  <span data-notify="message">Ceci une notification avec bouton et icône de fermeture et comportant de nombreuses lignes. Vous pouvez voir que l'icône et le bouton de fermeture sont toujours alignés verticalement. Ceci est une belle notification. Vous n'avez donc pas à vous soucier du style.</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Statistiques de Notification</h4>
              </div>
              <div class="card-body">
                <div class="alert alert-primary">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span><b> Primaire - </b> Ceci une notification régulière effectuée avec ".alert-primary"</span>
                </div>
                <div class="alert alert-info">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span><b> Info - </b> Ceci est une notification régulière faite avec ".alert-info"</span>
                </div>
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span><b> Success - </b> Ceci est une notification régulière faite avec ".alert-success"</span>
                </div>
                <div class="alert alert-warning">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span><b> Avertissement - </b> Il s'agit d'une notification régulière effectuée avec ".alert-warning"</span>
                </div>
                <div class="alert alert-danger">
                  <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </button>
                  <span><b> Danger - </b> Ceci est une notification régulière faite avec ".alert-danger"</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection