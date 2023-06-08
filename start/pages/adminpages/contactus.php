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
    <title>Contact_Us</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body style="margin: 50px;">
    <?php


    $sname = "localhost";
    $uname = "root";
    $password = "";
    $db_name = "my_db2";

    $conn = new mysqli($sname, $uname, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $query = "SELECT * FROM users ORDER BY id";
    $query1 = "SELECT * FROM users WHERE role = 'admin'";
    $farmer = "SELECT * FROM users WHERE role = 'farmer'";
    $users = "SELECT * FROM users WHERE role = 'user'";
    $query_users = mysqli_query($conn, $users);
    $query_run = mysqli_query($conn, $query);
    $query_run1 = mysqli_query($conn, $query1);
    $query_farmer = mysqli_query($conn, $farmer);
    $user = mysqli_num_rows($query_users);
    $farmers = mysqli_num_rows($query_farmer);
    $rows = mysqli_num_rows($query_run);
    $rows1 = mysqli_num_rows($query_run1);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    ?>
    <h1 style="text-align:center ;">LIST OF ALL USERS</h1>

    <a class="btn btn-secondary" href="../admin.php" role="button">Homepage</a>
    <p></p>
    <a class="btn btn-primary" href="create.php" role="button">Add User</a>
    <div class="container">
        <div class="body">
            <p>Total number of accounts</p>
            <?php echo '<h1>' . $rows . '</h1>'; ?>
        </div>


        <div class="body">
            <p>Total number of Admin accounts</p>
            <?php echo '<h1>' . $rows1 . '</h1>'; ?>
        </div>

        <div class="body">
            <p>Total number of Farmer accounts</p>
            <?php echo '<h1>' . $farmers . '</h1>'; ?>
        </div>

        <div class="body">
            <p>Total number of User accounts</p>
            <?php echo '<h1>' . $user . '</h1>'; ?>
        </div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col"></div>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Username</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            <?php


            while ($row = $result->fetch_assoc()) {
                echo "  <tr>
                <td> " . $row["id"] . "</td>
                <td>" . $row["role"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=" . $row['id'] . "'>Delete</a>
                    <a class='btn btn-warning btn-sm' href='edit.php?id=" . $row['id'] . "'>edit</a>
                </td>
            </tr> ";
            }

            ?>
        </tbody>


    </table>


</body>

</html>