<?php
//KwPortal
//Copyright Kwpolska 2010.
require_once './config.php';
require_once './init.php';
echo '<h1>KwPortal</h1>
<ul>
<li><a href="./index.php">Home</a></li>
<li><a href="./add.php">Add</a></li>
<li><a href="./logout.php">Logout</a></li>
</ul>';
if($_POST['submit'] == "YES") {
   try
   {
      $pdo = new PDO($dbdsn, $dbusr, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $pdo -> prepare('DELETE FROM `'.$dbtbl.'` WHERE `title` = `:title`');	
      $stmt -> bindValue(':title', $_POST['delete'], PDO::PARAM_STR);
      $stmt -> execute();

   }
   catch(PDOException $e)
   {
      die 'ERROR: ' . $e->getMessage();
   }
   die("<div class=\"info\">The entry was successfully deleted.</div>");
} else {
   die("<div class\"error\">Not deleting the entry.</div>");
}
?>
