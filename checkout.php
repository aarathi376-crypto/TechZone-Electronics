<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

if(empty($_SESSION['cart']))
{
    header("Location: cart.php");
    exit();
}

$total = 0;

foreach($_SESSION['cart'] as $item)
{
    $total += $item['price'] * $item['quantity'];
}

if(isset($_POST['place_order']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($conn,
"INSERT INTO orders
(customer_name,email,phone,address,total_amount)
VALUES
('$name','$email','$phone','$address','$total')");

    $order_id = mysqli_insert_id($conn);

    foreach($_SESSION['cart'] as $product => $item)
    {
        $qty = $item['quantity'];
        $price = $item['price'];
        $subtotal = $qty * $price;

        mysqli_query($conn,
        "INSERT INTO cart_items
        (order_id,product_name,quantity,price,subtotal)
        VALUES
        ('$order_id','$product','$qty','$price','$subtotal')");
    }

    $_SESSION['order_id'] = $order_id;

    unset($_SESSION['cart']);

    header("Location: success.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Checkout</title>

<style>

body{
    background:#121212;
    color:white;
    font-family:Arial;
}

.container{
    width:500px;
    margin:50px auto;
    background:#1f1f1f;
    padding:30px;
    border-radius:10px;
}

input,textarea{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:none;
    border-radius:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#4caf50;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#45a049;
}

.total{
    color:#4caf50;
    font-size:22px;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h2>Checkout</h2>

<p class="total">
Total Amount: ₹<?php echo $total; ?>
</p>

<form method="post">

<input
type="text"
name="name"
placeholder="Customer Name"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="text"
name="phone"
placeholder="Phone Number"
required>

<textarea
name="address"
placeholder="Address"
required>
</textarea>

<button
type="submit"
name="place_order">

Place Order

</button>

</form>

</div>

</body>
</html>