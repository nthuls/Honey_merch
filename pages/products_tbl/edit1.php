<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db2";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
    exit();
}

$code =  $_POST["code"];
$name =  $_POST["name"];
$description =  $_POST["description"];
$prev_price =  $_POST["prev_price"];
$current_price =  $_POST["current_price"];
$date_created = date('y-m-d', strtotime($_POST['date_created']));
$date_updated = date('y-m-d', strtotime($_POST['date_updated']));
$targetdir = "../userpages/upload/";
$fileName = basename($_FILES["img_path"]["name"]);
$targetFilePath = $targetdir.$fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$id = $_GET['id'];


$sql = "UPDATE `products` SET
`code`='$code',
`name`='$name',
`description`='$description',
`prev_price`='$prev_price',
`current_price`='$current_price',
`img_path`= '" . $fileName . "',
`date_created`='$date_created',
`date_updated`='$date_updated' 
WHERE `id` = '$id'";

 $result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Records updated: ";
    header("refresh:1; url=products.php");
} else {
    echo "Error: ";
    header("refresh:1; url=edit.php");
}

 $conn->close();

    
?>