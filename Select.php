<?php 
include_once 'db.php';
 
$sql = "SELECT * FROM users Limit 15";
 
$query = mysqli_query($conn,$sql);
 
if(!$query)
{
    echo "Query does not work.".mysqli_error($conn);die;
}
 
while($data = mysqli_fetch_array($query))
{
    echo "Username = " .$data['username']."<br>";
    echo "name = " . $data['name'] . "<br>";
    echo "role = " . $data['role'] . "<br><hr>";
}
?>