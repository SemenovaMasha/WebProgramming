<?php
    
session_start();
    $title = $_POST['title'];
    $text = $_POST['text'];
    $tags = $_POST['tags'];
        
    $imageFileType = pathinfo( $_FILES["attach"]["name"],PATHINFO_EXTENSION);
    
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);
    
    $r = $dbh->prepare('SELECT max(id) FROM question ');
    $r->execute();
    while ($row = $r->fetch(PDO::FETCH_LAZY))
    {
        $question_n=$row[0]+1;
        $question_n=$question_n.'.'.$imageFileType;
        echo $question_n;
    }
    
    $target_dir = "attachments/";
    $uploadOk = 0;
    $target_file = $target_dir . $question_n;
    
//    if(isset($_FILES["attach"]["name"])) {
//        echo $_FILES["attach"]["name"];
//        $uploadOk = 1;
//    } else {
//        $uploadOk = 0;
//    }
    
    if(isset($_POST["submit"])) {
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
//    if($imageFileType != "jpg"  ) {
//        $uploadOk = 0;
//    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["attach"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["attach"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }    
    $today = date("Y-m-d"); 
    
    $stmt = $dbh->prepare("insert into question(name, question_text, user_id ".(($uploadOk==1)?",attach":"").", tags, date) values (:name, :text,:user_id".(($uploadOk==1)?(", '".$question_n."'"):"").", :tags, :date)");
    $stmt->bindParam(':name',$title);
    $stmt->bindParam(':text',$text);
    $stmt->bindParam(':user_id',$_SESSION["user_id"]);
//    if($uploadOk==1){
//        $stmt->bindParam(':attach',$question_n);
//    }else{
//        $stmt->bindParam(':attach', PDO::PARAM_NULL);
//    }
    $stmt->bindParam(':tags',$tags);
    $stmt->bindParam(':date',$today);

    $stmt->execute();
    
    echo (($uploadOk==1)?$question_n:'NULL');
    echo "insert into question(name, question_text, user_id, attach, tags, date) values (:name, :text,:user_id, '".(($uploadOk==1)?$question_n:'NULL')."', :tags, :date)";
    
    header("location:index.php");           
?>