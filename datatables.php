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
	
$table42_heading 		= $user->tablehead_ODESSO_APP_USER_PROFILE_ATTRIBUTE();
$table42		 		= $user->table_ODESSO_APP_USER_PROFILE_ATTRIBUTE($odesso_app_id);


$table43_heading 		= $user->tablehead_ODESSO_APP_REF_ICON_PALETTE();
$table43		 		= $user->table_ODESSO_APP_REF_ICON_PALETTE($odesso_app_id);


$aa[] 			= null;
$table1_arr[]   = null;
$table43_arr[]  = null;
foreach($table2_heading as $value)
					{
						 $aa[] = array('orderDataType' => 'dom-text',
						 'type' => 'string');
					
						
					}

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
							 $table1_arr[] = array('orderDataType' => 'dom-text', 'type' => 'string');
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



<div>
<div>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>Age</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
              
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Action</th>
                <th>Age</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                <th>Position</th>
                
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td><input id="row-1-age" name="row-1-age" value="61" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
               
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td><input id="row-2-age" name="row-2-age" value="63" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
              
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td><input id="row-3-age" name="row-3-age" value="66" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
               
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td><input id="row-4-age" name="row-4-age" value="22" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
              
            </tr>
           
		</tbody>
	</table>
	<script src = "//code.jquery.com/jquery-1.12.4.js"></script>
    <script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
	<script>

	/* Create an array with the values of all the input boxes in a column */
$.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
{
    return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
        return $('input', td).val();
    } );
}


 var aa 			= <?php echo json_encode($aa)?>;
 var table1_arr 	= <?php echo json_encode($table1_arr)?>;
 var table43_arr	= <?php echo json_encode($table43_arr)?>;
 // var aa =  [
// null,
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"},
// {"orderDataType":"dom-text","type":"string"}


// ];
 console.log(aa);
/* Initialise the table with the required column ordering data types */
$(document).ready(function() {
    $('#example').DataTable( {
        "columns": aa
    } ); 
	
	$('#table1').DataTable( {
        "columns": table1_arr
    } );
	
	$('#table43').DataTable( {
        "columns": table43_arr
    } );
} );
	</script>