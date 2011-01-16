<?php
//KwPortal
//Copyright Kwpolska 2010-2011.

/// KWPORTAL SETTINGS ///
$configured = false; //IMPORTANT: change it to true.
$markdown = true; //if you REALLY don't want to use Markdown and SmartyPants, use this.
/// USERS SETTINGS ///
$users = array(1 =>
   array('uname' => 'USERNAME', 'passwd' => 'A SHA512 PASSWORD'),
);
$saltbase = 'kwportalsawesome'; //salt base, up to 16 characters, longer ones will be trimmed

/// DATABASE SETTINGS ///
$dbusr = 'root'; // database user
$dbpwd = 'password'; // database password
$dbnme = 'db'; //database name
$dbtbl = 'kwportal'; //table name
$dbhst = 'localhost'; //host
$dbdsn = 'mysql:host='.$dbhst.';dbname='.$dbnme; // change mysql if needed

/// DYNAMIC SETTINGS ///
$salt = '$6$rounds=5000$'.$saltbase.'$';
function savant($template) {
	include_once 'Savant3.php';
	$tpl = new Savant3();
	$tpl->title = $title;
	$tpl->content = $content;
	$tpl->display($template.'.tpl.php');
}
?>
