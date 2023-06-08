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



if(isset($_POST['submit1'])){
    $name = $_POST['name'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $prev_price = $_POST['prev_price'];
    $current_price = $_POST['current_price'];
    $date_created = date('y-m-d', strtotime($_POST['date_created']));
    $date_updated = date('y-m-d', strtotime($_POST['date_updated']));
    $targetdir = "../userpages/upload/";
    $fileName = basename($_FILES["img_path"]["name"]);
    $targetFilePath = $targetdir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    
    $allowTypes=array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType,$allowTypes)){
    
        if(move_uploaded_file($_FILES["img_path"]["tmp_name"],$targetFilePath)){

            $query = "INSERT INTO `products`(`code`, `name`, `description`, `prev_price`, `current_price`, `date_created`, `date_updated`, `img_path`) 
    VALUES ('$code','$name','$description','$prev_price','$current_price','$date_created','$date_updated', '" . $fileName . "')";

            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo "Inserted successfully ";
                header("refresh:1; url=products.php");
            } else {
                die("error");
            }

    }
    }
}
?>