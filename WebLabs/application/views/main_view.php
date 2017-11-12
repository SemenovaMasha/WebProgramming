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
              <a href="main">
              <h1>Forum</h1>
            <h2>Programming forum</h2>
            </a>
          </div>
            
            <div class="menumob">
            <div class="icon-close">
              <img src="images/close-btn.png">
            </div>

            <ul>
                
             <li> <a href="newquestion"> Ask </a> </li>
              <li><a href="main">Questions</a> </li>
            <li><a href="#">Rules</a> </li>
            <li><a href="#">Search</a> </li>
            <li><a href="signin">
                 <?php
                       echo $data['hello'];
                 ?></a> </li>
                
            </ul>
          </div>
            
            <div class="icon-menumob">
                    <img src="images/menumob-ham-icon2.png">
                    Menu
                  </div>
          <div id="menu"> 
              
              <a href="newquestion"> Ask </a> 
              <a href="main">Questions</a> 
            <a href="#">Rules</a> 
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
                 if(isset( $data['questions'])){
                    foreach ( $data['questions']as $row)
                    {
                        echo "<div class=\"entry\"><h2><a href=\"question?id=".$row['id']."\">".$row['title']."</a></h2>";
                        echo "<p>".$row['text']."</p>";
                        echo "<p class=\"meta\"><span class=\"date\">". date("F j, Y",strtotime( $row['date']))."</span> Posted by ".$row['login']." | Tags: ".$row['tags']."</p>";
                        echo " </div>";
                    }
                    $page_k=1;
                    echo "<div class =\"page_n\">";
                    while($page_k<=$data['page_limit']){
                        echo "<a href=\"main?page=".$page_k.(isset($data['tags'])?'&&tags='.$data['tags']:'')."\"> ".$page_k."</a>";
                        $page_k++;
                    }
                 }
                    echo "</div>";
                  ?>
            </div>
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

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/menumob.js"></script>
    </body>
</html>
