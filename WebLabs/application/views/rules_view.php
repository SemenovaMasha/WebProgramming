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
        <link rel="stylesheet" href ="styles/rules.css"></link>
        <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'></link>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="styles/stimenu.css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Wire+One&v1' rel='stylesheet' type='text/css' />
        
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
                    <!--<img src="images/menumob.png">-->
                    Menu
                  </div>
          <div id="menu"> 
              
              <a href="newquestion"> Ask </a> 
              <a href="main">Questions</a> 
            <a href="rules">Rules</a> 
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
                
                <div id="sti-rules">
                <ul id="sti-menu" class="sti-menu">
                    <li data-hovercolor="#37c5e9" >
					<a href="#">
						<h2 data-type="mText" class="sti-item">All information given within these forum is to be used at your own risk. </h2>
						<h3 data-type="sText" class="sti-item">Information - risk!</h3>
						<span data-type="icon" class="sti-icon sti-icon-risk sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#f4900c">
					<a href="#">
						<h2 data-type="mText" class="sti-item">All questions are categorized by topics. Post your questions.</h2>
						<h3 data-type="sText" class="sti-item">Choose tags!</h3>
						<span data-type="icon" class="sti-icon sti-icon-tags sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#6556e2">
					<a href="#">
						<h2 data-type="mText" class="sti-item">When posting, please use proper grammar. This is a English-language forum.</h2>
						<h3 data-type="sText" class="sti-item">Use proper grammar!</h3>
						<span data-type="icon" class="sti-icon sti-icon-grammar sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#d869b2">
					<a href="#">
						<h2 data-type="mText" class="sti-item">The posting of any copyrighted material on our forum is strictly prohibited.</h2>
						<h3 data-type="sText" class="sti-item">Do not copyright!</h3>
						<span data-type="icon" class="sti-icon sti-icon-copy sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#c2121d">
					<a href="#">
						<h2 data-type="mText" class="sti-item">Spamming is not permitted. Pease keep all your posts as constructive as possible.</h2>
						<h3 data-type="sText" class="sti-item">Do not Spam!</h3>
						<span data-type="icon" class="sti-icon sti-icon-spam sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#2e74a7">
					<a href="#">
						<h2 data-type="mText" class="sti-item">Posting links in order to generate commissions is not permitted at Forum.</h2>
						<h3 data-type="sText" class="sti-item">Do not overuse links!</h3>
						<span data-type="icon" class="sti-icon sti-icon-links sti-item"></span>
					</a>
				</li>
			</ul>
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
        
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.iconmenu.js"></script>
        <script type="text/javascript">
                $(function() {
                        $('#sti-menu').iconmenu();
                });
        </script>
    </body>
</html>
