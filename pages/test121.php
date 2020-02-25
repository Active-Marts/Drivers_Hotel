<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$tracking_number = mysqli_real_escape_string($link, $_REQUEST['tracking_number']);
$status121 = mysqli_real_escape_string($link, $_REQUEST['status121']);
 
// Attempt insert query execution
$sql = "UPDATE orderr SET status='$status121' WHERE track_num='$tracking_number'";
if(mysqli_query($link, $sql)){
    include "orders.php";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>