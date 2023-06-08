<?php

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db2";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
    exit();
}
if(isset($_GET['id'])){

$id = $_GET['id'];
$sql = "DELETE FROM `farmers` WHERE id = $id";
if($conn->query($sql) === TRUE){
    echo "Deleted the data successfully";
    header("refresh:2; url=farmers.php");
}
else{
    echo "Something went terribly wrong";
}

}else{
    //
    die('id not provided');
}
