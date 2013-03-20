<?php
session_start();
//View Forum
include('db_connect.php');

$sql="SELECT * from `posts` WHERE `content`='".$_GET['content']."'";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) == 1)
{
	echo "This does not exist. Or happen?";
	}

else
{

$row=mysql_fetch_assoc($res);

	?>
	<html>
	<head><link rel="stylesheet" href="style.css"></head>
	
	<div class="divider">
	<strong>The Forum</strong><br/><br/>
	<a href="users.php">Other Users</a><br /><br />
	<?php echo $row['content'] ?><br/>
    </div>
<?php

}

?>