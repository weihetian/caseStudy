<?php
$servername = "52.23.43.247";
$username = "stak";
$password = "stakstudios";
$database = "case_study";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database,"3306");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$client = $_POST['client'];
$campaign = $_POST['campaign'];
$time = addslashes($_POST['time']);

$query = "INSERT INTO case_study.case(`client`,`campaign`,`date`) VALUES ('$client','$campaign','$time')";

if (mysqli_query($conn, $query)) {
    echo "succeed";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>
