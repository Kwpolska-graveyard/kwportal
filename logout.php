<?php
//KwPortal
//Copyright Kwpolska 2009-2011.
require_once './config.php';
require_once './init.php';
session_start();
session_destroy();
session_unset();
echo "See you again!";
?>
