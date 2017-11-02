<?php

	include_once 'config/dbconfig.php';

	$user_APP_ID = $_POST['id'];
	$user_name 	 = $_POST['user_name'];
		
	if ( isset($_FILES['file']) ) {
		
		$imageName 		= $_FILES['file']['name'];
		$extension 		= pathinfo($imageName,PATHINFO_EXTENSION);
		$imgname        = pathinfo($imageName, PATHINFO_FILENAME);
		$img 			= "APPID".$user_APP_ID.'_'.rand(10,100);
	
	
		$source_file 	= $_FILES['file']['tmp_name'];
		$dst_dir   		= __DIR__ .'/uploads/'.$user_name ;
		
		$dest_file   	= __DIR__ .'/uploads/'.$user_name."/".$img.'.'.$extension;
		
		if (!is_dir($dst_dir)){
			
			// make folder...
			mkdir($dst_dir, 0777, true);  
			
		} 
		
		// upload image in the folder...
		if (file_exists($dest_file)) {
			
			// already exists, remove previous image...
			
			unlink($dest_file);
			
			// upload new image...
				  
				move_uploaded_file( $source_file, $dest_file );
				
				 // update image name into table...
				  $user->imageName($dest_file,$user_name,$user_APP_ID);
				  
				if($_FILES['file']['error'] == 0) {
					// echo $img.'.'.$extension;
					 $output['result'] = '2';
					$output['image_with_path'] = $img.'.'.$extension;
					print_r(json_encode($output)); 
				}else{
				
					// echo '0';
					 $output['result'] = '0';
					print_r(json_encode($output)); 
				
				}			
			
		}else {
			
			// upload image first time...
					move_uploaded_file( $source_file, $dest_file )
					or die ("Error!!");
					 // update iamge name into table...
					$user->imageName($dest_file,$user_name,$user_APP_ID);
				 
					if($_FILES['file']['error'] == 0) {
						// echo '1';
						// echo $img.'.'.$extension;
					
						$output['result'] 		= '1';
						$output['image_with_path'] = $img.'.'.$extension;
					
						print_r(json_encode($output)); 
						
					}else{
						
						// echo '0';
						 $output['result'] = '0';
						print_r(json_encode($output));
					}
		} 

	}


?>