<?php

require('db_conn.php');

if (isset($_REQUEST['email'])){
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    $query = "INSERT into `newsletter`(email)
    VALUES('$email')";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "signUp successful";
        header('location:index.php');
    } else {
        echo "<div class='form'>
                  <h3>Cannot send the info.</h3><br/>
                  </div>";
    } 
}
?>