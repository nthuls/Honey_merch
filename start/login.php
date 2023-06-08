<?php
//login template
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Login Page</title>
        <link href="pages/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <form  action="check-login.php" method="post">
                <div class="segment">
                <h1 class="text-center p-3">LOGIN</h1>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="user-box">
                    <label for="username" class="form-label"></label>
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                </div>
                <div class="user-box">
                    <label for="password" class="form-label"></label>
                    <input type="password" name="password"  placeholder="password"
                    class="form-control" id="password">
                </div>
                <div class="mb-1">
                    <label class="form-label">Role:</label>
                </div>
                <select class="form-select user-box" name="role" aria-label="Default select example">
                    <option selected value="admin">Admin</option>
                    <option value="farmer">Farmer</option>
                    <option value="user">User</option>
                </select>
                <div>
                    <p class="link">Don't have an account? <a href="registration.php">Register Now</a></p>
                    <p class="link">Go back <a href="index.php">home!!!!</a></p>
                </div>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: home.php");
} ?>