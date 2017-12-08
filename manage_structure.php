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

$table13_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13 		 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);

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
if(isset($_POST['edit2'])){
	foreach($table1_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit3'])){
	foreach($table2_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_CATEGORY($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit4'])){
	foreach($table3_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_table_ODESSO_APP_MODULE_ITEM($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit5'])){
	foreach($table4_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit6'])){
	foreach($table5_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit7'])){
	foreach($table6_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit8'])){
	foreach($table7_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit9'])){
	foreach($table8_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER_USER_TYPE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit10'])){
	foreach($table9_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_REF_STRING($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit11'])){
	foreach($table10_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_INFORMATION($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit12'])){
	foreach($table11_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_WEB($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit13'])){
	foreach($table12_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['edit14'])){
	foreach($table13_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}


$table1_arr[] = null; $table2_arr[] = null; $table3_arr[] = null;
?>

<?php include 'header.php';?>
<!------------------------ Upload image div Starts ---------------------------------->
<div class="upload_img">
		<div style = "display:none" class = "success_msg"></div>
		<div style = "display:none" class = "error_msg"></div>
		<input type = "hidden" id = "user_APP_ID" value = "<?php echo $_GET['id']?>"/>
		<input type = "hidden" id = "user_name"   value = "<?php echo $_SESSION['username']?>"/>
		<input type = "button" class = "upload_btn" value = "Upload Image" onclick = "img_click()"/>
		
		<input type="file" 	   id="my_file" value = ""onchange = "upload()" style="display: none;" />
</div>				

<!--------------------------- Upload image div Ends	  ---------------------------------->


<div class="container">
<div class="row">

<div class="table-responsive">
	<h3> Table 1: Sidebar Structure  </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_2.png" alt="Step 2" align="right" width="200px" height="354px"><p>Each app consists of 'Modules' - these are the building blocks your app.<br><ul>
	<li>The 'User Module' lets users log into and out of your app. This is necessary for you to have transactions, notifications, or to track your users.</li>
	<li>The 'Store Module' allows you to sell items and display content within the main menu of the app.</li>
	<li>The 'Information Module' allows you to have plain text pages to provide information, such as a Terms of Service. 
	<li>The 'Web Module' contains links to important websites available on the sidebar.</li>
	<li>Please note that <i>MODULE_TYPE</i> column must contain the full name of the module it is referencing in order for it to appear in your app.</li></ul>
	<br>
	To add either a link or plain text to the sidebar, do the following.<ol>
	<li>On the top (blank) line, leave the <i>APP_MODULE_ITEM_ID</i> column blank.</li>
	<li>In the <i>APP_ID</i> column, input the AppID that is assigned to you.</li>
	<li>Under <i>MODULE_TYPE</i>, please input either "Web Module" (to create a link) or "Information Module" to create a plain text page. It must be that exact string.</li> 
	<li>Give the module any <i>MODULE_NAME</i> you desire. This will appear in the app on the sidebar.</li>
	<li>Put it in the order you want it to appear in the sidebar. Make sure there is no overlap with another number.</li>
	<li>Press "Insert" to add the line to the database.</li></ol></p>
	
	
	<!--- TABLE3 : insert starts --->
		<form method="post" action="manage_structure.php?id=<?php echo $odesso_app_id; ?>">
		<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
			<thead>
				<tr style="border: 1px solid black;">
					<?php
							echo "<th>Action</th>";
						foreach($table3_heading as $value)
						{
							if($value['DATA_TYPE'] == 'tinyint')
							{
								$table3_heading_tinyint[] = $value['COLUMN_NAME'];
							}
							
							echo "<th>".$value['COLUMN_NAME']."</th>";
						}
					?>
				</tr>
			</thead>
		<tbody>
			<?php
				$table3= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);
				echo"<tr>";
				echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert4'>Insert</button></td>";
					foreach ($table3_heading as $key1=>$value)
					{
						if(in_array($value['COLUMN_NAME'],$table3_heading_tinyint))
						{
							
							echo"<td>
								<input type='checkbox'  onchange='coloumn_checkbox(this)'>
								<input type='hidden' class = 'field_".$key1." ODESSO_APP_".$key1." coloumn_checkbox' name='insert_value4[]' value='0'>
							</td>";
						}
						else
						{
							
							echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value4[]' value=''></td>";
						}
					}
				echo"</tr>";
				
			?>
		</tbody>
		</table>
		</form>
	
	<!--- TABLE3 : insert ends 	 --->
	<!--- TABLE3 : Edit Starts   --->
	
		<form method="post" action="manage_structure.php?id=<?php echo $odesso_app_id; ?>">
		<table id = "table1" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
			<thead>
				<tr style="border: 1px solid black;">
					<?php
							echo "<th>Action</th>";
						foreach($table3_heading as $value)
						{
							$table1_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							if($value['DATA_TYPE'] == 'tinyint')
							{
								$table3_heading_tinyint[] = $value['COLUMN_NAME'];
							}
						
							echo "<th>".$value['COLUMN_NAME']."</th>";
						}
					?>
				</tr>
			</thead>
		<tbody>
			<?php
				$table3= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);
				
				foreach($table3 as $key=>$result)
				{
					echo "<tr>";
						echo "<td><button type='submit' name='edit4' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
						foreach ($result as $key1=>$value)
						{
							if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_ITEM_ID')
							{
								echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".$value."' readonly  ></td>";
							}
							else
							{
								if(in_array($key1,$table3_heading_tinyint))
								{
									$checked_box = '';
									if($value == '1')
									{
										$checked_box = 'checked';
									}
									echo "<td>
									<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
									
									<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".$value."' ></td>";
								}
								else
								{
									
									// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".$value."'></td>";
									echo "<td><textarea rows = '2' cols = '20' name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."]>".$value."</textarea> </td>";
								}
							}
						}
					echo"</tr>";
				}
			?>
		</tbody>
		</table>
		</form>
	
	<!--- TABLE3: Edit ends      --->
	
</div>
<!-- End Table 3-->
<!-- Table 11: _PT_ODESSO_APP_MODULE_WEB -->
<div class="table-responsive">
	<h3> Table 2: Add Website Link </h3><br>
	<p>To finish adding your website to the sidebar, we must add it to this table as well.<ol>
	<li>Your <i>MODULE_ITEM_ID</i> was created after you hit "Insert" in Table 1. Scroll up and find the row you just created, and find the far left column called <i>MODULE_ITEM_ID</i> return to the table below and input that number exactly.</li>
	<li>Add the link to your website to the <i>WEB_LINK</i> column.</li>
	<li>Press 'Insert' to finish adding it to the sidebar.</ol></p>
	
	<!--- TABLE11 : insert starts --->
	<form method="post" action="manage_structure.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table11_heading as $value)
					{
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table11_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table11 = $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert12'>Insert</button></td>";
				foreach ($table11_heading as $key1=>$value)
				{
					if(in_array($value['COLUMN_NAME'],$table11_heading_tinyint))
					{
						
						echo"<td>
							<input type='checkbox'  onchange='coloumn_checkbox(this)'>
							<input type='hidden' class = 'field_".$key1." ODESSO_APP_".$key1." coloumn_checkbox' name='insert_value12[]' value='0'>
						</td>";
					}
					else
					{
						
						echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value12[]' value=''></td>";
					}
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE11 : insert Ends	 --->
	<!--- TABLE11 : Edit Starts	 --->
		
	<form method="post" action="manage_structure.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table2" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					echo "<th>Action</th>";
					foreach($table11_heading as $value)
					{
						$table2_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
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
					echo "<td><button type='submit' name='edit12' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_WEB_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table11_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
								// echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".$value."' ></td>";
								
								echo "<td><textarea rows = '4' cols = '40' name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."]>".$value."</textarea></textarea> </td>";
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
		
	<!--- TABLE3 : Edit Ends	 --->
	
	
	</div>
<!-- End Table 11-->

<!-- Table 10 _PT_ODESSO_APP_MODULE_INFORMATION -->
<div class="table-responsive">
	<h3> Table 3: Add a Plain Text Sidebar Item</h3>
	<p>To finish adding your plain text module to the sidebar, we must add it to this table as well.<ol>
	<li>Your <i>MODULE_ITEM_ID</i> was created after you hit "Insert" in Table 1. Scroll up and find the row you just created, and find the far left column called <i>MODULE_ITEM_ID</i> return to the table below and input that number exactly.</li>
	<li>Add the Plain text title into the <i>INFORMATION_TITLE</i> column.</li>
	<li>Add the body text to the <i>INFORMATION_DESCRIPTION</i> column.</li>
	<li>Press 'Insert' to finish adding it to the sidebar.</ol></p>
	<!--- TABLE 13: INSERT starts--->
	
	
		<form method="post" action="manage_structure.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table10_heading as $value)
					{
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table10_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table10 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert11'>Insert</button></td>";
				foreach ($table10_heading as $key1=>$value)
				{
					if(in_array($value['COLUMN_NAME'],$table10_heading_tinyint))
					{
						
						echo"<td>
							<input type='checkbox'  onchange='coloumn_checkbox(this)'>
							<input type='hidden' class = 'field_".$key1." ODESSO_APP_".$key1." coloumn_checkbox' name='insert_value11[]' value='0'>
						</td>";
					}
					else
					{
						
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value11[]' value=''></td>";
					}
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	
	<!--- TABLE 13: INSERT ends--->
	<!--- TABLE 13: Edit starts--->
	<form method="post" action="manage_structure.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table3" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table10_heading as $value)
					{
						$table3_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table10 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);
			
			foreach($table10 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit11' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_INFORMATION_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$table10_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
							// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".$value."' ></td>";
							
							echo "<td><textarea  rows = '4' cols = '40' name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."]>".$value."</textarea> </td>";
							}
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!--- TABLE 13: Edit ends--->
</div>
<!-- End Table 10-->





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