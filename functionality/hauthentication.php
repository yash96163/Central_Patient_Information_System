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

$dbranchid = $_POST['branchid'];
$dbranchpassword = $_POST['branchpassword'];


$sql = "SELECT password, branchname from HOSPITAL where branchcode = '$dbranchid'";

$result = $conn->query($sql);


//  $sql = "SELECT branchcode from HOSPITAL where branchcode = '$dbranch'";

// $result = $conn->query($sql);

if($result->num_rows > 0)
{

    while($row = $result->fetch_assoc())
    {
        if($row['password'] == $dbranchpassword)
        {
            $_SESSION['hbranchname'] =  $row['branchname'];
            $_SESSION['hbranchcode'] = $dbranchid;

            
            header('Location: ../html/hospital.html');
        }
        else
        {
            die("Sorry that Password didn't work");
        }
       
    }

   

}
else
{
    die("Sorry that ID didn't work");
}


//   $sql = "INSERT into HOSPITAL values('$dbranch','$dbranchname','$dbranchplace','$dbranchphone','$dbranchadmin','$dpassword')";

//   $result = $conn->query($sql);

//      if($result)
//    {
 
//         header('Location: ../html/hospital.html');
//     }
//  else
//  {
//      echo "Database entry failed. Please try again..";
//  }
$conn->close();


?>