<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
if($check == ''){
header("Location:index.php");
}
ob_start();

$odesso_app_id = $_GET['id'];

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

<?php include 'header.php';?>
			
<!----------------------------------- Title div Starts ---------------------------------->

<div class="upload_img">
		<div style = "display:none" class = "success_msg"></div>
		<div style = "display:none" class = "error_msg"></div>
		<input type = "hidden" id = "user_APP_ID" value = "<?php echo $_GET['id']?>"/>
		<input type = "hidden" id = "user_name"   value = "<?php echo $_SESSION['username']?>"/>
		<input type = "button" class = "upload_btn" value = "Upload Image" onclick = "img_click()"/>
		
		<input type="file" 	   id="my_file" value = ""onchange = "upload()" style="display: none;" />
</div>		

<!----------------------------------- Title div Ends	  ---------------------------------->


<div class="container">
<div class="row">

<div class="table-responsive ">
	<h3>Step 1: Update Branding</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>To start, fill out the User Experience table below.<ol><li>First, name your app in column 3 <i>APP_NAME</i>.
	<li><span class="li-content">Copy and paste your logo into the fields <i>BUSINESS_LOGO_LINK</i> and <i>APP_ICON_LINK</i> to make it appear on your splash page and login page respectively.</span></li>
	<li><span class="li-content">Customize your app by changing the <i>BACKGROUND_IMAGE_LINK</i> to a background image (make sure it's <i>750x1334 px</i> or <i>1080x1920 px</i>).</span></li>
	<li><span class="li-content">To change colors inside of the app, you can type in different HEX codes to <i>THEME_COLOR_CODE</i> (buttons, top bar, important words), <i>MAIN_COLOR_CODE</i> (the majority of text), and the <i>NAVIGATION_BAR_COLOR_CODE</i>.</span></li>
	<li><span class="li-content">You can change the opacity of the Navigation Bar color by adding a decimal between 0 - 1 to <i>NAVIGATION_BAR_TRANSPARENCY_ALPHA</i>. If you don't want the navigation bar there at all, just set the transparency to 0.</span></li>
	<li><span class="li-content">Most of the icons that display inside of the app are also controlled in this table. You can add custom icons by adding a link to a new custom icon image in the different fields. For example, you may add a different "back" arrow key to the <i>NAVIGATION_BAR_BACK_IMAGE_LINK</i>.</span></li>
	<li><span class="li-content">Once you're done, press "Update" to update your app.</span></li> </ol></p>

	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table= $user->table_ODESSO_APP ($odesso_app_id);
			
			foreach($table as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit1'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_ID')
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
	
</div> 

<!-- End Table 0-->

<div class="table-responsive ">
	<h3 >Table 2: Turning Features On/Off </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Each app needs custom rules, and this table is where we set many of the features that an app will have. Below is a large table which covers things from E-Commerce settings to Notification settings to Cancellation workflow settings. This table uses binary commands <b>0 and 1</b> for <b>OFF/ON</b>. For example, if you want to add coupons to the app, look up <i>COUPON_INCLUDED</i> and change from 0 to 1.<br><br>
	For this demo, let's allow customers to upload images when they place an order. <ol>
	<li>To do so, simply assign '1' to <i>IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED</i>.</li> <li>The column next to it lets you set the maximum number of images a customer can upload to an order. Let's set <i>MAX_IMAGE_NUMBER</i> to '5'.</li>
	<li>Scroll back to the left and press "Update" to refresh the table.</li></ol><br>
	There are many more features in this table, but we will get to them later.</p>

	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1= $user->table_ODESSO_APP_FEATURE ($odesso_app_id);
			
			foreach($table1 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2'>Update</button></td>";
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
</div>

<div class="table-responsive">
	<h3> Table 3: (Optional) Text Customization  </h3><br>
	<p>Now that we have a complete wireframe for your app, you can feel free to go back and add more store items, images, categories, and design it further! You may have also noticed we have templated words and sentences throughout the app. All of this is customizable, and can be changed by looking it up in the below table. The fastest way is to use the search function to find the String you wish to change, and edit the <i>BODY</i>. <b>Make sure you don't touch the <i>APP_ID</i> or <i>TAG</i></b>. When you're done, press "Update" on each individual line.</p>

	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table9_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table9= $user->table_ODESSO_APP_REF_STRING ($odesso_app_id);
			
			foreach($table9 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit10'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_REF_STRING_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>


<!-- Table 1: _PT_ODESSO_APP_MODULE_STORE_CATEGORY-->
<div class="table-responsive">
	<h3> Table 1: _PT_ODESSO_APP_MODULE_STORE_CATEGORY</h3>
	
	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
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
					echo "<td><button type='submit' name='edit3'>Update</button></td>";
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
</div>
<!-- End Table 1-->


<!-- Table 2: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM -->
<div class="table-responsive">
	<h3> Table 2: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM</h3>
	
	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
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
					echo "<td><button type='submit' name='edit5'>Update</button></td>";
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
</div>
<!-- End Table 2-->

<!-- Table 3 _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE -->
<div class="table-responsive">
	<h3> Table 3: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE</h3>
	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
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
					echo "<td><button type='submit' name='edit14'>Update</button></td>";
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
</div>
<!-- End Table 3-->

<!-- Table 4: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY -->
<div class="table-responsive">
	<h3> Table 4: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY</h3>
	
	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
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
</div>
<!-- End Table 4-->

<!-- Table 5: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE-->
<div class="table-responsive">
	<h3> Table 5: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE</h3>
	
	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
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
					echo "<td><button type='submit' name='edit13'>Update</button></td>";
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
</div>
<!-- End Table 5-->


<!-- Table 6: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE -->
<div class="table-responsive">
	<h3> Table 6: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE</h3>
	
	<form method="post" action="update_items.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
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
					echo "<td><button type='submit' name='edit7'>Update</button></td>";
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
</div>
<!-- End Table 6-->

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
						
						$('.success_msg').html('File successfully uploaded: https://www.odesso.com/AppPt/Developerapi/' + user_name + '/'+data.image_with_path);
					
					
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