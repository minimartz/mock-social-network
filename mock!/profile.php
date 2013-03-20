<?php
session_start();
include "db_connect.php";
if($_SESSION['id'])
{
?>
<div id="header">
<?php
include('headerthing.php');
?>
</div>
<?php
}
?>
<link rel="stylesheet" href="internalstyles.css" type="text/css" media="screen" />
<?php
echo "<br />";
$sql="SELECT * from `users` WHERE `username`='".$_GET['username']."'";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) != 1)
{
echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"This user does not exist\")
	document.location.href='home.php'</script>";
}
else
{
	$row=mysql_fetch_assoc($res);

	?>
	<html>
	<head>
	<title><?php echo $row['username']; ?>'s Profile</title>
	</head>
	
	<div class="divider">
	<strong>Profile</strong><br/><br/>
	<a href="users.php">Other Users</a><br /><br />
	<b>Name:</b> <?php echo $row['first']. " " .$row['last'] ?> <br/>
	<b>Age:</b> <?php echo $row['age'] ?><br />
	<b>Email:</b> <?php echo $row['email'] ?> <br/>
	<b>About:</b> <?php echo $row['about'] ?> <br/><br/>
	<b>Status:</b> <?php echo $row['status'] ?></br /><br/><br/>
    </div>
	
	<div class="divider">
	<strong>Pictures</strong><br/><br/>
<?php

	$result = mysql_query("SELECT reference FROM user_photos WHERE`profile_id`='".$row['id']."'");
	
	while ($row2 = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		echo "<a href=\"".$_GET['username']."/pics/".$row2['reference']."\">
		<img src=\"".$_GET['username']."/pics/thumbs/".$row2['reference']."\"></a><br/><br/>";
	}
}
?>
