<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about page</title>
    <link rel="stylesheet" href="css/start.css?v=<?php echo time(); ?>">

</head>

<body>

<?php

require('db_conn.php');

if (isset($_REQUEST['email'])){
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($conn, $name);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $Subject = stripslashes($_REQUEST['Subject']);
    $Subject = mysqli_real_escape_string($conn, $Subject);
    $message = stripslashes($_REQUEST['message']);
    $message = mysqli_real_escape_string($conn, $message);

    $query = "INSERT into `contact` (name, email, Subject, message)
    VALUES ('$name', '$email', '$Subject', '$message')";

    $result = mysqli_query($conn, $query);

    if($result){
        header('location:index.php');
    }else{
        echo "<div class='form'>
                  <h3>Cannot send the info.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
    }
}else{

?>
    <header id="header">
        <nav>
            <div class="logo"><img src="css/LOGO-removebg-preview.png"></div>
            <ul id="navbar">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="#top" class="active">About Us</a></li>
                <li><a href="login.php" class="active">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="bd">
        <div class="about-section">
            <br>
            <h1>ABOUT US</h1>


            <div>
                <p>
                    Although it may look easy to get honey, it is easier said than done in Nairobi. Postamate claims that only three people in Nairobi sell pure unadulterated honey, according to a report by the main stakeholders in the industry. This message comes as a shock to many Kenyans who have been buying "pure" honey from work mates, supermarkets, side hustlers and even street vendors, it was noted that almost all the honey sold in Nairobi is fake, and some of it has actually no relationship with bees.
                </p>
            </div>

            <div>
                <p>
                    The surest way to ensure you have real honey in Nairobi is to get it from the bees yourself. That was an easy task in the age of hunting and gathering, but in the age of Facebook and Instagram, you can check with Honey Merchant as we confirm and ensure that you get good quality products and not melted or burnt sugar.
                    At honey merchant we conduct several tests before we get honey from any farmer that is willing to conduct business with us. The tests include a Water test which involves putting a spoon of honey in a glass of water and if the honey dissolves in the water, the honey is dimmed fake and vice versa. The second test is a vinegar test which is conducted by mixing a few drops of honey into vinegar water, if the mixture starts to foam, then we brand the honey as fake.
                </p>
            </div>

            <div>
                <p>
                    Our main aim at Honey merchant is to buy good quality honey from the farmer at a good price and deliver the product to the end consumer at the best price. We intend to help our customers validate the honey they consume while also keeping track of where the honey came from and how much each of our users has consumed from the time they registered with us. Our selling and buying method at Honey Merchant allows the end user to complain and report any particular farmer they believe is not delivering what was promised upon transaction.
                </p>
            </div>

            <div class="c1">
                <a href="#bottom" class="button1">
                    Contact US </a>
            </div>

            <br>
            <br>
        </div>
    </section>

    <!-- <div id="grad1"> -->
    <footer class="section-p1">


        <div class="col">
            <form autocomplete="off" action="" method=post name="contact_form" id="form1">
                <h1>Contact us</h1>
                <div class="">
                    <label for="name" class="">Full name</label>
                    <input type="text" class="form_control" name="name" id="name">
                </div>
                <div class="">
                    <label for="email" class="">Email</label>
                    <input type="email" class="form_control" name="email" id="email">
                </div>
                <div class="">
                    <label for="Subject" class="">Subject</label>
                    <input type="text" class="form_control" name="Subject" id="Subject">
                </div>
                <div class="">
                    <label for="message" class="">Message</label>
                    <textarea type="message" placeholder="Remember, be nice!" name="message" id="message"></textarea>
                </div>

                <input type="submit" value="send" name="contact" />

            </form>
        </div>

        <div class="col">
            <img src="css/LOGO-removebg-preview.png" class="logo" alt="">
            <h4>Contact</h4>
            <p><strong>Address</strong> : 55207 Nairobi SyoKatani</p>
            <p><strong>Phone 1</strong> : +254724082859 </p>
            <p><strong>Phone 2</strong> : +254777082850</p>
            <p><strong>Hours </strong> : 6:00am - 2:45pm, Monday - Friday</p>
        </div>
        <div class="col">
            <h4>About Us page</h4>
            <a href="login.php" class="active">Login</a>
            <a href="index.php" class="active">homepage</a>
            <a href="registration.php">Register here</a>
        </div>

        <div class="copyright">
            <p>© 2022, Project Template</p>
        </div>
    </footer>
    <!-- </div> -->
<?php
}
?>
</body>

</html>