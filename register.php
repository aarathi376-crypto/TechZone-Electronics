<?php
include("db.php");

$message = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already exists!";
    }
    else
    {
        mysqli_query($conn,
        "INSERT INTO users(name,email,password)
        VALUES('$name','$email','$password')");

        $message = "Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>TechZone Registration</title>

<style>

body{
    font-family:Arial;
    background:#121212;
    color:white;
}

.container{
    width:400px;
    margin:80px auto;
    background:#1f1f1f;
    padding:30px;
    border-radius:10px;
}

h2{
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:none;
    border-radius:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:10px;
    background:#4caf50;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#45a049;
}

.msg{
    text-align:center;
    color:#4caf50;
    margin-top:10px;
}

a{
    color:#4caf50;
}

</style>
</head>

<body>

<div class="container">

<h2>Create Account</h2>

<form method="post">

<input
type="text"
name="name"
placeholder="Enter Full Name"
required>

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit" name="register">
Register
</button>

</form>

<p class="msg">
<?php echo $message; ?>
</p>

<p style="text-align:center;">
Already Registered?
<a href="login.php">Login</a>
</p>

</div>

</body>
</html>