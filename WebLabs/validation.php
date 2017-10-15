<?php
    session_destroy();
    session_unset();
    session_start();
    $_SESSION = array();
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    
    $_SESSION["tmp_login"]=$login;
    $_SESSION["tmp_password"]=$password;
    $_SESSION["tmp_mail"]=$mail;
    $_SESSION["tmp_phone"]=$phone;

    $warn="";
    
    if($login==""||$password==""||$mail==""||$phone==""){
        $warn = "Fill all fields";
    }
    
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

    foreach ($dbh->query("select * from forum_user where login ='"  . $login."'") as $row) {
        $warn ="Login is already exists";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $warn = "Email is not correct";
    }
    if(!preg_match("/^[0-9]{10}$/", $phone)){
        $warn="Invalid number";
    }
    
    if(strlen($password)<6){
        $warn="Password is too easy";
    }
    
    if($warn==""){
        
        $stmt = $dbh->prepare("insert into forum_user(login,password,mail,phone) values (:login, :password, :mail, :phone)");
        $stmt->bindParam(':login',$login);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':mail',$mail);
        $stmt->bindParam(':phone',$phone);
                
        $stmt->execute();
        
        $_SESSION["name"]= $login;
        header("location:index.php");        
    }else{
        $_SESSION["warn"]=$warn;
        header("location:sign_up.php");        
    }   
        
?>