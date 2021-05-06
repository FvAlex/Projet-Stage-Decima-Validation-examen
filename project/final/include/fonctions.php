<?php

session_start();

header('Content-type: text/html; charset=utf-8');

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors',1);

define('main_folder','/var/www/html/hdf/');
define('gmailpicardie','cmtpicardie@gmail.com');
define('gmail','testcvclille@gmail.com');
define('analytics_id', 'UA-77245697-2'); // CVCLILLE = UA-77245697-1; PICARDIE = UA-77245697-2; PSE = UA-77245697-3
	
require_once('class.MySQL.php');

//fonction retournant l'objet mysql connecte a la BD
function initSql()
{
	$mysql = new MySQL('cmt_hdf', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}

function initSql_test()
{
	$mysql = new MySQL('cmt_hdf_tmp', 'root', 'MyMult1T3ch', '127.0.0.1' );
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}

function initSql_commande()
{
	$mysql = new MySQL('commande', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}



// Convert array to utf8
function to_utf8($array) {
	$json = array();
	foreach($array as $i=>$ligne)
	{
		foreach($ligne as $index=>$l)
		{
			$json[$i][$index] = utf8_encode($l);
		}
	}
	return $json;
}

function stripAccents($string) {
	return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ#','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY+');
}

function normalize ($string) {
    $table = array(
		'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', '¢' => '', '<' => '', '>' => '', '%' => '', '$' => '', '£' => '', '"' => '', '+' => '_', '`' => '', ':' => '', '(' => '', ')' => '', '-' => '', '\'' => ' ', '&' => '', '°' => '','/' => '','\\' => '', '{' => '', '}' => ''
    );
    
    return strtr($string,$table);
}

function strip_accents($string)
{
	$search = array(
		'Š', 'š', 'Ð', 'Ž', 'ž', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ý', 'ý', 'þ', 'ÿ', '¢');
		
	$replace = array(
		'S', 's', 'Dj', 'Z', 'z', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'B', 'Ss', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'y', 'b', 'y', '');
		
	
	return str_replace($search,$replace,$string);
}

// permet d'afficher une boite de dialogue avec un message
function msgbox($message) {
	echo '<script type="text/javascript">alert("'.$message.'");</script>';
}


function redir($url) {
	echo '<script type="text/javascript">window.location.href = "'.html_entity_decode($url).'";</script>';
}

// Mois en français selon numéro
function mois_fr($mois)
{
	$tab = array(1 => 'Janvier',2 => 'Février',3 => 'Mars',4 => 'Avril',5 => 'Mai',6 => 'Juin',7 => 'Juillet',8 => 'Août',9 => 'Septembre',10 => 'Octobre',11 => 'Novembre',12 => 'Décembre');	
	return $tab[$mois];
}

// Retourne la taille d'un fichier en Mo
function taille_fichier($fichier) {	
	$taille = round((filesize($fichier)/1024)/1024,2).' Mo';	
	return $taille;
}

// Mois en français selon mois us
function mois_entier_fr($string)
{
	return str_replace(array('January','February','March','April','May','June','July','August','September','October','November','December'),array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'),$string);	
}

// Fonction permettant de verifier si l'identification est correcte, renvoi les droits de l'utilisateur ou -1 s'il y a une erreur
function verifLogin($name,$mdp)
{
	if($name != null)
	{	
		$mysql = initSql();		
		$result = $mysql->ExecuteSQL('SELECT login,mdp,id_droit,actif FROM utilisateur WHERE login = "'.$name.'" and actif=1');
		
		if($result !== false && $result[0]['mdp'] == $mdp) {
			return 1;
		}
	}
	
	return -1;
}

//fonction permettant d'envoyer un mail depuis la boite mail du projet
function sendMail($to,$object,$message)
{
	//mettre ici l'adresse mail du projet
	$headers = "From: multitech-nord@decima.fr\n";
	$headers.= "Content-type: text/html; charset=utf8\n";
	
	mail($to,$object,$message,$headers);
}

//fonction permettant de créer un nouveau mdp a un utilisateur et de lui envoyer.
function setMDP($id_utilisateur)
{
	$mysql = initSql();
	$mdp = genMDP();	// génération aléatoire du mot de passe
	
	// MAJ Mot de passe dans la table utilisateur
	$mysql->ExecuteSQL('UPDATE utilisateur SET mdp= "'.md5($mdp).'" WHERE id_utilisateur = "'.$id_utilisateur.'"');
	
	$result = $mysql->ExecuteSQL('SELECT mail,login FROM utilisateur WHERE id_utilisateur = "'.$id_utilisateur.'"');	
	sendMail($result[0]['mail'],'Site CVC - Votre mot de passe','Bonjour, votre nouveau mot de passe pour le compte '.$result[0]['login'].' est le suivant : '.$mdp);	
}

// Fonction permettant de créer un mot de passe aléatoire (8 caractères, chiffres+lettres+maj+min)
function genMDP()
{
	$tpass = array();
	$id = 0;
	$taille = 8;
	$passwd = null;
	
	for($i=48;$i<58;$i++) {
		$tpass[$id++]=chr($i);
	}
	for($i=65;$i<91;$i++) {
		$tpass[$id++]=chr($i);
	}
	for($i=97;$i<123;$i++) {
		$tpass[$id++]=chr($i);
	}
		
	for($i=0;$i<$taille;$i++) {
		$passwd.=$tpass[rand(0,$id-1)];
	}
	
	return $passwd;
}

//permet d'ecrire les logs dans la base de données
function setlog($login,$libelle)
{
	$mysql = initSql();
	$login = explode('(',$login);
	$login = str_replace(' ','',$login[0]);
	$result = $mysql->ExecuteSQL('SELECT id_utilisateur,login FROM utilisateur WHERE login = "'.$login.'"');
	$message = 'L\'utilisateur '.strtoupper($result[0]['login']).' ('.$result[0]['id_utilisateur'].') a '.$libelle;
	
	$mysql->ExecuteSQL('INSERT INTO log VALUES ("","'.time().'","'.$result[0]['id_utilisateur'].'","'.$message.'")');
}

function ut_by_bat($id_bat) {
	$mysql = initSql();	
	$ut = $mysql->ExecuteSQL('SELECT code_ut,region,nom_ut,type_ut FROM ut WHERE code_ut IN (SELECT code_ut FROM batiment WHERE id_batiment = "'.$id_bat.'")');	
	return $ut;
}

function bat_by_id($id_bat) {
	$mysql = initSql();	
	$bat = $mysql->ExecuteSQL('SELECT num_bat,nom_usuel FROM batiment WHERE id_batiment = "'.$id_bat.'"');	
	return $bat;
}

function presence_amiante($int) {
	$txt = array(0 => 'NON', 1 => 'OUI', 2 => 'NE SAIT PAS');	
	return $txt[$int];
}

function etat_equipement($int) {
	$txt = array(0 => 'Non visité', 1 => 'Non concerné', 2 => 'Insuffisant', 3 => 'Moyen', 4 => 'Acceptable', 5 => 'Satisfaisant');	
	return $txt[$int];
}

function nom_equipement($id) {
	$mysql = initSql();	
	$req = $mysql->ExecuteSQL('SELECT libelle FROM equipement WHERE id_equipement = "'.$id.'"');	
	return $req[0]['libelle'];
}

?>