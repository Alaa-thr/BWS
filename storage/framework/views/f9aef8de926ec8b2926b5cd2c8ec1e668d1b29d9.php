

<?php $__env->startSection('content'); ?>

	<head>
		<title><?php echo e(( 'Statistiques')); ?></title>
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
            <a class="navbar-brand" href="#pablo">Statistique </a>
          </div>
        </div>
      </nav>

      <div class="panel-header panel-header-lg" >
        <canvas id="bigDashboardChart" class=""></canvas>
      </div>
      <div class="content" id='app222'>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                
                <h4 class="card-title m-b-30">5 Produits Jamais Achetés</h4>

              </div>
              <div class="card-body">
                <div class="table_row flex-t p-b-20" v-for='prdt in produitsJamaisAchetes'>
                      <div class="flex-t"  >
                        <div class="column-1" >
                          <div  class="how-itemcart2" style="height: 80px">
                            <img :src="'storage/produits_image/'+ prdt.image" alt="">
                          </div>
                        </div>
                        <div class="m-t-8">
                          {{prdt.Libellé}}
                        </div>
                        <div class="column-2 p-l-40 p-r-10 p-t-8">Quantité {{prdt.Qte_P}} x {{prdt.prix}}DA
                        </div>
                     </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Willaya qui Fait L'achat / Mois</h5>
              </div>

              <div class="card-body m-b-20">
                <div class="chart-area" style="height: 340px">
                  <canvas id="barChartSimpleGradientsNumbers" ></canvas>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Produits plus Achetés de L'année Courante</h5>
                <h4 class="card-title" style="margin-top: 25px">10 Produits plus Achetés</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item js-show-modal1" href="#">Afficher les Produits</a>
                  </div>
                </div>
              </div>
              <div class="card-body m-b-65">
                <div class="chart-area">
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Clients Plus Commandé des Produits</h5>
                <h4 class="card-title"> Statistiques des Clients Fidéle</h4>
              </div>
              <div class="card-body">
                <div class="chart-area" style="height: 250px">
                  <canvas id="clientsfidéle"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Nombre des Commandes et Demandes Fait /Mois de L'année Courante</h5>
                <h4 class="card-title"> Statistiques des Commandes Fait </h4>
              </div>
              <div class="card-body"style="margin-bottom: 39px">
                <div class="chart-area" style="height: 250px">
                    <canvas id="faitproduitcommande"></canvas>
                </div>
              </div>
            </div>
          </div>
        <div class="wrap-modal11 js-modal1 p-t-80 p-b-20" >
    <div class="overlay-modal11 js-hide-modal1"></div>

    <div class="container">
      <div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal1">
          <img src="images/icons/icon-close.png" alt="CLOSE">
        </button>
        <div class="p-b-30 p-l-40">
          <h4 class="ltext-102  cl2">
                   Les 10 Produits Plus Achetés    

          </h4>
        </div>

        <div class="row m-r-20" >
          <div class="col-md-12 col-lg-12 m-r-40">
            <div class="p-l-60 p-lr-0-lg">
              <div class="wrap-slick3 flex-sb flex-w">
                <div class="p-t-20 p-b-20 p-l-50">
                  <h4 class="mtext-105 cl13 p-l-70">
                    Vos Produits
                  </h4>
                </div>
                <div class="div1" >
                  <div >

                    <div class="table_row flex-t p-b-20" v-for='prdt in produits' >
                      <div class="flex-t" v-for="ppa in produitsPlusAcheter" v-if="ppa.produit_id=== prdt.id">
                        <div class="column-1" >
                          <div  class="how-itemcart2" style="height: 80px">
                            <img :src="'storage/produits_image/'+ prdt.image" alt="">
                          </div>
                        </div>
                        <div class="m-t-10">
                          {{prdt.Libellé}}
                        </div>
                        <div class="column-2 p-l-40 p-r-40 p-t-10">Quantité {{prdt.Qte_P}} x {{prdt.prix}}DA
                        </div>
                     </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
        
       
        </div>
      </div>
    </div>
  </div>
   </div>


 <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      initDashboardPageCharts();

    });
  </script>
<script>
  window.Laravel = <?php echo json_encode([
               "csrfToken"  => csrf_token(),
               'achatParMois' => $achatParMois,
               'produitPlusAcheter' => $produitPlusAcheter,
               'produits' => $produits,
               'villeFaitAchat' => $villeFaitAchat,
               'produitsJamaisAchete'=>$produitsJamaisAchete,
               'clientFidele'=>$clientFidele,
               'commande'=>$commande,
               "url"      => url("/")  
    ]); ?>;
   var app222 = new Vue({
      el: '#app222',
      data:{
         achatsParMois: [],
         tableMonth: [],
         tableNombreAchat: [],
         produitsPlusAcheter: [],
         tableProduitsPlusAcheter: [],
         tableProduitsPlusAcheterLibelle: [],
         produits: [],
         produitsPlus: [],
         villesFaitAchat: [],
         tableVillesFaitAchat: [],
         tableVillesFaitAchatNom: [],
         produitsJamaisAchetes: [],
         clientFideles: [],
         tableclientFidelesNom: [],
         tableclientFidelesNombre: [],
         commandes: [],
         tableNombrecommandes:[],

      },
      methods:{
        getStatistique: function(){

        axios.get(window.Laravel.url+'/statistiques')
            .then(response => {
                this.achatsParMois = window.Laravel.achatParMois;
                this.produitsPlusAcheter = window.Laravel.produitPlusAcheter;
                this.produitsPlus = window.Laravel.produitPlusAcheter;
                this.villesFaitAchat = window.Laravel.villeFaitAchat;
                this.produits = window.Laravel.produits;
                this.produitsJamaisAchetes = window.Laravel.produitsJamaisAchete;
                this.clientFideles = window.Laravel.clientFidele;
                this.commandes = window.Laravel.commande;
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
                this.clientFideles.forEach(key=>{
                    this.tableclientFidelesNom.unshift(key.nom.concat(' ',key.prenom));
                    this.tableclientFidelesNombre.unshift(key.nombre_client);
                }); 
                this.villesFaitAchat.forEach(key=>{
                    this.tableVillesFaitAchat.push(key.ville_Fait_Achat);
                    this.tableVillesFaitAchatNom.push(key.ville);
                }); 

                if(this.produitsPlus.length <  10){
                  for( i=this.produitsPlus.length-1; i >= 0   ;i--){
                    this.tableProduitsPlusAcheter.unshift(this.produitsPlus[i].produit_Plus_Achater); 
                    this.tableProduitsPlusAcheterLibelle.unshift(this.produitsPlus[i].Libellé);
                  }
                }
                else {
                    for(j=0, i=this.produitsPlus.length-1; i >= 0 && j<10  ;i--,j++){
                    this.tableProduitsPlusAcheter.unshift(this.produitsPlus[i].produit_Plus_Achater);
                    this.tableProduitsPlusAcheterLibelle.unshift(this.produitsPlus[i].Libellé);

                  }
                }

                this.achatsParMois.forEach(key=>{
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
                    
                  
                  this.tableNombreAchat.push(key.nombre_Achat);
                });

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
 function initDashboardPageCharts () {

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
          label: "Nombre Achat/Mois",
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
          data: app222.tableNombreAchat
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

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: app222.tableProduitsPlusAcheterLibelle,
        datasets: [{
          label: "Nombre d'Achat",
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
          data: app222.tableProduitsPlusAcheter
        }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
    });


  

    var e = document.getElementById("barChartSimpleGradientsNumbers").getContext("2d");

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgb(255,255,153)");
    gradientFill.addColorStop(1, hexToRGB('#FFFFE0', 0.4));

    var a = {
      type: "bar",
      data: {
        labels: app222.tableVillesFaitAchatNom,
        datasets: [{
          label: "Active Countries",
          backgroundColor: gradientFill,
          borderColor: "yellow",
          pointBorderColor: "yellow",
          pointBackgroundColor: "yellow",
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 1,
          pointRadius: 4,
          fill: true,
          borderWidth: 1,
          data: app222.tableVillesFaitAchat
        }]
      },
      options: {
        maintainAspectRatio: true,
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

    var cardStatsMiniLineColor = "#fff",
      cardStatsMiniDotColor = "#fff";

    ctx = document.getElementById('clientsfidéle').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));

    myChart = new Chart(ctx, {
      type: 'line',
      responsive: true,
      data: {
        labels: app222.tableclientFidelesNom,
        datasets: [{
          label: "Nombre d'Achat",
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
          data: app222.tableclientFidelesNombre
        }]
      },
      options: gradientChartOptionsConfigurationWithNumbersAndGrid
    });
     var ctx = document.getElementById('faitproduitcommande').getContext("2d");

    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, chartColor);

    var gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["JAN", "FEB", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC"],
        datasets: [
          {
            
            label: "Nombre Commandes",
            backgroundColor: gradientFill,
            borderColor: "#f96332",
            pointBorderColor: "#FFF",
            pointBackgroundColor: "#f96332",
            pointBorderWidth: 2,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            borderWidth: 1,
            data: app222.tableNombrecommandes
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
<?php echo $__env->make('layouts.template_vendeur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\BWS\resources\views/statistiques_vendeur.blade.php ENDPATH**/ ?>