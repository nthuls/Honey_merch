<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Us</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body style="margin: 50px;">
    <h1>Messages and Reports</h1>
    <br>
    <a class="btn btn-secondary" href="../admin.php" role="button">Homepage</a>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>Subject</th>
                <th>message</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sname = "localhost";
            $uname = "root";
            $password = "";
            $db_name = "my_db2";

            $conn = new mysqli($sname, $uname, $password, $db_name);

            if ($conn->connect_error) {
                die("Connection failed" . $conn->connect_error);
            }

            $sql = "SELECT * FROM contact";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }


            while ($row = $result->fetch_assoc()) {
                echo "  <tr>
                <td> " . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["Subject"] . "</td>
                <td>" . $row["message"] . "</td>
                 <td>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr> ";
            }

            ?>
        </tbody>


    </table>
</body>

</html>