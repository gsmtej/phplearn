<?php
  include('checksession.php');
  include('connection.php'); 
  //get form data once we submit the form through post method
  $event_name = $_POST['event_name'];
  $event_date = $_POST['event_date'];
  // echo $event_date;
  $eventArray = explode('-', $event_date);//explode convert string into array
  // print_r($eventArray);
  $startDate =  date('Y-m-d H:i:s',strtotime($eventArray[0]));// strtotime convert date into unix time stamp

  $endDate = date('Y-m-d H:i:s',strtotime($eventArray[1]));
  $sql = "insert into tbl_event (event_name, event_start_datetime, event_end_datetime) VALUES('$event_name', '$startDate',  '$endDate')";

  if($conn->query($sql)=== TRUE){
	  	$_SESSION['success_msg'] = 'Event Added Successfully';
	  	header('location:event.php');
	  	exit();
  }
   else {
		$_SESSION['error_email_msg'] = $conn->error;
	  	header('location:event.php');
	  	exit();
  
}
?>