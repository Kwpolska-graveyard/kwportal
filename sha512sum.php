<?php
//sha512sum
//By Kwpolska. On PD.
require_once './config.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') echo crypt($_POST['passwd'], $salt).'<br>';
echo '<form method="post" action="?"><input type="password" name="passwd"> <input type="submit" value="Generate"></form>';
?>
