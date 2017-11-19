<!DOCTYPE html> 
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sign Up</title>
	<link rel="stylesheet" href="styles/sign_up.css">
</head>
<body>
    <div class="title_container">
        <div id="sitetitle">
          <h1><a href="main">Forum</a></h1>
          <h2>Programming forum</h2>
        </div>
    </div>
  <div class="container">
      
    <div class="login">
      <h1>Sign Up</h1>
      <p id = "warn">
          <?php
            session_start();
            if (!empty($_SESSION)&&!empty($_SESSION["warn"])){
              echo $_SESSION["warn"];
            }
          ?>      
      </p>
      <form method="post" action="signup?input=validation" enctype="multipart/form-data">
          <div>
              <h1> Login</h1>
            <p>
                <?php
                    echo "<input type=\"text\" name=\"login\"  placeholder=\"login\" maxlength=\"20\" value=\"";
                    if (!empty($_SESSION)&&!empty($_SESSION["tmp_login"])){
                      echo $_SESSION["tmp_login"];
                    }
                    echo "\"";
                 ?>   
            </p>
          </div>
          <div>
              <h1> Password</h1>
            <p>
                <!--
                <?php
                    echo "<input type=\"password\" name=\"password\"  placeholder=\"password\" maxlength=\"20\" value=\"";
                    if (!empty($_SESSION)&&!empty($_SESSION["tmp_password"])){
                      echo $_SESSION["tmp_password"];
                    }
                    echo "\"";
                 ?> 
                -->
                <input type="password" name="password" value="" placeholder="password" maxlength="20">
            </p>
          </div>
          <div>
              <h1> Mail</h1>
            <p>
                <?php
                    echo "<input type=\"text\" name=\"mail\"  placeholder=\"mail\" maxlength=\"30\" value=\"";
                    if (!empty($_SESSION)&&!empty($_SESSION["tmp_mail"])){
                      echo $_SESSION["tmp_mail"];
                    }
                    echo "\"";
                 ?> 
            </p>
          </div>
          <div>
              <h1> Phone</h1>
            <p>
                <?php
                    echo "<input type=\"text\" name=\"phone\"  placeholder=\"phone\" maxlength=\"10\" value=\"";
                    if (!empty($_SESSION)&&!empty($_SESSION["tmp_phone"])){
                      echo $_SESSION["tmp_phone"];
                    }
                    echo "\"";
                 ?> 
            </p>
          </div>
          <div>
              <h1> Attachment</h1>
            <p>
                <input type="file" name="attach"  id="attach">                
            </p>
          </div>
        <p class="submit"><input type="submit" name="submit" value="Sign Up"></p>
      </form>
      
    </div>

  </div>
    
</body>
</html>