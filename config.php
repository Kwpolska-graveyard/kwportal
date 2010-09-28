<?php
//KwPortal
//Copyright Kwpolska 2010. Licensed on GPLv3.
define('CONFIGURED', 'false'); //IMPORTANT: change it to true.
define('KP_USR', 'admin'); //kwportal admin user
define('KP_PWD', 'SHA1!'); //kwportal admin password. IMPORTANT: use sha1. (sha1.php)
//database:
define('DB_USR', 'root'); // database user
define('DB_PWD', 'password'); // database password
define('DB_NME', 'db'); //database name
define('DB_TNM', 'kwportal'); //table name
define('DB_HST', 'localhost'); //host
define('DB_DSN', 'mysql:host='.DB_HST.';dbname='.DB_NME); // change mysql if needed
//don't touch:
function savant($template) {
	include_once 'Savant3.php';
	$tpl = new Savant3();
	$tpl->title = $title;
	$tpl->content = $content;
	$tpl->display($template.'.tpl.php');
}
?>
