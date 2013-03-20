<?php
session_start();
//Post In Main Forum Category - General
include('db_connect.php');
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>Main Forum</title>
</head>

<body>
<div class="divider">
<?php
if($_SESSION['id'])
{
	echo "<a href=home.php>Home</a><br/>";
	
	$sql="SELECT * from `users` WHERE `id`='".$_SESSION['id']."'";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	
	//Print the Form Now
	
	if($_POST['update'])
	{
	?>
	</div>
	<div class="divider">
	<form method="post" action="profilecp.php">
	<br/><strong>Post on the Forum</strong><br/><br/>
	
	<div class="formElm">
	<label for="first">Content</label>
	<textarea id="content" cols="40" rows="6" name="content"><?php echo $row['content']; ?></textarea>
	</div>
	
	<input type="submit" name="post" value="Post!">
	</form></div>
	
	<?php
	}
    
	else
	{

		$first_name=protect($_POST['first']);
		$last_name=protect($_POST['last']);
		$age=protect($_POST['age']);
		$about=protect($_POST['about']);
		$email=protect($_POST['email']);
		$status=protect($_POST['status']);

		$sql3 =	"UPDATE `users` SET `first`='$first_name',`last`='$last_name',`age`='$age',`email`='$email',`about`='$about',`status`='$status' WHERE `id`='".$_SESSION['id']."'";
		$res3 = mysql_query($sql3) or die(mysql_error());
		echo "Your profile has been successfully updated!";

	}

}
else echo "<script language=\"Javascript\" type=\"text/javascript\">document.location.href='index.php'</script>";

?>
</div>
</body>
</html>
