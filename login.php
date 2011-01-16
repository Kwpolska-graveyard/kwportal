<?php
//KwPortal
//Copyright Kwpolska 2009-2011.
ob_start();
echo '<h1>KwPortal</h1>';
require_once './config.php';
require_once './init.php';
function umsSearch($uname, $plainPasswd) {
    global $users, $salt;
    $passwd = crypt($plainPasswd, $salt);
    foreach($users as $id => $user) {
        if(strtolower($user['uname']) == strtolower($uname) && $user['passwd'] == $passwd) return $id;
    }
    return false; // the script will return false if no user was found
} //end umsSearch();

if(!isset($_SESSION['uid'])) $_SESSION['uid'] = 0; //anonymous
if($_SESSION['uid'] > 0) {
    echo '<ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./add.php">Add</a></li>
        <li><a href="./logout.php">Logout</a></li>
        </ul>
        Welcome to KwPortal. Here are all of your posts:
        <ul><form action="del.php" method="POST">';
    try
    {
        $pdo = new PDO($dbdsn, $dbusr, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo -> query('SELECT * FROM `'.$dbtbl.'`');
        ob_start();
        foreach($stmt as $row)
        {
            $entry = $row['content'];
            echo "<li><button name=\"delete\" value=\"$entry\">DELETE</button> $entry</li>";
        }
        $stmt -> closeCursor();
    }
    catch(PDOException $e)
    {
        echo 'ERROR: ' . $e->getMessage();
    }

    die '</form></ul>';
}
//Nobody's logged in. Somebody must do so.

//Anybody logged in now?
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(($id = umsSearch($_POST['uname'], $_POST['passwd']) !== false) {
        //there is such user.
        $_SESSION['uid'] = $id;
        echo '<ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./add.php">Add</a></li>
            <li><a href="./logout.php">Logout</a></li>
            </ul>
            Welcome to KwPortal. Here are all of your posts:
            <ul><form action="del.php" method="POST">';
        try
        {
            $pdo = new PDO($dbdsn, $dbusr, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo -> query('SELECT * FROM `'.$dbtbl.'`');
            ob_start();
            foreach($stmt as $row)
            {
                $entry = $row['content'];
                echo "<li><button name=\"delete\" value=\"$entry\">DELETE</button> $entry</li>";
            }
            $stmt -> closeCursor();
        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' . $e->getMessage();
        }

        die '</form></ul>';

    } else {
        echo "<div class=\"error\">Wrong username or password.</div>";
    }
}
echo '<form method="post" action="?">Please log in.<br>
<input type="text" name="uname"> Username<br>
<input type="password" name="passwd"> Password (case-sensitive!)<br>
<input type="submit" value="Log in">
</form>';
?>
