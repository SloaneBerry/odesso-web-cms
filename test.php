<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
$session_id= $_SESSION['id'];
$pageid= $_GET['id'];

ob_start();
$table_heading 	 = $user->all_tables();
$table_cols 	 = $user->all_admin_cols();
$table_data 	 = $user->all_records();
$table_data2 	 = $user->all_records2();
// $update_value	 = $user->update_table_admin('password');
/*  	
 echo "<pre>";
		print_r($table_heading);
echo "</pre>";
 */

 echo "<pre>";
		print_r('colums are: ');
		print_r($table_cols);
echo "</pre>";  
 echo "<pre>";
		print_r('data are: ');
		echo "<br>";
		print_r($table_data);
echo "</pre>";   
/* echo "<pre>";
		print_r('data of location&schedule table');
		echo "<br>";
		print_r($table_data2);
echo "</pre>";  */
?>