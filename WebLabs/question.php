<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href ="styles/question.css"></link>
    </head>
    <body>
               
        <div id="container">
          <div id="sitetitle">
              <h1><a href="index.php">Forum</a></h1>
            <h2>Programming forum</h2>
          </div>

          <div id="menu"> 
              
              <a href="new_question.php"> Ask </a> 
              <a href="index.php">Questions</a> 
            <a href="#">Rules</a> 
            <a href="#">Tags</a> 
            <a href="#">Users</a> 
            <a href="#">Search</a> 
            
            <a href="sign_in.php">
                 <?php
                     session_start();
                     if (!empty($_SESSION)&&!empty($_SESSION["name"])){
                         echo "Sign Out";
                     }else {
                         echo "Sign In";
                     }
                 ?>
            </a> 
          </div>
          <div id="content">  
              <div id="hello">
                <?php
//                     session_start();
                         echo "Hello, ";
                         $name = "Guest";
                            if (!empty($_SESSION)){
                                if (!empty($_SESSION["name"])){
                                    $name  =$_SESSION["name"];
                                }
                            }
                         echo $name;
                           
                         echo "!";
                 ?>
            </div>
            <div id="left">

              <div class="entry">
                  
                  <?php
                    $user = 'root';
                    $pass = '';
                    $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

                    $r = $dbh->prepare('SELECT name,question_text,attach,tags,date,login FROM question,forum_user where question.user_id=forum_user.id and question.id='.$_GET["id"]);
                    $r->execute();
                    while ($row = $r->fetch(PDO::FETCH_LAZY))
                    {
                        $title=$row["name"];
                        $text=$row["question_text"];
                        $login=$row["login"];
                        $attach=$row["attach"];
                        $tags=$row["tags"];
                        $date=$row["date"];
                    }
                    
                    echo "<h2>".$title."</h2>";
                    echo "<p>".$text."</p>";
                    if($attach=== NULL){}
                    else{
                        echo "<p class=\"attach\"><a href=\"attachments/".$attach."\" download >".$title."</a></p>";
                    }
                    echo "<p class=\"meta\"><span class=\"date\">". date("F j, Y",strtotime( $date))."</span> Posted by ".$login." | Tags: ".$tags."</p>";
                    
                    
                  ?>
                  
                  
<!--                <h2><a href="#">Generating Random string</a></h2>
                <p>Can anyone tell me how can I generate a random string containing only letters in c#? I basically want a Random value and fill it in my form. I want this value to contain letters only? How can I do this?</p>
                <p class="attach"><a href="attachments/2.png" download="Generating Random string"> Attachment</a></p>-->
                <!--<p class="meta"><span class="date">September 24, 2017</span> Posted by Masha | Tags: C#, String, Random</p>-->
              </div>

            </div>
            <div id="right">
              <h2>Wait, what's this?</h2>
              <p class="intro">Welcome to the Forum!</p>
              <div class="subcontainer">
                <div class="rightsub">
                  <h2>Popular tags</h2>
                  <a class="link" href="#">C#</a><br class="hide" />
                  <a class="link" href="#">Java</a><br class="hide" />
                  <a class="link" href="#">Web</a><br class="hide" />
                  <a class="link" href="#">JavaScript</a><br class="hide" />
                  <a class="link" href="#">Android</a><br class="hide" />
                  <a class="link" href="#">Sql</a><br class="hide" />
                </div>
                <div class="rightsub2">
                  <h2>Latest entries</h2>
                  <a class="link" href="#">Generating Random string</a><br class="hide" />
                  <a class="link" href="#">C# loop numbers</a><br class="hide" />
                  <a class="link" href="#">Is there a c# api for video editing?</a><br class="hide" />
                </div>
              </div>
            </div>
            <div id="footer">
              <h2 class="hide">Site info</h2>
              <span>Forum</span><br />
              &copy; 2017 Masha Semenova   </div>
          </div>
        </div>

    </body>
</html>
