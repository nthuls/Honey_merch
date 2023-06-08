<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/start.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php

    require('db_conn.php');

    if (isset($_REQUEST['email'])) {
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

        if ($result) {
            header('location:index.php');
        } else {
            echo "<div class='form'>
                  <h3>Cannot send the info.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {

    ?>
        <section>
            <div class="container">
                <video src="css/Honey Bees.mp4" autoplay="true" loop="true"></video>
            </div>
            <div class="overlay">
                <div class="text-container">
                    <div class="heading">HONEY MERCHANT</div>
                    <div class="subheading">HERE TO DELIVER GOOD QUALITY BEE PRODUCTS</div>
                </div>
            </div>
            <nav>
                <div class="logo"><img src="css/LOGO-removebg-preview.png"></div>
                <label for="check" class="checkbtn">
                    <div class="f-line"></div>
                    <div class="s-line"></div>
                    <div class="t-line"></div>
                </label>
                <input type="checkbox" id="check">
                <ul>
                    <li><a href="#top" class="active">Home</a></li>
                    <li><a href="about.php" class="active">About Us</a></li>
                    <li><a href="login.php" class="active">Login</a></li>
                </ul>
            </nav>
        </section>

        <section id="product1" class="section-p1">
            <h2>FEATURED PRODUCTS</h2>
            <p>All featured products can be found on users page</p>
        </section>

        <section id="feature" class="section-p1">
            <div class="fe-box">
                <a href="#honey"><img src="css/image/hon-removebg-preview.png" alt="" style="width: 152px;height: 105px ;"></a>
                <h6>HONEY</h6>
            </div>

            <div class="fe-box">
                <a href="#bee_wax"><img src=" css/image/wax.png" alt="" style="width: 152px;height: 105px ;"></a>
                <h6>BEES WAX</h6>
            </div>

            <div class="fe-box">
                <a href="#propolis"><img src="css/image/PROPOLIS.png" alt="" style="width: 148px;height: 105px ;"></a>
                <h6>PROPOLIS</h6>
            </div>

            <div class="fe-box">
                <a href="#royal_jelly"><img src=" css/image/image1.png" alt="" style="width: 148px;height: 105px ;"></a>
                <h6>ROYAL JELLY</h6>
            </div>

            <div class="fe-box">
                <a href="#pollen"><img src=" css/image/pollen-removebg-preview.png" alt="" style="width: 148px;height: 105px ;"></a>
                <h6>POLLEN</h6>
            </div>
        </section>

        <section id="banner" class=".section-m1">
            <div class="banner1" style="background-image: linear-gradient(to top, rgba(179, 96, 0, 0.0), rgba(179, 96, 0, 1));" ;>
                <div class="section-p1 new">
                    <h1>We have <span> 100% GOOD DEALS </span> on all bee related products</h1>
                    <h3>Register now </h3>
                    <div class="c1">
                        <a href="registration.php" class="button1">
                            Register </a>
                    </div>
                </div>
            </div>
        </section>

        <section style="background-image: linear-gradient(to bottom, rgba(179, 96, 0, 0.0), rgba(179, 96, 0, 1));">
            <div class="text_1" id="honey">
                <h1>HONEY</h1>
                <p> According to the dictionary Honey is a sweet, sticky yellowish-brown fluid made by bees and other insects from nectar collected from flowers</p>
                <p>Honey in Kenya is sold in the following gardes :</p>
                <p>Crude honey - This is a mixture of ripe and unripe honey. At harvesting time, the wax, honeycomb, and bee-and-brood comb are all mixed into one container. This container is often an old tin. Crude honey is used mainly for brewing local beer because quality requirements are not very strict. The demand for this type of honey is high. </p>
                <p>Semi-refined honey - Semi-refined honey is generally the liquid honey that remains when you skim wax off the top of crude honey. Honey sinks to the bottom as it is heavier. Semirefined honey still contains particles of wax and other debris such as bees' legs. It can be stored for the beekeeper's own use or it can be refined further and packed for sale. It gains a higher price than crude honey.</p>
                <p>Refined honey - Refined honey is clean. You strain it to remove all particles of beeswax and other materials. Remember: refined honey is unchanged, it is only strained. Nothing else is added so it is still the pure honey that bees made in the hive.</p>
                <p>Chunk honey - Whole combs of capped honey can be harvested carefully from the beehive. You can cut up pieces of the comb and put them into jars of liquid honey. This gives the consumer a feeling that the honey is real and not adulterated with sugar. Chunk honey can fetch a higher price than refined honey.</p>
                <p> Comb honey - Honeycombs of capped honey that have a nice white capping can be cut up, placed on small trays, and covered with cling film. These are very marketable in Kenya and command a very high price in the market, particularly in affluent Nairobi suburbs and other towns. This product should be the ultimate aim of all beekeepers with access to these markets. This product is priced per gram.</p>
            </div>

            <br>

            <div class="text_1" id="bee_wax">
                <h1>BEES WAX</h1>
                <p>Beeswax is a product made from the honeycomb of the honeybee and other bees. The mixing of pollen oils into honeycomb wax turns the white wax into a yellow or brown color.</p>
                <p>Beeswax is used to help people with high cholesterol, pain, fungal skin infections, and other conditions. But there is no good scientific research to support these uses.</p>
                <p>In foods and beverages, white beeswax and beeswax absolute (yellow beeswax treated with alcohol) are used as stiffening agents.</p>
                <p>In manufacturing, yellow and white beeswax are used as thickeners, emulsifiers, and as stiffening agents in cosmetics. Beeswax absolute is used as a fragrance in soaps and perfumes. White beeswax and beeswax absolute are also used to polish pills.</p>
            </div>

            <br>

            <div class="text_1" id="propolis">
                <h1>PROPOLIS</h1>
                <p>Propolis is a mixture of pollen and beeswax collected by bees from certain plants and trees. Rich in flavonoids, a class of antioxidants, propolis has a long history of use as a natural treatment for many health problems, but more research is needed in humans to support its use. Although found in small quantities in honey, propolis is also widely available in supplement form.</p>
                <p>Researchers have identified more than 300 compounds in propolis. The majority of these compounds are forms of polyphenols. Polyphenols are antioxidants that fight disease and damage in the body. Propolis contains the polyphenols called flavonoids. Flavonoids are produced in plants as a form of protection. Researchers aren’t exactly sure why, but the bee product appears to provide protection from some bacteria, viruses, and fungi.</p>
                <p>Some of the possible uses of propolis includes;</p>
                <ol>
                    <li>Diabetes - Taking propolis by mouth seems to improve blood sugar control by a small amount in people with diabetes. But it doesn't seem to affect insulin levels or improve insulin resistance.</li>
                    <li>Cold sores (herpes labialis) - Applying an ointment or cream containing 0.5% to 3% propolis five times daily might help cold sores to heal faster and reduce pain.</li>
                    <li>Swelling (inflammation) and sores inside the mouth (oral mucositis) - Taking propolis by mouth or rinsing the mouth with a propolis mouth rinse helps heal sores caused by cancer drugs.</li>
                </ol>
            </div>

            <br>

            <div class="text_1" id="royal_jelly">
                <h1>ROYAL JELLY</h1>
                <p>Royal jelly is a milky secretion made by worker honeybees (Apis mellifera). It's rich in carbs, protein, amino acids, fatty acids, vitamins, and minerals.</p>
                <p>Royal jelly gets its name because it is used as food for the queen bee. Its composition varies depending on geography and climate.</p>
                <p>People use royal jelly for symptoms of menopause. It's also used for hay fever, diabetes, premenstrual syndrome (PMS), obesity, dry eye, and many other purposes, but there is no good scientific evidence to support these uses.</p>
                <p>Taking royal jelly by mouth, alone or with other ingredients, seems to somewhat improve symptoms of menopause. But it's not clear if applying royal jelly to the skin helps.</p>
                <p>Don't confuse royal jelly with bee pollen, beeswax, bee venom, honey, or propolis. Also don't confuse it with apitherapy. They are not the same.</p>
            </div>

            <br>

            <div class="text_1" id="pollen">
                <h1>POLLEN</h1>
                <p>Bee pollen is a natural mixture of flower pollen, nectar, bee secretions, enzymes, honey, and wax. It's used as a nutritional supplement. Natural health practitioners promote it as a superfood due to its nutrient-rich profile that includes tocopherol, niacin, thiamine, biotin, folic acid, polyphenols, carotenoid pigments, phytosterols, enzymes, and co-enzymes.</p>
                <p>Bee pollen is available at many health food stores. You may find bee pollen in other natural dietary supplements, as well as in skin softening products used for baby's diaper rash or eczema. You may also hear recommendations for using bee pollen for alcoholism, asthma, allergies, health maintenance, premenstrual syndrome (PMS), enlarged prostate, or stomach problems. It is also used as an energy tonic.</p>
                <p>But there is no proof that it helps with these conditions. Before you take any natural product for a health condition, check with your doctor.</p>
                <p>Some of the health concerns bee pollen has been studied for include:</p>
                <ol>
                    <li>Allergies</li>
                    <li>High cholesterol</li>
                    <li>Liver health</li>
                    <li>Osteoporosis</li>
                </ol>
            </div>

            <br>
        </section>

        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Sign Up For Newsletters</h4>
                <p>Get E-mail updates about our latest shop and<span>special offers.</span></p>
            </div>
            <div>
                <form action="newsletter.php" method="post">
                    <label>Email:</label>
                    <input type="text" name="email" /><br>
                    <input type="submit"  value="Send" />
                </form>
            </div>
        </section>

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

    <?php
    }
    ?>
</body>
</body>

</html>