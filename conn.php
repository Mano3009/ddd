<?php
$servername = "localhost";
//$username = "svpeakc1_sunauto";
//$password = "xa)W}gcLe3&N";

//$dbname="svpeakc1_sunauto";

$username = "mohan";
$password = "password";

$dbname="sunauto";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} 



include("yeardateget.php");

include("baseurl.php");

?>