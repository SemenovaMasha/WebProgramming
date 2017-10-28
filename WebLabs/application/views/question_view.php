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
              <h1><a href="main">Forum</a></h1>
            <h2>Programming forum</h2>
          </div>

          <div id="menu"> 
              
              <a href="newquestion"> Ask </a> 
              <a href="main">Questions</a> 
            <a href="#">Rules</a> 
            <a href="#">Users</a> 
            <a href="#">Search</a> 
            
            <a href="signin">
                 <?php
                       echo $data['hello'];
                 ?>
            </a> 
          </div>
          <div id="content">  
              <div id="hello">
                <?php
                           echo $data['name'];
                 ?>
            </div>
            <div id="left">

              <div class="entry">
                  
                  <?php
                    
                    echo "<h2>".$data['title']."</h2>";
                    echo "<p>".$data['text']."</p>";
                    if($data['attach']=== NULL){}
                    else{
                        echo "<p class=\"attach\"><a href=\"attachments/".$data['attach']."\" download >".$data['title']."</a></p>";
                    }
                    echo "<p class=\"meta\"><span class=\"date\">". date("F j, Y",strtotime( $data['date']))."</span> Posted by ".$data['login']." | Tags: ".$data['tags']."</p>";
                    
                    echo "</div><div id=\"comment_lbl\">Comments</div>";
                    
                    
                    foreach ( $data['comments']as $row)
                    {
                        echo "<div class=\"comment\"><h2>".$row['login']."</h2>";
                        echo "<p>".$row['text']."</p>";
                        echo "<p class=\"meta\"><span class=\"date\">". date("F j, Y",strtotime( $row['date']))."</span> </p>";
                        echo " </div>";
                    }
                  ?>
                  <div>

                 <form method="post" action="question?input=addcomment" >
                    <div>
                        <h1>New comment</h1>
                      <p>
                          <textarea id="text" name="text" cols="40" rows="5"></textarea>
						  
						  <?php 
						  echo "<input class =\"hide\"id=\"question_id\" type=\"text\" name=\"question_id\" value=\"".$_GET["id"]."\" >";
						  ?>
                      </p>
                    </div>
                  <p class="submit"><input type="submit" name="submit" value="Add comment"></p>
                </form>
                  </div>
                    </div>
<!--              </div>
                <div id="comment_lbl">Comments</div>
                
                <div class ="comment">
                    <h2>Masha</h2>
                    <p>Can anyone tell me how can I generate a random string containing only letters in c#?
                        I basically want a Random value and fill it in my form. I want this value to contain letters only? How can I do this?</p>
                    <p class="meta"><span class="date">September 24, 2017</span> </p>
                    
                </div>
                
            </div>-->
            <div id="right">
              <h2>Wait, what's this?</h2>
              <p class="intro">Welcome to the Forum!</p>
              <div class="subcontainer">
                <div class="rightsub">
                  <h2>Popular tags</h2>
                  <a class="link" href="main?tags=Python">Python</a><br class="hide" />
                  <a class="link" href="main?tags=JavaScript">JavaScript</a><br class="hide" />
                  <a class="link" href="main?tags=Php">Php</a><br class="hide" />
                  <a class="link" href="main?tags=String">String</a><br class="hide" />
                  <a class="link" href="main?tags=t">a</a><br class="hide" />
                </div>
                <div class="rightsub2">
                  <h2>Latest entries</h2>
                  <a class="link" href="question?id=1">Generating Random string</a><br class="hide" />
                  <a class="link" href="question?id=22">C# loop numbers</a><br class="hide" />
                  <a class="link" href="question?id=23">Is there a c# api for video editing?</a><br class="hide" />
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
