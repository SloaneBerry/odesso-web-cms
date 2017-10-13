<?php
 
 
include('config/config.php');
session_start();

$odesso_app_id	= $_GET['id'];
$tablename		= $_GET['table'];
$param			= $_GET['param'];
// $fieldname		= $_GET['fieldname'];

$table_prefix 	= $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
$tableName		= ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($table_prefix.''.$tablename) : $table_prefix.''.$tablename;
       
$fp = fopen('php://output', 'w');

if($tablename == '_odesso_app_ref_icon_palette' || $tablename == '_odesso_app_ref_theme_color' || $tablename == '_odesso_app_ref_string' || $tablename == '_odesso_client'){
	
	$SQL = "SELECT * FROM `".$tableName."` ";

}else if($tablename == '_odesso_app_module_store_store_item_attribute' && $param == '1'){
 		
	$SQL = "SELECT ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID,ODESSO_APP_ID,ODESSO_APP_MODULE_STORE_STORE_ITEM_ID,ATTRIBUTE_ORDER,ATTRIBUTE_NAME,ATTRIBUTE_VALUE,ATTRIBUTE_TYPE,
									  ACCESS,IS_REQUIRED,IS_ACTIVE FROM `".$tableName."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."' ";
		 
}else if($tablename == '_odesso_app_module_store_store_item_attribute' && $param == '2'){
		 
	$SQL = "SELECT ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID,ODESSO_APP_ID,ODESSO_APP_MODULE_STORE_STORE_ITEM_ID,ATTRIBUTE_TYPE,NAME,TYPE,EXTRA_INFO,
									 ACCESS,IS_REQUIRED,IS_ACTIVE FROM `".$tableName."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'";
	

}else{
	
$SQL = "SELECT * FROM `".$tableName."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'";

}

// echo "SELECT * FROM `".$tableName."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'";
$header = '';
$result = '';
$exportData = mysql_query ($SQL ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $exportData );
 
for ( $i = 0; $i < $fields; $i++ )
{
    $header[] = mysql_field_name( $exportData , $i ) . "\t";
}

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$tablename.'.csv');
fputcsv($fp, $header);

while( $row = mysql_fetch_row( $exportData ) )
{
	fputcsv($fp, $row);
}
exit;

// print "$header\n$result";
 
?>