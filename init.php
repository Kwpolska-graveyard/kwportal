<?php
//KwPortal
//Copyright Kwpolska 2010.
session_start(); //Start the session
if (!isset($_SESSION['init'])) {
   session_regenerate_id(); //Regenerate the session ID
   $_SESSION['init'] = true; //Remember that the session was initialized 
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
   // last request was more than 30 minates ago
   session_destroy();   // destroy session data in storage
   session_unset();     // unset $_SESSION variable for the runtime
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
