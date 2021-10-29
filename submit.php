<?php
session_start();
include('connection.php');
$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM tbl_users where email='$email' and password='$password' and status='Active'";
$result = $conn->query($sql);

// $row = $result -> fetch_array(MYSQLI_ASSOC);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(count($result) > 0){
	$_SESSION['user']['id'] = $result[0]['user_id'];
	$_SESSION['user']['name'] = $result[0]['name'];
	header('location:dashboard.php');
}
else{
	$_SESSION['error_msg']= 'Please provide valid email or password';
 	header('location:index.php');
}


?>