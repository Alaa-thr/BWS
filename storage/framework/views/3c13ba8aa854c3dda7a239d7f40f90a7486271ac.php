


<?php $__env->startSection('content'); ?>

    <head>
    <title><?php echo e(( 'Statistique')); ?></title>
   </head>
      <div class="main-panel" id="main-panel">
      
      <div class="panel-header panel-header-lg">

        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content" id="app222">
        <div class="row">
          <div class="col-lg-5  ">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Categoreis plus Utilisé  / Nombre d'utilisation</h5>
                <h4 class="card-title">Categoreis Shop</h4>

              </div>
              <div class="card-body" style="margin-bottom: 30px">
                <div class="chart-area">
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Categoreis plus Utilisé  / Nombre d'utilisation</h5>
                <h4 class="card-title">Categoreis D'emploi</h4>
              </div>
              <div class="card-body" style="margin-bottom: 30px">
                <div class="chart-area">
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              
            </div>
          </div>
         
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Nombre Postulé les Annonces D’emploi / Mois de L'année Courante</h5>
                <h4 class="card-title">Statistiques de Postulation des Annonces D’emploi</h4>
              </div>
              <div class="card-body" style="margin-bottom: 20px">
                <div class="chart-area" style="height: 220px">
                  <canvas id="postulélesannoncesemploi"></canvas>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Nombre Postulé les Produits / Mois de L'année Courante</h5>
                <h4 class="card-title"> Statistiques de Postulation des Produits</h4>
              </div>
              <div class="card-body" style="margin-bottom: 20px">
                <div class="chart-area" style="height: 220px">
                  <canvas id="postulélesproduit"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class=" col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Nombre Inscription Clients, Vendeurs, Employeus /Mois de L'année Courante</h5>
                <h4 class="card-title"> Statistiques d'Inscription De Chaque Utilisateur</h4>
              </div>
              <div class="card-body"style="margin-bottom: 39px">
                <div class="chart-area" style="height: 250px">
                    <canvas id="inscriptioncve"></canvas>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Nombre des Commandes et Demandes Fait /Mois de L'année Courante</h5>
                <h4 class="card-title"> Statistiques des Commandes et Demandes Fait </h4>
              </div>
              <div class="card-body"style="margin-bottom: 39px">
                <div class="chart-area" style="height: 250px">
                    <canvas id="faitproduitcommande"></canvas>
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
  
<script>
    window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               "NombreInscriptionParMois" =>$NombreInscriptionParMois,
               "categoriesPlusDemanderShop" =>$categoriesPlusDemanderShop,
               "categoriesPlusDemanderEmploi" =>$categoriesPlusDemanderEmploi,
               "postulationProduit" =>$postulationProduit,
               "postulationAnnonce" =>$postulationAnnonce,
               "commande"=>$commande,
               "demande"=>$demande,
               "client"=>$client,
               "vendeur"=>$vendeur,
               "employeur"=>$employeur,
               "url"      => url("/")  
    ]); ?>;
   var app222 = new Vue({
      el: '#app222',
      data:{
         NombreInscriptionsParMois: [],
         tableMonth: [],
         tableNombreIscription: [],
         categoriesPlusDemanderShops: [],
         tableCategoShopNom: [],
         tableCategoShopNombre: [],
         categoriesPlusDemanderEmplois: [],
         tableCategoEmploiNom: [],
         tableCategoEmploiNombre: [],
         postulationProduit: [],
         tablePostulationProduitMonth: [],
         tableNombrePostulationProduit: [],
         postulationAnnonce: [],
         tablePostulationAnnonceMonth: [],
         tableNombrePostulationAnnonce: [],
         commandes: [],
         tableNombrecommandes: [],
         demandes: [],
         tableNombredemandes: [],
         clients: [],
         tableNombreclients: [],
         vendeurs: [],
         tableNombrevendeurs: [],
         employeurs: [],
         tableNombreemployeurs: [],

      },
      methods:{
        getStatistique: function(){
          
        axios.get(window.Laravel.url+'/statistiquesAdmin')
            .then(response => {
               this.NombreIscriptionsParMois = window.Laravel.NombreInscriptionParMois;
               this.categoriesPlusDemanderShops = window.Laravel.categoriesPlusDemanderShop;
               this.categoriesPlusDemanderEmplois = window.Laravel.categoriesPlusDemanderEmploi;
               this.postulationProduit = window.Laravel.postulationProduit;
               this.postulationAnnonce = window.Laravel.postulationAnnonce;
               this.clients = window.Laravel.client;
               this.vendeurs = window.Laravel.vendeur;
               this.employeurs = window.Laravel.employeur;

               this.commandes = window.Laravel.commande;
               this.demandes = window.Laravel.demande;
               this.categoriesPlusDemanderShops.forEach(key=>{
                    this.tableCategoShopNom.push(key.libelle);
                    this.tableCategoShopNombre.push(key.Catego_shop);
                });
               this.categoriesPlusDemanderEmplois.forEach(key=>{
                    this.tableCategoEmploiNom.push(key.libelle);
                    this.tableCategoEmploiNombre.push(key.Catego_shop);
                });
              
               var i=1,j=0, t =["JAN", "FEV", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC"];
               this.commandes.forEach(key=>{
                  if(key.month == i){
                    this.tableNombrecommandes.push(key.commande);
                    i++;
                  }
                  else{
                   for(j;j<key.month-1;j++){
                              this.tableNombrecommandes.push(0);
                        
                    }
                    this.tableNombrecommandes.push(key.commande);
                    i=key.month+1;
                    
                  }
                  j++;
                });
                if(j < 12){
                  for(j;j<12;j++){
                      this.tableNombrecommandes.push(0);
                  }
                } 
                 i=1;j=0;
               this.demandes.forEach(key=>{

                   if(key.month == i){
                    this.tableNombredemandes.push(key.demande);
                    i++;
                  }
                  else{
                   for(j;j<key.month-1;j++){
                              this.tableNombredemandes.push(0);
                        
                    }
                    this.tableNombredemandes.push(key.demande);
                    i=key.month+1;
                    
                  }
                  j++;
                });
                if(j<12){
                   for(j;j<12;j++){
                      this.tableNombredemandes.push(0);
                  }
                } 
                  i=1;j=0;
               this.clients.forEach(key=>{

                   if(key.month == i){
                    this.tableNombreclients.push(key.Iscription_client);
                    i++;
                  }
                  else{
                   for(j;j<key.month-1;j++){
                              this.tableNombreclients.push(0);
                        
                    }
                    this.tableNombreclients.push(key.Iscription_client);
                    i=key.month+1;
                    
                  }
                  j++;
                });
                if(j<12){
                   for(j;j<12;j++){
                      this.tableNombreclients.push(0);
                  }
                } 
                  i=1;j=0;
               this.vendeurs.forEach(key=>{

                   if(key.month == i){
                    this.tableNombrevendeurs.push(key.Iscription_vendeur);
                    i++;
                  }
                  else{
                   for(j;j<key.month-1;j++){
                              this.tableNombrevendeurs.push(0);
                        
                    }
                    this.tableNombrevendeurs.push(key.Iscription_vendeur);
                    i=key.month+1;
                    
                  }
                  j++;
                });
                if(j<12){
                   for(j;j<12;j++){
                      this.tableNombrevendeurs.push(0);
                  }
                } 
                  i=1;j=0;
               this.employeurs.forEach(key=>{

                   if(key.month == i){
                    this.tableNombreemployeurs.push(key.Iscription_employeur);
                    i++;
                  }
                  else{
                   for(j;j<key.month-1;j++){
                              this.tableNombreemployeurs.push(0);
                        
                    }
                    this.tableNombreemployeurs.push(key.Iscription_employeur);
                    i=key.month+1;
                    
                  }
                  j++;
                });
                if(j<12){
                   for(j;j<12;j++){
                      this.tableNombreemployeurs.push(0);
                  }
                } 
               this.postulationAnnonce.forEach(key=>{
                    switch (key.month) {
                      case 1:
                        this.tablePostulationAnnonceMonth.push('Jan');
                        break;
                      case 2:
                        this.tablePostulationAnnonceMonth.push('Feb');
                        break;
                      case 3:
                        this.tablePostulationAnnonceMonth.push('Mar');
                        break;
                      case 4:
                        this.tablePostulationAnnonceMonth.push('Avr');
                        break;
                      case 5:
                        this.tablePostulationAnnonceMonth.push('Mai');
                        break;
                      case 6:
                        this.tablePostulationAnnonceMonth.push('Jun');
                        break;
                      case 7:
                        this.tablePostulationAnnonceMonth.push('Jul');
                        break;
                      case 8:
                        this.tablePostulationAnnonceMonth.push('Aou');
                        break;
                      case 9:
                        this.tablePostulationAnnonceMonth.push('Sep');
                        break;
                      case 10:
                        this.tablePostulationAnnonceMonth.push('Oct');
                        break;
                      case 11:
                        this.tablePostulationAnnonceMonth.push('Nov');
                        break;
                      case 12:
                        this.tablePostulationAnnonceMonth.push('Dec');
                        break;
                      
                    }
                    
                  
                  this.tableNombrePostulationAnnonce.push(key.postulation_annonce);
                }); 
               this.postulationProduit.forEach(key=>{
                    switch (key.month) {
                      case 1:
                        this.tablePostulationProduitMonth.push('Jan');
                        break;
                      case 2:
                        this.tablePostulationProduitMonth.push('Feb');
                        break;
                      case 3:
                        this.tablePostulationProduitMonth.push('Mar');
                        break;
                      case 4:
                        this.tablePostulationProduitMonth.push('Avr');
                        break;
                      case 5:
                        this.tablePostulationProduitMonth.push('Mai');
                        break;
                      case 6:
                        this.tablePostulationProduitMonth.push('Jun');
                        break;
                      case 7:
                        this.tablePostulationProduitMonth.push('Jul');
                        break;
                      case 8:
                        this.tablePostulationProduitMonth.push('Aou');
                        break;
                      case 9:
                        this.tablePostulationProduitMonth.push('Sep');
                        break;
                      case 10:
                        this.tablePostulationProduitMonth.push('Oct');
                        break;
                      case 11:
                        this.tablePostulationProduitMonth.push('Nov');
                        break;
                      case 12:
                        this.tablePostulationProduitMonth.push('Dec');
                        break;
                      
                    }
                    
                  
                  this.tableNombrePostulationProduit.push(key.postulation_produit);
                }); 

                this.NombreIscriptionsParMois.forEach(key=>{
                    switch (key.month) {
                      case 1:
                        this.tableMonth.push('Jan');
                        break;
                      case 2:
                        this.tableMonth.push('Feb');
                        break;
                      case 3:
                        this.tableMonth.push('Mar');
                        break;
                      case 4:
                        this.tableMonth.push('Avr');
                        break;
                      case 5:
                        this.tableMonth.push('Mai');
                        break;
                      case 6:
                        this.tableMonth.push('Jun');
                        break;
                      case 7:
                        this.tableMonth.push('Jul');
                        break;
                      case 8:
                        this.tableMonth.push('Aou');
                        break;
                      case 9:
                        this.tableMonth.push('Sep');
                        break;
                      case 10:
                        this.tableMonth.push('Oct');
                        break;
                      case 11:
                        this.tableMonth.push('Nov');
                        break;
                      case 12:
                        this.tableMonth.push('Dec');
                        break;
                      
                    }
                    
                  
                  this.tableNombreIscription.push(key.Nombre_Iscription_Par_Mois);
                }); 
               console.log('this.NombreIscriptionsParMois :' , this.NombreIscriptionsParMois);

            })
            .catch(error =>{
                 console.log('errors :' , error);
            })
        },
        
       },
       created:function(){
        this.getStatistique();
      },
  });
</script> 
<script>
 function initDashboardPageCharts() {

    chartColor = "#FFFFFF";

    // General configuration for the charts with Line gradientStroke
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: 1,
      scales: {
        yAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    gradientChartOptionsConfigurationWithNumbersAndGrid = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
      },
      responsive: true,
      scales: {
        yAxes: [{
          gridLines: 0,
          gridLines: {
            zeroLineColor: "transparent",
            drawBorder: false
          }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
          },
          gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
          }
        }]
      },
      layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
        }
      }
    };

    var ctx = document.getElementById('bigDashboardChart').getContext("2d");

    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: app222.tableMonth,
        datasets: [{
          label: "Nombre Iscriptions/Mois",
          borderColor: chartColor,
          pointBorderColor: chartColor,
          pointBackgroundColor: "#1e3d60",
          pointHoverBackgroundColor: "#1e3d60",
          pointHoverBorderColor: chartColor,
          pointBorderWidth: 1,
          pointHoverRadius: 7,
          pointHoverBorderWidth: 2,
          pointRadius: 5,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: app222.tableNombreIscription
        }]
      },
      options: {
        layout: {
          padding: {
            left: 20,
            right: 20,
            top: 0,
            bottom: 0
          }
        },
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: '#fff',
          titleFontColor: '#333',
          bodyFontColor: '#666',
          bodySpacing: 4,
          xPadding: 12,
          mode: "nearest",
          intersect: 0,
          position: "nearest"
        },
        legend: {
          position: "bottom",
          fillStyle: "#FFF",
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "rgba(255,255,255,0.4)",
              fontStyle: "bold",
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 10
            },
            gridLines: {
              drawTicks: true,
              drawBorder: false,
              display: true,
              color: "rgba(255,255,255,0.1)",
              zeroLineColor: "transparent"
            }

          }],
          xAxes: [{
            gridLines: {
              zeroLineColor: "transparent",
              display: false,

            },
            ticks: {
              padding: 10,
              fontColor: "rgba(255,255,255,0.4)",
              fontStyle: "bold"
            }
          }]
        }
      }
    });

    var cardStatsMiniLineColor = "#fff",
      cardStatsMiniDotColor = "#fff";

    ctx = document.getElementById('lineChartExample').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    var gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

    myChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: app222.tableCategoShopNom,
        datasets: [{
          label: "Nombre d'utilisation",
          backgroundColor: gradientFill,
          borderColor: "#f96332",
          pointBorderColor: "#1e3d60",
          pointBackgroundColor: "#1e3d60",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          borderWidth: 1,
          data: app222.tableCategoShopNombre
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          bodySpacing: 4,
          mode: "nearest",
          intersect: 0,
          position: "nearest",
          xPadding: 10,
          yPadding: 10,
          caretPadding: 10
        },
        responsive: 1,
        scales: {
          yAxes: [{
            gridLines: 0,
            gridLines: {
              zeroLineColor: "transparent",
              drawBorder: false
            }
          }],
          xAxes: [{
            gridLines: {
              zeroLineColor: "transparent",
              display: false,
              drawBorder: false
            }
          }]
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 15,
            bottom: 15
          }
        }
      }
    });


    var e = document.getElementById("barChartSimpleGradientsNumbers").getContext("2d");

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#2CA8FF', 0.6));

    var a = {
      type: "bar",
      data: {
        labels: app222.tableCategoEmploiNom,
        datasets: [{
          label: "Nombre d'utilisation",
          backgroundColor: gradientFill,
          borderColor: "#2CA8FF",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#2CA8FF",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          borderWidth: 1,
          data: app222.tableCategoEmploiNombre
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          bodySpacing: 4,
          mode: "nearest",
          intersect: 0,
          position: "nearest",
          xPadding: 10,
          yPadding: 10,
          caretPadding: 10
        },
        responsive: 1,
        scales: {
          yAxes: [{
            gridLines: 0,
            gridLines: {
              zeroLineColor: "transparent",
              drawBorder: false
            }
          }],
          xAxes: [{

            gridLines: {
              zeroLineColor: "transparent",
              display: false,
              drawBorder: false
            }
          }]
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 15,
            bottom: 15
          }
        }
      }
    };
    ctx = document.getElementById('postulélesannoncesemploi').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#18ce0f');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: app222.tablePostulationAnnonceMonth,
        datasets: [{
          label: "Nombre Postulation",
          borderColor: "#18ce0f",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#18ce0f",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: app222.tableNombrePostulationAnnonce
        }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
    });

    ctx = document.getElementById('postulélesproduit').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#18ce0f');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: app222.tablePostulationProduitMonth,
        datasets: [{
          label: "Nombre Postulation",
          borderColor: "#18ce0f",
          pointBorderColor: "#FFF",
          pointBackgroundColor: "#18ce0f",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: app222.tableNombrePostulationProduit
        }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
    });

   

    var ctx = document.getElementById('faitproduitcommande').getContext("2d");

    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["JAN", "FEB", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC"],
        datasets: [
          {
            
            label: "Nombre Commandes",
            borderColor: "#18ce0f",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "#18ce0f",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            backgroundColor: 'transparent',
            borderWidth: 2,
            data: app222.tableNombrecommandes
          },
          {
            label: "Nombre Demandes",
            borderColor: "red",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "red",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            backgroundColor: 'transparent',
            borderWidth: 2,
            data: app222.tableNombredemandes
          }
        ]
      },
      options: {
        layout: {
          padding: {
            left: 20,
            right: 20,
            top: 0,
            bottom: 0
          }
        },
        maintainAspectRatio: false,
        tooltips: {
          bodySpacing: 4,
          xPadding: 12,
          mode: "nearest",
          intersect: 0,
          position: "nearest"
        },
        legend: {
          position: "bottom",
          fillStyle: "#FFF",
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              
              fontStyle: "bold",
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 10
            },
            gridLines: {
              drawTicks: true,
              drawBorder: false,
              display: true,
              zeroLineColor: "transparent"
            }

          }],
          xAxes: [{
            gridLines: {
              zeroLineColor: "transparent",
              display: false,
            },
            ticks: {
              padding: 10,
              fontStyle: "bold"
            }
          }]
        }
      }
    });
    var ctx = document.getElementById('inscriptioncve').getContext("2d");

    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["JAN", "FEB", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC"],
        datasets: [
          {
            
            label: "Nombre Client",
            borderColor: "pink",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "pink",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            backgroundColor: 'transparent',
            borderWidth: 2,
            data: app222.tableNombreclients
          },
          {
            label: "Nombre Vendeur",
            borderColor: "orange",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "orange",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            backgroundColor: 'transparent',
            borderWidth: 2,
            data: app222.tableNombrevendeurs
          },
          {
            label: "Nombre Employeur",
            borderColor: "blue",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "blue",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            backgroundColor: 'transparent',
            borderWidth: 2,
            data: app222.tableNombreemployeurs
          }
        ]
      },
      options: {
        layout: {
          padding: {
            left: 20,
            right: 20,
            top: 0,
            bottom: 0
          }
        },
        maintainAspectRatio: false,
        tooltips: {
          bodySpacing: 4,
          xPadding: 12,
          mode: "nearest",
          intersect: 0,
          position: "nearest"
        },
        legend: {
          position: "bottom",
          fillStyle: "#FFF",
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              
              fontStyle: "bold",
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 10
            },
            gridLines: {
              drawTicks: true,
              drawBorder: false,
              display: true,
              zeroLineColor: "transparent"
            }

          }],
          xAxes: [{
            gridLines: {
              zeroLineColor: "transparent",
              display: false,
            },
            ticks: {
              padding: 10,
              fontStyle: "bold"
            }
          }]
        }
      }
    });
    var viewsChart = new Chart(e, a);
  }
</script>
  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/statistiques_admin.blade.php ENDPATH**/ ?>