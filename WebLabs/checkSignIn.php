
<?php

session_destroy();
session_unset();
session_start();
$_SESSION = array();

        $user = 'root';
        $pass = '';
        $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

        foreach ($dbh->query("select * from forum_user where login ='"  . $_POST['login'] . "' and password='" . $_POST['password']."'") as $row) {
            $_SESSION["name"]= $row['login'];
        }
        
        if(!empty($_SESSION["name"])){
            header("location:index.php");
        }else{
            header("location:sign_in.php");
            
        }
?>