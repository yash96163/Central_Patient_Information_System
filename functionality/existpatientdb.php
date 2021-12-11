<?php

    session_start();
      
   
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "CPIS";

$conn = new mysqli($serverName, $userName, $password, $dbname);
if($conn->connect_error)
{
    die("Connection Failed :" .$conn->connect_error);
}
//.........................................  Connection-Ends here  ........................................................

$aadhaar = $_SESSION["daadhaar"];
$branchcode = $_SESSION['hbranchcode'];
$branchname = $_SESSION['hbranchname'];
$today = date("Y/m/d");

    $now = time();
    $dob = strtotime($_SESSION["dage"]);
    $difference = $now-$dob;
$age = floor($difference/31556926);
$weight=$_POST['patientweight'];
$assign=$_POST['docassign'];
$specialist=$_POST['docspecialist'];
$disease=$_POST['pateintdisease'];








$sql = "INSERT into DISEASES(aadhaar, branchcode, branchname, datetime, age, weight, doctorassigned, doctorid, specialization, reason) values('$aadhaar', '$branchcode', '$branchname', '$today', '$age', '$weight', '$assign', 'id12', '$specialist', '$disease')";

//$sql = "UPDATE DISEASES SET branchname = 'lolo' WHERE (aadhaar = '12345' AND branchname IS NULL)";


$result = $conn->query($sql);

if($result)
{
    echo "Success";
}
else
{
    echo "Not success";
}




$conn->close();


?>