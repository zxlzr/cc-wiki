<?php
//This file is to set or update the sns account and SMW account mapping, in renren
session_start();
include '../conf.php';
$mw=$_REQUEST['mw'];
$access_token=$_REQUEST['access_token'];
$link=mysql_connect($ccDB,$ccDBUsername,$ccDBPassword);
if(!$link) echo "failed";
mysql_select_db($ccDBName,$link);
$sql="select * from ".$cc_account." where mw='$mw'";
$result=mysql_query($sql,$link);
$firstline=mysql_fetch_array($result);
$exist=$firstline['mw'];
//if the mapping of smw account already exists
if(!empty($exist)){
	mysql_select_db($ccDBName,$link);
	$sql="select sns from ".$cc_account." where mw='$mw'";
	$result=mysql_query($sql,$link);
	$firstline=mysql_fetch_array($result);
	$sns=$firstline['sns'];
	$sns=explode(',', $sns);
	$sns[0]=$access_token;
	$update=$access_token.",".$sns[1].",".$sns[2].",".$sns[3];
	mysql_select_db($ccDBName,$link);
	//echo $update;
	$sql="update ".$cc_account." set sns="."'$update'"." where mw='$mw'";
	$result=mysql_query($sql,$link);
}
//if the mapping of smw account does not esist
else{
	mysql_select_db($ccDBName,$link);
	$sql="insert ".$cc_account." values('$mw','$access_token,,,')";
	$result=mysql_query($sql,$link);
	$firstline=mysql_fetch_array($result);
	
}