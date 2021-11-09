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
  
?>