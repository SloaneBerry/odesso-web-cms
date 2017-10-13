<?php 
session_start(); 
include_once 'config/dbconfig.php';
ob_start();

// Sign In button
if(isset($_POST['recover_password'])){
	
	$email = $_POST['email'];
	 $username =$_POST['username'];
	$user->recover_password($email,$username);
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
        <div class="registrationFormAlert" id="divCheckEmail"></div>
        <div class="form-group m-b-20">
          <input type="text" class="form-control input-lg" placeholder=" Enter Registered Email" name="email" id="email" required/>
        </div>
		<div class="form-group m-b-20">
          <input type="text" class="form-control input-lg" placeholder="Username" name="username" required/>
        </div>
        <div class="login-buttons">
          <button type="submit" class="btn btn-success btn-block btn-lg" name="recover_password">Recover Password</button>
        </div>
       </form>
	</div>
	</div>
</div>
</body>
</html>