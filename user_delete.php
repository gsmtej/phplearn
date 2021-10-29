<?php
include('connection.php');
$userId = $_POST['userId'];
$sql = "Delete from tbl_users where user_id=$userId";
if($conn->query($sql)===TRUE){
	echo true;//once the data deleted it will send response true to the ajax in success function
}
else{
	echo false;
}

