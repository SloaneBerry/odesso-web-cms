<?php
class USER
{
    public $db;
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
    //Function for update image value...
    public function imageName($image,$Username,$APPID)
	 {
		 try
		 {
			  $stmt = $this->db->prepare("UPDATE admin SET image = '".$image."' WHERE ODESSO_APP_ID ='".$APPID."' AND Username='".$Username."'");
			 
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
    public function login($email,$password)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM admin WHERE `Username` = '".$email."' AND `Password` = '".$password."' ");
          $stmt->execute(array(':ODESSO_CLIENT_EMAIL'=>$email, ':ODESSO_CLIENT_PASSWORD'=>$password));
         $row 		= $stmt->fetch(PDO::FETCH_ASSOC);
		 $id		= $row['ODESSO_APP_ID'];
		 $Username 	= $row['Username'];
		 $emailId 	= $row['email'];
		  if($stmt->rowCount()>0)
		 {
				 $_SESSION['email'] 		 = $emailId;
				 $_SESSION['login_username'] = $email;
				 $_SESSION['username']		 = $Username;
				 $_SESSION['id']			 = $id;
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
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM _pt_odesso_app WHERE `ODESSO_CLIENT_ID` = '".$client_id."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app
                                                       VALUES('$value')");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_feature
                                                       VALUES('$value')");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_store_category
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of _PT_ODESSO_APP_FEATURE
    public function tablehead_ODESSO_APP_FEATURE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_feature'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_FEATURE
    public function table_ODESSO_APP_FEATURE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_feature` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function tablehead_ODESSO_APP_MODULE_STORE_CATEGORY ()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_category'");
          // $stmt = $this->db->prepare("DESCRIBE _pt_odesso_app_feature from `TABLE_SCHEMA`='bpmgroup'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function table_ODESSO_APP_MODULE_STORE_CATEGORY($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_category` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_item
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of _PT_ODESSO_APP_MODULE_ITEM
    public function tablehead_ODESSO_APP_MODULE_ITEM ()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_item'");
          // $stmt = $this->db->prepare("DESCRIBE _pt_odesso_app_feature from `TABLE_SCHEMA`='bpmgroup'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function table_ODESSO_APP_MODULE_ITEM($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_item` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
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
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_item` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_ITEM_ID`='".$key."'");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP
    public function update_ODESSO_APP($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_ID`='".$key."'");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_FEATURE
    public function update_ODESSO_APP_FEATURE($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_feature` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_FEATURE_ID`='".$key."'");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_MODULE_STORE_CATEGORY
    public function update_ODESSO_APP_MODULE_STORE_CATEGORY($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_store_category` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_STORE_ITEM_CATEGORY_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_store_store_item
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_MODULE_STORE_STORE_ITEM
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_store_store_item` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_store_store_item_inventory
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_store_store_item_inventory` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_store_store_item_location_schedule
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_store_store_item_location_schedule` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_user_app_profile_attribute
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE
    public function update_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_user_app_profile_attribute` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_user_user_type
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table_PT_ODESSO_APP_MODULE_USER_USER_TYPE
    public function update_ODESSO_APP_MODULE_USER_USER_TYPE($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_user_user_type` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_USER_USER_TYPE_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_ref_string
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table _PT_ODESSO_APP_REF_STRING
    public function update_ODESSO_APP_REF_STRING($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_ref_string` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_REF_STRING_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_information
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table _PT_ODESSO_APP_MODULE_INFORMATION
    public function update_ODESSO_APP_MODULE_INFORMATION($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_information` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_INFORMATION_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_web
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table _PT_ODESSO_APP_MODULE_WEB
    public function update_ODESSO_APP_MODULE_WEB($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_web` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_WEB_ID`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_store_store_item_image
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_store_store_item_image` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE_ID`='".$key."'");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for update table update_table _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function update_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_app_module_store_store_item_attribute` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE_ID`='".$key."'");
		  $stmt->execute();
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   // Function for update table update_table_ODESSO_END_USER_SP_ITEM_LIST 
    public function update_table_ODESSO_END_USER_SP_ITEM_LIST($value,$updated_value,$key)
    {
       try
       {
          $stmt = $this->db->prepare("UPDATE `_pt_odesso_end_user_sp_item_list` SET `".$value."`= '".$updated_value."' WHERE `ODESSO_END_USER_SP_ITEM_LIST`='".$key."'");
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
       try
       {
		  $value=implode("','",$value3);
          $stmt = $this->db->prepare("INSERT INTO _pt_odesso_app_module_store_store_item_attribute
                                                       VALUES('$value')");
		  $stmt->execute(); 											   
         
		  return true;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM 
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_store_item'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_CATEGORY 
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM ($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_store_item` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 // Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM 
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_store_item_inventory'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY 
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_INVENTORY($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_store_item_inventory` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 // Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_store_item_location_schedule'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE 
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_LOCATION_SCHEDULE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_store_item_location_schedule` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE
    public function tablehead_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_user_app_profile_attribute'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table_PT_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE
    public function table_ODESSO_APP_MODULE_USER_APP_PROFILE_ATTRIBUTE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_user_app_profile_attribute` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_MODULE_USER_USER_TYPE
    public function tablehead_ODESSO_APP_MODULE_USER_USER_TYPE()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_user_user_type'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table_PT_ODESSO_APP_MODULE_USER_USER_TYPE
    public function table_ODESSO_APP_MODULE_USER_USER_TYPE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_user_user_type` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_REF_STRING
    public function tablehead_ODESSO_APP_REF_STRING()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_ref_string'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_REF_STRING
    public function table_ODESSO_APP_REF_STRING($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_ref_string` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_REF_STRING
    public function tablehead_ODESSO_APP_MODULE_INFORMATION()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_information'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_INFORMATION
    public function table_ODESSO_APP_MODULE_INFORMATION($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_information` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP
    public function tablehead_ODESSO_APP()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP
    public function table_ODESSO_APP($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app` WHERE `odesso_app_id`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_MODULE_WEB
    public function tablehead_ODESSO_APP_MODULE_WEB()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_web'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_WEB
    public function table_ODESSO_APP_MODULE_WEB($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_web` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_store_item_image'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_IMAGE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_store_item_image` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
// Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function tablehead_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_store_item_attribute'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE
    public function table_ODESSO_APP_MODULE_STORE_STORE_ITEM_ATTRIBUTE($odesso_app_id)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_store_item_attribute` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   // Function for fetching  table heading of _PT_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS
    public function tablehead_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_app_module_store_order_address'");
          $stmt->execute();
		 
		  $row= $stmt->fetchALL(PDO::FETCH_COLUMN);
		  
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
	// Function for fetching  table _PT_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS
    public function table_ODESSO_APP_MODULE_STORE_ORDER_ADDRESS($odesso_app_id)
    {
		try
        {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_app_module_store_order_address` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		  
		  return $row;
	    }
       catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}
	
	
	// Function for fetching  table heading of  _PT_ODESSO_END_USER
    public function tablehead_ODESSO_END_USER()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_end_user'");
          $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
		 
		  return $row;
	   }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
	// Function for fetching  table  _PT_ODESSO_END_USER
    public function table_ODESSO_END_USER($odesso_app_id)
    {
		try
        {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_end_user` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
		  $stmt->execute();
		  $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
		   
		  return $row;
	    }
       catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}

  // Function for fetching  table heading of  _PT_ODESSO_END_USER_SP_ITEM_LIST
    public function tablehead_ODESSO_END_USER_SP_ITEM_LIST()
    {
       try
       {
          $stmt = $this->db->prepare("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='BPMGroup'    AND `TABLE_NAME`='_pt_odesso_end_user_SP_ITEM_LIST'");
          $stmt->execute();
      $row=$stmt->fetchALL(PDO::FETCH_COLUMN);
     
      return $row;
     }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
  // Function for fetching  table  _PT_ODESSO_END_USER_SP_ITEM_LIST
    public function table_ODESSO_END_USER_SP_ITEM_LIST($odesso_app_id)
    {
    try
        {
          $stmt = $this->db->prepare("SELECT * FROM `_pt_odesso_end_user_SP_ITEM_LIST` WHERE `ODESSO_APP_ID`='".$odesso_app_id."'");
      $stmt->execute();
      $row=$stmt->fetchALL(PDO::FETCH_ASSOC);
       
      return $row;
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
		   
		  $value = implode("','",$data);
		  
		 
		  $stmt = $this->db->prepare("INSERT INTO admin VALUES('$value')");
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
}
?>