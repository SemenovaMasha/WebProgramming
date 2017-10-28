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
        <link rel="stylesheet" href ="styles/main.css"></link>
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
              <div class="entry hide" >
                <h2><a href="#">With a touch from the old school...</a></h2>
                <p>So here it is, my first open source template with classic .gif animations! And maybe my last, since I find the .gif format outdated and mostly annoying. If you feel the same, don't worry: It is really easy to remove the animations and images - see the comments in the stylesheet for instructions.</p>
                <h3>Standards and accessibility</h3>
                <p>Despite the classic influences and the animated visuals, the coding is very simple and modern. No Flash or scripts have been used, only valid XHTML 1.1 and CSS2. Because of that, the design works in most browsers, even in text-based browsers. The design also complies to Section 508 and a WCAG 1.0 Double-A accessibility ratings.</p>
                <h3>Template version</h3>
                <p>This theme was originally released in November 2005, but it has been updated a number of times with various buxfixes and adjustments. This is <strong>version 1.5</strong>, released July 15th, 2006. Please note that this is a regular XHTML and CSS template, and not a theme for any blog or content management system. You can use this template to build themes for different systems, but that will require additional coding. However, the andreas04 design has been ported to a number of blogs and systems already! For example, Tara Aukerman has created the andreas04 theme for WordPress which has been added as one of the default themes on WordPress.com. News and links to theme versions are posted on my website every now and then, so if you want to use this design with a CMS I recommend you to search my site for existing ports before you make your own.</p>
                <p class="meta"><span class="date">July 15, 2006</span> Posted by Andreas | Tags: Design, XHTML, CSS | 19 comments</p>
              </div>

                
                 <?php
                    $user = 'root';
                    $pass = '';
                    $dbh = new PDO('mysql:host=localhost; dbname=forumdb; ', $user, $pass);

                    $r = $dbh->prepare('SELECT question.id,name,question_text,tags,date,login FROM question,forum_user where question.user_id=forum_user.id ');
                    $r->execute();
                    while ($row = $r->fetch(PDO::FETCH_LAZY))
                    {
                        $title=$row["name"];
                        $id=$row["id"];
                        $text=$row["question_text"];
                        $login=$row["login"];
                        $tags=$row["tags"];
                        $date=$row["date"];
                        
                        
                        echo "<div class=\"entry\"><h2><a href=\"question.php?id=".$id."\">".$title."</a></h2>";
                        echo "<p>".$text."</p>";
                        echo "<p class=\"meta\"><span class=\"date\">". date("F j, Y",strtotime( $date))."</span> Posted by ".$login." | Tags: ".$tags."</p>";
                        echo " </div>";
                    }
                    
                  ?>
                

<!--              <div class="entry">
                <h2><a href="question.php?id=1">Generating Random string</a></h2>
                <p>Can anyone tell me how can I generate a random string containing only letters in c#? I basically want a Random value and fill it in my form. I want this value to contain letters only? How can I do this?</p>
                <p class="meta"><span class="date">September 24, 2017</span> Posted by Masha | Tags: C#, String, Random</p>
              </div>

              <div class="entry">
                <h2><a href="#">C# loop numbers</a></h2>
                <p>I'm trying to learn a bit of programming in c# and I'd like to make a program that loops through 2 numbers and does a sum of it. 
                <br>Like this: max number is 3
                <br>1+1, 1+2, 1+3, 2+1, 2+2, 2+3, 3+1, 3+2, 3+3
                <br>I managed to do one loop ( 1+1, 1+2, 1+3) but I dont know how to do the second one so it loops every number with each.
                <br>Thank you for answers and sorry if it sounds like a dumb question, still new in c#.</p>
                <p class="meta"><span class="date">July 15, 2017</span> Posted by Masha | Tags: C#, Loops, Math</p>
              </div>

              <div class="entry">
                <h2><a href="#">Is there a c# api for video editing?</a></h2>
                <p>I am just a beginner in programming, I have just learned a lot of things through online. but didn't find a good answer for my lifetime question!. Please help.</p>
                <p class="meta"><span class="date">October 26, 2016</span> Posted by Masha | Tags: C#, Video-editing, CSS</p>
              </div>

              <div class="entry">
                <h2><a href="#">Store a lot of results from ebay-api</a></h2>
                <p>I'm creating a web application which gets a lot of submitted search queries and runs a search through a specific Ebay-API. I've made the request for JSON as specific as possible. I think storing possibly in the hundreds of megabytes of information would use a lot of RAM, so would anyone help me to store JSON data as neatly as possible? The part in my code which gets all the API: (API call is wrong in this case)</p>
                <p class="meta"><span class="date">June 12, 2017</span> Posted by Masha | Tags: Php, Json</p>
              </div>
              <div class="entry">
                <h2><a href="#">PHP Array to Table</a></h2>
                <p>I am using foreach to get the values of the array in a table but am having difficulty getting the values to show in one line. Please Help.</p>
                <p class="meta"><span class="date">January 8, 2017</span> Posted by Masha | Tags: Php, Arrays, Table</p>
              </div>

              <div class="entry hide">
                <h2><a href="#">Title</a></h2>
                <p>text</p>
                <p class="meta"><span class="date">July 15, 2006</span> Posted by Masha | Tags: Design, XHTML, CSS</p>
              </div>-->
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
