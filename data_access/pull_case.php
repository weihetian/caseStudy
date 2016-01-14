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

$id=$_GET['id'];

$query = "SELECT * FROM case_study.case WHERE id='$id' ";

$case_array;

$imageresult = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($imageresult)){
  $case_id=$row['id'];
  $cover = $row['cover'];
  $client_name = $row['client'];
  $campaign_name  = $row['campaign'];
  $time  = $row['date'];
  $objective = $row['objective'];
  $challenges = $row['challenges'];
  $execution = $row['execution'];


  $case_array = array("id"=>$case_id,"cover"=>$cover,"client"=>$client_name,"campaign"=>$campaign_name,"date"=>$time,"objective"=>$objective,"challenges"=>$challenges,"execution"=>$execution);


}


echo json_encode($case_array);
mysqli_close($conn);



?>
