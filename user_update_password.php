<?php
	include('checksession.php');
	include('connection.php');

	$oldPassword = $_POST['old_password'];
	$newPassword = $_POST['new_password'];
	$confirmPassword = $_POST['confirm_password'];

	$confirmPassword = $_POST['confirm_password'];
	$sql = "SELECT * FROM tbl_users where password=md5($oldPassword)";
	$result = $conn->query($sql);
	$userData = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if(count($userData)  > 0){
		//here we will check if new password is matched with confirm password
		if($newPassword == $confirmPassword){
			$userId = $_SESSION['user']['id'];
			$sql = "Update tbl_users set password=md5($newPassword) where user_id=$userId";
			// echo $sql;
			// die();
			if($conn->query($sql)=== TRUE){
				$_SESSION['success_msg'] ="Password has been updated successfully";
				header('location:changepassword.php');
			}
		}
		else{
			$_SESSION['error_msg'] ="your confirm password is not match with new password";
			header('location:changepassword.php');
		}
	}
	else{
		$_SESSION['error_msg'] ="your old password is wrong, please enter correct password";
		header('location:changepassword.php');
	}
?>