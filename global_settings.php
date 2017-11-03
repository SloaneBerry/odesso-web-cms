<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
if($check == ''){
header("Location:index.php");
}
ob_start();

$odesso_app_id = $_GET['id'];

$table_heading 	 	= $user->tablehead_ODESSO_APP();
$table			 	= $user->table_ODESSO_APP($odesso_app_id);

$tableE_heading  	= $user->tablehead_ODESSO_APP_SYSTEM_CANCELLATION_TIME();
$tableE			 	= $user->table_ODESSO_APP_SYSTEM_CANCELLATION_TIME($odesso_app_id);

$table1A_heading 	= $user->tablehead_ODESSO_APP_FEATURE_GLOBAL_WORKFLOW_SETTINGS($odesso_app_id);
$table1A		 	= $user->table_ODESSO_APP_FEATURE_GLOBAL_WORKFLOW_SETTINGS($odesso_app_id);

$table1B_heading 	= $user->tablehead_ODESSO_APP_FEATURE_ECOMMERCE($odesso_app_id);
$table1B		 	= $user->table_ODESSO_APP_FEATURE_ECOMMERCE($odesso_app_id);

$table1C_heading 	= $user->tablehead_ODESSO_APP_FEATURE_SP_CANCELLATION_SETTINGS($odesso_app_id);
$table1C		 	= $user->table_ODESSO_APP_FEATURE_SP_CANCELLATION_SETTINGS($odesso_app_id);

$table1D_heading 	= $user->tablehead_ODESSO_APP_FEATURE_ORDER_SCREEN_UX($odesso_app_id);
$table1D		 	= $user->table_ODESSO_APP_FEATURE_ORDER_SCREEN_UX($odesso_app_id);

$table1E_heading 	= $user->tablehead_ODESSO_APP_FEATURE_PROFILE_INFORMATION_PRIVACY($odesso_app_id);
$table1E		 	= $user->table_ODESSO_APP_FEATURE_PROFILE_INFORMATION_PRIVACY($odesso_app_id);

$table1F_heading 	= $user->tablehead_ODESSO_APP_FEATURE_ADVANCED_BUSINESS_RULES($odesso_app_id);
$table1F		 	= $user->table_ODESSO_APP_FEATURE_ADVANCED_BUSINESS_RULES($odesso_app_id);

$table15A_heading 	= $user->tablehead_ODESSO_APP_FEATURE_ORDER_HISTORY_DISPLAY();
$table15A 		 	= $user->table_ODESSO_APP_FEATURE_ORDER_HISTORY_DISPLAY($odesso_app_id);

$table18_heading 	= $user->tablehead_ODESSO_APP_MODULE_STORE_ADDRESS();
$table18 		 	= $user->table_ODESSO_APP_MODULE_STORE_ADDRESS($odesso_app_id);

$table36_heading 	= $user->tablehead_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD();
$table36		 	= $user->table_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($odesso_app_id);

$table2_heading	 	= $user->tablehead_ODESSO_APP_MODULE_STORE_CATEGORY();
$table2			 	= $user->table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id);

$table3_heading	 	= $user->tablehead_ODESSO_APP_MODULE_ITEM();
$table3			 	= $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);

$table4_heading	 	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM();
$table4			 	= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);

$table5_heading	 	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY();
$table5			 	= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id);

$table6_heading	 	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE();
$table6			 	= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id);

$table7_heading	 	= $user->tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE();
$table7			 	= $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);

$table8_heading	 	= $user->tablehead_ODESSO_APP_MODULE_USER_USER_TYPE();
$table8			 	= $user->table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id);

$table9_heading	 	= $user->tablehead_ODESSO_APP_REF_STRING();
$table9 		 	= $user->table_ODESSO_APP_REF_STRING($odesso_app_id);

$table10_heading 	= $user->tablehead_ODESSO_APP_MODULE_INFORMATION();
$table10		 	= $user->table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id);

$table11_heading 	= $user->tablehead_ODESSO_APP_MODULE_WEB();
$table11		 	= $user->table_ODESSO_APP_MODULE_WEB($odesso_app_id);

$table12_heading 	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE();
$table12		 	= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);

$table13_heading 	= $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13 		 	= $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);


if(isset($_POST['logout'])){
	 $user->logout();
}

if(isset($_POST['editE'])){
	foreach($tableE_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit1'])){
	foreach($table_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit2A'])){
	foreach($table1A_heading as $value)
	{
		$value3 = $_POST[$value];
	
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit2B'])){
	foreach($table1B_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit2C'])){
	foreach($table1C_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit2D'])){
	foreach($table1D_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit2E'])){
	foreach($table1E_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit2F'])){
	foreach($table1F_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE($value,$updated_value,$key);
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
if(isset($_POST['edit16A'])){
	foreach($table15A_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_FEATURE_ORDER($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['edit19'])){
	foreach($table18_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_ADDRESS($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['insert19'])){
		$value3 = $_POST[insert_value19];
		$user->odesso_app_module_store_address_insert($value3);
}
if(isset($_POST['edit37'])){
	foreach($table36_heading as $value)
	{
		$value3 = $_POST[$value];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($value,$updated_value,$key);
		}
	}
}
if(isset($_POST['insert37'])){
		$value3 = $_POST[insert_value37];
		$user->odesso_app_module_store_shipping_method_insert($value3);
}

$tableE_arr[] 	= null;
$table1_arr[] 	= null;  $table2_arr[] 	= null;  $table3_arr[] = null;
$table1A_arr[]	= null;	 $table1B_arr[]	= null;	 $table1C_arr[] = null;
$table1D_arr[]	= null;  $table1E_arr[]	= null;  $table1F_arr[]	= null;
$table15A_arr[] = null;	 $table18_arr[] = null;	 $table36_arr[] = null;
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
	<h3 >Table 1: Global Workflow Settings</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Each app needs custom rules, and this section is where we set many of the features that an app will have, from e-commerce settings to cancellation workflows. This table introduces binary commands, called booleans where <b>0</b> means <b>OFF</b> and <b>1</b> means <b>ON</b>.<br>
	On this table, we can allow customers to upload images when they place an order. <ol>
	<li>Turn on image uploads, simply assign '1' to <i>IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED</i>. To turn it off, assign '0'.</li>
	<li>The next column, <i>MAX_IMAGE_NUMBER</i> is not a boolean record. Instead it requires an integer (a whole number). If you want a user to upload up to 5 images, you can enter '5'.</li>
	<li>The next boolean record is <i>IS_SP_ALLOWED_TO_SELECT_ITEMS</i>. Here you can decide if your service providers are able to select the workflows that they can complete. If this is set to 0, the service provider cannot select which items which workflows will be visible to then. If this is set to 1, the service provider can choose which workflows to partipate in.</li>
	<li>The last option on this list lets you decide if you want to let users message one another in the app. To allow a direct messaging button in a user's profile, set the <i>IS_USER_DETAIL_CHAT_ON</i> to 1. To turn off messaging, set it to 0.</ol></p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1A" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1A_heading as $value)
					{
						$table1A_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1A= $user->table_ODESSO_APP_FEATURE_GLOBAL_WORKFLOW_SETTINGS($odesso_app_id);
			
			foreach($table1A as $key=>$result)
			{
				
					echo "<td><button type='submit' name='edit2A'>Update</button></td>";
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

<div class="table-responsive ">
	<h3 >Table 2: E-Commerce Settings</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Next you can configure your app for E-Commerce.<br><br>
	<ol><li>By default, your app will allow a user to submit data, and that data to be available to another user. We call this a data transaction. Most apps will want this to remain ON, but if you only want to displaying information, then the <i>TRANSACTION_INCLUDED</i> field should be set to 0. Note that later on we can turn on and off data transactions for each specific workflow.</li>
	<li>With each transaction, we can also transmit money and process payments. To allow this, we need to allow customers to input their credit card information, so set the <i>IS_CUSTOMER_UPDATE_PAYMENT_ON</i> to 1. If you don't want to collect credit card information, set this to 0.</li>
	<li>During the e-commerce order, you can also choose if you want to add coupons or referral codes. To allow users to enter a coupon set <i>COUPON_INCLUDED</i> to 1.</li> 
	<li>Finally, if you wish to allow your customer to purchase multiple products or services at once, you can add a shopping cart to your app. To turn on your shopping cart, change <i>IS_STORE_CART_NEEDED</i> to 1.</li></p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1B" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1B_heading as $value)
					{
						$table1B_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1B= $user->table_ODESSO_APP_FEATURE_ECOMMERCE ($odesso_app_id);
			
			foreach($table1B as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2B'>Update</button></td>";
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

<div class="table-responsive ">
	<h3 >Table 3: Order List View and History View</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>In this section we will decide how to display information inside of your app. There are 5 fields that you can use to display information to your users in list view. You can include the following variables 
	<ul><li>Order Confirmation Code: #store_order_confirmation_code#</li> 
	<li>Order Status: #store_order_status#</li>
	<li>Order Schedule Time: #store_order_schedule_time#</li>
	<li>Order Creation Time: #store_order_created_time#</li>
	<li>Total Transaction Amount: #store_order_transaction_amount#</li>
	<li>Subtotal Order Amount (Pre-Coupon/Extra Fees/Mileage): #store_order_order_amount#</li>
	<li>Order Location Method (ex. Delivery, Pick-Up, Shipping): #store_order_location_method#</li>
	<li>Shipping Name: #store_order_shipping_name#</li>
	<li>Customer First Name: #no_end_user_first_name#</li>
	<li>Customer Last Name: #no_end_user_last_name#</li>
	<li>Customer's Email: #no_end_user_email#</li>
	</ul>If your app is NOT using a shopping cart, you can also use these variables:
	<ul>
	<li>Item Name: #no_cart_order_item_name#</li>
	<li>Item Quantity: #no_cart_order_item_quantity#</li>
	<li>Order Attribute (Names): #no_cart_order_item_attribute_name_list#</li>
	<li>Order Attribute (Values): #no_cart_order_item_attribute_value_list#</li>
	</ul><br></p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table15A" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table15A_heading as $value)
					{
						$table15A_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table15A= $user->table_ODESSO_APP_FEATURE_ORDER_HISTORY_DISPLAY ($odesso_app_id);
			
			foreach($table15A as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit16A'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_FEATURE_ORDER_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ORDER_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_FEATURE_ORDER_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>

<!-- Table 19 Starts-->
<div class="table-responsive">
	<h3> Table 4: Manage App Addresses </h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p>Some apps require multiple locations, such as a "Pickup" and "Dropoff" location. By default, your app can handle the following fulfillment methods:
	<ul><li>"Offsite" - These are orders similar to a delivery to a specific address. These are inputted by the customer.</li>
	<li>"Onsite" - Each app can have one pre-defined location, such as a store location where someone can do in-store pickup.</li>
	<li>"Shipping" - This is for orders traveling via mail, not hand-delivered.</li></ul>
	If you need multiple addresses, you can "insert" a new one.
	<li>Start by choosing the <i>LOCATION_METHOD</i> you choose to add.</li>
	<li>Next assign a <i>NAME</i> that the user will see (for example "Delivery Address").</li>
	<li>If you want your customer to input their own address, set <i>IS_INPUT</i> to 1. If you want it to be set to a custom address, set this to 0.</li>
	<li>If <i>IS_INPUT</i> is 0, then  you need to assign the custom address. Look up the <i>ODESSO_APP_ADDRESS_ID</i> you want to use on the <b>ODESSO_APP_ADDRESS</b> table. Make sure that the TYPE is <b>App module store address</b></li>
	<li>Only one address of each <i>LOCATION_METHOD</i> can be broadcast to service providers for them to discover. To turn on the address for broadcasting, set the field to 1. If you do not want it to broadcast, set the field to 0.</li></p>
<!-- TABLE 18: INSERT STARTS -->
	
	<form class = "frm_insert" method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table18_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert19'>Insert</button></td>";
				foreach ($table18_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." ODESSO_APP_".$key1."' name='insert_value19[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!-- TABLE 18: INSERT ENDS 	 -->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_address" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_address" method="post" enctype="multipart/form-data" id="import_excel19" name="import_excel19" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file19").click()'   value="Import"/>
					<input type="file" name = "file" id="file19" style="display: none;" onchange= 'import_data(this.id,"import_excel19")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!-- TABLE 18: Edit STARTS   -->
	
	
	
	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table19" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table18_heading as $value)
					{
						$table19_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table18 		 = $user->table_ODESSO_APP_MODULE_STORE_ADDRESS($odesso_app_id);

			foreach($table18 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit19' class = 'update_icon' title = 'Update' type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID'].",'_odesso_app_module_store_address','ODESSO_APP_MODULE_STORE_ADDRESS_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID'].",'_odesso_app_module_store_address','ODESSO_APP_MODULE_STORE_ADDRESS_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ADDRESS_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ADDRESS_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
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
	<h3> Table 5: Shipping Carriers</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="454px">
	<p>If your app involves shipping products to a customer, then you can add as many different shipping carriers as you would like.<ol>
	<li>The <i>SHIPPING_CARRIER</i> and the <i>SHIPPING_DESCRIPTION</i> are for your internal use. You can label these whatever you want, the customer will not see it.</li>
	<li>The <i>SHIPPING_NAME</i> is revealed to the customer in the app.</li>
	<li>You can also assign a <i>SHIPPING_PRICE</i> for each shipping option you give to customers. These prices are listed in <b>CENTS</b>. So for example, a $5 shipping fee should be "500".
	</p>
<!-- TABLE 36 INSERT STARTS -->
	
	<form class = "frm_insert" method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table class="table table-profile " style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table36_heading as $value)
					{
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
		
			echo"<tr>";
			echo "<td><button type='submit' style='cursor: pointer; padding: 6px 11px;' name='insert37'>Insert</button></td>";
				foreach ($table36_heading as $key1=>$value)
				{
					echo"<td><input type='text' class = 'field_".$key1." att_ODESSO_APP_".$key1."' name='insert_value37[]' value=''></td>";
				}
			echo"</tr>";
			
		?>
	</tbody>
	</table>
	</form>
	
	<!-- TABLE 36: INSERT ENDS 	 -->
	
	
	<div class = "csv_buttons">
		  <div class="control-group exp_btn">
			<div class="controls">
				<form action="export.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_shipping_method" method="post" name="export_excel" class="export_form">
				<button type="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
				
				</form>
			</div>
		  </div>
		  <div class="control-group imp_btn">
			<div class="controls">
				<form action="import.php?id=<?php echo $pageid; ?>&table=_odesso_app_module_store_shipping_method" method="post" enctype="multipart/form-data" id="import_excel37" name="import_excel37" class="import_form">
				
					<input type="button" class="btn btn-primary button-loading" id="btnUpload" onclick='$("#file37").click()'   value="Import"/>
					<input type="file" name = "file" id="file37" style="display: none;" onchange= 'import_data(this.id,"import_excel37")' />
				</form>
			</div>
		  </div>
	</div>
	
	
	<!-- TABLE 36: Edit STARTS   -->
	
	
	
	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table37" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Action</th>";
					foreach($table36_heading as $value)
					{
						$table37_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
					
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table36		 = $user->table_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($odesso_app_id);

			foreach($table36 as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button  name='edit37' class = 'update_icon' title = 'Update'  type='submit'></button><button title = 'copy' class = 'copy_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."'  style='cursor: pointer; ' onclick= copy_row(".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID'].",'_odesso_app_module_store_shipping_method','ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID') >Copy</button><button title = 'Delete' class = 'delete_icon' type='button' id = 'app_".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."'  style='cursor: pointer; ' onclick= delete_row(".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID'].",'_odesso_app_module_store_shipping_method','ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID') >Delete</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID']."] value='".htmlspecialchars($value,ENT_QUOTES)."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
</div>

<div class="table-responsive ">
	<h3 >Table 6: Order Page User Experience</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>The order screen can be customized to display only the information you wish to show.</p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1D" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1D_heading as $value)
					{
						$table1D_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1D= $user->table_ODESSO_APP_FEATURE_ORDER_SCREEN_UX ($odesso_app_id);
			
			foreach($table1D as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2D'>Update</button></td>";
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

<div class="table-responsive ">
	<h3 >Table 7: User Profile Information Privacy</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Each app needs custom rules, and this table is where we set many of the features that an app will have. Below is a large table which covers things from E-Commerce settings to Notification settings to Cancellation workflow settings. This table uses binary commands <b>0 and 1</b> for <b>OFF/ON</b>. For example, if you want to add coupons to the app, look up <i>COUPON_INCLUDED</i> and change from 0 to 1.<br><br>
	For this demo, let's allow customers to upload images when they place an order. <ol>
	<li>To do so, simply assign '1' to <i>IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED</i>.</li> <li>The column next to it lets you set the maximum number of images a customer can upload to an order. Let's set <i>MAX_IMAGE_NUMBER</i> to '5'.</li>
	<li>Scroll back to the left and press "Update" to refresh the table.</li></ol><br>
	There are many more features in this table, but we will get to them later.</p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1E" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1E_heading as $value)
					{
						$table1E_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1E = $user->table_ODESSO_APP_FEATURE_PROFILE_INFORMATION_PRIVACY($odesso_app_id);
			
			foreach($table1E as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2E'>Update</button></td>";
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

<div class="table-responsive ">
	<h3 >Table 8: Service Provider Cancellation Settings</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_4.png" alt="Step 4" align="right" width="200px" height="354px"><p>Each app needs custom rules, and this table is where we set many of the features that an app will have. Below is a large table which covers things from E-Commerce settings to Notification settings to Cancellation workflow settings. This table uses binary commands <b>0 and 1</b> for <b>OFF/ON</b>. For example, if you want to add coupons to the app, look up <i>COUPON_INCLUDED</i> and change from 0 to 1.<br><br>
	For this demo, let's allow customers to upload images when they place an order. <ol>
	<li>To do so, simply assign '1' to <i>IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED</i>.</li> <li>The column next to it lets you set the maximum number of images a customer can upload to an order. Let's set <i>MAX_IMAGE_NUMBER</i> to '5'.</li>
	<li>Scroll back to the left and press "Update" to refresh the table.</li></ol><br>
	There are many more features in this table, but we will get to them later.</p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1C" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table1C_heading as $value)
					{
						$table1C_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1C = $user->table_ODESSO_APP_FEATURE_SP_CANCELLATION_SETTINGS($odesso_app_id);
			
			foreach($table1C as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2C'>Update</button></td>";
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

<div class="table-responsive ">
	<h3>Table 9: System Cancellation Time</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>Choose the amount of time (in seconds) an order will be available before it is cancelled by the system.<br/>
	Example:<ul>
		<li>1 Hour = 3600</li>
		<li>12 Hours = 43200</li>
		<li>24 Hours = 86400</li>
		<li>1 Week = 604800</li>
		<li>1 Month = 2629746</li>
	</ul></p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "tableE" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
						
					foreach($tableE_heading as $value)
					{
						$tableE_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
					
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$tableE = $user->table_ODESSO_APP_SYSTEM_CANCELLATION_TIME($odesso_app_id);
			
			foreach($tableE as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='editE'>Update</button></td>";
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

<div class="table-responsive ">
	<h3>Table 10: Advanced Business Rules</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>If you want to assign services to users, there is an option to assign it upon signup using the business rule above.</p>

	<form method="post" action="global_settings.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1F" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
						
					foreach($table1F_heading as $value)
					{
						$table1F_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						echo "<th>".$value."</th>";
					}
					
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table1F = $user->table_ODESSO_APP_FEATURE_ADVANCED_BUSINESS_RULES($odesso_app_id);
			
			foreach($table1F as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='edit2F'>Update</button></td>";
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

</div>
</div>
</body>
</html>
<script src = "//code.jquery.com/jquery-1.12.4.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
	
<script>
 $(document).ready(function() {
	
	/*  pre-populate ODESSO_APP_ID in "ODESSO_APP_ID" field for insert action... */
	$('.field_1').val('<?php echo $_GET['id'] ; ?>');
	$('.OA_field_0').val('<?php echo $_GET['id'] ; ?>');
	
	
	/* Create an array with the values of all the input boxes in a column */
		$.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
		{
			return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
				return $('input', td).val();
			} );
		}

	var tableE_arr  	= <?php echo json_encode($tableE_arr)?>;

	var table1_arr  	= <?php echo json_encode($table1_arr)?>;
	
	var table1A_arr  	= <?php echo json_encode($table1A_arr)?>;

	var table1B_arr  	= <?php echo json_encode($table1B_arr)?>;

	var table1C_arr  	= <?php echo json_encode($table1C_arr)?>;

	var table1D_arr  	= <?php echo json_encode($table1D_arr)?>;

	var table1E_arr  	= <?php echo json_encode($table1E_arr)?>;

	var table1F_arr  	= <?php echo json_encode($table1F_arr)?>;

	var table2_arr  	= <?php echo json_encode($table2_arr)?>;
	
	var table3_1_arr 	= <?php echo json_encode($table3_1_arr)?>;
	
	var table3_2_arr  	= <?php echo json_encode($table3_2_arr)?>;
	
	var table4_arr  	= <?php echo json_encode($table4_arr)?>;
	
	var table5_arr  	= <?php echo json_encode($table5_arr)?>;
	
	var table6_arr  	= <?php echo json_encode($table6_arr)?>;
	
	var table7_arr  	= <?php echo json_encode($table7_arr)?>;
	
	var table8_arr  	= <?php echo json_encode($table8_arr)?>;
	
	var table9_arr  	= <?php echo json_encode($table9_arr)?>;
	
	var table10_arr 	= <?php echo json_encode($table10_arr)?>;
	
	var table11_arr 	= <?php echo json_encode($table11_arr)?>;
	
	var table12_arr 	= <?php echo json_encode($table12_arr)?>;
	
	var table13_arr 	= <?php echo json_encode($table13_arr)?>;
	
	var table14_arr 	= <?php echo json_encode($table14_arr)?>;
	
	var table15_arr 	= <?php echo json_encode($table15_arr)?>;

	var table15A_arr  	= <?php echo json_encode($table15A_arr)?>;
	
	var table16_arr 	= <?php echo json_encode($table16_arr)?>;
	
	var table17_arr 	= <?php echo json_encode($table17_arr)?>;
	
	var table18_arr 	= <?php echo json_encode($table18_arr)?>;
		
	var table19_arr 	= <?php echo json_encode($table19_arr)?>;

	var table20_arr 	= <?php echo json_encode($table20_arr)?>;
	
	var table21_arr 	= <?php echo json_encode($table21_arr)?>;
	
	var table22_arr 	= <?php echo json_encode($table22_arr)?>;
	
	var table23_arr 	= <?php echo json_encode($table23_arr)?>;
	
	var table24_arr 	= <?php echo json_encode($table24_arr)?>;
	
	var table25_arr 	= <?php echo json_encode($table25_arr)?>;
	
	var table26_arr 	= <?php echo json_encode($table26_arr)?>;
	
	var table27_arr 	= <?php echo json_encode($table27_arr)?>;
	
	var table28_arr 	= <?php echo json_encode($table28_arr)?>;
	
	var table29_arr 	= <?php echo json_encode($table29_arr)?>;
	
	var table30_arr 	= <?php echo json_encode($table30_arr)?>;
	
	var table31_arr 	= <?php echo json_encode($table31_arr)?>;
	
	var table32_arr 	= <?php echo json_encode($table32_arr)?>;
	
	var table33_arr 	= <?php echo json_encode($table33_arr)?>;
	
	var table34_arr 	= <?php echo json_encode($table34_arr)?>;
		
	var table35_arr 	= <?php echo json_encode($table35_arr)?>;
	
	var table36_arr 	= <?php echo json_encode($table36_arr)?>;
	
	var table37_arr 	= <?php echo json_encode($table37_arr)?>;
	
	var table38_arr 	= <?php echo json_encode($table38_arr)?>;
	
	var table39_arr		= <?php echo json_encode($table39_arr)?>;
	
	var table40_arr 	= <?php echo json_encode($table40_arr)?>;
	
	var table41_arr 	= <?php echo json_encode($table41_arr)?>;
	
	var table42_arr 	= <?php echo json_encode($table42_arr)?>;
	
	var table43_arr 	= <?php echo json_encode($table43_arr)?>;
	
	var table44_arr 	= <?php echo json_encode($table44_arr)?>;
	
	var table45_arr 	= <?php echo json_encode($table45_arr)?>;
	
	var table46_arr 	= <?php echo json_encode($table46_arr)?>;
	
	var table47_arr 	= <?php echo json_encode($table47_arr)?>;
	
	var table48_arr 	= <?php echo json_encode($table48_arr)?>;
	
	var table49_arr 	= <?php echo json_encode($table49_arr)?>;
	
	
	/* Initialise the table1 with the required column ordering data types */
	$('#tableE').DataTable( {
		"scrollX": true,
		"columns": tableE_arr
	} );
	
	/* Initialise the table1 with the required column ordering data types */
	$('#table1').DataTable( {
		"scrollX": true,
		"columns": table1_arr
	} );

	/* Initialise the table1 with the required column ordering data types */
	$('#table1A').DataTable( {
		"scrollX": true,
		"columns": table1A_arr
	} );
	/* Initialise the table1 with the required column ordering data types */
	$('#table1B').DataTable( {
		"scrollX": true,
		"columns": table1B_arr
	} );
	/* Initialise the table1 with the required column ordering data types */
	$('#table1C').DataTable( {
		"scrollX": true,
		"columns": table1C_arr
	} );
	/* Initialise the table1 with the required column ordering data types */
	$('#table1D').DataTable( {
		"scrollX": true,
		"columns": table1D_arr
	} );
	/* Initialise the table1 with the required column ordering data types */
	$('#table1E').DataTable( {
		"scrollX": true,
		"columns": table1E_arr
	} );
	/* Initialise the table1 with the required column ordering data types */
	$('#table1F').DataTable( {
		"scrollX": true,
		"columns": table1F_arr
	} );
	/* Initialise the table1 with the required column ordering data types */
	$('#table15A').DataTable( {
		"scrollX": true,
		"columns": table15A_arr
	} );

	/* Initialise the table2 with the required column ordering data types */
	$('#table2').DataTable( {
		"scrollX": true,
		"columns": table2_arr
	} );

	/* Initialise the table3_1 with the required column ordering data types */
	$('#table3_1').DataTable( {
			"scrollX": true,
		"columns": table3_1_arr
	} );
	
	/* Initialise the table3_2 with the required column ordering data types */
	$('#table3_2').DataTable( {
			"scrollX": true,
		"columns": table3_2_arr
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

	/* Initialise the table6 with the required column ordering data types */
	$('#table6').DataTable( {
			"scrollX": true,
		"columns": table6_arr
	} );

	/* Initialise the table7 with the required column ordering data types */
	$('#table7').DataTable( {
			"scrollX": true,
		"columns": table7_arr
	} );

	/* Initialise the table8 with the required column ordering data types */
	$('#table8').DataTable( {
			"scrollX": true,
		"columns": table8_arr
	} );

	/* Initialise the table9 with the required column ordering data types */
	$('#table9').DataTable( {
			"scrollX": true,
		"columns": table9_arr
	} );

	/* Initialise the table10 with the required column ordering data types */
	$('#table10').DataTable( {
			"scrollX": true,
		"columns": table10_arr
	} );

	/* Initialise the table11 with the required column ordering data types */
	$('#table11').DataTable( {
			"scrollX": true,
		"columns": table11_arr
	} );

	/* Initialise the table12 with the required column ordering data types */
	$('#table12').DataTable( {
			"scrollX": true,
		"columns": table12_arr
	} );

	/* Initialise the table13 with the required column ordering data types */
	$('#table13').DataTable( {
			"scrollX": true,
		"columns": table13_arr
	} );

	/* Initialise the table14 with the required column ordering data types */
	$('#table14').DataTable( {
			"scrollX": true,
		"columns": table14_arr
	} );

	/* Initialise the table15 with the required column ordering data types */
	$('#table15').DataTable( {
			"scrollX": true,
		"columns": table15_arr
	} );

	/* Initialise the table16 with the required column ordering data types */
	$('#table16').DataTable( {
			"scrollX": true,
		"columns": table16_arr
	} );

	/* Initialise the table17 with the required column ordering data types */
	$('#table17').DataTable( {
			"scrollX": true,
		"columns": table17_arr
	} );

	/* Initialise the table18 with the required column ordering data types */
	$('#table18').DataTable( {
			"scrollX": true,
		"columns": table18_arr
	} );

	/* Initialise the table19 with the required column ordering data types */
	$('#table19').DataTable( {
			"scrollX": true,
		"columns": table19_arr
	} );

	/* Initialise the table20 with the required column ordering data types */
	$('#table20').DataTable( {
			"scrollX": true,
		"columns": table20_arr
	} );

	
	/* Initialise the table21 with the required column ordering data types */
	$('#table21').DataTable( {
			"scrollX": true,
		"columns": table21_arr
	} );

	
	/* Initialise the table22 with the required column ordering data types */
	$('#table22').DataTable( {
			"scrollX": true,
		"columns": table22_arr
	} );

	
	/* Initialise the table23 with the required column ordering data types */
	$('#table23').DataTable( {
			"scrollX": true,
		"columns": table23_arr
	} );

	
	/* Initialise the table24 with the required column ordering data types */
	$('#table24').DataTable( {
			"scrollX": true,
		"columns": table24_arr
	} );

	
	/* Initialise the table25 with the required column ordering data types */
	$('#table25').DataTable( {
			"scrollX": true,
		"columns": table25_arr
	} );

	
	/* Initialise the table26 with the required column ordering data types */
	$('#table26').DataTable( {
			"scrollX": true,
		"columns": table26_arr
	} );

	
	/* Initialise the table27 with the required column ordering data types */
	$('#table27').DataTable( {
			"scrollX": true,
		"columns": table27_arr
	} );

	
	/* Initialise the table28 with the required column ordering data types */
	$('#table28').DataTable( {
			"scrollX": true,
		"columns": table28_arr
	} );

	
	/* Initialise the table29 with the required column ordering data types */
	$('#table29').DataTable( {
			"scrollX": true,
		"columns": table29_arr
	} );

	
	/* Initialise the table30 with the required column ordering data types */
	$('#table30').DataTable( {
			"scrollX": true,
		"columns": table30_arr
	} );

	/* Initialise the table31 with the required column ordering data types */
	$('#table31').DataTable( {
			"scrollX": true,
		"columns": table31_arr
	} );

	/* Initialise the table32 with the required column ordering data types */
	$('#table32').DataTable( {
			"scrollX": true,
		"columns": table32_arr
	} );

	/* Initialise the table33 with the required column ordering data types */
	$('#table33').DataTable( {
			"scrollX": true,
		"columns": table33_arr
	} );

	/* Initialise the table34 with the required column ordering data types */
	$('#table34').DataTable( {
			"scrollX": true,
		"columns": table34_arr
	} );

	/* Initialise the table35 with the required column ordering data types */
	$('#table35').DataTable( {
			"scrollX": true,
		"columns": table35_arr
	} );

	/* Initialise the table36 with the required column ordering data types */
	$('#table36').DataTable( {
			"scrollX": true,
		"columns": table36_arr
	} );

	/* Initialise the table37 with the required column ordering data types */
	$('#table37').DataTable( {
			"scrollX": true,
		"columns": table37_arr
	} );

	/* Initialise the table38 with the required column ordering data types */
	$('#table38').DataTable( {
			"scrollX": true,
		"columns": table38_arr
	} );

	/* Initialise the table39 with the required column ordering data types */
	$('#table39').DataTable( {
			"scrollX": true,
		"columns": table39_arr
	} );

	/* Initialise the table40 with the required column ordering data types */
	$('#table40').DataTable( {
			"scrollX": true,
		"columns": table40_arr
	} );

	/* Initialise the table41 with the required column ordering data types */
	$('#table41').DataTable( {
			"scrollX": true,
		"columns": table41_arr
	} );

	/* Initialise the table42 with the required column ordering data types */
	$('#table42').DataTable( {
			"scrollX": true,
		"columns": table42_arr
	} );

	/* Initialise the table43 with the required column ordering data types */
	$('#table43').DataTable( {
			"scrollX": true,
		"columns": table43_arr
	} );

	/* Initialise the table44 with the required column ordering data types */
	$('#table44').DataTable( {
			"scrollX": true,
		"columns": table44_arr
	} );

	/* Initialise the table45 with the required column ordering data types */
	$('#table45').DataTable( {
			"scrollX": true,
		"columns": table45_arr
	} );

	/* Initialise the table46 with the required column ordering data types */
	$('#table46').DataTable( {
			"scrollX": true,
		"columns": table46_arr
	} );

	/* Initialise the table47 with the required column ordering data types */
	$('#table47').DataTable( {
			"scrollX": true,
		"columns": table47_arr
	} );

	/* Initialise the table48 with the required column ordering data types */
	$('#table48').DataTable( {
			"scrollX": true,
		"columns": table48_arr
	} );

	/* Initialise the table49 with the required column ordering data types */
	$('#table49').DataTable( {
			"scrollX": true,
		"columns": table49_arr
	} );

	
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	$('.field_1').prop('readonly',true);
	$('.OA_field_0').prop('readonly',true);
	$('.OA_field_1').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.coupon_ODESSO_APP_1').prop('required',true);
	$('.att_ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
	
	
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
						$('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL.'/uploads';?>/' + user_name + '/'+data.image_with_path);
						
						// $('.success_msg').html('File successfully uploaded, here is a link to your file. Please copy and paste it in a safe place since you will need it later:<?php echo BASE_URL;?>/' + user_name + '/'+data.image_with_path);
					
					
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
</script>