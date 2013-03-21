<?php 
session_start();
if($_SESSION['id'])
{
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<title>Home</title>
<script> 
$(document).ready(function(){
  $("#flip2").click(function(){
    $("#panel2").slideToggle("slow");
  });
});
</script>
</head>
<body>
<div id="wrapper">
<div id="headerhome">
<div id="flip2">
<h2>Utilities</h2>
</div>
<div id="panel2">
<?php
echo "<br/><a href=\"profilecp.php\">Edit Profile</a>";
echo "<br/><a href=\"profile.php?username=".$_SESSION['username']."\">View Profile</a>";
echo "<br/><a href=\"logout.php\">Logout</a><br /><br />" ;
?>
</div>
</div>
<div id="contenthome">
<?php
echo "<strong>Welcome, ",$_SESSION['username'],"</strong>";
echo "<br /><br />";
?>
<?php
echo "<a href=users.php>Other Users</a><br />";
echo "<a href=new_pm.php>Send a Private Message</a><br />";
echo "<a href=list_pm.php>My Inbox</a><br /><br />";
echo "<a href=view_forum.php>View The Forum</a><br />";
echo "<a href=forum_write.php>Post on The Forum</a><br /><br />";
echo "<b>Be Aware: The Message System doesn't work at all...</b>";
?>
<?php
}
else
{
echo "You must login to view this content";
?>
<br /><br /><a href="index.php">Login</a><br />
<?php
}
?>
</div>
</div>
</html>