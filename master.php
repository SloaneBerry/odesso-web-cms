<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
$session_id= $_SESSION['id'];
$pageid= $_GET['id'];
// echo "<pre>";
		// print_r($_SESSION['email']);
		// echo'<br>';
		// print_r($session_id);
		// echo '<br>';
		// print_r($pageid);
// echo "</pre>"; 

/* if($_POST['PROD']){
	$_SESSION['APP_TYPE'] = '_PROD';
	$_SESSION['APP_TYPE_CLS'] = 'APP_PROD_CLS';
}else if($_POST['DEV']){
	$_SESSION['APP_TYPE'] = '_DEV';
	$_SESSION['APP_TYPE_CLS'] = 'APP_DEV_CLS';
}else if($_POST['PT']){
	$_SESSION['APP_TYPE'] = '_pt';
	$_SESSION['APP_TYPE_CLS'] = 'APP_PT_CLS';
}else{
	
	$_SESSION['APP_TYPE'] = '_pt';
	$_SESSION['APP_TYPE_CLS'] = 'APP_PT_CLS';
} */




if($session_id != $pageid){
header("Location:index.php");
}
ob_start();
// echo "TYPE: " .$_SESSION['APP_TYPE'];
$APP_TYPE_CLS =  $_SESSION['APP_TYPE_CLS'] ? $_SESSION['APP_TYPE_CLS'] : 'APP_PT_CLS';
	// echo "<br>";
// echo "APP_TYPE_CLS: " .$_SESSION['APP_TYPE_CLS'];
$odesso_app_id= $_GET['id'];
// $result= $user->odesso_app_id($client_id);
// $odesso_app_id= $result['ODESSO_APP_ID'];
$table_heading 	 = $user->tablehead_ODESSO_APP();
$table			 = $user->table_ODESSO_APP($odesso_app_id);

$table1_heading  = $user->tablehead_ODESSO_APP_FEATURE($odesso_app_id);
$table1			 = $user->table_ODESSO_APP_FEATURE($odesso_app_id);

$table2_heading	 = $user->tablehead_ODESSO_APP_MODULE_STORE_CATEGORY();
$table2			 = $user->table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id);

$table3_heading	 = $user->tablehead_ODESSO_APP_MODULE_ITEM();
$table3			 = $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);

$table4_heading	 = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM();
$table4			 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);

$table5_heading	 = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY();
$table5			 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id);

$table6_heading	 = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE();
$table6			 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id);

$table7_heading	 = $user->tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE();
$table7			 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);

$table8_heading	 = $user->tablehead_ODESSO_APP_MODULE_USER_USER_TYPE();
$table8			 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);

$table9_heading	 = $user->tablehead_ODESSO_APP_REF_STRING();
$table9 		 = $user->table_ODESSO_APP_REF_STRING($odesso_app_id);

$table10_heading = $user->tablehead_ODESSO_APP_MODULE_INFORMATION();
$table10		 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);

$table11_heading = $user->tablehead_ODESSO_APP_MODULE_WEB();
$table11		 = $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);

$table12_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE();
$table12		 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);

$table13_heading_insert = $user->tablehead_insert_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13 		 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);


$table14_heading = $user->tablehead_ODESSO_APPDESSO_APP_ADDRESS();
$table14 		 = $user->table_ODESSO_APPDESSO_APP_ADDRESS($odesso_app_id);

$table15_heading = $user->tablehead_ODESSO_APP_FEATURE_ORDER();
$table15 		 = $user->table_ODESSO_APP_FEATURE_ORDER($odesso_app_id);

$table16_heading = $user->tablehead_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT();
$table16 		 = $user->table_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT($odesso_app_id);

$table17_heading = $user->tablehead_ODESSO_APP_MODULE_store();
$table17 		 = $user->table_ODESSO_APP_MODULE_store($odesso_app_id);


$table18_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ADDRESS();
$table18 		 = $user->table_ODESSO_APP_MODULE_STORE_ADDRESS($odesso_app_id);

$table19_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE();
$table19 		 = $user->table_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE($odesso_app_id);

$table20_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_CART_ITEM();
$table20 		 = $user->table_ODESSO_APP_MODULE_STORE_CART_ITEM($odesso_app_id);

$table21_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE();
$table21 		 = $user->table_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE($odesso_app_id);

$table22_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_COUPON();
$table22 		 = $user->table_ODESSO_APP_MODULE_STORE_COUPON($odesso_app_id);
/* 
$table23_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_COUPON_REFERRAL();
$table23 		 = $user->table_ODESSO_APP_MODULE_STORE_COUPON_REFERRAL($odesso_app_id);
 */
$table24_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_EXTRA_FEE();
$table24 		 = $user->table_ODESSO_APP_MODULE_STORE_EXTRA_FEE($odesso_app_id);

$table25_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER();
$table25 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER($odesso_app_id);

$table26_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS();
$table26 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id);

$table27_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE();
$table27 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE($odesso_app_id);

$table28_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_AUDIT();
$table28 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_AUDIT($odesso_app_id);

$table29_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_COUPON();
$table29 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_COUPON($odesso_app_id);

$table30_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE();
$table30 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE($odesso_app_id);

$table31_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ITEM();
$table31		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ITEM($odesso_app_id);

$table32_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE();
$table32		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE($odesso_app_id);

$table33_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE();
$table33		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE($odesso_app_id);

$table34_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE();
$table34		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE($odesso_app_id);

$table35_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION();
$table35		 = $user->table_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION($odesso_app_id);

$table36_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD();
$table36		 = $user->table_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($odesso_app_id);


$table37_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT();
$table37		 = $user->table_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT($odesso_app_id);

$table38_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED();
$table38		 = $user->table_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED($odesso_app_id);


$table39_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT();
$table39		 = $user->table_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT($odesso_app_id);

$table40_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_TAX();
$table40		 = $user->table_ODESSO_APP_MODULE_STORE_TAX($odesso_app_id);

$table41_heading = $user->tablehead_ODESSO_APP_MODULE_USER();
$table41		 = $user->table_ODESSO_APP_MODULE_USER($odesso_app_id);

$table42_heading = $user->tablehead_ODESSO_APP_USER_PROFILE_ATTRIBUTE();
$table42		 = $user->table_ODESSO_APP_USER_PROFILE_ATTRIBUTE($odesso_app_id);


$table43_heading = $user->tablehead_ODESSO_APP_REF_ICON_PALETTE();
$table43		 = $user->table_ODESSO_APP_REF_ICON_PALETTE($odesso_app_id);

$table44_heading = $user->tablehead_ODESSO_APP_REF_THEME_COLOR();
$table44		 = $user->table_ODESSO_APP_REF_THEME_COLOR($odesso_app_id);

$table45_heading = $user->tablehead_ODESSO_CLIENT();
$table45		 = $user->table_ODESSO_CLIENT($odesso_app_id);

$table46_heading = $user->tablehead_ODESSO_CLIENT_PAYMENT_INFO();
$table46		 = $user->table_ODESSO_CLIENT_PAYMENT_INFO($odesso_app_id);

$table47_heading = $user->tablehead_ODESSO_END_USER();
$table47		 = $user->table_ODESSO_END_USER($odesso_app_id);

$table48_heading = $user->tablehead_ODESSO_END_USER_SP_ITEM_LIST();
$table48		 = $user->table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id);


// Insert Functions...

if(isset($_POST['logout'])){
	 $user->logout();
}

if(isset($_POST['edit1'])){
	foreach($table_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['insert1'])){
		$value3 = $_POST[insert_value];
		
		 
		/* if($value3[0] == '' || $value3[1] == '' || $value3[2] == ''){
			echo "<pre>";
				print_r('Please fill out the fields!');
		echo "</pre>";
		die('sd');
		}else{
			
		$user->odesso_app_insert($value3);
		}  */
		$user->odesso_app_insert($value3);
}
if(isset($_POST['insert2'])){
		$value3 = $_POST[insert_value2];
		$user->odesso_app_feature_insert($value3);
}
if(isset($_POST['insert3'])){
		$value3 = $_POST[insert_value3];
		$user->odesso_app_module_store_category_insert($value3);
}
if(isset($_POST['insert4'])){
		$value3 = $_POST[insert_value4];
		$user->odesso_app_module_item_insert($value3);
}
if(isset($_POST['insert5'])){
			$value3 = $_POST[insert_value5];
		
		$inserted_id = $user->odesso_app_module_store_store_item_insert($value3);
		
		// location method values for 3 rows...
		$location_method = array('Onsite','Offsite','Shipping');
		
		// auto insert 3 rows into odesso_app_module_store_store_item_location_schedule table...
		for($i = 0; $i<=2; $i++){
			
			$value33 = array('',$odesso_app_id,$inserted_id,$location_method[$i],0,0);
			$user->odesso_app_module_store_store_item_location_schedule_insert($value33);
			
		}
}
if(isset($_POST['insert6'])){
		$value3 = $_POST[insert_value6];
		$user->odesso_app_module_store_store_item_inventory_insert($value3);
}
if(isset($_POST['insert7'])){
		$value3 = $_POST[insert_value7];
		$user->odesso_app_module_store_store_item_location_schedule_insert($value3);
}
if(isset($_POST['insert8'])){
		$value3 = $_POST[insert_value8];
		$user->odesso_app_module_user_app_profile_attribute_insert($value3);
}
if(isset($_POST['insert9'])){
		$value3 = $_POST[insert_value9];
		$user->odesso_app_module_user_user_type_insert($value3);
}
if(isset($_POST['insert10'])){
		$value3 = $_POST[insert_value10];
		$user->odesso_app_ref_string_insert($value3);
}
if(isset($_POST['insert11'])){
		$value3 = $_POST[insert_value11];
		$user->odesso_app_module_information_insert($value3);
}
if(isset($_POST['insert12'])){
		$value3 = $_POST[insert_value12];
		$user->odesso_app_module_web_insert($value3);
}
if(isset($_POST['insert13'])){
		$value3 = $_POST[insert_value13];
		$user->odesso_app_module_store_store_item_image_insert($value3);
}
if(isset($_POST['insert14'])){
		$value3 = $_POST[insert_value14];
		$inserted = array( '0','','0' ); // Not necessarily an array
		array_splice( $value3, 3, 0, $inserted ); // splice in at position 3

		$user->odesso_app_module_store_store_item_attribute_insert($value3);
}
if(isset($_POST['edit2'])){
	foreach($table1_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}



// Edit functions...

if(isset($_POST['edit3'])){
	foreach($table2_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_CATEGORY($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit4'])){
	foreach($table3_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_table_ODESSO_APP_MODULE_ITEM($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit5'])){
	foreach($table4_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit6'])){
	foreach($table5_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit7'])){
	foreach($table6_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit8'])){
	foreach($table7_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit9'])){
	foreach($table8_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER_USER_TYPE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit10'])){
	foreach($table9_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_REF_STRING($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit11'])){
	foreach($table10_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_INFORMATION($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit12'])){
	foreach($table11_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_WEB($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit13'])){
	foreach($table12_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit14'])){
	foreach($table13_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}
?>

<style>
	.dataTables_filter{
		display:none;
	}
</style>
<?php include 'header.php';?>
<!----------------------------------- Upload image div Starts ---------------------------------->
<div class="upload_img">
		<div style = "display:none" class = "success_msg"></div>
		<div style = "display:none" class = "error_msg"></div>
		<input type = "hidden" id = "user_APP_ID" value = "<?php echo $_GET['id']?>"/>
		<input type = "hidden" id = "user_name"   value = "<?php echo $_SESSION['username']?>"/>
		<input type = "button" class = "upload_btn" value = "Upload Image" onclick = "img_click()"/>
		
		<input type="file" 	   id="my_file" value = ""onchange = "upload()" style="display: none;" />
</div>				

<!----------------------------------- Upload image div Ends	  ---------------------------------->


<div class="container">
<div class="row">
<!-- Table 0-->
<div class="table-responsive ">
	<h3>Table 1: Getting Started Branding Your App - _PT_ODESSO_APP </h3><br>
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		$table= $user->table_ODESSO_APP($odesso_app_id);
		echo"<tr>";
		echo "<td><button type='submit'  style='padding: 6px 11px;' name='insert1'>Insert</button></td>";
			foreach ($table_heading as $key1=>$value)
			{
				echo"<td><input type='text'  name='insert_value[]' value=''></td>";
			}
		echo"</tr>";
			foreach($table as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit1'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div> 
<!-- End Table 0-->
<!-- Table 1-->
<div class="table-responsive ">
	<h3 > Table 2: _PT_ODESSO_APP_FEATURE </h3>
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert2'>Insert</button></td>";
				foreach ($table1_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value2[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table1 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_FEATURE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div> 
<!-- End Table 1-->
<!-- Table 2-->
<div class="table-responsive">
	<h3> Table 3: _PT_ODESSO_APP_MODULE_STORE_CATEGORY  </h3>
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table2_heading as $value)
					{
						echo "<th>$value</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table2= $user->table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert3'>Insert</button></td>";
				foreach ($table2_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value3[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table2 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit3'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 2-->
<!-- Table 3-->
<div class="table-responsive">
	<h3> Table 4: _PT_ODESSO_APP_MODULE_ITEM  </h3>
	  <form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table3_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table3= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert4'>Insert</button></td>";
				foreach ($table3_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value4[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table3 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit4'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_ITEM_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".$value."'></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 3-->
<!-- Table 4-->
<div class="table-responsive">
	<h3> Table 5: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM   </h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table4_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table4= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert5'>Insert</button></td>";
				foreach ($table4_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value5[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table4 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit5'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 4-->
<!-- Table 5-->
<div class="table-responsive">
	<h3> Table 6: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY   </h3>
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table5_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table5= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert6'>Insert</button></td>";
				foreach ($table5_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value6[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table5 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit6'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 5-->
<!-- Table 6-->
<div class="table-responsive">
	<h3> Table 7: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE  </h3>
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table6_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table6= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert7'>Insert</button></td>";
				foreach ($table6_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value7[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table6 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit7'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 6-->
<!-- Table 7-->
<div class="table-responsive">
	<h3> Table 8: _PT_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE  </h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table7_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert8'>Insert</button></td>";
				foreach ($table7_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value8[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table7 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit8'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 7-->
<!-- Table 8-->
<div class="table-responsive">
	<h3> Table 9: _PT_ODESSO_APP_MODULE_USER_USER_TYPE </h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table8_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table8 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert9'>Insert</button></td>";
				foreach ($table8_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value9[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table8 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit9'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_USER_TYPE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."'></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 8-->
<!-- Table 9-->
<div class="table-responsive">
	<h3> Table 10: _PT_ODESSO_APP_REF_STRING </h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table9_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table9 = $user->table_ODESSO_APP_REF_STRING($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert10'>Insert</button></td>";
				foreach ($table9_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value10[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table9 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit10'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_REF_STRING_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."'></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 9-->
<!-- Table 10-->
<div class="table-responsive">
	<h3> Table 11: _PT_ODESSO_APP_MODULE_INFORMATION</h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table10_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table10 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert11'>Insert</button></td>";
				foreach ($table10_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value11[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table10 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit11'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_INFORMATION_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 10-->
<!-- Table 11-->
<div class="table-responsive">
	<h3> Table 12: _PT_ODESSO_APP_MODULE_WEB</h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Edit</th>";
					foreach($table11_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table11 = $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert12'>Insert</button></td>";
				foreach ($table11_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value12[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table11 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit12'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_WEB_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 11-->
<!-- Table 12-->
<div class="table-responsive">
	<h3> Table 13: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE</h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table12_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table12 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert13'>Insert</button></td>";
				foreach ($table12_heading as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value13[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table12 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit13'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 12-->
<!-- Table 13-->
<div class="table-responsive">
	<h3> Table 14: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE</h3>
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table13_heading_insert as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table13 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='padding: 6px 11px;' name='insert14'>Insert</button></td>";
				foreach ($table13_heading_insert as $key1=>$value)
				{
					echo"<td><input type='text'  name='insert_value14[]' value=''></td>";
				}
			echo"</tr>";
			foreach($table13 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit14'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>
<!-- End Table 12-->
<!-- Table 13-->
</div>
</div>
</body>
</html>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
<script src="js/datatable.js"></script>
<script src="js/datatable.min.js"></script>
<script>
$(document).ready(function() {
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
	
    $('.myTable').DataTable( {
        // "scrollY": 200,
        "scrollX": true
    } );
} );
function img_click(id){
	$('.success_msg').css('display','none');
	$('.error_msg').css('display','none');
	
    $("input[id='my_file']").click();
}

function upload(){
	
	var id			 = $('#user_APP_ID').val();
	var user_name	 = $('#user_name').val();
	var file		 = $("input[id='my_file']").prop("files")[0];   // Getting the properties of file from file field
	
	var form_data = new FormData();    				// Creating object of FormData class
	
	form_data.append("file", file) 	 				// Appending parameter named file with properties of file_field to form_data
	
	form_data.append("id", id)           			// Adding extra parameters to form_data
	form_data.append("user_name", user_name)        // Adding extra parameters to form_data
	
	var filename = file.name;
	var extension = filename.split('.').pop();	
	var imgname	  = filename.split('.').shift();	
	
	
	console.log(file);
	if((file.type == 'image/jpeg') || (file.type == 'image/gif') || (file.type == 'image/png')){
		
		var size = file.size;		// image size...
		if (size > 5000000)  // 5MB approx (actually less though)...
		{
			alert('File is too big! Upto 5 MB allowed!');
			return false;
		
		}else{
			//ajax call....
			$.ajax({
				url: "<?php echo BASE_URL?>/upload.php",
				// dataType: 'script',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,  // Setting the data attribute of ajax with file_data
				type: 'post',
				success: function(response){
					var data = JSON.parse(response);
					if(data.result != '0'){
						// alert(data.image_with_path);
						$('.error_msg').css('display','none');
						$('.success_msg').css('display','block');
						
						$('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL;?>/' + user_name + '/'+data.image_with_path);
					
					
					}else{
									
						$('.error_msg').css('display','none');
						$('.success_msg').css('display','block');
						
						$('.error_msg').html('Image not Uploaded! Please Try Again.');
					} 
				}
			});
		}
	
	}else{
			
		alert('Only GIF, PNG & JPEG Format allowed! ');
		return false;
	}
			
			
}
</script>