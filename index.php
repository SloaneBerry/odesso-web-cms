<?php 
session_start(); 
include_once 'config/dbconfig.php';
ob_start();

// Sign In button
if(isset($_POST['sign_in'])){
	 $email 	= $_POST['email'];
	 $password 	= md5($_POST["password"]);
	 $app_type 	= $_POST['app_type'];
	
	// check user login authentication...
	 $user->login($email,$password,$app_type);
}
?>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	Login - BPM Group
</title> 
</head>


<body>
<link href="css/login.css" rel="stylesheet" />
  <div class="container">
	<div class="row">
		<div class="content">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<h2>Login</h2>
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="email" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<!--<label><b>Environment</b></label>
				<select class = "app_type" name = "app_type" >
					<option value = "PT">PT</option>
					<option value = "PROD">PROD</option>
					<option value = "DEV">DEV</option>
				</select>-->
				<button type="submit" name="sign_in">Login</button>
				<div class="loginlinkleft"><a href="recover_password.php"> Forgot Password? </a> </div>
				  <!--<div class="container" style="background-color:#f1f1f1">
					<span class="psw">Forgot <a href="#">password?</a></span>
				  </div>-->
			</form>
		</div>
	</div>
</div>
</body>
</html>