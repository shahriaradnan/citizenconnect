<?php
include 'includes/conf.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style/adminfont.css">
  <!--
  #‎01796f
  <link href='http://fonts.googleapis.com/css?family=Nunito:300' rel='stylesheet' type='text/css'>
  -->

  <link rel="stylesheet" type="text/css" href="adminlogin.css">
  <title>Citizen Connect:Log-IN</title>
</head>

<body>
<?php
//If the user is logged, we log him out
if(isset($_SESSION['username']))
{
	//We log him out by deleting the username and userid sessions
	unset($_SESSION['username'], $_SESSION['userid']);
?>
<div><h5>You have successfuly been loged out.<br />Go to
<a href="index.php" style="color:#ccc"><script>setTimeout(function(){window.location.href='index.php'},2000);</script>HOME</a></h5></div>
<?php
}
else
{
	$ousername = '';
	//We check if the form has been sent
	if(isset($_POST['username'], $_POST['password']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = stripslashes($_POST['username']);
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
		//We get the password of the user
		$req = mysqli_query($dbc,'SELECT password,id FROM registered_users WHERE username="'.$username.'"');
		$dn = mysqli_fetch_array($req);
		//We compare the submited password and the real one, and we check if the user exists
		if($dn['password']==$password and mysqli_num_rows($req)>0)
		{
			//If the password is good, we dont show the form
			$form = false;
			//We save the user name in the session username and the user Id in the session userid
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['userid'] = $dn['id'];
?>
<div><h5 class="signup-card">Logged In!<br />Go To
<a href="masterdashboard.php"><script>setTimeout(function(){window.location.href='masterdashboard.php'},2000);</script>Admin Panel</a></h5></div>
<?php
		}
		else
		{
			//Otherwise, we say the password is incorrect.
			$form = true;
			$message = 'The username or password is incorrect.';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		//We display a message if necessary
	if(isset($message))
	{
		echo '<div style="color:red;">'.$message.'</div>';
	}
	//We display the form
?>

<!--<div class="signin">
  <h1>Admin Log-in</h1>
  <form action="index.php" method="post">
    <div class="wrapper">
      <label for="username"><span class="typicons-user"></span></label>
      <input type="text" name="username" placeholder="Username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>"></input>
    </div>
    <div class="wrapper">
      <label for="password"><span class="typicons-lock"></span></label>
      <input type="password" name="password" placeholder="Password"></input>
    </div>
    <input type="submit" value="sign in"/>
  </form>
</div>-->
<div id="bg">
  <img src="http://img.skitch.com/20120905-fccfjyqxpxbkrhs6wct3xuyrjf.png" alt="">
</div>

<form action="index.php" method="post">
  <div class="title">REGISTERED USER Log-In</div>
  <input type="text" name="username" placeholder="Username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>"></input>
  <input type="password" name="password" placeholder="Password"></input>
  <input type="submit" value="Login">
</form>
<footer>
 <!-- <p class="forget">Go Back <a href="index.php"> Home</a></p>-->
 
</footer>
<?php
	}
}
?>
	
</body>
</html>