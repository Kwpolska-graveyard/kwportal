<?php
//KwPortal
//Copyright Kwpolska 2009-2010. Licensed on GPLv3.
session_start();
include_once './testpriv.php';
include_once './config.php';
$content = "Welcome to KwPortal's Admin Panel.<br />You are using KwPortal. You are logged in as <i>".$_SESSION['uname'].'</i>.';
$title = 'Home';
savant('admin');
?>
