<?php
include('checksession.php'); 
// Load the database configuration file 
include('connection.php');

// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
// Column names 
$fields = array('ID', 'NAME', 'EMAIL', 'STATUS'); 

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
$sql = "SELECT * from tbl_users";
$result = $conn->query($sql);
// $row = $result -> fetch_array(MYSQLI_ASSOC);
$userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($userData as $key => $value) {
	$lineData = [$value['user_id'], $value['name'], $value['email'], $value['status']];
	array_walk($lineData, 'filterData'); 
    $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    // print_r($excelData);
    // die();
}
// Headers for download
$fileName = "User_data_".date('y-m-d H:i:s').".xls"; ; 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>