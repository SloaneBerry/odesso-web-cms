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
$odesso_app_id = $_GET['id'];

$table_heading		= $user->tablehead_ODESSO_APP_FEATURE();
$table 		  		= $user->table_ODESSO_APP_FEATURE($odesso_app_id);
/* $group4_heading = $user->group4_heading();
echo "<pre>";
		print_r($group4_heading);
echo "</pre>"; */
$group1_heading		= array(
					   'EMAIL_TO_CUSTOMER_SYSTEM_CANCEL' => 'EMAIL_TO_CUSTOMER_SYSTEM_CANCEL',
					   'PUSH_TO_CUSTOMER_SYSTEM_CANCEL'  => 'PUSH_TO_CUSTOMER_SYSTEM_CANCEL'
					);
$group2_heading 	= array(
					  'EMAIL_TO_MERCHANT_SYSTEM_CANCEL' => 'EMAIL_TO_MERCHANT_SYSTEM_CANCEL',
					  'PUSH_TO_MERCHANT_SYSTEM_CANCEL'  => 'PUSH_TO_MERCHANT_SYSTEM_CANCEL'
					);

$group3_heading 	= array(
					  'IS_EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'IS_EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_SUBMIT_ORDER','EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_SUBMIT_ORDER'
					);
$group3_datatype 	= array(
					  'IS_EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'tinyint','EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'varchar'
					);

$group4_heading 	= array(
						'IS_EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER'=>'IS_EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER',
						'IS_PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'IS_PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER',
						'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER',
						'PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER'=>
						'PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER' 
					);
$group4_datatype 	= array(
						'IS_EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER'=>'tinyint','EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'vachar','IS_PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER' => 'tinyint','PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_SUBMIT_ORDER'=>
						'vachar' 
					); 
$group5_heading 	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' => 'IS_EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER', 
						'IS_PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' => 'IS_PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER', 
						'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' => 'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER',
						'PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' =>
						'PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER'
						);
 $group5_datatype = array(
						'IS_EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' => '1', 
						'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' => 'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER',
						'IS_PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' => '1',
						'PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER' =>
						'PUSH_TO_MERCHANT_WHEN_CUSTOMER_SUBMIT_ORDER'
						);

						
$group6_heading 	= array(
						'IS_EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' => 'IS_EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER',
						'IS_PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' => 'IS_PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER',
						'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' => 'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER',
						'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>
						'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER'
					);

$group6_datatype	= array(
						'IS_EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' => '1', 'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' => 'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER',
						'IS_PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' => '1',
						'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>
						'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER'
					);


$group7_heading 	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'IS_EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER', 
						'IS_PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'IS_PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER',
						'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER',
						'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER'
					);

$group7_datatype 	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'1', 'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER', 'IS_PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'1',
						'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER' =>'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_ACCEPT_ORDER'
					);

$group8_heading 	= array(
						'IS_EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' => 'IS_EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER',
						'IS_PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' => 'IS_PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER',

						'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' => 'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER',
						'PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' =>'PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER'
					);

$group8_datatype 	= array(
						'IS_EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' => '1', 'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' => 'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER',
						'IS_PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' => '1',
						'PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER' =>'PUSH_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CONFIRM_ORDER'
					);


$group9_heading 	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' => 'IS_EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER',
						'IS_PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' =>'IS_PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER', 
						'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER',
						'PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' =>'PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER'
					);

$group9_datatype	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' => '1',
						'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER',
						'IS_PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' =>'1', 'PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER' =>'PUSH_TO_MERCHANT_WHEN_CUSTOMER_CONFIRM_ORDER'
					);


$group10_heading 	= array(
						'IS_EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'IS_EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER',
						'IS_PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'IS_PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER',

						'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER', 
						'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER'
					);

$group10_datatype	= array(
						'IS_EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'1', 'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER', 'IS_PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'1', 'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER'
					);


$group11_heading 	= array(
						'IS_EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'IS_EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER',
						'EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER'
					);
$group11_datatype 	= array(
						'IS_EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'1','EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'EMAIL_TO_SERVICE_PROVIDE_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER'
					);

$group12_heading 	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'IS_EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER',
						'IS_PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'IS_PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER', 
						'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER', 
						'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER'
					);

$group12_datatype 	= array(
						'IS_EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'1', 'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER', 'IS_PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'1', 'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER' =>'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_COMPLETE_ORDER'
					);


$group13_heading 	= array(
						'EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_CANCEL_ORDER' =>'EMAIL_TO_CUSTOMER_WHEN_CUSTOMER_CANCEL_ORDER','EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CANCEL_ORDER' =>'EMAIL_TO_SERVICE_PROVIDER_WHEN_CUSTOMER_CANCEL_ORDER', 'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CANCEL_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CANCEL_ORDER'
					);

$group14_heading 	= array(
						'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER' => 
						'EMAIL_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER', 'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER' =>'PUSH_TO_CUSTOMER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER'
					);


$group15_heading 	= array(
						'EMAIL_TO_SERVICE_PROVIDER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER' =>'EMAIL_TO_SERVICE_PROVIDER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER',
						'PUSH_TO_SERVICE_PROVIDER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER' =>'PUSH_TO_SERVICE_PROVIDER_WHEN_SERVICE_PROVIDER_CANCEL_ORDER'
					);

$group16_heading 	= array(
						'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CANCEL_ORDER' =>'EMAIL_TO_MERCHANT_WHEN_CUSTOMER_CANCEL_ORDER','PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_CANCEL_ORDER' =>'PUSH_TO_MERCHANT_WHEN_SERVICE_PROVIDER_CANCEL_ORDER'
					);


// update Functions...

if(isset($_POST['edit1'])){
	
	
	foreach($group1_heading as $value)
	{
		$value1 = $_POST[$value];
	
		foreach($value1 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit2'])){
	
	
	foreach($group2_heading as $value)
	{
		$value2 = $_POST[$value];
	
		foreach($value2 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit3'])){
	
	
	foreach($group3_heading as $value)
	{
		$value3 = $_POST[$value];
	
		foreach($value3 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}

if(isset($_POST['edit4'])){
	
	
	foreach($group4_heading as $value)
	{
		$value4 = $_POST[$value];
	
		foreach($value4 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit5'])){
	
	
	foreach($group5_heading as $value)
	{
		$value5 = $_POST[$value];
	
		foreach($value5 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}

if(isset($_POST['edit6'])){
	
	
	foreach($group6_heading as $value)
	{
		$value6 = $_POST[$value];
	
		foreach($value6 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit7'])){
	
	
	foreach($group7_heading as $value)
	{
		$value7 = $_POST[$value];
	
		foreach($value7 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit8'])){
	
	
	foreach($group8_heading as $value)
	{
		$value8 = $_POST[$value];
	
		foreach($value8 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit9'])){
	
	
	foreach($group9_heading as $value)
	{
		$value9 = $_POST[$value];
	
		foreach($value9 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit10'])){
	
	
	foreach($group10_heading as $value)
	{
		$value10 = $_POST[$value];
	
		foreach($value10 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit11'])){
	
	
	foreach($group11_heading as $value)
	{
		$value11 = $_POST[$value];
	
		foreach($value11 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit12'])){
	
	
	foreach($group12_heading as $value)
	{
		$value12 = $_POST[$value];
	
		foreach($value12 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit13'])){
	
	
	foreach($group13_heading as $value)
	{
		$value13 = $_POST[$value];
	
		foreach($value13 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit14'])){
	
	
	foreach($group14_heading as $value)
	{
		$value14 = $_POST[$value];
	
		foreach($value14 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}

if(isset($_POST['edit15'])){
	
	
	foreach($group15_heading as $value)
	{
		$value15 = $_POST[$value];
	
		foreach($value15 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}
if(isset($_POST['edit16'])){
	
	
	foreach($group16_heading as $value)
	{
		$value16 = $_POST[$value];
	
		foreach($value16 as $key=>$updated_value)
		{
				
				$user->update_ODESSO_APP_FEATURE_TABLE($value,$updated_value,$key);
		}
	}
				
}

/* 
 	echo "<pre>";
				print_r($table);
	echo "</pre>"; */  
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
		
			<!------------------- GROUP 1 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 1</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table1" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group1_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit1' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group1_heading[$key1]){
										
											echo "<td><textarea rows='4' cols='50' name=".$group1_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
										} 
									}
									echo"</tr>";
								} 
							 ?>
						</tbody>
					</table>		
				</form>
			</div>	
			<!------------------- GROUP 1 ENDS --------------------------->	
			
			<!------------------- GROUP 2 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 2</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table2" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group2_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit2' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group2_heading[$key1]){
										
											echo "<td><textarea rows='4' cols='50' name=".$group2_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
										} 
									}
									echo"</tr>";
								} 
							 ?>
						</tbody>
					</table>		
				</form>
			</div>	
			
			<!------------------- GROUP 2 ENDS --------------------------->	
					
			
			<!------------------- GROUP 3 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 3</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table3" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group3_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit3' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group3_heading[$key1]){
												if($group3_datatype[$key1] == 'tinyint'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group3_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group3_heading[$key1]."' name=".$group3_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
												}else{
													
													echo "<td><textarea rows='4' cols='50' name=".$group3_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			<!------------------- GROUP 3 ENDS --------------------------->	
			<!------------------- GROUP 4 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 4</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table4" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group4_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit4' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group4_heading[$key1]){
											
											
											if($group4_datatype[$key1] == 'tinyint' || $group4_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group4_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group4_heading[$key1]."' name=".$group4_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
													
											echo "<td><textarea rows='4' cols='50' name=".$group4_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 4 ENDS --------------------------->	
			<!------------------- GROUP 5 STARTS ------------------------->	
			<div class="table-responsive ">
					<h3>Group 5</h3>
					<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
						<table id = "table5" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
							<thead>
								<tr style="border: 1px solid black;">
									<?php
										echo "<th>Action</th>";
										foreach($group5_heading as $heading)
										{
											
											echo "<th>".$heading."</th>";
										}
									?>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit5' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
											// echo "<pre>";
													// print_r($group5_datatype[$key1]);
											// echo "</pre>";
										if($key1 == $group5_heading[$key1]){
											if($group5_datatype[$key1] == 'tinyint' || $group5_datatype[$key1] == '1'){
												
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group5_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group5_heading[$key1]."' name=".$group5_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group5_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
				
			<!------------------- GROUP 5 ENDS --------------------------->	
			
			<!------------------- GROUP 6 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 6</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table6" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group6_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit6' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group6_heading[$key1]){
											if($group6_datatype[$key1] == 'tinyint' || $group6_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group6_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group6_heading[$key1]."' name=".$group6_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group6_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 6 ENDS --------------------------->	
			<!------------------- GROUP 7 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 7</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table7" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group7_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit7' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group7_heading[$key1]){
											if($group7_datatype[$key1] == 'tinyint' || $group7_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group7_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group7_heading[$key1]."' name=".$group7_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group7_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 7 ENDS -------------------------->	
			<!------------------- GROUP 8 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 8</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table8" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group8_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit8' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group8_heading[$key1]){
											if($group8_datatype[$key1] == 'tinyint' || $group8_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group8_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group8_heading[$key1]."' name=".$group8_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group8_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 8 ENDS ------------------------->	
			<!------------------- GROUP 9 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 9</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table9" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group9_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
							
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit9' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group9_heading[$key1]){
											if($group9_datatype[$key1] == 'tinyint' || $group9_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group9_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group9_heading[$key1]."' name=".$group9_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group9_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 9 ENDS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 10</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table10" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group10_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit10' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group10_heading[$key1]){
											if($group10_datatype[$key1] == 'tinyint' || $group10_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group10_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group10_heading[$key1]."' name=".$group10_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group10_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 10 ENDS ------------------------->	
			
			
			<!------------------- GROUP 11 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 11</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table11" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group11_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit11' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group11_heading[$key1]){
											if($group11_datatype[$key1] == 'tinyint' || $group11_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group11_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group11_heading[$key1]."' name=".$group11_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group11_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 11 ENDS ------------------------->	
			
			
			<!------------------- GROUP 12 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 12</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table12" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group12_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit12' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group12_heading[$key1]){
											if($group12_datatype[$key1] == 'tinyint' || $group12_datatype[$key1] == '1'){
													if ($value == '1'){
														
													$checked_box = 'checked = "checked"';
													}else{
														
													$checked_box = '';
													}
													echo "<td><input type='checkbox' ".$checked_box." onchange= coloumn_checkbox(this,'".$group12_heading[$key1]."')>
								
													<input type='hidden' class='coloumn_checkbox'  id = '".$group12_heading[$key1]."' name=".$group12_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] value='".$value."' ></td>";
													
											}else{
												
											echo "<td><textarea rows='4' cols='50' name=".$group12_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
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
			
			<!------------------- GROUP 12 ENDS ------------------------->	
			
			<!------------------- GROUP 13 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 13</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table13" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group13_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit13' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group13_heading[$key1]){
										
											echo "<td><textarea rows='4' cols='50' name=".$group13_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
										} 
									}
									echo"</tr>";
								} 
							 ?>
						</tbody>
					</table>		
				</form>
			</div>	
			
			<!------------------- GROUP 13 ENDS ------------------------->	
			
			<!------------------- GROUP 14 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 14</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table10" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group14_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
									
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit14' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group14_heading[$key1]){
										
											echo "<td><textarea rows='4' cols='50' name=".$group14_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
										} 
									}
									echo"</tr>";
								} 
							 ?>
						</tbody>
					</table>		
				</form>
			</div>	
			
			<!------------------- GROUP 14 ENDS ------------------------->	
			
			<!------------------- GROUP 15 STARTS ------------------------->	
			<div class="table-responsive ">
				<h3>Group 15</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table15" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group15_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit15' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group15_heading[$key1]){
										
											echo "<td><textarea rows='4' cols='50' name=".$group15_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
										} 
									}
									echo"</tr>";
								} 
							 ?>
						</tbody>
					</table>		
				</form>
			</div>	
			
			<!------------------- GROUP 15 ENDS --------------------------->	
	
			<!------------------- GROUP 16 STARTS ------------------------->
			<div class="table-responsive ">
				<h3>Group 16</h3>
				<form class = "frm_insert" method="post" action="notification11.php?id=<?php echo $odesso_app_id; ?>">
					<table id = "table16" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
						<thead>
							<tr style="border: 1px solid black;">
								<?php
									echo "<th>Action</th>";
									foreach($group16_heading as $heading)
									{
										
										echo "<th>".$heading."</th>";
									}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($table as $key=>$result)
								{
									echo "<tr>";
									echo "<td><button  name='edit16' class = 'update_icon' title = 'Update'  type='submit'></td>";
									foreach($result as $key1 => $value){
										
										if($key1 == $group16_heading[$key1]){
										
											echo "<td><textarea rows='4' cols='50' name=".$group16_heading[$key1]."[".$result['ODESSO_APP_FEATURE_ID']."] >".htmlspecialchars($value,ENT_QUOTES)."</textarea></td>";
										} 
									}
									echo"</tr>";
								} 
							 ?>
						</tbody>
					</table>		
				</form>
			</div>	
					
			<!------------------- GROUP 16 ENDS --------------------------->	
			
	</div>
</div>

<script src = "//code.jquery.com/jquery-1.12.4.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
	
<script>
$(document).ready(function() {
	
	/* Initialise the table1  */
	$('#table1').DataTable();
	
	/* Initialise the table2 */
	$('#table2').DataTable();
	
	/* Initialise the table3  */
	$('#table3').DataTable();
	/* Initialise the table4  */
	$('#table4').DataTable();
	/* Initialise the table5  */
	$('#table5').DataTable();
	
	/* Initialise the table6  */
	$('#table6').DataTable();
	
	/* Initialise the table7  */
	$('#table7').DataTable();
	
	/* Initialise the table8  */
	$('#table8').DataTable();
	
	/* Initialise the table9  */
	$('#table9').DataTable();
	/* Initialise the table10  */
	$('#table10').DataTable();
	/* Initialise the table11  */
	$('#table11').DataTable();
	/* Initialise the table12  */
	$('#table12').DataTable();
	
	/* Initialise the table13  */
	$('#table13').DataTable();
	
	/* Initialise the table14  */
	$('#table14').DataTable();
	
	/* Initialise the table15  */
	$('#table15').DataTable();
	
	/* Initialise the table16  */
	$('#table16').DataTable();
			 
});

function coloumn_checkbox(that,id)
{
	if($(that).is(':checked'))
	{
		// alert('if part');
		$('#'+id).val('1');
		// $(that).parent('td').find('input.coloumn_checkbox').val('1');
	}
	else
	{
		// alert('#'+id);
		$('#'+id).val('0');
		// $(that).parent('td').find('input.coloumn_checkbox').val('0');
	}
}
</script>