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
        <link rel="stylesheet" href ="styles/users.css"></link>
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'></link>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
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
            <li><a href="users">Users</a> </li>
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
            <a href="users">Users</a>
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
                
                <div class="carousel"> 
                <?php
                   if(isset( $data['users'])){
                      foreach ( $data['users']as $row)
                      {
                          echo "<div class=\"polaroid\"><p>";
                          echo $row['login'];
                          echo "</p><img src=\"profiles/";
                          echo $row['avatar'];
                          echo "\" /> </div>";
                      }
                   }
                  ?>

                </div>
                
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
    
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script type="text/javascript" src="js/carousel.js"></script>

    </body>
</html>
