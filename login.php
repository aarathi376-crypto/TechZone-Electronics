<?php
session_start();
include("db.php");

$message = "";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
    "SELECT * FROM users
     WHERE email='$email'
     AND password='$password'");

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];

        header("Location: index.php");
        exit();
    }
    else
    {
        $message = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>TechZone Login</title>

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
    color:#ff6b6b;
    margin-top:10px;
}

a{
    color:#4caf50;
}

</style>
</head>

<body>

<div class="container">

<h2>Login</h2>

<form method="post">

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

<button type="submit" name="login">
Login
</button>

</form>

<p class="msg">
<?php echo $message; ?>
</p>

<p style="text-align:center;">
Don't have an account?
<a href="register.php">Register</a>
</p>

</div>

</body>
</html>