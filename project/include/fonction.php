<?php

require_once('class.MySQL.php');

session_start();

function initSqlHDF()
{
	$mysql = new MySQL('cmt_hdf', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}

function initSqlASTI_NPC()
{
	$mysql = new MySQL('clim_asti_npdc', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}
function initSqlASTI_PCD()
{
	$mysql = new MySQL('clim_asti_picardie', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}
function initSqlMBL()
{
	$mysql = new MySQL('mobiliers_idf', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}

// Récupération du paramètre database renvoyé dans test-pre.php

function GetContrat($mysql_Group_BDD){
	switch($mysql_Group_BDD){

		case "cmt_hdf":
			return "HDF";
			break;

		case "clim_asti_npdc":
			return "NPDC";
			break;

		case "clim_asti_picardie":
			return "PCD";
			break;

		case "mobiliers_idf":
			return "MBL";
			break;
	}
}

////////////////////