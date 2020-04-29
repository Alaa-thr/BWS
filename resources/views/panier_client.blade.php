@extends('layouts.template_clinet')
@section('content')

  
  <head>
    <title>{{ ( 'Panier') }}</title>
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
            <a class="navbar-brand" href="#pablo">Panier </a>
          </div>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" id="pr">
     <div class="row" >
        <div class="col-md-12" >
          <div class="card" >
            <div class="card-header">
              <h5 class="title">Panier </h5>
            </div>
            <form class="bg0 p-t-15 p-b-55" >
       
                  <table class="table-shopping-cart" >
                    <tr class="table_head">
                      <th class="column-1">Produit</th>
                      <th class="column-2"></th>
                      <th class="column-3">Prix</th>
                      <th class="column-4">Quantité</th>
                      <th class="column-5">Supprimer</th>
                    </tr>
    
                    <tr class="table_row">
                      <td class="column-1">
                        <div class="how-itemcart1">
                          <img src="{{ asset('assetsClient/img/Produit/thumb_image7.jpg') }}" alt="IMG">
                        </div>
                      </td>
                      <td class="column-2">Montre</td>
                      <td class="column-3">$ 27</td>
                      <td class="column-4">
                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                          <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-minus"></i>
                          </div>
    
                          <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">
    
                          <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                          </div>
                        </div>
                      </td>
                      <td class="column-5"><input id="in" type="image" src="{{ asset('assetsClient/img/input/close.png') }}"></td>
                    </tr>
                    <tr class="table_row">
                      <td class="column-1">
                        <div class="how-itemcart1">
                          <img src="{{ asset('assetsClient/img/Produit/thumb_image12.jpg') }}" alt="IMG">
                        </div>
                      </td>
                      <td class="column-2">Chaise</td>
                      <td class="column-3">$ 75</td>
                      <td class="column-4">
                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                          <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-minus"></i>
                          </div>
    
                          <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="1">
    
                          <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                          </div>
                        </div>
                      </td>
                      <td class="column-5"><input id="in" type="image" src="{{ asset('assetsClient/img/input/close.png') }}"></td>
                    </tr>
                  <tr > <td  class="column-4"> </td>
                           <td  class="column-2"> Total : </td>
                      <td   class="column-3"style="color: brown;" colspan="4">$ 102  </td>
                  </tr>
                   </table>
    
               
            
      </form>
            
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-user">
            
          </div>
        </div>
        
      </div>
  </div>
@endsection