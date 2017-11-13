<?php

class Controller_Signup extends Controller
{

	function action_index($par)
	{	
		$this->view->generate('signup_view.php', 'template_view.php');
	}
        function action_validation($par){
//            session_destroy();
//            session_unset();
            session_start();
//            $_SESSION = array();
            
            print_r( $_FILES);
            $imageFileType = pathinfo( $_FILES["attach"]["name"],PATHINFO_EXTENSION);

            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

            $file_name=$_POST['login'].'.'.$imageFileType;
                    echo "$file_name";

            $target_dir = "profiles/";
            $uploadOk = 0;
            $target_file = $target_dir . $file_name;

            if(isset($_POST["submit"])) {
                    echo "kjhgjhg";
                if($_FILES['attach']['size'] != 0) {
                    echo "F";
                    $uploadOk = 1;
                } else {
                    echo "G";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["attach"]["size"] > 500000) {
                $uploadOk = 0;
            }
            $file = $_FILES["attach"]['tmp_name'];
            list($width, $height) = getimagesize($file);

            if($width!=330||$height!=330){
                 $uploadOk = 0;
                 echo 'wh';
            }
            
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["attach"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["attach"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }    

            $login = $_POST['login'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
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

                $stmt = $dbh->prepare("insert into forum_user(login,password,mail,phone".(($uploadOk==1)?",avatar":"").")"
                        . " values (:login, :password, :mail, :phone".(($uploadOk==1)?(", '".$file_name."'"):"").")");
                $stmt->bindParam(':login',$login);
                $stmt->bindParam(':password',$password);
                $stmt->bindParam(':mail',$mail);
                $stmt->bindParam(':phone',$phone);

                $stmt->execute();

                $_SESSION["name"]= $login;
                $_SESSION["user_id"]=$dbh->lastInsertId();
                header("location:main");        
            }else{
                $_SESSION["warn"]=$warn;
                header("location:signup");        
            }   
        }
}