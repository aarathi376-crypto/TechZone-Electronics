<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}

/* Increase Quantity */
if(isset($_GET['increase']))
{
    $product = $_GET['increase'];

    $_SESSION['cart'][$product]['quantity']++;
}

/* Decrease Quantity */
if(isset($_GET['decrease']))
{
    $product = $_GET['decrease'];

    $_SESSION['cart'][$product]['quantity']--;

    if($_SESSION['cart'][$product]['quantity'] <= 0)
    {
        unset($_SESSION['cart'][$product]);
    }
}

/* Remove Item */
if(isset($_GET['remove']))
{
    $product = $_GET['remove'];

    unset($_SESSION['cart'][$product]);
}

$total = 0;
?>

<!DOCTYPE html>
<html>

<head>

<title>TechZone Cart</title>

<style>

body{
    background:#121212;
    color:white;
    font-family:Arial;
    margin:0;
}

header{
    background:black;
    padding:20px;
    text-align:center;
}

.container{
    width:90%;
    margin:auto;
    padding:20px;
}

.cart-item{
    background:#1f1f1f;
    margin:15px 0;
    padding:20px;
    border-radius:10px;
}

.actions a{
    text-decoration:none;
    color:white;
    padding:8px 12px;
    border-radius:5px;
    margin-right:5px;
}

.plus{
    background:#4caf50;
}

.minus{
    background:#ff9800;
}

.remove{
    background:#f44336;
}

.btn{
    display:inline-block;
    padding:12px 20px;
    text-decoration:none;
    border-radius:6px;
    color:white;
    margin-right:10px;
}

.shop{
    background:#2196f3;
}

.checkout{
    background:#4caf50;
}

.total{
    font-size:22px;
    color:#4caf50;
    font-weight:bold;
    margin-top:20px;
}

</style>

</head>

<body>

<header>

<h1>Your Cart</h1>

</header>

<div class="container">

<?php

if(empty($_SESSION['cart']))
{
    echo "<h2>Cart is Empty</h2>";
}
else
{
    foreach($_SESSION['cart'] as $product => $item)
    {
        $subtotal =
        $item['price'] * $item['quantity'];

        $total += $subtotal;

        echo "
        <div class='cart-item'>

        <h3>$product</h3>

        <p>Price: ₹".$item['price']."</p>

        <p>Quantity: ".$item['quantity']."</p>

        <p>Subtotal: ₹".$subtotal."</p>

        <div class='actions'>

        <a class='plus'
        href='cart.php?increase=$product'>+</a>

        <a class='minus'
        href='cart.php?decrease=$product'>-</a>

        <a class='remove'
        href='cart.php?remove=$product'>
        Remove
        </a>

        </div>

        </div>
        ";
    }

    echo "
    <div class='total'>
    Total Price : ₹$total
    </div>
    ";
}

?>

<br><br>

<a class="btn shop"
href="index.php">

Continue Shopping

</a>

<?php
if(!empty($_SESSION['cart']))
{
?>
<a class="btn checkout"
href="checkout.php">

Proceed To Checkout

</a>
<?php
}
?>

</div>

</body>
</html>