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
if($session_id != $pageid){
header("Location:index.php");
}
ob_start();
$odesso_app_id= $_GET['id'];
// $result= $user->odesso_app_id($client_id);
// $odesso_app_id= $result['ODESSO_APP_ID'];
$table_heading =$user->tablehead_ODESSO_APP();
$table= $user->table_ODESSO_APP($odesso_app_id);
$table1_heading =$user->tablehead_ODESSO_APP_FEATURE($odesso_app_id);
$table1= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
$table2_heading	= $user->tablehead_ODESSO_APP_MODULE_STORE_CATEGORY();
$table2= $user->table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id);
$table3_heading	= $user->tablehead_ODESSO_APP_MODULE_ITEM();
$table3= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);
$table4_heading	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM();
$table4= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);
$table5_heading	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY();
$table5= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id);
$table6_heading	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE();
$table6= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id);
$table7_heading	= $user->tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE();
$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
$table8_heading	= $user->tablehead_ODESSO_APP_MODULE_USER_USER_TYPE();
$table8 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);
$table9_heading	= $user->tablehead_ODESSO_APP_REF_STRING();
$table9 = $user->table_ODESSO_APP_REF_STRING($odesso_app_id);
$table10_heading = $user->tablehead_ODESSO_APP_MODULE_INFORMATION();
$table10 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);
$table11_heading = $user->tablehead_ODESSO_APP_MODULE_WEB();
$table11 = $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);
$table12_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE();
$table12 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);
$table13_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);
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
if(isset($_POST['edit14'])){
	foreach($table13_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value,$updated_value,$key);
		}
	}
}
?>
<style>
	.dataTables_filter{
		display:none;
	}
</style>
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
<!-- Table 0: _PT_ODESSO_APP -->
<div class="table-responsive ">
	<h3>Step 1: Getting Started</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>To start, fill out the User Experience table below.<ol><li>First, name your app in column 3 <i>APP_NAME</i>.
	<li><span class="li-content">Copy and paste your logo into the fields <i>BUSINESS_LOGO_LINK</i> and <i>APP_ICON_LINK</i> to make it appear on your splash page and login page respectively.</span></li>
	<li><span class="li-content">Customize your app by changing the <i>BACKGROUND_IMAGE_LINK</i> to a background image (make sure it's <i>750x1334 px</i> or <i>1080x1920 px</i>).</span></li>
	<li><span class="li-content">To change colors inside of the app, you can type in different HEX codes to <i>THEME_COLOR_CODE</i> (buttons, top bar, important words), <i>MAIN_COLOR_CODE</i> (the majority of text), and the <i>NAVIGATION_BAR_COLOR_CODE</i>.</span></li>
	<li><span class="li-content">You can change the opacity of the Navigation Bar color by adding a decimal between 0 - 1 to <i>NAVIGATION_BAR_TRANSPARENCY_ALPHA</i>. If you don't want the navigation bar there at all, just set the transparency to 0.</span></li>
	<li><span class="li-content">Most of the icons that display inside of the app are also controlled in this table. You can add custom icons by adding a link to a new custom icon image in the different fields. For example, you may add a different "back" arrow key to the <i>NAVIGATION_BAR_BACK_IMAGE_LINK</i>.</span></li>
	<li><span class="li-content">Once you're done, press "Update" to update your app.</span></li> </ol></p>
	
<!--- TABLE1 : insert starts --->
<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
		$table= $user->table_ODESSO_APP($odesso_app_id);
		echo"<tr>";
		echo "<td><button type='submit'  style='cursor: pointer; padding: 6px 11px;' name='insert1'>Insert</button></td>";
			foreach ($table_heading as $key1=>$value)
			{
				echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value[]' value=''></td>";
			}
		echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>

<!---TABLE1 :  insert Ends   --->
<!---TABLE1 :  Edit starts   --->
<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
		$table= $user->table_ODESSO_APP($odesso_app_id);

			foreach($table as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit1' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
<!---TABLE1 :  Edit Ends     --->
	
</div> 

<!-- End Table 0-->
<!-- Table 3: _PT_ODESSO_APP_MODULE_ITEM -->

<div class="table-responsive">
	<h3> Step 2: Design Your Sidebar  </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_2.png" alt="Step 2" align="right" width="200px" height="354px"><p>Each app consists of 'Modules' - these are the building blocks your app.<br><ul>
	<li>The 'User Module' lets users log into and out of your app. This is necessary for you to have transactions, notifications, or to track your users.</li>
	<li>The 'Store Module' allows you to sell items and display content within the main menu of the app.</li>
	<li>The 'Information Module' allows you to have plain text pages to provide information, such as a Terms of Service. 
	<li>The 'Web Module' contains links to important websites available on the sidebar.</li>
	<li>Please note that <i>MODULE_TYPE</i> column must contain the full name of the module it is referencing in order for it to appear in your app.</li></ul>
	<br>
	Let's add a link to your website to the sidebar.<ol>
	<li>On the top (blank) line, leave the <i>APP_MODULE_ITEM_ID</i> column blank.</li>
	<li>In the <i>APP_ID</i> column, input the AppID that is assigned to you.</li>
	<li>Under <i>MODULE_TYPE</i>, please input "Web Module". It must be that exact string.</li> 
	<li>Give the module any <i>MODULE_NAME</i> you desire. This will appear in the app on the sidebar.</li>
	<li>Put it in the order you want it to appear in the sidebar. Make sure there is no overlap with another number.</li>
	<li>Press "Insert" to add the line to the database.</li></ol></p>
	
	
	<!--- TABLE3 : insert starts --->
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
				$table3= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);
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
	
	<!--- TABLE3 : insert ends 	 --->
	<!--- TABLE3 : Edit Starts   --->
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
		<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_ITEM_ID']."] value='".$value."'></td>";
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
	<h3> Step 3: Input your Website Link </h3><br>
	<p>To finish adding your website to the sidebar, we must add it to this table as well.<ol>
	<li>In the top line, the <i>ODESSO_APP_MODULE_WEB_ID</i> blank.</li>
	<li>Input your <i>APP_ID</i>.</li>
	<li>Your <i>MODULE_ITEM_ID</i> was created after you hit "Insert" in Step 2. Scroll up and find the row you just created, and find the far left column called <i>MODULE_ITEM_ID</i> return to the table below and input that number exactly.</li>
	<li>Add the link to your website to the <i>WEB_LINK</i> column.</li>
	<li>Press 'Insert' to finish adding it to the sidebar.</ol></p>
	
	<!--- TABLE11 : insert starts --->
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
			$table11 = $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);
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
	<!--- TABLE11 : insert Ends	 --->
	<!--- TABLE11 : Edit Starts	 --->
		
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_WEB_ID']."] value='".$value."' ></td>";
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
<!-- Table 1: _PT_ODESSO_APP_FEATURE -->
<div class="table-responsive ">
	<h3 > Step 4: Turning Features On/Off </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Each app needs custom rules, and this table is where we set many of the features that an app will have. Below is a large table which covers things from E-Commerce settings to Notification settings to Cancellation workflow settings. This table uses binary commands <b>0 and 1</b> for <b>OFF/ON</b>. For example, if you want to add coupons to the app, look up <i>COUPON_INCLUDED</i> and change from 0 to 1.<br><br>
	For this demo, let's allow customers to upload images when they place an order. <ol>
	<li>To do so, simply assign '1' to <i>IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED</i>.</li> <li>The column next to it lets you set the maximum number of images a customer can upload to an order. Let's set <i>MAX_IMAGE_NUMBER</i> to '5'.</li>
	<li>Scroll back to the left and press "Update" to refresh the table.</li></ol><br>
	There are many more features in this table, but we will get to them later.</p>
	<!---TABLE 1: Insert Starts  --->	
		
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table1_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert2'>Insert</button></td>";
				foreach ($table1_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value2[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 1: Insert Ends	 --->	
	
	<!---TABLE 1: Insert Ends	 --->	
	<!---TABLE 1: Edit Starts  		--->	
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table1_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
			
			foreach($table1 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_FEATURE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 1: Edit Ends  		--->	
	
</div> 
<!-- End Table 1-->
<!-- Table 4: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM -->
<div class="table-responsive">
	<h3> Step 5: Building Your Store </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_5.png" alt="Step 5" align="right" width="200px" height="354px"><p>Finally, let's add some items or services to sell in your store. We will want to create a new line and start adding attributes the item or service. This is where it gets a little complicated.<br>
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
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
<!-- Table 5: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY -->
<div class="table-responsive">
	<h3> Step 6: Create Prices and Inventory </h3><br>
	<p>Now that we have a <i>STORE_ITEM</i> created - we can add the inventory.<ol>
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
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
	<h3> Table 7: Adding Time Data </h3><br>
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
	<h3> Step 8: Adding an Item Image </h3><br>
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
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
<!-- Table 8: _PT_ODESSO_APP_MODULE_USER_USER_TYPE -->
<div class="table-responsive">
	<h3> Step 9: Add User Types </h3><br>
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
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
			$table8 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);
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
	<!--- TABLE 8: INSERT Ends	 --->
	<!--- TABLE 8: Edit Starts	 --->
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
			$table8 = $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);
			
			foreach($table8 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit9'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_USER_TYPE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_USER_TYPE_ID']."] value='".$value."'></td>";
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
	<h3> Step 10: Add User Attributes  </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_10.png" alt="Step 10" align="right" width="200px" height="354px"><p>You can control what information you collect from a user when they sign up from you here. For example, if you wish to collect a customer's Profile Picture or if you want to collect a taxi driver's license plate number, we can add customer fields for that information.<ol><li>First of all, leave <i>PROFILE_ATTRIBUTE_ID</i> blank.</li>
	<li>Next, insert your <i>APP_ID.</i></li>
	<li>For your <i>USER_TYPE</i>, type in the string of the user type you want to add the attribute to ('Customer', 'Service Provider', 'Merchant').</li>
	<li>For <i>NAME</i>, enter the name of the attrivbute that you want displayed in the app.</li>
	<li>For <i>TYPE</i>, you may enter either 'Text Line' (for 1 line of text), 'Text Paragraph' (for multiple lines of text), or 'Image' (for a user to upload an image.</li>
	<li>You can choose to make <i>ACCESS</i> "Public" or "Private" by entering one of those.</li>
	<li>Finally, under IS_ACTIVE make '1' to display the question, or '0' to hide it.</li>
	<li>When you're done press "Insert".</li> </ol></p>
	
	<!--- TABLE 7: INSERT starts--->
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
			$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
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
	<!--- TABLE 7: INSERT Ends--->
	<!--- TABLE 7: Edit Starts--->
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
			$table7 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);
			
			foreach($table7 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit8' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID']."] value='".$value."' ></td>";
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
<!-- Table 9  _PT_ODESSO_APP_REF_STRING -->
<div class="table-responsive">
	<h3> Table 11: (Optional) Text Customization  </h3><br>
	<p>Now that we have a complete wireframe for your app, you can feel free to go back and add more store items, images, categories, and design it further! You may have also noticed we have templated words and sentences throughout the app. All of this is customizable, and can be changed by looking it up in the below table. The fastest way is to use the search function to find the String you wish to change, and edit the <i>BODY</i>. <b>Make sure you don't touch the <i>APP_ID</i> or <i>TAG</i></b>. When you're done, press "Update" on each individual line.</p>
	<!---TABLE 9: INSERT STARTS--->
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
			$table9 = $user->table_ODESSO_APP_REF_STRING($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert10'>Insert</button></td>";
				foreach ($table9_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value10[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	
	<!---TABLE 9: INSERT ENDS--->
	<!---TABLE 9: INSERT STARTS--->
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
			$table9 = $user->table_ODESSO_APP_REF_STRING($odesso_app_id);
		
			foreach($table9 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit10' style='cursor: pointer; padding: 6px 11px;'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_REF_STRING_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."'></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<!---TABLE 9: INSERT ENDS--->
</div>
<!-- End Table 9-->
<!-- Table 2: _PT_ODESSO_APP_MODULE_STORE_CATEGORY-->
<div class="table-responsive">
	<h3> Step 12: (Optional) Categories  </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_12.png" alt="Step 12" align="right" width="200px" height="354px"><p>Optionally, you can structure your store items and data within categories.<ol>
	<li>To do so, leave the <i>ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID</i> column blank.</li>
	<li>Enter your <i>APP_ID</i> and <i>MERCHANT_ID</i></li>
	<li>For <i>PARENT_CATEGORY_TYPE</i>, you will want to choose either "Module" if you want it to appear when someone opens the Store Module, or you can choose "Category" if you want it to appear as a sub-category beneath another category.</li>
	<li>For <i>PARENT_ID</i> enter either the STORE_MODULE_ID if you chose "Module" as the Parent Type, or choose the parent category's CATEGORY_ID if you chose "Category" as the Parent type.</li>
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
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
<!-- Table 10 _PT_ODESSO_APP_MODULE_INFORMATION -->
<div class="table-responsive">
	<h3> Table 13: (Optional) Plain Text Sidebar Item</h3>
	<!--- TABLE 13: INSERT starts--->
	
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
			$table10 = $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);
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
	
	
	<!--- TABLE 13: INSERT ends--->
	<!--- TABLE 13: Edit starts--->
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_INFORMATION_ID']."] value='".$value."' ></td>";
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

<!-- Table 13 _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE -->
<div class="table-responsive">
	<h3> Table 14: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE</h3>
	<!---TABLE 14: INSERT STARTS --->
	
		<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
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
			$table13 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert14'>Insert</button></td>";
				foreach ($table13_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value14[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!---TABLE 14: INSERT ENDS 	 --->
	<!---TABLE 14: Edit STARTS   --->
	
	
	
	<form method="post" action="home.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
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
			$table13 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);
		
			foreach($table13 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit14' style='cursor: pointer; padding: 6px 11px;' name=>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID']."] value='".$value."' ></td>";
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
<!-- End Table 12-->
<!-- Table 13-->
</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
<script src="js/datatable.js"></script>
<script src="js/datatable.min.js"></script>
<script>
$(document).ready(function() {
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
	
    $('.myTable').DataTable( {
        // "scrollY": 200,
        "scrollX": true
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
						
						$('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL;?>/' + user_name + '/'+data.image_with_path);
					
					
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