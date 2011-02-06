<?php
//KwPortal
//Copyright Kwpolska 2010-2011.
include_once './config.php';
$title = "News"; //title
//this file is different. It's for news.
try
{
   $pdo = new PDO($dbdsn, $dbusr $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $pdo -> query('SELECT * FROM `'.$dbtbl.'`');
   ob_start();
   foreach($stmt as $row)
   {
      echo '<div class="art"><h2>'.$row['title'].'</h2><i>'.date("d-m-Y H:m:s"), $row['timestamp']).'</i><br>'.$row['content'].'</div>';
   }
   $content = ob_end_flush();
   $stmt -> closeCursor();
}
catch(PDOException $e)
{
   echo 'ERROR: ' . $e->getMessage();
}
savant('index');
?>
