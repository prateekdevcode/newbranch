<?php 
	if(isset($_POST) && $_POST['action'] == 'custom_image_upload'){
		if( $_FILES ){
			$valid_formats = array("jpg", "png"); // Supported file types
			$max_file_size = 5 * 1048576; // in kb	
			$path = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/storefront/color-image/';
			$name = $_FILES['upload_image']['name'];
			$extension = pathinfo( $name, PATHINFO_EXTENSION );
			$new_filename = strtolower(str_replace(" ","-",$_POST['image_name'])).'.jpg';			
			if ( $_FILES['upload_image']['error'] == 0 ) {
				// Check if image size is larger than the allowed file size
				if ( $_FILES['upload_image']['size'] > $max_file_size ) {
					$arr = array(0,$name." is too large!.");
					echo json_encode($arr);
					exit;				
				// Check if the file being uploaded is in the allowed file types
				} elseif(!in_array( strtolower( $extension ), $valid_formats ) ){
				  $arr =array('suc'=>0,'msg'=>$name." is not a valid format");
					echo json_encode($arr);
				   exit;
				
				} else{ 
					// If no errors, upload the file...		
					if(move_uploaded_file($_FILES["upload_image"]["tmp_name"], $path.$new_filename)){
					  $arr = array('Image Uploaded Successfully',$new_filename);
					  echo json_encode($arr);
					}
				}
			}
			else{
				$arr =array('suc'=>0,'msg'=>"Error Please try again");
					echo json_encode($arr);
			}
			  
		}
	}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
	<div class="form-group">
	  <label for="image_name">Image Name *: ( Image name is must be same like Product's Color Name. )</label>
	  <input type="text" class="form-control" id="image_name" placeholder="Image Name" name="image_name">
	</div>
	<div class="form-group">
	  <label for="upload_image">Upload Image:</label>
	  <input type="file" class="form-control" id="upload_image" name="upload_image">
	</div>
	<button type="submit" class="btn btn-success" name="action" value="custom_image_upload" >Upload Image</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>