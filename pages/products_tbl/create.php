<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <div class="container my-5">
        <h2>New Product</h2>

        <form method="POST" action="add.php" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Previous price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prev_price" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Current Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="current_price" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date Created</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date_created" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date Updated</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date_updated" value="">
                </div>
            </div>

            <div>
                <p>Brand Image :: </p>
                <label for="file">Choose:</label>
                <input type="file" name="img_path" id="image">
            </div>



            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <input type="submit" name="submit1" class="btn btn-warning" value="submit"></input>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="products.php" role="button">Cancel</a>
                </div>
            </div>


        </form>
    </div>


</body>

</html>