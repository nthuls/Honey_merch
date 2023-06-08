<?php

session_start();

require_once("inc/Database.php");
require_once("inc/dynamic_elements.php");

$db = new Database();

if (isset($_GET['action']) && $_GET['action'] == 'removeItem') {
    unset($_SESSION['cart'][$_GET['id']]);
    echo "<script>alert('Your product has been Removed from Shopping Cart')</script>";
    echo "<script>window.location = 'cart.php'</script>";
}
if (isset($_GET['action']) && $_GET['action'] == "update_qty") {
    $pid = $_GET['pid'];
    $operation = $_GET['operation'];
    if ($operation == "add") {
        $_SESSION['cart'][$pid] += 1;
    } else {
        if ($_SESSION['cart'][$pid] > 1) {
            $_SESSION['cart'][$pid] -= 1;
        }
    }
    header('location: ./cart.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style1.css">
</head>

<body class="bg-light">

    <?php
    require_once('inc/header.php');
    ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h2>Shopping Cart</h2>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $pids = array_keys($_SESSION['cart']);

                        $result = $db->getData($pids);
                        while ($row = $result->fetch_assoc()) {
                            cartItems($row);
                            $total += (floatval($row['current_price']) * intval($_SESSION['cart'][$row['id']]));
                        }
                    } else {
                        echo "<h5>Cart is Empty</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h5>Total</h5>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>Ksh <?php echo number_format($total, 2); ?></h6>
                            <h6 class="text-success"> Ksh 200 </h6>
                            <hr>
                            <h6>Ksh <?php
                                    $total = ($total + 200);
                                    echo number_format($total, 2);
                                    ?></h6>

                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                            <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                            <script>
                                function initPayPalButton() {
                                    paypal.Buttons({
                                        style: {
                                            shape: 'rect',
                                            color: 'gold',
                                            layout: 'vertical',
                                            label: 'checkout',

                                        },

                                        createOrder: function(data, actions) {
                                            return actions.order.create({
                                                purchase_units: [{
                                                    "amount": {
                                                        "currency_code": "Ksh",
                                                        "value": 1
                                                    }
                                                }]
                                            });
                                        },

                                        onApprove: function(data, actions) {
                                            return actions.order.capture().then(function(orderData) {

                                                // Full available details
                                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                                // Show a success message within this page, e.g.
                                                const element = document.getElementById('paypal-button-container');
                                                element.innerHTML = '';
                                                element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                                // Or go to another URL:  actions.redirect('thank_you.html');

                                            });
                                        },

                                        onError: function(err) {
                                            console.log(err);
                                        }
                                    }).render('#paypal-button-container');
                                }
                                initPayPalButton();
                            </script>

                            <div>
                                <h4> OR </h4>
                            </div>

                            <form action="MpesaTest.php" method="POST">
                                <fieldset>
                                    <h2>Lipa Online</h2>
                                    <br>
                                    <input type="number" type="number" name="phone_number" placeholder="Enter Phone number">
                                    <br><br>
                                    <button class="btn btn-outline-warning active" type="button" style="margin-bottom: 60px;">
                                        Make Payment Now
                                    </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>