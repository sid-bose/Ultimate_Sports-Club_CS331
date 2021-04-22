<?php
session_start();
$conn= mysqli_connect("localhost", "root", "", "match");
 if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
    $conn1= mysqli_connect("localhost", "root", "", "toss");
 if ($conn1->connect_error) {
    die("Connection failed due to error in code : " . $conn1->connect_error);
    }

$sql="DELETE FROM batting";
$result=$conn->query($sql);
$sql="DELETE FROM bowling";
$result1=$conn->query($sql);
$sql="DELETE FROM toss_details";
$result2=$conn1->query($sql);

if($result && $result1 && $result2)
{
    session_destroy();
    echo "<script> window.location.assign('coord_login.php'); </script>";
}
else{
    echo"could not end the match";
}




?>