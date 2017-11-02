<?php
class USER
{
    public $db;
    public $table_prefix;
	function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
	// Function For Recover Password
  public function recover_password($email,$username)
   {
	   try{
		   $stmt = $this->db->prepare("SELECT * FROM `admin` WHERE email='".$email."' AND Username='".$username."' ");
		   $stmt->execute(array(':email'=>$email, ':Username'=> $username));
		   $rows = $stmt->fetchAll();
		   foreach ($rows as $result) {
				$to = $result['email'];
				$id = $result['id'];
				$username = $result['Username'];
				$url = "https://www.bpm-technologies.com/AppPt/Developerapi/change_password.php?id=$id";
				$body  =  "
				Hello ,<br>
				Username : $username;<br>
				Please click on following link for changing password:<br>
				'".$url."'<br>
				Sincerely,<br>
				BPMGROUP";
				$from = "info@odesso.com";
				$subject = " Password recovered";
				$headers1 = "From: $from\n";
				$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
				$headers1 .= "X-Priority: 1\r\n";
				$headers1 .= "X-MSMail-Priority: High\r\n";
				$headers1 .= "X-Mailer: Just My Server\r\n";
				$sentmail = mail($to, $subject, $body, $headers1);
				if($sentmail==1)
				{
					echo "<div class='msg'>A link sent to your email Address for recover your password .</div>";
				}
				else{
					echo "<div class='msg'>Cannot send password to your e-mail address.Problem with sending mail...</div>";
				} 
			}		   
		   }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }  
   }
   
   // Function for import data from csv into table...
    public function importData($tableName, $columns,$values){
	   
	    $this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.''.$tableName) : $this->table_prefix.''.$tableName;
		
		try
		 {
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.' ('.$columns.') VALUES("'.$values.'")');
			// echo 'INSERT INTO '.$tablename.' ('.$columns.') VALUES("'.$values.'")';
			$stmt->execute(); 											   
			return true;
			 
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    	 
    }
   /* // Function for edit row into table...
   public function editRow($id, $tableName, $fieldname){
	   
	   
	   $this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.''.$tableName) : $this->table_prefix.''.$tableName;
      
	   try
		 {
			 
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    
	   
   } */
   
   // Function for delete row from table...
   
   public function deleteRow($id, $tableName, $fieldname){
	   
	   
	   $this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.''.$tableName) : $this->table_prefix.''.$tableName;
      
	   try
		 {
			 $stmt = $this->db->prepare("DELETE FROM ".$tablename." WHERE ".$fieldname ." = '".$id."' ");
			 // echo "DELETE  FROM ".$tablename." WHERE ".$fieldname ." = '".$id."'";
			 $stmt->execute();
			  $result = $stmt;
			  return 'deleted';
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    
	   
   }
   
   // Function for copy row with in the same table with auto-increment...
	public function duplicateRow($tableName,$columns,$values){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.''.$tableName) : $this->table_prefix.''.$tableName;
      
	   try
		 {
			 $stmt = $this->db->prepare("INSERT INTO ".$tablename." (".$columns.") VALUES(".$values.")");
			 $stmt->execute(); 											   
				// echo "INSERT INTO ".$tablename." (".$columns.") VALUES(".$values."";
			 return $this->db->lastInsertId();
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    
		
	}
	
	// Function for copy 3 rows for _odesso_app_module_store_store_item_location_schedule...
	public function duplicateRow_itemLocationSchedule($tableName,$columns,$values){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.''.$tableName) : $this->table_prefix.''.$tableName;
      
	   try
		 {
			 $stmt = $this->db->prepare("INSERT INTO ".$tablename." (".$columns.") VALUES(".$values.")");
			 $stmt->execute(); 											   
				// echo "INSERT INTO ".$tablename." (".$columns.") VALUES(".$values.")";
			 return true;
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    
		
	}
	
	// Function for get row from table...
		public function getRow($id,$tableName,$fieldname){
			
			$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
			$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.''.$tableName) : $this->table_prefix.''.$tableName;
		  
		   try
			 {
				 $stmt = $this->db->prepare("SELECT * FROM ".$tablename." WHERE ".$fieldname." = '".$id."'");
				 $stmt->execute();
				 $row=$stmt->fetch(PDO::FETCH_ASSOC);
				 return $row;
			 }
			 catch(PDOException $e)
			   {
				   echo $e->getMessage();
			   }    
			
		}

   //Function for update image value...
    public function imageName($image,$Username,$APPID)
	 {
		 try
		 {
			$stmt = $this->db->prepare('UPDATE admin SET image = "'.$image.'" WHERE ODESSO_APP_ID ="'.$APPID.'" AND Username="'.$Username.'"');
			 
			 $stmt->execute(array(':image'=>$image, ':ODESSO_APP_ID'=>$APPID, ':Username'=>$Username ));
			  $result = $stmt;
			  return true;
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    
	 }
   //Function for checking already existing user for change password
	public function check_user($email, $username)
	{
		try
		  {
			 $stmt = $this->db->prepare("SELECT email FROM admin WHERE email=:email AND Username=:Username");
			 $stmt->execute(array(':email'=>$email, ':Username'=>$username));
			 $row=$stmt->fetch(PDO::FETCH_ASSOC);
			 if($row['email']==$email) {
			  return true;  
			 }
			 else{
				 echo "<div class='msg'> Invalid Email Id !</div>";
			 }
		 }
		 catch(PDOException $e)
		 {
			echo $e->getMessage();
		 }
	}
	//Function for fetching data for change password
	public function fetch_data($id)
	{
		try
		  {
			 $stmt = $this->db->prepare("SELECT * FROM admin WHERE id=:id");
			 $stmt->execute(array(':id'=>$id));
			 $row=$stmt->fetch(PDO::FETCH_ASSOC);
			 return $row;
			
		 }
		 catch(PDOException $e)
		 {
			echo $e->getMessage();
		 }
	}
	//Function for Change Password
    public function change_password($email, $username, $new_password)
	 {
		 try
		 {
			  $stmt = $this->db->prepare("UPDATE admin SET password= '".$new_password."' WHERE email='".$email."' AND Username='".$username."'");
			  $stmt->execute(array(':password'=>$new_password, ':email'=>$email, ':Username'=>$username ));
			  $result = $stmt;
			  return true;
		 }
		 catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }    
	 }
	// Function for login page
    public function login($email,$password,$app_type)
    // public function login($email,$password)
    {
       try
       {
        
		$stmt = $this->db->prepare("SELECT * FROM admin WHERE `Username` = '".$email."' AND `Password` = '".$password."'  ");
		  
		// $stmt = $this->db->prepare("SELECT * FROM admin WHERE `Username` = '".$email."' AND `Password` = '".$password."' AND environment = '".$app_type."' ");
         
		$stmt->execute(array(':ODESSO_CLIENT_EMAIL'=>$email, ':ODESSO_CLIENT_PASSWORD'=>$password));
          
		$row 		= $stmt->fetch(PDO::FETCH_ASSOC);
		$id			= $row['ODESSO_APP_ID'];
		$Username 	= $row['Username'];
		$emailId 	= $row['email'];
		$app_type 	= $row['environment'];
		  
		if($stmt->rowCount()>0)
		{
				 $_SESSION['email'] 		 = $emailId;
				 $_SESSION['login_username'] = $email;
				 $_SESSION['username']		 = $Username;
				 $_SESSION['id']			 = $id;
				 
				 
				if($app_type == 'PROD'){
	
					$_SESSION['APP_TYPE'] 	   = '_PROD';
					$_SESSION['APP_TYPE_CLS']  = 'APP_PROD_CLS';
				
				}else if($app_type == 'DEV'){
					
					$_SESSION['APP_TYPE']	   = '_DEV';
					$_SESSION['APP_TYPE_CLS']  = 'APP_DEV_CLS';

				}else if($app_type == 'PT'){
					
					$_SESSION['APP_TYPE'] 		= '_pt';
					$_SESSION['APP_TYPE_CLS'] 	= 'APP_PT_CLS';

				}else{
					
					$_SESSION['APP_TYPE'] 		= '_pt';
					$_SESSION['APP_TYPE_CLS'] 	= 'APP_PT_CLS';
				} 		
				 
		?>
				<script>
					window.location.replace("<?php echo BASE_URL; ?>/home.php?id=<?php echo $id;?>");
				</script>
	<?php
         }
		  else{
			  echo "<div class='msg'>Incorrect Username Or Password</div>";
		  }
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   //Function for logout
    public function logout()
   {
       if(session_destroy())
		{
		header("Location: ".BASE_URL);
		}
   }
   // Function for fetching odesso App id
    public function odesso_app_id($client_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM ".$tablename." WHERE `ODESSO_CLIENT_ID` = '".$client_id."'");
          $stmt->execute();
		  $row=$stmt->fetch(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert1
    public function odesso_app_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
		  $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   } 
   // Function for insert2
    public function odesso_app_feature_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert3
    public function odesso_app_module_store_category_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_category') : $this->table_prefix.'_odesso_app_module_store_category';
       try
       {
		  $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of '_ODESSO_APP_FEATURE' table...
    public function tablehead_ODESSO_APP_FEATURE_For_insert_HomePage($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 // $row = array('ODESSO_APP_FEATURE_ID', 'ODESSO_APP_ID','COUPON_INCLUDED', 'IS_STORE_CART_NEEDED','IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED','MAX_IMAGE_NUMBER', 'IS_ORDER_PRICE_TABLE_ON', 'IS_ORDER_ITEM_TABLE_ON','IS_ORDER_CUSTOMER_DESCRIPTION_ON');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   } 
   public function tablehead_ODESSO_APP_FEATURE_For_HomePage($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_FEATURE_ID', 'ODESSO_APP_ID','COUPON_INCLUDED', 'IS_STORE_CART_NEEDED','IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED','MAX_IMAGE_NUMBER', 'IS_ORDER_PRICE_TABLE_ON', 'IS_ORDER_ITEM_TABLE_ON','IS_ORDER_CUSTOMER_DESCRIPTION_ON');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_FOR_HomePage($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_FEATURE_ID,ODESSO_APP_ID, COUPON_INCLUDED, IS_STORE_CART_NEEDED,
									  IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED, MAX_IMAGE_NUMBER, 
									  IS_ORDER_PRICE_TABLE_ON, IS_ORDER_ITEM_TABLE_ON, IS_ORDER_CUSTOMER_DESCRIPTION_ON FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function tablehead_ODESSO_APP_FEATURE_GLOBAL_WORKFLOW_SETTINGS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_FEATURE_ID','ODESSO_APP_ID','IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED','MAX_IMAGE_NUMBER','IS_SP_ALLOWED_TO_SELECT_ITEMS','IS_USER_DETAIL_CHAT_ON');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_GLOBAL_WORKFLOW_SETTINGS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_FEATURE_ID, ODESSO_APP_ID, IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED, MAX_IMAGE_NUMBER, 
									  IS_SP_ALLOWED_TO_SELECT_ITEMS, IS_USER_DETAIL_CHAT_ON FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function tablehead_ODESSO_APP_FEATURE_ECOMMERCE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_FEATURE_ID','ODESSO_APP_ID','TRANSACTION_INCLUDED','IS_CUSTOMER_UPDATE_PAYMENT_ON','COUPON_INCLUDED','IS_STORE_CART_NEEDED');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_ECOMMERCE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT 'ODESSO_APP_FEATURE_ID', ODESSO_APP_FEATURE_ID, ODESSO_APP_ID, TRANSACTION_INCLUDED,IS_CUSTOMER_UPDATE_PAYMENT_ON,IS_CUSTOMER_UPDATE_PAYMENT_ON,COUPON_INCLUDED,IS_STORE_CART_NEEDED FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function tablehead_ODESSO_APP_FEATURE_SP_CANCELLATION_SETTINGS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_FEATURE_ID','ODESSO_APP_ID','IS_SERVICE_PROVIDER_CANCELLATION_ON_SUBMITTED','IS_SERVICE_PROVIDER_CANCELLATION_ON_IN_PROGRESS','IS_SERVICE_PROVIDER_CANCELLATION_ON_PENDING_FOR_PRICE','IS_SERVICE_PROVIDER_CANCELLATION_ON_FINALIZING');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_SP_CANCELLATION_SETTINGS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_FEATURE_ID,ODESSO_APP_ID,IS_SERVICE_PROVIDER_CANCELLATION_ON_SUBMITTED,IS_SERVICE_PROVIDER_CANCELLATION_ON_IN_PROGRESS,IS_SERVICE_PROVIDER_CANCELLATION_ON_PENDING_FOR_PRICE,IS_SERVICE_PROVIDER_CANCELLATION_ON_FINALIZING FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function tablehead_ODESSO_APP_FEATURE_ORDER_SCREEN_UX($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_FEATURE_ID','ODESSO_APP_ID','IS_ORDER_PRICE_TABLE_ON','IS_ORDER_ITEM_TABLE_ON','IS_ORDER_CUSTOMER_DESCRIPTION_ON','IS_STORE_ITEM_TABLE_PRICE_ON_CUSTOMER','IS_STORE_ITEM__TABLE_QUANTITY_ON_CUSTOMER','IS_STORE_ITEM_TABLE_TOTAL_PRICE_ON_CUSTOMER','IS_STORE_ITEM_TABLE_PRICE_ON_SERVICE_PROVIDER','IS_STORE_ITEM_TABLE_QUANTITY_ON_SERVICE_PROVIDER','IS_STORE_ITEM_TABLE_TOTAL_PRICE_ON_SERVICE_PROVIDER','IS_STORE_ITEM_TABLE_PRICE_ON_MERCHANT','IS_STORE_ITEM_TABLE_QUANTITY_ON_MERCHANT','IS_STORE_ITEM_TABLE_TOTAL_PRICE_ON_MERCHANT');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_ORDER_SCREEN_UX($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT ODESSO_APP_FEATURE_ID, ODESSO_APP_ID, IS_ORDER_PRICE_TABLE_ON, IS_ORDER_ITEM_TABLE_ON, IS_ORDER_CUSTOMER_DESCRIPTION_ON, IS_STORE_ITEM_TABLE_PRICE_ON_CUSTOMER, IS_STORE_ITEM_TABLE_QUANTITY_ON_CUSTOMER, IS_STORE_ITEM_TABLE_TOTAL_PRICE_ON_CUSTOMER, IS_STORE_ITEM_TABLE_PRICE_ON_SERVICE_PROVIDER, IS_STORE_ITEM_TABLE_QUANTITY_ON_SERVICE_PROVIDER, IS_STORE_ITEM_TABLE_TOTAL_PRICE_ON_SERVICE_PROVIDER, IS_STORE_ITEM_TABLE_PRICE_ON_MERCHANT, IS_STORE_ITEM_TABLE_QUANTITY_ON_MERCHANT, IS_STORE_ITEM_TABLE_TOTAL_PRICE_ON_MERCHANT FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function tablehead_ODESSO_APP_FEATURE_PROFILE_INFORMATION_PRIVACY($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_FEATURE_ID','ODESSO_APP_ID','IS_CUSTOMER_PHONE_PRIVATE','IS_CUSTOMER_EMAIL_PRIVATE','IS_SERVICE_PROVIDER_PHONE_PRIVATE','IS_SERVICE_PROVIDER_EMAIL_PRIVATE','IS_MERCHANT_PHONE_PRIVATE','IS_MERCHANT_EMAIL_PRIVATE');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_PROFILE_INFORMATION_PRIVACY($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_FEATURE_ID, ODESSO_APP_ID, IS_CUSTOMER_PHONE_PRIVATE, IS_CUSTOMER_EMAIL_PRIVATE, IS_SERVICE_PROVIDER_PHONE_PRIVATE, IS_SERVICE_PROVIDER_EMAIL_PRIVATE, IS_MERCHANT_PHONE_PRIVATE, IS_MERCHANT_EMAIL_PRIVATE FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function tablehead_ODESSO_APP_FEATURE_ADVANCED_BUSINESS_RULES($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          // $stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 $row = array('ODESSO_APP_ID','IS_JOB_ON','ITEM_IDS');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE_ADVANCED_BUSINESS_RULES($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_ID, IS_JOB_ON, ITEM_IDS FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }


    public function tablehead_ODESSO_APP_FEATURE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		 // $row = array('COUPON_INCLUDED', 'IS_STORE_CART_NEEDED','IS_STORE_ORDER_UPLOAD_IMAGE_VIDEO_NEEDED','MAX_IMAGE_NUMBER', 'IS_ORDER_PRICE_TABLE_ON', 'IS_ORDER_ITEM_TABLE_ON','IS_ORDER_CUSTOMER_DESCRIPTION_ON');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
          $stmt = $this->db->prepare("SELECT  * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function tablehead_ODESSO_APP_MODULE_STORE_CATEGORY ()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_category') : $this->table_prefix.'_odesso_app_module_store_category';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_category') : $this->table_prefix.'_odesso_app_module_store_category';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   } 
    // Function for insert4
    public function odesso_app_module_item_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item') : $this->table_prefix.'_odesso_app_module_item';
       try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_ITEM
    public function tablehead_ODESSO_APP_MODULE_ITEM ()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item') : $this->table_prefix.'_odesso_app_module_item';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
         
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function table_ODESSO_APP_MODULE_ITEM($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item') : $this->table_prefix.'_odesso_app_module_item';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_ODESSO_APP_MODULE_ITEM 
    public function update_table_ODESSO_APP_MODULE_ITEM($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item') : $this->table_prefix.'_odesso_app_module_item';
       try
       {
		  // echo 'UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_ITEM_ID`="'.$key.'"'; 
		   
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE ODESSO_APP_MODULE_ITEM_ID = "'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP
    public function update_ODESSO_APP($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_ID` = "'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_FEATURE
    public function update_ODESSO_APP_FEATURE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature') : $this->table_prefix.'_odesso_app_feature';
       try
       {
			
          $stmt = $this->db->prepare("UPDATE `".$tablename."` SET `".$value."`= '".$updated_value."' WHERE ODESSO_APP_FEATURE_ID = '".$key."' ");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_MODULE_STORE_CATEGORY
    public function update_ODESSO_APP_MODULE_STORE_CATEGORY($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_category') : $this->table_prefix.'_odesso_app_module_store_category';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert5
    public function odesso_app_module_store_store_item_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item') : $this->table_prefix.'_odesso_app_module_store_store_item';
       try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
													   

		  $stmt->execute(); 											   
         
		  return   $this->db->lastInsertId() ;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   

   
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item') : $this->table_prefix.'_odesso_app_module_store_store_item';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert6
    public function odesso_app_module_store_store_item_inventory_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_inventory') : $this->table_prefix.'_odesso_app_module_store_store_item_inventory';
       try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
													   
				// echo 'INSERT INTO '.$tablename.'
                                                       // VALUES("'.$value.'")';
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_inventory') : $this->table_prefix.'_odesso_app_module_store_store_item_inventory';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID`="'.$key.'" ');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
    // Function for insert7
    public function odesso_app_module_store_store_item_location_schedule_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_location_schedule') : $this->table_prefix.'_odesso_app_module_store_store_item_location_schedule';
       try
       {
		  $value=implode('","',$value3);
			
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
        $tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_location_schedule') : $this->table_prefix.'_odesso_app_module_store_store_item_location_schedule';
	   try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID`="'.$key.'" ');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert8
    public function odesso_app_module_user_app_profile_attribute_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
         $tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_app_profile_attribute') : $this->table_prefix.'_odesso_app_module_user_app_profile_attribute';
	   try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
													   
		
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE
    public function update_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
        $tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_app_profile_attribute') : $this->table_prefix.'_odesso_app_module_user_app_profile_attribute';
	   try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert9
    public function odesso_app_module_user_user_type_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_user_type') : $this->table_prefix.'_odesso_app_module_user_user_type';
       try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table".$this->table_prefix."_ODESSO_APP_MODULE_USER_USER_TYPE
    public function update_ODESSO_APP_MODULE_USER_USER_TYPE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_user_type') : $this->table_prefix.'_odesso_app_module_user_user_type';
       try
       {
		 $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE ODESSO_APP_MODULE_USER_USER_TYPE_ID = "'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
    // Function for insert10
    public function odesso_app_ref_string_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_string') : $this->table_prefix.'_odesso_app_ref_string';
       try
       {
		  $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table ".$this->table_prefix."_ODESSO_APP_REF_STRING
    public function update_ODESSO_APP_REF_STRING($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_string') : $this->table_prefix.'_odesso_app_ref_string';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_REF_STRING_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert11
    public function odesso_app_module_information_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_information') : $this->table_prefix.'_odesso_app_module_information';
       try
       {
		  $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table ".$this->table_prefix."_ODESSO_APP_MODULE_INFORMATION
    public function update_ODESSO_APP_MODULE_INFORMATION($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_information') : $this->table_prefix.'_odesso_app_module_information';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_INFORMATION_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   } 
    // Function for insert12
    public function odesso_app_module_web_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_web') : $this->table_prefix.'_odesso_app_module_web';
       try
       {
		 $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table ".$this->table_prefix."_ODESSO_APP_MODULE_WEB
    public function update_ODESSO_APP_MODULE_WEB($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_web') : $this->table_prefix.'_odesso_app_module_web';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_WEB_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert13
    public function odesso_app_module_store_store_item_image_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_image') : $this->table_prefix.'_odesso_app_module_store_store_item_image';
       try
       {
		  $value=implode('","',$value3);
		
		   $stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_image') : $this->table_prefix.'_odesso_app_module_store_store_item_image';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for insert14
    public function odesso_app_module_store_store_item_attribute_insert($value3)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
			$value=implode('","',$value3);
				
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
													   
			$stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM 
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item') : $this->table_prefix.'_odesso_app_module_store_store_item';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item') : $this->table_prefix.'_odesso_app_module_store_store_item';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM 
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_inventory') : $this->table_prefix.'_odesso_app_module_store_store_item_inventory';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY 
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_inventory') : $this->table_prefix.'_odesso_app_module_store_store_item_inventory';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_location_schedule') : $this->table_prefix.'_odesso_app_module_store_store_item_location_schedule';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE 
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_location_schedule') : $this->table_prefix.'_odesso_app_module_store_store_item_location_schedule';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE by their ID...
    public function fetch_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id,$id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_location_schedule') : $this->table_prefix.'_odesso_app_module_store_store_item_location_schedule';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."' AND ODESSO_APP_MODULE_STORE_STORE_ITEM_ID = '".$id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE
    public function tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_app_profile_attribute') : $this->table_prefix.'_odesso_app_module_user_app_profile_attribute';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'  AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table".$this->table_prefix."_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE
    public function table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_app_profile_attribute') : $this->table_prefix.'_odesso_app_module_user_app_profile_attribute';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_USER_USER_TYPE
    public function tablehead_ODESSO_APP_MODULE_USER_USER_TYPE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_user_type') : $this->table_prefix.'_odesso_app_module_user_user_type';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table".$this->table_prefix."_ODESSO_APP_MODULE_USER_USER_TYPE
    public function table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_user_type') : $this->table_prefix.'_odesso_app_module_user_user_type';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_REF_STRING
    public function tablehead_ODESSO_APP_REF_STRING()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_string') : $this->table_prefix.'_odesso_app_ref_string';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_REF_STRING
    public function table_ODESSO_APP_REF_STRING($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_string') : $this->table_prefix.'_odesso_app_ref_string';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching table heading of ".$this->table_prefix."_odesso_app_module_information
    public function tablehead_ODESSO_APP_MODULE_INFORMATION()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_information') : $this->table_prefix.'_odesso_app_module_information';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_INFORMATION
    public function table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_information') : $this->table_prefix.'_odesso_app_module_information';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP
    public function tablehead_ODESSO_APP()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."' ");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP
    public function table_ODESSO_APP($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `odesso_app_id`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   // Function for fetching only IMAGES on the Odesso_App table
   public function tablehead_ODESSO_APP_BRANDING_IMAGES($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
		 $row = array('ODESSO_APP_ID', 'APP_NAME', 'BUSINESS_LOGO_LINK', 'APP_ICON_LINK','BACKGROUND_IMAGE_LINK');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ODESSO_APP but only BRANDING IMAGES
    public function table_ODESSO_APP_BRANDING_IMAGES($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_ID,APP_NAME,BUSINESS_LOGO_LINK,APP_ICON_LINK,BACKGROUND_IMAGE_LINK FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
		  
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   // Function for fetching only COLORS on the Odesso_App table
   public function tablehead_ODESSO_APP_BRANDING_COLORS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
		 $row = array('ODESSO_APP_ID', 'MAIN_COLOR_CODE', 'THEME_COLOR_CODE', 'TITLE_TEXT_COLOR', 'CHECK_BOX_COLOR_CODE', 'NAVIGATION_BAR_COLOR_CODE', 'NAVIGATION_BAR_TRANSPARENCY_ALPHA');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ODESSO_APP but only COLORS
    public function table_ODESSO_APP_BRANDING_COLORS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_ID,MAIN_COLOR_CODE,THEME_COLOR_CODE,TITLE_TEXT_COLOR,CHECK_BOX_COLOR_CODE,NAVIGATION_BAR_COLOR_CODE,NAVIGATION_BAR_TRANSPARENCY_ALPHA FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   // Function for fetching only COLORS on the Odesso_App table
   public function tablehead_ODESSO_APP_BRANDING_UX1($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
		 $row = array('ODESSO_APP_ID', 'NAVIGATION_BAR_BACK_IMAGE_LINK', 'NAVIGATION_BAR_NEXT_IMAGE_LINK', 'NAVIGATION_BAR_IMAGE_MENU_IMAGE_LINK', 'LOCATE_IMAGE_LINK', 'EDIT_IMAGE_LINK', 'NAVIGATION_BAR_ADD_IMAGE_LINK', 'NAVIGATION_BAR_CART_IMAGE_LINK', 'SPINNER_IMAGE_LINK','NAVIGATION_BAR_REFRESH_IMAGE_LINK');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ODESSO_APP but only COLORS
    public function table_ODESSO_APP_BRANDING_UX1($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_ID,NAVIGATION_BAR_BACK_IMAGE_LINK,NAVIGATION_BAR_NEXT_IMAGE_LINK,NAVIGATION_BAR_MENU_IMAGE_LINK,LOCATE_IMAGE_LINK,EDIT_IMAGE_LINK,NAVIGATION_BAR_ADD_IMAGE_LINK,NAVIGATION_BAR_CART_IMAGE_LINK,SPINNER_IMAGE_LINK,NAVIGATION_BAR_REFRESH_IMAGE_LINK FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   // Function for fetching CANCELLATION TIME from the Odesso_App table
   public function tablehead_ODESSO_APP_SYSTEM_CANCELLATION_TIME($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
		 $row = array('ODESSO_APP_ID', 'SYSTEM_CANCEL_ORDER_TIME');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching CANCELLATION TIME from ODESSO_APP table
    public function table_ODESSO_APP_SYSTEM_CANCELLATION_TIME($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app') : $this->table_prefix.'_odesso_app';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_ID,SYSTEM_CANCEL_ORDER_TIME FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   // Function for fetching only COLORS on the Odesso_App table
   public function tablehead_ODESSO_APP_BRANDING_UX2($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user') : $this->table_prefix.'_odesso_app_module_user';
       try
       {
		 $row = array('ODESSO_APP_ID', 'ICON_PALETTE_EMAIL_LINK', 'ICON_PALLETE_PASSWORD_LINK');
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
  
   // Function for fetching  table ODESSO_APP but only COLORS
    public function table_ODESSO_APP_BRANDING_UX2($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user') : $this->table_prefix.'_odesso_app_module_user';
       try
       {
          $stmt = $this->db->prepare("SELECT  ODESSO_APP_ID,ICON_PALETTE_EMAIL_LINK,ICON_PALETTE_PASSWORD_LINK FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }


// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_WEB
    public function tablehead_ODESSO_APP_MODULE_WEB()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_web') : $this->table_prefix.'_odesso_app_module_web';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_WEB
    public function table_ODESSO_APP_MODULE_WEB($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_web') : $this->table_prefix.'_odesso_app_module_web';
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_image') : $this->table_prefix.'_odesso_app_module_store_store_item_image';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_image') : $this->table_prefix.'_odesso_app_module_store_store_item_image';
		
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
   // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function tablehead_insert_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'   AND column_name NOT IN 
		  ('ATTRIBUTE_ORDER', 'ATTRIBUTE_NAME', 'ATTRIBUTE_VALUE' ) ");
          
		  $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
	// Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function tablehead1_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."' ");
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'   AND column_name NOT IN 
		  ('NAME', 'TYPE', 'EXTRA_INFO' ) ");
         
		  $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
   // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."' ");
          // $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'   AND column_name NOT IN 
		  // ('NAME', 'TYPE', 'EXTRA_INFO' ) ");
         
		  $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
        $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
		$stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function table1_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
          // $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
       $stmt = $this->db->prepare("SELECT ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID,ODESSO_APP_ID,ODESSO_APP_MODULE_STORE_STORE_ITEM_ID,ATTRIBUTE_ORDER,ATTRIBUTE_NAME,ATTRIBUTE_VALUE,ATTRIBUTE_TYPE,
									  ACCESS,IS_REQUIRED,IS_ACTIVE FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
       		
		$stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
   // Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function table2_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_attribute') : $this->table_prefix.'_odesso_app_module_store_store_item_attribute';
       try
       {
          // $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
         $stmt = $this->db->prepare("SELECT ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID,ODESSO_APP_ID,ODESSO_APP_MODULE_STORE_STORE_ITEM_ID,ATTRIBUTE_TYPE,NAME,TYPE,EXTRA_INFO,
									 ACCESS,IS_REQUIRED,IS_ACTIVE FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
		   $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS
    public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_address') : $this->table_prefix.'_odesso_app_module_store_order_address';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		 
		  $row= $stmt->fetchALL(PDO::FETCH_COLUMN);
		  
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
	// Function for fetching  table ".$this->table_prefix."_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS
    public function table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_address') : $this->table_prefix.'_odesso_app_module_store_order_address';
		try
        {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  
		  return $row;
	    }
       catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}
	
	//Function for edit27...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_address') 
		: $this->table_prefix.'_odesso_app_module_store_order_address';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_ADDRESS_ID`= "'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT27...

	public function odesso_app_module_store_order_address_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_address') : $this->table_prefix.'_odesso_app_module_store_order_address';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
											   
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of  ".$this->table_prefix."_ODESSO_END_USER
    public function tablehead_ODESSO_END_USER()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_end_user') : $this->table_prefix.'_odesso_end_user';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
	// Function for fetching  table  ".$this->table_prefix."_ODESSO_END_USER
    public function table_ODESSO_END_USER($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_end_user') : $this->table_prefix.'_odesso_end_user';
		try
        {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
		  $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		   
		  return $row;
	    }
       catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}
	
	// Function for INSERT48...

	public function odesso_end_user_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_end_user') : 
		$this->table_prefix.'_odesso_end_user';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	

	// Function for fetching  table heading of  ".$this->table_prefix."_ODESSO_END_USER_SP_ITEM_LIST
    public function tablehead_ODESSO_END_USER_SP_ITEM_LIST()
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_end_user_sp_item_list') : $this->table_prefix.'_odesso_end_user_sp_item_list';
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
	// Function for fetching  table  ".$this->table_prefix."_ODESSO_END_USER_SP_ITEM_LIST
    public function table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_end_user_sp_item_list') : $this->table_prefix.'_odesso_end_user_sp_item_list';
		try
        {
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
		  $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		   
		  return $row;
	    }
       catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}
	
	// Function for INSERT49...

	public function odesso_end_user_SP_ITEM_LIST_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_end_user_sp_item_list') : 
		$this->table_prefix.'_odesso_end_user_sp_item_list';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	//Function for edit48...
    public function update_ODESSO_END_USER($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_end_user') 
		: $this->table_prefix.'_odesso_end_user';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_END_USER_ID`="'.$key.'"' );
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
   // Function for edit49...
   // Function for update table update_table ".$this->table_prefix."_ODESSO_END_USER_SP_ITEM_LIST
    public function update_ODESSO_END_USER_SP_ITEM_LIST($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_end_user_sp_item_list') : $this->table_prefix.'_odesso_end_user_sp_item_list';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_END_USER_SP_ITEM_LIST_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
	
   // Function for import users into "admin" table...
    public function import_csv($data)
    {
		 try
       {
		  
			$data[2] = md5($data[2]);
		   
		  	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
		  $stmt->execute(); 											   
         
		  return true ;
	   }
       catch(PDOException $e)
       {
            // echo $e->getMessage();
			// return false;
		    
       }
   } 
   
   // Function for fetch simulator link from "admin" table...
    public function simulator_link($odesso_app_id){
		
		try
        {
		  $stmt = $this->db->prepare("SELECT * FROM admin WHERE `ODESSO_APP_ID` = '".$odesso_app_id."'");
		  $stmt->execute();
		  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		  
		
		  
		  $simulator 	= $row['simulatorlink'];
		
		  return $simulator;
		 
	    }
	   catch(PDOException $e)
	    {
		   echo $e->getMessage();
	    }
	}

	// Function for fetching  table heading of '_oDESSO_APP_ADDRESS' table...

	public function tablehead_ODESSO_APPDESSO_APP_ADDRESS(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_address') : $this->table_prefix.'_odesso_app_address';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_oDESSO_APP_ADDRESS' table...
	public function table_ODESSO_APPDESSO_APP_ADDRESS($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_address') : $this->table_prefix.'_odesso_app_address';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}

	// Function for edit14...
	public function update_ODESSO_APP_ADDRESS($value,$updated_value,$key){
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_address') : $this->table_prefix.'_odesso_app_address';
       try
       {
		
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_ADDRESS_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	// Function for INSERT14...
	public function odesso_app_address_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_address') : $this->table_prefix.'_odesso_app_address';
       
	    try
        {
            	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_FEATURE_ORDER' table...

	public function tablehead_ODESSO_APP_FEATURE_ORDER(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order') : $this->table_prefix.'_odesso_app_feature_order';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_FEATURE_ORDER' table...
	public function table_ODESSO_APP_FEATURE_ORDER($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order') : $this->table_prefix.'_odesso_app_feature_order';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit16...
    public function update_ODESSO_APP_FEATURE_ORDER($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order') : $this->table_prefix.'_odesso_app_feature_order';
       try
       {
		   // echo 'UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_FEATURE_ORDER_ID`= "'.$key.'"';
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_FEATURE_ORDER_ID`= "'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
	
	// Function for INSERT16...

	public function odesso_app_feature_order_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order') : $this->table_prefix.'_odesso_app_feature_order';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}

	public function tablehead_ODESSO_APP_FEATURE_ORDER_HISTORY_DISPLAY(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order') : $this->table_prefix.'_odesso_app_feature_order';
       
	    try
        {
		 $row = array('ODESSO_APP_FEATURE_ORDER_ID','ORDER_HISTORY_DISPLAY_MAIN', 'ORDER_HISTORY_DISPLAY_LEFT_TOP', 'ORDER_HISTORY_DISPLAY_RIGHT_TOP','ORDER_HISTORY_DISPLAY_LEFT_BOTTOM','ORDER_HISTORY_DISPLAY_RIGHT_BOTTOM');
		  return $row;
	   }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_FEATURE_ORDER' table...
	public function table_ODESSO_APP_FEATURE_ORDER_HISTORY_DISPLAY($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order') : $this->table_prefix.'_odesso_app_feature_order';
       try
       {
          $stmt = $this->db->prepare("SELECT ODESSO_APP_FEATURE_ORDER_ID, ORDER_HISTORY_DISPLAY_MAIN, ORDER_HISTORY_DISPLAY_LEFT_TOP, ORDER_HISTORY_DISPLAY_RIGHT_TOP, ORDER_HISTORY_DISPLAY_LEFT_BOTTOM, ORDER_HISTORY_DISPLAY_RIGHT_BOTTOM FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT table...

	public function tablehead_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item_activity_audit') : $this->table_prefix.'_odesso_app_module_item_activity_audit';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of 'ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT' table...
	
	public function table_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item_activity_audit') : $this->table_prefix.'_odesso_app_module_item_activity_audit';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit17...
    public function update_ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item_activity_audit') : $this->table_prefix.'_odesso_app_feature_order';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_ITEM_ACTIVITY_AUDIT_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

	// Function for INSERT17...

	public function odesso_app_module_item_activity_audit_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_item_activity_audit') : $this->table_prefix.'_odesso_app_module_item_activity_audit';
       
	    try
        {
            	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_store table...

	public function tablehead_ODESSO_APP_MODULE_store(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store') : $this->table_prefix.'_odesso_app_module_store';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_store' table...
	
	public function table_ODESSO_APP_MODULE_store($odesso_app_id){
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store') : $this->table_prefix.'_odesso_app_module_store';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit18...
    public function update_ODESSO_APP_MODULE_store($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store') : $this->table_prefix.'_odesso_app_module_store';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
	
	// Function for INSERT18...

	public function odesso_app_module_store_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store') : $this->table_prefix.'_odesso_app_module_store';
       
	    try
        {
            	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}

	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ADDRESS table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ADDRESS(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_address') : $this->table_prefix.'_odesso_app_module_store_address';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ADDRESS' table...

	public function table_ODESSO_APP_MODULE_STORE_ADDRESS($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_address') : $this->table_prefix.'_odesso_app_module_store_address';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	
	//Function for edit19...
    public function update_ODESSO_APP_MODULE_STORE_ADDRESS($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_address') 
		: $this->table_prefix.'_odesso_app_module_store_address';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ADDRESS_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT19...

	public function odesso_app_module_store_address_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_address') : $this->table_prefix.'_odesso_app_module_store_address';
       
	    try
        {
           	$value=implode('","',$value3);
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
			
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
		
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_app_order_attribute') : $this->table_prefix.'_odesso_app_module_store_app_order_attribute';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE' table...

	public function table_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_app_order_attribute') : $this->table_prefix.'_odesso_app_module_store_app_order_attribute';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit20...
    public function update_ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_app_order_attribute') 
		: $this->table_prefix.'_odesso_app_module_store_app_order_attribute';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_APP_ORDER_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT20...

	public function odesso_app_module_store_app_order_attribute_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_app_order_attribute') : $this->table_prefix.'_odesso_app_module_store_app_order_attribute';
       
	    try
        {
            	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}

	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_CART_ITEM table...

	public function tablehead_ODESSO_APP_MODULE_STORE_CART_ITEM(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item') : $this->table_prefix.'_odesso_app_module_store_cart_item';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_CART_ITEM' table...

	public function table_ODESSO_APP_MODULE_STORE_CART_ITEM($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item') : $this->table_prefix.'_odesso_app_module_store_cart_item';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit21...
    public function update_ODESSO_APP_MODULE_STORE_CART_ITEM($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item') 
		: $this->table_prefix.'_odesso_app_module_store_cart_item';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_CART_ITEM_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT21...

	public function odesso_app_module_store_cart_item_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item') : $this->table_prefix.'_odesso_app_module_store_cart_item';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item_attribute') : $this->table_prefix.'_odesso_app_module_store_cart_item_attribute';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE' table...

	public function table_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item_attribute') : $this->table_prefix.'_odesso_app_module_store_cart_item_attribute';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit22...
    public function update_ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item_attribute') 
		: $this->table_prefix.'_odesso_app_module_store_cart_item_attribute';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'  = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_CART_ITEM_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT22...

	public function odesso_app_module_store_cart_item_attribute_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_cart_item_attribute') : $this->table_prefix.'_odesso_app_module_store_cart_item_attribute';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	public function tablehead_ODESSO_APP_MODULE_STORE_COUPON(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon') : $this->table_prefix.'_odesso_app_module_store_coupon';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_COUPON' table...

	public function table_ODESSO_APP_MODULE_STORE_COUPON($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon') : $this->table_prefix.'_odesso_app_module_store_coupon';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit23...
    public function update_ODESSO_APP_MODULE_STORE_COUPON($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon') 
		: $this->table_prefix.'_odesso_app_module_store_coupon';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_COUPON_ID`="'.$key.'" ');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	
	// Function for INSERT23...

	public function odesso_app_module_store_coupon_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon') : $this->table_prefix.'_odesso_app_module_store_coupon';
       
	    try
        {
            	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_COUPON_REFERRAL table...

	public function tablehead_ODESSO_APP_MODULE_STORE_COUPON_REFERAL(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon_referal') : $this->table_prefix.'_odesso_app_module_store_coupon_referal';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_COUPON' table...

	public function table_ODESSO_APP_MODULE_STORE_COUPON_REFERAL($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon_referal') : $this->table_prefix.'_odesso_app_module_store_coupon_referal';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit24...
    public function update_ODESSO_APP_MODULE_STORE_COUPON_REFERAL($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon_referal') 
		: $this->table_prefix.'_odesso_app_module_store_coupon_referal';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_COUPON_REFERAL_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT24...

	public function odesso_app_module_store_coupon_referal_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_coupon_referal') : $this->table_prefix.'_odesso_app_module_store_coupon_referal';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_EXTRA_FEE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_EXTRA_FEE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_extra_fee') : $this->table_prefix.'_odesso_app_module_store_extra_fee';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_EXTRA_FEE' table...

	public function table_ODESSO_APP_MODULE_STORE_EXTRA_FEE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_extra_fee') : $this->table_prefix.'_odesso_app_module_store_extra_fee';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit25...
    public function update_ODESSO_APP_MODULE_STORE_EXTRA_FEE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_extra_fee') 
		: $this->table_prefix.'_odesso_app_module_store_extra_fee';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_EXTRA_FEE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT25...

	public function odesso_app_module_store_extra_fee_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_extra_fee') : $this->table_prefix.'_odesso_app_module_store_extra_fee';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order') : $this->table_prefix.'_odesso_app_module_store_order';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order') : $this->table_prefix.'_odesso_app_module_store_order';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit26...
    public function update_ODESSO_APP_MODULE_STORE_ORDER($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order') 
		: $this->table_prefix.'_odesso_app_module_store_order';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT26...

	public function odesso_app_module_store_order_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order') : $this->table_prefix.'_odesso_app_module_store_order';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
 	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_attribute') : $this->table_prefix.'_odesso_app_module_store_order_attribute';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_attribute') : $this->table_prefix.'_odesso_app_module_store_order_attribute';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit28...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_attribute') 
		: $this->table_prefix.'_odesso_app_module_store_order_attribute';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT28...

	public function odesso_app_module_store_order_attribute_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_attribute') : $this->table_prefix.'_odesso_app_module_store_order_attribute';
       
	    try
        {
           	$value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_AUDIT table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_AUDIT(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_audit') : $this->table_prefix.'_odesso_app_module_store_order_audit';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_AUDIT' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_AUDIT($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_audit') : $this->table_prefix.'_odesso_app_module_store_order_audit';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit29...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_AUDIT($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_audit') 
		: $this->table_prefix.'_odesso_app_module_store_order_audit';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_AUDIT_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT29...

	public function odesso_app_module_store_order_audit_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_audit') : $this->table_prefix.'_odesso_app_module_store_order_audit';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_COUPON table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_COUPON(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_coupon') : $this->table_prefix.'_odesso_app_module_store_order_coupon';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_COUPON' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_COUPON($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_coupon') : $this->table_prefix.'_odesso_app_module_store_order_coupon';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit30...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_COUPON($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_coupon') 
		: $this->table_prefix.'_odesso_app_module_store_order_coupon';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_COUPON_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT30...

	public function odesso_app_module_store_order_coupon_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_coupon') : $this->table_prefix.'_odesso_app_module_store_order_coupon';
       
	    try
        {
             $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_extra_fee') : $this->table_prefix.'_odesso_app_module_store_order_extra_fee';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_extra_fee') : $this->table_prefix.'_odesso_app_module_store_order_extra_fee';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit31...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_extra_fee') 
		: $this->table_prefix.'_odesso_app_module_store_order_extra_fee';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = '.$updated_value.' WHERE `ODESSO_APP_MODULE_STORE_ORDER_EXTRA_FEE_ID`='.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT31...

	public function odesso_app_module_store_order_extra_fee_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_extra_fee') : $this->table_prefix.'_odesso_app_module_store_order_extra_fee';
       
	    try
        {
             $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}

	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_ITEM table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_ITEM(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_item') : $this->table_prefix.'_odesso_app_module_store_order_item';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_ITEM' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_ITEM($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_item') : $this->table_prefix.'_odesso_app_module_store_order_item';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit32...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_ITEM($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_item') 
		: $this->table_prefix.'_odesso_app_module_store_order_item';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE ODESSO_APP_MODULE_STORE_ORDER_ITEM_ID = "'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT32...

	public function odesso_app_module_store_order_item_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_order_item') : 
		$this->table_prefix.'_odesso_app_module_store_order_item';
       
	    try
        {
             $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_item_attribute') : $this->table_prefix.'_odesso_app_module_store_order_item_attribute';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_ITEM' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_item_attribute') : $this->table_prefix.'_odesso_app_module_store_order_item_attribute';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit33...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_item_attribute') 
		: $this->table_prefix.'_odesso_app_module_store_order_item_attribute';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_ITEM_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT33...

	public function odesso_app_module_store_order_item_attribute_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_order_item_attribute') : 
		$this->table_prefix.'_odesso_app_module_store_order_item_attribute';
       
	    try
        {
             $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_media_file') : $this->table_prefix.'_odesso_app_module_store_order_media_file';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_media_file') : $this->table_prefix.'_odesso_app_module_store_order_media_file';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit34...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_media_file') 
		: $this->table_prefix.'_odesso_app_module_store_order_media_file';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT34...

	public function odesso_app_module_store_order_media_file_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_order_media_file') : 
		$this->table_prefix.'_odesso_app_module_store_order_media_file';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile') : $this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ORDER_MEDIA_FILE' table...

	public function table_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile') : $this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit35...
    public function update_ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile') 
		: $this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ORDER_UNIT_TYPE_LOCATION_MILE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT35...

	public function odesso_app_module_store_order_unit_type_location_mile_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile') : 
		$this->table_prefix.'_odesso_app_module_store_order_unit_type_location_mile';
       
	    try
        {
           $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION table...

	public function tablehead_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_service_cancellation_information') : $this->table_prefix.'_odesso_app_module_store_service_cancellation_information';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION' table...

	public function table_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_service_cancellation_information') : $this->table_prefix.'_odesso_app_module_store_service_cancellation_information';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit36...
    public function update_ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_service_cancellation_information') 
		: $this->table_prefix.'_odesso_app_module_store_service_cancellation_information';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_SERVICE_CANCELLATION_INFORMATION_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT36...

	public function odesso_app_module_store_service_cancellation_information_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_service_cancellation_information') : 
		$this->table_prefix.'_odesso_app_module_store_service_cancellation_information';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
 // Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD table...

	public function tablehead_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_shipping_method') : $this->table_prefix.'_odesso_app_module_store_shipping_method';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD' table...

	public function table_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_shipping_method') : $this->table_prefix.'_odesso_app_module_store_shipping_method';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit37...
    public function update_ODESSO_APP_MODULE_STORE_SHIPPING_METHOD($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_shipping_method') 
		: $this->table_prefix.'_odesso_app_module_store_shipping_method';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_SHIPPING_METHOD_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	
	
	// Function for INSERT37...

	public function odesso_app_module_store_shipping_method_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_shipping_method') : 
		$this->table_prefix.'_odesso_app_module_store_shipping_method';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	

	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_activity_audit') : $this->table_prefix.'_odesso_app_module_store_store_item_activity_audit';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT' table...

	public function table_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_activity_audit') : $this->table_prefix.'_odesso_app_module_store_store_item_activity_audit';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit38...
    public function update_ODESSO_APP_MODULE_STORE_ITEM_ACTIVITY_AUDIT($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_activity_audit') 
		: $this->table_prefix.'_odesso_app_module_store_store_item_activity_audit';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_ACTIVITY_AUDIT_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT38...

	public function odesso_app_module_store_store_item_activity_audit_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_activity_audit') : 
		$this->table_prefix.'_odesso_app_module_store_store_item_activity_audit';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_auto_proved') : $this->table_prefix.'_odesso_app_module_store_store_item_auto_proved';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED' table...

	public function table_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_auto_proved') : $this->table_prefix.'_odesso_app_module_store_store_item_auto_proved';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit39...
    public function update_ODESSO_APP_MODULE_STORE_ITEM_AUTO_PROVED($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_auto_proved') 
		: $this->table_prefix.'_odesso_app_module_store_store_item_auto_proved';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT
		  `="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT39...

	public function odesso_app_module_store_store_item_auto_proved_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_auto_proved') : 
		$this->table_prefix.'_odesso_app_module_store_store_item_auto_proved';
       
	    try
        {
           $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT table...

	public function tablehead_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit') : $this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT' table...

	public function table_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit') : $this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit40...
    public function update_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit') 
		: $this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_VIEW_ACTIVITY_AUDIT_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT40...

	public function odesso_app_module_store_store_item_view_activity_audit_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit') : 
		$this->table_prefix.'_odesso_app_module_store_store_item_view_activity_audit';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
				$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_TAX table...

	public function tablehead_ODESSO_APP_MODULE_STORE_TAX(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_tax') : $this->table_prefix.'_odesso_app_module_store_tax';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_STORE_ITEM_VIEW_ACTIVITY_AUDIT' table...

	public function table_ODESSO_APP_MODULE_STORE_TAX($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_tax') : $this->table_prefix.'_odesso_app_module_store_tax';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit41...
    public function update_ODESSO_APP_MODULE_STORE_TAX($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_tax') 
		: $this->table_prefix.'_odesso_app_module_store_tax';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_STORE_TAX_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT41...

	public function odesso_app_module_store_tax_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_store_tax') : 
		$this->table_prefix.'_odesso_app_module_store_tax';
       
	    try
        {
           $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
 	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_USER table...

	public function tablehead_ODESSO_APP_MODULE_USER(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user') : $this->table_prefix.'_odesso_app_module_user';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_MODULE_USER' table...

	public function table_ODESSO_APP_MODULE_USER($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user') : $this->table_prefix.'_odesso_app_module_user';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit42...
    public function update_ODESSO_APP_MODULE_USER($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user') 
		: $this->table_prefix.'_odesso_app_module_user';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_USER_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT42...

	public function odesso_app_module_user_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user') : $this->table_prefix.'_odesso_app_module_user';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	
	// Function for fetching  table heading of '_ODESSO_APP_USER_PROFILE_ATTRIBUTE table...

	public function tablehead_ODESSO_APP_USER_PROFILE_ATTRIBUTE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_profile_attribute') : $this->table_prefix.'_odesso_app_module_user_profile_attribute';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_USER_PROFILE_ATTRIBUTE' table...

	public function table_ODESSO_APP_USER_PROFILE_ATTRIBUTE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_profile_attribute') : $this->table_prefix.'_odesso_app_module_user_profile_attribute';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit43...
    public function update_ODESSO_APP_USER_PROFILE_ATTRIBUTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_user_profile_attribute') 
		: $this->table_prefix.'_odesso_app_module_user_profile_attribute';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_APP_MODULE_USER_PROFILE_ATTRIBUTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT43...

	public function odesso_app_module_user_profile_attribute_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_module_user_profile_attribute') : 
		$this->table_prefix.'_odesso_app_module_user_profile_attribute';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_REF_ICON_PALETTE table...

	public function tablehead_ODESSO_APP_REF_ICON_PALETTE(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_icon_palette') : $this->table_prefix.'_odesso_app_ref_icon_palette';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_REF_ICON_PALETTE' table...

	public function table_ODESSO_APP_REF_ICON_PALETTE($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_icon_palette') : $this->table_prefix.'_odesso_app_ref_icon_palette';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` ");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit44...
    public function update_ODESSO_APP_REF_ICON_PALETTE($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_icon_palette') 
		: $this->table_prefix.'_odesso_app_ref_icon_palette';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_APP_REF_ICON_PALETTE_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT44...

	public function odesso_app_ref_icon_palette_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_ref_icon_palette') : 
		$this->table_prefix.'_odesso_app_ref_icon_palette';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	} 
	 
	
	// Function for fetching  table heading of '_ODESSO_APP_REF_THEME_COLOR table...

	public function tablehead_ODESSO_APP_REF_THEME_COLOR(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_theme_color') : $this->table_prefix.'_odesso_app_ref_theme_color';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_APP_REF_THEME_COLOR' table...

	public function table_ODESSO_APP_REF_THEME_COLOR($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_theme_color') : $this->table_prefix.'_odesso_app_ref_theme_color';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` ");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit45...
    public function update_ODESSO_APP_REF_THEME_COLOR($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_ref_theme_color') 
		: $this->table_prefix.'_odesso_app_ref_theme_color';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'="'.$updated_value.'" WHERE `ODESSO_APP_REF_THEME_COLOR_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT45...

	public function odesso_app_ref_theme_color_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_app_ref_theme_color') : 
		$this->table_prefix.'_odesso_app_ref_theme_color';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_CLIENT table...

	public function tablehead_ODESSO_CLIENT(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_client') : $this->table_prefix.'_odesso_client';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_CLIENT' table...

	public function table_ODESSO_CLIENT($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_client') : $this->table_prefix.'_odesso_client';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` ");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit46...
    public function update_ODESSO_CLIENT($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_client') 
		: $this->table_prefix.'_odesso_client';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.'= "'.$updated_value.'" WHERE `ODESSO_CLIENT_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	
	// Function for INSERT46...

	public function odesso_client_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_client') : 
		$this->table_prefix.'_odesso_client';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_CLIENT_PAYMENT_INFO table...

	public function tablehead_ODESSO_CLIENT_PAYMENT_INFO(){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_client_payment_info') : $this->table_prefix.'_odesso_client_payment_info';
       
	    try
        {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='".$tablename."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	// Function for fetching  table heading of '_ODESSO_CLIENT_PAYMENT_INFO' table...

	public function table_ODESSO_CLIENT_PAYMENT_INFO($odesso_app_id){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_client_payment_info') : $this->table_prefix.'_odesso_client_payment_info';
		try
		{
          $stmt = $this->db->prepare("SELECT * FROM `".$tablename."` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
		{
           echo $e->getMessage();
		}
		
	}
	
	//Function for edit47...
    public function update_ODESSO_CLIENT_PAYMENT_INFO($value,$updated_value,$key)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_client_payment_info') 
		: $this->table_prefix.'_odesso_client_payment_info';
       try
       {
          $stmt = $this->db->prepare('UPDATE '.$tablename.' SET '.$value.' = "'.$updated_value.'" WHERE `ODESSO_CLIENT_PAYMENT_INFO_ID`="'.$key.'"');
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	}
	
	// Function for INSERT47...

	public function odesso_client_payment_info_insert($value3){
		
		$this->table_prefix = $_SESSION['APP_TYPE']   ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? 
		strtoupper($this->table_prefix.'_odesso_client_payment_info') : 
		$this->table_prefix.'_odesso_client_payment_info';
       
	    try
        {
            $value=implode('","',$value3);
		
			$stmt = $this->db->prepare('INSERT INTO '.$tablename.'
                                                       VALUES("'.$value.'")');
			$stmt->execute(); 											   
         
			return true;
	    }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
	}
	
	
	
	
	
	
	public function all_tables(){
		try
        {
		$stmt = $this->db->prepare("SELECT table_name FROM information_schema.tables where table_schema='BPMGroup' ");
		$stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
		}
		catch(PDOException $e)
	    {
		   echo $e->getMessage();
	    }
	}
	public function all_admin_cols(){
		
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature_order')
		: $this->table_prefix.'_odesso_app_feature_order';
		try
        {
		$stmt = $this->db->prepare("SELECT `COLUMN_NAME`,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH, IS_NULLABLE FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`= '".$tablename."' ");
		$stmt->execute();
		  // $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
	    {
		   echo $e->getMessage();
	    }
	}
	public function all_records(){
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_feature')
		: $this->table_prefix.'_odesso_app_feature';
		
		try
        {
		$stmt = $this->db->prepare("SELECT * FROM ".$tablename." ");
		$stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
	    {
		   echo $e->getMessage();
	    }
	}
	
	public function all_records2(){
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
		$tablename = ($_SESSION['APP_TYPE'] != '_pt') ? strtoupper($this->table_prefix.'_odesso_app_module_store_store_item_location_schedule') : $this->table_prefix.'_odesso_app_module_store_store_item_location_schedule';
		try
        {
		$stmt = $this->db->prepare("SELECT * FROM ".$tablename." ");
		$stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
		}
		catch(PDOException $e)
	    {
		   echo $e->getMessage();
	    }
	}
	
	
  /* public function update_table_admin($value)
    {
		$this->table_prefix = $_SESSION['APP_TYPE'] ? $_SESSION['APP_TYPE'] : '_pt';
       try
       {
          $stmt = $this->db->prepare("UPDATE admin SET password  = md5('".$value."') WHERE `id`='11' ");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
	} 
 */
   
}
?>