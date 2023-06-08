<?php
session_start();
$role =  $_POST["role"];
$username =  $_POST["username"];
$password =  $_POST["password"];
$name =  $_POST["name"];


$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db2";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
    exit();
}
$password1 = md5($password);
$id = $_GET['id'];

$sql = "UPDATE `users` 
SET
`role`='$role',
`username`='$username',
`password`='$password1',
`name`='$name'
 WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Records updated: ";
    header("refresh:1; url=contactus.php");
} else {
    echo "Error: ";
    header("refresh:1; url=edit.php");
}
$conn->close();


?>