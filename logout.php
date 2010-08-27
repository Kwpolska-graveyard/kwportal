<?php
//KwPortal 3.0 Renoir
//Copyright Kwpolska 2009-2010.
session_start();
session_destroy();
header('Location: index.php');
ob_end_flush();
?>
