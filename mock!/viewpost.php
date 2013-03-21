<?php
session_start();
include('db_connect.php');
?>

<html>
<head>
	<title>Mock! Forum Post</title>
<link rel="stylesheet" href="internalstyles.css" type="text/css" media="screen" />
</head>

<?php
if($_SESSION['id'])
{
?>
<div id=overheader">
<div id="bar">
<?php include('headerthing.php'); ?>
</div>
</div>
<?php
}
echo "<br />";
$sql="SELECT * from `FORUM` WHERE `subject`='".$_GET['subject']."'";
$res=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($res) != 1)
{
echo "<script language=\"Javascript\" type=\"text/javascript\">
	alert(\"This topic does not exist\")
	document.location.href='home.php'</script>";
}
else
{
	$row=mysql_fetch_assoc($res);

	?>
	
	<div class="divider">
	<h2>Posted By: <?php echo $row['username'] ?></h2><br />
	<b>Subject: </b> <?php echo $row['subject'] ?> <br/><br />
	<b>Content:<br /></b> <?php echo $row['content'] ?><br /><br />
	<b>Links: </b> <?php echo $row['links'] ?><br /><br />
	<b>Date: </b> <?php echo $row['date'] ?><br /><br />
	<a href="view_forum.php">Other Posts</a><br />
    </div>
<?php
}
?>