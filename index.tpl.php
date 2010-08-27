<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="Stylesheet" type="text/css" href="./style.css">
<title><?php echo $this->eprint($this->$title) ?></title>
<!-- KwPortal
Copyright Kwpolska 2010. Licensed on GPLv3. -->
<h1><?php echo $this->eprint($this->$title) ?></h1>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="login.php">Admin</a></li>
</ul>
<?php echo $this->eprint($this->$content) ?>
<div id="footer">
KwPortal - Copyright Kwpolska 2010. Licensed on GPLv3. Using <a href="http://phpsavant.com">Savant</a>. <!--don't edit it, put your copyright notice above-->
</div>
