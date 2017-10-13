<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
if($check == ''){
header("Location:index.php");
}
ob_start();
$odesso_app_id= $_GET['id'];

$table3_heading	 = $user->tablehead_ODESSO_APP_MODULE_ITEM();
$table3			 = $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);


?>

<?php include 'header.php' ;?>
<div class="container">
<div class="row">
<!----------------------------------- Title div Starts ---------------------------------->

<div class="upload_img">
	<h2>Simulators</h2>
</div>
<?php

	
	$link =  $user->simulator_link($odesso_app_id);
	if($link){
		
		echo '<a href = "'.$link .'" title = "Simulator" target="_blank">Click here to launch your simulator.</a>';
		
	}else{
	echo 'There is no Simulator.';
	echo "<br>";
	echo '<a href = "'. BASE_URL .'/home.php?id='.$_GET['id'].'">Go Back</a>';	
		
	}
	
?>
<!----------------------------------- Title div Ends	  ---------------------------------->
<br>
<br>
<h3>Color Picker</h3>
<a href="https://color.adobe.com/" target="_blank">Click here to open the color picker.</a>

<h3>Sample Icons:</h3>
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_1.png" target="_blank">Logo 1</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_2.png" target="_blank">Logo 2</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_3.png" target="_blank">Logo 3</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_4.png" target="_blank">Logo 4</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_5.png" target="_blank">Logo 5</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_6.png" target="_blank">Logo 6</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_7.png" target="_blank">Logo 7</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_8.png" target="_blank">Logo 8</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_9.png" target="_blank">Logo 9</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_10.png" target="_blank">Logo 10</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_11.png" target="_blank">Logo 11</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_12.png" target="_blank">Logo 12</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_13.png" target="_blank">Logo 13</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_14.png" target="_blank">Logo 14</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_15.png" target="_blank">Logo 15</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/logo_16.png" target="_blank">Logo 16</a> | 

<h3>Sample Backgrounds:</h3>

<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_white.png" target="_blank">White</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_blue.png" target="_blank">Blue</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_green.png" target="_blank">Green</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_orange.png" target="_blank">Orange</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_pink.png" target="_blank">Pink</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_purple.png" target="_blank">Purple</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_yellow.png" target="_blank">Yellow</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_skyline.png" target="_blank">Skyline</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_concrete.png" target="_blank">Concrete</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_hair.png" target="_blank">Hair Stylist</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_shards.png" target="_blank">Shards</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_spotlight.png" target="_blank">Spotlight</a> | 
<a href="https://www.odesso.com/AppProd/OdessoPlatform/Template/background_stone.png" target="_blank">Stone</a> | 


</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
<script src="js/datatable.js"></script>
<script src="js/datatable.min.js"></script>