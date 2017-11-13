<?php
class Model_Users extends Model
{
	public function get_data()
	{	
            $data=array();
            session_start();
            
            $hello;
            $name = "Guest";
            if (!empty($_SESSION)&&!empty($_SESSION["name"])){
                $hello="Sign Out";
                $name  =$_SESSION["name"];
            }else {
                $hello="Sign In";
            }
            $name='Hello, '.$name.'!';
            
            $data['name']=$name;
            $data['hello']=$hello;
            
            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

            $r = $dbh->prepare('SELECT login, avatar from forum_user');
            $r->execute();
            
            while ($row = $r->fetch(PDO::FETCH_LAZY))
            {
                if($row["avatar"]=== NULL){
                    $avatar='unauthorized.png';
                }
                else{
                    $avatar=$row["avatar"];
                }
                $data['users'][]=array(
                    'login'=>$row["login"],
                    'avatar'=>$avatar
                );
            }
                     
            return $data;
	}
}