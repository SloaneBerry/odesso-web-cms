<style>
input[type="text"] {
    border: none;
	width:100%;
}
button {
    background: #f26522;
    border: none;
    color: white;
    padding: 6px;
}
.success_msg {
    color: white;
	font-size: 15px;
    padding: 5px;
    background-color: #f26522;
	margin-bottom: 6px;
}
	#loadingmessage{
		
		width: 100%;
		opacity: 0.8;
		background: rgb(249,249,249);
		position: fixed;
		z-index: 9999;
		height: 100%;
		margin: auto;	
	}
	.spinner{
		top: 30%;
		position: fixed;
		left: 45%;
	}
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('images/Spinner1.gif') 50% 50% no-repeat rgb(249,249,249);
		opacity: .8;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	// alert('load');
    // $(".loader").fadeOut("slow");
    $(".loader").fadeOut("slow");
});
</script>
<head>
<title>
	Odesso Content Management
</title>
<link href="css/style.css" rel="stylesheet" />
<link href="css/datatable.css" rel="stylesheet" />
</head>
<html>
<body>
<?php 
$APP_TYPE_CLS =  $_SESSION['APP_TYPE_CLS'] ? $_SESSION['APP_TYPE_CLS'] : 'APP_PT_CLS';

// echo "<pre>"; echo "TYPE: " . $_SESSION['APP_TYPE']; echo "</pre>";
// include_once 'User.php';
// $user = new USER($DB_con);



?>
<div class="header">
	<div class="website_title">
		Welcome <?php echo $_SESSION['username'] ;?>
	</div> 
		
	<div class="logout">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<a href="logout.php" class=" logout_cls logout_button">Log Out</a>
	</form>
	
	<!--<form method="post" action="<?php echo BASE_URL;?>/home.php?id=<?php echo $_SESSION['id']; ?>">
		<input type = "submit" name = "PROD" class="PROD_CLS logout_button" value = "PROD"/>
		<input type = "hidden" name = "PROD" class="logout_button" value = "PROD"/>
		
	</form>
	<form method="post" action="<?php echo BASE_URL;?>/home.php?id=<?php echo $_SESSION['id']; ?>">
		<input type = "submit" name = "DEV" class=" DEV_CLS logout_button" value = "DEV"/>
		<input type = "hidden" name = "DEV" class="logout_button" value = "DEV"/>
		
	</form>
	<form method="post" action="<?php echo BASE_URL;?>/home.php?id=<?php echo $_SESSION['id']; ?>">
		<input type = "submit" name = "PT" class=" PT_CLS logout_button" value = "PT"/>
		<input type = "hidden" name = "PT" class="logout_button" value = "PT"/>
		
	</form>-->
	</div>
</div>
<div class="menubar">
	<ul class = "nav">
			<li class = "nav_simu nav_li" >
				<a class = "nav_simu" href = "simulators.php?id=<?php echo $_GET['id']?>" >Start Here</a>
			</li>
			<li class = "nav_item nav_li" >
				<a class = "nav_item" href = "update_branding.php?id=<?php echo $_GET['id']?>" >Update Branding</a>
			</li>
			<li class = "nav_item nav_li" >
				<a class = "nav_features" href = "global_settings.php?id=<?php echo $_GET['id']?>" >Global Settings</a>
			</li>
			<li class = "nav_home nav_li" >
				<a class = "nav_home" href = "home.php?id=<?php echo $_GET['id'];?>" >Create Workflows</a>
			</li>
			<li class = "nav_users nav_li" >
				<a class = "nav_users" href = "manage_users.php?id=<?php echo $_GET['id']?>" >Manage Users</a>
			</li>
			<li class = "nav_users nav_li" >
				<a class = "nav_notifications" href = "notifications.php?id=<?php echo $_GET['id']?>" >Notifications</a>
			</li>
			<li class = "nav_structure nav_li" >
				<a class = "nav_structure" href = "manage_structure.php?id=<?php echo $_GET['id']?>" >Manage Menu</a>
			</li>			
			<li class = "nav_report nav_li" >
				<a class = "nav_report" href = "reports.php?id=<?php echo $_GET['id']?>" >View Reports</a>
			</li>
	</ul>
			
			
	
</div>
<div id='loadingmessage' style='display:none'>
  <img class = "spinner" src='images/Spinner1.gif'/>
</div>
<div class="loader"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
	
	var ss = '<?php echo $APP_TYPE_CLS;?>';

	if (ss == 'APP_PROD_CLS'){
	
		$('.PROD_CLS').css("background", "#140c3e");
	}else if (ss == 'APP_DEV_CLS'){
		
		$('.DEV_CLS').css("background", "#140c3e");
	}else if (ss == 'APP_PT_CLS'){
		
	$('.PT_CLS').css("background", "#140c3e");
	} 
    var url		 = window.location.pathname;
    var index	 = url.substring(url.lastIndexOf('/')+1);
	var filename = index.split(".")[0]; // <-- added this line
    if(filename == 'home'){
		$('.nav_home')	.addClass('bg_nav');
		
		$('.nav_report').removeClass('bg_nav');
		$('.nav_item')	.removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_structure').removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');
		
	}else if(filename == 'reports'){
		$('.nav_report').addClass('bg_nav');

		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_item')	.removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_structure').removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');
		
	}else if(filename == 'update_branding'){
		$('.nav_item')	.addClass('bg_nav');

		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_report').removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_structure').removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');

	}else if(filename == 'manage_users'){
		$('.nav_users')	.addClass('bg_nav');
		
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_report').removeClass('bg_nav');
		$('.nav_item')	.removeClass('bg_nav');
		$('.nav_structure').removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');

	}else if(filename == 'manage_structure'){
		$('.nav_structure')	.addClass('bg_nav');
		
		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_report').removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_item')  .removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');

	}else if(filename == 'simulators'){
		$('.nav_simu')	.addClass('bg_nav');
		
		$('.nav_item')	.removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_report').removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_item').removeClass('bg_nav');
	
	}else if(filename == 'global_settings'){
		$('.nav_features')	.addClass('bg_nav');
		
		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_report').removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_item')  .removeClass('bg_nav');
		$('.nav_structure').removeClass('bg_nav');
		$('.nav_notifications')	.removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');

	}else if(filename == 'notifications'){
		$('.nav_notifications')	.addClass('bg_nav');
		
		$('.nav_home')	.removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_report').removeClass('bg_nav');
		$('.nav_users')	.removeClass('bg_nav');
		$('.nav_item')  .removeClass('bg_nav');
		$('.nav_structure').removeClass('bg_nav');
		$('.nav_features')	.removeClass('bg_nav');
		$('.nav_simu')	.removeClass('bg_nav');

	}
});
</script>


