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
				$user->update_ODESSO_APP_ADDRESS($value,$updated_value,$key);
		}
	}
}

if(isset($_POST['edit16'])){
	foreach($table15_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE_ORDER($value,$updated_value,$key);
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
$table15_arr[] 	= null;  $table16_arr[] = null;  $table17_arr[]  = null; $table18_arr[]  = null; $table19_arr[] = null;
$table20_arr[] 	= null;  $table21_arr[] = null;  $table22_arr[]  = null; $table23_arr[]  = null; $table24_arr[] = null;
$table25_arr[] 	= null;  $table26_arr[] = null;  $table27_arr[]  = null; $table28_arr[]  = null; $table29_arr[] = null;
$table30_arr[] 	= null;  $table31_arr[] = null;  $table32_arr[]  = null; $table33_arr[]  = null; $table34_arr[] = null;
$table35_arr[] 	= null;  $table36_arr[] = null;  $table37_arr[]  = null; $table38_arr[]  = null; $table39_arr[] = null;
$table40_arr[] 	= null;  $table41_arr[] = null;  $table42_arr[]  = null; $table43_arr[]  = null; $table44_arr[] = null;
$table45_arr[] = null;   $table46_arr[]  = null; $table47_arr[]  = null; $table48_arr[]  = null; $table49_arr[] = null;


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
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
	
	<div class = "csv_buttons">
	<?php if (isset($_GET['err'])) {?>
		<div class = "export_err">No Data Found!</div>
	<?php } ?>
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_category" method="post" name="export_excel" class="export_form">
				<button  title = "Export" type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_category" method="post" enctype="multipart/form-data" id="import_excel" name="import_excel" class="import_form">
				
					<input type="button" title = "Import" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file").click()'   value="Import"/>
					<input type="file" name = "file" id="file" style="display: none;" onchange= 'import_data(this.id,"import_excel")' />
				</form>
			</div>
		  </div>
	</div>
	<!--- TABLE2 : EDIT Starts--->
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit3' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID']."' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID'].",'_odesso_app_module_store_category','ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID']."' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID'].",'_odesso_app_module_store_category','ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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
	
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item" method="post"  name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item" method="post" enctype="multipart/form-data" id="import_excel1" name="import_excel1" class="import_form">
				
					<input title = "Import"  type="button" class="btn btn-primary button-loading" id="btnUpload" onclick = '$("#file1").click()'  value="Import"/>
					<input type="file" name = "file" id="file1" style="display: none;" onchange = 'import_data(this.id,"import_excel1")' />
				</form>
			</div>
		  </div>
	</div>
	<!---TABLE 4 : Edit  starts --->
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit5'>Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID'].",'_odesso_app_module_store_store_item','ODESSO_APP_MODULE_STORE_STORE_ITEM_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID'].",'_odesso_app_module_store_store_item','ODESSO_APP_MODULE_STORE_STORE_ITEM_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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
	<p>For Price-Based Variants:</p><ol>
	<li>If this is a price-based attribute, you will need to assign it an order. For example, an e-commerce store selling shirts may have different prices based on SIZE and COLOR. The <i>ATTRIBUTE_ORDER</i> ranks which attribute name you want to display first.</li>
	<li>Next you input the name of the first attribute as the <i>ATTRIBUTE_NAME</i>, for example SIZE.</li>
	<li>Then you input the value for the first attribute as the <i>ATTRIBUTE_VALUE</i>, for example SMALL</li>
	<li>Enter <b>"Attribute"</b> as the <i>ATTRIBUTE_TYPE</i>.</li>
	<li>Leave the rest blank and hit "Insert" to create a Price-based variant</li></ol>
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
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_inventory" method="post" name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_inventory" method="post" enctype="multipart/form-data" id="import_excel3" name="import_excel3" class="import_form">
				
					<input title = "Import"  type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file3").click()'   value="Import"/>
					<input type="file" name = "file" id="file3" style="display: none;" onchange= 'import_data(this.id,"import_excel3")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 5: EDIT STARTS --->
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit6' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID']."' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID'].",'_odesso_app_module_store_store_item_inventory','ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID']."' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID'].",'_odesso_app_module_store_store_item_inventory','ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						
					
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_location_schedule" method="post" name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_location_schedule" method="post" enctype="multipart/form-data" id="import_excel4" name="import_excel4" class="import_form">
				
					<input title = "Import"  type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file4").click()'   value="Import"/>
					<input type="file" name = "file" id="file4" style="display: none;" onchange= 'import_data(this.id,"import_excel4")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE6 : Edit Starts --->

	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit7' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID']."' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID'].",'_odesso_app_module_store_store_item_location_schedule','ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID']."' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID'].",'_odesso_app_module_store_store_item_location_schedule','ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
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
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_image" method="post" name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_image" method="post" enctype="multipart/form-data" id="import_excel5" name="import_excel5" class="import_form">
				
					<input title = "Import"  type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file5").click()'   value="Import"/>
					<input type="file" name = "file" id="file5" style="display: none;" onchange= 'import_data(this.id,"import_excel5")' />
				</form>
			</div>
		  </div>
	</div>
	
	<!---TABLE 12: Edit Statrts--->
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table6" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit13' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID']."' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID'].",'_odesso_app_module_store_store_item_image','ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID']."' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID'].",'_odesso_app_module_store_store_item_image','ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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

<!-- Table 1: _PT_ODESSO_APP_FEATURE STARTS-->

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
	
	<!------------------- EDIT STARTS  -------------->
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

<!-------- TABLE  STARTS ------>
<div class="table-responsive ">
	<h3 > Table 8:   // TABLE : _ODESSO_APP </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
	
	<!---TABLE : INSERT Starts--->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert1'>Insert</button></td>";
				
				foreach ($table_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'OA_field_".$key1." ODESSO_APP_".$key1."' name='insert_value1[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE : INSERT Ends--->
	
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app" method="post" name="export_excel" class="export_form">
				<button title = "Export"  type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app" method="post" enctype="multipart/form-data" id="import_excel7" name="import_excel7" class="import_form">
				
					<input title = "Import" type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file6").click()'   value="Import"/>
					<input type="file" name = "file" id="file7" style="display: none;" onchange= 'import_data(this.id,"import_excel7")' />
				</form>
			</div>
		  </div>
	</div>
	<!-------- EDIT STARTS ------------->
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table8" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					
					foreach($table_heading as $value)
					{
						$table8_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
						
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			// $table1= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
			$table			 = $user->table_ODESSO_APP($odesso_app_id);

			foreach($table as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit1' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_ID']."' onclick= copy_row(".$result['ODESSO_APP_ID'].",'_odesso_app','ODESSO_APP_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_ID']."' onclick= delete_row(".$result['ODESSO_APP_ID'].",'_odesso_app','ODESSO_APP_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						
						if($key1=='ODESSO_APP_ID' || $key1 == 'ODESSO_CLIENT_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div> 
<!-------- TABLE   ENDS ------>

<!-- Table 9 Starts-->
<div class="table-responsive">
	<h3 > Table 9:   // TABLE : _ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 7: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table7_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert8'>Insert</button></td>";
				foreach ($table7_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value8[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 7: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_app_profile_attribute" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_app_profile_attribute" method="post" enctype="multipart/form-data" id="import_excel8" name="import_excel8" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file8").click()'   value="Import"/>
					<input type="file" name = "file" id="file8" style="display: none;" onchange= 'import_data(this.id,"import_excel8")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 7: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table9" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table7_heading as $value)
					{
						$table9_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table7			 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);

			foreach($table7 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' class = 'update_icon' type='submit' name='edit8'</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_app_profile_attribute','ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_app_profile_attribute','ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 7: Edit ENDS 	 --->
</div>
<!-- End Table 9-->
<!-- Table 10 Starts-->
<div class="table-responsive">
	<h3 > Table 10:   // TABLE : _ODESSO_APP_MODULE_USER_USER_TYPE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 8: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table8_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert9'>Insert</button></td>";
				foreach ($table8_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value9[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 8: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_user_type" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_user_type" method="post" enctype="multipart/form-data" id="import_excel9" name="import_exce9" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file9").click()'   value="Import"/>
					<input type="file" name = "file" id="file9" style="display: none;" onchange= 'import_data(this.id,"import_excel9")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 8: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table10" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table8_heading as $value)
					{
						$table10_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table8			 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);

			foreach($table8 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit9' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID'].",'_odesso_app_module_user_user_type','ODESSO_APP_MODULE_USER_USER_TYPE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID'].",'_odesso_app_module_user_user_type','ODESSO_APP_MODULE_USER_USER_TYPE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_USER_TYPE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 8: Edit ENDS 	 --->
</div>
<!-- End Table 10-->
<!-- Table 11 Starts-->
<div class="table-responsive">
	<h3 > Table 11:   // TABLE : _ODESSO_APP_REF_STRING </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 9: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table9_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert10'>Insert</button></td>";
				foreach ($table9_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value10[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 9: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_ref_string" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_ref_string" method="post" enctype="multipart/form-data" id="import_excel10" name="import_exce10" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file10").click()'   value="Import"/>
					<input type="file" name = "file" id="file10" style="display: none;" onchange= 'import_data(this.id,"import_excel10")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 9: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table  id = "table11" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table9_heading as $value)
					{
						$table11_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table9 		 = $user->table_ODESSO_APP_REF_STRING($odesso_app_id);

			foreach($table9 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit10' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_REF_STRING_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_REF_STRING_ID'].",'_odesso_app_ref_string','ODESSO_APP_REF_STRING_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_REF_STRING_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_REF_STRING_ID'].",'_odesso_app_ref_string','ODESSO_APP_REF_STRING_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_REF_STRING_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 9: Edit ENDS 	 --->
</div>
<!-- End Table 11-->
<!-- Table 12 Starts-->
<div class="table-responsive">
	<h3 > Table 12:   // TABLE : _ODESSO_APP_MODULE_INFORMATION </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 10: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table10_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert11'>Insert</button></td>";
				foreach ($table10_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value11[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 10: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_information" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_information" method="post" enctype="multipart/form-data" id="import_excel11" name="import_exce11" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file11").click()'   value="Import"/>
					<input type="file" name = "file" id="file11" style="display: none;" onchange= 'import_data(this.id,"import_excel11")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 10: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table12" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table10_heading as $value)
					{
						$table12_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table10		 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);

			foreach($table10 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit11' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_INFORMATION_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_INFORMATION_ID'].",'_odesso_app_module_information','ODESSO_APP_MODULE_INFORMATION_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_INFORMATION_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_INFORMATION_ID'].",'_odesso_app_module_information','ODESSO_APP_MODULE_INFORMATION_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_INFORMATION_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 10: Edit ENDS 	 --->
</div>
<!-- End Table 12-->


<!-- Table 13 Starts-->
<div class="table-responsive">
	<h3 > Table 13:   // TABLE : _ODESSO_APP_MODULE_WEB </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 11: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table11_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert12'>Insert</button></td>";
				foreach ($table11_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value12[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 11: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_web" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_web" method="post" enctype="multipart/form-data" id="import_excel12" name="import_exce12" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file11").click()'   value="Import"/>
					<input type="file" name = "file" id="file12" style="display: none;" onchange= 'import_data(this.id,"import_excel12")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 11: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table13" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table11_heading as $value)
					{
						$table13_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table11 = $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);
			
			foreach($table11 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit12' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_WEB_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_WEB_ID'].",'_odesso_app_module_web','ODESSO_APP_MODULE_WEB_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_WEB_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_WEB_ID'].",'_odesso_app_module_web','ODESSO_APP_MODULE_WEB_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_WEB_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 11: Edit ENDS 	 --->
</div>
<!-- End Table 13-->

<!-- Table 14 Starts-->
<div class="table-responsive">
	<h3 > Table 14:   // TABLE :_ODESSO_APP_MODULE_ITEM </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 3: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table3_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert4'>Insert</button></td>";
				foreach ($table3_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value4[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 3: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_item" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_item" method="post" enctype="multipart/form-data" id="import_excel4" name="import_excel4" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file4").click()'   value="Import"/>
					<input type="file" name = "file" id="file4" style="display: none;" onchange= 'import_data(this.id,"import_excel4")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 3: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table14" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table3_heading as $value)
					{
						$table14_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table3 = $user->table_odesso_app_module_item($odesso_app_id);
			
			foreach($table3 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit4' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_ITEM_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_ITEM_ID'].",'_odesso_app_module_item','ODESSO_APP_MODULE_ITEM_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_ITEM_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_ITEM_ID'].",'_odesso_app_module_item','ODESSO_APP_MODULE_ITEM_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_ITEM_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."'></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 3: Edit ENDS 	 --->
</div>
<!-- End Table 14-->

<!-- Table 15 Starts-->
<div class="table-responsive">
	<h3 > Table 15:   // TABLE :_oDESSO_APP_ADDRESS </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 14: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table14_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert15'>Insert</button></td>";
				foreach ($table14_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value15[]' value=''></td>";
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
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_address" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_address" method="post" enctype="multipart/form-data" id="import_excel15" name="import_excel15" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file15").click()'   value="Import"/>
					<input type="file" name = "file" id="file15" style="display: none;" onchange= 'import_data(this.id,"import_excel15")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 14: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table15" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table14_heading as $value)
					{
						$table15_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table14 		 = $user->table_ODESSO_APPDESSO_APP_ADDRESS($odesso_app_id);

			foreach($table14 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit15' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_ADDRESS_ID'].",'_odesso_app_address','ODESSO_APP_ADDRESS_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_ADDRESS_ID'].",'_odesso_app_address','ODESSO_APP_ADDRESS_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_ADDRESS_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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
<!-- End Table 15-->

<!-- Table 16 Starts-->
<div class="table-responsive">
	<h3 > Table 16:   // TABLE :_odesso_app_feature_order </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 15: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table15_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert16'>Insert</button></td>";
				foreach ($table15_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value16[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 15: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_feature_order" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_feature_order" method="post" enctype="multipart/form-data" id="import_excel16" name="import_excel16" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file16").click()'   value="Import"/>
					<input type="file" name = "file" id="file16" style="display: none;" onchange= 'import_data(this.id,"import_excel16")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 15: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table16" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table15_heading as $value)
					{
						$table16_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table15 		 = $user->table_ODESSO_APP_FEATURE_ORDER($odesso_app_id);

			foreach($table15 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit16' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_FEATURE_ORDER_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_FEATURE_ORDER_ID'].",'_odesso_app_feature_order','ODESSO_APP_FEATURE_ORDER_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_FEATURE_ORDER_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_FEATURE_ORDER_ID'].",'_odesso_app_feature_order','ODESSO_APP_FEATURE_ORDER_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_FEATURE_ORDER_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ORDER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_FEATURE_ORDER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 15: Edit ENDS 	 --->
</div>
<!-- End Table 16-->

<!-- Table 17 Starts-->
<div class="table-responsive">
	<h3 > Table 17:   // TABLE :_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 16: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table16_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert17'>Insert</button></td>";
				foreach ($table16_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value17[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 16: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_item_activity_audit" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_item_activity_audit" method="post" enctype="multipart/form-data" id="import_excel17" name="import_excel17" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file17").click()'   value="Import"/>
					<input type="file" name = "file" id="file17" style="display: none;" onchange= 'import_data(this.id,"import_excel17")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 16: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table17" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table16_heading as $value)
					{
						$table17_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table16 		 = $user->table_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT($odesso_app_id);

			foreach($table16 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit17' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID'].",'_odesso_app_module_item_activity_audit','ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID'].",'_odesso_app_module_item_activity_audit','ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 16: Edit ENDS 	 --->
</div>
<!-- End Table 17-->

<!-- Table 18 Starts-->
<div class="table-responsive">
	<h3 > Table 18:   // TABLE :_odesso_app_module_store </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 17: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table17_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert18'>Insert</button></td>";
				foreach ($table17_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value18[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 17: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store" method="post" enctype="multipart/form-data" id="import_excel18" name="import_excel18" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file18").click()'   value="Import"/>
					<input type="file" name = "file" id="file18" style="display: none;" onchange= 'import_data(this.id,"import_excel18")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 17: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table18" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table17_heading as $value)
					{
						$table18_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table17 		 = $user->table_ODESSO_APP_MODULE_store($odesso_app_id);

			foreach($table17 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit18' class = 'update_icon' title = 'Update' class = 'update_icon' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ID'].",'_odesso_app_module_store','ODESSO_APP_MODULE_STORE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ID'].",'_odesso_app_module_store','ODESSO_APP_MODULE_STORE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 17: Edit ENDS 	 --->
</div>
<!-- End Table 18-->

<!-- Table 19 Starts-->
<div class="table-responsive">
	<h3> Table 19:   // TABLE :_odesso_app_module_store_address </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 18: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table18_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert19'>Insert</button></td>";
				foreach ($table18_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value19[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 18: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_address" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_address" method="post" enctype="multipart/form-data" id="import_excel19" name="import_excel19" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file19").click()'   value="Import"/>
					<input type="file" name = "file" id="file19" style="display: none;" onchange= 'import_data(this.id,"import_excel19")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 18: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table19" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table18_heading as $value)
					{
						$table19_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table18 		 = $user->table_ODESSO_APP_MODULE_STORE_ADDRESS($odesso_app_id);

			foreach($table18 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit19' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID'].",'_odesso_app_module_store_address','ODESSO_APP_MODULE_STORE_ADDRESS_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID'].",'_odesso_app_module_store_address','ODESSO_APP_MODULE_STORE_ADDRESS_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ADDRESS_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 18: Edit ENDS 	 --->
	
</div>
<!-- End Table 19-->


<!-- Table 20 Starts-->
<div class="table-responsive">
	<h3> Table 20:   // TABLE :_odesso_app_module_store_app_order_attribute </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 19: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table19_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert20'>Insert</button></td>";
				foreach ($table19_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value20[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 19: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_app_order_attribute" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_app_order_attribute" method="post" enctype="multipart/form-data" id="import_excel20" name="import_excel20" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file20").click()'   value="Import"/>
					<input type="file" name = "file" id="file20" style="display: none;" onchange= 'import_data(this.id,"import_excel20")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 19: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table20" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table19_heading as $value)
					{
						$table20_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table19 		 = $user->table_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE($odesso_app_id);

			foreach($table19 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit20' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID'].",'_odesso_app_module_store_app_order_attribute','ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID'].",'_odesso_app_module_store_app_order_attribute','ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 19: Edit ENDS 	 --->
	
</div>
<!-- End Table 20-->

<!-- Table 21 Starts-->
<div class="table-responsive">
	<h3> Table 21:   // TABLE :ODESSO_APP_MODULE_STORE_CART_ITEM </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 20: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table20_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert21'>Insert</button></td>";
				foreach ($table20_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value21[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 20: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_cart_item" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_cart_item" method="post" enctype="multipart/form-data" id="import_excel21" name="import_excel21" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file21").click()'   value="Import"/>
					<input type="file" name = "file" id="file21" style="display: none;" onchange= 'import_data(this.id,"import_excel21")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 20: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table21" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table20_heading as $value)
					{
						$table21_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table20 		 = $user->table_ODESSO_APP_MODULE_STORE_CART_ITEM($odesso_app_id);

			foreach($table20 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit21' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ID'].",'_odesso_app_module_store_cart_item','ODESSO_APP_MODULE_STORE_CART_ITEM_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ID'].",'_odesso_app_module_store_cart_item','ODESSO_APP_MODULE_STORE_CART_ITEM_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_CART_ITEM_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 20: Edit ENDS 	 --->
	
</div>
<!-- End Table 21-->

<!-- Table 22 Starts-->
<div class="table-responsive">
	<h3> Table 22:   // TABLE :ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 21: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table21_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert22'>Insert</button></td>";
				foreach ($table21_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value22[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 21: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_cart_item_attribute" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_cart_item_attribute" method="post" enctype="multipart/form-data" id="import_excel22" name="import_excel22" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file22").click()'   value="Import"/>
					<input type="file" name = "file" id="file22" style="display: none;" onchange= 'import_data(this.id,"import_excel22")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 21: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table22" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table21_heading as $value)
					{
						$table22_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table21 		 = $user->table_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE($odesso_app_id);

			foreach($table21 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit22' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_cart_item_attribute','ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_cart_item_attribute','ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 21: Edit ENDS 	 --->
	
</div>
<!-- End Table 22-->

<!-- Table 23 Starts-->
<div class="table-responsive">
	<h3> Table 23:   // TABLE :ODESSO_APP_MODULE_STORE_COUPON </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 21: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table22_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert23'>Insert</button></td>";
				foreach ($table22_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." coupon_ODESSO_APP_".$key1."' name='insert_value23[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 21: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_coupon" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_coupon" method="post" enctype="multipart/form-data" id="import_excel23" name="import_excel23" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file23").click()'   value="Import"/>
					<input type="file" name = "file" id="file23" style="display: none;" onchange= 'import_data(this.id,"import_excel23")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 21: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table23" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table22_heading as $value)
					{
						$table23_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table22 		 = $user->table_ODESSO_APP_MODULE_STORE_COUPON($odesso_app_id);

			foreach($table22 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit23' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_COUPON_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_COUPON_ID'].",'_odesso_app_module_store_coupon','ODESSO_APP_MODULE_STORE_COUPON_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_COUPON_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_COUPON_ID'].",'_odesso_app_module_store_coupon','ODESSO_APP_MODULE_STORE_COUPON_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_COUPON_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_COUPON_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_COUPON_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 22: Edit ENDS 	 --->
	
</div>
<!-- End Table 23-->

<!-- Table 24 Starts-->
<div class="table-responsive">
	<h3> Table 24:   // TABLE :ODESSO_APP_MODULE_STORE_COUPON_REFERAL </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 23: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table23_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert24'>Insert</button></td>";
				foreach ($table23_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value24[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 23: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_coupon_referal" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_coupon_referal" method="post" enctype="multipart/form-data" id="import_excel24" name="import_excel24" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file24").click()'   value="Import"/>
					<input type="file" name = "file" id="file24" style="display: none;" onchange= 'import_data(this.id,"import_excel24")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 23: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table24" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table23_heading as $value)
					{
						$table24_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table23 		 = $user->table_ODESSO_APP_MODULE_STORE_COUPON_REFERAL($odesso_app_id);

			foreach($table23 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit24' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID'].",'_odesso_app_module_store_coupon_referal','ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID'].",'_odesso_app_module_store_coupon_referal','ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 23: Edit ENDS 	 --->
	
</div>
<!-- End Table 24-->

<!-- Table 25 Starts-->
<div class="table-responsive">
	<h3> Table 25:   // TABLE :ODESSO_APP_MODULE_STORE_EXTRA_FEE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 24: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table24_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert25'>Insert</button></td>";
				foreach ($table24_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value25[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 23: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_extra_fee" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_extra_fee" method="post" enctype="multipart/form-data" id="import_excel25" name="import_excel25" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file25").click()'   value="Import"/>
					<input type="file" name = "file" id="file25" style="display: none;" onchange= 'import_data(this.id,"import_excel25")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 23: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table25" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table24_heading as $value)
					{
						$table25_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table24 		 = $user->table_ODESSO_APP_MODULE_STORE_EXTRA_FEE($odesso_app_id);


			foreach($table24 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit25' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID'].",'_odesso_app_module_store_extra_fee','ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID'].",'_odesso_app_module_store_extra_fee','ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 24: Edit ENDS 	 --->
	
</div>
<!-- End Table 25-->


<!-- Table 26 Starts-->
<div class="table-responsive">
	<h3> Table 26:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 25: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table25_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert26'>Insert</button></td>";
				foreach ($table25_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value26[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 25: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order" method="post" enctype="multipart/form-data" id="import_excel26" name="import_excel26" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file26").click()'   value="Import"/>
					<input type="file" name = "file" id="file26" style="display: none;" onchange= 'import_data(this.id,"import_excel26")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 25: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table26" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table25_heading as $value)
					{
						$table26_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table25 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER($odesso_app_id);


			foreach($table25 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit26' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ID'].",'_odesso_app_module_store_order','ODESSO_APP_MODULE_STORE_ORDER_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ID'].",'_odesso_app_module_store_order','ODESSO_APP_MODULE_STORE_ORDER_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 25: Edit ENDS 	 --->
	
</div>
<!-- End Table 26-->

<!-- Table 27 Starts-->
<div class="table-responsive">
	<h3> Table 27:   // TABLE :table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 26: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table26_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert27'>Insert</button></td>";
				foreach ($table26_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value27[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 26: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_address" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_address" method="post" enctype="multipart/form-data" id="import_excel27" name="import_excel27" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file27").click()'   value="Import"/>
					<input type="file" name = "file" id="file27" style="display: none;" onchange= 'import_data(this.id,"import_excel27")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 26: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table27" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table26_heading as $value)
					{
						$table27_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table26 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id);


			foreach($table26 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit27' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID'].",'_odesso_app_module_store_order_address','ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID'].",'_odesso_app_module_store_order_address','ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 26: Edit ENDS 	 --->
	
</div>
<!-- End Table 27-->

<!-- Table 28 Starts-->
<div class="table-responsive">
	<h3> Table 28:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 27: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table27_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert28'>Insert</button></td>";
				foreach ($table27_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value28[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 27: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_attribute" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_attribute" method="post" enctype="multipart/form-data" id="import_excel28" name="import_excel28" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file28").click()'   value="Import"/>
					<input type="file" name = "file" id="file28" style="display: none;" onchange= 'import_data(this.id,"import_excel28")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 27: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table28" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table27_heading as $value)
					{
						$table28_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table27 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE($odesso_app_id);


			foreach($table27 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit28' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID'].",'_odesso_app_module_store_order_attribute','ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID'].",'_odesso_app_module_store_order_attribute','ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 27: Edit ENDS 	 --->
	
</div>
<!-- End Table 28-->

<!-- Table 29 Starts-->
<div class="table-responsive">
	<h3> Table 29:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_AUDIT </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 28: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table28_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert29'>Insert</button></td>";
				foreach ($table28_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value29[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 28: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_audit" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_audit" method="post" enctype="multipart/form-data" id="import_excel29" name="import_excel29" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file29").click()'   value="Import"/>
					<input type="file" name = "file" id="file29" style="display: none;" onchange= 'import_data(this.id,"import_excel29")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 28: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table29" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table28_heading as $value)
					{
						$table29_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table28 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_AUDIT($odesso_app_id);


			foreach($table28 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit29' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID'].",'_odesso_app_module_store_order_audit','ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID'].",'_odesso_app_module_store_order_audit','ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 28: Edit ENDS 	 --->
	
</div>
<!-- End Table 29-->

<!-- Table 30 Starts-->
<div class="table-responsive">
	<h3> Table 30:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_COUPON </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 29: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table29_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert30'>Insert</button></td>";
				foreach ($table29_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value30[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 29: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_coupon" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_coupon" method="post" enctype="multipart/form-data" id="import_excel30" name="import_excel30" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file30").click()'   value="Import"/>
					<input type="file" name = "file" id="file30" style="display: none;" onchange= 'import_data(this.id,"import_excel30")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 29: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table30" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table29_heading as $value)
					{
						$table30_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table29 	= $user->table_ODESSO_APP_MODULE_STORE_ORDER_COUPON($odesso_app_id);


			foreach($table29 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit30' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID'].",'_odesso_app_module_store_order_coupon','ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID'].",'_odesso_app_module_store_order_coupon','ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 29: Edit ENDS 	 --->
	
</div>
<!-- End Table 30 -->

<!-- Table 31 Starts-->
<div class="table-responsive">
	<h3> Table 31:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 30: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table30_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert31'>Insert</button></td>";
				foreach ($table30_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value31[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 30: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_extra_fee" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_extra_fee" method="post" enctype="multipart/form-data" id="import_excel31" name="import_excel31" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file31").click()'   value="Import"/>
					<input type="file" name = "file" id="file31" style="display: none;" onchange= 'import_data(this.id,"import_excel31")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 30: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table31" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table30_heading as $value)
					{
						$table31_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table30 		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE($odesso_app_id);


			foreach($table30 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit31' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID'].",'_odesso_app_module_store_order_extra_fee','ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID'].",'_odesso_app_module_store_order_extra_fee','ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 30: Edit ENDS 	 --->
	
</div>
<!-- End Table 31 -->

<!-- Table 32 Starts-->
<div class="table-responsive">
	<h3> Table 32:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_ITEM </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 31: INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table31_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert32'>Insert</button></td>";
				foreach ($table31_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value32[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 31: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_item" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_item" method="post" enctype="multipart/form-data" id="import_excel32" name="import_excel32" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file32").click()'   value="Import"/>
					<input type="file" name = "file" id="file32" style="display: none;" onchange= 'import_data(this.id,"import_excel32")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 31: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table32" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table31_heading as $value)
					{
						$table32_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table31		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ITEM($odesso_app_id);

			foreach($table31 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit32' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID'].",'_odesso_app_module_store_order_item','ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID'].",'_odesso_app_module_store_order_item','ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 31: Edit ENDS 	 --->
	
</div>
<!-- End Table 32 -->

<!-- Table 33 Starts-->
<div class="table-responsive">
	<h3> Table 33:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 32 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table32_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert33'>Insert</button></td>";
				foreach ($table32_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value33[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 32: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_item_attribute" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_item_attribute" method="post" enctype="multipart/form-data" id="import_excel33" name="import_excel33" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file33").click()'   value="Import"/>
					<input type="file" name = "file" id="file33" style="display: none;" onchange= 'import_data(this.id,"import_excel33")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 32: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table33" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table32_heading as $value)
					{
						$table33_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table32		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE($odesso_app_id);

			foreach($table32 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit33' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_order_item_attribute','ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID'].",'_odesso_app_module_store_order_item_attribute','ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 32: Edit ENDS 	 --->
	
</div>
<!-- End Table 33 -->

<!-- Table 34 Starts-->
<div class="table-responsive">
	<h3> Table 34:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 33 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table33_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert34'>Insert</button></td>";
				foreach ($table33_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value34[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 33: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_media_file" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_media_file" method="post" enctype="multipart/form-data" id="import_excel34" name="import_excel34" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file34").click()'   value="Import"/>
					<input type="file" name = "file" id="file34" style="display: none;" onchange= 'import_data(this.id,"import_excel34")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 33: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table34" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table33_heading as $value)
					{
						$table34_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table33		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE($odesso_app_id);

			foreach($table33 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit34' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID'].",'_odesso_app_module_store_order_media_file','ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID'].",'_odesso_app_module_store_order_media_file','ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 33: Edit ENDS 	 --->
	
</div>
<!-- End Table 34 -->

<!-- Table 35 Starts-->
<div class="table-responsive">
	<h3> Table 35:   // TABLE :ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 34 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table34_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert35'>Insert</button></td>";
				foreach ($table34_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value35[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 34: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_unit_type_location_mile" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_order_unit_type_location_mile" method="post" enctype="multipart/form-data" id="import_excel35" name="import_excel35" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file35").click()'   value="Import"/>
					<input type="file" name = "file" id="file35" style="display: none;" onchange= 'import_data(this.id,"import_excel35")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 34: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table35" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table34_heading as $value)
					{
						$table35_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table34		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE($odesso_app_id);

			foreach($table34 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit35' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID'].",'_odesso_app_module_store_order_unit_type_location_mile','ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID'].",'_odesso_app_module_store_order_unit_type_location_mile','ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 34: Edit ENDS 	 --->
	
</div>
<!-- End Table 35 -->

<!-- Table 36 Starts-->
<div class="table-responsive">
	<h3> Table 36:   // TABLE :ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 35 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table35_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert36'>Insert</button></td>";
				foreach ($table35_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value36[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 35: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_service_cancellation_information" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_service_cancellation_information" method="post" enctype="multipart/form-data" id="import_excel36" name="import_excel36" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file36").click()'   value="Import"/>
					<input type="file" name = "file" id="file36" style="display: none;" onchange= 'import_data(this.id,"import_excel36")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 35: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table36" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table35_heading as $value)
					{
						$table36_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table35		 = $user->table_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION($odesso_app_id);

			foreach($table35 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit36' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID'].",'_odesso_app_module_store_service_cancellation_information','ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID'].",'_odesso_app_module_store_service_cancellation_information','ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 35: Edit ENDS 	 --->
	
</div>
<!-- End Table 36-->

<!-- Table 37 Starts-->
<div class="table-responsive">
	<h3> Table 37:   // TABLE :ODESSO_APP_MODULE_STORE_SHIPPING_METHOD </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 36 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table36_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert37'>Insert</button></td>";
				foreach ($table36_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value37[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 36: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_shipping_method" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_shipping_method" method="post" enctype="multipart/form-data" id="import_excel37" name="import_excel37" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file37").click()'   value="Import"/>
					<input type="file" name = "file" id="file37" style="display: none;" onchange= 'import_data(this.id,"import_excel37")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 36: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table37" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table36_heading as $value)
					{
						$table37_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table36		 = $user->table_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($odesso_app_id);

			foreach($table36 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit37' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID'].",'_odesso_app_module_store_shipping_method','ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID'].",'_odesso_app_module_store_shipping_method','ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 36: Edit ENDS 	 --->
	
</div>
<!-- End Table 37-->

<!-- Table 38 Starts-->
<div class="table-responsive">
	<h3> Table 38:   // TABLE :ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 37 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table37_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert38'>Insert</button></td>";
				foreach ($table37_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value38[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 37: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_activity_audit" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_activity_audit" method="post" enctype="multipart/form-data" id="import_excel38" name="import_excel38" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file38").click()'   value="Import"/>
					<input type="file" name = "file" id="file38" style="display: none;" onchange= 'import_data(this.id,"import_excel38")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 37: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table38" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table37_heading as $value)
					{
						$table38_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table37		 = $user->table_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT($odesso_app_id);

			foreach($table37 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit38' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID'].",'_odesso_app_module_store_store_item_activity_audit','ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID'].",'_odesso_app_module_store_store_item_activity_audit','ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 37: Edit ENDS 	 --->
	
</div>
<!-- End Table 38-->

<!-- Table 39 Starts-->
<div class="table-responsive">
	<h3> Table 39:   // TABLE :ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 38 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table38_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert39'>Insert</button></td>";
				foreach ($table38_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value39[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 38: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_auto_proved" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_auto_proved" method="post" enctype="multipart/form-data" id="import_excel39" name="import_excel39" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file39").click()'   value="Import"/>
					<input type="file" name = "file" id="file39" style="display: none;" onchange= 'import_data(this.id,"import_excel39")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 38: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table39" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table38_heading as $value)
					{
						$table39_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table38		 = $user->table_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED($odesso_app_id);

			foreach($table38 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit39' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID'].",'_odesso_app_module_store_store_item_auto_proved','ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID'].",'_odesso_app_module_store_store_item_auto_proved','ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_AUTO_PROVED_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 38: Edit ENDS 	 --->
	
</div>
<!-- End Table 39 -->

<!-- Table 40 Starts-->
<div class="table-responsive">
	<h3> Table 40:   // TABLE :ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 39 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table39_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert40'>Insert</button></td>";
				foreach ($table39_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value40[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 39: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_view_activity_audit" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_store_item_view_activity_audit" method="post" enctype="multipart/form-data" id="import_excel40" name="import_excel40" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file40").click()'   value="Import"/>
					<input type="file" name = "file" id="file40" style="display: none;" onchange= 'import_data(this.id,"import_excel40")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 39: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table40" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table39_heading as $value)
					{
						$table40_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table39		 = $user->table_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT($odesso_app_id);

			foreach($table39 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit40' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID'].",'_odesso_app_module_store_store_item_view_activity_audit','ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID'].",'_odesso_app_module_store_store_item_view_activity_audit','ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 39: Edit ENDS 	 --->
	
</div>
<!-- End Table 40 -->

<!-- Table 41 Starts-->
<div class="table-responsive">
	<h3> Table 41:   // TABLE :ODESSO_APP_MODULE_STORE_TAX </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 40 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table40_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert41'>Insert</button></td>";
				foreach ($table40_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value41[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 40: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_tax" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_tax" method="post" enctype="multipart/form-data" id="import_excel41" name="import_excel41" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file41").click()'   value="Import"/>
					<input type="file" name = "file" id="file41" style="display: none;" onchange= 'import_data(this.id,"import_excel41")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 40: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table41" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table40_heading as $value)
					{
						$table41_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table40		 = $user->table_ODESSO_APP_MODULE_STORE_TAX($odesso_app_id);

			foreach($table40 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit41' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_TAX_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_TAX_ID'].",'_odesso_app_module_store_tax','ODESSO_APP_MODULE_STORE_TAX_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_TAX_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_TAX_ID'].",'_odesso_app_module_store_tax','ODESSO_APP_MODULE_STORE_TAX_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_TAX_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_TAX_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_TAX_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 40: Edit ENDS 	 --->
	
</div>
<!-- End Table 41 -->

<!-- Table 42 Starts-->
<div class="table-responsive">
	<h3> Table 42:   // TABLE :ODESSO_APP_MODULE_USER </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 41 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table41_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert42'>Insert</button></td>";
				foreach ($table41_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value42[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 40: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user" method="post" enctype="multipart/form-data" id="import_excel42" name="import_excel42" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file42").click()'   value="Import"/>
					<input type="file" name = "file" id="file42" style="display: none;" onchange= 'import_data(this.id,"import_excel42")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 39: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table42" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table41_heading as $value)
					{
						$table42_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table41		 = $user->table_ODESSO_APP_MODULE_USER($odesso_app_id);

			foreach($table41 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit42' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_ID'].",'_odesso_app_module_user','ODESSO_APP_MODULE_USER_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_ID'].",'_odesso_app_module_user','ODESSO_APP_MODULE_USER_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 41: Edit ENDS 	 --->
	
</div>
<!-- End Table 42 -->

<!-- Table 43 Starts-->
<div class="table-responsive">
	<h3> Table 43:   // TABLE :ODESSO_APP_USER_PROFILE_ATTRIBUTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 42 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table42_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert43'>Insert</button></td>";
				foreach ($table42_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value43[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 42: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_profile_attribute" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_profile_attribute" method="post" enctype="multipart/form-data" id="import_excel43" name="import_excel43" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file43").click()'   value="Import"/>
					<input type="file" name = "file" id="file43" style="display: none;" onchange= 'import_data(this.id,"import_excel43")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 42: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table43" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table42_heading as $value)
					{
						$table43_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table42		 = $user->table_ODESSO_APP_USER_PROFILE_ATTRIBUTE($odesso_app_id);

			foreach($table42 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit43' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_profile_attribute','ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_profile_attribute','ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 42: Edit ENDS 	 --->
	
</div>
<!-- End Table 43 -->

<!-- Table 44 Starts-->
<div class="table-responsive">
	<h3> Table 44:   // TABLE :ODESSO_APP_REF_ICON_PALETTE </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 43 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table43_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert44'>Insert</button></td>";
				foreach ($table43_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." palatte_ODESSO_APP_".$key1."' name='insert_value44[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 43: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_ref_icon_palette" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_ref_icon_palette" method="post" enctype="multipart/form-data" id="import_excel44" name="import_excel44" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file44").click()'   value="Import"/>
					<input type="file" name = "file" id="file44" style="display: none;" onchange= 'import_data(this.id,"import_excel44")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 43: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table44" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table43_heading as $value)
					{
						$table44_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table43		 = $user->table_ODESSO_APP_REF_ICON_PALETTE($odesso_app_id);

			foreach($table43 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit44' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_REF_ICON_PALETTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_REF_ICON_PALETTE_ID'].",'_odesso_app_ref_icon_palette','ODESSO_APP_REF_ICON_PALETTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_REF_ICON_PALETTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_REF_ICON_PALETTE_ID'].",'_odesso_app_ref_icon_palette','ODESSO_APP_REF_ICON_PALETTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_REF_ICON_PALETTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_ICON_PALETTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_REF_ICON_PALETTE_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 43: Edit ENDS 	 --->
	
</div>
<!-- End Table 44 -->

<!-- Table 45 Starts-->
<div class="table-responsive">
	<h3> Table 45:   // TABLE :ODESSO_APP_REF_THEME_COLOR </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 44 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table44_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert45'>Insert</button></td>";
				foreach ($table44_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." palatte_ODESSO_APP_".$key1."' name='insert_value45[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 44: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_ref_theme_color" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_ref_theme_color" method="post" enctype="multipart/form-data" id="import_excel45" name="import_excel45" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file45").click()'   value="Import"/>
					<input type="file" name = "file" id="file45" style="display: none;" onchange= 'import_data(this.id,"import_excel45")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 44: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table45" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table44_heading as $value)
					{
						$table45_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table44		 = $user->table_ODESSO_APP_REF_THEME_COLOR($odesso_app_id);

			foreach($table44 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit45' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_REF_THEME_COLOR_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_REF_THEME_COLOR_ID'].",'_odesso_app_ref_theme_color','ODESSO_APP_REF_THEME_COLOR_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_REF_THEME_COLOR_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_REF_THEME_COLOR_ID'].",'_odesso_app_ref_theme_color','ODESSO_APP_REF_THEME_COLOR_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_REF_THEME_COLOR_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_THEME_COLOR_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_REF_THEME_COLOR_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 44: Edit ENDS 	 --->
	
</div>
<!-- End Table 45 -->

<!-- Table 46 Starts-->
<div class="table-responsive">
	<h3> Table 46:   // TABLE :ODESSO_CLIENT </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 45 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table45_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert46'>Insert</button></td>";
				foreach ($table45_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value46[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 45: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_client" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_client" method="post" enctype="multipart/form-data" id="import_excel46" name="import_excel46" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file46").click()'   value="Import"/>
					<input type="file" name = "file" id="file46" style="display: none;" onchange= 'import_data(this.id,"import_excel46")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 45: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table46" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table45_heading as $value)
					{
						$table46_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table45		 = $user->table_ODESSO_CLIENT($odesso_app_id);

			foreach($table45 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit46' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_CLIENT_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_CLIENT_ID'].",'_odesso_client','ODESSO_CLIENT_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_CLIENT_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_CLIENT_ID'].",'_odesso_client','ODESSO_CLIENT_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_CLIENT_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_CLIENT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_CLIENT_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 45: Edit ENDS 	 --->
	
</div>
<!-- End Table 46 -->

<!-- Table 47 Starts-->
<div class="table-responsive">
	<h3> Table 47:   // TABLE :ODESSO_CLIENT_PAYMENT_INFO </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 46 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table46_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert47'>Insert</button></td>";
				foreach ($table46_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value47[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 46: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_client_payment_info" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_client_payment_info" method="post" enctype="multipart/form-data" id="import_excel47" name="import_excel47" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file47").click()'   value="Import"/>
					<input type="file" name = "file" id="file47" style="display: none;" onchange= 'import_data(this.id,"import_excel47")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 46: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table47" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table46_heading as $value)
					{
						$table47_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table46		 = $user->table_ODESSO_CLIENT_PAYMENT_INFO($odesso_app_id);

			foreach($table46 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit47' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_CLIENT_PAYMENT_INFO_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_CLIENT_PAYMENT_INFO_ID'].",'_odesso_client_payment_info','ODESSO_CLIENT_PAYMENT_INFO_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_CLIENT_PAYMENT_INFO_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_CLIENT_PAYMENT_INFO_ID'].",'_odesso_client_payment_info','ODESSO_CLIENT_PAYMENT_INFO_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_CLIENT_PAYMENT_INFO_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_CLIENT_PAYMENT_INFO_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_CLIENT_PAYMENT_INFO_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 46: Edit ENDS 	 --->
	
</div>
<!-- End Table 47 -->

<!-- Table 48 Starts-->
<div class="table-responsive">
	<h3> Table 48:   // TABLE :ODESSO_END_USER </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 47 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table47_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert48'>Insert</button></td>";
				foreach ($table47_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value48[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 47: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_end_user" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_end_user" method="post" enctype="multipart/form-data" id="import_excel48" name="import_excel48" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file48").click()'   value="Import"/>
					<input type="file" name = "file" id="file48" style="display: none;" onchange= 'import_data(this.id,"import_excel48")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 47: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table48" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table47_heading as $value)
					{
						$table48_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table47		 = $user->table_ODESSO_END_USER($odesso_app_id);

			foreach($table47 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit48' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_END_USER_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_END_USER_ID'].",'_odesso_end_user','ODESSO_END_USER_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_END_USER_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_END_USER_ID'].",'_odesso_end_user','ODESSO_END_USER_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_END_USER_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_END_USER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_END_USER_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 47: Edit ENDS 	 --->
	
</div>
<!-- End Table 48 -->

<!-- Table 49 Starts-->
<div class="table-responsive">
	<h3> Table 49:   // TABLE :ODESSO_END_USER_SP_ITEM_LIST </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
		when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
		It has survived not only five centuries, but also the leap into electronic typesetting, 
		remaining essentially unchanged. It was popularised in the 2060s with the release of Letraset 
		sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
		like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!---TABLE 48 INSERT STARTS --->
	
	<form class = "frm_insert" method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table48_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert49'>Insert</button></td>";
				foreach ($table48_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value49[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 48: INSERT ENDS 	 --->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_end_user_sp_item_list" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_end_user_sp_item_list" method="post" enctype="multipart/form-data" id="import_excel49" name="import_excel49" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file49").click()'   value="Import"/>
					<input type="file" name = "file" id="file49" style="display: none;" onchange= 'import_data(this.id,"import_excel49")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!---TABLE 48: Edit STARTS   --->
	
	
	
	<form method="post" action="home11.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table49" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table48_heading as $value)
					{
						$table49_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table48		 = $user->table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id);

			foreach($table48 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit49' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_END_USER_SP_ITEM_LIST_ID'].",'_odesso_end_user_sp_item_list','ODESSO_END_USER_SP_ITEM_LIST_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_END_USER_SP_ITEM_LIST_ID'].",'_odesso_end_user_sp_item_list','ODESSO_END_USER_SP_ITEM_LIST_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_END_USER_SP_ITEM_LIST_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."'></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 48: Edit ENDS 	 --->
	
</div>
<!-- End Table 49 -->



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
	$('.OA_field_0').val('<?php echo $_GET['id'] ; ?>');
	
	
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
	
	var table8_arr  	= <?php echo json_encode($table8_arr)?>;
	
	var table9_arr  	= <?php echo json_encode($table9_arr)?>;
	
	var table10_arr 	= <?php echo json_encode($table10_arr)?>;
	
	var table11_arr 	= <?php echo json_encode($table11_arr)?>;
	
	var table12_arr 	= <?php echo json_encode($table12_arr)?>;
	
	var table13_arr 	= <?php echo json_encode($table13_arr)?>;
	
	var table14_arr 	= <?php echo json_encode($table14_arr)?>;
	
	var table15_arr 	= <?php echo json_encode($table15_arr)?>;
	
	var table16_arr 	= <?php echo json_encode($table16_arr)?>;
	
	var table17_arr 	= <?php echo json_encode($table17_arr)?>;
	
	var table18_arr 	= <?php echo json_encode($table18_arr)?>;
		
	var table19_arr 	= <?php echo json_encode($table19_arr)?>;

	var table20_arr 	= <?php echo json_encode($table20_arr)?>;
	
	var table21_arr 	= <?php echo json_encode($table21_arr)?>;
	
	var table22_arr 	= <?php echo json_encode($table22_arr)?>;
	
	var table23_arr 	= <?php echo json_encode($table23_arr)?>;
	
	var table24_arr 	= <?php echo json_encode($table24_arr)?>;
	
	var table25_arr 	= <?php echo json_encode($table25_arr)?>;
	
	var table26_arr 	= <?php echo json_encode($table26_arr)?>;
	
	var table27_arr 	= <?php echo json_encode($table27_arr)?>;
	
	var table28_arr 	= <?php echo json_encode($table28_arr)?>;
	
	var table29_arr 	= <?php echo json_encode($table29_arr)?>;
	
	var table30_arr 	= <?php echo json_encode($table30_arr)?>;
	
	var table31_arr 	= <?php echo json_encode($table31_arr)?>;
	
	var table32_arr 	= <?php echo json_encode($table32_arr)?>;
	
	var table33_arr 	= <?php echo json_encode($table33_arr)?>;
	
	var table34_arr 	= <?php echo json_encode($table34_arr)?>;
		
	var table35_arr 	= <?php echo json_encode($table35_arr)?>;
	
	var table36_arr 	= <?php echo json_encode($table36_arr)?>;
	
	var table37_arr 	= <?php echo json_encode($table37_arr)?>;
	
	var table38_arr 	= <?php echo json_encode($table38_arr)?>;
	
	var table39_arr		= <?php echo json_encode($table39_arr)?>;
	
	var table40_arr 	= <?php echo json_encode($table40_arr)?>;
	
	var table41_arr 	= <?php echo json_encode($table41_arr)?>;
	
	var table42_arr 	= <?php echo json_encode($table42_arr)?>;
	
	var table43_arr 	= <?php echo json_encode($table43_arr)?>;
	
	var table44_arr 	= <?php echo json_encode($table44_arr)?>;
	
	var table45_arr 	= <?php echo json_encode($table45_arr)?>;
	
	var table46_arr 	= <?php echo json_encode($table46_arr)?>;
	
	var table47_arr 	= <?php echo json_encode($table47_arr)?>;
	
	var table48_arr 	= <?php echo json_encode($table48_arr)?>;
	
	var table49_arr 	= <?php echo json_encode($table49_arr)?>;
	
	
	
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

	/* Initialise the table8 with the required column ordering data types */
	$('#table8').DataTable( {
			"scrollX": true,
		"columns": table8_arr
	} );

	/* Initialise the table9 with the required column ordering data types */
	$('#table9').DataTable( {
			"scrollX": true,
		"columns": table9_arr
	} );

	/* Initialise the table10 with the required column ordering data types */
	$('#table10').DataTable( {
			"scrollX": true,
		"columns": table10_arr
	} );

	/* Initialise the table11 with the required column ordering data types */
	$('#table11').DataTable( {
			"scrollX": true,
		"columns": table11_arr
	} );

	/* Initialise the table12 with the required column ordering data types */
	$('#table12').DataTable( {
			"scrollX": true,
		"columns": table12_arr
	} );

	/* Initialise the table13 with the required column ordering data types */
	$('#table13').DataTable( {
			"scrollX": true,
		"columns": table13_arr
	} );

	/* Initialise the table14 with the required column ordering data types */
	$('#table14').DataTable( {
			"scrollX": true,
		"columns": table14_arr
	} );

	/* Initialise the table15 with the required column ordering data types */
	$('#table15').DataTable( {
			"scrollX": true,
		"columns": table15_arr
	} );

	/* Initialise the table16 with the required column ordering data types */
	$('#table16').DataTable( {
			"scrollX": true,
		"columns": table16_arr
	} );

	/* Initialise the table17 with the required column ordering data types */
	$('#table17').DataTable( {
			"scrollX": true,
		"columns": table17_arr
	} );

	/* Initialise the table18 with the required column ordering data types */
	$('#table18').DataTable( {
			"scrollX": true,
		"columns": table18_arr
	} );

	/* Initialise the table19 with the required column ordering data types */
	$('#table19').DataTable( {
			"scrollX": true,
		"columns": table19_arr
	} );

	/* Initialise the table20 with the required column ordering data types */
	$('#table20').DataTable( {
			"scrollX": true,
		"columns": table20_arr
	} );

	
	/* Initialise the table21 with the required column ordering data types */
	$('#table21').DataTable( {
			"scrollX": true,
		"columns": table21_arr
	} );

	
	/* Initialise the table22 with the required column ordering data types */
	$('#table22').DataTable( {
			"scrollX": true,
		"columns": table22_arr
	} );

	
	/* Initialise the table23 with the required column ordering data types */
	$('#table23').DataTable( {
			"scrollX": true,
		"columns": table23_arr
	} );

	
	/* Initialise the table24 with the required column ordering data types */
	$('#table24').DataTable( {
			"scrollX": true,
		"columns": table24_arr
	} );

	
	/* Initialise the table25 with the required column ordering data types */
	$('#table25').DataTable( {
			"scrollX": true,
		"columns": table25_arr
	} );

	
	/* Initialise the table26 with the required column ordering data types */
	$('#table26').DataTable( {
			"scrollX": true,
		"columns": table26_arr
	} );

	
	/* Initialise the table27 with the required column ordering data types */
	$('#table27').DataTable( {
			"scrollX": true,
		"columns": table27_arr
	} );

	
	/* Initialise the table28 with the required column ordering data types */
	$('#table28').DataTable( {
			"scrollX": true,
		"columns": table28_arr
	} );

	
	/* Initialise the table29 with the required column ordering data types */
	$('#table29').DataTable( {
			"scrollX": true,
		"columns": table29_arr
	} );

	
	/* Initialise the table30 with the required column ordering data types */
	$('#table30').DataTable( {
			"scrollX": true,
		"columns": table30_arr
	} );

	/* Initialise the table31 with the required column ordering data types */
	$('#table31').DataTable( {
			"scrollX": true,
		"columns": table31_arr
	} );

	/* Initialise the table32 with the required column ordering data types */
	$('#table32').DataTable( {
			"scrollX": true,
		"columns": table32_arr
	} );

	/* Initialise the table33 with the required column ordering data types */
	$('#table33').DataTable( {
			"scrollX": true,
		"columns": table33_arr
	} );

	/* Initialise the table34 with the required column ordering data types */
	$('#table34').DataTable( {
			"scrollX": true,
		"columns": table34_arr
	} );

	/* Initialise the table35 with the required column ordering data types */
	$('#table35').DataTable( {
			"scrollX": true,
		"columns": table35_arr
	} );

	/* Initialise the table36 with the required column ordering data types */
	$('#table36').DataTable( {
			"scrollX": true,
		"columns": table36_arr
	} );

	/* Initialise the table37 with the required column ordering data types */
	$('#table37').DataTable( {
			"scrollX": true,
		"columns": table37_arr
	} );

	/* Initialise the table38 with the required column ordering data types */
	$('#table38').DataTable( {
			"scrollX": true,
		"columns": table38_arr
	} );

	/* Initialise the table39 with the required column ordering data types */
	$('#table39').DataTable( {
			"scrollX": true,
		"columns": table39_arr
	} );

	/* Initialise the table40 with the required column ordering data types */
	$('#table40').DataTable( {
			"scrollX": true,
		"columns": table40_arr
	} );

	/* Initialise the table41 with the required column ordering data types */
	$('#table41').DataTable( {
			"scrollX": true,
		"columns": table41_arr
	} );

	/* Initialise the table42 with the required column ordering data types */
	$('#table42').DataTable( {
			"scrollX": true,
		"columns": table42_arr
	} );

	/* Initialise the table43 with the required column ordering data types */
	$('#table43').DataTable( {
			"scrollX": true,
		"columns": table43_arr
	} );

	/* Initialise the table44 with the required column ordering data types */
	$('#table44').DataTable( {
			"scrollX": true,
		"columns": table44_arr
	} );

	/* Initialise the table45 with the required column ordering data types */
	$('#table45').DataTable( {
			"scrollX": true,
		"columns": table45_arr
	} );

	/* Initialise the table46 with the required column ordering data types */
	$('#table46').DataTable( {
			"scrollX": true,
		"columns": table46_arr
	} );

	/* Initialise the table47 with the required column ordering data types */
	$('#table47').DataTable( {
			"scrollX": true,
		"columns": table47_arr
	} );

	/* Initialise the table48 with the required column ordering data types */
	$('#table48').DataTable( {
			"scrollX": true,
		"columns": table48_arr
	} );

	/* Initialise the table49 with the required column ordering data types */
	$('#table49').DataTable( {
			"scrollX": true,
		"columns": table49_arr
	} );

	
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	$('.field_1').prop('readonly',true);
	$('.OA_field_0').prop('readonly',true);
	$('.OA_field_1').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.coupon_ODESSO_APP_1').prop('required',true);
	$('.att_ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
	
   
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
					if(response){
						var data = JSON.parse(response);
						if(data.result != '0'){
							// alert(data.image_with_path);
							$('.error_msg').css('display','none');
							$('.success_msg').css('display','block');
							
							$('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL.'/uploads';?>/' + user_name + '/'+data.image_with_path);
						
						
						}else{
										
							$('.error_msg').css('display','none');
							$('.success_msg').css('display','block');
							
							$('.error_msg').html('Image not Uploaded! Please Try Again.');
						} 
					}
				}
			});
		}
	
	}else{
			
		alert('Only GIF, PNG & JPEG Format allowed! ');
		return false;
	}
			
			
}

function copy_row(id,tablename,fieldname,param=''){
	
	var odesso_app_id = '<?php echo $_GET['id'];?>';
	// $('#loadingmessage').show();  // show the loading message.
	$.ajax({
       type: 'POST',
      url: "<?php echo BASE_URL?>/copy.php",
      data: {'id':id, 'tablename':tablename,'fieldname':fieldname,'param':param,'odesso_app_id':odesso_app_id},
      
      success: function(resultData) {
			 // $('#loadingmessage').hide();  // hide the loading message.
			 if(resultData == '1'){ location.reload(); }else {
			  alert('Row doesnot Copy, Try Again!');
			} 
		 }
	});
}

function update_row(id,tablename,fieldname){
	// $('#loadingmessage').show();  // show the loading message.
	$.ajax({
       type: 'POST',
      url: "<?php echo BASE_URL?>/edit.php",
      data: {'id':id, 'tablename':tablename,'fieldname':fieldname},
      
      success: function(resultData) {
		  // $('#loadingmessage').hide();  // hide the loading message.
			if(resultData == '1'){   window.location.reload(); }else {
			  alert('Row doesnot Updated, Try Again!');
			}
		 }
	});
	 
	
}

function delete_row(id,tablename,fieldname){
	var r = confirm("Are you Sure to Delete this Row?");
	if (r == true) {
		// txt = "You pressed OK!";
		// $('#loadingmessage').show();  // show the loading message.
		$.ajax({
		   type: 'POST',
		  url: "<?php echo BASE_URL?>/delete.php",
		  data: {'id':id, 'tablename':tablename,'fieldname':fieldname},
		  
		  success: function(resultData) {
			  // $('#loadingmessage').hide();  // hide the loading message.
				if(resultData == '1'){   window.location.reload(); }else {
				  alert('Row doesnot deleted, Try Again!');
				}
			 }
		});
	 
	
	} 
}


function import_data(id,formname){
	// alert(id);
  if($('#'+id).val()) {
		// you have a file
		var file_data = $("input[id='"+id+"']").prop("files")[0];   // Getting the properties of file from file field
			
			if(file_data.type == 'application/vnd.ms-excel' || file_data.type == 'application/csv'){
				
				$('#'+formname).submit();
			}else{
				alert('Please Upload only CSV format file!');
			}
		 
	}else{
		alert('No file selected');
	}
	
}



</script>