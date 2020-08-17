<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Vendeur;
use PDF;
use Auth;

class PDFController extends Controller
{

    function pdf($id)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->commandes_to_uploade($id));
     return $pdf->stream();
    }

    function commandes_to_uploade($id)
    {
    	if(Auth::user()->type_compte == 'c'){
	     $client = Client::find(Auth::user()->id);
	     $cmds = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->distinct('produits.id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile', 'commandes.email','commandes.address', 'commandes.code_postale', 'commandes.numero_tlf', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur',\DB::raw('DATE(commandes.created_at) as date'))
        ->where([['commandes.client_id', $client->id],['commandes.id', $id],['imageproduits.profile',1]])
        ->get();
        $tarif = \DB::table('commandes')
        ->join('villes', 'villes.nom', '=', 'commandes.ville')
        ->join('tarif_livraisons', 'tarif_livraisons.ville_id', '=', 'villes.id')
        ->where([['commandes.client_id', $client->id],['commandes.id', $id]])
        ->distinct('ville')
        ->select('tarif_livraisons.vendeur_id','ville','tarif_livraisons.prix')
        ->get();
        
	     $pdf = '<div class="container">
			<div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent">
				<div class="p-b-30 p-l-40">
					<h1 class="ltext-102  cl2">
				           COMMANDE DE '.strtoupper ($client['nom']).' '.strtoupper ($client['prenom']).'

					</h1>
					<h1 class="ltext-102  cl2" style="float:right;padding-top:10px;">
				           '.$cmds[0]->date.'

						</h1>
				</div>

				<div class="row" >
					<div class="col-md-6 col-lg-6 m-r-40">
						<div class="p-l-60 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="p-t-20 p-b-20 p-l-50">
									<h2 class="mtext-105 cl13 p-l-70">
										Vos Produits
									</h2>
								</div>
								<div class="div1" >
								  <div>';
								    foreach ($cmds as $cmd ) {
								    	$pdf .= '<table> 

								    	
								    	<tr><td>
												<div style="height: 80px">
													<img src="' . public_path('storage/produits_image/'.$cmd->image). '"alt="IMG" style="height: 50px;weight:50px"></div>
												</td>
											<td><div style="margin-top:-25px; margin-left:15px;">'.$cmd->qte.' x '.$cmd->prix_produit.' DA/
											</div></td>
											<td>
												<div style="margin-top:-25px;">';
													if($cmd->type_livraison == 'vc'){
														if(count($tarif) == 0){
															$pdf .='<div>Le vendeur effectuer la livraison/ 0 DA, </div>';
														}
														else{
															$pdf .='<div>Le vendeur effectuer la livraison/'.$tarif[0]->prix.' DA, </div>';
														}
														
													}
													else if($cmd->type_livraison == 'cv'){
														$pdf .= '<div>Vous apportez votre produit, </div>';
													}
													else{
														$pdf .='<div>DHL(Poste), </div>';
													}
													
					                            $pdf .='    
					                                	
												</div></td>
												<td >
													<div style="margin-top:-25px;">Couleur:'.$cmd->nom.'/</div></td>';
													if($cmd->taille != '0'){
														$pdf .='<td><div style="margin-top:-25px;"> Taille:'.$cmd->taille.'/</div></td>'; 
													}
												$pdf .='
												<td>
								    			<div style="margin-top:-25px;"> Vendeur:</div>
								    		</td>
								    		<td>
								    			<div style="margin-top:-25px;">'.$cmd->nom_vendeur.' '.$cmd->prenom_vendeur.'</div>
								    		</td>	
												
											
										</tr></table>';
								    }	
								$pdf .='		
								  </div>
								</div>
							</div>
						</div>
						<div class="header-cart-total m-l-60 p-tb-40 m-t-20">
								<b>Totale</b> <small>(avec Tarif de Livraison)</small>:'.$cmds[0]->prix_totale.
								'DA
						</div>
					</div>
				
					<div class="col-md-6 col-lg-5 p-b-30 m-l-30" >
						<div class=" p-t-5 p-lr-0-lg" >
							
							<!--  -->
							<div class="p-t-19">
								<div class="p-b-50  p-l-40">
									<h2 class="mtext-105 cl13 p-l-50">
										Vos Informations
									</h2>
								</div>
								<div class="p-b-10">
									<table><tr>
										<td>
											<b>
												Numero Telephone :
											</b>
										</td>
										<td>
											<div class="size-219">
												<div class=" bg0 ">
													<div >'.$cmds[0]->numero_tlf.'</div>

												</div>
											</div>
										</td></tr>
										<tr>
											<td>
												<b>
													Email :
												</b>
											</td>
											<td>
												<div class="size-219 ">
													<div class=" bg0">
														<div >'.$cmds[0]->email.'</div>
													</div>
												</div>
											</td>
										</tr>

										<tr>
											<td><b>
												Ville :
												</b>
											</td>
											<td><div class="size-219 ">
												<div class=" bg0">
												<div >'.$cmds[0]->ville.'</div>
												</div>
												</div>
											</td>
										</tr>';
										if($cmds[0]->address !=null){

										$pdf .='<tr>
											<td>
											<b>
												Adrrsse :
											</b>
											</td>
											<td>
											<div class="size-219">
												<div class="bg0">
													<div >'.$cmds[0]->address.'</div>
												</div>
											</div>
											</td>
										</tr>';
									}
										if($cmds[0]->code_postale !=null){
											$pdf .= '<tr>
											<td>
											<b>
												code Postale :
											</b>
											</td>
											<td>
											<div class="size-219">
												<div class="bg0">
													<div >'.$cmds[0]->code_postale.'</div>
												</div>
											</div>
											</td>
										</tr>';
										}

										
									$pdf.='		
									</table>
								</div></div></div></div></div></div>
								<table style="float:right;margin-top:100px">
									<tr>
										<td>
											<img src="'. public_path('images/icons/favicon.png').'" alt="IMG" style="height: 50px;weight:50px">
										</td>
									</tr>
									<tr>
										<td>
										<img src="'. public_path('images/icons/signature.png').'" alt="IMG" style="height: 100px;weight:150px">
										</td>
									</tr>
								</table>

								
								</div>';
			}
			else if(Auth::user()->type_compte == 'v'){
			
				 $c = Vendeur::find(Auth::user()->id);
		     $cmds = \DB::table('commandes')
	        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
	        ->join('clients','clients.id', '=', 'commandes.client_id')
	        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
	        ->join('colors','colors.id', '=', 'commandes.couleur_id')
	        ->distinct('produits.id')
	        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile', 'commandes.email','commandes.address', 'commandes.code_postale', 'commandes.numero_tlf', 'commandes.*','clients.nom as Cnom','clients.prenom as Cprenom',\DB::raw('DATE(commandes.created_at) as date'))
	        ->where([['commandes.vendeur_id', $c->id],['commandes.id', $id],['imageproduits.profile',1]])
	        ->get();
	        $prix = \DB::table('commandes')
	        ->join('villes', 'villes.nom', '=', 'commandes.ville')
	        ->join('tarif_livraisons', 'tarif_livraisons.vendeur_id', '=', 'commandes.vendeur_id')
	        ->where([['commandes.vendeur_id', $c->id],['commandes.id', $id]])
	        ->distinct('ville')
	        ->select('tarif_livraisons.vendeur_id','ville','tarif_livraisons.prix')
	        ->get();
	        $prixx = 0;
	        foreach ($cmds as $key) {
	        	if($key->type_livraison == 'vc' && count($prix)!=0){
	        		$prixx += $key->prix_produit*$key->qte + $prix[0]->prix;
	        	}
	        	else{
	        		$prixx += $key->prix_produit*$key->qte;
	        	}
	        }
	        $tarif = \DB::table('commandes')
	        ->join('villes', 'villes.nom', '=', 'commandes.ville')
	        ->join('tarif_livraisons', 'tarif_livraisons.ville_id', '=', 'villes.id')
	        ->where([['commandes.vendeur_id', $c->id],['commandes.id', $id]])
	        ->distinct('ville')
	        ->select('tarif_livraisons.vendeur_id','ville','tarif_livraisons.prix')
	        ->get();
	        
		     $pdf = '<div class="container">
				<div class="bg0 p-t-55 p-b-100 p-lr-15-lg how-pos3-parent">
					<div class="p-b-30 p-l-40" style="display:inline-flex">
						<h1 class="ltext-102  cl2">
					           COMMANDE DE '.strtoupper ($cmds[0]->Cnom).' '.strtoupper ($cmds[0]->Cprenom).'

						</h1>
						<h3 class="ltext-102  cl2" style="float:right; padding-top:10px;">
				           '.$cmds[0]->date.'</h3>
					</div>

					<div class="row" >
						<div class="col-md-6 col-lg-6 m-r-40">
							<div class="p-l-60 p-lr-0-lg">
								<div class="wrap-slick3 flex-sb flex-w">
									<div class="p-t-20 p-b-20 p-l-50">
										<h2 class="mtext-105 cl13 p-l-70">
											Vos Produits
										</h2>
									</div>
									<div class="div1" >
									  <div>';
									    foreach ($cmds as $cmd ) {
									    
									    	$pdf .= '<table> 

									    	
									    	<tr><td>
													<div style="height: 80px">
														<img src="' . public_path('storage/produits_image/'.$cmd->image). '"alt="IMG" style="height: 50px;weight:50px"></div>
													</td>
												<td><div style="margin-top:-25px; margin-left:15px;">'.$cmd->qte.' x '.$cmd->prix_produit.' DA/
												</div></td>
												<td>
													<div style="margin-top:-25px;">';
														if($cmd->type_livraison == 'vc'){
															if(count($tarif) == 0){
																$pdf .='<div>Le vendeur effectuer la livraison/ 0 DA, </div>';
															}
															else{
																$pdf .='<div>Le vendeur effectuer la livraison/'.$tarif[0]->prix.' DA, </div>';
															}
															
														}
														else if($cmd->type_livraison == 'cv'){
															$pdf .= '<div>Vous apportez votre produit, </div>';
														}
														else{
															$pdf .='<div>DHL(Poste), </div>';
														}
														
						                            $pdf .='    
						                                	
													</div></td>
													<td >
														<div style="margin-top:-25px;">Couleur:'.$cmd->nom.'/</div></td>';
														if($cmd->taille != '0'){
															$pdf .='<td><div style="margin-top:-25px;"> Taille:'.$cmd->taille.'/</div></td>'; 
														}
													$pdf .='
														
													
												
											</tr></table>';
									    }	
									$pdf .='		
									  </div>
									</div>
								</div>
							</div>
							<div class="header-cart-total m-l-60 p-tb-40 m-t-20">
									<b>Totale</b> <small>(avec Tarif de Livraison)</small>:'.$prixx.
									'DA
							</div>
						</div>
					
						<div class="col-md-6 col-lg-5 p-b-30 m-l-30" >
							<div class=" p-t-5 p-lr-0-lg" >
								
								<!--  -->
								<div class="p-t-19">
									<div class="p-b-50  p-l-40">
										<h2 class="mtext-105 cl13 p-l-50">
											Vos Informations
										</h2>
									</div>
									<div class="p-b-10">
										<table><tr>
											<td>
												<b>
													Numero Telephone :
												</b>
											</td>
											<td>
												<div class="size-219">
													<div class=" bg0 ">
														<div >'.$cmds[0]->numero_tlf.'</div>

													</div>
												</div>
											</td></tr>
											<tr>
												<td>
													<b>
														Email :
													</b>
												</td>
												<td>
													<div class="size-219 ">
														<div class=" bg0">
															<div >'.$cmds[0]->email.'</div>
														</div>
													</div>
												</td>
											</tr>

											<tr>
												<td><b>
													Ville :
													</b>
												</td>
												<td><div class="size-219 ">
													<div class=" bg0">
													<div >'.$cmds[0]->ville.'</div>
													</div>
													</div>
												</td>
											</tr>';
											if($cmds[0]->address !=null){

											$pdf .='<tr>
												<td>
												<b>
													Adrrsse :
												</b>
												</td>
												<td>
												<div class="size-219">
													<div class="bg0">
														<div >'.$cmds[0]->address.'</div>
													</div>
												</div>
												</td>
											</tr>';
										}
											if($cmds[0]->code_postale !=null){
												$pdf .= '<tr>
												<td>
												<b>
													code Postale :
												</b>
												</td>
												<td>
												<div class="size-219">
													<div class="bg0">
														<div >'.$cmds[0]->code_postale.'</div>
													</div>
												</div>
												</td>
											</tr>';
											}

											
										$pdf.='		
										</table>
									</div></div></div></div></div></div>
									<table style="float:right;margin-top:100px">
										<tr>
											<td>
												<img src="'. public_path('images/icons/favicon.png').'" alt="IMG" style="height: 50px;weight:50px">
											</td>
										</tr>
										<tr>
											<td>
											<img src="'. public_path('images/icons/signature.png').'" alt="IMG" style="height: 100px;weight:150px">
											</td>
										</tr>
									</table>

									
									</div>';

			}

	     return $pdf;
    }
}
