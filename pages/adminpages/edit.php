<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

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

    $password1 = md5($password);
    $id = (int)$_GET['id'];

    $sql = "SELECT * FROM users where id = $id";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {

    ?>
        <div class="container my-5">
            <h2>EDIT USER</h2>

            <form method="POST" action="edit1.php?id=<?php echo $row['id'] ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">role</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="role" value="<?php echo $row['role'] ?>">
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
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