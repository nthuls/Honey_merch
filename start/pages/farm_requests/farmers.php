<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .body {
            background-color: #b36000;
            width: 180px;
            text-align: center;
            padding: 25px 15px;
            box-shadow: 20px 20px 34px whitesmoke;
            border: 4px solid #b36000;
            border-radius: 4px;
            margin: 15px 0;
        }

        .body:hover {
            box-shadow: 10px 10px 54px black;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Us</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body style="margin: 30px;">
    <?php

    $sname = "localhost";
    $uname = "root";
    $password = "";
    $db_name = "my_db2";


    $conn = new mysqli($sname, $uname, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM `farmers`";
    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    $query = "SELECT * FROM farmers ORDER BY id";
    $query_run = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($query_run);

    $query1 = "SELECT * FROM farmers WHERE product_type = 'royal_jelly'";
    $query_run1 = mysqli_query($conn, $query1);
    $rows1 = mysqli_num_rows($query_run1);

    $query2 = "SELECT * FROM farmers WHERE product_type = 'pollen'";
    $query_run2 = mysqli_query($conn, $query2);
    $rows2 = mysqli_num_rows($query_run2);

    $honey = "SELECT * FROM farmers WHERE product_type = 'honey'";
    $honey_run = mysqli_query($conn, $honey);
    $rows3 = mysqli_num_rows($honey_run);

    $propolis = "SELECT * FROM farmers WHERE product_type = 'propolis'";
    $proplis_run = mysqli_query($conn, $propolis);
    $rows4 = mysqli_num_rows($proplis_run);

    ?>
    <h1 style="text-align:center ;">Farmer Pickup Requests</h1>
    <div class="container">
        <div class="body">
            <p>Total Requests</p>
            <?php echo '<h1>' . $rows . '</h1>'; ?>
        </div>
        <div class="body">
            <p>Royal_Jelly Requests</p>
            <?php echo '<h1>' . $rows1 . '</h1>'; ?>
        </div>
        <div class="body">
            <p>Pollen Requests</p>
            <?php echo '<h1>' . $rows2 . '</h1>'; ?>
        </div>
        <div class="body">
            <p>Honey Requests</p>
            <?php echo '<h1>' . $rows3 . '</h1>'; ?>
        </div>
        <div class="body">
            <p>Propolis Requests</p>
            <?php echo '<h1>' . $rows4 . '</h1>'; ?>
        </div>
        <div class="body">
            <p>Bees_wax Requests</p>
            <?php echo '<h1>' . $rows4 . '</h1>'; ?>
        </div>
    </div>
    <form class="form">

        <a class="btn btn-secondary" href="../admin.php" role="button">Homepage</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>imageType</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone_number</th>
                    <th>Location</th>
                    <th>brand</th>
                    <th>email</th>
                    <th>Product_in_kg</th>
                    <th>product_type</th>
                </tr>
            </thead>

            <tbody>
                <?php


                while ($row = $result->fetch_assoc()) {
                ?>



                    <tr>
                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['imageData']) . ' "alt="Image" style="width: 100px; height: 100px;" >'; ?></td>
                        <td><?php echo $row['imageType'] ?> </td>
                        <td><?php echo $row['id'] ?> </td>
                        <td><?php echo $row['name'] ?> </td>
                        <td><?php echo $row['phoneno'] ?> </td>
                        <td><?php echo $row['location'] ?> </td>
                        <td><?php echo $row['brand'] ?> </td>
                        <td><?php echo $row['email'] ?> </td>
                        <td><?php echo $row['honkg'] ?> </td>
                        <td><?php echo $row['product_type'] ?> </td>
                        <td>

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