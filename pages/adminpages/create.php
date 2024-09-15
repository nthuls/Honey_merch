<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
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


    if (isset($_REQUEST['role'])) {

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $role = stripslashes($_REQUEST['role']);
        $role = mysqli_real_escape_string($conn, $role);
        $password1 = $_REQUEST['password1'];


        $query ="INSERT into `users` (role, username, password, name) 
    VALUES ('$role', '$username', '" . md5($password) . "', '$name')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('location:contactus.php');
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='contactus.php'>register</a> again.</p>
                  </div>";
        }
    } else {
    ?>

    <div class="container my-5">
        <h2>NEW USER</h2>

        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">role</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="role" value="">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="contactus.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
<?php
    }
?>

</body>

</html>

