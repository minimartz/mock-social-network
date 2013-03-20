
<?php
//Create registration form (register.php)
include "db_connect.php";
 
if(!$_POST['submit'])
{
?>
<html>
<head><link rel="stylesheet" href="style.css"></head>

<div class="divider">
<strong>Register</strong><br/><br/>
<form method="post" action="register.php">

<div class="formElm">
<label for="first">First Name</label>
<input id="first" type="text" name="first">
</div>

<div class="formElm">
<label for="last">Last Name</label>
<input id="last" type="text" name="last">
</div>

<div class="formElm">
<label for="username">Desired Username</label>
<input id="username" type="text" name="username">
<form method="post" action="users.php">
</div>

<div class="formElm">
<label for="password">Password</label>
<input id="password" type="password" name="password">
</div>

<div class="formElm">
<label for="pass_conf">Confirm Password</label>
<input id="pass_conf" type="password" name="pass_conf">
</div>

<div class="formElm">
<label for="email">Email</label>
<input id="email" type="text" name="email">
</div>

<div class="formElm">
<label for="about">About</label>
<textarea id="about" cols="30" rows="5" name="about">Tell us about yourself</textarea>
</div>

<br /><br />
<div class="formElm">
<label for="age">Age</label>
<input id="age" type="text" name="age">
</div>

<br /><br />
<div class="formElm">
<label for="terms"></label>
<input type="checkbox" />I agree to the Terms of Use
</div>
<br />
<input type="submit" name="submit" value="Register">
</form>

or <a href="index.php">Login</a>
<br /><br /><b>The Terms of Use can be found <a href="termsofuse.html" target="blank">here</a> (will open in a new tab).</b><br />
</div>
</html>
<?php
}
else
{
$first = protect($_POST['first']);
$last = protect($_POST['last']);
$username = protect($_POST['username']);
$password = protect($_POST['password']);
$pass_conf = protect($_POST['pass_conf']);
$email = protect($_POST['email']);
$about = protect($_POST['about']);
$age = protect($_POST['age']);
$terms = protect($_POST['terms']);
$errors = array();
$regex = "/^[a-z0-9]+([_\.-][a-z0-9]+)*@([a-z0-9]+([.-][a-z0-9]+)*)+\.[a-z]{2,}$/i";
if(!preg_match($regex, $email))
{
  $errors[] = "E-mail is not in name@domain format!";
}

if(!$first || !$last || !$username || !$password || !$pass_conf || !$email || !$about)
{
   $errors[] = "You did not fill out the required fields. ";
}

$sql = "SELECT * FROM `users` WHERE `username`='{$username}'";
$query = mysql_query($sql) or die(mysql_error());
 
if(mysql_num_rows($query) > 0) 
{
  $errors[] = "Username already taken, please try another";
}
if(count($errors) > 0)
{
  echo "The following errors occured with your registration";
  echo "<font color=\"red\">";
  foreach($errors AS $error)
  {
    echo "<p>" . $error . "\n";
  }
  echo "</font>";
  echo "<a href=\"javascript:history.go(-1)\"><br /><br />Try again</a>";
  //we use javascript to go back rather than reloading the page 
  // so the user doesn't have to type in all that info again.
}

else
{
  $sql = "INSERT into `users`(`first`,`last`,`username`,`password`,`email`,`about`)
  VALUES ('$first','$last','$username','".sha1($password)."','$email','$about');";
 
 $query = mysql_query($sql) or die(mysql_error());
 echo "Thank You for registering {$first_name}! Your username is {$username}! An email will arrive at the specified adress shortly!";
 echo "<a href=\"index.php\"> Click here </a> to Login";
}
}
?>