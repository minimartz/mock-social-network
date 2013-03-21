<?php
//Forum Creation
session_start();
include "db_connect.php";

if($_SESSION['id'])
{
?>
<div id="head">
<?php include('headerthing.php');
echo "</div>";
if(!$_POST['submit'])
{
?>

<html>
<head><link rel="stylesheet" href="internalstyles.css" type="text/css" media="screen" /></head>

<div class="divider">
<strong>Post on the Forum</strong><br/><br/>
<form method="post" action="forum_write.php">

<div class="formElm">
<label for="subject">Topic/Subject</label>
<input id="subject" type="text" name="subject">
</div>

<div class="formElm">
<label for="content">Content</label>
<textarea id="content" cols="30" rows="5" name="content"></textarea>
</div>

<div class="formElm">
<label for="links">Links</label>
<input id="links" type="text" name="links">
<form method="post" action="view_forum.php">
</div>

<input type="submit" name="submit" value="Submit">
</html>

<?php
}
else
{
$subject = protect($_POST['subject']);
$content = protect($_POST['content']);
$links = protect($_POST['links']);
$errorsd = array();

if(!$subject || !$content)
{
$errorsd[] = "You didn't fill out the required fields (post needs both a name and some content, jsyk)";
}

$sql = "SELECT * FROM `FORUM` WHERE `subject`='{$subject}'";
$query = mysql_query($sql) or die(mysql_error());
 
if(mysql_num_rows($query) > 0) 
{
  $errorsd[] = "Subject already in use. Change the name xD";
}
if(count($errorsd) > 0)
{
  echo "<br /><br />The following errors occured with the forum creation:<br />";
  echo "<font color=\"red\">";
  foreach($errorsd AS $errord)
  {
    echo "<p>" . $errord . "\n";
  }
  echo "</font>";
  echo "<a href=\"javascript:history.go(-1)\">Try again</a>";
  //we use javascript to go back rather than reloading the page 
  // so the user doesn't have to type in all that info again.
}

else
{
  $sql = "INSERT into `FORUM`(`subject`,`content`,`links`)
  VALUES ('$subject','$content','$links');";
 
 $query = mysql_query($sql) or die(mysql_error());
 echo "<br /><br />Thanks! View the forum <a href='view_forum.php'>here</a>!";
}
}
}
?>