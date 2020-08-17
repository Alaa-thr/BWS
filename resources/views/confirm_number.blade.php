@extends('layouts.app')
@section('content')
<title>Basmah.ws</title>
<div class="container" style="margin-top:10%;" id='app39'>
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="alert alert-success" role="alert" v-show='showAlert'>
              Nous avons envoyé un code.
            </div>
            <div class="card">
                <div class="card-header">Confirmation de Numéro Téléphone</div>

                <div class="card-body">
                    <form method="POST" action='\number_confirm' >
                      @csrf


                        <div class="form-group row" >
                            <label for="number_confirm" class="col-md-4 col-form-label text-md-right">Entrer le code</label>

                            <div class="col-md-6">
                                <input id="number_confirm" type="text" class="form-control @error('number_confirm') is-invalid @enderror m-b-10" name="number_confirm" value="{{ $number_confirm ?? old('number_confirm') }}" required autocomplete="number_confirm" autofocus>

                                @error('number_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <a href="#" @click ='sendSms'>Envoyer le code une autre fois</a>
                            </div>
                            
                        </div>

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirmer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var app39 = new Vue({
         el : "#app39",
         data:{
            showAlert: false,
         },
         methods:{
            sendSms: function(){
                this.showAlert = false; 
                axios.get(window.Laravel.url+"/sendsms")
                .then(response => {
                    if(response.data)
                    this.showAlert = true; 
                })
                .catch(error =>{
                    console.log("errors",error)
                })
            },
            
       }
    })

   </script> 

@endsection
