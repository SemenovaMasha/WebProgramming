<?php
    
session_start();
    $text = $_POST['text'];
    $question_id = $_POST['question_id'];
        
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);
    
    $today = date("Y-m-d"); 
	
    $stmt = $dbh->prepare("insert into comment(comment_text, question_id, user_id ,date) values (:text, :question_id,:user_id, :date)");
    $stmt->bindParam(':text',$text);
    $stmt->bindParam(':question_id',$question_id);
    $stmt->bindParam(':user_id',$_SESSION["user_id"]);
    $stmt->bindParam(':date',$today);

    $stmt->execute();
	echo $text;
	echo $question_id;
	echo $_SESSION["user_id"];
	echo $today;
    
	header("location:question.php?id=".$question_id);
    //header("location:index.php");           
?>