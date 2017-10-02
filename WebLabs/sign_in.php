<!DOCTYPE html> 
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Вход</title>
	<link rel="stylesheet" href="styles/sign_in.css">
</head>
<body>
    <div class="title_container">
        <div id="sitetitle">
          <h1><a href="#">Forum</a></h1>
          <h2>Programming forum</h2>
        </div>
    </div>
  <div class="container">
      
    <div class="login">
      <h1>Войти</h1>
      <form method="post" action="index.php">
        <p><input type="text" name="login" value="" placeholder="Логин или Email"></p>
        <p><input type="password" name="password" value="" placeholder="Пароль"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Запомнить меня
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Войти"></p>
      </form>
    </div>

<!--    <div class="login-help">
      <a href="index.html">Забыли пароль?</a> Восстановите его!
    </div>-->
  </div>
    
<!--    <div id="container">
        <div id="sitetitle">
          <h1><a href="#">Forum</a></h1>
          <h2>Programming forum</h2>
        </div>
    </div>
    
    <div class="login">
      <h1>Войти</h1>
      <form method="post" action="index.html">
        <p><input type="text" name="login" value="" placeholder="Логин или Email"></p>
        <p><input type="password" name="password" value="" placeholder="Пароль"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Запомнить меня
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Войти"></p>
      </form>
    </div>-->
</body>
</html>