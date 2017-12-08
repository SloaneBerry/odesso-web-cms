<?php

include_once 'config/dbconfig.php';
session_start();

$tablename 		= $_GET['table'];
$param 			= $_GET['param'] ?  $_GET['param'] : '' ;
$pageURL		= $_GET['page'];

// die('stop');
if(!empty($_FILES['file']['name']) ){
	
$extension =  pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
						
	if($extension != 'csv'){

	}

	//open uploaded csv file with read only mode
	
	$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
		
	while (($result = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
				
		$arr[] = $result;
				
	}
	
	
	$trimedarray 	 = array_map("trim",$arr[0]);

	$modifiedarray   = array_values(array_filter($trimedarray)); 

	$columns = implode(",", $modifiedarray);
	
	
	array_shift($arr);		//to remove first index which contains headers from csv files...
			
	foreach($arr as $key => $val){
		
		$values 	= implode('","',$val) ;
		
	
		$insert   	= $user->importData($tablename,$columns,$values);

				  
	} 
			// die('stop to check!!!');
			
	header('Location: '. BASE_URL .'/'.$pageURL.'?id='.$_GET['id'].'');
          		
}else{
	echo 'Error';
}
?>