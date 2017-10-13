<?php 
session_start(); 
include_once 'config/dbconfig.php';
$check = $_SESSION['login_username'];
$pageid= $_GET['id'];
if($check == ''){
header("Location:index.php");
}
ob_start();
$odesso_app_id= $_GET['id'];

$table3_heading	 = $user->tablehead_ODESSO_APP_MODULE_ITEM();
$table3			 = $user->table_ODESSO_APP_MODULE_ITEM($odesso_app_id);

$table4_heading	 = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM();
$table4			 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id);

$table7_heading	 = $user->tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE();
$table7			 = $user->table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id);

$table12_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE();
$table12		 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id);

$table13_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE();
$table13		 = $user->table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id);

$table14_heading = $user->tablehead_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS();
$table14		 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id);

$table15_heading = $user->tablehead_ODESSO_END_USER();
$table15		 = $user->table_ODESSO_END_USER($odesso_app_id);




?>

<?php include 'header.php' ;?>
<div class="container">
<div class="row">
<!----------------------------------- Title div Starts ---------------------------------->

<div class="upload_img">
	<h2>Reports</h2>
</div>

<!----------------------------------- Title div Ends	  ---------------------------------->


<!-- Table 1-->
<div class="table-responsive">
	<h3> Table 1: _PT_ODESSO_APP_MODULE_ITEM  </h3>
	  <form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table1" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
						
					foreach($table3_heading as $value)
					{
						$table1_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
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
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_app_module_item" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export1" name="export1" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 1-->
<!-- Table 2-->
<div class="table-responsive">
	<h3> Table 2: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM   </h3>
	<form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table2" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					foreach($table4_heading as $value)
					{
						$table2_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
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
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_app_module_store_store_item" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export2" name="export2" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 2-->

<!-- Table 3-->
<div class="table-responsive">
	<h3> Table 3: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE</h3>
	<form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table3" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					foreach($table12_heading as $value)
					{
						$table3_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
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
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_app_module_store_store_item_image" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export3" name="export3" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 3-->
<!-- Table 4-->
<div class="table-responsive">
	<h3> Table 4: _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE</h3>
	<form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table4" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					foreach($table13_heading as $value)
					{
						$table4_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
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
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_app_module_store_store_item_attribute" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export4" name="export4" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 4-->
<!-- Table 5-->
<div class="table-responsive">
	<h3> Table 5: _PT_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS</h3>
	<form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table5" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					foreach($table14_heading as $value)
					{
						$table5_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
					}
				?>
			</tr>
		</thead>
	<tbody>
		<?php
			$table14 = $user->table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id);
			
			foreach($table14 as $key=>$result)
			{
				echo "<tr>";
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_app_module_store_order_address" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export5" name="export5" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 5-->

<!-- Table 6-->
<div class="table-responsive">
	<h3> Table 6:  _PT_ODESSO_END_USER</h3>
	<form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table6" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					foreach($table15_heading as $value)
					{
						$table6_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
						echo "<th>".$value."</th>";
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
					foreach ($result as $key1=>$value)
					{
						if($key1=='ODESSO_APP_ID' || $key1=='ODESSO_END_USER_ID')
						{
						echo "<td><input type='text'  name=".$key1."[".$result['ODESSO_END_USER_ID']."] value='".$value."' readonly  ></td>";
						}
						else
						{
						echo "<td><input type='text' name=".$key1."[".$result['ODESSO_END_USER_ID']."] value='".$value."' ></td>";
						}
					}
				echo"</tr>";
			}
		?>
	</tbody>
	</table>
	</form>
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_end_user" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export6" name="export6" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 6-->

<!-- Table 7-->
<div class="table-responsive">
	<h3> Table 7: _PT_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE  </h3>
	<form method="post" action="reports.php?id=<?php echo $odesso_app_id; ?>">
	<table id = "table7" class="table table-profile myTable" style="border: 1px solid black; border-collapse: collapse;">
		<thead>
			<tr style="border: 1px solid black;">
				<?php
					foreach($table7_heading as $value)
					{
						$table7_arr[] = array('orderDataType' => 'dom-text','type' => 'string');
						
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
	<form action="export.php?id=<?php echo $pageid; ?>&table=_pt_odesso_app_module_user_app_profile_attribute" method="post" name="export_excel" class="export_form">
	  <div class="control-group">
		<div class="controls">
		  <button type="submit" id="export7" name="export7" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
			
		</div>
	  </div>
	</form>
</div>
<!-- End Table 7-->
</div>
</div>
</body>
</html>
<script src = "//code.jquery.com/jquery-1.12.4.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
	

<script>
$(document).ready(function() {
   /*  $('.myTable').DataTable( {
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
	
	var table6_arr  	= <?php echo json_encode($table6_arr)?>;
	
	var table7_arr  	= <?php echo json_encode($table7_arr)?>;
	
	
	
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
	
	
} );



</script>