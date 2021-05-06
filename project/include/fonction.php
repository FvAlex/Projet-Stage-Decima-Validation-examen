<?php

require_once('class.MySQL.php');

session_start();

function initSqlHDF()
{
	$mysql = new MySQL('xxxx', 'xxxx', 'xxxx', 'xxxx');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}

function initSqlASTI_NPC()
{
	$mysql = new MySQL('xxxx', 'xxxx', 'xxxx', 'xxxx');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}
function initSqlASTI_PCD()
{
	$mysql = new MySQL('xxxx', 'xxxx', 'xxxx', 'xxxx');
	$mysql->executeSQL("set names 'utf8'");
	return $mysql;
}
function initSqlMBL()
{
	$mysql = new MySQL('xxxx', 'xxxx', 'xxxx', 'xxxx');
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