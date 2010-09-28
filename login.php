<?php
//KwPortal
//Copyright Kwpolska 2009-2010. Licensed on GPLv3.
include_once './config.php';
ob_start(); 
$uzytkownicy = array(1 =>
		array('login' => KP_USR, 'haslo' => KP_PWD));

function czyIstnieje($login, $haslo)
{
	global $uzytkownicy;

	$haslo = sha1($haslo);

	foreach($uzytkownicy as $id => $dane)
	{
		if($dane['login'] == $login && $dane['haslo'] == $haslo)
		{
			// O, jest ktos taki - zwroc jego ID
			return $id;
		}
	}
	// Jeżeli doszedłeś a tutaj, to takiego użytkownika nie ma
	return false;
} // end czyIstnieje();
function pokazNicka($uid) 
{
	global $uzytkownicy;
	foreach($uzytkownicy as $id => $dane)
	{
		if($uid == $id)
		{
			// O, jest ktos taki - zwroc jego login
			return $dane['login'];
		}
	}
	// Jeżeli doszedłeś a tutaj, to takiego użytkownika nie ma
	return false;
} // end pokazNicka();
// Wlasciwy skrypt

session_start();

if (!isset($_SESSION['inicjuj']))
{
	session_regenerate_id();
	$_SESSION['inicjuj'] = true;
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
}


if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
{
	die('Wrong IP!');	
}


if(!isset($_SESSION['uzytkownik']))
{
	// Sesja się zaczyna, wiec inicjujemy użytkownika anonimowego
	$_SESSION['uzytkownik'] = 0;
}
if($_SESSION['uzytkownik'] > 0)
{
	// Ktos jest zalogowany
	header('Location: ./admin.php');
}
else
{
	// Niezalogowany
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(($id = czyIstnieje($_POST['login'], $_POST['haslo'])) !== false)
		{

			// Logujemy uzytkownika, wpisal poprawne dane
			$_SESSION['uzytkownik'] = $id;
			$_SESSION['uname'] = pokazNicka($id);
			$_SESSION['isadmin'] = true;
			header('Location: ./admin.php');
		}
		else
		{
			$c .= 'Wrong.';
		}		
	}
	else
	{
		$_SESSION['uname'] = 'nobody';
		$c .= '<form action="?" method="post">
			<fieldset>
			<input id="login" name="login" />
			<input id="haslo" type="password" name="haslo" />
			<input id="send" name="send" value="Submit" type="submit" />
			</fieldset></form>'; } }

			$title = 'Login';
			savant('admin');
			ob_end_flush();
			?>
