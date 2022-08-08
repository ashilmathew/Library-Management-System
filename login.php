<?php

session_start();

if(isset($_SESSION['uid']))
{
    header('location:dashboard.html');
}
?>


<!DOCTYPE html>
<html lang="en">
<title>Login</title>
<head>
  <!-- Design by foolishdeveloper.com 
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url(static-images/add-book.jpg);
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
}
.logo{
	position: absolute;
	top: 8px;
	left: 16px;
	font-size: 20px;
	font-family: Copperplate, Papyrus, fantasy;
	text-shadow: 0 0 3px #000000;
}
a { color: inherit;
			text-decoration: none;}
form{
    height: 480px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.signup{
  margin-top: 30px;
  display: flex;
}
input[type=submit]:hover {
  background-color: #800000;
}
    </style>
</head>
<body>
	<div class="logo">
		<h1 style="color:white;"><a href="home.html">Library Management System</a></h1>
	</div>
    <form action="login.php" method="post">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password">

	  <input type="submit" name="login" value="Log In">
        <input type="submit" value="Sign Up" name="signup">
    </form>
</body>
</html>


<?php

include('dbconf.php');

if(isset($_POST['login'])){
    
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    
    $qry = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";
    
    $run = mysqli_query($con,$qry);
    
    $row = mysqli_num_rows($run);
    
    if($row>=1)
    {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];
        
        
        
        $_SESSION['uid']=$id;
        
        header('location:dashboard.html');
        
    }
    else
    {
        ?>
        <script>
            alert('Username Or Password Dont match');
            window.open('login.php','_self')
</script>
        <?php
    }
}
if(isset($_POST['signup'])){
	header('location:signup.php');
}

?>


