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



if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $name = $_POST['name'];
        $phoneno = $_POST['phoneno'];
        $location = $_POST['location'];
        $brand = $_POST['brand'];
        $email = $_POST['email'];
        $honkg = $_POST['honkg'];
        $product_type = $_POST['product_type'];
        $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
        $imgType = $_FILES['userImage']['type'];

$sql = "INSERT INTO farmers (name, phoneno, location, brand, email, honkg, product_type, imageType, imageData)
VALUES('$name','$phoneno','$location','$brand', '$email', '$honkg', '$product_type', ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('ss', $imgType, $imgData);
        $current_id = $statement->execute()  or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
    }
}
// if(!mysqli_query($conn, $sql))
// {
//     echo 'Not inserted';
// }
// else{
//     
// }
echo 'Inserted';
header("refresh:1; url=farmer.php")

?>