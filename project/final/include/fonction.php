<?php

require_once('class.MySQL.php');

session_start();

function initSqlHDF()
{
	$mysql = new MySQL('cmt_hdf', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}

function initSqlASTI_NPDC()
{
	$mysql = new MySQL('clim_asti_npdc', 'asti_npdc', 'XkQalO1tNi8Lz8O0', '127.0.0.1');
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}
function initSqlASTI_PICARDIE()
{
	$mysql = new MySQL('clim_asti_picardie', 'asti_picardie', 'hNTtFipPGoCc7qV6', '127.0.0.1');
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}
function initSqlMobilier()
{
	$mysql = new MySQL('mobiliers_idf', 'root', 'MyMult1T3ch', '127.0.0.1');
	$mysql->ExecuteSQL("set names 'utf8'");
	return $mysql;
}
