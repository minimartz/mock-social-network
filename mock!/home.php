<?php 
session_start();
?>

<html>
<head><link rel="stylesheet" href="style.css"></head>

<div class="divider">

<?php
if($_SESSION['id'])
{
echo "<strong>Welcome ",$_SESSION['username'],"</strong>";

echo "<br />";

echo "<br/><a href=\"profilecp.php\">Edit Profile</a>";
echo "<br/><a href=\"profile.php?username=".$_SESSION['username']."\">View Profile</a>";
echo "<br/><a href=\"logout.php\">Logout</a><br /><br />" ;
echo "<a href=users.php>Other Users</a><br />";
echo "<a href=new_pm.php>Send a Message</a><br />";
echo "<a href=list_pm.php>My Inbox</a><br /><br />";
echo "<a href=view_forum.php>View The Forum</a><br />";
echo "<a href=forum_write.php>Post on The Forum</a><br /><br />";
echo "<b>Be Aware: The Message System doesn't work very well...</b>";

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
</html>