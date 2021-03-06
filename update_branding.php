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

$tableA_heading  = $user->tablehead_ODESSO_APP_BRANDING_IMAGES();
$tableA			 = $user->table_ODESSO_APP_BRANDING_IMAGES($odesso_app_id);

$tableB_heading  = $user->tablehead_ODESSO_APP_BRANDING_COLORS();
$tableB			 = $user->table_ODESSO_APP_BRANDING_COLORS($odesso_app_id);

$tableC_heading  = $user->tablehead_ODESSO_APP_BRANDING_UX1();
$tableC			 = $user->table_ODESSO_APP_BRANDING_UX1($odesso_app_id);

$tableD_heading  = $user->tablehead_ODESSO_APP_BRANDING_UX2();
$tableD			 = $user->table_ODESSO_APP_BRANDING_UX2($odesso_app_id);

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
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['editA'])){
	foreach($tableA_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
	// echo "<meta http-equiv='refresh' content='0'>";
}
if(isset($_POST['editB'])){
	foreach($tableB_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['editC'])){
	foreach($tableC_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
}
if(isset($_POST['editD'])){
	foreach($tableD_heading as $value)
	{
		$value3 = $_POST[$value['COLUMN_NAME']];
		foreach($value3 as $key=>$updated_value)
		{
				$user->update_ODESSO_APP_MODULE_USER($value['COLUMN_NAME'],$updated_value,$key);
		}
	}
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


$tableA_arr[]	= null;	 $tableB_arr[]	= null;	 $tableC_arr[] = null;
$tableD_arr[]	= null; $table9_arr[]	= null; 


						
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

<!--------------------------- Title div Ends	  ---------------------------------->

<div class="container">
<div class="row">

<div class="table-responsive ">
	<h3>Table 1: Update Branding</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>To start building your app, let's first set up your branding.<ol><li>First, let's give your app a name by updating the <i>APP_NAME</i>.
	<li><span class="li-content">To start branding your app, copy and paste your logo into the fields <i>BUSINESS_LOGO_LINK</i> and <i>APP_ICON_LINK</i> to make it appear on your splash page and login page respectively.</span></li>
	<li><span class="li-content">Customize your app by changing the <i>BACKGROUND_IMAGE_LINK</i> to a background image (make sure it's <i>750x1334 px</i> or <i>1080x1920 px</i>).</span>
	<li><span class="li-content">Once you're done, press "Update" to update your app.</span></li> </ol></p>

	<form method="post" action="update_branding.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "tableA" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
						
					foreach($tableA_heading as $value)
					{
						$tableA_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$tableA_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
					
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$tableA = $user->table_ODESSO_APP_BRANDING_IMAGES ($odesso_app_id);
			
			foreach($tableA as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='editA'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$tableA_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
								// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' ></td>";
								echo "<td><textarea rows = '5' cols = '30' name=".$key1."[".$result['ODESSO_APP_ID']."] >".$value."</textarea></td>";
							}	
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
	<h3>Table 2: Update App Colors</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>Next, let's update the colors and look and feel of your app. In this section we'll be using Hexadecimal codes. These are 6-digit strings which will represent colors in your app. Here's a handy tool to allow you to look up colors inside of your app: <a href="https://color.adobe.com/" target="_blank">https://color.adobe.com/</a><ol>
	<li><span class="li-content">To start, let's define your MAIN_COLOR_CODE. This represents the color of most of the text your user will read. You will want a color that contrasts against the background of the app. For example, if you have a white background you will probably want a black main color code (ex. 000000). Likewise, with a dark background you may want a white <i>MAIN_COLOR_CODE</i> (ex. FFFFFF)</span></li>
	<li><span>Your <i>THEME_COLOR_CODE</i> should be a color that represents your brand. This color is used for your buttons, top bar, and important words you want to stand out.</span></li>
	<li><span>The <i>TITLE_TEXT_COLOR</i> are your labels inside of the app. For example, at the top of the sidebar is a label that says "Menu". There are also labels inside of shopping carts and e-commerce orders, labeling time, location, etc.</span></li>
	<li><span>An optional attribute you can add to orders or item selection are check boxes. You can change the color inside of a check box by setting a hex code in the <i>CHECK_BOX_COLOR_CODE</i>.</span></li>
	<li><span>You can add or edit the bar at the top of your app by changing the <i>NAVIGATION_BAR_COLOR_CODE</i>. Just note, if you want to see text appear on the top bar, make sure the top bar color contrasts with your <i>THEME_COLOR_CODE</i>.</span></li>
	<li><span class="li-content">You can also change how opaque or transparent the Navigation Bar color is by editing the <i>NAVIGATION_BAR_TRANSPARENCY_ALPHA</i>. If you want the navigation bar to be a full, solid color, set the tranparency to 1. If you don't want the navigation bar there at all, you can set the transparency to 0.</span></li>
	<li><span class="li-content">Once you're done, press "Update" to update your app.</span></li> </ol></p>

	<form method="post" action="update_branding.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "tableB" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					
					foreach($tableB_heading as $value)
					{
						$tableB_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$tableB_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
					
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$tableB = $user->table_ODESSO_APP_BRANDING_COLORS($odesso_app_id);
			
			foreach($tableB as $key=>$result)
			{
					echo '<tr>';
					echo "<td><button type='submit' name='editB'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$tableBS_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
							// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' ></td>";
							echo "<td><textarea  name=".$key1."[".$result['ODESSO_APP_ID']."]>".$value."</textarea></td>";
							}
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
	<h3>Table 3: Global Icons</h3><br>
	<p>Your app also contains icons that give the users a hint of what to do. By default, your app uses <a href="https://material.io/icons/" target="_blank">Google's Universal Material Design Icons</a>, but if you want to create unique ones or change the color, you can edit it in this table. <ol>
		<li><span class="li-content">The <i>NAVIGATION_BAR_BACK_IMAGE_LINK</i> is your "back" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_arrow_back.png"></span></li>
		<li><span class="li-content">The <i>NAVIGATION_BAR_NEXT_IMAGE_LINK</i> is your "forward" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_arrow_forward.png"></span></li>
		<li><span class="li-content">The <i>NAVIGATION_BAR_IMAGE_MENU_IMAGE_LINK</i> is your "menu" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_menu.png"></span></li>
		<li><span class="li-content">The <i>LOCATE_IMAGE_LINK</i> is your "GPS" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_place.png"></span></li>
		<li><span class="li-content">The <i>EDIT_IMAGE_LINK</i> is your "edit" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_edit.png"></span></li>
		<li><span class="li-content">The <i>NAVIGATION_BAR_ADD_IMAGE_LINK</i> is your "add" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_add.png"></span></li>
		<li><span class="li-content">The <i>NAVIGATION_BAR_CART_IMAGE_LINK</i> is your "shopping cart" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/cart_black.png" height="24" width="24"></span></li>
		<li><span class="li-content">The <i>SPINNER_IMAGE_LINK</i> is your "loading" spinner. <img src="../../AppDev/OdessoPlatform/Image/Odesso/app_spinner.png" height="24" width="24"></span></li>
		<li><span class="li-content">The <i>NAVIGATION_BAR_REFRESH_IMAGE_LINK</i> is your "refresh" button. <img src="../../AppProd/OdessoPlatform/GoogleUX/iOS/Black/ic_refresh	.png"></span></li></ol><br/>
	<span class="li-content">Note that even if you aren't using a particular icon, you do need to link to a valid icon in this table. There can be no empty spaces.</span></p>

	<form method="post" action="update_branding.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "tableC" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
						
					foreach($tableC_heading as $value)
					{
						$tableC_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$tableC_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
					
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$tableC = $user->table_ODESSO_APP_BRANDING_UX1 ($odesso_app_id);
			
			foreach($tableC as $key=>$result)
			{
				
				echo "<tr>";
					echo "<td><button type='submit' name='editC'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$tableC_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
								// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' ></td>";
								echo "<td><textarea rows = '5' cols = '30' name=".$key1."[".$result['ODESSO_APP_ID']."] >".$value."</textarea></td>";
							}
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
	<h3>Table 4: Login Screen Icons</h3><br>
	<img src="../../AppProd/OdessoPlatform/OdessoPlatform/Tutorial/step_1.png" alt="Step 1" align="right" width="200px" height="354px"><p>There are just 2 icons on this table.
	<ol><li>The <i>ICON_PALETTE_EMAIL_LINK</i> is the icon next to the user email input. <img src="../../AppProd/OdessoPlatform/Image/Odesso/UserModule/icon_email_dark.png" height="24" width="24"></li>
	<li>The <i>ICON_PALETTE_PASSWORD_LINK</i> is the icon next to the user email input. <img src="../../AppProd/OdessoPlatform/Image/Odesso/UserModule/icon_password_dark.png" height="24" width="24"></li>
	</ol></p>
	<form method="post" action="update_branding.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "tableD" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
						
					foreach($tableD_heading as $value)
					{
						$tableD_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
							
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$tableD_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
					}
					
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$tableD = $user->table_ODESSO_APP_BRANDING_UX2 ($odesso_app_id);
			
			foreach($tableD as $key=>$result)
			{
				echo "<tr>";
					echo "<td><button type='submit' name='editD'>Update</button></td>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_ID')
						{
							echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
							if(in_array($key1,$tableD_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
								// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_ID']."] value='".$value."' ></td>";
								echo "<td><textarea rows = '5' cols = '30' name=".$key1."[".$result['ODESSO_APP_ID']."]>".$value."</textarea></td>";
							}
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
	<h3> Table 5: (Optional) Text Customization  </h3><br>
	<p>	You may have also noticed we have templated words and sentences throughout the app. All of this is customizable, and can be changed by looking it up in the below table. The fastest way is to use the search function to find the String you wish to change, and edit the <b><i>BODY</i></b>. Make sure you don't touch the <i>APP_ID</i> or <i>TAG</i></b>. When you're done, press "Update" on each individual line.</p>

	<form method="post" action="update_branding.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table9" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						echo "<th>Edit</th>";
					foreach($table9_heading as $value)
					{
						$table9_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						if($value['DATA_TYPE'] == 'tinyint')
						{
							$table9_heading_tinyint[] = $value['COLUMN_NAME'];
						}
						
						echo "<th>".$value['COLUMN_NAME']."</th>";
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
							if(in_array($key1,$table9_heading_tinyint))
							{
								$checked_box = '';
								if($value == '1')
								{
									$checked_box = 'checked';
								}
								echo "<td>
								<input type='checkbox' ".$checked_box." onchange='coloumn_checkbox(this)'>
								
								<input type='hidden' class='coloumn_checkbox'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_STORE_ITEM_ID']."] value='".$value."' ></td>";
							}
							else
							{
								
							// echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] value='".$value."' ></td>";
							echo "<td><textarea rows = '3' cols = '30' name=".$key1."[".$result['ODESSO_APP_REF_STRING_ID']."] >".$value."</textarea></td>";
							}	
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
	
	
	//disable ID field (first input field )in all HTML tables, because its set with auto-increment in database...
	$('.field_0').prop('readonly',true);
	
	//necessary to fill 2nd and 3rd fields...
	$('.ODESSO_APP_1').prop('required',true);
	$('.ODESSO_APP_2').prop('required',true);
  
 
	
	/* Create an array with the values of all the input boxes in a column */
		$.fn.dataTable.ext.order['dom-text'] = function  ( settings, col )
		{
			return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
				return $('input', td).val();
				// return $('textarea', td).val();
			} );
		}

		var tableA_arr 		= <?php echo json_encode($tableA_arr)?>;
		
		var tableB_arr 		= <?php echo json_encode($tableB_arr)?>;
		
		var tableC_arr 		= <?php echo json_encode($tableC_arr)?>;
		
		var tableD_arr 		= <?php echo json_encode($tableD_arr)?>;
		
		var table9_arr 		= <?php echo json_encode($table9_arr)?>;
		
	/* Initialise the tableA with the required column ordering data types */
		$('#tableA').DataTable( {
				"scrollX": true,
			"columns": tableA_arr
		} );
	
	/* Initialise the tableB with the required column ordering data types */
		$('#tableB').DataTable(  {
				"scrollX": true,
			"columns": tableB_arr
		} );
	
	/* Initialise the tableC with the required column ordering data types */
		$('#tableC').DataTable( {
				"scrollX": true,
			"columns": tableC_arr
		} );
	
	/* Initialise the tableD with the required column ordering data types */
		$('#tableD').DataTable( {
				"scrollX": true,
			"columns": tableD_arr
		} );
	
	/* Initialise the tableD with the required column ordering data types */
		$('#table9').DataTable( {
				"scrollX": true,
			"columns": table9_arr
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
						
						// $('.success_msg').html('File successfully uploaded: https://www.odesso.com/AppPt/Developerapi/' + user_name + '/'+data.image_with_path);
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