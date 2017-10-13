<?php
include_once 'config/dbconfig.php';
session_start();
	$id 		 = $_POST['id'];
	$tablename 	 = $_POST['tablename'];
	$fieldname 	 = $_POST['fieldname'];
	
	
	
	$check = $user->deleteRow($id,$tablename,$fieldname);

	if($check == 'deleted'){
		print_r('1');
	}else{
		print_r('0');
	}
?>