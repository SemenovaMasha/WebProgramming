<!DOCTYPE html> 
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sign In</title>
	<link rel="stylesheet" href="styles/sign_in.css">
</head>
<body>
    <?php
        session_start();
        $_SESSION = array();        
    ?>
    <div class="title_container">
        <div id="sitetitle">
          <h1><a href="main">Forum</a></h1>
          <h2>Programming forum</h2>
        </div>
    </div>
  <div class="container">
      
    <div class="login">
      <h1>Sign In</h1>
      <form method="post" action="signin?input=check">
        <p><input type="text" name="login" value="" placeholder="login"></p>
        <p><input type="password" name="password" value="" placeholder="password"></p>
        <p class="submit"><input type="submit" name="commit" value="Sign In"></p>
      </form>
      
      <div id = "sign_up">
          <a href="signup">Sign Up</a>
      </div>
    </div>

  </div>
</body>
</html>