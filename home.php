<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
$session_id= $_SESSION['id'];
$pageid= $_GET['id'];


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
/*************************************************************************************************************/
// display fuctions...

$table_heading 	 = $user->tablehead_ODESSO_APP();
$table			 = $user->table_ODESSO_APP($odesso_app_id);

$table1_heading_insert  = $user->tablehead_ODESSO_APP_FEATURE_For_insert_HomePage($odesso_app_id);
$table1_heading  		= $user->tablehead_ODESSO_APP_FEATURE_FOR_HomePage($odesso_app_id);
$table1			 		= $user->table_ODESSO_APP_FEATURE_FOR_HomePage($odesso_app_id);

$table2_heading	 		= $user->tablehead_ODESSO_APP_MODULE_STORE_CATEGORY();
$table2			 		= $user->table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id);

$table3_heading	 		= $user->tablehead_ODESSO_APP_MODULE_ITEM();
$table3			 		= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);

$table4_heading	 		= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM();
$table4			 		= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);

$table5_heading	 		= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY();
$table5			 		= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id);

$table6_heading	 		= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE();
$table6			 		= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id);

$table7_heading	 		= $user->tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE();
$table7			 		= $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);

$table8_heading	 		= $user->tablehead_ODESSO_APP_MODULE_USER_USER_TYPE();
$table8			 		= $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);

$table9_heading	 		= $user->tablehead_ODESSO_APP_REF_STRING();
$table9 		 		= $user->table_ODESSO_APP_REF_STRING($odesso_app_id);

$table10_heading 		= $user->tablehead_ODESSO_APP_MODULE_INFORMATION();
$table10		 		= $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);

$table11_heading 		= $user->tablehead_ODESSO_APP_MODULE_WEB();
$table11		 		= $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);

$table12_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE();
$table12		 		= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);

$table13_heading_insert = $user->tablehead_insert_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13_heading 		= $user->tablehead1_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
// $table13 		 		= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);


$table14_heading 		= $user->tablehead_ODESSO_APPDESSO_APP_ADDRESS();
$table14 		 		= $user->table_ODESSO_APPDESSO_APP_ADDRESS($odesso_app_id);

$table15_heading 		= $user->tablehead_ODESSO_APP_FEATURE_ORDER();
$table15 		 		= $user->table_ODESSO_APP_FEATURE_ORDER($odesso_app_id);

$table16_heading 		= $user->tablehead_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT();
$table16 		 		= $user->table_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT($odesso_app_id);

$table17_heading 		= $user->tablehead_ODESSO_APP_MODULE_store();
$table17 		 		= $user->table_ODESSO_APP_MODULE_store($odesso_app_id);


$table18_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ADDRESS();
$table18 		 		= $user->table_ODESSO_APP_MODULE_STORE_ADDRESS($odesso_app_id);

$table19_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE();
$table19 		 		= $user->table_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE($odesso_app_id);

$table20_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_CART_ITEM();
$table20 		 		= $user->table_ODESSO_APP_MODULE_STORE_CART_ITEM($odesso_app_id);

$table21_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE();
$table21 		 		= $user->table_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE($odesso_app_id);

$table22_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_COUPON();
$table22 		 		= $user->table_ODESSO_APP_MODULE_STORE_COUPON($odesso_app_id);

$table23_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_COUPON_REFERAL();
$table23 		 		= $user->table_ODESSO_APP_MODULE_STORE_COUPON_REFERAL($odesso_app_id);

$table24_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_EXTRA_FEE();
$table24 		 		= $user->table_ODESSO_APP_MODULE_STORE_EXTRA_FEE($odesso_app_id);

$table25_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER();
$table25 		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER($odesso_app_id);

$table26_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS();
$table26 		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id);

$table27_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE();
$table27 		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE($odesso_app_id);

$table28_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_AUDIT();
$table28 		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_AUDIT($odesso_app_id);

$table29_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_COUPON();
$table29 		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_COUPON($odesso_app_id);

$table30_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE();
$table30 		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE($odesso_app_id);

$table31_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ITEM();
$table31		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_ITEM($odesso_app_id);

$table32_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE();
$table32		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE($odesso_app_id);

$table33_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE();
$table33		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE($odesso_app_id);

$table34_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE();
$table34		 		= $user->table_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE($odesso_app_id);

$table35_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION();
$table35		 		= $user->table_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION($odesso_app_id);

$table36_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD();
$table36		 		= $user->table_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($odesso_app_id);


$table37_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT();
$table37		 		= $user->table_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT($odesso_app_id);

$table38_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED();
$table38		 		= $user->table_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED($odesso_app_id);


$table39_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT();
$table39		 		= $user->table_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT($odesso_app_id);

$table40_heading 		= $user->tablehead_ODESSO_APP_MODULE_STORE_TAX();
$table40		 		= $user->table_ODESSO_APP_MODULE_STORE_TAX($odesso_app_id);

$table41_heading 		= $user->tablehead_ODESSO_APP_MODULE_USER();
$table41		 		= $user->table_ODESSO_APP_MODULE_USER($odesso_app_id);

$table42_heading 		= $user->tablehead_ODESSO_APP_USER_PROFILE_ATTRIBUTE();
$table42		 		= $user->table_ODESSO_APP_USER_PROFILE_ATTRIBUTE($odesso_app_id);


$table43_heading 		= $user->tablehead_ODESSO_APP_REF_ICON_PALETTE();
$table43		 		= $user->table_ODESSO_APP_REF_ICON_PALETTE($odesso_app_id);

$table44_heading 		= $user->tablehead_ODESSO_APP_REF_THEME_COLOR();
$table44		 		= $user->table_ODESSO_APP_REF_THEME_COLOR($odesso_app_id);

$table45_heading 		= $user->tablehead_ODESSO_CLIENT();
$table45		 		= $user->table_ODESSO_CLIENT($odesso_app_id);

$table46_heading 		= $user->tablehead_ODESSO_CLIENT_PAYMENT_INFO();
$table46		 		= $user->table_ODESSO_CLIENT_PAYMENT_INFO($odesso_app_id);

$table47_heading 		= $user->tablehead_ODESSO_END_USER();
$table47		 		= $user->table_ODESSO_END_USER($odesso_app_id);

$table48_heading 		= $user->tablehead_ODESSO_END_USER_SP_ITEM_LIST();
$table48		 		= $user->table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id);

if(isset($_POST['logout'])){
	 $user->logout();
}

//Insert Functions...

if(isset($_POST['insert1'])){
		$value3 = $_POST[insert_value];
	
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
if(isset($_POST['insert14_1'])){
		
		$value3 = $_POST[insert_value14_1];
		
		$inserted = array( '0','0','0' ); // Not necessarily an array
		
		array_splice( $value3,7, 0, $inserted ); // splice in at position 7
		
		$user->odesso_app_module_store_store_item_attribute_insert($value3);
}
if(isset($_POST['insert14_2'])){
		
		$value3 = $_POST[insert_value14_2];
	
		$inserted = array( '0','0','0' ); 			// Not necessarily an array
		
		array_splice( $value3, 3, 0, $inserted ); 	// splice in at position 3
		
		$user->odesso_app_module_store_store_item_attribute_insert($value3);
}
if(isset($_POST['insert15'])){
		$value3 = $_POST[insert_value15];
		$user->odesso_app_address_insert($value3);
}

 if(isset($_POST['insert16'])){
		$value3 = $_POST[insert_value16];
		$user->odesso_app_feature_order_insert($value3);
}
 if(isset($_POST['insert17'])){
		$value3 = $_POST[insert_value17];
		$user->odesso_app_module_item_activity_audit_insert($value3);
}


if(isset($_POST['insert18'])){
		$value3 = $_POST[insert_value18];
		$user->odesso_app_module_store_insert($value3);
}

if(isset($_POST['insert19'])){
		$value3 = $_POST[insert_value19];
		$user->odesso_app_module_store_address_insert($value3);
}

if(isset($_POST['insert20'])){
		$value3 = $_POST[insert_value20];
		$user->odesso_app_module_store_app_order_attribute_insert($value3);
}

if(isset($_POST['insert21'])){
		$value3 = $_POST[insert_value21];
		$user->odesso_app_module_store_cart_item_insert($value3);
}

if(isset($_POST['insert22'])){
		$value3 = $_POST[insert_value22];
		$user->odesso_app_module_store_cart_item_attribute_insert($value3);
}

if(isset($_POST['insert23'])){
		$value3 = $_POST[insert_value23];
		$user->odesso_app_module_store_coupon_insert($value3);
}

if(isset($_POST['insert24'])){
		$value3 = $_POST[insert_value24];
		$user->odesso_app_module_store_coupon_referal_insert($value3);
}

if(isset($_POST['insert25'])){
		$value3 = $_POST[insert_value25];
		$user->odesso_app_module_store_extra_fee_insert($value3);
}

if(isset($_POST['insert26'])){
		$value3 = $_POST[insert_value26];
		$user->odesso_app_module_store_order_insert($value3);
}


if(isset($_POST['insert27'])){
		$value3 = $_POST[insert_value27];
		$user->odesso_app_module_store_order_address_insert($value3);
}


if(isset($_POST['insert28'])){
		$value3 = $_POST[insert_value28];
	
		$user->odesso_app_module_store_order_attribute_insert($value3);
}

if(isset($_POST['insert29'])){
		$value3 = $_POST[insert_value29];
		$user->odesso_app_module_store_order_audit_insert($value3);
}

if(isset($_POST['insert30'])){
		$value3 = $_POST[insert_value30];
		$user->odesso_app_module_store_order_coupon_insert($value3);
}

if(isset($_POST['insert31'])){
		$value3 = $_POST[insert_value31];
		$user->odesso_app_module_store_order_extra_fee_insert($value3);
}

if(isset($_POST['insert32'])){
		$value3 = $_POST[insert_value32];
		$user->odesso_app_module_store_order_item_insert($value3);
}

if(isset($_POST['insert33'])){
		$value3 = $_POST[insert_value33];
		$user->odesso_app_module_store_order_item_attribute_insert($value3);
}

if(isset($_POST['insert34'])){
		$value3 = $_POST[insert_value34];
		$user->odesso_app_module_store_order_media_file_insert($value3);
}

if(isset($_POST['insert35'])){
		$value3 = $_POST[insert_value35];
		$user->odesso_app_module_store_order_unit_type_location_mile_insert($value3);
}

if(isset($_POST['insert36'])){
		$value3 = $_POST[insert_value36];
		$user->odesso_app_module_store_service_cancellation_information_insert($value3);
}

if(isset($_POST['insert37'])){
		$value3 = $_POST[insert_value37];
		$user->odesso_app_module_store_shipping_method_insert($value3);
}

if(isset($_POST['insert38'])){
		$value3 = $_POST[insert_value38];
		$user->odesso_app_module_store_store_item_activity_audit_insert($value3);
}

if(isset($_POST['insert39'])){
		$value3 = $_POST[insert_value39];
		$user->odesso_app_module_store_store_item_auto_proved_insert($value3);
}

if(isset($_POST['insert40'])){
		$value3 = $_POST[insert_value40];
		$user->odesso_app_module_store_store_item_view_activity_audit_insert($value3);
}

if(isset($_POST['insert41'])){
		$value3 = $_POST[insert_value41];
		$user->odesso_app_module_store_tax_insert($value3);
}

if(isset($_POST['insert42'])){
		$value3 = $_POST[insert_value42];
		$user->odesso_app_module_user_insert($value3);
}

if(isset($_POST['insert43'])){
		$value3 = $_POST[insert_value43];
		$user->odesso_app_module_user_profile_attribute_insert($value3);
}

if(isset($_POST['insert44'])){
		$value3 = $_POST[insert_value44];
		$user->odesso_app_ref_icon_palette_insert($value3);
}

if(isset($_POST['insert45'])){
		$value3 = $_POST[insert_value45];
		$user->odesso_app_ref_theme_color_insert($value3);
}

if(isset($_POST['insert46'])){
		$value3 = $_POST[insert_value46];
		$user->odesso_client_insert($value3);
}

if(isset($_POST['insert47'])){
		$value3 = $_POST[insert_value47];
		$user->odesso_client_payment_info_insert($value3);
}

if(isset($_POST['insert48'])){
		$value3 = $_POST[insert_value48];
		$user->odesso_end_user_insert($value3);
}

if(isset($_POST['insert49'])){
		$value3 = $_POST[insert_value49];
		$user->odesso_end_user_SP_ITEM_LIST_insert($value3);
}



// Edit functions...

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
		// header('Location: '.BASE_URL().'/home11.php?id='.$_GET['id']);
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

if(isset($_POST['edit14_1'])){
	foreach($table13_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit14_2'])){
	foreach($table13_heading_insert as $value)
	{
		$value3 = $_POST[$value];
		
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit15'])){
	foreach($table14_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE_ORDER($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit16'])){
	foreach($table15_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_ADDRESS($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit17'])){
	foreach($table16_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit18'])){
	foreach($table17_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_store($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit19'])){
	foreach($table18_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ADDRESS($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit20'])){
	foreach($table19_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit21'])){
	foreach($table20_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_CART_ITEM($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit22'])){
	foreach($table21_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit23'])){
	foreach($table22_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_COUPON($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit24'])){
	foreach($table23_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_COUPON_REFERAL($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit25'])){
	foreach($table24_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_EXTRA_FEE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit26'])){
	foreach($table25_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit27'])){
	foreach($table26_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit28'])){
	foreach($table27_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit29'])){
	foreach($table28_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_AUDIT($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit30'])){
	foreach($table29_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_COUPON($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit31'])){
	foreach($table30_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit32'])){
	foreach($table31_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_ITEM($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit33'])){
	foreach($table32_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}



if(isset($_POST['edit34'])){
	foreach($table33_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit35'])){
	foreach($table34_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit36'])){
	foreach($table35_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit37'])){
	foreach($table36_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit38'])){
	foreach($table37_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit39'])){
	foreach($table38_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit40'])){
	foreach($table39_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit41'])){
	foreach($table40_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_TAX($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit42'])){
	foreach($table41_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit43'])){
	foreach($table42_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_USER_PROFILE_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}


if(isset($_POST['edit44'])){
	foreach($table43_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_REF_ICON_PALETTE($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit45'])){
	foreach($table44_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_REF_THEME_COLOR($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit46'])){
	foreach($table45_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_CLIENT($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit47'])){
	foreach($table46_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_CLIENT_PAYMENT_INFO($value,$updated_value,$key);
		}
	}
}



if(isset($_POST['edit48'])){
	foreach($table47_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_END_USER($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit49'])){
	foreach($table48_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_END_USER_SP_ITEM_LIST($value,$updated_value,$key);
		}
	}
}

$table1_arr[] 	= null;  $table2_arr[] 	= null;  $table3_1_arr[] = null; $table3_2_arr[] = null; $table4_arr[]  = null;
$table5_arr[]   = null;  $table6_arr[]  = null;  $table7_arr[] 	 = null; $table8_arr[] 	 = null; $table9_arr[]  = null;
$table10_arr[] 	= null;  $table11_arr[] = null;  $table12_arr[]  = null; $table13_arr[]  = null; $table14_arr[] = null;




?>

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
<!-- Table 2: _PT_ODESSO_APP_MODULE_STORE_CATEGORY-->
<div class="table-responsive">
	<h3> Table 1: Category Structure  </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_12.png" alt="Step 12" align="right" width="200px" height="354px"><p>In order to better structure your workflows, you can create different categories and subcategories.<ol>
	<li>To do so, leave the <i>ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID</i> column blank.</li>
	<li>Enter your <i>APP_ID</i> and <i>MERCHANT_ID</i></li>
	<li>For <i>PARENT_CATEGORY_TYPE</i>, you will want to choose either "Module" if it is appearing in the top level directory. Alternately you can choose "Category" if you want it to appear as a sub-category beneath another category.</li>
	<li>If you shose "Module" as the PARENT TYPE, then your <i>PARENT_ID</i> should be the APP_MODULE_ITEM_ID from the "Manage Menus" page. If this is a sub-menu, then the <i>PARENT_ID</i> should be the parent category's CATEGORY_ID.</li>
	<li>For <i>CATEGORY_NAME</i> choose what you want to appear on the front end of the app.</li>
	<li>For <i>IMAGE_LINK</i>, input an image you wish to use as the thumbnail image for the category.</li>
	<li>For <i>CATEGORY_DESCRIPTION</i>, input a short description to display underneath the category name.</li>
	<li>If you don't want to show the Image and Description, then set <i>IS_SHOW_IMAGE_AND_DESCRIPTION</i> to "0". To display it, set that column to "1".</li></ol></p>
	<!--- TABLE2 : INSERT STARTS--->
			<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
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
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert3'>Insert</button></td>";
				foreach ($table2_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value3[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE2 : INSERT ENDS--->
	<!--- TABLE2 : EDIT Starts--->
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table2_heading as $value)
					{
						$table1_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>$value</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table2= $user->table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id);
			
			foreach($table2 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit3' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
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
	<!--- TABLE2 : EDIT ENDS--->
</div>
<!-- End Table 2-->

<!-- Table 4: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM -->
<div class="table-responsive">
	<h3> Table 2: Building Your Workflows </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_5.png" alt="Step 5" align="right" width="200px" height="354px"><p>Let's add some items or services to sell in your store. We will want to create a new line and start adding attributes the item or service. This is where it gets a little complicated.<br>
	<ol><li>Leave the first column, <i>ODESSO_APP_MODULE_STORE_STORE_ITEM_ID</i> blank.</li>
	<li>Input your APP_ID and your MERCHANT_ID. (for this ) The PARENT_CATEGORY_TYPE is going to be "Module" -- because the Parent is the module called store. So scroll up to Step 2 and find your Store Module ID Number - and enter it underneath the "Parent ID".</li> 
	<li>
	Next, the "TYPE" is going to be 'Product' or 'Service'. Put '0' for MAX_ACCEPTANCE_LEVEL and PROVIDE_PRICE_SERVICE_PROVIDER_LEVEL. To have a transaction, make sure you have '1' for Transaction_Included.</li>
	<li>
	We will also create display rules here. Choose 1 for 'On' and 0 for 'Off' to include an image on the item page, to display the quantity and price, to allow people to edit the quantity of the item they wish to buy. Make sure you have fixed price set to 1 and priced after order set to 0. Set IS_ACTIVE to 1 to make the item show up in your store. </li>
	<li>
	We also have fulfillment options -- this is how your customer will interact with the app. Onsite means you are providing the location for a customer to go to. Offsite means the customer provides a location for your service providers to go to. Shipping is for apps that need to send mail products to a customer. </li>
	<li>
	Finally, put in the name of the item or service you wish to sell, a description, a thumbnail image, and optionally a link for the store item page. Once you're finished, scroll to the left and click "Insert"</li></ol></p>
	
	<!---TABLE 4 : Insert starts --->
	
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
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
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert5'>Insert</button></td>";
				foreach ($table4_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value5[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>	
	
	
	<!---TABLE 4 : Insert Ends --->
	<!---TABLE 4 : Edit  starts --->
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table2" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table4_heading as $value)
					{
						$table2_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table4= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);
			
			foreach($table4 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit5' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
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
	
	
	<!---TABLE 4 : Edit  Ends --->
	
</div>
<!-- End Table 4-->

<!-- Table 13 _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE -->
<div class="table-responsive">
	<h3> Table 3-1: Advanced Data Collection</h3>
	<p>To add more features to your workflows, you can add Attributes. These can be either price-based variants called "ATTRIBUTES" or they can be information collection-based "EXTRA INFO".<br><ol>
	<li>Leave the first column, <i>ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID</i> blank.</li>
	<li>Enter your <i>APP_ID</i> and the <i>STORE_ITEM_ID</i> of the item you wish to add the attribute to.</li></ol>
	<p>For Price-Based Variants:</p><ol>
	<li>If this is a price-based attribute, you will need to assign it an order. For example, an e-commerce store selling shirts may have different prices based on SIZE and COLOR. The <i>ATTRIBUTE_ORDER</i> ranks which attribute name you want to display first.</li>
	<li>Next you input the name of the first attribute as the <i>ATTRIBUTE_NAME</i>, for example SIZE.</li>
	<li>Then you input the value for the first attribute as the <i>ATTRIBUTE_VALUE</i>, for example SMALL</li>
	<li>Enter <b>"Attribute"</b> as the <i>ATTRIBUTE_TYPE</i>.</li>
	<li>Leave the rest blank and hit "Insert" to create a Price-based variant</li></ol>
	</p>
	<!---TABLE 14: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table13_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert14_1'>Insert</button></td>";
				foreach ($table13_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value14_1[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 14: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_attribute&param=1" method="post" name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_attribute&param=1" method="post" enctype="multipart/form-data" id="import_excel2" name="import_excel2" class="import_form">
				
					<input title = "Import"  type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file2").click()'   value="Import"/>
					<input type="file" name = "file" id="file2" style="display: none;" onchange= 'import_data(this.id,"import_excel2")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 14: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table3_1" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table13_heading as $value)
					{
						$table3_1_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table13 = $user->table1_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);
		
			foreach($table13 as $key=>$result)
			{

				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit14_1' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_store_item_attribute','ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID','1') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_store_item_attribute','ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 14: Edit ENDS 	 --->
</div>
<!-- End Table 13-->

<!-- Table 13 _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE -->
<div class="table-responsive">
	<h3> Table 3-2: Advanced Data Collection</h3>
	<p>To add more features to your workflows, you can add Attributes. These can be either price-based variants called "ATTRIBUTES" or they can be information collection-based "EXTRA INFO".<br><ol>
	<li>Leave the first column, <i>ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID</i> blank.</li>
	<li>Enter your <i>APP_ID</i> and the <i>STORE_ITEM_ID</i> of the item you wish to add the attribute to.</li></ol>
	<p>To Add Data Fields:</p><ol>
	<li>Leave <i>ATTRIBUTE_ORDER, ATTRIBUTE_NAME, and ATTRIBUTE_VALUE</i> blank.</li>
	<li>For <i>ATTRIBUTE_TYPE</i>, , enter the string "Extra Info". This is necessary so the machine recognizes it's a data collection field.</li>
	<li>The <i>NAME</i> is the display value of these. For example, the Label or the Checkbox's text.</li>
	<li>For <i>TYPE</i> you may choose one of the following: <b>Text Paragraph</b>, <b>Text Line</b>, <b>Label</b>, or <b>Checkbox</b>.</li>
	<li>The <i>EXTRA_INFO</i> can contain whatever information you wish, however it will not display inside of the app.</li>
	<li>For <i>ACCESS</i>, you can mark each attribute as either <b>PUBLIC</b> or <b>PRIVATE</b>, depending on if you want the SERVICE PROVIDER to be able to see it.</li>
	<li><i>IS_REQUIRED</i> can be toggled ON with a value of <b>1</b> and toggled OFF with a value of <b>0</b>. If it's on, a user must enter a value in order to complete the workflow.</li>
	<li><i>IS_ACTIVE</i> controls whether or not it displays in the app. </li></ol></p>
	<!---TABLE 14: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table13_heading_insert as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert14_2'>Insert</button></td>";
				foreach ($table13_heading_insert as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value14_2[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 14: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_attribute&param=2" method="post" name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_attribute&param=2" method="post" enctype="multipart/form-data" id="import_excel2" name="import_excel2" class="import_form">
				
					<input title = "Import"  type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file2").click()'   value="Import"/>
					<input type="file" name = "file" id="file2" style="display: none;" onchange= 'import_data(this.id,"import_excel2")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 14: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table3_2" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table13_heading_insert as $value)
					{
						$table3_2_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table13_2 = $user->table2_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);
		
			foreach($table13_2 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit14_2' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_store_item_attribute','ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID',2) >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_store_item_attribute','ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 14: Edit ENDS 	 --->
</div>
<!-- End Table 13-->

<!-- Table 5: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY -->
<div class="table-responsive">
	<h3> Table 4: Create Prices and Inventory </h3><br>
	<p>Now that we have a <i>STORE_ITEM</i> created - we can add the inventory. If you entered any price-based Variants, you must enter them here along with the price.<ol>
	<li>Start by living the <i>INVENTORY_ID</i> field blank, the system will generate that.</li>
	<li>Add the <i>APP_ID</i> and your newly created <i>STORE_ITEM_ID</i>.
	<li>With our apps, we can create different attributes. For example, if you are selling the a shirt with different sizes, the <i>ATTRIBUTE_NAME_LIST</i> is "/Size" and the <i>ATTRIBUTE_VALUE_LIST</i> is "/Small". Then you can create a new inventory item for "/Medium" and "/Large". For this exercise, leave these fields blank.</li>
	<li>You can also add an <i>ITEM_PRICE</i>, these are in cents. For example, to sell a service for $5, type in '500'.</li>
	<li>Make sure your <i>QUANTITY</i> is greater than zero (even if it's a service)</li>
	<li>The apps we are building for this exercise will not use <i>UNIT_TYPE</i>, <i>UNIT_PRICE</i>, or <i>UNIT_DISPLAY</i>, so you can put a value of "0" in for each of them.</li>
	<li>Press "Insert" when you're done.</li></ol></p>
	
	<!---TABLE 5: INSERT STARTS --->
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
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
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert6'>Insert</button></td>";
				foreach ($table5_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value6[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 5: INSERT ENDS --->
	<!---TABLE 5: EDIT ENDS --->
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table4" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table5_heading as $value)
					{
						$table4_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table5= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id);
		
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
	<!---TABLE5 : Edit Ends --->
</div>
<!-- End Table 5-->


<!-- Table 6: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE -->
<div class="table-responsive">
	<h3> Table 5: Adding Location and Time Data </h3><br>
	<p>Next we must activate each fulfillment and decide how each will display time.<ol>
	<li>First of all, leave the <i>STORE_ITEM_SCHEDULE_ID</i> blank, as this will be generated by the system.</li>
	<li>Next, input your <i>APP_ID</i> and your <i>STORE_ITEM_ID</i> into the appropriate columns.</li>
	<li>For <i>LOCATION_METHOD</i>, you will choose the fulfillment options you selected when you created the STORE_ITEM (ie. 'ONSITE', 'OFFSITE', or 'SHIPPING').</li>
	<li>Next is an important step, you will need to choose how the order is scheduled. You will choose <b>0 or 1 (OFF/ON)</b> for these. Basically, there are 3 choices in terms of time
	<ul><li>First is <i>SCHEDULE_FUTURE_TIME</i>. By assigning it '1', you give your customer the choice when they want an action completed. This is great for scheduling time with a service provider.</li>
	<li>Next is <i>SCHEDULE_NOW</i> - which you can activate by assigning it '1'. This creates an On-Demand experience (similar to Uber) - and it records the time at which a transaction is placed.</li>
	<li>Finally, if your app does not require time whatsoever, you can leave both blank by assigning them both '0'. This will discount time entirely from the order process, which is recommended for doing Shipping.</li></ul>
	<li>After you have assigned either 1 or 0 to the location methods, press 'Insert' to complete the addition of Time to your orders.</li></ol></p>
	<!---TABLE6 : Insert Starts --->
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
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
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert7'>Insert</button></td>";
				foreach ($table6_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value7[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE6 : Insert Ends --->
	<!---TABLE6 : Edit Starts --->

	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table5" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table6_heading as $value)
					{
						$table5_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table6= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id);
			
			foreach($table6 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit7' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
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

	<!---TABLE 6: Edit Ends--->
</div>
<!-- End Table 6-->
<!-- Table 12: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE-->
<div class="table-responsive">
	<h3> Table 6: Adding an Item Image </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_8.png" alt="Step 8" align="right" width="200px" height="354px"><p>To make your store item page look great, you can add one or multiple images to it. These images can be any dimensions.
	<ol><li>To do so, leave the <i>STORE_ITEM_IMAGE_ID</i> field blank, this is created by the system.</li>
	<li>Input your <i>APP_ID</i> and <i>STORE_ITEM_ID</i> in the appropriate columns.</li>
	<li>Next, you can add one IMAGE_LINK to the line. Make sure it is a direct link to the image, and it is https:// encrypted.</li> 
	<li>Press "Insert" to add the image. You can repeat this as many of these as you want for each item, and it will be swipable on the store item page.</li></ol></p>
	
	<!---TABLE 12: INSERT Statrts--->
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
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
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert13'>Insert</button></td>";
				foreach ($table12_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value13[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 12: INSERT Ends--->
	<!---TABLE 12: Edit Statrts--->
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table6 class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table12_heading as $value)
					{
						$table6_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table12 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);
			
			foreach($table12 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit13' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
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
	<!---TABLE 12: Edit Ends--->
</div>
<!-- End Table 12-->

<div class="table-responsive ">
	<h3 > Table 7: Turning Features On/Off </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Each app needs custom rules, and this table is where we set many of the features that an app will have. Below is a large table which covers things from E-Commerce settings to Notification settings to Cancellation workflow settings. This table uses binary commands <b>0 and 1</b> for <b>OFF/ON</b>. For example, if you want to add coupons to the app, look up <i>COUPON_INCLUDED</i> and change from 0 to 1.<br><br>
	For this demo, let's allow customers to upload images when they place an order. <ol>
	<li>To do so, simply assign '1' to <i>IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED</i>.</li> <li>The column next to it lets you set the maximum number of images a customer can upload to an order. Let's set <i>MAX_IMAGE_NUMBER</i> to '5'.</li>
	<li>Scroll back to the left and press "Update" to refresh the table.</li></ol><br>
	There are many more features in this table, but we will get to them later.</p>
	
	
	<!---TABLE 1: INSERT Statrts--->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table1_heading_insert as $value)
					{
						/* if($value=='ODESSO_APP_ID' || $value=='ODESSO_APP_FEATURE_ID')
						{
						echo "<th  class = 'hide_app_feature'>".$value."</th>";}else{
							
						echo "<th>".$value."</th>";
						} */
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert2'>Insert</button></td>";
				foreach ($table1_heading_insert as $key1=>$value)
				{
					/* if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_FEATURE_ID')
						{
							echo"<td><input class = 'hide_app_feature' type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value2[]'  value=''></td>";
						}else{
							
							echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value2[]' value=''></td>";
						} */
							echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value2[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 1: INSERT Ends--->
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_feature" method="post" name="export_excel" class="export_form">
				<button title = "Export" type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_feature" method="post" enctype="multipart/form-data" id="import_excel6" name="import_excel6" class="import_form">
				
					<input title = "Import" type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file6").click()'   value="Import"/>
					<input type="file" name = "file" id="file6" style="display: none;" onchange= 'import_data(this.id,"import_excel6")' />
				</form>
			</div>
		  </div>
	</div>
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table7" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					
					foreach($table1_heading as $value)
					{
						$table7_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						if($value=='ODESSO_APP_ID' || $value == 'ODESSO_APP_FEATURE_ID')
						{
							
						echo "<th  class = 'hide_app_feature'>".$value."</th>";
						}else{
							
						echo "<th>".$value."</th>";
						}
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			// $table1= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
		$table1			 = $user->table_ODESSO_APP_FEATURE_FOR_HomePage($odesso_app_id);

			foreach($table1 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit2' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_FEATURE_ID']."' onclick= copy_row(".$result['ODESSO_APP_FEATURE_ID'].",'_odesso_app_feature','ODESSO_APP_FEATURE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_FEATURE_ID']."' onclick= delete_row(".$result['ODESSO_APP_FEATURE_ID'].",'_odesso_app_feature','ODESSO_APP_FEATURE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_FEATURE_ID')
						{
						echo "<td  class = 'hide_app_feature' ><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div> 
<!-------- TABLE 1 ENDS ------>
</div>
</div>
</body>
</html>
<script src = "//code.jquery.com/jquery-1.12.4.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />

<script>
 $(document).ready(function() {
	

	/*  pre-populate ODESSO_APP_ID in "ODESSO_APP_ID" field for insert action... */
	$('.field_1').val('<?php echo $_GET['id'] ; ?>');
	
	
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	$('.field_1').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
	
   /*  $('.myTable').DataTable( {
        // "scrollY": 200,
        "scrollX": true
    } ); */
	
	/* Create an array with the values of all the input boxes in a column */
		$.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
		{
			return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
				return $('input', td).val();
			} );
		}

	var table1_arr  	= <?php echo json_encode($table1_arr)?>;
	
	var table2_arr  	= <?php echo json_encode($table2_arr)?>;
	
	var table3_1_arr 	= <?php echo json_encode($table3_1_arr)?>;
	
	var table3_2_arr  	= <?php echo json_encode($table3_2_arr)?>;
	
	var table4_arr  	= <?php echo json_encode($table4_arr)?>;
	
	var table5_arr  	= <?php echo json_encode($table5_arr)?>;
	
	var table6_arr  	= <?php echo json_encode($table6_arr)?>;
	
	var table7_arr  	= <?php echo json_encode($table7_arr)?>;
	
	
	/* Initialise the table1 with the required column ordering data types */
	$('#table1').DataTable( {
		"scrollX": true,
		"columns": table1_arr
	} );

	/* Initialise the table2 with the required column ordering data types */
	$('#table2').DataTable( {
		"scrollX": true,
		"columns": table2_arr
	} );

	/* Initialise the table3_1 with the required column ordering data types */
	$('#table3_1').DataTable( {
			"scrollX": true,
		"columns": table3_1_arr
	} );
	
	/* Initialise the table3_2 with the required column ordering data types */
	$('#table3_2').DataTable( {
			"scrollX": true,
		"columns": table3_2_arr
	} );

	/* Initialise the table4 with the required column ordering data types */
	$('#table4').DataTable( {
			"scrollX": true,
		"columns": table4_arr
	} );

	/* Initialise the table5 with the required column ordering data types */
	$('#table5').DataTable( {
			"scrollX": true,
		"columns": table5_arr
	} );

	/* Initialise the table6 with the required column ordering data types */
	$('#table6').DataTable( {
			"scrollX": true,
		"columns": table6_arr
	} );

	/* Initialise the table7 with the required column ordering data types */
	$('#table7').DataTable( {
			"scrollX": true,
		"columns": table7_arr
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
						
						// $('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL;?>/' + user_name + '/'+data.image_with_path);
						$('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL.'/uploads';?>/' + user_name + '/'+data.image_with_path);
						
					
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