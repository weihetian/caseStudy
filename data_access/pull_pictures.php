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

$offset=$_GET['offset'];

$query = "SELECT * FROM case_study.case ORDER BY id DESC LIMIT $offset,20 ";

$case_array =array();

$imageresult = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($imageresult)){
  $id=$row['id'];
  $cover = $row['cover'];
  $campaign = $row['campaign'];
  $objective = $row['objective'];
  $date = $row['date'];

  $case_array[] = array("id"=>$id,"cover"=>$cover,"campaign"=>$campaign,"objective"=>$objective,"date"=>$date);
}


echo json_encode($case_array);
mysqli_close($conn);



?>
