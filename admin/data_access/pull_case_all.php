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

$query = "SELECT * FROM case_study.case ORDER BY id DESC";

$case_result = array();

$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
  $case_id=$row['id'];
  $cover = $row['cover'];
  $client_name = $row['client'];
  $campaign_name  = $row['campaign'];
  $time  = $row['date'];
  $objective = $row['objective'];
  $challenges = $row['challenges'];
  $execution = $row['execution'];


  // $imagequery = "SELECT * FROM picture WHERE campaign_id = '$camapgin_id' ";
  //
  // $image_array = array();
  // $imageresult = mysqli_query($conn,$imagequery);
  // while($imagerow = mysqli_fetch_array($imageresult)){
  //   $image_id=$imagerow['id'];
  //   $image_url = $imagerow['url'];
  //   $image_description = $imagerow['picture_description'];
  //
  //   $image_array[] = array("id"=>$image_id,"url"=>$image_url,"description"=>$image_description);
  // }

  $case_result[] = array("id"=>$case_id,"cover"=>$cover,"client"=>$client_name,"campaign"=>$campaign_name,"date"=>$time,"objective"=>$objective,"challenges"=>$challenges,"execution"=>$execution);



}

echo json_encode($case_result);
mysqli_close($conn);


 ?>
