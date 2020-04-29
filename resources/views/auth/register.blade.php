@extends('layouts.app')
<style>


#regForm {
  background-color: #ffffff;
  font-family: Raleway;
}


/* Hide all steps by default: */
.tab {
  display: none;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
@push('javascript')
<script>
     window.Laravel={!! json_encode([
      'csrftoken'   =>csrf_token(),
      'url'    =>url('/')
      ])!!}
</script>

<script >
     var app = new Vue({

    el: '#app',
    data:{
      villes : [],             

 /*event.target.value  pour recuperé */      
    },methods:{
        getVille() {
            axios.get(window.Laravel.url+"/getville")
            .then(response => {
                this.villes = response.data;
                 console.log("ssucces",response);
            })
            .catch(error =>{
                console.log("errors",error)
            })
        }

    },
    mounted:function(){
        this.getVille();
    }
    
  });

</script>
@endpush

@section('content')

    <head>
        <title>{{ ( 'Cree Compte') }}</title>
    </head>
 <!--*******************************************************************************************************-->
 <div class="container" id="app">
     <section class="creat-count " >
        <div  class=" container " style="padding: 8%;">
            <div class="m-b-50 ">
                <span class="mtext-111 cl13">Créer Compte</span>
                <br>
                <p class="m-t-4" style="font-size: smaller">C'est simple et rapide.</p>
            </div>
           
               
               

        <form id="regForm" method="POST" action="{{ route('register') }}">
                @csrf

            
  <div class="tab" >
    <div class="form-group flex-t m-b-35">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg  @error('nom') is-invalid @enderror" id="nom" name="nom" type="text" placeholder="Nom*" >

                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg @error('prenom') is-invalid @enderror" id="prenom" type="text" name="prenom"placeholder="Prenom*" >
                        

                        @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
    </div>
    <div class="form-group flex-t m-b-35">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg   @error('numTelephone') is-invalid @enderror" name="numTelephone" value="{{ old('numTelephone') }}" id="numtlf" type="text" placeholder="Numero Telephone*">

                        @error('numTelephone')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" name="email" type="email" placeholder="@email*" >

                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
    </div>
    <div class="form-group m-b-35">
                    <input class="form-control form-control-lg  @error('password') is-invalid @enderror" id="mtps" type="password" placeholder="mot de passe*" name="password" >
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                            
    </div>
    <div class="form-group flex-t m-b-35">
                    <div class=" m-r-30" style="width: 375px ">
                        <select class="form-control form-control-lg @error('ville') is-invalid @enderror" id="exampleFormControlSelect2" name="ville" style="height: 45px" >
                          <option value="" disabled selected>Choisir une ville</option> 
                          <option v-for="v in villes" :value="v.nom">@{{v.nom}}</option> 
                        </select>

                        @error('ville')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="" style="width: 375px">
                        <select class="form-control form-control-lg @error('compte') is-invalid @enderror" id="exampleFormControlSelect1"  name="compte"  onchange="onChange()" style="height: 45px">
                            <option value="0" disabled selected>Crée compte tent que</option>
                            <option value="1">Client</option>
                            <option value="2">Vendeur</option>
                            <option value="3">Employeur</option>
                            <option value="4">Admin</option>
                        </select>
                        @error('compte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    </div>
     <div class="form-group flex-t m-b-35 openV"  style="display: none">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg  " id="nom_btq" type="text" placeholder="Nom de Boutique" name="Nom_boutique"/>
                    </div>
                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg @error('Num_Compte_Banquaire') is-invalid @enderror" id="nom_btq"  name="Num_Compte_Banquaire" type="text" placeholder="Numero Compte Bancaire*" /> 

                        @error('Num_Compte_Banquaire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    </div>
    <div class="form-group m-b-35 openV" style="display: none">
                    <input class="form-control form-control-lg @error('addrsse_boutique') is-invalid @enderror" id="addrsse_btq" name ="addrsse_boutique" type="text" placeholder="Addresse de Boutique*">    

                    @error('addrsse_boutique')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

    </div>
    <div class="from-group  m-b-40 openV" style="display: none">
                    <input type="file" class="form-control " name="photoV" value="{{old('image')}}" style="height: 45px">
                        
    </div>
    <div class="form-group flex-t m-b-35 openE" style="display: none">
                    <div class=" m-r-30" style="width: 375px">
                        <input class="form-control form-control-lg  @error('nom_societe') is-invalid @enderror" id="nom_btq" name="nom_societe" type="text" placeholder="Nom de Société*">

                        @error('nom_societe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="" style="width: 375px">
                        <input class="form-control form-control-lg @error('num_compte_banquiare') is-invalid @enderror" id="nom_btq" name="num_compte_banquiare" type="text" placeholder="Numero Compte Bancaire*" > 

                        @error('num_compte_banquiare')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    </div>
    <div class="form-group m-b-35 openE" style="display: none">
                    <input class="form-control form-control-lg @error('addrsse_soct') is-invalid @enderror" id="addrsse_soct" name="addrsse_soct" type="text" placeholder="Addresse de Société*" >

                    @error('addrsse_soct')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

    </div>
    <div class="from-group  m-b-40 openE" style="display: none">
                    <input type="file" class="form-control " name="photoE" value="{{old('image')}}" style="height: 45px">
                        
    </div>
  </div>
  <div class="tab">
    <div class="form-group m-b-35" >
                    <label class="m-b-13" style="font-size: 20px">Sélectionnez le(s) type(s) de livraison que que vous pouvez effectuer :</label>
                    <select class="form-control form-control-lg @error('typeL') is-invalid @enderror" id="typeLivrs"  name="typeL[]" multiple onchange="onChangeTypeL()">
                            <option value="0" disabled selected>Sélectionnez</option>
                            <option value="dhl">DHL(Poste)</option>
                            <option value="vc">Vous effectuer la livraison</option>
                            <option value="cv">Client ramener ces produits</option>
                    </select>                           
                        @error('typeL')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    </div>
  </div>
  <div class="tab " style="border: 2px" >
    <div class="custom-checkbox m-b-20">
        <input type="checkbox" class="custom-control-input form-control m-t-2" value="" id="cocher" name="selectAll[]" >
        <label class="custom-control-label p-l-25 " for="cocher" style="font-size: 20px" >Selectionner Tout :</label>
    </div>
   <div class="form-group m-b-35 m-l-50 " v-for="v in villes" style="display: inline-flex;">
                    <div class="custom-checkbox m-r-14" >
                        <input type="checkbox" class="custom-control-input form-control" :value="v.id" :id="v.id" name="villeC[]" >
                        <label class="custom-control-label p-l-25 p-t-4" :for="v.id" >@{{v.nom}}</label>
                    </div>
                    <script type="text/javascript">
                        var i=0;

                    </script>
    </div>
    <div class="form-group input-group m-b-60">
                  <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Entrez le prix de livraison pour la(les) ville(s) selectionner" name="prix_tarif" style="height: 45px">
                        @error('prix_tarif')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  <div class="input-group-append">
                    <select class="form-control form-control-lg @error('poids') is-invalid @enderror" id="exampleFormControlSelect1"  name="poids" style="height: 45px">
                            <option value="1" selected>/Kg</option>
                            <option value="2">/g</option>
                    </select>
                  </div>
    </div>
  </div>
    <div id="nextPrevious">
      <button type="button" id="prevBtn" onclick="nextPrev(-1,-1)" class="btn-lg m-t-8 btn-block m-r-30" style="background-color:#ca2323;color:white">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1,1)" class="btn-lg btn-block bg10" style="background-color:#ca2323;color:white">Creer Compte</button>
      
    </div>

  <div style="text-align:center;margin-top:40px; display: none;" id="stepp">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>

</form>
   
        </div>
    </section>
</div>
   <!-- --*******************************************************************************************************-->
   <script>
$(document).ready(function(){

// TOUT COCHER
$(":cocher").click(function(){
$(':checkbox.checkClass').prop('checked', true);
$(":radio#decocher").prop('checked', false);
});
// TOUT DE-COCHER
$(":radio#decocher").click(function(){
$(':checkbox.checkClass').prop('checked', false);
$(":radio#cocher").prop('checked', false);
});
// UNCHECK SI UNE CHECKBOX EST SELECTIONNEE
$(':checkbox.checkClass').click(function(){
$(":radio#cocher").prop('checked', false);
$(":radio#decocher").prop('checked', false);
});


});
</script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab,1); // Display the current tab

function showTab(n,perv) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.background = "#13c940";
    document.getElementById("nextBtn").innerHTML = "Creer Compte";
  } 
  else if(n == 0 && perv==-1){
    document.getElementById("nextBtn").innerHTML = "Suivant";
  }
  else if(n == 0 && prev==1){
    document.getElementById("nextBtn").innerHTML = "Creer Compte";
  }
  else {
    document.getElementById("nextBtn").innerHTML = "Suivant";
    document.getElementById("nextBtn").style.background = "#13c940";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n,prev) {
    var select = document.getElementById('exampleFormControlSelect1');
    var options = select.getElementsByTagName('option');
    var cmpt = options[select.selectedIndex].value;
    var select1 = document.getElementById('typeLivrs');
    var j=0,k=0;
    if(cmpt==1 || cmpt==3 || cmpt==0 || cmpt==4) {
        document.getElementById("regForm").submit();
        return false;
    }

    for ( var i=1; i< select1.options.length; i++) {
        if ( select1.options[i].selected) 
        {
          if(select1.options[i].value=="dhl"){
            j++; k++;
          }
          else if(select1.options[i].value=="cv"){
            j++; k++;
          }
          else if(select1.options[i].value=="vc"){
            j++;
          }
        }
    }
    if((j == 2 && k == 2)|| (j==1 && k==1) && prev == 1 && currentTab != 0){
        document.getElementById("regForm").submit();
        return false;
    } 


  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  if(currentTab != x.length-1 && prev==1){
    x[currentTab].style.display = "none";
  }
  else if(prev==-1){
    x[currentTab].style.display = "none";
  }
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;

  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
    showTab(currentTab,n);
  
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function onChange() {
    var select = document.getElementById('exampleFormControlSelect1');
    var options = select.getElementsByTagName('option');
    var cmpt = options[select.selectedIndex].value;
    var v = document.getElementsByClassName("openV");
    var e = document.getElementsByClassName("openE");
    var v_nextPrevious = document.getElementById("nextPrevious");
    if(cmpt==0){
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").style.background = "#ca2323";
    }
    if(cmpt==2){
        document.getElementById("stepp").style.display = "block";
        document.getElementById("nextBtn").innerHTML = "Suivant";
        document.getElementById("nextPrevious").className = "flex-t";
        document.getElementById("nextBtn").style.background = "#13c940";     
        v[0].style.display= "flex";
        v[1].style.display= "block";
        v[2].style.display= "block";
        e[0].style.display= "none";
        e[1].style.display= "none";
        e[2].style.display= "none";

    }
    else if(cmpt==1) {
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("nextBtn").style.background = "#ca2323";
        v[0].style.display= "none";
        v[1].style.display= "none";
        v[2].style.display= "none";
        e[0].style.display= "none";
        e[1].style.display= "none";
        e[2].style.display= "none";

    }
    else if(cmpt==3) {
        document.getElementById("stepp").style.display = "none";
        document.getElementById("nextBtn").innerHTML = "Creer Compte";
        document.getElementById("nextBtn").style.background = "#ca2323";
        v[0].style.display= "none";
        v[1].style.display= "none";
        v[2].style.display= "none";
        e[0].style.display= "flex";
        e[1].style.display= "block";
        e[2].style.display= "block";

    }

}
function onChangeTypeL(){
  var select = document.getElementById('typeLivrs');
  var options = select.getElementsByTagName('option');
  var typeL = options[select.selectedIndex].value;
  var j=0,k=0;


    for ( var i=1; i< select.options.length; i++){
        if ( select.options[i].selected) {
          if(select.options[i].value=="dhl"){
            j++; k++;
          }
          else if(select.options[i].value=="cv"){
            j++; k++;
          }
          else if(select.options[i].value=="vc"){
            j++;
          }
        }
   }
  if(j == 3 ||(j == 2 && k == 1) || (j == 1 && k == 0)){
    document.getElementById("nextBtn").innerHTML = "Suivant"; 
  }
  else if((j == 2 && k == 2)|| (j==1 && k==1)){
    document.getElementById("nextBtn").innerHTML = "Creer Compte"; 
  }



}
</script>
@endsection
