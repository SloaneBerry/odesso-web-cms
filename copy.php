<?php
include_once 'config/dbconfig.php';
session_start();

	// die('cjj');
	$id 		 	= $_POST['id'];
	$tablename 		= $_POST['tablename'];
	$fieldname 	 	= $_POST['fieldname'];
	$param 		 	= $_POST['param'];
	$odesso_app_id 	= $_POST['odesso_app_id'];
	
	// fetch row from table...	
	$getRow = $user->getRow($id,$tablename,$fieldname);
	
	

	// remove ID column from fetched table...
	array_shift($getRow);
	
	// remove three fields, if table name '_odesso_app_module_store_store_item_attribute'for table3-1 ...
	if($tablename == '_odesso_app_module_store_store_item_attribute' && $param == '1'){
		
		unset($getRow['NAME']);
		unset($getRow['TYPE']);
		unset($getRow['EXTRA_INFO']);
	}
	
	// remove three fields, if table name '_odesso_app_module_store_store_item_attribute'for table3-2 ...
	if($tablename == '_odesso_app_module_store_store_item_attribute' && $param == '2'){
		
		unset($getRow['ATTRIBUTE_ORDER']);
		unset($getRow['ATTRIBUTE_NAME']);
		unset($getRow['ATTRIBUTE_VALUE']);
	}

	if(in_array($getRow['COUPON_STRING'],$getRow)){
		unset($getRow['COUPON_STRING']);
		
	}
	if(in_array($getRow['COUPON_STRING_REFERAL'],$getRow)){
		unset($getRow['COUPON_STRING_REFERAL']);
		
	}
	
	// get columns name...
	$columns = implode(',',array_keys($getRow));
	
	// get values...
	$values	 = '"'. implode('", "',array_values($getRow)) .'"';
	
	// Insert clone row into table....
	$insert = $user->duplicateRow($tablename,$columns,$values);
	
	/* auto insert 3 rows to "_odesso_app_module_store_store_item_location_schedule" table, 
	when row copied from "_odesso_app_module_store_store_item" table...  */
	
	if($tablename == '_odesso_app_module_store_store_item' && $insert){
		
		// fetch rows related to ODESSO_APP_MODULE_STORE_STORE_ITEM_ID i.e. $id ...
		$fetchRows = $user->fetch_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id,$id);
		
		
	
		foreach($fetchRows as $key => $rows){
				
				// remove ID column from fetched table...
				array_shift($rows);
	
				// get columns name...
				$columns11 = implode(',',array_keys($rows));
				
				$rows['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID'] = $insert;
				
				// get values...
				$values11	 = '"'. implode('", "',array_values($rows)) .'"';
				
				// Insert 3 rows into table....
				$user->duplicateRow_itemLocationSchedule('_odesso_app_module_store_store_item_location_schedule',$columns11,$values11);
					
				
		}
		
		
		/* // location method values for 3 rows...
		$location_method 		= array('Onsite','Offsite','Shipping');
		// $schedule_future_time 	= array('0','1','0');
		// $schedule_now 			= array('1','1','0');
		
		// auto insert 3 rows into odesso_app_module_store_store_item_location_schedule table...
		for($i = 0; $i<=2; $i++){
			
			$value33 = array('',$odesso_app_id,$insert,$location_method[$i],$schedule_future_time[$i],$schedule_now[$i]);
			
			$user->odesso_app_module_store_store_item_location_schedule_insert($value33);
			
		} */
	}

	if($insert){
		print_r('1');
	}else{
		print_r('0');
	}
?>