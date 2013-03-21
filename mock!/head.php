<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script>

<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>

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