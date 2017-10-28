<?php
class Model_Questioin extends Model
{
	public function get_data($id)
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

            $r = $dbh->prepare('SELECT question.id,name,question_text,attach,tags,date,login FROM question,forum_user where question.user_id=forum_user.id and question.id='.$id);
            $r->execute();

            while ($row = $r->fetch(PDO::FETCH_LAZY))
            {
                $data['q_id']=$row["id"];
                $data['title']=$row["name"];
                $data['text']=$row["question_text"];
                $data['login']=$row["login"];
                $data['attach']=$row["attach"];
                $data['tags']=$row["tags"];
                $data['date']=$row["date"];
            }
            $r = $dbh->prepare('SELECT comment_text,date,login FROM comment,forum_user where comment.user_id=forum_user.id and question_id='.$data['q_id']." order by comment.id desc");
            $r->execute();

            $data['comments']=array();
            while ($row = $r->fetch(PDO::FETCH_LAZY))
            {
                $data['comments'][]=array(
                    'text'=>$row["comment_text"],
                    'login'=>$row["login"],
                    'date'=>$row["date"],
                );
            }
                     
            return $data;
	}
}