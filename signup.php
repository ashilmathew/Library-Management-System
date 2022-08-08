<!DOCTYPE html>
<html lang="en">
<title>Signup</title>
<head>
  <!-- Design by foolishdeveloper.com 
    <title>Signup</title>
 
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
form{
    height: 560px;
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
    margin-top: 35px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
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
input[type=submit]:hover {
  background-color: #800000;
}

    </style>
</head>
<body>
	<div class="logo">
		<h1 style="color:white;"><a href="home.html">Library Management System</a></h1>
	</div>
    <form action="signup.php" method="post">
        <h3>Signup Here</h3>
		
		<label for="name">Name</label>
        <input type="text" placeholder="Name" name="name">

        <label for="username">Username</label>
        <input type="text" placeholder="Email" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password">
		
	  <input type="submit" value="Signup" name="submit">
	  <input type="submit" value="Login" name="login">
		

    </form>
</body>
</html>



<?php

if(isset($_POST['submit'])){
    $con = mysqli_connect('localhost','root','','lms');
	$flag = 0;

	if($con == false){
		echo "Connection not successful";
	}
	if (empty($_POST['name']) || strlen(trim($_POST['name']))==0) {
		$flag = 1;
    	} 
	else {  
        $name = $_POST['name'];  
    	}
	if (empty($_POST['username']) || strlen(trim($_POST['username']))==0) {  
        	$flag = 1;
    	} 
	else {  
        $username = $_POST['username'];  
    	}  
	if (empty($_POST['password']) || strlen(trim($_POST['password']))==0) {  
        	$flag = 1;
    	} 
	else {  
        $password = $_POST['password'];  
    	}
	
	if($flag == 0){
    
    		$qry = "INSERT INTO `user`(`name`, `username`, `password`) VALUES ('{$name}','{$username}','{$password}')";
   
    		$run = mysqli_query($con,$qry);
		if($run == true){
        ?>
        <script>
            alert('Successfully Signup');
        </script>
        <?php
    }
	}
	else
	{
		?>
        <script>
            alert('Fields cannot be empty');
        </script>
        <?php
	}
  
}
if(isset($_POST['login'])){
	header('location:login.php');
}

?>

