<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="./style.css">
<title><?php echo $this->eprint($this->$title) ?></title>
<!-- KwPortal
Copyright Kwpolska 2010. Licensed on GPLv3. -->
<h1>{$title}</h1>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="add.php">Add</a></li>
	<li><a href="delete.php">Delete</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
<?php echo $this->eprint($this->$content) ?>
<div id="footer">
KwPortal - Copyright Kwpolska 2010. Licensed on GPLv3. Using <a href="http://phpsavant.com">Savant</a>. <!--don't edit it, put your copyright notice above-->
</div>
