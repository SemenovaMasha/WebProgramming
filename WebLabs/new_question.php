<!DOCTYPE html> 
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>New Question</title>
        <link rel="stylesheet" href="styles/new_question.css">
</head>
<body>
    <div class="title_container">
        <div id="sitetitle">
          <h1><a href="index.php">Forum</a></h1>
          <h2>Programming forum</h2>
        </div>
    </div>
  <div class="container">
      
    <div class="login">
      <h1>New Question</h1>
      <form method="post" action="add_new_question.php" enctype="multipart/form-data">
          <div>
              <h1> Title</h1>
            <p>
                <input type="text" name="title"  placeholder="title" maxlength="50" value="" >
            </p>
          </div>
          <div>
              <h1  > Text</h1>
            <p>
                <textarea id="text" name="text" cols="40" rows="5"></textarea>
                <!--<input id="text" type="text" name="text" value="" placeholder="text" maxlength="1024">-->
            </p>
          </div>
          <div>
              <h1> Tags</h1>
            <p>
                <input type="text" name="tags"  placeholder="tags" maxlength="30" value="" >
            </p>
          </div>
          <div>
              <h1> Attachment</h1>
            <p>
                <input type="file" name="attach"  id="attach">                
            </p>
          </div>
        <p class="submit"><input type="submit" name="submit" value="Ask"></p>
      </form>
      
    </div>

  </div>
    
</body>
</html>