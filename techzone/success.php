<?php
session_start();

if(!isset($_SESSION['order_id']))
{
    header("Location: index.php");
    exit();
}

$order_id = $_SESSION['order_id'];

unset($_SESSION['order_id']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Successful</title>

<style>

body{
    background:#121212;
    color:white;
    font-family:Arial,sans-serif;
    text-align:center;
    padding-top:100px;
}

.box{
    width:500px;
    margin:auto;
    background:#1f1f1f;
    padding:40px;
    border-radius:12px;
}

h1{
    color:#4caf50;
}

a{
    display:inline-block;
    margin-top:20px;
    padding:12px 20px;
    background:#4caf50;
    color:white;
    text-decoration:none;
    border-radius:6px;
}

a:hover{
    background:#45a049;
}

</style>

</head>

<body>

<div class="box">

<h1>Order Placed Successfully!</h1>

<h2>Order ID: <?php echo $order_id; ?></h2>

<p>
Thank you for shopping with TechZone Electronics.
</p>

<a href="index.php">
Continue Shopping
</a>

</div>

</body>
</html>