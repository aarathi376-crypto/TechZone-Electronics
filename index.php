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

if(isset($_POST['add_to_cart']))
{
    $product = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = (int)$_POST['quantity'];

    if(isset($_SESSION['cart'][$product]))
    {
        $_SESSION['cart'][$product]['quantity'] += $quantity;
    }
    else
    {
        $_SESSION['cart'][$product] = array(
            "price" => $price,
            "quantity" => $quantity
        );
    }
}

$cartCount = 0;

foreach($_SESSION['cart'] as $item)
{
    $cartCount += $item['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>

<title>TechZone Electronics</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#121212;
    color:white;
}

header{
    background:#000;
    text-align:center;
    padding:20px;
}

nav{
    background:#1f1f1f;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 30px;
}

nav a{
    color:white;
    text-decoration:none;
    margin-right:15px;
    font-weight:bold;
}

nav a:hover{
    color:#4caf50;
}

.container{
    width:90%;
    margin:auto;
    padding:30px 0;
}

.products{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
}

.card{
    width:300px;
    background:#1f1f1f;
    margin:15px;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 0 10px rgba(0,0,0,0.5);
    transition:0.3s;
    text-align:center;
}

.card:hover{
    transform:translateY(-8px);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card h3{
    margin:15px 0 10px;
}

.price{
    color:#4caf50;
    font-size:20px;
    font-weight:bold;
}

.qty-box{
    margin:10px 0;
}

.qty-box input{
    width:60px;
    padding:8px;
    text-align:center;
}

button{
    background:#4caf50;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:6px;
    cursor:pointer;
    margin-bottom:15px;
}

button:hover{
    background:#45a049;
}

</style>

</head>

<body>

<header>
    <h1>TechZone Electronics</h1>
    <p>Welcome, <?php echo $_SESSION['name']; ?></p>
</header>

<nav>

<div>
    <a href="index.php">Home</a>
    <a href="cart.php">🛒 Cart (<?php echo $cartCount; ?>)</a>
</div>

<div>
    <a href="logout.php">Logout</a>
</div>

</nav>

<div class="container">

<div class="products">

<!-- Laptop -->
<div class="card">

<img src="images/laptopimage.jpg" alt="Laptop">

<h3>Laptop</h3>

<p class="price">₹50,000</p>

<form method="post">

<input type="hidden" name="product_name" value="Laptop">
<input type="hidden" name="price" value="50000">

<div class="qty-box">
Qty:
<input type="number" name="quantity" value="1" min="1">
</div>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</div>

<!-- Smartphone -->
<div class="card">

<img src="images/mobileimage.jpg" alt="Smartphone">

<h3>Smartphone</h3>

<p class="price">₹25,000</p>

<form method="post">

<input type="hidden" name="product_name" value="Smartphone">
<input type="hidden" name="price" value="25000">

<div class="qty-box">
Qty:
<input type="number" name="quantity" value="1" min="1">
</div>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</div>

<!-- Headphones -->
<div class="card">

<img src="images/headphoneimage.jpg" alt="Headphones">

<h3>Headphones</h3>

<p class="price">₹2,000</p>

<form method="post">

<input type="hidden" name="product_name" value="Headphones">
<input type="hidden" name="price" value="2000">

<div class="qty-box">
Qty:
<input type="number" name="quantity" value="1" min="1">
</div>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</div>

<!-- Smartwatch -->
<div class="card">

<img src="images/smartwatchimage.jpg" alt="Smartwatch">

<h3>Smartwatch</h3>

<p class="price">₹5,000</p>

<form method="post">

<input type="hidden" name="product_name" value="Smartwatch">
<input type="hidden" name="price" value="5000">

<div class="qty-box">
Qty:
<input type="number" name="quantity" value="1" min="1">
</div>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</div>

<!-- Tablet -->
<div class="card">

<img src="images/tabletimage.jpg" alt="Tablet">

<h3>Tablet</h3>

<p class="price">₹15,000</p>

<form method="post">

<input type="hidden" name="product_name" value="Tablet">
<input type="hidden" name="price" value="15000">

<div class="qty-box">
Qty:
<input type="number" name="quantity" value="1" min="1">
</div>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</div>

<!-- Camera -->
<div class="card">

<img src="images/cameraimage.jpg" alt="Camera">

<h3>Camera</h3>

<p class="price">₹30,000</p>

<form method="post">

<input type="hidden" name="product_name" value="Camera">
<input type="hidden" name="price" value="30000">

<div class="qty-box">
Qty:
<input type="number" name="quantity" value="1" min="1">
</div>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</div>

</div>

</div>

</body>
</html>