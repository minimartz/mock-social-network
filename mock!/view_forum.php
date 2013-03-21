<?php
session_start();
//View Forum
include('db_connect.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip3").click(function(){
    $("#panel3").slideToggle("slow");
  });
});
</script>
</head>
<?php
$sql="SELECT * from `FORUM` WHERE `subject`='".$_GET['subject']."'";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) == 1)
{
	echo "This shouldn't be happening. Fatal error maybe?";
}

else
{
$row=mysql_fetch_assoc($res);
}

if($_SESSION['id'])
{
?>
<div id="wrapper">
<div id="header">
<div id="flip3">
<h2>Control Panel</h2>
</div>
<div id="panel3">
<?php include('headerthing.php'); ?>
</div>
<div id="forumcontent">
	<h2>The Forum</h2>
	<a href="users.php">Other Users</a><br /><br />
	<?php echo $row['subject'] ?><br/>
	<table>
    <tr>
    	<th>Subject</th>
    </tr>
<?php
$req = mysql_query('select subject, content, date from FORUM');
while($dnn = mysql_fetch_array($req))
{
?>
	<tr>
    	<td><a href="viewpost.php?subject=<?php echo $dnn['subject']; ?>"><?php echo htmlentities($dnn['subject'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    </tr>
    </div>
    </div>
<?php

}
}
if(!$_SESSION['id'])
{
if(!$_POST['submit'])
{
?>
<div id="wrapper">
<div id="header">
<div id="flip3">
<h2>Login</h2>
</div>
<div id="panel3">
<h2>Login Panel</h2>
<form method="post" action="view_forum.php">
<label for="username">Username</label>
<input id="username" type="text" name="username" maxlength="16">

<label for="password">Password</label>
<input type="password" name="password" maxlength="16">

<input type="submit" name="submit" value="Login">
</form>
<br /><br />
<a href="register.php">Register Here</a>
<br /><br />The Mock Terms of Use can be found <a href="termsofuse.html" target="blank">here</a>
</div>
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
     echo "<script type=\"text/javascript\">window.location=\"view_forum.php\"</script>";
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
<div id="forumcontent">
	<h2>The Forum</h2>
	<a href="users.php">Users</a><br /><br />
	<?php echo $row['subject'] ?><br/>
	<table>
    <tr>
    	<th>Subject</th>
    </tr>
<?php
$req = mysql_query('select subject, content, date from FORUM');
while($dnn = mysql_fetch_array($req))
{
?>
	<tr>
    	<td><a href="viewpost.php?subject=<?php echo $dnn['subject']; ?>"><?php echo htmlentities($dnn['subject'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    </tr>
    </div>
    </div>
<?php
}
}
?>