<?php ob_start();
if ($_SESSION['isadmin'] != true) header('Location: ./index.php');
ob_end_flush();
?>
