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
if(isset($_POST['submit'])) {
    if($_POST['submit'] == "YES") {
        try
        {
            $pdo = new PDO($dbdsn, $dbusr, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo -> prepare('DELETE FROM `'.$dbtbl.'` WHERE `title` = `:title`');	

            $stmt -> bindValue(':title', $_POST['title'], PDO::PARAM_STR);

            $ilosc = $stmt -> execute();

            if($ilosc = 1)
            {
                echo 'Roger that.';
            }
            else
            {
                echo 'wut?';
            }
        }
        catch(PDOException $e)
        {
            die 'ERROR: ' . $e->getMessage();
        }

        die("<div class=\"info\">The entry was successfully deleted.</div>");
    } else {
        die("<div class\"error\">Not deleting the entry.</div>");
    }
}
echo 'Are you sure you want to delete the entry <strong>'.$_POST['delete'].'</strong>?
<form action="?" method="POST"><input type="submit" name="submit" value="YES"> <input type="submit" name="submit" value="NO"> <input type="hidden" name="delete" value="'.$_POST['delete'].'"></form>';
?>
