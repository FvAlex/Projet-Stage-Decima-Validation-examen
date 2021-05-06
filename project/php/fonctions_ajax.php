<?php

require_once('../include/fonction.php');

$fonctionModal = $_GET['fonction_modal'];

switch($fonctionModal) {
	case 'complete_devis_modal' :
		complete_devis_modal($_GET['database'],$_GET['date_reception'],$_GET['date_facture'],$_GET['date_commande'],$_GET['litige'],$_GET['date_facturation_st'],$_GET['date_facturation_4'],$_GET['numero_facture_st'],$_GET['numero_facturation_decima'],$_GET['reference_devis_st'],$_GET['montant_devis_st'],$_GET['num_commande'],$_GET['id_devis']);
		break;
}

function complete_devis_modal($database,$date_reception_pv,$date_facture_decima,$date_commande,$litige,$date_facturation_st,$date_facturation_4,$numero_facture_st,$numero_facturation_decima,$reference_devis_st,$prix_devis_st,$num_commande,$postDevis)
{	
	switch($database){

		case "cmt_hdf":
			$mysql_UPDATE_modal = initSqlHDF();
			break;

		case "clim_asti_npdc":
			$mysql_UPDATE_modal = initSqlASTI_NPC();
			break;

		case "clim_asti_picardie":
			$mysql_UPDATE_modal = initSqlASTI_PCD();
			break;

		case "mobiliers_idf":
			$mysql_UPDATE_modal = initSqlMBL();
			break;
	}

	// Traduction de date d'anglais à francais

	$tmp = explode("/",$date_reception_pv);
	$date_reception_pv = $tmp[1]."/".$tmp[0]."/".$tmp[2];

	$tmp2 = explode("/",$date_facture_decima);
	$date_facture_decima = $tmp2[1]."/".$tmp2[0]."/".$tmp2[2];

	$tmp3 = explode("/",$date_commande);
	$date_commande = $tmp3[1]."/".$tmp3[0]."/".$tmp3[2];

	$tmp4 = explode("/",$date_facturation_st);
	$date_facturation_st = $tmp4[1]."/".$tmp4[0]."/".$tmp4[2];

	$tmp5 = explode("/",$date_facturation_4);
	$date_facturation_4 = $tmp5[1]."/".$tmp5[0]."/".$tmp5[2];

	////////////////////

	$resultsmodal = $mysql_UPDATE_modal ->executeSQL('UPDATE devis SET date_reception="'.strtotime($date_reception_pv).'", date_facture="'.strtotime($date_facture_decima).'", date_commande="'.strtotime($date_commande).'", litige="'.$litige.'", date_facturation_st="'.strtotime($date_facturation_st).'", date_facturation_4="'.strtotime($date_facturation_4).'", numero_facture_st="'.$numero_facture_st.'", numero_facturation_decima="'.$numero_facturation_decima.'", reference_devis_sous_traitant="'.$reference_devis_st.'", prix_devis_sous_traitant="'.$prix_devis_st.'", num_commande="'.$num_commande.'" WHERE id_devis="'.$postDevis.'"');

	echo json_encode($resultsmodal);
}


$fonction = $_GET['fonction'];

switch($fonction) {
	case 'complete_devis' :
		complete_devis($_GET['database'],$_GET['date_reception'],$_GET['date_facture'],$_GET['date_commande'],$_GET['date_facturation_st'],$_GET['date_facturation_4'],$_GET['etat'],$_GET['id_devis']);
		break;
}

function complete_devis($database,$date_reception_pv,$date_facture_decima,$date_commande,$date_facturation_st,$date_facturation_4,$postEtat,$postDevis)
{	
	switch($database){

		case "cmt_hdf":
			$mysql_UPDATE = initSqlHDF();
			break;

		case "clim_asti_npdc":
			$mysql_UPDATE = initSqlASTI_NPC();
			break;

		case "clim_asti_picardie":
			$mysql_UPDATE = initSqlASTI_PCD();
			break;

		case "mobiliers_idf":
			$mysql_UPDATE = initSqlMBL();
			break;
	}
	
	// Traduction de date d'anglais à francais

	$tmp = explode("/",$date_reception_pv);
	$date_reception_pv = $tmp[1]."/".$tmp[0]."/".$tmp[2];

	$tmp2 = explode("/",$date_facture_decima);
	$date_facture_decima = $tmp2[1]."/".$tmp2[0]."/".$tmp2[2];

	$tmp3 = explode("/",$date_commande);
	$date_commande = $tmp3[1]."/".$tmp3[0]."/".$tmp3[2];

	$tmp4 = explode("/",$date_facturation_st);
	$date_facturation_st = $tmp4[1]."/".$tmp4[0]."/".$tmp4[2];

	$tmp5 = explode("/",$date_facturation_4);
	$date_facturation_4 = $tmp5[1]."/".$tmp5[0]."/".$tmp5[2];

	////////////////////

	$results = $mysql_UPDATE ->executeSQL('UPDATE devis SET date_reception="'.strtotime($date_reception_pv).'", date_facture="'.strtotime($date_facture_decima).'", date_commande="'.strtotime($date_commande).'", date_facturation_st="'.strtotime($date_facturation_st).'", date_facturation_4="'.strtotime($date_facturation_4).'",etat_devis="'.$postEtat.'" WHERE id_devis="'.$postDevis.'"');

	echo json_encode($results);
}
?>
