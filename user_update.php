<?php
	include('checksession.php');
	include('connection.php');
	$userId = $_POST['user_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	//check whether email is exist or not in table for another user
	$emailCheckSql = "SELECT * FROM tbl_users where email='$email' AND user_id != $userId";
	$result = $conn->query($emailCheckSql);
	$userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if(count($userData) > 0){
		$_SESSION['error_email_msg'] = 'this email is already exist';
		header("location:user_edit.php?user_id=$userId");
		exit();
	}

	$status = $_POST['status'] ? 'Active':'Deactive';// check whether user status active or not
	$imageName = $_FILES['image']['name'];// image name which i have choosen at time of browse time
	$tempName = $_FILES['image']['tmp_name'];// this is temporary name of a file
	//echo $tempName;
	$target_dir = "uploads/"; // this is upload directory where you can upload image or file
	$target_file = $target_dir.$imageName;// this is target path with image where i am uploading file
	// when image is not empty then it will go to the if condition
	if(!empty($imageName)){
		//this function upload file which take two arguments one is temp name and another is target file
		move_uploaded_file($tempName, $target_file);
		//this is query to update data
		$sql = "UPDATE tbl_users set name='$name', email = '$email', status='$status',user_image='$imageName' where user_id=$userId";
	}
	else{
		//this else condition will work if user image is empty
		$sql = "UPDATE tbl_users set name='$name', email = '$email', status='$status' where user_id=$userId";
	}
    		
	 
	
	
	if($conn->query($sql)===true){
		$_SESSION['success_msg'] = 'User has been updated successfully';
		header('location:users.php');
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>