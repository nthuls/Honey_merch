<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .container1 {
            height: 50px;
            position: relative;
        }

        .vertical-center a {
            margin: 0;
            position: center;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .body {

            width: 180px;
            text-align: center;
            padding: 25px 15px;
            box-shadow: 20px 20px 34px rgba(1, 0, 0, 0.06);
            border: 4px solid #fff;
            border-radius: 4px;
            margin: 15px 0;
        }

        .body:hover {
            box-shadow: 10px 10px 54px rgba(255, 204, 0, 0.721);
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body style="margin: 30px;">
    <form class="form">
        <h1 style="text-align:center ;">OUR SHOP</h1>

        <div class="container1">
            <div class="vertical-center">
                <a style="justify-content: center;" class="btn btn-warning" href="../admin.php" role="button">Homepage</a>
            </div>
        </div>
        <?php
        $sname = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "my_db2";


        $conn = new mysqli($sname, $uname, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed" . $conn->connect_error);
        }

        $sql = "SELECT * FROM `products`";
        $result = $conn->query($sql);

        if (!$result) {
            die("Invalid query: " . $conn->error);
        }

        $query = "SELECT * FROM products ORDER BY id";
        $query_run = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($query_run);

        $query1 = "SELECT * FROM products WHERE description LIKE '%honey'";
        $query_run1 = mysqli_query($conn, $query1);
        $rows1 = mysqli_num_rows($query_run1);

        $beeswax = "SELECT * FROM products WHERE description LIKE '%beeswax'";
        $beeswax_run = mysqli_query($conn, $beeswax);
        $rows2 = mysqli_num_rows($beeswax_run);

        $propolis = "SELECT * FROM products WHERE description LIKE '%propolis'";
        $propolis_run = mysqli_query($conn, $propolis);
        $rows3 = mysqli_num_rows($propolis_run);
        ?>
        <div class="container">
            <div class="body">
                <p>Total No of Products</p>
                <?php echo '<h1>' . $rows . '</h1>'; ?>
            </div>
            <div class="body">
                <p>Honey Products</p>
                <?php echo '<h1>' . $rows1 . '</h1>'; ?>
            </div>
            <div class="body">
                <p>Honey Products</p>
                <?php echo '<h1>' . $rows2 . '</h1>'; ?>
            </div>
            <div class="body">
                <p>Propolis Products</p>
                <?php echo '<h1>' . $rows3 . '</h1>'; ?>
            </div>
        </div>
        <a class="btn btn-primary" href="create.php" role="button">Add Products</a>
        <br>
        <table class="table">
            <thead>
                <tr></tr>
                <th>Image</th>
                <th>CODE</th>
                <th>Name</th>
                <th>Description</th>
                <th>Previous_Price</th>
                <th>Current Price</th>
                <th>Date_Updated</th>
                <th>Date_Created</th>
                </tr>
            </thead>

            <tbody>
                <?php


                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><img src="../userpages/upload/.\<?php echo $row["img_path"]; ?>" height="100px" width="100px"></td>
                        <td><?php echo $row['code'] ?> </td>
                        <td><?php echo $row['name'] ?> </td>
                        <td><?php echo $row['description'] ?> </td>
                        <td><?php echo $row['prev_price'] ?> </td>
                        <td><?php echo $row['current_price'] ?> </td>
                        <td><?php echo $row['date_updated'] ?> </td>
                        <td><?php echo $row['date_created'] ?> </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="edit.php?id=<?php echo $row['id'] ?>">edit</a>
                            <br>
                            <br>
                            <a class="btn btn-warning btn-sm" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>