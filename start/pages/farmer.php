<!-- only left  with sql -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers Page</title>
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<body>


    <div class="container">
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <div class="segment">
                <h1>SELL AS A FARMER</h1>
            </div>

            <div class="user-box">
                <label for="name"></label>
                <input type="text" placeholder="Enter your full name" name="name" id="name">
            </div>

            <div class="user-box">
                <label for="phoneno"></label>
                <input type="text" placeholder="Phone number" name="phoneno" id="phoneno">
            </div>

            <div class="user-box">
                <label for="location"></label>
                <input type="text" placeholder="Address" name="location" id="location">
            </div>

            <div class="user-box">
                <label for="brand"></label>
                <input type="text" placeholder="Brand Name" name="brand" id="brand">
            </div>

            <div class="user-box">
                <label for="email"></label>
                <input type="email" placeholder="Email" name="email" id="email">
            </div>

            <div class="user-box">
                <label for="honkg"></label>
                <input type="number" placeholder="Weight in Kg" name="honkg" id="honkg">
            </div>


            <div>
                <label for="product_type">Product type</label>
                <select name="product_type" id="product_type">
                    <option value="honey">Honey</option>
                    <option value="bees_wax">Bees Wax</option>
                    <option value="propolis">Propolis</option>
                    <option value="royal_jelly">Royal Jelly</option>
                    <option value="pollen">Pollen</option>

                </select>
            </div>

            <div>
                <p>Brand Image :: </p>
                <label for="file">Choose:</label>
                <input type="file" name="userImage" id="image">
            </div>

            <div class="c1">
                <div class=btn>
                    <input type="submit" value="Insert" name="upload">
                </div>
                <div class="btn">
                    <a href="../logout.php" class="btn btn-dark">Logout</a>
                </div>
            </div>


        </form>
    </div>


</body>

</html>