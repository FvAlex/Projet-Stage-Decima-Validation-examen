<?php

require_once('../include/fonction.php');
 
$fonction = $_GET['fonction'];

switch($fonction) {

	
	case 'complete_devis' :
		complete_devis($_GET['date_reception'],$_GET['date_facture'],$_GET['date_commande'],$_GET['litige'],$_GET['date_facturation_st'],$_GET['date_facturation_4'],$_GET['numero_facture_st'],$_GET['numero_facturation_decima'],$_GET['reference_devis_st'],$_GET['montant_devis_st'],$_GET['num_commande'],$_GET['etat'],$_GET['id_devis']);
		break;
		
	case 'date_travaux' :
		change_date_travaux($_GET['date'],$_GET['id_devis']);
		break;
}

function complete_devis($date_reception_pv,$date_facture_decima,$date_commande,$litige,$date_facturation_st,$date_facturation_4,$numero_facture_st,$numero_facturation_decima,$reference_devis_st,$prix_devis_st,$num_commande,$postEtat,$postDevis)
{
	$mysql = initSqlHDF();
	$date = time();

	$result = $mysql->ExecuteSQL('UPDATE devis SET date_reception="'.strtotime($date_reception_pv).'", date_facture="'.strtotime($date_facture_decima).'", date_commande="'.strtotime($date_commande).'", litige="'.$litige.'", date_facturation_st="'.strtotime($date_facturation_st).'", date_facturation_4="'.strtotime($date_facturation_4).'", numero_facture_st="'.$numero_facture_st.'", numero_facturation_decima="'.$numero_facturation_decima.'", reference_devis_sous_traitant="'.$reference_devis_st.'", prix_devis_sous_traitant="'.$prix_devis_st.'", num_commande="'.$num_commande.'", etat_devis="'.$postEtat.'" WHERE id_devis="'.$postDevis.'"');
 
	echo json_encode($result);
}
?>