@extends('layouts.app')

@section('content')

    <head>
        <title>{{ ( 'Cree Compte') }}</title>
    </head>
 <!--*******************************************************************************************************-->
 <div class="container">
     <section class="creat-count " >
        <div  class=" container " style="padding: 8%;">
            <div class="m-b-50 ">
                <span class="mtext-111 cl13">Créer Compte</span>
                <br>
                <p class="m-t-4" style="font-size: smaller">C'est simple et rapide.</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30" id="nom" name="nom" type="text" placeholder="Nom" >
                    <input class="form-control form-control-lg" id="prenom" type="text" name="prenom"placeholder="Prenom" >
                 </div>
                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30  @error('numTelephone') is-invalid @enderror" name="numTelephone" value="{{ old('numTelephone') }}" id="numtlf" type="text" placeholder="Numero Telephone" >

                    @error('numTelephone')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" name="email" type="email" placeholder="@email" >

                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group m-b-35">
                    <input class="form-control form-control-lg m-r-30 @error('password') is-invalid @enderror" id="mtps" type="password" placeholder="mot de passe" name="password" >
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            
                </div>
                <div class="form-group flex-t m-b-35">
                    <select class="form-control form-control-lg m-r-30" id="exampleFormControlSelect1" name="ville">
                      <option selected>Choisir une ville</option>
                      <option name="13">Tlemcen</option>
                      <option value="16">Alger</option>
                      <option value="31">Oran</option>
                      <option value="22">Sidi Bel Abbes</option>
                      <option value="5">Batna</option>
                    </select>
                    <select class="form-control form-control-lg" id="exampleFormControlSelect1"  name="compte">
                        <option selected>Connecté tant que</option>
                        <option>Client</option>
                        <option>Vendeur</option>
                        <option>Employeur</option>
                    </select>
                </div>
                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30 " id="nom_btq" type="text" placeholder="Nom de Boutique" name="Nom_boutique">
                    <input class="form-control form-control-lg " id="nom_btq"  name="Num_Compte_Banquaire" type="text" placeholder="Numero Compte Bancaire" > 
                </div>
                <div class="form-group m-b-35">
                    <input class="form-control form-control-lg" id="addrsse_btq" name ="addrsse_botique" type="text" placeholder="Addresse de Boutique">                      
                </div>
                <div class="form-group flex-t m-b-35">
                    <input class="form-control form-control-lg m-r-30 " id="nom_btq" name="nom_societe" type="text" placeholder="Nom de Société">
                    <input class="form-control form-control-lg " id="nom_btq" name="num_compte_banquiare" type="text" placeholder="Numero Compte Bancaire" >                   
                </div>
                <div class="form-group m-b-65">
                    <input class="form-control form-control-lg" id="addrsse_soct" name="addrsse_soct" type="text" placeholder="Addresse de Société" >                       
                </div>
                <div class="form-group row mb-0">
                    <button type="submit" class="btn-lg btn-block" style="background-color:#ca2323;color:white">Connexion</button>
                </div>
                
            </form>
        </div>
    </section>
</div>
    <!--*******************************************************************************************************-->
@endsection
