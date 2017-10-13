<?php 

include_once 'config/dbconfig.php';
ob_start();
$id= $_GET['id'];

$result= $user->fetch_data($id);
$email= $result['email'];
$username= $result['Username'];
if(isset($_POST['change_password'])){
$email = $_POST['email'];
$username = $_POST['username'];
 $new_password = md5($_POST['new_password']);
 if($user->check_user($email, $username))
 {
	$user->change_password($email, $username, $new_password);
	echo "<div class='msg'>Password changed successfully</div>";
 }
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
          <input type="text" class="form-control input-lg" placeholder="Email ID" name="email" id="email" value="<?php echo $email;?>" readonly required/>
        </div>
		<div class="form-group m-b-20">
          <input type="text" class="form-control input-lg" placeholder="Username" name="username" id="username" value="<?php echo $username;?>" readonly required/>
        </div>
        <div class="registrationFormAlert" id="divCheckpassword"></div>
        <div class="form-group m-b-20">
          <input type="password" class="form-control input-lg" placeholder="New Password" name="new_password" id="new_password" required/>
        </div>
        <div class="login-buttons">
          <button type="submit" class="btn btn-success btn-block btn-lg" name="change_password">Change Password</button>
        </div>
		 <div class="row">
          <div class="loginlinkleft"> Need to <a href="index.php">Login?</a> </div>
        </div>
        </form>
    </div>
	</div>
</div>
</body>
</html>

