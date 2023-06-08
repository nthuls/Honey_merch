<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    require('db_conn.php');

    if (isset($_REQUEST['username'])) {

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
            header('location:login.php');
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <form class="border shadow p-3 rounded" autocomplete="off" action="" method="post" style="width: 450px;">
                <h1 class="text-center p-3">REGISTER HERE</h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Full name</label>
                    <input type="text" class="form-control" name="name" id="name" required="">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required="">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required="">
                </div>
                <div class="mb-1">
                    <label class="form-label">Role:</label>
                </div>
                <select class="form-select mb-3" name="role" aria-label="Default select example" required="">
                    <option value="farmer">Farmer</option>
                    <option value="user">User</option>
                </select>
                <div>
                    <p class="link">Already have an account? <a href="login.php">Login Now</a></p>
                </div>
                <button type="submit" value="Sign-up" name="reg_user" class="btn btn-primary">Sign up</button>

            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>