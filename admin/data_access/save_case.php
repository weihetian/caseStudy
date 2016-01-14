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


$id = $_POST['id'];
$cover = $_POST['cover'];
$client = $_POST['client'];
$campaign = $_POST['campaign'];
$time = addslashes($_POST['time']);
$objective = addslashes($_POST['objective']);
$challenges = addslashes($_POST['challenges']);
$execution = addslashes($_POST['execution']);

$query = "UPDATE case_study.case SET cover='$cover',client='$client',
            campaign='$campaign',date='$time',objective='$objective',
            challenges='$challenges',execution = '$execution' WHERE id=$id";

//$query = "INSERT INTO case_study.case(`client`,`campaign`,`date`) VALUES ('$client','$campaign','$time')";

if (mysqli_query($conn, $query)) {
    echo "succeed";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>
