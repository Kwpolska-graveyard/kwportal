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
if($_SERVER['REQUEST_METHOD'] == 'POST') {
   if($markdown = true) {
      include_once './smartypants.php';
      include_once './markdown.php';
      $pcontent = SmartyPants(Markdown($_POST['cnt']));
   }
   try
   {
      $pdo = new PDO($dbdsn, $dbusr, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo -> prepare('INSERT INTO `'.$dbtbl.'` (`content`, `title`, `timestamp`) VALUES(
               :content,
               :title,
               :timestamp)');	// 1

      $stmt -> bindValue(':title', $_POST['title'], PDO::PARAM_STR);
      $stmt -> bindValue(':timestamp', time(), PDO::PARAM_STR);
      $stmt -> bindValue(':content', $pcontent, PDO::PARAM_STR);

      $ilosc = $stmt -> execute();

      if($ilosc = 1)
      {
         die("<div class=\"info\">The entry was successfully deleted.</div>");
      }
      else
      {
         echo 'There was an issue with adding the entry.';
      }
   }
   catch(PDOException $e)
   {
      die 'ERROR: ' . $e->getMessage();
   }
}
echo '<form method="POST" action="?">
Title: <input name="title"><br>
<textarea style="font-family: monospace;" rows="24" cols="80" name="cnt"></textarea><br>
<input type="submit" value="Create">
<em>You can use PHP Markdown Extra syntax. PHP SmartyPants are also used.</em><br>
</form>';
?>
