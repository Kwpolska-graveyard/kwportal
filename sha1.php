<form action="" method="post"><input type="password" name="h"> <input type="submit" value="="> <?php if (count($_POST) == 1) echo sha1($_POST['h']); ?></form>
