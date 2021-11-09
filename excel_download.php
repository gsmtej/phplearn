<?php
	include('checksession.php'); 
	include('connection.php');
	$sql = "SELECT * FROM tbl_users";
	$result = $conn->query($sql);

// $row = $result -> fetch_array(MYSQLI_ASSOC);
    $usersData = mysqli_fetch_all($result, MYSQLI_ASSOC);

 // Filter the excel data 
	function filterData(&$str){ 
	    $str = preg_replace("/\t/", "\\t", $str); 
	    $str = preg_replace("/\r?\n/", "\\n", $str); 
	    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
	} 
   $fields = array('Name', 'Email'); 
 $fileName = "members-data_" . date('Y-m-d') . ".xls"; 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
    // Output each row of the data 
    foreach ($usersData as $key => $value){
        // $status = ($row['status'] == 1) ? 'Active':'Inactive'; 
        $lineData = array( $value['name'], $value['email']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
    
 
	// Headers for download 
	header("Content-Type: application/vnd.ms-excel"); 
	header("Content-Disposition: attachment; filename=\"$fileName\""); 
	 
	// Render excel data 
	echo $excelData; 
	 
	exit;
?>