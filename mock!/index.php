<?php
session_start();

//Login form (index.php)

include "db_connect.php";
if(!$_POST['submit'])
{
?>

<html>
<head><link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<title>Mock!</title>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
</head>
<body>
<div id="wrapper">
<div id="header">
<div id="flip">
<h2>Login</h2>
<form method="post" action="index.php">
</div>

<div id="panel">
<h2>Login Panel</h2>
<label for="username">Username</label>
<input id="username" type="text" name="username" maxlength="16">

<label for="password">Password</label>
<input type="password" name="password" maxlength="16">

<br />
<input type="submit" name="submit" value="Login">
</form>
<br /><br />
<a href="register.php">Register Here</a>
<br /><br />The Mock Terms of Use can be found <a href="termsofuse.html" target="blank">here</a>
</div>
<div id="contentlogin">
<h2>Welcome to the "mock!" Social Network and Forum!</h2>
<h3>You Can View The Forum <a href="view_forum.php">Here</a></h3><br />
</div>
</div>
</div>
</body>
</html>

<?php
}
else
{
  $user = protect($_POST['username']);
  $pass = protect($_POST['password']);
 
if($user && $pass)
{
$pass = sha1($pass); //compare the encrypted password
$sql="SELECT id,username FROM `users` WHERE `username`='$user' AND `password`='$pass'";
$query=mysql_query($sql) or die(mysql_error());
 
    if(mysql_num_rows($query) > 0)
    {
      $row = mysql_fetch_assoc($query);
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
     echo "<script type=\"text/javascript\">window.location=\"home.php\"</script>";
    }
    else
   {
    echo "<script type=\"text/javascript\">
	alert(\"Username and/or password is incorrect!\");
	window.location=\"index.php\"</script>";
   }
}
else
{			
   echo "<script type=\"text/javascript\">
	alert(\"You need to gimme a username AND password!\");
	window.location=\"index.php\"</script>";
}
}
?>