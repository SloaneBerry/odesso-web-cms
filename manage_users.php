<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
$session_id= $_SESSION['id'];
$pageid= $_GET['id'];



if($session_id != $pageid){
header("Location:index.php");
}-
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

$table13_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13 		 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);

$table14_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS();
$table14		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id);

$table15_heading = $user->tablehead_ODESSO_END_USER();
$table15		 = $user->table_ODESSO_END_USER($odesso_app_id);

$table16_heading = $user->tablehead_ODESSO_END_USER_SP_ITEM_LIST();
$table16		 = $user->table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id);

if(isset($_POST['logout'])){
	 $user->logout();
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
		$user->odesso_app_module_store_store_item_insert($value3);
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
		$user->odesso_app_module_store_store_item_attribute_insert($value3);
}




if(isset($_POST['edit1'])){
	foreach($table15_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_END_USER($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}

if(isset($_POST['edit2'])){
	foreach($table7_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit3'])){
	foreach($table16_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_END_USER_SP_ITEM_LIST($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit4'])){
	foreach($table8_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		
		
		foreach($value3 as $key=>$updated_value)
		{
		
				$user->update_ODESSO_APP_MODULE_USER_USER_TYPE($value['COLUMN_NAME'],$updated_value,$key);
		}
		// header('Location: '.BASE_URL().'/home11.php?id='.$_GET['id']);
	}
}
if(isset($_POST['edit5'])){
	foreach($table7_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}


$table1_arr[] = null; $table2_arr[] = null; $table3_arr[] = null; $table4_arr[]   = null;  $table5_arr[]   = null;  
?>

<style>
	
</style>
<?php include 'header.php';?>
<!----------------------------- Upload image div Starts ---------------------------------->
<div class="upload_img">
		<div style = "display:none" class = "success_msg"></div>
		<div style = "display:none" class = "error_msg"></div>
		<input type = "hidden" id = "user_APP_ID" value = "<?php echo $_GET['id']?>"/>
		<input type = "hidden" id = "user_name"   value = "<?php echo $_SESSION['username']?>"/>
		<input type = "button" class = "upload_btn" value = "Upload Image" onclick = "img_click()"/>
		
		<input type="file" 	   id="my_file" value = ""onchange = "upload()" style="display: none;" />
</div>				

<!----------------------------- Upload image div Ends	  ---------------------------------->


<div class="container">
<div class="row">
<!-- Table 6-->
<div class="table-responsive">
	<h3> Table 1: End User List</h3>
	<form method="post" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table id= "table1" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo '<th>Action</th>';
					foreach($table15_heading as $value)
					{
						$table1_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table1_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table15 = $user->table_ODESSO_END_USER($odesso_app_id);
			
			foreach($table15 as $key=>$result)
			{
					echo "<tr>";
					echo "<td><button  name='edit1' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_END_USER_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_END_USER_ID'].",'_odesso_end_user','ODESSO_END_USER_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_END_USER_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_END_USER_ID'].",'_odesso_end_user','ODESSO_END_USER_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_END_USER_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result[	'ODESSO_END_USER_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table1_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_END_USER_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
							// echo "<td><input type='text' name=".$key1."[".$result['ODESSO_END_USER_ID']."] value='".$value."' ></td>";
							echo "<td><textarea name=".$key1."[".$result['ODESSO_END_USER_ID']."] >".$value."</textarea></td>";
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	
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
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_end_user&page=<?php echo basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])?>" method="post" enctype="multipart/form-data" id="import_excel1" name="import_excel1" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file1").click()'   value="Import"/>
					<input type="file" name = "file" id="file1" style="display: none;" onchange= 'import_data(this.id,"import_excel1")' />
				</form>
			</div>
		  </div>
	</div>
	
</div>
<!-- End Table 6-->

<!-- Table 7-->
<div class="table-responsive">
	<h3> Table 2: View End User Attributes </h3>
	<form method="post" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table id= "table2" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table7_heading as $value)
					{
						$table2_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table7_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
		
			foreach($table7 as $key=>$result)
			{
					echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' class = 'update_icon' type='submit' name='edit2'</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_app_profile_attribute','ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_app_profile_attribute','ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table4_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
							}
							else
							{
								if(in_array($key1,$table7_heading_tinyint))
								{
									$checked_box = '';
									if($value == '1')
									{
										$checked_box = 'checked';
									}
									echo "<td>
									<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
									
									<input type='hidden' class='coloumn_checkbox'
									
									name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
								}
								else
								{
									
									// echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
									echo "<td><textarea name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] >".$value."</textarea></td>";
								}
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
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
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_app_profile_attribute&page=<?php echo basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])?>" method="post" enctype="multipart/form-data" id="import_excel2" name="import_excel2" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file2").click()'   value="Import"/>
					<input type="file" name = "file" id="file2" style="display: none;" onchange= 'import_data(this.id,"import_excel2")' />
				</form>
			</div>
		  </div>
	</div>
</div>
<!-- End Table 7-->
<!-- Table 16: _PT_ODESSO_APP_MODULE_USER_USER_TYPE -->
<div class="table-responsive">
	<h3> Table 3: Update Provider Services </h3>
	<!-- TABLE 8: Edit Starts	 -->
	
	<form method="post" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table3" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table16_heading as $value)
					{
						$table3_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table16_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table16		 = $user->table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id);

			foreach($table16 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit3' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_END_USER_SP_ITEM_LIST_ID'].",'_odesso_end_user_sp_item_list','ODESSO_END_USER_SP_ITEM_LIST_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_END_USER_SP_ITEM_LIST_ID'].",'_odesso_end_user_sp_item_list','ODESSO_END_USER_SP_ITEM_LIST_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_END_USER_SP_ITEM_LIST_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table16_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."] value='".$value."' ></td>";
							}
							else
							{
								echo "<td><textarea name=".$key1."[".$result['ODESSO_END_USER_SP_ITEM_LIST_ID']."] >".$value."</textarea></td>";
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE 8: Edit Ends	 -->
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
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_end_user_sp_item_list&page=<?php echo basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])?>" method="post" enctype="multipart/form-data" id="import_excel3" name="import_excel3" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file3").click()'   value="Import"/>
					<input type="file" name = "file" id="file3" style="display: none;" onchange= 'import_data(this.id,"import_excel3")' />
				</form>
			</div>
		  </div>
	</div>
	
	</div>
<!-- End Table 16-->
<!-- Table 8: _PT_ODESSO_APP_MODULE_USER_USER_TYPE -->
<div class="table-responsive">
	<h3> Table 4: Add User Types </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_9.png" alt="Step 9" align="right" width="200px" height="354px"><p>Now that our store has an item in it, let's create user types so that someone can place an order. There are 3 types of basic User_Type: <b>'Customer'</b>, <b>'Service Provider'</b>, <b>'Merchant'</b>. These each have separate workflows associated with them. :et's create some user types for your app.
	<ol><li>To start, leave the <i>MODULE_USER_USER_TYPE_ID</i> blank, this will be created by the system.</li>
	<li>Next input your <i>APP_ID</i></li>
	<li>For <i>USER_TYPE</i> input either 'Customer' 'Service Provider' or 'Merchant'. It must be that exact string.</li>
	<li><i>SUB_TYPE</i> is an advanced feature, so you can put '0' there for now.</li> 
	<li>The <i>SIGN_UP_BUTTON_STRING</i> displays on the Sign-In page. You can put anything you want an end user to see when they sign up, I would suggest putting something such as "Sign up as a Customer" or "Sign up as a Service Provider" here.</li>
	<li>The column <i>PRIMARY_LOCATION_ADDRESS_REQUIRED</i> lets us collect the end user's address when they sign up, and use that address to send push notifications and requests to appear. We'd highly suggest putting "1" for your Service Providers, if not all of your users.</li>
	<li>For <i>PRIMARY_LOCATION_METHOD</i>, type in the string 'Address'.</li> 
	<li><i>IS_ONLINE_STATUS_REQUIRED</i> gives people the option to turn location-based notifications on and off, so put "1" if you want to grant that to users, or "0" if you want them to receive notifications no matter what.</li>
	<li><i>IS_DISPLAY_SIGNUP</i> determines whether or not anyone can sign up as a specific user type on the main screen. Put "1" if you want users to be able to register as that user type on the Sign-Up screen, or put 0 if you only want users of that type to be uploaded on the backend.</li></ol></p>
	<!--- TABLE 8: INSERT Starts --->
	<form method="post" class = "frm_insert" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table8_heading as $value)
					{
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table8_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table8 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert9'>Insert</button></td>";
				foreach ($table8_heading as $key1=>$value)
				{
					if(in_array($value['COLUMN_NAME'],$table8_heading_tinyint))
					{
						
						echo"<td>
							<input type='checkbox'  onchange='coloumn_checkbox(this)'>
							<input type='hidden' class = 'field_".$key1." ODESSO_APP_".$key1." coloumn_checkbox' name='insert_value9[]' value='0'>
						</td>";
					}
					else
					{
						
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value9[]' value=''></td>";
					}
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE 8: INSERT Ends	 --->
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
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_user_type&page=<?php echo basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])?>" method="post" enctype="multipart/form-data" id="import_excel4" name="import_exce4" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file4").click()'   value="Import"/>
					<input type="file" name = "file" id="file4" style="display: none;" onchange= 'import_data(this.id,"import_excel4")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!--- TABLE 8: Edit Starts	 --->
	
	<form method="post" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table4" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table8_heading as $value)
					{
						$table4_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table8 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);
			
			foreach($table8 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' type='submit' name='edit4' >Update</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID'].",'_odesso_app_module_user_user_type','ODESSO_APP_MODULE_USER_USER_TYPE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID'].",'_odesso_app_module_user_user_type','ODESSO_APP_MODULE_USER_USER_TYPE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_USER_TYPE_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table8_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
							// echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."'></td>";
							echo "<td><textarea rows = '4' cols = '30' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."]>".$value."</textarea></td>";
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE 8: Edit Ends	 --->
	
	</div>
<!-- End Table 8-->
<!-- Table 7: _PT_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE -->
<div class="table-responsive">
	<h3> Table 5: Add User Attributes  </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_10.png" alt="Step 10" align="right" width="200px" height="354px"><p>You can control what information you collect from a user when they sign up from you here. For example, if you wish to collect a customer's Profile Picture or if you want to collect a taxi driver's license plate number, we can add customer fields for that information.<ol><li>First of all, leave <i>PROFILE_ATTRIBUTE_ID</i> blank.</li>
	<li>Next, insert your <i>APP_ID.</i></li>
	<li>For your <i>USER_TYPE</i>, type in the string of the user type you want to add the attribute to ('Customer', 'Service Provider', 'Merchant').</li>
	<li>For <i>NAME</i>, enter the name of the attrivbute that you want displayed in the app.</li>
	<li>For <i>TYPE</i>, you may enter either 'Text Line' (for 1 line of text), 'Text Paragraph' (for multiple lines of text), or 'Image' (for a user to upload an image.</li>
	<li>You can choose to make <i>ACCESS</i> "Public" or "Private" by entering one of those.</li>
	<li>Finally, under IS_ACTIVE make '1' to display the question, or '0' to hide it.</li>
	<li>When you're done press "Insert".</li> </ol></p>
	
	<!--- TABLE 7: INSERT starts--->
	<form method="post" class = "frm_insert" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table7_heading as $value)
					{
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table7_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert8'>Insert</button></td>";
				foreach ($table7_heading as $key1=>$value)
				{
					
					if(in_array($value['COLUMN_NAME'],$table7_heading_tinyint))
					{
						
						echo"<td>
							<input type='checkbox'  onchange='coloumn_checkbox(this)'>
							<input type='hidden' class = 'field_".$key1." ODESSO_APP_".$key1." coloumn_checkbox' name='insert_value8[]' value='0'>
						</td>";
					}
					else
					{
						
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value8[]' value=''></td>";
					}
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE 7: INSERT Ends--->
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
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_user_app_profile_attribute&page=<?php echo basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])?>" method="post" enctype="multipart/form-data" id="import_excel5" name="import_excel5" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file5").click()'   value="Import"/>
					<input type="file" name = "file" id="file5" style="display: none;" onchange= 'import_data(this.id,"import_excel5")' />
				</form>
			</div>
		  </div>
	</div>
	<!--- TABLE 7: Edit Starts--->
	
	<form method="post" action="manage_users.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table5" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table7_heading as $value)
					{
						$table5_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table7_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
			
			foreach($table7 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button class = 'update_icon' title = 'Update' class = 'update_icon' type='submit' name='edit5'</button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_app_profile_attribute','ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID'].",'_odesso_app_module_user_app_profile_attribute','ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table7_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
							// echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
							echo "<td><textarea rows = '4' cols = '30'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."]>".$value."</textarea></td>";
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE 7: Edit Ends--->
	
	
</div>
<!-- End Table 7-->




<!-- Table 13-->
</div>
</div>
</body>
</html>
<script src = "//code.jquery.com/jquery-1.12.4.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
	
<script>
 $(document).ready(function() {
	
	$('.field_1').val('<?php echo $_GET['id'] ; ?>');
	// $('.OA_field_0').val('<?php echo $_GET['id'] ; ?>');
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
	
    /* $('.myTable').DataTable( {
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
	
	var table3_arr  	= <?php echo json_encode($table3_arr)?>;
	
	var table4_arr  	= <?php echo json_encode($table4_arr)?>;
	
	var table5_arr  	= <?php echo json_encode($table5_arr)?>;
	console.log(table1_arr);
	
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
	
	/* Initialise the table3 with the required column ordering data types */
	$('#table3').DataTable( {
		"scrollX": true,
		"columns": table3_arr
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

function coloumn_checkbox(that)
{
	if($(that).is(':checked'))
	{
		$(that).parent('td').find('input.coloumn_checkbox').val('1');
	}
	else
	{
		$(that).parent('td').find('input.coloumn_checkbox').val('0');
	}
}

</script>