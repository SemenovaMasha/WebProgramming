<?php

class Controller_Signin extends Controller
{

	function action_index($par)
	{	
		$this->view->generate('signin_view.php', 'template_view.php');
	}
        function action_check($par){
            session_destroy();
            session_unset();
            session_start();
            $_SESSION = array();

            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

            foreach ($dbh->query("select * from forum_user where login ='"  . $_POST['login'] ."'") as $row) {
                if(password_verify( $_POST['password'], $row['password'])){                    
                    $_SESSION["name"]= $row['login'];
                    $_SESSION["user_id"]= $row['id'];
                }
            }

            if(!empty($_SESSION["name"])){
                header("location:main");
            }else{
                header("location:signin");
            }
        }
}